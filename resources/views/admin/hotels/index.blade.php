@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('hotel.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Home Page</th>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Type</th>
                            <th>Star</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hotels as $hotel)
                            <tr id="hotel-{{$hotel->id}}">
                                <td>
                                    @if($hotel->home)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>{{$hotel->name_en}}</td>
                                <td>{{$hotel->short_description_en}}</td>
                                <td>{{$hotel->type}}</td>
                                <td>{{$hotel->star}}</td>
                                <td>
                                    <a href="{{asset('uploads/hotels/'.$hotel->image)}}">
                                        <img src="{{asset('uploads/hotels/'.$hotel->image)}}" alt="" width="80">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('hotel.show',$hotel->id)}}"><i class="ft-eye"></i></a>
                                    <a href="{{route('hotel.edit',$hotel->id)}}"><i class="ft-edit"></i></a>
                                    <i class="ft-trash hotel-delete" data-id="{{$hotel->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$hotels->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/hotel.js')}}"></script>
@endsection
