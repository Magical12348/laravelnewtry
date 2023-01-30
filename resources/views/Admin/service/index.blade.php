@extends('layouts.admin')

@section('content')
    <div class="container mt-4 justify-content-center">
        <form action="{{ route('admin.service.export') }}" class="row mt-4 justify-content-center">
            @csrf
            <div class="col-md-10">
                <button class="btn btn-primary">export</button>
            </div>
            <div class="col-md-10">
                <h3>Service Details</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">select</th>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" name="queries[]" value="{{ $service->id }}">
                                </th>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->phone_number }}</td>
                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                <td class="d-flex justify-content-end" style="gap: 10px">
                                    <a href="{{ route('admin.service.show', $service->id) }}"
                                        class="btn btn-info">View</a>
                                    <a href="{{ route('admin.service.destroy', $service->id) }}"
                                        class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
@endsection
