@extends('layouts.base')

@section('title')
    Checkout Page
@endsection

@section('content')
    <section class="container-fluid" id="checkout">
        <div class="row">
            <div class="col-md-12 checkout-wrapper">
                <div class="checkout-container">
                    <img src="{{ asset($course->thumbnail()) }}" alt="{{ $course->title }}">
                    <div class="checkout_card shadow">
                        <h1>{{ $course->title }}</h1>
                        <div class="d-flex mb-3"
                            style="justify-content: flex-end;flex-direction: column;align-items: flex-end">
                            <h2>₹{{ number_format($course->price()) }}</h2>
                            {{-- <h2><span class="text-secondary">(+{{ config('setting.gst.rate') }}%
                                    GST)</span>&nbsp;&nbsp;+ ₹{{ number_format($gst_price_only / 100) }}</h2>
                            <div style="width:100%;height:1px;background:gray;margin-bottom:10px;margin-top:5px"></div>
                            <h2>₹{{ number_format($gst_price / 100) }}
                            </h2> --}}
                        </div>
                        @if ($course->has_installments)
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <a href="{{ route('installment.index', $course->slug) }}?batch={{ request('batch') }}"
                                        class="pay_in_installment">pay in
                                        installment</a>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <form action="{{ route('razorpay.coupon.store', $course->slug) }}" method="get"
                                    class="apply-coupon">
                                    <input type="hidden" value="{{ request('batch') }}" name="batch">
                                    <input type="text" name="coupon" placeholder="Enter Referral Code">
                                    <button>Apply Referral</button>
                                </form>
                            </div>
                        </div>
                        <x-payment-icons />
                        <div class="row mb-1">
                            <div class="col-md-12">
                                @if (session('error'))
                                    <small class="text-danger">
                                        {{ session('error') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <label class="form-check-label" for="terms">
                                        Do you agree to the <a href="{{ route('terms') }}">Terms & Conditions</a>?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('razorpay.store', $course->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ request('batch') }}" name="batch">
                            <input type="hidden" value="{{ $course->price }}" name="course_price">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                                        data-amount="{{ $course->price }}" data-currency="INR" data-buttontext="I Agree and Buy"
                                                        data-name="Magical Umbrella Pvt. Ltd" data-description="One Stop for Learning"
                                                        data-image="{{ asset('images/logo.png') }}"
                                                        data-prefill.name="{{ auth()->user()->name }}"
                                                        data-prefill.contact="{{ auth()->user()->phone_number }}"
                                                        data-prefill.email="{{ auth()->user()->email }}" data-theme.color="#0A11DB"></script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
