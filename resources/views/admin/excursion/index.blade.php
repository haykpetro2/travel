@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Excursion</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('excursion.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Km</th>
                            <th>Time</th>
                            <th>Price</th>
                            <th>Other Price</th>
                            <th>Sale</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($excursions as $excursion)
                            <tr id="excursion-{{$excursion->id}}">
                                <td>{{$excursion->name_ru}}</td>
                                <td>{{$excursion->km}}</td>
                                <td>{{$excursion->time}}</td>
                                <td>{{$excursion->price}}</td>
                                <td>{{$excursion->other_price}}</td>
                                <td>
                                    @isset($excursion->sale)
                                        {{$excursion->sale}}
                                    @else
                                        -
                                    @endisset
                                </td>
                                <td>
                                    <p class="crud-buttons">
                                        <a href="{{route('excursion.show',$excursion->id)}}"><i class="ft-eye"></i></a>
                                        <a href="{{route('excursion.edit',$excursion->id)}}"><i class="ft-edit"></i></a>
                                        <i class="ft-trash excursion-delete" data-id="{{$excursion->id}}"></i>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$excursions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/excursion.js')}}"></script>
@endsection