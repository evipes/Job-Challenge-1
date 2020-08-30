@component('mail::message')
# Olá {{$name}}

{{$text}}

Muito obrigado,<br>
{{ config('app.name') }}
@endcomponent