@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-iconfall">
                        <li class="nav-item">
                            <a class="nav-link active show" id="homeIcon3-tab1" data-toggle="tab" href="#homeIcon31"
                               aria-controls="homeIcon31" role="tab" aria-selected="true"><i
                                        class="fa fa-building"></i> Hotel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon3-tab1" data-toggle="tab" href="#profileIcon31"
                               aria-controls="profileIcon31" role="tab" aria-selected="false"><i class="fa fa-bed"></i>
                                Room</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-calendar"></i>
                                Seasons</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <table class="table table-striped table-bordered sourced-data">
                                <tbody>
                                <tr>
                                    <td>Home Page</td>
                                    <td>
                                        @if($hotel->home)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{$hotel->country->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{$hotel->city->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Name Ru:</td>
                                    <td>{{$hotel->name_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Name En:</td>
                                    <td>{{$hotel->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{$hotel->type}}</td>
                                </tr>
                                <tr>
                                    <td>Star</td>
                                    <td>{{$hotel->star}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$hotel->address}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$hotel->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$hotel->email}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description Ru:</td>
                                    <td>{{$hotel->short_description_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description En:</td>
                                    <td>{{$hotel->short_description_en}}</td>
                                </tr>
                                <tr>
                                    <td>Description Ru:</td>
                                    <td>{!! $hotel->description_ru !!}</td>
                                </tr>
                                <tr>
                                    <td>Description En:</td>
                                    <td>{!! $hotel->description_en !!}</td>
                                </tr>
                                <tr>
                                    <td>Cover Image:</td>
                                    <td><a href="{{asset('uploads/hotels/'.$hotel->image)}}" target="_blank"><img
                                                    src="{{asset('uploads/hotels/'.$hotel->image)}}" alt="" height="80"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('hotel.edit',$hotel->id)}}"><i class="ft-edit"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Count</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hotel->rooms as $room)
                                    <tr>
                                        <td>{{$room->name}}</td>
                                        <td>{{$room->count}}</td>
                                        <td>{{$room->price}}</td>
                                        <td>
                                            @isset($room->sale)
                                                {{$room->sale}}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                        <td>
                                            <a href="{{route('hotel-room.show',$room->id)}}"><i class="ft-eye"></i></a>
                                            <a href="{{route('hotel-room.edit',$room->id)}}"><i class="ft-edit"></i></a>
                                            <i class="ft-trash room-delete" data-id="{{$room->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form class="form mt-5" action="{{route('hotel-room.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" id="price" class="form-control" name="price">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="sale">Sale</label>
                                                <input type="number" id="sale" class="form-control" name="sale">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="count">Person Count</label>
                                                <input type="number" id="count" class="form-control" name="count">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <fieldset class="form-group col-md-6">
                                            <label for="photos">Images</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="photos" name="photos[]"
                                                       multiple>
                                                <label class="custom-file-label" for="photos">Choose files</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="repeater-default">
                                        <div data-repeater-list="settings">
                                            <div data-repeater-item>
                                                <div class="row mb-1 ">
                                                    <div class="form-group col-sm-12 col-md-4">
                                                        <label for="setting">Seasons</label>
                                                        <select class="form-control" id="setting" name="season_id">
                                                            <option value="">-</option>
                                                            @foreach($hotel->seasons as $season)
                                                                <option
                                                                        value="{{$season->id}}">{{$season->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="price">Price</label>
                                                        <input type="number" id="price" class="form-control"
                                                               name="price">
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-2 text-center mt-1 pt-1">
                                                        <button type="button" class="btn btn-danger"
                                                                data-repeater-delete><i
                                                                    class="ft-x"></i> Delete
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group overflow-hidden">
                                            <div class="col-12">
                                                <button type="button" data-repeater-create
                                                        class="btn btn-primary btn-lg">
                                                    <i class="icon-plus4"></i> Add
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="tab-pane" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hotel->seasons as $season)
                                    <tr>
                                        <td>{{$season->name}}</td>
                                        <td>{{\Carbon\Carbon::parse($season->start_date)->format('d-m-Y')}}</td>
                                        <td>{{\Carbon\Carbon::parse($season->end_date)->format('d-m-Y')}}</td>
                                        <td>
                                            <i class="ft-trash season-delete" data-id="{{$season->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form class="form mt-5" action="{{route('season.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" class="form-control" name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" id="start_date" class="form-control"
                                                       name="start_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="end_date">End Date</label>
                                                <input type="date" id="end_date" class="form-control" name="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-save"></i> Save
                                        </button>
                                        <button type="reset" class="btn btn-danger mr-1">
                                            <i class="ft-x"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('.season-delete').on('click', function () {
                $.ajax({
                    url: adminUrl + "/season/" + $(this).data('id'),
                    type: "post",
                    data: {_method: 'delete'},
                    success: function () {
                        location.reload();
                    }
                });
            });
            $('.room-delete').on('click', function () {
                $.ajax({
                    url: adminUrl + "/hotel-room/" + $(this).data('id'),
                    type: "post",
                    data: {_method: 'delete'},
                    success: function () {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
@section('scripts')
    <script src="{{asset('admin/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/form-repeater.js')}}"></script>
@endsection
