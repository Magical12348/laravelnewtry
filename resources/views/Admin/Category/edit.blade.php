@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('category.index') }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}</div>
                    <form class="card-body" action="{{ route('category.update', $category->slug) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Enter Category Name:</label>
                            <input type="text" class="form-control" id="category_name" name="name"
                                value="{{ $category->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
