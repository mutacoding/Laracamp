<x-mail::message>
# Your Transaction has been Confirmed

Hi {{$checkout->User->name}}
<br>
Your Transaction has been confirmed, now you can enjoy the benefits of <strong>{{$checkout->Camp->title}}</strong> camp.

<x-mail::button :url="$url">
My Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
