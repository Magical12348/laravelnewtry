@extends('layouts.base')

@section('title')
    My Courses
@endsection

@section('content')
    <section class="container-fluid " id="courses" style="min-height: 87.5vh">
        <div class="row m-0">
            <div class="course_title pt-3">
                <h2>My Courses</h2>
            </div>
            @forelse ($user_courses as $user_course)
                <div class="col-md-4 col-sm-6 mt-4 max_width">
                    <div class="card card-manage">
                        <a href="{{ route('course.details', $user_course->course->slug) }}">
                            <img src="{{ asset($user_course->course->thumbnail()) }}" class="card-img-top"
                                alt="{{ $user_course->course->title }}" height="200">
                        </a>
                        <div class="card-body">
                            <a href="{{ route('course.details', $user_course->course->slug) }}">
                                <h5 class="card-title">{{ $user_course->course->title }}</h5>
                            </a>
                            <p class="card-text">{{ $user_course->course->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 mt-4" id="not-course">
                    <span>oop's...!</span>
                    <p><br>you did not purchase any course.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('app.js') }}"></script>
@endsection
