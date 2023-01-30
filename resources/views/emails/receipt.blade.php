@component('mail::message')

# Hi {{ $user_name }},

Thank you for purchasing our course <b>{{ $course_name }}</b>.
This email serves as a receipt for your purchase.
Please retain this email receipt for your records.

@component('mail::table')
| Transaction Id | Amount |
| ------------- |:-------------:|
| {{ $payment_id }} | ₹ {{ $course_price }} |
@endcomponent
Download [**Microsoft Teams**](https://www.microsoft.com/en-in/microsoft-teams/download-app), **What's App** &**Telegram** for further updates.

Thanks,<br>
{{ config('app.name') }}<br>
Date: {{ $date }}
@endcomponent
