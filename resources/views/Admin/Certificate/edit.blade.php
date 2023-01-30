@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('certificate.index') }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Update Certificate') }}</div>
                    <form class="card-body" action="{{ route('certificate.update', $certificate) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="certificate_number" class="form-label">Enter Certificate ID:</label>
                            <input type="text" class="form-control" id="certificate_number" name="certificate_number"
                                value="{{ $certificate->certificate_number }}">
                            @error('certificate_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Enter Course Name:</label>
                            <input type="text" class="form-control" id="course_name" name="course_name"
                                value="{{ $certificate->course_name }}">
                            @error('course_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="intern_name" class="form-label">Enter Intern Name:</label>
                            <input type="text" class="form-control" id="intern_name" name="name"
                                value="{{ $certificate->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Enter Type:</label>
                            <select class="form-control" id="type" name="type" id="type">
                                <option selected disabled>Select</option>
                                <option @selected($certificate->type == 'quiz') value="quiz">Quiz</option>
                                <option @selected($certificate->type == 'intern') value="intern">Intern</option>
                                <option @selected($certificate->type == 'course') value="course">Course</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Enter Certification Date:</label>
                            <input type="datetime-local" class="form-control" id="date" name="date"
                                value="{{ $certificate->date->format('Y-m-d') }}T{{ $certificate->date->format('h:m') }}">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
