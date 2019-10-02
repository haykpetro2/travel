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
                                        class="fa fa-paper-plane"></i> Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon3-tab1" data-toggle="tab" href="#profileIcon31"
                               aria-controls="profileIcon31" role="tab" aria-selected="false"><i class="fa fa-male"></i>
                                Expert</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i class="fa fa-tasks"></i>
                                Types</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <a href="{{route('tour.create')}}" class="btn btn-dark mb-2">New</a>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Home</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Tour Type</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($tours as $tour)
                                    <tr>
                                        <td>
                                            @if($tour->home)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>{{$tour->name_en}}</td>
                                        <td>
                                            @if($tour->type)
                                                Groups
                                            @else
                                                Individual
                                            @endif</td>
                                        <td>{{$tour->tour_type->name_en}}</td>
                                        <td>{{$tour->price}}</td>
                                        <td>
                                            <a href="{{asset('uploads/tours/'.$tour->image)}}">
                                                <img src="{{asset('uploads/tours/'.$tour->image)}}" alt="" width="80">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('tour.show',$tour->id)}}"><i class="ft-eye"></i></a>
                                            <a href="{{route('tour.edit',$tour->id)}}"><i class="ft-edit"></i></a>
                                            <i class="ft-trash tour-delete" data-id="{{$tour->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-9">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                    {{$tours->links()}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">
                            <a href="{{route('expert.create')}}" class="btn btn-dark mb-2">New</a>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Skype</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($experts as $expert)
                                    <tr>
                                        <td>{{$expert->name}}</td>
                                        <td>{{$expert->email}}</td>
                                        <td>{{$expert->skype}}</td>
                                        <td>{{$expert->phone}}</td>
                                        <td><a href="{{asset('uploads/experts/'.$expert->image)}}">
                                                <img src="{{asset('uploads/experts/'.$expert->image)}}" alt=""
                                                     width="80">
                                            </a></td>
                                        <td>
                                            <a href="{{route('expert.edit',$expert->id)}}"><i class="ft-edit"></i></a>
                                            <i class="ft-trash expert-delete" data-id="{{$expert->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <table  class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name Ru</th>
                                    <th>Name En</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" id="tour_type_name_ru" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" id="tour_type_name_en" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="mt-1 btn btn-dark tour-type-create">New</button>
                                    </td>
                                </tr>
                                @foreach($tour_types as $tour_type)
                                    <tr>
                                        <td><input type="text" id="tour-type-name-ru-{{$tour_type->id}}"
                                                   value="{{$tour_type->name_ru}}"
                                                   class="form-control"></td>
                                        <td><input type="text" id="tour-type-name-en-{{$tour_type->id}}"
                                                   value="{{$tour_type->name_en}}"
                                                   class="form-control"></td>
                                        <td>
                                            <i class="ft-edit tour-type-update" data-id="{{$tour_type->id}}"></i>
                                            <i class="ft-trash tour-type-delete" data-id="{{$tour_type->id}}"></i>
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