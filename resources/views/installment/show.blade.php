@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h4>{{ $course->title }} installments</h4>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Remaining Amount</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Due Date</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($installments as $installment)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $installment->user->name }}</th>
                                <th>Rs. {{ number_format($installment->r_amount / 100) }} /-</th>
                                <th>{{ $installment->payment_status }}</th>
                                @if ($installment->due_date)
                                    <th>{{ $installment->due_date->format('d M Y') }}({{ $installment->due_date->diffForHumans() }})
                                    @else
                                    <th>N/A</th>
                                @endif
                                </th>
                                {{-- <td class="d-flex justify-content-end flex-wrap" style="gap: 10px">
                                    <form action="{{ route('installment.destroy', $installment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
