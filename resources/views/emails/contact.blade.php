@component('mail::message')
    <h1 class="text-center">Contact Us</h1>
    {{$request['name']}}
    {{$request['email']}}
    {{$request['message']}}
    Thanks,
    {{ config('app.name') }}
@endcomponent
