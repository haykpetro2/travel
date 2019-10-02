@component('mail::message')

    <h1>Total - {!! $total !!}</h1>
    # Tour - {{$tour}}
    # Hotel - {{$hotel}}
    # First Name - {{$request['first_name']}}
    # Last Name - {{$request['last_name']}}
    # Email - {{$request['email']}}
    # Phone - {{$request['phone']}}
    # Adult - {{$request['adult']}}
    # Child 6 - {{$request['child_6']}}
    # Child 12 - {{$request['child_12']}}
    # Note - {{$request['note']}}
    # PromoCode - {{$request['promo_code']}}
  

    Thanks,
    {{ config('app.name') }}
@endcomponent
