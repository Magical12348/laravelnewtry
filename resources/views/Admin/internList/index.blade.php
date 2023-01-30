@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12">
                <div style="display: flex;justify-content: flex-end">
                    @if (!$course->type)
                        <a href="{{ route('add.course.users', $course->id) }}" class="btn btn-warning text-white mr-2">
                            Add User
                        </a>
                        <form action="{{ route('course.user.all.destroy', $course->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger mr-2">Delete All</button>
                        </form>
                    @else
                        <a href="{{ route('summer.camp.pdf', $course->id) }}" class="btn btn-warning text-white mr-2">
                            Export Pdf
                        </a>
                    @endif
                    <a href="{{ route('course.index') }}" class="btn btn-primary">
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
        <form action="{{ route('course.users.export', $course) }}" class="row mt-4 justify-content-center">
            <div class="col-md-12 mb-2">
                <button class="btn btn-info">Export Excel</button>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Select</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Time</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_courses as $user_course)
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="queries[]" value="{{ $user_course->id }}">
                                </th>
                                <th>{{ $user_course->user->name }}</th>
                                <th>{{ $user_course->user->email }}</th>
                                <th>{{ $user_course->user->phone_number }}</th>
                                @if ($user_course->batchbuttonWithTrash)
                                    <th>{{ $user_course->batchbuttonWithTrash->shift }}</th>
                                    <th>{{ $user_course->batchbuttonWithTrash->date->format('d M Y') }}</th>
                                @else
                                    <th>-</th>
                                    <th>-</th>
                                @endif
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('course.user.destroy', $user_course->user->id) }}"
                                        class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
        {{-- @endif --}}
    </div>
@endsection
