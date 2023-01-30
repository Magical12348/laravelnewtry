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
                        <div class="row mb-1">
                            <div class="col-md-12">
                                @if (session('error'))
                                    <small class="text-danger">
                                        {{ session('error') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('razorpay.offline.store', $course->slug) }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $course->price }}" name="course_price">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                                        data-amount="{{ $course->price }}" data-currency="INR"
                                                        data-buttontext="I Agree And Checkout" data-name="Magical Umbrella Pvt. Ltd"
                                                        data-description="One Stop for Learning" data-image="{{ asset('images/logo.png') }}"
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
