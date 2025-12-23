@component('mail::message')
# Reactie op uw bericht

Beste,

{{ $replyMessage }}

Met vriendelijke groet,
{{ config('app.name') }}
@endcomponent