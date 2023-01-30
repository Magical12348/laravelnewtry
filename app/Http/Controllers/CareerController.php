<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\CourseType;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    public function list()
    {
        return view('career.lists');
    }

    public function term()
    {
        return view('career.career-term');
    }

    public function index()
    {
        if (auth()->user()->experience->is_verified  == Experience::UNVERIFIED) {
            return view('career.experience');
        }

        $user_courses = Career::with('types')->where('user_id', auth()->id())->get();

        return view('career.courseAdd.index', compact('user_courses'));
    }

    public function createCareerCourse()
    {
        return view('career.courseAdd.create-career-course');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_of_course' => 'required',
            'other_name_of_course' => 'required_if:name_of_course,other',
            'course_description' => 'required',
            'syllabus' => 'required',
            'course_keyword' => 'required',
            'have_pre_requisite' => 'required',
            'tell_pre_requisite',
            'opportunity_after_course' => 'required',
            'have_mock_test_interview' => 'required',
            'conduct_lecture' => 'required',
        ]);

        $course = Career::create([
            'user_id' => auth()->id(),
            'name_of_course' => $request->name_of_course,
            'other_name_of_course' => $request->name_of_course == 'other' ? $request->other_name_of_course : NULL,
            'course_description' => $request->course_description,
            'syllabus' => $request->syllabus,
            'course_keyword' => $request->course_keyword,
            'have_pre_requisite' => $request->have_pre_requisite,
            'tell_pre_requisite' => $request->tell_pre_requisite,
            'opportunity_after_course' => $request->opportunity_after_course,
            'have_mock_test_interview' => $request->have_mock_test_interview,
            'conduct_lecture' => $request->conduct_lecture,
        ]);

        return redirect()->route('career.course.type.create', $course->id)->with('status', $course->name_of_course . ' Course Added. Please fill what type of course is this.');
    }

    public function editCareerCourse(Career $career)
    {
        return view('career.courseAdd.edit-career-course', compact('career'));
    }

    public function updateCareerCourse(Request $request, Career $career)
    {
        $request->validate([
            'name_of_course' => 'required',
            'other_name_of_course' => 'required_if:name_of_course,other',
            'course_description' => 'required',
            'syllabus' => 'required',
            'course_keyword' => 'required',
            'have_pre_requisite' => 'required',
            'tell_pre_requisite',
            'opportunity_after_course' => 'required',
            'have_mock_test_interview' => 'required',
            'conduct_lecture' => 'required',
        ]);

        $career->update([
            'name_of_course' => $request->name_of_course,
            'other_name_of_course' => $request->name_of_course == 'other' ? $request->other_name_of_course : NULL,
            'course_description' => $request->course_description,
            'syllabus' => $request->syllabus,
            'course_keyword' => $request->course_keyword,
            'have_pre_requisite' => $request->have_pre_requisite,
            'tell_pre_requisite' => $request->tell_pre_requisite,
            'opportunity_after_course' => $request->opportunity_after_course,
            'have_mock_test_interview' => $request->have_mock_test_interview,
            'conduct_lecture' => $request->conduct_lecture,
        ]);

        return redirect()->route('career.add.course.index')->with('status', 'Course Type Updated');
    }

    public function typeCreate(Career $career)
    {
        return view('career.courseAdd.create', compact('career'));
    }

    public function typeStore(Request $request, Career $career)
    {
        $request->validate([
            'course_type' => 'required',
            'module_level' => 'required',
            'days_of_modules' => 'required',
            'timing_from' => 'required',
            'timing_to' => 'required',
            'is_job_guaranteed' => 'required',
            'note_available' => 'required',
            'provide_certificate' => 'required',
            'course_fees' => 'required',
            'demo_image.*' => 'image',
            'demo_video' => 'mimes:mp4',
        ]);

        $slugName = Str::slug(auth()->user()->name);

        if ($request->has('demo_image')) {

            foreach ($request->demo_image as $key => $image) {
                $demoImageName = time() . '-' . $key . '.' . $image->extension();
                $demoImagePath = $image->storeAs('career_tutor_images/' . $slugName, $demoImageName, 'public');
                $imageArr[] = $demoImagePath;
            }
        }

        if ($request->has('demo_video')) {
            $demoVideoName = time() . '.' . $request->demo_video->extension();
            $demoVideoPath = $request->demo_video->storeAs('career_tutor_videos', $demoVideoName, 'public');
        }

        CourseType::create([
            'career_id' => $career->id,
            'course_type' => $request->course_type,
            'module_level' => json_encode($request->module_level),
            'days_of_modules' => $request->days_of_modules,
            'timing_from' => $request->timing_from,
            'timing_to' => $request->timing_to,
            'is_job_guaranteed' => $request->is_job_guaranteed,
            'note_available' => $request->note_available,
            'provide_certificate' => $request->provide_certificate,
            'course_fees' => $request->course_fees,
            'demo_image' => $request->has('demo_image') ? json_encode($imageArr) : NULL,
            'demo_video' => $request->has('demo_video') ? $demoVideoPath : NULL,
        ]);

        return redirect()->route('career.add.course.index')->with('status', 'Course Type Added');
    }

    public function typeEdit($id)
    {
        $type = CourseType::find($id);

        return view('career.courseAdd.edit', compact('type'));
    }

    public function typeUpdate(Request $request, $id)
    {
        $request->validate([
            'course_type' => 'required',
            'module_level' => 'required',
            'days_of_modules' => 'required',
            'timing_from' => 'required',
            'timing_to' => 'required',
            'is_job_guaranteed' => 'required',
            'note_available' => 'required',
            'provide_certificate' => 'required',
            'course_fees' => 'required',
            'demo_image.*' => 'image',
            'demo_video' => 'mimes:mp4',
        ]);

        $type = CourseType::find($id);

        $slugName = Str::slug(auth()->user()->name);

        $imageArr = json_decode($type->demo_image);
        $demoVideoPath = $type->demo_video;

        if ($request->has('demo_image')) {
            Storage::disk('public')->deleteDirectory('career_tutor_images/' . $slugName);
            $imageArr = [];
            foreach ($request->demo_image as $key => $image) {
                $demoImageName = time() . '-' . $key . '.' . $image->extension();
                $demoImagePath = $image->storeAs('career_tutor_images/' . $slugName, $demoImageName, 'public');
                $imageArr[] = $demoImagePath;
            }
        }

        if ($request->has('demo_video')) {
            Storage::disk('public')->delete($demoVideoPath);
            $demoVideoName = time() . '.' . $request->demo_video->extension();
            $demoVideoPath = $request->demo_video->storeAs('career_tutor_videos', $demoVideoName, 'public');
        }

        $type->update([
            'course_type' => $request->course_type,
            'module_level' => json_encode($request->module_level),
            'days_of_modules' => $request->days_of_modules,
            'timing_from' => $request->timing_from,
            'timing_to' => $request->timing_to,
            'is_job_guaranteed' => $request->is_job_guaranteed,
            'note_available' => $request->note_available,
            'provide_certificate' => $request->provide_certificate,
            'course_fees' => $request->course_fees,
        ]);

        if ($request->has('demo_image')) {
            $type->demo_image = json_encode($imageArr);
        }

        if ($request->has('demo_video')) {
            $type->demo_video = $demoVideoPath;
        }

        $type->save();

        return redirect()->route('career.add.course.index')->with('status', 'Course Type Updated');
    }

    public function typeDestroy($id)
    {
        $type = CourseType::find($id);
        if (isset($type->demo_image)) {
            Storage::disk('public')->delete(json_decode($type->demo_image));
        }

        if (isset($type->demo_video)) {
            Storage::disk('public')->delete($type->demo_video);
        }
        $type->delete();

        return back();
    }

    public function destroy(Career $career)
    {
        if (isset($career->types)) {
            foreach ($career->types as $type) {
                if (isset($type->demo_image)) {
                    Storage::disk('public')->delete(json_decode($type->demo_image));
                }

                if (isset($type->demo_video)) {
                    Storage::disk('public')->delete($type->demo_video);
                }

                $type->delete();
            }
        }

        $career->delete();

        return back()->with('status', 'Course Deleted Successfully');
    }
}
