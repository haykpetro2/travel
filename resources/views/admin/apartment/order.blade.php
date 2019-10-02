<table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
    <thead>
    <tr>
        <th>Apartment</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Note</th>
        <th>Total</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders  as $order)
        <tr id="order-{{$order->id}}">
            <td class="text-truncate"><a
                        href="{{route('apartment.show',$order->apartment_id)}}">{{$order->apartment->name_en}}</a>
            </td>
            <td class="text-truncate">{{$order->first_name}}</td>
            <td class="text-truncate">{{$order->last_name}}</td>
            <td class="text-truncate">{{$order->email}}</td>
            <td class="text-truncate">{{$order->phone}}</td>
            <td class="text-truncate">{{$order->check_in}}</td>
            <td class="text-truncate">{{$order->check_out}}</td>
            <td class="text-truncate">
                @isset($order->note)
                    {{$order->note}}
                @else

                @endisset
            </td>
            <td class="text-truncate">{!! $order->total !!}</td>
            <td class="text-truncate"><i class="fa fa-trash order-delete" data-id="{{$order->id}}"
                                         data-name="apartment"></i>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


