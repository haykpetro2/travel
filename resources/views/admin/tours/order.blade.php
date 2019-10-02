<table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
    <thead>
    <tr>
        <th>Tour</th>
        <th>Hotel</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Adult</th>
        <th>Child_6</th>
        <th>Child_12</th>
        <th>Note</th>
        <th>Total</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders  as $order)
        <tr id="order-{{$order->id}}">

            <td class="text-truncate">
                <a href="{{route('tour.show',$order->tour_id)}}" target="_blank">{{$order->tour->name_en}}</a>
            </td>
            <td>
                <a href="{{route('hotel.show',$order->hotel_id)}}" target="_blank">{{$order->hotel_name}}</a>
            </td>
            <td class="text-truncate">{{$order->first_name}}</td>
            <td class="text-truncate">{{$order->last_name}}</td>
            <td class="text-truncate">{{$order->email}}</td>
            <td class="text-truncate">{{$order->phone}}</td>
            <td class="text-truncate">{{$order->adult}}</td>
            <td class="text-truncate">{{$order->child_6}}</td>
            <td class="text-truncate">{{$order->child_12}}</td>
            <td class="text-truncate">
                @isset($order->note)
                    {{$order->note}}
                @else

                @endisset
            </td>
            <td class="text-truncate">{!! $order->total !!}</td>
            <td class="text-truncate"><i class="fa fa-trash order-delete" data-id="{{$order->id}}" data-name="tour"></i>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>




