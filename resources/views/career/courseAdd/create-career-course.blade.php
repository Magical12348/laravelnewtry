@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Add Courses</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width my-3">
        <div class="row p-3">
            <div class="col-md-12 career-active" id="career_progress">
                <a href="{{ route('career.experience.index') }}" class="progress-item">
                    <span class="progress-text">
                        <span class="progress-number">1</span>
                        teaching profile
                    </span>
                </a>
                <a href="#" class="progress-item career-active">
                    <span class="progress-text">
                        <span class="progress-number">2</span>
                        add course
                    </span>
                </a>
                <a href="#" class="progress-item">
                    <span class="progress-text">
                        <span class="progress-number">3</span>
                        course type
                    </span>
                </a>
            </div>
        </div>
    </section>
    <section class="container-fluid max_width mb-3">
        <div class="row mt-3">
            @if (auth()->user()->experience->is_verified == 3)
                <div class="col-md-12" style="display:grid;place-items:center">
                    <h4 class="text-danger" style="font-size:25px">
                        Your Document Verification Has Failed!
                    </h4>
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
    <section class="container-fluid max_width my-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('career.add.course.store') }}" method="post" class="card" id="careers-form">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="name_of_course" class="form-label">Name of Course<span style="color:red">*</span>
                        ?</label>
                    <select class="form-select" id="name_of_course" name="name_of_course"
                        onchange="handleSelectCourse()">
                        <option selected disabled>-select-</option>

                        @foreach (config('setting.select_courses') as $s_course)
                            <option {{ old('name_of_course') == $s_course ? 'selected' : '' }}
                                value="{{ $s_course }}">{{ $s_course }}
                            </option>
                        @endforeach
                    </select>
                    @error('have_pre_requisite')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3" style="display: none" id="other_name_of_course_container">
                    <label for="other_name_of_course" class="form-label">Other :</label>
                    <input type="text" class="form-control" id="other_name_of_course" name="other_name_of_course"
                        value="{{ old('other_name_of_course') }}">
                    @error('other_name_of_course')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="course_description" class="form-label">Course Description<span
                            style="color:red">*</span> :</label>
                    <textarea class="form-control" id="course_description" name="course_description"
                        rows="4">{{ old('course_description') }}</textarea>
                    @error('course_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="syllabus" class="form-label">Syllabus<span style="color:red">*</span>
                        :</label>
                    <textarea class="form-control" id="syllabus" name="syllabus" rows="4">{{ old('syllabus') }}</textarea>
                    @error('syllabus')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="course_keyword" class="form-label">Course Keywords<span style="color:red">*</span>
                        :</label>
                    <textarea class="form-control" id="course_keyword" name="course_keyword"
                        rows="2">{{ old('course_keyword') }}</textarea>
                    @error('course_keyword')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="have_pre_requisite" class="form-label">In this course, students need any
                        pre-requisite
                        knowledge<span style="color:red">*</span> ?</label>
                    <select class="form-select" id="have_pre_requisite" name="have_pre_requisite"
                        onchange="toggleDisabledPreRequisite()">
                        <option selected disabled>-select-</option>
                        <option {{ old('have_pre_requisite') == '1' ? 'selected' : '' }} value="1">Yes
                        </option>
                        <option {{ old('have_pre_requisite') == '0' ? 'selected' : '' }} value="0">No
                        </option>
                    </select>
                    @error('have_pre_requisite')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-8 mb-3">
                    <label for="tell_pre_requisite" class="form-label">If Yes, you write in your
                        words</label>
                    <textarea class="form-control" id="tell_pre_requisite" name="tell_pre_requisite"
                        rows="2">{{ old('tell_pre_requisite') }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="opportunity_after_course" class="form-label">Opportunity after Course
                        Completion<span style="color:red">*</span>
                        :</label>
                    <textarea class="form-control" id="opportunity_after_course" name="opportunity_after_course"
                        rows="2">{{ old('opportunity_after_course') }}</textarea>
                    @error('opportunity_after_course')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="have_mock_test_interview" class="form-label">Will you conduct a mock test
                        and interview
                        for the course<span style="color:red">*</span> ?</label>
                    <select class="form-select" id="have_mock_test_interview" name="have_mock_test_interview">
                        <option selected disabled>-select-</option>
                        <option {{ old('have_mock_test_interview') == 'mock test' ? 'selected' : '' }} value="mock test">
                            Mock Test</option>
                        <option {{ old('have_mock_test_interview') == 'interview' ? 'selected' : '' }} value="interview">
                            Interview</option>
                        <option {{ old('have_mock_test_interview') == 'both' ? 'selected' : '' }} value="both">Mock Test
                            and Interview</option>
                        <option {{ old('have_mock_test_interview') == 'no' ? 'selected' : '' }} value="no">No
                        </option>
                    </select>
                    @error('have_mock_test_interview')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6  mb-3">
                    <label for="conduct_lecture" class="form-label">Will you conduct demo lectures for
                        course<span style="color:red">*</span> ?</label>
                    <select class="form-select" id="conduct_lecture" name="conduct_lecture">
                        <option selected disabled>-select-</option>
                        <option {{ old('conduct_lecture') == '1' ? 'selected' : '' }} value="1">Yes
                        </option>
                        <option {{ old('conduct_lecture') == '0' ? 'selected' : '' }} value="0">No
                        </option>
                    </select>
                    @error('conduct_lecture')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </section>
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

        toggleDisabledPreRequisite();

        const handleSelectCourse = () => {
            const nameOfCourse = document.querySelector('#name_of_course');
            const hideContainer = document.querySelector('#other_name_of_course_container');

            if (nameOfCourse.value == 'other') {
                hideContainer.style.display = 'block';
            }

            if (nameOfCourse.value != 'other') {
                hideContainer.style.display = 'none';
            }
        }

        handleSelectCourse();
    </script>
@endsection
