@extends('admin.layouts.header-footer')
@section('css')

@endsection
@section('content')
    @include('admin.modals.transport-attribute')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-iconfall">
                        <li class="nav-item">
                            <a class="nav-link active show" id="homeIcon3-tab1" data-toggle="tab" href="#homeIcon31"
                               aria-controls="homeIcon31" role="tab" aria-selected="true"><i
                                        class="fa fa-car"></i> Transport</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i class="fa fa-tags"></i>
                                Types</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon3-tab1" data-toggle="tab" href="#profileIcon31"
                               aria-controls="profileIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-car"></i>
                                Models</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="attributes-tab1" data-toggle="tab" href="#attributes"
                               aria-controls="attributes" role="tab" aria-selected="false"><i
                                        class="fa fa-file-movie-o"></i>
                                Attributes</a>
                        </li>

                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <a href="{{route('transport.create')}}" class="btn btn-dark mb-2">New</a>
                            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Model</th>
                                    <th>Driver</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($transports as $transport)
                                    <tr>

                                        <td>{{$transport->name_en}}</td>
                                        <td>{{$transport->type->name_en}}</td>
                                        <td>{{$transport->model->name_en}}</td>
                                        <td>
                                            @if($transport->driver)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{asset('uploads/transports/'.$transport->image)}}">
                                                <img src="{{asset('uploads/transports/'.$transport->image)}}" alt=""
                                                     width="80">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('transport.show',$transport->id)}}"><i class="ft-eye"></i></a>
                                            <a href="{{route('transport.edit',$transport->id)}}"><i class="ft-edit"></i></a>
                                            <i class="ft-trash transport-delete" data-id="{{$transport->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-9">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                    {{$transports->links()}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
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
                                        <input type="text" id="transport_type_name_ru" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" id="transport_type_name_en" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="mt-1 btn btn-dark transport-type-create">New
                                        </button>
                                    </td>
                                </tr>
                                @foreach($types as $type)
                                    <tr>
                                        <td>
                                            <input type="text" id="transport-type-name-ru-{{$type->id}}"
                                                   value="{{$type->name_ru}}"
                                                   class="form-control"></td>
                                        <td><input type="text" id="transport-type-name-en-{{$type->id}}"
                                                   value="{{$type->name_en}}"
                                                   class="form-control"></td>
                                        <td>
                                            <i class="ft-edit transport-type-update"
                                               data-id="{{$type->id}}"></i>
                                            <i class="ft-trash transport-type-delete"
                                               data-id="{{$type->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">

                            <table class="table table-striped table-bordered sourced-data">
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
                                        <input type="text" id="transport_model_name_ru" class="form-control"/>
                                    </td>
                                    <td>
                                        <input type="text" id="transport_model_name_en" class="form-control"/>
                                    </td>
                                    <td>
                                        <button type="button" class="mt-1 btn btn-dark transport-model-create">New
                                        </button>
                                    </td>
                                </tr>
                                @foreach($models as $model)
                                    <tr>
                                        <td>
                                            <input type="text"
                                                   id="transport-model-name-ru-{{$model->id}}"
                                                   value="{{$model->name_ru}}"
                                                   class="form-control"/></td>
                                        <td><input type="text"
                                                   id="transport-model-name-en-{{$model->id}}"
                                                   value="{{$model->name_en}}"
                                                   class="form-control"/></td>
                                        <td>
                                            <i class="ft-edit transport-model-update"
                                               data-id="{{$model->id}}"></i>
                                            <i class="ft-trash transport-model-delete"
                                               data-id="{{$model->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="attributes" aria-labelledby="attributes-tab1" role="tab"
                             aria-selected="false">
                            <i data-toggle="modal" data-target="#transport-attribute" class="btn btn-dark mb-2">New</i>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name Ru</th>
                                    <th>Name En</th>
                                    <th>Price</th>
                                    <th>Icon</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attributes as $attribute)
                                    <tr>

                                        <td>
                                            <input type="text"
                                                   id="transport-attribute-name-ru-{{$attribute->id}}"
                                                   class="form-control"
                                                   value="{{$attribute->name_ru}}"></td>
                                        <td><input type="text"
                                                   id="transport-attribute-name-en-{{$attribute->id}}"
                                                   class="form-control"
                                                   value="{{$attribute->name_en}}"></td>
                                        <td><input type="number"
                                                   id="transport-attribute-price-{{$attribute->id}}"
                                                   class="form-control"
                                                   value="{{$attribute->price}}"></td>
                                        <td>
                                            <button class="btn btn-secondary" id="icon-{{$attribute->id}}"
                                                    role="iconpicker"
                                                    data-icon="{{$attribute->icon}}">
                                            </button>
                                        </td>
                                        <td>
                                            <i class="ft-edit transport-attribute-update"
                                               data-id="{{$attribute->id}}"></i>
                                            <i class="ft-trash transport-attribute-delete"
                                               data-id="{{$attribute->id}}"></i>
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
    <script src="{{asset('admin/js/pages/transport.js')}}"></script>
@endsection


