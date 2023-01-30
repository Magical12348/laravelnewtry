@extends('layouts.base')

@section('title')
    My Notes
@endsection

@section('content')
    <section class="container-fluid max_width" id="terms" x-data="{ tab: '1' }">
        <div class="row p-0 m-0">
            @if ($user_courses->count())
                <div class="col-md-3">
                    <div class="terms_tabs">
                        @foreach ($user_courses as $user_course)
                            <button class="tab" :class="{ 'active': tab === '{{ $loop->iteration }}' }"
                                @click.prevent="tab = '{{ $loop->iteration }}'">{{ $user_course->course->title }}
                                ({{ $user_course->course->pdfs->count() }})</button>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="@if ($user_courses->count()) col-md-9 @else col-md-12 @endif">
                @forelse ($user_courses as $user_course)
                    <div class="terms_description" x-show="tab === '{{ $loop->iteration }}'" style="display: none">
                        <div class="row m-0 p-0">
                            <div class="col-md-12">
                                <h5>{{ $user_course->course->title }}</h5>

                                <table class="table table-striped mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">View Notes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user_course->course->pdfs as $pdf)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $pdf->title }}</td>
                                                <td>
                                                    <a href="{{ route('course.pdf.show', $pdf->slug) }}" target="_blank"
                                                        class="btn btn-primary btn-sm">View</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <th scope="row">---</th>
                                                <td>No Pdf Uploaded Yet.</td>
                                                <td>---</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 mt-4" id="not-course">
                        <span>oop's...!</span>
                        <p><br>you did not purchase any course.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('app.js') }}"></script>
@endsection
