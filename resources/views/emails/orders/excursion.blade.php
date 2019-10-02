@component('mail::message')

    <h1>Total - {!! $total !!} <br> Per Person - {!! $per_person !!}</h1>
    # Excursion - {{$excursion}}
    # First Name - {{$request['first_name']}}
    # Last Name - {{$request['last_name']}}
    # Email - {{$request['email']}}
    # Phone - {{$request['phone']}}
    # Check In - {{$request['check_in']}}
    # Check Out - {{$request['check_out']}}
    # Person - {{$request['person']}}
    # Lunch - {{$request['lunch']}}
    # Guide - {{$request['guide']}}
    # Note - {{$request['note']}}


    Thanks,
    {{ config('app.name') }}
@endcomponent
