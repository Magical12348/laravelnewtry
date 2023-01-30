@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-12">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('course.index') }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <style>
            #edit-course-form[close] {
                height: 0;
                overflow: hidden;
                padding: 0;
            }
        </style>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header" style="cursor: pointer;" onclick="toggleEditCourse()">
                        {{ __('Edit Courses') }} &DownArrow;</div>
                    <form class="card-body" action="{{ route('course.update', $course->id) }}" method="post"
                        enctype="multipart/form-data" id="edit-course-form" close="true">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="course_title" class="form-label">Enter Course Title:</label>
                            <input type="text" class="form-control" id="course_title" name="title"
                                value="{{ $course->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Enter Category:</label>
                            <select class="form-control" id="category_id" name="category_id" id="">
                                <option value="" disabled>Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id === $course->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('excerpt')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="excerpt" class="form-label">Enter Excerpt:</label>
                            <input type="text" class="form-control" id="excerpt" name="excerpt"
                                value="{{ $course->excerpt }}">
                            @error('excerpt')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_desc" class="form-label">Description</label>
                            <textarea class="form-control" id="category_desc" rows="3" name="description">{{ $course->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="course_duration" class="form-label">Enter Course Duration:</label>
                            <input type="number" class="form-control" id="course_duration" name="duration"
                                value="{{ $course->duration }}">
                            @error('duration')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="next_batch_days" class="form-label">Enter Next Batch Start In:</label>
                            <input type="number" class="form-control" id="next_batch_days" name="next_batch_days"
                                value="{{ $course->next_batch_days }}">
                            @error('next_batch_days')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_price" class="form-label">Enter Price:</label>
                            <input type="text" class="form-control" id="category_price" name="price"
                                value="{{ $course->price() }}">
                            @error('price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_discount_price" class="form-label">Enter Discount Price: <small
                                    class="text-secondary">(input
                                    "0" for offline course)</small></label>
                            <input type="text" class="form-control" id="category_discount_price" name="discount_price"
                                value="{{ $course->discountPrice() }}">
                            @error('discount_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="has_installments" class="form-label">Has Installment:</label>
                            <select class="form-control" id="has_installments" name="has_installments" id="">
                                <option disabled selected>Select</option>
                                <option value="1" @selected($course->has_installments == 1)>true</option>
                                <option value="0" @selected($course->has_installments == 0)>false</option>
                            </select>
                            @error('has_installments')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="batch_start_at" class="form-label">Batch Start At:
                                {{ $course->batch_start_at->format('d M Y') }}(current date value)</label>
                            <input type="date" class="form-control" id="batch_start_at" name="batch_start_at"
                                value="{{ $course->batch_start_at->format('Y-m-d') }}">
                            @error('batch_start_at')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Enter Type:</label>
                            <select class="form-control" id="type" name="type" id="type">
                                <option value="" selected>Select</option>
                                <option value="summercamp" @selected($course->type == 'summercamp')>Summer Camp</option>
                                <option value="combo-pack" @selected($course->type == 'combo-pack')>Combo Pack</option>

                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Active:</label>
                            <select class="form-control" id="is_active" name="is_active" id="is_active">
                                <option disabled selected>Select</option>
                                <option value="1" @selected($course->is_active == '1')>True</option>
                                <option value="0" @selected($course->is_active == '0')>False</option>
                            </select>
                            @error('is_active')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Enter Thumbnail:</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            @error('thumbnail')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="demo_video" class="form-label">Choose Video:</label>
                            <input type="file" class="form-control" id="demo_video" name="demo_video">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const editCourse = document.querySelector('#edit-course-form');

            function toggleEditCourse() {
                if (editCourse.getAttribute('close')) {
                    editCourse.removeAttribute('close');
                } else {
                    editCourse.setAttribute('close', true);
                }
            }
        </script>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Add Services') }}</div>
                    <form class="card-body" action="{{ route('course.service') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="mb-3">
                            <label for="services" class="form-label">Enter Services:</label>
                            <input type="text" class="form-control" id="services" name="services">
                            @error('services')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Scope</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->services as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $item->services }}</th>
                                <td class="d-flex justify-content-center">
                                    <form action="{{ route('service.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Add Scope') }}</div>
                    <form class="card-body" action="{{ route('course.scope.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="mb-3">
                            <label for="scope" class="form-label">Enter Scope:</label>
                            <input type="text" class="form-control" id="scope" name="scope">
                            @error('scope')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Scope</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->scopes as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $item->scope }}</th>
                                <td class="d-flex justify-content-center">
                                    <form action="{{ route('course.scope.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Add Pdf Link') }}</div>
                    <form class="card-body" action="{{ route('course.pdf.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pdf_link" class="form-label">Enter Pdf Link:</label>
                            <input type="text" class="form-control" id="pdf_link" name="pdf_link">
                            @error('pdf_link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pdf Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->pdfs as $pdf)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $pdf->title }}</th>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('course.pdf.show', $pdf->slug) }}"
                                        class="btn btn-info mr-2">View</a>
                                    <form action="{{ route('course.pdf.destroy', $pdf->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Course batch Button') }}</div>
                    <form class="card-body" action="{{ route('course.btn.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="shift" class="form-label">Enter Time:</label>
                            <input type="text" class="form-control" id="shift" name="shift">
                            @error('shift')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Enter Date:</label>
                            <input type="date" class="form-control" id="date" name="date">
                            @error('date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Time</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->buttons as $button)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $button->title }}</th>
                                <th>{{ $button->shift }}</th>
                                <th>{{ $button->date->format('d M Y') }}</th>
                                <td class="d-flex justify-content-center">
                                    <form action="{{ route('course.btn.destroy', $button->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
