@extends('layouts.base')

@section('title')
    Combo Pack Courses
@endsection

@section('metatags')
    <meta name="description"
        content="Welcome to Magical Umbrella Private Limited, your number one source for computer programming. We're dedicated to giving you the very best of learning.">
@endsection

@section('content')
    <div style="overflow: hidden">
        <h1 style="position: absolute;left:-200%">Magical Umbrella Private Limited</h1>
    </div>
    <div class="space-20"></div>
    <section class="container-fluid hero-section-bg-blue" id="hero-section">
        <div class="row max_width">
            <div class="col-md-4 hero-content">
                <h2>Combo Pack Courses</h2>
                <p>Join our Combo Pack<br>
                <ul>
                    @foreach ($courses as $course)
                        <li>{{ $course->title }}</li>
                    @endforeach
                </ul>
                </p>
            </div>
            <div class="col-md-3 mobile-hide"></div>
            <div class="col-md-4 images">
                <img style="width: 350px" src="{{ asset('images/kids-course.png') }}" alt="">
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <x-courses :courses="$courses" />
    <div class="space-20"></div>
    <section class="container-fluid max_width" id="summer-course-review">
        <div class="row">
            <div class="col-md-12">
                <div class="title">reviews</div>
            </div>
        </div>
        <div class="review-grid">
            <div class="review-card">
                <div class="name">C</div>
                <p>
                    <q>
                        It was an excellent experience. They teach point to point on each and every topic.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">C++</div>
                <p>
                    <q>
                        They make oops understanding very easy. Explanation was fantastic.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">Personality Development</div>
                <p>
                    <q>
                        Here we learned many soft skills and I have seen the difference in myself.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">Computer Fundamentals</div>
                <p>
                    <q>
                        It was very easy to understand hardware and software of computer.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">Python</div>
                <p>
                    <q>
                        The concepts of oop’s and syntax learning was explained in very easy way.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">Personality Development</div>
                <p>
                    <q>
                        Communication, body language and also dressing code has have changed.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">C Language</div>
                <p>
                    <q>
                        Now it is very easy to code. Thank you, Magical Umbrella.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">Computer Fundamentals</div>
                <p>
                    <q>
                        Basic know is always the best part and making learn so easily is even better.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">C++</div>
                <p>
                    <q>
                        Now I don’t have fear to code. It’s so easy for me.
                    </q>
                </p>
            </div>
            <div class="review-card">
                <div class="name">Python</div>
                <p>
                    <q>
                        I have learned lot and exploring with you even more.
                    </q>
                </p>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <section class="container-fluid max_width" id="services" style="min-height:200px">
        <div class="row">
            <x-companies />
        </div>
    </section>
    {{-- <div class="space-20"></div> --}}
    {{-- <section class="container-fluid max_width" id="imageText">
        <div class="row flipped m-1 p-3 shadow-lg rounded">
            <div
                class="
              col-md-6
              image
              d-flex
              justify-content-center
              align-items-center
            ">
                <img class="form_logo mobile-hide" src="{{ asset('images/contact.jpg') }}"
                    alt="contact illustration image" />
            </div>
            <div class="col-md-6 card shadow card_container">
                @livewire('contact-form')
            </div>
        </div>
    </section> --}}
@endsection

@section('scripts')
    <script>
        const nav = document.getElementById("navbar");
        // const changeImage = document.getElementById("changeImage");
        const Popup = document.querySelector('#modified_popup');

        window.addEventListener("scroll", (e) => {
            if (this.scrollY > 30) {
                nav.classList.add("shadow-box");
            } else {
                nav.classList.remove("shadow-box");
            }
        });
    </script>
@endsection
