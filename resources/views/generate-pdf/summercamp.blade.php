<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $course->title }}'s pdf</title>
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
    <div>
        <div>
            <h4>Offline Course Interns</h4>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offline_user_courses as $user_course)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $user_course->user->name }}</th>
                            <th>{{ $user_course->user->email }}</th>
                            <th>{{ $user_course->user->phone_number }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <div>
            <h4>Online Course Interns</h4>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($online_user_courses as $user_course)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $user_course->user->name }}</th>
                            <th>{{ $user_course->user->email }}</th>
                            <th>{{ $user_course->user->phone_number }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
