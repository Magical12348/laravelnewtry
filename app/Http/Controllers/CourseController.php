<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\{
    BatchButton,
    Category,
    Course,
    CourseAdmission,
    CoursePdf,
    CourseScope,
    Installment,
    Service,
    User
};
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->isActive()->where('type', NUll)->withCount('admissions', 'installment')->get();
        $inActiveCourses = Course::with('category')->isInActive()->withCount('admissions', 'installment')->get();

        $offlineCourses = Course::with('category')->isActive()->where('type', 'summercamp')->withCount('admissions')->get();
        $comboCourses = Course::with('category')->isActive()->where('type', 'combo-pack')->withCount('admissions')->get();

        return view('Admin.Courses.index', compact('courses', 'offlineCourses', 'comboCourses', 'inActiveCourses'));
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'change_course_date_input' => 'required|date',
        ]);

        foreach (Course::where('type', NULL)->get() as $course) {
            $course->update([
                'batch_start_at' => $request->change_course_date_input,
            ]);
        }

        return redirect()->back()->with('success', 'All courses updated successfully');
    }

    public function userCourse()
    {
        $user_courses = CourseAdmission::with('course')->where('user_id', auth()->id())->get();

        return view('user.user-courses', compact('user_courses'));
    }

    public function userPdf()
    {
        $user_courses = CourseAdmission::with('course.pdfs')->where('user_id', auth()->id())->get();

        return view('user.user-pdf', compact('user_courses'));
    }

    public function userReferral()
    {
        $userReferrals=User::find(auth()->id());
        return view('user.user-referral',compact('userReferrals'));
    }

    public function createReferral()
    {
        $user=User::find(auth()->id());

        if($user){
            $user->update([
                'referral_code'=>strtoupper(substr($user->email,0,2)).substr($user->phone_number,6,10),
            ]);
        }

        return redirect()->back();

    }

    public function summerCampPdf($id)
    {
        $course = Course::find($id);

        $offline_user_courses = CourseAdmission::with('user', 'course')->where('is_online', false)->where('course_id', $id)->get();
        $online_user_courses = CourseAdmission::with('user', 'course')->where('is_online', true)->where('course_id', $id)->get();


        $pdf = PDF::loadView('generate-pdf.summercamp', compact('offline_user_courses', 'online_user_courses', 'course'));
        return $pdf->download($course->slug . '.pdf');
    }

    public function courseDetail(Course $course)
    {
        $batch_bool = $course->batch_start_at >= today();

        $user_brought = $course->userBrought();

        $course->load('scopes', 'installment', 'services');

        $installment = Installment::where('course_id', $course->id)->where('user_id', auth()->id())->first();

        return view('course-details', compact('course', 'user_brought', 'batch_bool', 'installment'));
    }

    public function courseUsers($id)
    {
        $user_courses = CourseAdmission::with('user', 'course', 'batchbuttonWithTrash')->where('course_id', $id)->get();

        $course = Course::find($id);

        $offline_user_courses = CourseAdmission::with('user', 'course')->where('is_online', false)->where('course_id', $id)->get();
        $online_user_courses = CourseAdmission::with('user', 'course')->where('is_online', true)->where('course_id', $id)->get();

        return view('Admin.internList.index', compact('user_courses', 'course', 'offline_user_courses', 'online_user_courses'));
    }

    public function AddCourseUsers($id)
    {
        $user_ids = CourseAdmission::where('course_id', $id)->pluck('user_id');

        $users = User::where('is_admin', false)
            ->whereNotIn('id', $user_ids)->latest()->get();

        return view('Admin.internList.add-user', compact('users', 'id'));
    }

    public function storeCourseUsers($id, Request $request)
    {
        $request->validate([
            'user_id' => 'required'
        ]);

        CourseAdmission::create([
            'user_id' => $request->user_id,
            'course_id' => $id,
            'payment_id' => 'ByCash',
        ]);


        return back()->with('status', 'User Added in this course');
    }

    public function courseUsersDelete($id)
    {
        CourseAdmission::where('user_id', $id)->first()->delete();

        return back()->with('status', 'user\'s course access has been removed');
    }

    public function courseAllUsersDelete($id)
    {
        $courses = CourseAdmission::where('course_id', $id)->get();

        foreach ($courses as $course) {
            $course->delete();
        }

        return back()->with('status', 'All user\'s course access has been removed');
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin.Courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $demo = Course::where('discount_price', 0)->first();

        if (isset($demo) && $request->discount_price == 0) {
            return back()->with('status', 'Offline Course Already Exists');
        }

        $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:5125',
            'demo_video' => ['required', 'mimes:mp4'],
            'excerpt' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'discount_price' => ['required'],
            'has_installments' => ['required', 'boolean'],
            'duration' => ['required'],
            'next_batch_days' => ['required'],
            'batch_start_at' => ['required', 'after:today'],
        ]);

        $imageName = time() . '.' . $request->thumbnail->extension();
        $videoName = time() . '.' . $request->demo_video->extension();

        $imagePath = $request->thumbnail->storeAs('course_thumbnails', $imageName, 'public');
        $VideoPath = $request->demo_video->storeAs('course_demo_video', $videoName, 'public');

        Course::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'has_installments' => $request->has_installments,
            'batch_start_at' => $request->batch_start_at,
            'duration' => $request->duration,
            'type' => $request->type ? $request->type : NULL,
            'next_batch_days' => $request->next_batch_days,
            'slug' => Str::slug($request->title),
            'thumbnail' => $imagePath,
            'demo_video' => $VideoPath,
        ]);

        return back()->with('status', $request->title . ' Course Added');
    }

    public function edit(Course $course)
    {
        $categories = Category::all();

        $course->load('services', 'pdfs', 'scopes', 'buttons');

        return view('Admin.Courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => ['required'],
            'category_id' => ['required'],
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:5125',
            'demo_video' => ['mimes:mp4'],
            'excerpt' => ['required'],
            'description' => ['required'],
            'next_batch_days' => ['required'],
            'price' => ['required'],
            'has_installments' => ['required', 'boolean'],
            'duration' => ['required'],
            'type' => '',
            'is_active' => ['required', 'boolean'],
            'discount_price' => ['required'],
            'batch_start_at' => ['required'],
        ]);

        $imagePath = $course->thumbnail;
        $VideoPath = $course->demo_video;

        if (request()->has('thumbnail')) {
            Storage::disk('public')->delete($imagePath);
            $imageName = time() . '.' . $request->thumbnail->extension();
            $imagePath = $request->thumbnail->storeAs('course_thumbnails', $imageName, 'public');
        }

        if (request()->has('demo_video')) {
            Storage::disk('public')->delete($VideoPath);
            $videoName = time() . '.' . $request->demo_video->extension();
            $VideoPath = $request->demo_video->storeAs('course_demo_video', $videoName, 'public');
        }

        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'has_installments' => $request->has_installments,
            'batch_start_at' => $request->batch_start_at,
            'duration' => $request->duration,
            'next_batch_days' => $request->next_batch_days,
            'type' => $request->type ? $request->type : NULL,
            'is_active' => $request->is_active,
            'thumbnail' => $imagePath,
            'demo_video' => $VideoPath,
        ]);

        return back()->with('status', 'Course Updated');
    }

    public function destroy(Course $course)
    {
        if (count($course->admissions) > 0) {
            return back()->with('status', 'Course cannot be deleted because there are interns in this course');
        }

        Storage::disk('public')->delete($course->thumbnail, $course->demo_video);

        foreach ($course->admissionsWithTrash as $trash) {
            $trash->forceDelete();
        }

        $course->delete();

        return back()->with('status', 'Course Deleted');
    }

    public function serviceStore(Request $request)
    {
        Service::create([
            'course_id' => $request->course_id,
            'services' => $request->services
        ]);

        return back()->with('status', 'Services Added');
    }

    public function serviceDelete(Service $service)
    {
        $service->delete();

        return back()->with('status', 'Services Deleted');
    }

    public function pdfStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pdf_link' => 'required|active_url',
        ]);

        CoursePdf::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'pdf_link' => $request->pdf_link,
        ]);

        return back()->with('status', 'Pdf Added');
    }

    public function pdfShow($slug)
    {
        $pdf = CoursePdf::where('slug', $slug)->first();

        return view('pdf.preview', compact('pdf'));
    }

    public function pdfDelete($id)
    {
        CoursePdf::find($id)->delete();

        return back()->with('status', 'Pdf Deleted');
    }

    public function courseBtn(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'title' => 'required',
            'shift' => 'required',
            'date' => 'required',
        ]);

        BatchButton::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'shift' => $request->shift,
            'date' => $request->date,
        ]);

        return back()->with('status', 'Course button Added');
    }

    public function btnDelete($id)
    {
        $button = BatchButton::find($id);

        $button->delete();

        return back()->with('status', 'Course button Deleted');
    }

    public function scopeStore(Request $request)
    {
        CourseScope::create([
            'course_id' => $request->course_id,
            'scope' => $request->scope
        ]);

        return back()->with('status', 'Scope Added');
    }

    public function scopeDelete(CourseScope $scope)
    {
        $scope->delete();

        return back()->with('status', 'Scope Deleted');
    }
}
