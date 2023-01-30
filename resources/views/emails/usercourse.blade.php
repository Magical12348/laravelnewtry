@component('mail::message')

# Introduction

**{{ $user->name }}** has registered to **{{ $course->title }}**.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
