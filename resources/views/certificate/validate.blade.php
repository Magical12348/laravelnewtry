@extends('layouts.base')

@section('title')
    Certificate Validation
@endsection

@section('content')
    <style>
        .card_certificate {
            min-height: 200px
        }

        .card_certificate .image {
            width: 50px;
            height: 50px;
        }

        .card_certificate .card-header {
            background: blue;
            color: white;
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .card_certificate .cer_id {
            text-transform: capitalize
        }

        .card_certificate .card-body {
            font-size: 20px
        }

    </style>
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Certificate</h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <section class="container-fluid max_width mb-3" id="certificate">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <section class="card_certificate p-3">
                    <div class="card-header fw-bold">
                        <div class="image">
                            <img src="{{ asset('images/certificate.png') }}" alt="certificate">
                        </div>
                        <div class="content">
                            <div class="header">Valid certificate</div>
                            <div class="cer_id">
                                certificate id:{{ $certificate->certificate_number }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body shadow">
                        <b>{{ $certificate->name }}</b> successfully completed {{ $certificate->type }} on
                        <b>{{ $certificate->course_name }}</b> on <b>{{ $certificate->date->format('d/m/Y,H:m') }}</b>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
