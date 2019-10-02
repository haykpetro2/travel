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
                                        class="fa fa-info-circle"></i> Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon3-tab1" data-toggle="tab" href="#profileIcon31"
                               aria-controls="profileIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-building"></i>
                                Hotels</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-compass"></i>
                                Destination</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#tour_code"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-code"></i>
                                Promo Code</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="comments-tab1" data-toggle="tab" href="#comments"
                               aria-controls="comments" role="tab" aria-selected="false"><i
                                        class="fa fa-comment"></i>
                                Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <table class="table table-striped table-bordered sourced-data">
                                <tbody>
                                <tr>
                                    <td>Home</td>
                                    <td>
                                        @if($tour->home)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>
                                        @if($tour->type)
                                            Groups
                                        @else
                                            Individual
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{$tour->country->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Name Ru</td>
                                    <td>{{$tour->name_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Name En</td>
                                    <td>{{$tour->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Expert</td>
                                    <td>{{$tour->expert->name}}</td>
                                </tr>
                                <tr>
                                    <td>Tour Type</td>
                                    <td>{{$tour->tour_type->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>{{$tour->price}}</td>
                                </tr>
                                @if(isset($tour->sale))
                                    <tr>
                                        <td>Sale</td>
                                        <td>{{$tour->sale}}</td>
                                    </tr>
                                @endif
                                @if(isset($tour->checks))
                                    <tr>
                                        <td>Chech In/Check Out</td>
                                        <td>
                                            @foreach($tour->checks as $check)
                                                {{\Carbon\Carbon::parse($check['check_in'])->format('d-m-Y').' / '.\Carbon\Carbon::parse($check['check_out'])->format('d-m-Y')}}
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Short Description Ru</td>
                                    <td>{{$tour->short_description_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description En</td>
                                    <td>{{$tour->short_description_en}}</td>
                                </tr>
                                <tr>
                                    <td>Description Ru</td>
                                    <td>{!! $tour->description_ru !!}</td>
                                </tr>
                                <tr>
                                    <td>Description En</td>
                                    <td>{!! $tour->description_en !!}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <a href="{{asset('uploads/tours/'.$tour->image)}}">
                                            <img src="{{asset('uploads/tours/'.$tour->image)}}" alt="" height="80">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Action</td>
                                    <td><a href="{{route('tour.edit',$tour->id)}}"><i class="ft-edit"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">
                            <a href="{{route('tour-hotel.show',$tour->id)}}" class="btn btn-dark mb-2">New</a>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Person/Price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tour->tour_hotels as $tour_hotel)
                                    <tr>
                                        <td>{{$tour_hotel->hotel->name_en}}</td>
                                        <td>
                                            @foreach($tour_hotel->prices as  $key => $value)
                                                {{$key}} / {{$value}} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <i class="ft-trash tour-hotel-delete" data-id="{{$tour_hotel->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <a href="{{route('tour-destination.show',$tour->id)}}" class="btn btn-dark mb-2">New</a>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Title Ru</th>
                                    <th>Title En</th>
                                    <th>Day</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tour->destinations as $destination)
                                    <tr>
                                        <td>{{$destination->title_ru}}</td>
                                        <td>{{$destination->title_en}}</td>
                                        <td>{{$destination->day}}</td>
                                        <td>
                                            <a href="{{route('tour-destination.edit',$destination->id)}}"><i
                                                        class="ft-edit"></i></a>
                                            <i class="ft-trash destination-delete" data-id="{{$destination->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tour_code" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Percent</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control" id="code"
                                               value="{{$tour->promoCode->code}}"/>
                                    </td>
                                    <td>
                                        <label for="percent">Percent</label>
                                        <input type="text" class="form-control" id="percent"
                                               value="{{$tour->promoCode->percent}}"/>
                                    </td>

                                    <td>
                                        <i class="ft-edit promo-code-update"></i>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="comments" aria-labelledby="comments-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Publish</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>
                                            {{$comment->name}}
                                        </td>
                                        <td>
                                            {{$comment->email}}
                                        </td>
                                        <td>{{$comment->comment}}</td>
                                        <td>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input pub"
                                                       id="yes-{{$comment->id}}" data-id="{{$comment->id}}"
                                                       value="1" {{($comment->status == 1) ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="yes-{{$comment->id}}">Yes</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" class="custom-control-input pub"
                                                       id="no-{{$comment->id}}" data-id="{{$comment->id}}"
                                                       value="0" {{($comment->status == 0) ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="no-{{$comment->id}}">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/tour.js')}}"></script>
@endsection
