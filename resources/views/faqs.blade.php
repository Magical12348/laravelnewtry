@extends('layouts.base')

@section('title')
    Faqs
@endsection

@section('content')
    <section class="container-fluid" id="hero">
        <div class="row">
            <div class="col-md-12 heading_text ">
                <h1>Faq<span style="text-transform: lowercase">s</span></h1>
            </div>
        </div>
    </section>
    <div class="space-20"></div>
    <div class="space-20"></div>
    <section class="container-fluid max_width mb-3" id="faqs">
        <div class="row">
            @foreach ($faqs as $faq)
                <div class="col-md-12 mt-2">
                    <details>
                        <summary>{{ $faq->question }}</summary>
                        <p>
                            {!! $faq->answer !!}
                        </p>
                    </details>
                </div>
            @endforeach
        </div>
    </section>
    <section class="container-fluid max_width" id="services" style="min-height:200px">
        <div class="row">
            <x-companies />
        </div>
    </section>
@endsection
