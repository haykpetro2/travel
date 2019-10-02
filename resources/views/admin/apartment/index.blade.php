@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('apartment.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Sale</th>
                            <th>Room</th>
                            <th>Area</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($apartments as $apartment)
                            <tr>
                                <td>{{$apartment->name_ru}}</td>
                                <td>{{$apartment->type}}</td>
                                <td>{{$apartment->price}}</td>
                                <td>
                                    @isset($apartment->sale)
                                        {{$apartment->sale}}
                                    @else
                                        -
                                    @endisset
                                </td>
                                <td>{{$apartment->room}}</td>
                                <td>{{$apartment->area}}</td>
                                <td>
                                    <a href="{{asset('uploads/apartments/'.$apartment->image)}}">
                                        <img src="{{asset('uploads/apartments/'.$apartment->image)}}" alt=""
                                             height="80">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('apartment.show',$apartment->id)}}"><i class="ft-eye"></i></a>
                                    <a href="{{route('apartment.edit',$apartment->id)}}"><i class="ft-edit"></i></a>
                                    <i class="ft-trash apartment-delete" data-id="{{$apartment->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$apartments->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/apartment.js')}}"></script>
@endsection

