<table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
    <thead>
    <tr>
        <th>Excursion</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Person</th>
        <th>Lunch</th>
        <th>Guide</th>
        <th>Note</th>
        <th>Total</th>
        <th>Per Person</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders  as $order)
        <tr id="order-{{$order->id}}">

            <td class="text-truncate"><a
                        href="{{route('excursion.show',$order->excursion_id)}}">{{$order->excursion->name_en}}</a>
            </td>
            <td class="text-truncate">{{$order->first_name}}</td>
            <td class="text-truncate">{{$order->last_name}}</td>
            <td class="text-truncate">{{$order->email}}</td>
            <td class="text-truncate">{{$order->phone}}</td>
            <td class="text-truncate">{{$order->check_in}}</td>
            <td class="text-truncate">{{$order->check_out}}</td>
            <td class="text-truncate">{{$order->person}}</td>
            <td class="text-truncate">{{$order->lunch}}</td>
            <td class="text-truncate">{{$order->guide}}</td>
            <td class="text-truncate">
                @isset($order->note)
                    {{$order->note}}
                @else

                @endisset
            </td>
            <td class="text-truncate">{!! $order->total !!}</td>
            <td class="text-truncate">{!! $order->per_person !!}</td>
            <td class="text-truncate"><i class="fa fa-trash order-delete" data-id="{{$order->id}}"
                                         data-name="excursion"></i>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

