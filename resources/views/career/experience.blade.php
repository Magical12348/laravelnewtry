@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Professional Experience</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width my-3">
        <div class="row p-3">
            <div class="col-md-12 career-active" id="career_progress">
                <a href="{{ route('career.experience.index') }}" class="progress-item career-active">
                    <span class="progress-text">
                        <span class="progress-number">1</span>
                        teaching profile
                    </span>
                </a>
                @if (auth()->user()->experience->is_verified == 2 || auth()->user()->experience->is_verified == 4)
                    <a href="{{ route('career.create.course.index') }}" class="progress-item">
                        <span class="progress-text">
                            <span class="progress-number">2</span>
                            add course
                        </span>
                    </a>
                @else
                    <a href="#" class="progress-item">
                        <span class="progress-text">
                            <span class="progress-number">2</span>
                            add course
                        </span>
                    </a>
                @endif
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
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('career.experience.store') }}" method="post" enctype="multipart/form-data"
            class="card" id="careers-form">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name<span style="color:red">*</span> : </label>
                    <input type="text" class="form-control" name="name" disabled id="name"
                        aria-describedby="enter your name" value="{{ old('name', auth()->user()->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <x-text-input name="qualification" title="Educational Qualifications" :value="old('qualification', auth()->user()->experience?->qualification)"
                        required="true" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="is_experienced" class="form-label">Do You Have Teaching Experience<span
                            style="color:red">*</span> ?</label>
                    <select class="form-select" id="is_experienced" name="is_experienced"
                        onchange="toggleDisabledExperienced()">
                        <option selected disabled>-select-</option>
                        <option {{ auth()->user()->experience?->is_experienced == '1' ? 'selected' : '' }}
                            {{ old('is_experienced') == '1' ? 'selected' : '' }} value="1">Yes
                        </option>
                        <option {{ auth()->user()->experience?->is_experienced == '0' ? 'selected' : '' }}
                            {{ old('is_experienced') == '0' ? 'selected' : '' }} value="0">No
                        </option>
                    </select>
                    @error('is_experienced')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <label for="experienced_in_online" class="form-label">If Yes, tell us your experience in online
                        teaching
                    </label>
                    <input type="text" class="form-control" id="experienced_in_online" name="experienced_in_online"
                        {{ auth()->user()->experience?->is_experienced == '0' ? 'disabled' : '' }}
                        value="{{ old('experienced_in_online', auth()->user()->experience?->experienced_in_online) }}">
                    @error('experienced_in_online')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <label for="experienced_in_offline" class="form-label">also, tell us your experience in offline
                        teaching</label>
                    <input type="text" class="form-control" id="experienced_in_offline" name="experienced_in_offline"
                        {{ auth()->user()->experience?->is_experienced == '0' ? 'disabled' : '' }}
                        value="{{ old('experienced_in_offline', auth()->user()->experience?->experienced_in_offline) }}">
                    @error('experienced_in_offline')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6 col-lg-4 mb-3">
                    <label for="teaching_experience" class="form-label">No. of year of teaching experience :</label>
                    <input type="text" class="form-control" id="teaching_experience" name="teaching_experience"
                        {{ auth()->user()->experience?->is_experienced == '0' ? 'disabled' : '' }}
                        value={{ old('teaching_experience', auth()->user()->experience?->teaching_experience) }}>
                    @error('teaching_experience')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6  mb-3">
                    <label for="preferred_mode" class="form-label">Your preferred mode of teaching<span
                            style="color:red">*</span> :</label>
                    <select class="form-select" id="preferred_mode" name="preferred_mode">
                        <option selected disabled>-select-</option>
                        <option value="online" {{ old('preferred_mode') == 'online' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->preferred_mode == 'online' ? 'selected' : '' }}>Online
                        </option>
                        <option value="offline" {{ old('preferred_mode') == 'offline' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->preferred_mode == 'offline' ? 'selected' : '' }}>Offline
                        </option>
                    </select>
                    @error('preferred_mode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6  mb-3">
                    <label for="total_experience" class="form-label">Total years of experience you have<span
                            style="color:red">*</span> :</label>
                    <select class="form-select" id="total_experience" name="total_experience">
                        <option selected disabled>-select-</option>
                        <option value="1" {{ old('total_experience') == '1' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '1' ? 'selected' : '' }}>1
                        </option>
                        <option value="2" {{ old('total_experience') == '2' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '2' ? 'selected' : '' }}>2
                        </option>
                        <option value="3" {{ old('total_experience') == '3' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '3' ? 'selected' : '' }}>3
                        </option>
                        <option value="4" {{ old('total_experience') == '4' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '4' ? 'selected' : '' }}>4
                        </option>
                        <option value="6" {{ old('total_experience') == '6' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '6' ? 'selected' : '' }}>6
                        </option>
                        <option value="8" {{ old('total_experience') == '8' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '8' ? 'selected' : '' }}>8
                        </option>
                        <option value="10" {{ old('total_experience') == '10' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '10' ? 'selected' : '' }}>10
                        </option>
                        <option value="12" {{ old('total_experience') == '12' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '12' ? 'selected' : '' }}>12
                        </option>
                        <option value="14" {{ old('total_experience') == '14' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '14' ? 'selected' : '' }}>14
                        </option>
                        <option value="16" {{ old('total_experience') == '16' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '16' ? 'selected' : '' }}>16
                        </option>
                        <option value="18" {{ old('total_experience') == '18' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '18' ? 'selected' : '' }}>18
                        </option>
                        <option value="20" {{ old('total_experience') == '20' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '20' ? 'selected' : '' }}>20
                        </option>
                        <option value="22" {{ old('total_experience') == '22' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '22' ? 'selected' : '' }}>22
                        </option>
                        <option value="24+" {{ old('total_experience') == '24+' ? 'selected' : '' }}
                            {{ auth()->user()->experience?->total_experience == '24+' ? 'selected' : '' }}>24+
                        </option>
                    </select>
                    @error('total_experience')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="certification" class="form-label">Name of certification completed :</label>
                    <input type="text" class="form-control" id="certification" name="certification"
                        value="{{ old('certification', auth()->user()->experience?->certification) }}"
                        onchange="toggleDisabledCertification()">
                    @error('certification')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <x-text-area name="no_case_study" title="Case studies you have done" :value="auth()->user()->experience?->no_case_study" />
                </div>
                <div class="col-md-12 mb-3">
                    <x-text-area name="research_project" title="Research/Thesis/Projects (if any)" :value="auth()->user()->experience?->research_project" />
                </div>
                <div class="col-md-12 mb-3">
                    <x-text-area name="other_experience" title="Any other work experience" :value="auth()->user()->experience?->other_experience" />
                </div>
                <div class="col-md-12 mb-3">
                    <x-text-area name="companies_linked_to_you"
                        title="Tie-up companies OR Placement Companies linked with you" :value="auth()->user()->experience?->companies_linked_to_you" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="linkedin_link" class="form-label">Profile Link of LinkedIn :</label>
                    <input type="text" class="form-control" id="linkedin_link" name="linkedin_link"
                        value="{{ old('linkedin_link', auth()->user()->experience?->linkedin_link) }}">
                    @error('linkedin_link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <span style="font-size: 18px;font-weight:bold;">Documents required by Tutor with
                        Self-Attestation.</span>
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="provide_document_aadhar" class="form-label">Upload Aadhar Card<span
                            style="color:red">*</span> :</label>
                    <input type="file" class="form-control" id="provide_document_aadhar" name="provide_document_aadhar">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_aadhar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="provide_document_photo" class="form-label">Upload Photo<span style="color:red">*</span>
                        :</label>
                    <input type="file" class="form-control" id="provide_document_photo" name="provide_document_photo">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_photo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- <div class="col-sm-4 mb-3">
                    <label for="provide_document_pan" class="form-label">Upload Pan Card<span style="color:red">*</span>
                        :</label>
                    <input type="file" class="form-control" id="provide_document_pan" name="provide_document_pan">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_pan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="provide_document_bank" class="form-label">Upload Bank Passbook<span
                            style="color:red">*</span> :</label>
                    <input type="file" class="form-control" id="provide_document_bank" name="provide_document_bank">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_bank')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}
                <div class="col-sm-4 mb-3">
                    <label for="provide_document_marksheet" class="form-label">Upload Final Marksheet<span
                            style="color:red">*</span> :</label>
                    <input type="file" class="form-control" id="provide_document_marksheet"
                        name="provide_document_marksheet">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_marksheet')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="provide_document_experience_letter" class="form-label">Upload Experience Letter (If
                        any) :</label>
                    <input type="file" class="form-control" id="provide_document_experience_letter"
                        name="provide_document_experience_letter">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_experience_letter')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-sm-4 mb-3" id="document_certificate_container">
                    <label for="provide_document_certificate" class="form-label">Upload Certificate (If
                        any) :</label>
                    <input type="file" class="form-control" id="provide_document_certificate"
                        name="provide_document_certificate">
                    <small class="text-secondary" style="display:block">Upload pdf with max 500KB size</small>
                    @error('provide_document_certificate')
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
        const toggleDisabledExperienced = () => {
            const isExperiencedInput = document.querySelector('#is_experienced');
            const experiencedInOnline = document.querySelector('#experienced_in_online');
            const experiencedInOffline = document.querySelector('#experienced_in_offline');
            const teachingExperience = document.querySelector('#teaching_experience');

            if (isExperiencedInput.value == 0) {
                experiencedInOnline.setAttribute('disabled', "");
                experiencedInOffline.setAttribute('disabled', "");
                teachingExperience.setAttribute('disabled', "");
            }

            if (isExperiencedInput.value == 1) {
                experiencedInOnline.removeAttribute('disabled');
                experiencedInOffline.removeAttribute('disabled');
                teachingExperience.removeAttribute('disabled');
            }
        }


        const toggleDisabledCertification = () => {
            const CertificationInput = document.querySelector('#certification');
            const CertificationFileContainer = document.querySelector('#document_certificate_container');

            if (CertificationInput.value.length == 0) {
                CertificationFileContainer.style.display = 'none';
            }

            if (CertificationInput.value.length > 0) {
                CertificationFileContainer.style.display = 'block'
            }
        }

        toggleDisabledExperienced();
        toggleDisabledCertification();
    </script>

    <script type="module">
        import Tags from "https://cdn.jsdelivr.net/gh/lekoala/bootstrap5-tags@master/tags.js";
        Tags.init(".taggable");
    </script>
@endsection
