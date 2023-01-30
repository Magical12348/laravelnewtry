@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Your Courses</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width my-3">
        <div class="row">
            <div class="col-md-12" id="about_description">
                <p>
                    We hope you enjoy our products and services as much as we enjoy offering them to you. If you have any
                    questions or comments, please contact us.
                </p>
            </div>
        </div>
    </section>
    <section class="container-fluid max_width mb-3">
        <div class="row mt-3">
            @if (auth()->user()->experience->is_verified == 3)
                <div class="col-md-12" style="display:grid;place-items:center">
                    <h2 class="text-success" style="font-size:30px">
                        Your Document Verification Has Failed!
                    </h2>
                </div>
                <div class="col-md-12" style="display:grid;place-items:center">
                    <div class="col-md-12 alert alert-danger" role="alert">
                        {{ auth()->user()->experience->failMessages->failed_reasons }}
                    </div>
                </div>
            @endif
            @if (auth()->user()->experience->is_verified == 2)
                <div class="col-md-12" style="display:grid;place-items:center">
                    <h2 class="text-success" style="font-size:30px">
                        Your Document is Being Verified.
                    </h2>
                </div>
            @endif
        </div>
    </section>
    <section class="container-fluid max_width px-4">
        <div class="row mb-3">
            <div class="col-md-12" style="display:flex;justify-content: flex-end">
                <a href="{{ route('career.create.course.index') }}" class="btn btn-primary">Add Course</a>
            </div>
        </div>
        <div class="row">
            @forelse ($user_courses as $course)
                <div class="col-md-12 mb-3">
                    <div id="career-course-card" class="row">
                        <div class="col-md-4 career-course-title">
                            <span class="career-course-span">your course</span>
                            <h3>{{ $course->name_of_course == 'other' ? $course->other_name_of_course : $course->name_of_course }}
                            </h3>
                            <div class="course-btn">
                                <a class="edit" href="{{ route('career.edit.course.index', $course) }}"
                                    title="Edit Course">
                                    <x-icons.edit />
                                </a>
                                <form action="{{ route('career.add.course.destroy', $course) }}" method="post">
                                    @csrf @method('delete')
                                    <button type="submit" class="delete" title="Delete Course">
                                        <x-icons.trash />
                                    </button>
                                </form>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 career-course-content">
                            <span class="career-course-span">type</span>
                            <div class="type-container">
                                @forelse ($course->types as $type)
                                    <div class="types">
                                        <span class="type-course">{{ $type->course_type }}</span>
                                        <div class="price">{{ $type->days_of_modules }} Days</div>
                                        <div class="price">Rs. {{ $type->course_fees }}</div>
                                        <div class="btns">
                                            <a href="{{ route('career.course.type.edit', $type->id) }}"
                                                class="edit" title="Edit this course type">
                                                <x-icons.edit />
                                            </a>
                                            <form action="{{ route('career.course.type.destroy', $type->id) }}"
                                                method="post">
                                                @csrf @method('delete')
                                                <button type="submit" class="delete"
                                                    title="Delete this course type">
                                                    <x-icons.trash />
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="types">
                                        <span class="type-course">Click '+' button to add course type</span>
                                    </div>
                                @endforelse
                            </div>
                            <div class="course-btn">
                                <a href="{{ route('career.course.type.create', $course) }}" class="add"
                                    title="Add type of this course">
                                    <x-icons.add />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <h3>No Course Added.</h3>
                </div>
            @endforelse
        </div>
    </section>
    <div class="space-20"></div>
@endsection

@section('scripts')
    <script>
        const toggleDisabledPreRequisite = () => {
            const havePreRequisite = document.querySelector('#have_pre_requisite');
            const tellPreRequisite = document.querySelector('#tell_pre_requisite');
            if (havePreRequisite.value == 0) {
                tellPreRequisite.setAttribute('disabled', "");
            }

            if (havePreRequisite.value == 1) {
                tellPreRequisite.removeAttribute('disabled');
            }
        }
    </script>

    <script type="module">
        import Tags from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-tags@master/tags.js";
        Tags.init(".taggable");
    </script>
@endsection
