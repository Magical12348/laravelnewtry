@component('mail::message')

# Reminder for Payments Pending

There are payment remaining from the users

@component('mail::table')
| # | Username | email | Mobile Number |
| - |:-------- |:----- |:------------- |
@foreach($users as $user)
| {{ $loop->iteration }} |{{ $user->name }} | {{ $user->email }} | {{ $user->phone_number }} |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
