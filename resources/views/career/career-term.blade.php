@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid max_width mb-3" style="min-height: 600px">
        <div class="space-20"></div>
        <div class="space-20"></div>
        <div class="space-20"></div>
        <div class="space-20"></div>

        <div class="row" style="font-size:20px">
            <p><span class="fw-bold">Job Profile:</span> This
                Job profile is to add your courses with us in our website. Your Valuable
                Knowledge can be shared and required person can acquire it. As sharing
                knowledge can make you even more knowledgeable, Magical Umbrella Invites you to
                take one step further and everyone grows together.</p>
            <p class="fw-bold">Required Skills</p>
            <ul style="margin-left:30px">
                <li>Required good academic record.</li>
                <li>Requires reasoning and communication skills.</li>
                <li>Able to explain complex concepts in simple ways.</li>
                <li>Good command in English.</li>
                <li>Should know Microsoft Office - Word, Excel &amp; Power-point.</li>
            </ul>
            <p><span class="fw-bold">Role of job:</span>
                Online Faculty </p>
            <p><span class="fw-bold">Location:</span> Chandrapur,
                Maharashtra</p>
            <p><span class="fw-bold"> Salary Range:</span>
                Depends upon Verification of application form and your Skills.</p>
        </div>
        <div class="row mt-0">
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
                </li>
            </ul>
        </div>
    </section>
@endsection
