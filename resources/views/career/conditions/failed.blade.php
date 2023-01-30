@extends('layouts.base')

@section('title')
    Careers
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Personal Experience</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width mb-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-3" style="height: 400px">
            <div class="col-md-12" style="display:grid;place-items:center">
                <h2 class="text-danger" style="font-size:30px">
                    Your Document Verification Has Failed!
                </h2>
            </div>
        </div>

    </section>
@endsection
