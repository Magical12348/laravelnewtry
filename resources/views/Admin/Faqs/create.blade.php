@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>
    <script>
        var editor1 = new RichTextEditor("#answer");
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('faq.index') }}" class="btn btn-primary">
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
                    <div class="card-header">{{ __('Add Faqs') }}</div>
                    <form class="card-body" action="{{ route('faq.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="question" class="form-label">Enter Question:</label>
                            <input type="text" class="form-control" id="question" name="question">
                            @error('question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Enter Answer:</label>
                            <textarea class="form-control" id="answer" name="answer"></textarea>
                            @error('answer')
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
