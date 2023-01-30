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
                    <a href="{{ route('certificate.create') }}" class="btn btn-primary">
                        Add Certificate
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>Our Certification</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Certificate Id</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Completion Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $certificate->certificate_number }}</th>
                                <th>{{ $certificate->course_name }}</th>
                                <th>{{ $certificate->name }}</th>
                                <th>{{ $certificate->type }}</th>
                                <th>{{ $certificate->date->format('d M Y H:m') }}</th>
                                <td class="d-flex" style="gap: 10px">
                                    <a href="{{ route('certificate.edit', $certificate->id) }}"
                                        class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('certificate.destroy', $certificate->id) }}" method="post">
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
