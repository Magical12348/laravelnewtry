@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Careers</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width mb-3" style="min-height: 350px">
        <div class="row mt-0">
            <div class="col-md-6">
                <ul class="career-lists">
                    <li>
                        <h6>join with us as a tutor
                            @auth
                                @if (auth()->user()->experience->is_verified == 2 || auth()->user()->experience->is_verified == 3 || auth()->user()->experience->is_verified == 4)
                                    <a href="{{ route('career.add.course.index') }}">here</a>.
                                @else
                                    <a href="{{ route('career.experience.index') }}">here</a>.
                                @endif
                            @else
                                <a href="{{ route('career.experience.index') }}">sign up for joining</a>.
                            @endauth
                        </h6>
                        <a href="{{ route('career.term') }}" style="font-size: 16px;text-transform: capitalize">click here
                            for
                            more details</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 p-0">
                <img src="{{ asset('images/3236267.jpg') }}" alt="career image" class="career_list_image">
            </div>
        </div>
    </section>
@endsection
