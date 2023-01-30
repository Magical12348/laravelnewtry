@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div style="display: flex;justify-content: flex-end">
                    <button class="btn btn-info mr-3" id="change_course_date_btn">Change All Courses Date</button>
                    <a href="{{ route('course.create') }}" class="btn btn-primary">
                        Add Courses
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3" id="change_date_course" style="display: none">
            <div class="col-md-12">
                <form action="{{ route('course.update.all') }}" method="post">
                    @csrf
                    <label for="change_course_date_input">Enter Course Date:</label>
                    <input type="date" class="form-control" id="change_course_date_input" name="change_course_date_input"
                        value="{{ old('change_course_date_input') }}">
                    @error('change_course_date_input')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                    <button class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>Our Courses</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Batch Start</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset($course->thumbnail()) }}" width="100px" alt=""></th>
                                <th>{{ $course->title }}</th>
                                <th>{{ $course->category->name }}</th>
                                <th>Rs. {{ number_format($course->price()) }} /-</th>
                                <th>{{ $course->batch_start_at->format('d M Y') }}</th>
                                <td class="d-flex justify-content-end flex-wrap" style="gap: 10px">
                                    @if ($course->has_installments)
                                        <a href="{{ route('admin.installment.show', $course->id) }}"
                                            class="btn btn-secondary mr-2 text-white">Installments
                                            @if ($course->installment_count)
                                                ({{ $course->installment_count }})
                                            @endif
                                        </a>
                                    @endif
                                    <a href="{{ route('course.users', $course->id) }}"
                                        class="btn btn-warning mr-2 text-white">Interns
                                        @if ($course->admissions_count)
                                            ({{ $course->admissions_count }})
                                        @endif
                                    </a>
                                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('course.destroy', $course->id) }}" method="post">
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
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>Kids Courses</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Batch Start</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offlineCourses as $course)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset($course->thumbnail()) }}" width="100px" alt=""></th>
                                <th>{{ $course->title }}</th>
                                <th>{{ $course->category->name }}</th>
                                <th>Rs. {{ number_format($course->price()) }} /-</th>
                                <th>{{ $course->batch_start_at->format('d M Y') }}</th>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('course.users', $course->id) }}"
                                        class="btn btn-warning mr-2 text-white">Interns
                                        @if ($course->admissions_count)
                                            ({{ $course->admissions_count }})
                                        @endif
                                    </a>
                                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('course.destroy', $course->id) }}" method="post">
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
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>Combo Pack Courses</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Batch Start</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comboCourses as $course)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset($course->thumbnail()) }}" width="100px" alt=""></th>
                                <th>{{ $course->title }}</th>
                                <th>{{ $course->category->name }}</th>
                                <th>Rs. {{ number_format($course->price()) }} /-</th>
                                <th>{{ $course->batch_start_at->format('d M Y') }}</th>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('course.users', $course->id) }}"
                                        class="btn btn-warning mr-2 text-white">Interns
                                        @if ($course->admissions_count)
                                            ({{ $course->admissions_count }})
                                        @endif
                                    </a>
                                    <a href="{{ route('course.edit', $course->id) }}" class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('course.destroy', $course->id) }}" method="post">
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
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>In Active Courses</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Thumbnail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Batch Start</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inActiveCourses as $course)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset($course->thumbnail()) }}" width="100px" alt=""></th>
                                <th>{{ $course->title }}</th>
                                <th>{{ $course->category->name }}</th>
                                <th>Rs. {{ number_format($course->price()) }} /-</th>
                                <th>{{ $course->batch_start_at->format('d M Y') }}</th>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('course.users', $course->id) }}"
                                        class="btn btn-warning mr-2 text-white">Interns
                                        @if ($course->admissions_count)
                                            ({{ $course->admissions_count }})
                                        @endif
                                    </a>
                                    <a href="{{ route('course.edit', $course->id) }}"
                                        class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('course.destroy', $course->id) }}" method="post">
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
    <script>
        const CourseBtn = document.querySelector('#change_course_date_btn');
        const CourseDisplay = document.querySelector('#change_date_course');

        CourseBtn.addEventListener("click", function() {
            if (CourseDisplay.style.display == "none") {
                CourseDisplay.style.display = "block"
            } else {
                CourseDisplay.style.display = "none"
            }
        });
    </script>
@endsection
