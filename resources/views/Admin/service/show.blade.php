@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                Name : {{ $service->name }}
            </div>
            <div class="col-md-4">
                Email : {{ $service->email }}
            </div>
            <div class="col-md-4">
                Phone Number : {{ $service->phone_number }}
            </div>
            <div class="col-md-12">
                {{ $service->description }}
            </div>
        </div>
    </div>
@endsection
