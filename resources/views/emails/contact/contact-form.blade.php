@component('mail::message')
# bonjour

vous avez recu un mail de {{ $data['name'] }} ({{ $data['email'] }})

message

{{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
