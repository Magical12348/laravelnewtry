@extends('layouts.base')

@section('title')
    Term and Condition
@endsection

@section('content')
    <section class="container-fluid max_width" id="terms" x-data="{ tab: '1' }">
        <div class="row">
            <div class="col-md-3">
                <div class="terms_tabs">
                    @foreach ($terms as $term)
                        <button class="tab" :class="{ 'active': tab === '{{ $loop->iteration }}' }"
                            @click.prevent="tab = '{{ $loop->iteration }}'">{{ $term->title }}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                @foreach ($terms as $term)
                    <div class="terms_description" x-show="tab === '{{ $loop->iteration }}'" style="display: none">
                        <h1>{{ $term->title }}</h1>
                        <div class="description">
                            {!! $term->description !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
