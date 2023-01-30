@extends('layouts.base')

@section('title')
    {{ $course->title }}
@endsection

@php
$personality = 'personality-development-course';
@endphp

@section('content')
    <x-popup />
    <section class="container-fluid " id="course-hero" x-data="{ open: false }">
        <marquee direction="left" scrollamount="10" class="background-text course-margin">
            <span>{{ $course->title }}</span>
        </marquee>
        <marquee direction="right" scrollamount="10" class="background-text course-padding">
            <span>{{ $course->title }}</span>
        </marquee>
        <div class="row max_width flex_reverse ">
            <div class="col-sm-6 mobile_margin_top desktop_flex_center" data-aos="fade-right" data-aos-duration="1000">
                <h1>{{ $course->title }}</h1>
                @if ($course->slug == $personality)
                    <h1 style="text-transform:none">by Soniya Jadaji</h1>
                @endif
                <p style="text-align:justify">{{ $course->excerpt }}</p>
                @if (!$user_brought)
                    <div class="price mobile_hide">
                        <h2>₹{{ number_format($course->price()) }}</h2>
                        @if ($course->discount_price !== 0)
                            <span>₹{{ $course->discountPrice() }}</span>
                        @endif
                        @if ($course->discount_price == 0)
                            <span>₹{{ number_format(140000) }}</span>
                        @endif
                    </div>
                    <h2 class="fw-bold text-white fs-5">
                        (EMI BY CREDIT CARD @if ($course->has_installments)
                            / Installments
                        @endif Available)
                    </h2>
                    @if (count($course->buttons) > 0)
                        <span class="text-white fw-bold fs-4 text-capitalize mb-2">to enroll in below batches :</span>
                    @endif
                    <div class="buy_btn">
                        @forelse ($course->buttons as $button)
                            <a href="{{ route('razorpay.coupon.index', $course->slug) }}?batch={{ $button->slug }}"
                                class="d-flex flex-column">
                                <span class="fs-6">{{ $button->shift }}</span>
                                <span class="fs-5">{{ $button->date->format('d M Y') }}</span>
                                <span class="fs-6">(click here)</span>
                            </a>
                        @empty
                            <a href="{{ route('razorpay.coupon.index', $course->slug) }}">get course</a>
                        @endforelse
                    </div>
                @else
                    <div class="price" style="display: flex;flex-direction: column;">
                        @if (session('status'))
                            <h2 style="font-size: 20px" class="text-success">
                                {{ session('status') }}
                            </h2>
                        @endif
                        <h2 style="font-size: 20px">You will Be Notified By Mail and SMS</h2>
                    </div>
                    @auth
                        @if (isset($installment->payment_status) && $installment->payment_status == 'half')
                            <div class="price">
                                <h2 style="font-size: 18px">Due date : {{ $installment->due_date->format('d M Y') }}</h2>
                            </div>
                            <div class="buy_btn">
                                <a href="{{ route('installment.edit', $course->slug) }}">Pay Remaining</a>
                            </div>
                        @endif
                    @endauth
                @endif
            </div>
            <div class="col-sm-6 desktop_flex_center">
                <div class="image" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ asset($course->thumbnail()) }}" alt="{{ $course->title }}">
                    <button class="play_btn" @click="open = true;var video = document.getElementById('video').play();">
                        <img src="{{ asset('images/play.png') }}" />
                    </button>
                </div>
            </div>
        </div>
        <div id="video_overlay" x-bind:class="open ? 'active' : ''">
            <div class="video_container">
                <div class="close" @click="open = false;var video = document.getElementById('video').pause();">
                    <svg x="0px" y="0px" width="30" height="30" viewBox="0 0 172 172"
                        style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#0000ff">
                                <path
                                    d="M40.13333,22.93333c-1.46702,0 -2.93565,0.55882 -3.05365,1.67969l-11.46667,11.46667c-2.24173,2.24173 -2.24173,5.87129 0,8.10729l41.81302,41.81302l-41.81302,41.81302c-2.24173,2.24173 -2.24173,5.87129 0,8.10729l11.46667,11.46667c2.24173,2.24173 5.87129,2.24173 8.10729,0l41.81302,-41.81302l41.81302,41.81302c2.236,2.24173 5.87129,2.24173 8.10729,0l11.46667,-11.46667c2.24173,-2.24173 2.24173,-5.87129 0,-8.10729l-41.81302,-41.81302l41.81302,-41.81302c2.24173,-2.236 2.24173,-5.87129 0,-8.10729l-11.46667,-11.46667c-2.24173,-2.24173 -5.87129,-2.24173 -8.10729,0l-41.81302,41.81302l-41.81302,-41.81302c-1.12087,-1.12087 -2.58663,-1.67969 -4.05365,-1.67969z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </div>
                <video id="video" src="{{ asset($course->demoVideo()) }}" preload="auto" controls></video>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    @if ($course->slug == $personality)
        <section class="container-fluid" id="personality-test">
            <div class="row m-0">
                <div class="col-md-12">
                    <marquee behavior="scroll" direction="left">
                        Get your personality test results <button class="personality-btn"
                            onclick="openPopup()">Here</button>
                    </marquee>
                </div>
            </div>
        </section>
    @endif
    <section class="container-fluid max_width" id="description">
        @if ($course->slug == $personality)
            <div class="row mb-3">
                <div class="col-md-3">
                    <iframe style="width: 100%;height:200px" src="https://www.youtube.com/embed/IpByryddOWo"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-3">
                    <iframe style="width: 100%;height:200px" src="https://www.youtube.com/embed/fMrW7yORjN8"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-3">
                    <iframe style="width: 100%;height:200px" src="https://www.youtube.com/embed/sPxVGzqVUYM"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-3">
                    <iframe style="width: 100%;height:200px" src="https://www.youtube.com/embed/hq-Rkz7ur50"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <div class="col-md-3">
                    <iframe style="width: 100%;height:200px" src="https://www.youtube.com/embed/LtSgB4nmNbQ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-7">
                <div class="course_description">

                    <h3>courses description.</h3>

                    <p style="text-align: justify">{!! $course->description !!}</p>
                </div>
            </div>
            <div class="col-md-5">
                @if (count($course->services))
                    <div class="course_description">
                        <h3>services</h3>
                        <ul>
                            @foreach ($course->services as $item)
                                <li>{{ $item->services }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (count($course->scopes))
                    <div class="course_description">
                        <h3>Scope of {{ $course->title }}</h3>

                        <ul>
                            @foreach ($course->scopes as $item)
                                <li>{{ $item->scope }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        const Popup = document.querySelector('#modified_popup');

        function openPopup() {
            Popup.classList.add("popup_active");
        }

        function closePopup() {
            Popup.classList.remove("popup_active");
        }
    </script>
@endsection
