@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <div style="display: flex;justify-content: flex-end">
                    <a href="{{ route('faq.create') }}" class="btn btn-primary">
                        Add Faqs
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $faq->question }}</th>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-info mr-2">Edit</a>
                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="post">
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
