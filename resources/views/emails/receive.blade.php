@component('mail::message')

New Tutor has Filled The Form.

@component('mail::button', ['url' => $url])
View Tutor
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
