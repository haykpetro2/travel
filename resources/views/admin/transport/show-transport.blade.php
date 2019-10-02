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
                                        class="fa fa-money"></i>
                                Price</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i
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
                                    <td>Name Ru</td>
                                    <td>{{$transport->name_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Name En</td>
                                    <td>{{$transport->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{$transport->type->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>{{$transport->model->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>{{$transport->price}}</td>
                                </tr>
                                <tr>
                                    <td>Sale</td>
                                    <td>
                                        @isset($transport->sale)
                                            {{$transport->sale}}
                                        @else
                                            -
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <td>Transmission</td>
                                    <td>
                                        @if($transport->transmission)
                                            Automatic
                                        @else
                                            Mechanical
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Driver</td>
                                    <td>
                                        @if($transport->driver)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Person Count</td>
                                    <td>{{$transport->person}}</td>
                                </tr>
                                <tr>
                                    <td>Motor</td>
                                    <td>{{$transport->motor}}</td>
                                </tr>
                                <tr>
                                    <td>Door</td>
                                    <td>{{$transport->door}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description Ru</td>
                                    <td>{{$transport->short_description_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description En</td>
                                    <td>{{$transport->short_description_en}}</td>
                                </tr>
                                <tr>
                                    <td>Description Ru</td>
                                    <td>{!! $transport->description_ru !!}</td>
                                </tr>
                                <tr>
                                    <td>Description En</td>
                                    <td>{!! $transport->description_en !!}</td>
                                </tr>
                                <tr>
                                    <td>Attributes</td>
                                    <td>
                                        @foreach($transport->attributes as $attrs)
                                            <i class="{{$attrs->attribute->icon}}"></i>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cover Image</td>
                                    <td>
                                        <a href="{{asset('uploads/transports/'.$transport->image)}}" target="_blank">
                                            <img src="{{asset('uploads/transports/'.$transport->image)}}" alt=""
                                                 width="100">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td>
                                        @foreach($transport->photos as $photo)
                                            <a href="{{asset('uploads/transports/photos/'.$photo->name)}}"
                                               target="_blank">
                                                <img src="{{asset('uploads/transports/photos/'.$photo->name)}}" alt=""
                                                     height="80">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Action</td>
                                    <td><a href="{{route('transport.edit',$transport->id)}}"><i class="ft-edit"></i></a>
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
                                    <th>Day</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transport->prices as $prices)
                                    <tr>
                                        <td>{{$prices->day}}</td>
                                        <td>{{$prices->price}}</td>
                                        <td>
                                            <i class="ft-trash price-delete" data-id="{{$prices->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <form action="{{route('transport-price.store')}}" method="post">
                                @csrf
                                <div class="repeater-default">
                                    <div data-repeater-list="pricing">
                                        <div data-repeater-item>
                                            <div class="row mb-1 ">
                                                <div class="form-group col-sm-12 col-md-4">
                                                    <label for="day">Day</label>
                                                    <input type="text" id="day" class="form-control"
                                                           name="day">

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
                                    <input type="hidden" name="transport_id" value="{{$transport->id}}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-danger mr-1">
                                        <i class="ft-x"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane in" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
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
    <script src="{{asset('admin/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/form-repeater.js')}}"></script>
    <script src="{{asset('admin/js/pages/transport.js')}}"></script>
@endsection