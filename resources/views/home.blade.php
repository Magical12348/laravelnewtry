@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h3>User Details</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">User Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row mt-4 justify-content-center">
            <div action="#" method="get" class="col-md-6">
                <form action="{{ route('admin.popup.export') }}" method="get">
                    <div class="d-flex justify-content-between mb-2">
                        <h3>Popup Details</h3>
                        <button class="btn btn-success">export</button>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">select</th>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone </th>
                                <th scope="col">Visited At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                @if ($contact->email === null)
                                    <tr>
                                        <th scope="row">
                                            <input type="checkbox" name="contact_queries[]" value="{{ $contact->id }}">
                                        </th>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->phone_number }}</td>
                                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('contact.destroy', $contact->id) }}"
                                                class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-md-6">
                <form action="{{ route('admin.kids.export') }}" method="get">
                    <div class="d-flex justify-content-between mb-2">
                        <h3>Kids Details</h3>
                        <button class="btn btn-success">export</button>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">select</th>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Visited At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kids_contacts as $contact)
                                <tr>
                                    <th scope="row">
                                        <input type="checkbox" name="kids_queries[]" value="{{ $contact->id }}">
                                    </th>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->mobile_number }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('kid.contact.destroy', $contact->id) }}"
                                            class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-12">
                <h3>Contacts Details</h3>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Visited At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            @if ($contact->email !== null)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone_number }}</td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('contact.destroy', $contact->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@endsection
