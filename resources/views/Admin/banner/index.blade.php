@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Banner') }}</div>

                    <form class="card-body" action="{{ route('banner.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title :</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Enter Description :</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Banner :</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="is_video" name="is_video">
                            <label class="form-check-label" for="is_video">
                                Is this a Video ?
                            </label>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <img src="{{ asset('uploads/' . $banner->image) }}" width="150px" alt="">
                                </td>
                                <th>{{ $banner->title }}</th>
                                <td>
                                    <form action="{{ route('banner.destroy', $banner->id) }}" method="post">
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
