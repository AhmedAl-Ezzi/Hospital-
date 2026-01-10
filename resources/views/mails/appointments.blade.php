<x-mail::message>
# {{ $name }}

تم حجز موعدك بتارخ : {{ $appointment }}

<x-mail::button :url="'http://hospitals.test/'">
اذهب للموقع
</x-mail::button>

شكرا,<br>
{{ config('app.name') }}
</x-mail::message>
