<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $experience->user->name }}'s pdf</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        .detail-form th,
        .detail-form td {
            padding: 10px;
            text-align: left;
            text-transform: capitalize;
        }

        table {
            width: 100%;
        }

        thead {
            background-color: #000;
            color: #fff;
        }

        .heading {
            background-color: #000;
            color: #fff;
        }

    </style>
</head>

<body>
    <table class="detail-form">
        <thead>
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
        </tbody>
    </table>
    @foreach ($careers as $career)
        <table class="detail-form">
            <thead>
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
                <table class="detail-form" style="width:95%;margin-left:auto">
                    <tbody>
                        <tr class="heading">
                            <th>Type of Course :</th>
                            <th>{{ $type->course_type }}</th>
                        </tr>
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
                    </tbody>
                </table>
            @endforeach
        </table>
    @endforeach
</body>

</html>
