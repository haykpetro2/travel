@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <table class="table table-striped table-bordered sourced-data">
                        <tbody>
                        <tr>
                            <td>Name Ru:</td>
                            <td>{{$excursion->name_ru}}</td>
                        </tr>
                        <tr>
                            <td>Name En:</td>
                            <td>{{$excursion->name_en}}</td>
                        </tr>
                        <tr>
                            <td>Km</td>
                            <td>{{$excursion->km}}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{$excursion->time}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>{{$excursion->price}}</td>
                        </tr>
                        <tr>
                            <td>Other Price</td>
                            <td>{{$excursion->other_price}}</td>
                        </tr>
                        <tr>
                            <td>Sale</td>
                            <td>
                                @isset($excursion->sale)
                                    {{$excursion->sale}}
                                @else
                                    -
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td>Ticket</td>
                            <td>{{$excursion->ticket}}</td>
                        </tr>
                        <tr>
                            <td>Percent</td>
                            <td>{{$excursion->percent}}</td>
                        </tr>
                        <tr>
                            <td>Addition per person</td>
                            <td>{{$excursion->addition}}</td>
                        </tr>
                        <tr>
                            <td>Guide</td>
                            <td>{{$excursion->guide}}</td>
                        </tr>
                        <tr>
                            <td>Lunch</td>
                            <td>{{$excursion->lunch}}</td>
                        </tr>
                        <tr>
                            <td>Description Ru:</td>
                            <td>{!! $excursion->description_ru !!}</td>
                        </tr>
                        <tr>
                            <td>Description En:</td>
                            <td>{!! $excursion->description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Cover Image</td>
                            <td>
                                <a href="{{asset('uploads/excursions/'.$excursion->image)}}" target="_blank">
                                    <img src="{{asset('uploads/excursions/'.$excursion->image)}}" alt="" height="80">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Images</td>
                            <td>
                                @foreach($excursion->photos as $photo)
                                    <a href="{{asset('uploads/excursions/photos/'.$photo->name)}}" target="_blank">
                                        <img src="{{asset('uploads/excursions/photos/'.$photo->name)}}" alt=""
                                             height="80">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('excursion.edit',$excursion->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
