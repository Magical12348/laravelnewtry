@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('course.index') }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Add Courses') }}</div>
                    <form class="card-body" action="{{ route('course.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="course_title" class="form-label">Enter Course Title:</label>
                            <input type="text" class="form-control" id="course_title" name="title"
                                value="{{ old('title') }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Enter Category:</label>
                            <select class="form-control" id="category_id" name="category_id" id="">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Enter Excerpt:</label>
                            <input type="text" class="form-control" id="excerpt" name="excerpt"
                                value="{{ old('excerpt') }}">
                            @error('excerpt')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_desc" class="form-label">Description</label>
                            <textarea class="form-control" id="category_desc" rows="3" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="course_duration" class="form-label">Enter Course Duration:</label>
                            <input type="number" class="form-control" id="course_duration" name="duration"
                                value="{{ old('duration') }}">
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="next_batch_days" class="form-label">Enter Next Batch Start In:</label>
                            <input type="number" class="form-control" id="next_batch_days" name="next_batch_days"
                                value="{{ old('next_batch_days') }}">
                            @error('next_batch_days')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_price" class="form-label">Enter Price:</label>
                            <input type="text" class="form-control" id="category_price" name="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_discount_price" class="form-label">Enter Discount Price: <small
                                    class="text-secondary">(input
                                    "0" for offline course)</small></label>
                            <input type="text" class="form-control" id="category_discount_price" name="discount_price"
                                value="{{ old('discount_price') }}">
                            @error('discount_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="has_installments" class="form-label">Has Installment:</label>
                            <select class="form-control" id="has_installments" name="has_installments" id="">
                                <option disabled selected>Select</option>
                                <option value="1" @selected(old('has_installments'))>true</option>
                                <option value="0" @selected(old('has_installments'))>false</option>
                            </select>
                            @error('has_installments')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="batch_start_at" class="form-label">Batch Start At:</label>
                            <input type="date" class="form-control" id="batch_start_at" name="batch_start_at"
                                value="{{ old('batch_start_at') }}">
                            @error('batch_start_at')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Enter Type:</label>
                            <select class="form-control" id="type" name="type" id="type">
                                <option value="">Select</option>
                                <option value="summercamp">Summer Camp</option>
                                <option value="combo-pack">Combo Pack</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Enter Thumbnail:</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                value="{{ old('thumbnail') }}">
                            @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="demo_video" class="form-label">Choose Video:</label>
                            <input type="file" class="form-control" id="demo_video" name="demo_video"
                                value="{{ old('demo_video') }}">
                            @error('demo_video')
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


@section('scripts')
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>
    <script>
        var editor1 = new RichTextEditor("#category_desc");
    </script>
@endsection
