@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-4 justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Verification</th>
                            <th scope="col">Total Experience</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experiences as $experience)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $experience->user->name }}</th>
                                <th>{{ $experience->isVerified() }}</th>
                                <th>{{ $experience->total_experience }}</th>
                                <td class="d-flex justify-content-end">
                                    <a href="{{ route('admin.experience.show', $experience->id) }}"
                                        class="btn btn-warning mr-2 text-white">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
