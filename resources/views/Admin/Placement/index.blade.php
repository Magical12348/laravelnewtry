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
                    <a href="{{ route('placement.create') }}" class="btn btn-primary">
                        Add Placement Details
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>Our Placement Details</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Location</th>
                            <th scope="col">Package</th>
                            <th scope="col">Date of Placement</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($placement_details as $placement_detail)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th><img src="{{ asset($placement_detail->image()) }}" width="100px" alt=""></th>
                                <th>{{ $placement_detail->full_name }}</th>
                                <th>{{ $placement_detail->company_name }}</th>
                                <th>{{ $placement_detail->job_title }}</th>
                                <th>{{ $placement_detail->location }}</th>
                                <th>{{ $placement_detail->package }} LPA</th>
                                <th>{{ $placement_detail->placement_date }}</th>
                                <td class="d-flex" style="gap: 10px">
                                    <a href="{{ route('placement.edit', $placement_detail->id) }}"
                                        class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('placement.destroy', $placement_detail->id) }}" method="post">
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
