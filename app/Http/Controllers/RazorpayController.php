<?php

namespace App\Http\Controllers;

use App\Mail\ReceiptNotification;
use App\Mail\UserCourseNotification;
use App\Models\BatchButton;
use App\Models\Course;
use App\Models\CourseAdmission;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function index(Course $course)
    {
        // $gst_price = ($course->price) * 1.18;
        // $gst_price = ($course->price) * (config('setting.gst.rate') / 100 + 1);

        // $gst_price_only = $gst_price - $course->price;

        return view('checkout', compact('course'));
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

        $user = User::find(auth()->id());

        Mail::to(auth()->user()->email)->send(new ReceiptNotification($user, $course, $payment));

        foreach (config('setting.multiple_emails') as $recipient) {
            Mail::to($recipient)->send(new UserCourseNotification($user, $course));
        }

        return redirect()->route('course.details', $course->slug)->with('status', 'Congratulation, Payment Successfully Done');
    }

    public function indexOffline(Course $course)
    {
        return view('summer-camp.offine-checkout', compact('course'));
    }

    public function storeOffline(Request $request, Course $course)
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

        CourseAdmission::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'payment_id' => $payment->id,
            'is_online' => false
        ]);

        $user = User::find(auth()->id());

        Mail::to(auth()->user()->email)->send(new ReceiptNotification($user, $course, $payment));

        foreach (config('setting.multiple_emails') as $recipient) {
            Mail::to($recipient)->send(new UserCourseNotification($user, $course));
        }

        return redirect()->route('course.details', $course->slug)->with('status', 'Congratulation, Payment Successfully Done');
    }

    public function indexOnline(Course $course)
    {
        return view('summer-camp.online-checkout', compact('course'));
    }

    public function storeOnline(Request $request, Course $course)
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

        CourseAdmission::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'payment_id' => $payment->id,
            'is_online' => true
        ]);

        $user = User::find(auth()->id());

        Mail::to(auth()->user()->email)->send(new ReceiptNotification($user, $course, $payment));

        foreach (config('setting.multiple_emails') as $recipient) {
            Mail::to($recipient)->send(new UserCourseNotification($user, $course));
        }

        return redirect()->route('course.details', $course->slug)->with('status', 'Congratulation, Payment Successfully Done');
    }

    public function couponIndex(Course $course)
    {
        return view('coupon-checkout', compact('course'));
    }

    public function couponStore(Course $course, Request $request)
    {
        // mu2022 5%
        // muba1a 10%
        // mu2k22 15%
        // magic 20%
        $five_percent="muoff1"  ;        // 5 %
        $ten_percent="mutcl2"  ;        //  10 %
        $fifteen_percent="musme3" ;    //  15%
        $twenty_percent="mufnl4"  ;    //   20 %

        $batch = $request->batch;

        // if (strtolower($request->coupon) == $five_percent) {
        //     $coupon_price = ($course->price) * 1.05;

        //     $discount_price = $coupon_price - $course->price;

        //     $actual_price = $course->price - $discount_price;

        //     return view('checkout', compact('course', 'actual_price', 'discount_price', 'batch'));
        // } else if (strtolower($request->coupon) == $ten_percent) {
        //     $coupon_price = ($course->price) * 1.10;

        //     $discount_price = $coupon_price - $course->price;

        //     $actual_price = $course->price - $discount_price;

        //     return view('checkout', compact('course', 'actual_price', 'discount_price', 'batch'));
        // } else if (strtolower($request->coupon) == $fifteen_percent) {
        //     $coupon_price = ($course->price) * 1.15;

        //     $discount_price = $coupon_price - $course->price;

        //     $actual_price = $course->price - $discount_price;

        //     return view('checkout', compact('course', 'actual_price', 'discount_price', 'batch'));
        // } else if (strtolower($request->coupon) == $twenty_percent) {
        //     $coupon_price = ($course->price) * 1.20;

        //     $discount_price = $coupon_price - $course->price;

        //     $actual_price = $course->price - $discount_price;

        //     return view('checkout', compact('course', 'actual_price', 'discount_price', 'batch'));
        // } else {
        //     return back()->with('error', 'Coupon is not valid');
        // }
        $user_referal=User::where('referral_code','=',$request->coupon)->where('id','!=',auth()->id())->first();
            
        if ($user_referal) {
            $coupon_price = ($course->price) * 1.05;

            $discount_price = $coupon_price - $course->price;

            $actual_price = $course->price - $discount_price;


            Referral::create([
                'userName'=>auth()->user()->name,
                'courseName'=>$course->title,
                'coursePrice'=>$course->price,
                "referral_code"=>$request->coupon
            ]);

            return view('checkout', compact('course', 'actual_price', 'discount_price', 'batch'));
        } else {
            return back()->with('error', 'Referral is not valid');
        }







        return view('checkout', compact('course'));
    }
}
