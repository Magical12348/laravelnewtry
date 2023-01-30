@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Add Course Type</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width my-3">
        <div class="row p-3">
            <div class="col-md-12 career-active" id="career_progress">
                <a href="#" class="progress-item">
                    <span class="progress-text">
                        <span class="progress-number">1</span>
                        teaching profile
                    </span>
                </a>
                <a href="#" class="progress-item">
                    <span class="progress-text">
                        <span class="progress-number">2</span>
                        add course
                    </span>
                </a>
                <a href="#" class="progress-item career-active">
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
    <section class="container-fluid max_width" id="terms">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success fw-bold" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('career.course.type.store', $career) }}" method="post"
                    enctype="multipart/form-data" class="card" id="careers-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-2 mb-3">
                            <label for="course_type" class="form-label">Type of Course<span style="color:red">*</span>
                                :</label>
                            <select class="form-select" id="course_type" name="course_type">
                                <option selected disabled>-select-</option>
                                <option {{ old('course_type') == 'crash course' ? 'selected' : '' }} value="crash course">
                                    Crash Course</option>
                                <option {{ old('course_type') == 'bootcamp' ? 'selected' : '' }} value="bootcamp">
                                    Bootcamp</option>
                                <option {{ old('course_type') == 'internship' ? 'selected' : '' }} value="internship">
                                    Internship</option>
                                <option {{ old('course_type') == 'apprenticeship' ? 'selected' : '' }}
                                    value="apprenticeship">Apprenticeship</option>
                                <option {{ old('course_type') == 'training' ? 'selected' : '' }} value="training">
                                    Training</option>
                                <option {{ old('course_type') == 'complete module' ? 'selected' : '' }}
                                    value="complete module">Complete Module</option>
                            </select>
                            @error('course_type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="module_level" class="form-label">Level of Module<span style="color:red">*</span>
                                :</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="module_level_beginner"
                                        name="module_level[]"
                                        @if (old('module_level')) {{ in_array('beginner', old('module_level')) ? 'checked' : '' }} @endif
                                        value="beginner">
                                    <label class="form-check-label" for="module_level_beginner">Beginner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="module_level_intermediate"
                                        name="module_level[]"
                                        @if (old('module_level')) {{ in_array('intermediate', old('module_level')) ? 'checked' : '' }} @endif
                                        value="intermediate">
                                    <label class="form-check-label" for="module_level_intermediate">Intermediate</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="module_level_advance"
                                        name="module_level[]"
                                        @if (old('module_level')) {{ in_array('advance', old('module_level')) ? 'checked' : '' }} @endif
                                        value="advance">
                                    <label class="form-check-label" for="module_level_advance">Advance</label>
                                </div>
                            </div>
                            @error('module_level')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label for="days_of_modules" class="form-label">Number of Days of
                                Modules<span style="color:red">*</span> :</label>
                            {{-- <input type="text" class="form-control" id="days_of_modules"
                                                name="days_of_modules" value={{ old('days_of_modules') }}> --}}
                            <select class="form-select" id="days_of_modules" name="days_of_modules">
                                <option selected disabled>-select-</option>
                                <option {{ old('days_of_modules') == '10' ? 'selected' : '' }} value="10">
                                    10 days</option>
                                <option {{ old('days_of_modules') == '20' ? 'selected' : '' }} value="20">
                                    20 days</option>
                                <option {{ old('days_of_modules') == '30' ? 'selected' : '' }} value="30">
                                    30 days</option>
                                <option {{ old('days_of_modules') == '45' ? 'selected' : '' }} value="45">
                                    45 days</option>
                                <option {{ old('days_of_modules') == '60' ? 'selected' : '' }} value="60">
                                    60 days</option>
                                <option {{ old('days_of_modules') == '90' ? 'selected' : '' }} value="90">
                                    90 days</option>
                                <option {{ old('days_of_modules') == '100' ? 'selected' : '' }} value="100">
                                    100 days</option>
                            </select>
                            @error('days_of_modules')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3">
                            <label for="timing" class="form-label">Timing Preferred<span style="color:red">*</span>
                                :</label>
                            <div class="d-flex" style="gap: 10px">
                                <div>
                                    <label for="timing_from" class="form-label">From :</label>
                                    <input type="time" class="form-control" id="timing_from" name="timing_from"
                                        value="{{ old('timing_from') }}">
                                </div>
                                <div>
                                    <label for="timing_to" class="form-label">To :</label>
                                    <input type="time" class="form-control" id="timing_to" name="timing_to"
                                        value="{{ old('timing_to') }}">
                                </div>
                            </div>
                            @error('timing_from')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @error('timing_to')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="is_job_guaranteed" class="form-label">What kind of course is
                                this<span style="color:red">*</span> ?</label>
                            <select class="form-select" id="is_job_guaranteed" name="is_job_guaranteed">
                                <option selected disabled>-select-</option>
                                <option {{ old('is_job_guaranteed') == 'self-pace' ? 'selected' : '' }}
                                    value="self-pace">
                                    Self-Pace</option>
                                <option {{ old('is_job_guaranteed') == 'job guaranteed' ? 'selected' : '' }}
                                    value="job guaranteed">Job Guaranteed</option>
                                <option {{ old('is_job_guaranteed') == 'job assistance' ? 'selected' : '' }}
                                    value="job assistance">Job Assistance</option>
                            </select>
                            @error('is_job_guaranteed')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="note_available" class="form-label">Is notes available of
                                course<span style="color:red">*</span> ?</label>
                            <select class="form-select" id="note_available" name="note_available">
                                <option selected disabled>-select-</option>
                                <option {{ old('note_available') == 1 ? 'selected' : '' }} value="1">Yes
                                </option>
                                <option {{ old('note_available') == 0 ? 'selected' : '' }} value="0">No
                                </option>
                            </select>
                            @error('note_available')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="provide_certificate" class="form-label">Will you provide
                                certificate for the
                                course ?</label>
                            <select class="form-select" id="provide_certificate" name="provide_certificate">
                                <option selected disabled>-select-</option>
                                <option {{ old('provide_certificate') == 1 ? 'selected' : '' }} value="1">Yes</option>
                                <option {{ old('provide_certificate') == 0 ? 'selected' : '' }} value="0">No</option>
                            </select>
                            @error('provide_certificate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="course_fees" class="form-label">Amount of course fees offered
                                by
                                you :<span style="color:red">*</span></label>
                            <input type="number" class="form-control" id="course_fees" name="course_fees"
                                value="{{ old('course_fees') }}">
                            @error('course_fees')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="demo_image" class="form-label">Choose Your Demo Image:</label>
                            <input type="file" class="form-control" id="demo_image" name="demo_image[]" multiple>
                            <small class="text-secondary" style="display:block">You can choose multiple
                                images.</small>

                            @error('demo_image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label for="demo_video" class="form-label">Choose Your Demo Video:</label>
                            <input type="file" class="form-control" id="demo_video" name="demo_video">
                            @error('demo_video')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    </script>

    <script type="module">
        import Tags from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-tags@master/tags.js";
        Tags.init(".taggable");
    </script>
@endsection
