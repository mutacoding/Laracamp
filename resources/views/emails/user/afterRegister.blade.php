<x-mail::message>
# Welcome!

Hi {{$user->name}}
<br>
Welcome to Laracamp, your account has been created succesfully. Now you can choose your best watch camp!

<x-mail::button :url="$url">
Login Here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
