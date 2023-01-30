@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('placement.index') }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Add Placement Details') }}</div>
                    <form class="card-body" action="{{ route('placement.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Enter Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ old('full_name') }}">
                            @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Enter Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                value="{{ old('company_name') }}">
                            @error('company_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="job_title" class="form-label">Enter Job Title</label>
                            <input type="text" class="form-control" id="job_title" name="job_title"
                                value="{{ old('job_title') }}">
                            @error('job_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Enter Location</label>
                            <input type="text" class="form-control" id="location" name="location"
                                value="{{ old('location') }}">
                            @error('location')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="package" class="form-label">Enter Package</label>
                            <input type="text" class="form-control" id="package" name="package" placeholder="enter only number"
                                value="{{ old('package') }}">
                            @error('package')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="placement_date" class="form-label">Date of Placement</label>
                            <input type="date" class="form-control" id="placement_date" name="placement_date"
                                value="{{ old('placement_date') }}">
                            @error('placement_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Enter Image</label>
                            <input type="file" class="form-control" id="image" name="image"
                                value="{{ old('image') }}">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>




                        <button class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
