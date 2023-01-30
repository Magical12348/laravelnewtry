<?php

namespace App\Http\Controllers;

use App\Mail\{ReceiptNotification, UserCourseNotification};
use App\Models\{BatchButton, Course, CourseAdmission, Installment, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class InstallmentController extends Controller
{
    public function index(Course $course)
    {
        if (!$course->has_installments) {
            return back();
        }

        $half_price = ($course->price) / 2;

        return view('installment.checkout', compact('course', 'half_price'));
    }

    public function store(Request $request, Course $course)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $request->course_price));
            } catch (\Exception $e) {

                return back()->with('error', $e->getMessage());
            }
        }

        $batch = BatchButton::where('slug', $request->batch)->first();

        CourseAdmission::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'payment_id' => $payment->id,
            'batch_button_id' => $batch ? $batch->id : NULL
        ]);

        $r_amount = $course->price - $payment->amount;

        Installment::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'r_amount' => $r_amount,
            'payment_status' => Installment::STATUS_HALF,
            'due_date' => now()->addDays(config('setting.due_date.days'))
        ]);

        $user = User::find(auth()->id());

        Mail::to(auth()->user()->email)->send(new ReceiptNotification($user, $course, $payment));

        foreach (config('setting.multiple_emails') as $recipient) {
            Mail::to($recipient)->send(new UserCourseNotification($user, $course));
        }

        return redirect()->route('course.details', $course->slug)->with('status', 'Congratulation, Half Payment Successfully Done');
    }

    public function show(Course $course)
    {
        $installments = Installment::where('course_id', $course->id)->get();

        return view('installment.show', compact('course', 'installments'));
    }

    public function edit(Course $course)
    {
        $installment = Installment::where('course_id', $course->id)->where('user_id', auth()->id())->first();

        return view('installment.edit', compact('course', 'installment'));
    }

    public function update(Request $request, Course $course, Installment $installment)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $request->course_price));
            } catch (\Exception $e) {

                return back()->with('error', $e->getMessage());
            }
        }

        $installment->update([
            'r_amount' => 0,
            'payment_status' => Installment::STATUS_FULL,
            'due_date' => NULL
        ]);

        $user = User::find(auth()->id());

        Mail::to(auth()->user()->email)->send(new ReceiptNotification($user, $course, $payment));

        foreach (config('setting.multiple_emails') as $recipient) {
            Mail::to($recipient)->send(new UserCourseNotification($user, $course));
        }

        return redirect()->route('course.details', $course->slug)->with('status', 'Congratulation, Full Payment Successfully Done');
    }
}
