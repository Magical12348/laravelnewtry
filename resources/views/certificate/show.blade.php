@extends('layouts.base')

@section('title')
    Certificate Validation
@endsection

@section('content')
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
            <div class="col-md-6 mx-auto">
                <form action="{{ route('certificate.validate') }}" method="post" class="card p-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="certificate_number" class="form-label fw-bold">Certification ID</label>
                            <input type="text" class="form-control" name="certificate_number" id="certificate_number"
                                value="{{ old('certificate_number') }}">
                            @error('certificate_number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Validate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
