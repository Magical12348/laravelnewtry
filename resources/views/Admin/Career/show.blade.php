@extends('layouts.admin')

@section('content')
    <div class="container" x-data="{ open: @error('failed_reasons') true @else false @enderror }">
        <div class="row mb-2">
            <div class="col-md-12">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('admin.experience.verified', $experience->id) }}" class="btn btn-info mr-2">
                        Verify
                    </a>
                    <button class="btn btn-danger mr-2" @click="open = !open">Fail Verify</button>
                    <a href="{{ route('admin.experience.pdf', $experience->id) }}" class="btn btn-success mr-2">
                        Export Pdf
                    </a>
                    <a href="{{ route('admin.experience.index') }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="row mb-2" action="{{ route('admin.experience.destroy', $experience->id) }}" method="post"
            x-show="open" style="display: none">
            @csrf
            @method('delete')
            <div class="col-md-12">
                <label for="failed_reasons">Your reason for failing this?</label>
                <textarea name="failed_reasons" class="form-control mb-2" id="failed_reasons" rows="3"></textarea>
                @error('failed_reasons')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary">Send</button>
            </div>
        </form>
        @if ($experience->isVerified() == 'Verification Failed')
            <div class="row">
                <div class="col-md-12 alert alert-danger" role="alert">
                    {{ $experience->failMessages->failed_reasons }}
                </div>
            </div>
        @endif
        <div class="row mt-4">
            <style>
                .detail-form th,
                .detail-form td {
                    padding: 10px;
                }

            </style>
            <table class="table table-striped detail-form">
                <thead class="table-dark">
                    <tr>
                        <th>Name :</th>
                        <td>{{ $experience->user->name }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Email Address:</th>
                        <td>{{ $experience->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number:</th>
                        <td>{{ $experience->user->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Educational Qualifications:</th>
                        <td>{{ $experience->qualification }}</td>
                    </tr>
                    <tr>
                        <th>Verification:</th>
                        <td>{{ $experience->isVerified() }}</td>
                    </tr>
                    <tr>
                        <th>
                            <h4>Professional Experience</h4>
                        </th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Do You Have Teaching Experience :</th>
                        <td>{{ $experience->is_experienced ? 'Yes' : 'No' }}</td>
                    </tr>
                    @if ($experience->is_experienced)
                        <tr>
                            <th>If Yes, Experience in online teaching </th>
                            <td>{{ $experience->experienced_in_online }}</td>
                        </tr>
                        <tr>
                            <th>If Yes, Experience in offline teaching </th>
                            <td>{{ $experience->experienced_in_offline }}</td>
                        </tr>
                        <tr>
                            <th>No. of year of teaching experience :</th>
                            <td>{{ $experience->teaching_experience }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th>Your preferred mode of teaching :</th>
                        <td>{{ $experience->preferred_mode }}</td>
                    </tr>
                    <tr>
                        <th>Total years of experience you have :</th>
                        <td>{{ $experience->total_experience }}</td>
                    </tr>
                    <tr>
                        <th>Any Certification :</th>
                        <td>{{ $experience->certification }}</td>
                    </tr>
                    @if (isset($experience->no_case_study))
                        <tr>
                            <th>Case studies you have done :</th>
                            <td>
                                {{ $experience->no_case_study }}
                            </td>
                        </tr>
                    @endif
                    @if (isset($experience->research_project))
                        <tr>
                            <th>Research/Thesis/Projects (if any) :</th>
                            <td>
                                {{ $experience->research_project }}
                            </td>
                        </tr>
                    @endif
                    @if (isset($experience->other_experience))
                        <tr>
                            <th>Any other work experience :</th>
                            <td>
                                {{ $experience->other_experience }}
                            </td>
                        </tr>
                    @endif
                    @if (isset($experience->companies_linked_to_you))
                        <tr>
                            <th>Tie-up companies OR Placement Companies linked with you ?</th>
                            <td>
                                {{ $experience->companies_linked_to_you }}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th>Aadhar Card :</th>
                        <td><a href="{{ asset('storage/' . $experience->provide_document_aadhar) }}"
                                target="_blank">View</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Photo :</th>
                        <td><a href="{{ asset('storage/' . $experience->provide_document_photo) }}"
                                target="_blank">View</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Pan Card :</th>
                        <td><a href="{{ asset('storage/' . $experience->provide_document_pan) }}"
                                target="_blank">View</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Bank Passbook :</th>
                        <td><a href="{{ asset('storage/' . $experience->provide_document_bank) }}"
                                target="_blank">View</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Final Marksheet :</th>
                        <td><a href="{{ asset('storage/' . $experience->provide_document_marksheet) }}"
                                target="_blank">View</a>
                        </td>
                    </tr>
                    @if ($experience->provide_document_experience_letter)
                        <tr>
                            <th>Experience Letter :</th>
                            <td><a href="{{ asset('storage/' . $experience->provide_document_experience_letter) }}"
                                    target="_blank">View</a>
                            </td>
                        </tr>
                    @endif
                    @if ($experience->provide_document_certificate)
                        <tr>
                            <th>Certificate :</th>
                            <td><a href="{{ asset('storage/' . $experience->provide_document_certificate) }}"
                                    target="_blank">View</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <h4 class="my-3">{{ $experience->user->name }}'s' Course</h4>
            @foreach ($careers as $career)
                <table class="table  my-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Name of Course :</th>
                            <th>{{ $career->name_of_course == 'other' ? $career->other_name_of_course : $career->name_of_course }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Course Description :</th>
                            <td>{{ $career->course_description }}</td>
                        </tr>
                        <tr>
                            <th>Syllabus :</th>
                            <td>{{ $career->syllabus }}</td>
                        </tr>
                        <tr>
                            <th>Course Keyword :</th>
                            <td>
                                {{ $career->course_keyword }}
                            </td>
                        </tr>
                        <tr>
                            <th>In this course, students need any pre-requisite knowledge :</th>
                            <td>{{ $career->have_pre_requisite ? 'Yes' : 'No' }}</td>
                        </tr>
                        @if ($career->have_pre_requisite)
                            <tr>
                                <th>If Yes, you write in your words</th>
                                <td>{{ $career->tell_pre_requisite }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th>Opportunity after Course Completion</th>
                            <td>{{ $career->opportunity_after_course }}</td>
                        </tr>
                        <tr>
                            <th>Will you conduct a mock test and interview for the course ?</th>
                            <td>{{ $career->have_mock_test_interview }}</td>
                        </tr>
                        <tr>
                            <th>Will you conduct demo lectures for course :</th>
                            <td>{{ $career->conduct_lecture ? 'Yes' : 'No' }}</td>
                        </tr>
                    </tbody>
                    @foreach ($career->types as $type)
                        <table class="table" style="width: 90%;margin-left:auto">
                            <thead class="table-info">
                                <tr>
                                    <th>Type of Course :</th>
                                    <th>{{ $type->course_type }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Level of Module :</th>
                                    <td>
                                        @foreach (json_decode($type->module_level) as $item)
                                            <span style="display: block">
                                                {{ $item }}{{ $loop->last ? '' : ',' }}
                                            </span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Number of Days of Modules :</th>
                                    <td>{{ $type->days_of_modules }}</td>
                                </tr>
                                <tr>
                                    <th>Timing Preferred :</th>
                                    <td>{{ $type->timing_from }} - {{ $type->timing_to }}</td>
                                </tr>
                                <tr>
                                    <th>What kind of course is this :</th>
                                    <td>{{ $type->is_job_guaranteed }}</td>
                                </tr>
                                <tr>
                                    <th>Is notes available of course :</th>
                                    <td>{{ $type->note_available ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                    <th>Will you provide certificate for the course :</th>
                                    <td>{{ $type->provide_certificate ? 'Yes' : 'No' }}</td>
                                </tr>
                                @if (isset($type->course_fees))
                                    <tr>
                                        <th>Amount of course fees offered by you :</th>
                                        <td>{{ $type->course_fees }}</td>
                                    </tr>
                                @endif
                                @if (isset($type->demo_image))
                                    <tr>
                                        <th>Image :</th>
                                        <td>
                                            @foreach (json_decode($type->demo_image) as $item)
                                                <a href="{{ asset('storage/' . $item) }}" target="_blank">View</a>
                                                {{ $loop->last ? '' : '|' }}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                                @if (isset($type->demo_video))
                                    <tr>
                                        <th>Video :</th>
                                        <td><a href="{{ asset('storage/' . $type->demo_video) }}"
                                                target="_blank">View</a></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endforeach
                </table>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection
