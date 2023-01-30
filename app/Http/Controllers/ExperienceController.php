<?php

namespace App\Http\Controllers;

use App\Mail\ReceiveNotification;
use PDF;
use App\Models\Career;
use App\Models\Experience;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\VerifyNotification;
use Illuminate\Support\Facades\Mail;

class ExperienceController extends Controller
{
    public function index()
    {
        // if (auth()->user()->experience->is_verified  == Experience::UNVERIFIED) {
        //     return view('career.experience');
        // } elseif (auth()->user()->experience->is_verified  == Experience::VERIFYING) {
        //     return view('career.conditions.verifying');
        // } elseif (auth()->user()->experience->is_verified  == Experience::FAILED_VERIFICATION) {
        //     return view('career.conditions.failed');
        // } elseif (auth()->user()->experience->is_verified  == Experience::VERIFIED) {
        //     return redirect()->route('career.add.course.index');
        // }

        return view('career.experience');
    }

    public function adminIndex()
    {
        $experiences = Experience::with('user')->where('is_verified', Experience::VERIFYING)
            ->orWhere('is_verified', Experience::VERIFIED)
            ->orWhere('is_verified', Experience::FAILED_VERIFICATION)->get();

        return view('Admin.Career.index', compact('experiences'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'qualification' => 'required',
            'is_experienced' => 'required',
            'experienced_in_online' => 'required_if:is_experienced,1',
            'experienced_in_offline' => 'required_if:is_experienced,1',
            'teaching_experience' => 'required_if:is_experienced,1',
            'certification',
            'preferred_mode' => 'required',
            'total_experience' => 'required',
            'no_case_study',
            'research_project',
            'other_experience',
            'companies_linked_to_you',
            'linkedin_link',
            'provide_document_aadhar' => 'required|mimes:pdf|max:500',
            'provide_document_photo' => 'required|mimes:pdf|max:500',
            // 'provide_document_pan' => 'required|mimes:pdf|max:500',
            // 'provide_document_bank' => 'required|mimes:pdf|max:500',
            'provide_document_marksheet' => 'required|mimes:pdf|max:500',
            'provide_document_experience_letter' => 'mimes:pdf|max:500',
            'provide_document_certificate' => 'required_unless:certification,null|mimes:pdf|max:500',
        ]);

        $slugName = Str::slug(auth()->user()->name);

        Storage::disk('public')->deleteDirectory('tutors_documents/' . $slugName);

        $aadharPath = $request->provide_document_aadhar->store('tutors_documents/' . $slugName, 'public');
        $photoPath = $request->provide_document_photo->store('tutors_documents/' . $slugName, 'public');
        // $panPath = $request->provide_document_pan->store('tutors_documents/' . $slugName, 'public');
        // $bankPath = $request->provide_document_bank->store('tutors_documents/' . $slugName,  'public');
        $markPath = $request->provide_document_marksheet->store('tutors_documents/' . $slugName,  'public');

        if ($request->has('provide_document_experience_letter')) {
            $letterPath = $request->provide_document_experience_letter->store('tutors_documents/' . $slugName,  'public');
        }

        if ($request->has('provide_document_certificate')) {
            $certificatePath = $request->provide_document_certificate->store('tutors_documents/' . $slugName,  'public');
        }

        Experience::where('user_id', auth()->id())->first()->update([
            'is_verified' => Experience::VERIFYING,
            'qualification' => $request->qualification,
            'is_experienced' => $request->is_experienced,
            'experienced_in_online' => $request->is_experienced ? $request->experienced_in_online : null,
            'experienced_in_offline' => $request->is_experienced ? $request->experienced_in_offline : null,
            'teaching_experience' =>  $request->is_experienced ? $request->teaching_experience : null,
            'certification' => $request->certification,
            'conduct_lecture' => $request->conduct_lecture,
            'preferred_mode' => $request->preferred_mode,
            'total_experience' => $request->total_experience,
            'no_case_study' => $request->no_case_study ? $request->no_case_study : null,
            'research_project' => $request->research_project ? $request->research_project : null,
            'other_experience' => $request->other_experience ? $request->other_experience : null,
            'companies_linked_to_you' => $request->companies_linked_to_you ? $request->companies_linked_to_you : null,
            'linkedin_link' => $request->linkedin_link,
            'provide_document_aadhar' => $aadharPath,
            'provide_document_photo' => $photoPath,
            // 'provide_document_pan' => $panPath,
            // 'provide_document_bank' => $bankPath,
            'provide_document_marksheet' => $markPath,
            'provide_document_experience_letter' => $request->has('provide_document_experience_letter') ? $letterPath : null,
            'provide_document_certificate' => $request->input('certification') != null ? $certificatePath : null,
        ]);

        Mail::to(config('setting.email.notify'))->send(new ReceiveNotification(auth()->id()));

        return redirect()->route('career.create.course.index')->with('status', 'Form Updated');
    }

    public function show(Experience $experience)
    {
        $careers = Career::with('types')->where('user_id', $experience->user_id)->get();

        return view('Admin.Career.show', compact('experience', 'careers'));
    }

    public function generatePdf(Experience $experience)
    {
        $careers = Career::with('types')->where('user_id', $experience->user_id)->get();

        $pdf = PDF::loadView('generate-pdf.user-course', compact('experience', 'careers'));
        return $pdf->download(Str::slug($experience->user->name) . '.pdf');

        // return view('generate-pdf.user-course', compact('experience', 'careers'));
    }

    public function verify(Experience $experience)
    {
        $experience->update(['is_verified' => Experience::VERIFIED]);

        if (isset($experience->failMessages)) {
            $experience->failMessages->delete();
        }

        $experience->user->notify(new VerifyNotification("Your Application is Successfully Verified.👍"));

        return back()->with('status', 'This user has been Verified');
    }

    public function destroy(Experience $experience, Request $request)
    {
        $request->validate([
            'failed_reasons' => 'required'
        ]);

        if (isset($experience->failMessages)) {
            $experience->failMessages()->update([
                'failed_reasons' => $request->failed_reasons,
            ]);
        } else {
            $experience->failMessages()->create([
                'failed_reasons' => $request->failed_reasons,
            ]);
        }

        $experience->update(['is_verified' => Experience::FAILED_VERIFICATION]);

        $experience->user->notify(new VerifyNotification("Your Application is Not Verified.😞"));

        return back()->with('status', 'Done');
    }
}
