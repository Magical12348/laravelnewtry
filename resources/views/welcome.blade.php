@extends('layouts.base')

@section('title')
    Home Page
@endsection

@section('metatags')
    <meta name="description"
        content="Magical Umbrella is an Ed-tech company. We provide Courses, training, Internship and Placement assistance at top IT companies like Accenture, TCS, Wipro, Capgemini, Cognizant, Persistent, Infosys, Mphasis, Mindtree, I &T InfoTech, Tech Mahindra, Zoho, Hdata and many more. Courses offered by us are full Stack Development, Manual & Automation Testing, Python, Amazon Web Services, Java, My SQL, Database, Front-End designing and many more courses.">
@endsection

@section('content')
    <div style="overflow: hidden">
        <h1 style="position: absolute;left:-200%">Magical Umbrella Private Limited</h1>
    </div>
    @guest
        <x-contact-popup />
    @endguest
    {{-- <div id="dropaquery" close="true">
        <div class="header" onclick="openDrop()">
            <span>drop a query</span>
            <span id="drow-arrow">&DownArrow;</span>
        </div>
        <div class="content" id="dropaquery-content">
            <div class="content-details">
                available 24/7 for your queries.
            </div>
            <form class="form" action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" class="hero-form-control" id="name" name="name" placeholder="eg. Ram, Ajay "
                        autocomplete="off" />
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number :</label>
                    <input type="number" class="hero-form-control" id="phone_number" name="phone_number"
                        placeholder="eg. 8784756393" autocomplete="off" />
                    @error('phone_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn-form">enquiry</button>
            </form>
        </div>
    </div> --}}
    {{-- <div class="space-20"></div> --}}
    <div class="space-20 mt-3 overflow-strip"> <marquee style="font-size:20px;"><b>Our aim is to provide education at very minimal cost and make our India digitally develop.</b></marquee></div>
    <div class="space-30"></div>
    {{-- <div class="space-60"></div> --}}
    @auth
        <div class="container-fluid">
            @foreach ($due_dates as $date)
                @if (now() > $date->due_date->subDays(5))
                    <div class="alert alert-danger fw-bold fs-5" role="alert">
                        Payment Pending : {{ $date->course->title }}, Due Date : {{ $date->due_date->diffForHumans() }}
                    </div>
                @endif
            @endforeach
        </div>
    @endauth
    <section class="container-fluid hero-section-wel" id="hero-section">
        <div class="row max_width">
            <div class="col-md-4 hero-card">
                <div class="view-card">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="feedback-title">
                            <h4 class="fw-bold text-capitalize">for more info on any course :</h4>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name :</label>
                            <input type="text" class="hero-form-control" id="name" name="name"
                                placeholder="eg. Ram, Ajay " autocomplete="off" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number :</label>
                            <input type="number" class="hero-form-control" id="phone_number" name="phone_number"
                                placeholder="eg. 8784756393" autocomplete="off" />
                            @error('phone_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn-form">enquiry</button>
                    </form>
                </div>
            </div>
            <div class="col-md-1 mobile-hide"></div>
            <div class="col-md-5 images" style="align-items: flex-start">
                <a href="#courses" style="margin-top: 25px">
                    <img src="{{ asset('images/mega.webp') }}" alt="">
                </a>
            </div>
            <div class="col-md-1 mobile-hide"></div>
            <div class="col-md-1 mobile-hide" style="position: relative;">
                <img src="{{ asset('images/iso_prev_ui.png') }}" class="iso_image" alt="">
            </div>
        </div>
    </section>

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
                <div class="name">C Lang</div>
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

    <div class="container">
        <h2><b>OUR DEVELOPERS GOT PLACED AT:</b></h2>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($placement_details as $placement_detail)
                <div class="swiper-slide">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 90%">
                        <img src="{{$placement_detail->image()}}" alt="image">
                        <h5>
                            <b> <li> {{$placement_detail->full_name}} </li>
                            <div class="color"><li>{{$placement_detail->company_name}}</li></div>
                            <li>{{$placement_detail->package}} LPA</li> </b>
                        </h5>
                    </div>
                </div>
                @endforeach
                {{-- <div class="swiper-slide">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 90%">
                        <img src="images/img1.png" alt="image">
                        <h5>
                            <b> <li> Mayur Shrirame </li>
                            <div class="color"><li>Zimentrics Technologies</li></div>
                            <li>3.6 LPA</li> </b>
                        </h5>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 90%">
                        <img src="images/img2.jpeg" alt="image">
                        <h5>
                            <b> <li> Aditya Daberao </li>
                            <div class="color"><li>Altimetrik India </li></div>
                            <li>12 LPA</li> </b>
                        </h5>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 90%">
                        <img src="images/img3.jpeg" alt="image">
                        <h5>
                            <b> <li> Shivani Biswas</li>
                            <div class="color"><li>Proenx Pvt. Ltd</li></div>
                            <li>5.5 LPA</li> </b>
                        </h5>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 90%">
                        <img src="images/img4.jpeg" alt="image">
                        <h5>
                            <b> <li> Sneha Goudi</li>
                            <div class="color"><li>Infosys Limited</li></div>
                            <li>3.6 LPA</li> </b>
                        </h5>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="shadow p-3 mb-5 bg-body rounded" style="width: 90%">
                        <img src="images/img5.jpeg" alt="image">
                        <h5>
                            <b> <li> Ankita Jangade</li>
                            <div class="color"><li>Trust Systems and Softwares </li></div>
                            <li>4 LPA</li> </b>
                        </h5>
                    </div>
                </div> --}}
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


    {{-- <div class="space-20"></div> --}}
    <section class="container-fluid max_width" id="services" style="min-height:200px">
        <div class="row">
            <x-companies />
        </div>
    </section>
    <section class="container-fluid " id="iso_number">
        <div class="row max_width">
            <div class="col-md-1">
                <img src="{{ asset('images/iso_prev_ui.png') }}" alt="iso_number">
            </div>
            <div class="col-md-4 cin">
                <span>cin no: {{ config('setting.cin.number') }}</span>
            </div>
        </div>
    </section>
    {{-- <div class="space-20"></div>
    <section class="container-fluid max_width" id="imageText">
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
        // const DropContent = document.getElementById("dropaquery");

        // function openDrop() {
        //     if (DropContent.getAttribute('close')) {
        //         DropContent.removeAttribute("close")
        //     } else {
        //         DropContent.setAttribute("close", true);
        //     }
        // }

        function contactClosePopup() {
            document.getElementById("contact-popup").removeAttribute("open");
        }

        window.addEventListener('toastr:success', e => {
            contactClosePopup()
        })
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            // slidesPerView: 4,
            // spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      // when window width is >= 480px
      720: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      // when window width is >= 640px
      1080: {
        slidesPerView: 5,
        spaceBetween: 50
      }
        }});
    </script>



@endsection
