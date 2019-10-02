@component('mail::message')

    <h1>Total - {!! $total !!}</h1>
    # Hotel - {{$hotel}}
    # Room - {{$room}}
    # First Name - {{$request['first_name']}}
    # Last Name - {{$request['last_name']}}
    # Email - {{$request['email']}}
    # Phone - {{$request['phone']}}
    # Check In - {{$request['check_in']}}
    # Check Out - {{$request['check_out']}}
    # Person - {{$request['person']}}
    # Note - {{$request['note']}}


    Thanks,
    {{ config('app.name') }}
@endcomponent
