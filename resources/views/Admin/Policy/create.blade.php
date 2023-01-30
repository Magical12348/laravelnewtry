@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('policy.index') }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Add Policy') }}</div>
                    <form class="card-body" action="{{ route('policy.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Enter Description:</label>
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
                            @error('description')
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
        var editor1 = new RichTextEditor("#description");
    </script>
@endsection
