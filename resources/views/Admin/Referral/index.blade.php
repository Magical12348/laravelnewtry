@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row mt-4 justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Price</th>
                            <th scope="col">Referral Use</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>

                                @foreach ($referral_details as $referral_detail)
                                <tr>
<th scope="col">{{$loop->iteration}}</th>
<th scope="col">{{$referral_detail->userName}}</th>
<th scope="col">{{$referral_detail->courseName}}</th>
<th scope="col">{{$referral_detail->coursePrice}}</th>
<th scope="col">{{$referral_detail->referral_code}}</th>
<th scope="col">{{$referral_detail->created_at->format('d M Y')}}</th>
</tr>
@endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
