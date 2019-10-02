@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Country</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('country.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Name Ru</th>
                            <th>Name En</th>
                            <th>Description Ru</th>
                            <th>Description En</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($countries as $country)
                            <tr id="country-{{$country->id}}">
                                <td>{{$country->name_ru}}</td>
                                <td>{{$country->name_en}}</td>
                                <td>{{$country->description_ru}}</td>
                                <td>{{$country->description_en}}</td>
                                <td><a href="{{asset('uploads/country/'.$country->image)}}" target="_blank"><img
                                                src="{{asset('uploads/country/'.$country->image)}}" alt=""
                                                width="80"></a>
                                </td>
                                <td>
                                    <a href="{{route('country.show',$country->id)}}"><i class="ft-eye"></i></a>
                                    <a href="{{route('country.edit',$country->id)}}"><i class="ft-edit"></i></a>
                                    <i class="ft-trash country-delete" data-id="{{$country->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$countries->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">City</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('city.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Name Ru</th>
                            <th>Name En</th>
                            <th>Country</th>
                            <th>Capital</th>
                            <th>Description Ru</th>
                            <th>Description En</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr id="city-{{$city->id}}" class="country-city-{{$city->country->id}}">
                                <td>{{$city->name_ru}}</td>
                                <td>{{$city->name_en}}</td>
                                <td>{{$city->country->name_ru}}</td>
                                <td>
                                    @if($city->capital)
                                        Capital
                                    @else
                                        No Capital
                                    @endif
                                </td>
                                <td>{{$city->description_ru}}</td>
                                <td>{{$city->description_en}}</td>
                                <td>
                                    <a href="{{route('city.show',$city->id)}}"><i class="ft-eye"></i></a>
                                    <a href="{{route('city.edit',$city->id)}}"><i class="ft-edit"></i></a>
                                    <i class="ft-trash city-delete" data-id="{{$city->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$cities->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <div class="row">
                        @isset($city->photos)
                            @foreach($cities as $city)
                                @foreach($city->photos as $photo)
                                    <figure class="col-lg-3 col-md-6 col-12 city-{{$city->id}} country-city-photos-{{$city->country->id}}">
                                        <a href="{{asset('uploads/city/'.$photo->name)}}" itemprop="contentUrl"
                                           data-size="480x360" target="_blank">
                                            <img class="img-thumbnail img-fluid"
                                                 src="{{asset('uploads/city/'.$photo->name)}}"
                                                 title="{{$city->name_ru}}" height="80"/>
                                        </a>
                                    </figure>
                                @endforeach
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/country.js')}}"></script>
@endsection

