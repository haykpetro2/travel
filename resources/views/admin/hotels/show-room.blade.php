@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="card">

            <div class="card-content collapse show">
                <div class="card-body">
                    <table class="table table-striped table-bordered sourced-data">
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$hotelRoom->name}}</td>
                        </tr>
                        <tr>
                            <td>Count</td>
                            <td>{{$hotelRoom->count}}</td>
                        </tr>

                        <tr>
                            <td>Images:</td>
                            <td>
                                @foreach($hotelRoom->photos as $photo)
                                    <a href="{{asset('uploads/hotels/photos/'.$photo->name)}}" target="_blank"><img
                                            src="{{asset('uploads/hotels/photos/'.$photo->name)}}" alt="" height="100">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        @foreach($hotelRoom->settings as $setting)
                            <tr>
                                <td>Season Name/Price</td>
                                <td>{{$setting->season->name.' - '. $setting->price}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('hotel-room.edit',$hotelRoom->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
