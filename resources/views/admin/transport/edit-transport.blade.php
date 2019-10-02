@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('transport.update',$transport->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ru">Name Ru</label>
                                        <input type="text" id="name_ru" class="form-control" name="name_ru"
                                               value="{{$transport->name_ru}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" id="name_en" class="form-control" name="name_en"
                                               value="{{$transport->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="type_id">Types</label>
                                    <select class="form-control select2" id="type_id" name="type_id">
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}" {{($transport->type_id == $type->id) ? 'selected' : ''}}>{{$type->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="model">Models</label>
                                    <select class="form-control select2" id="model" name="model_id">
                                        @foreach($models as $model)
                                            <option value="{{$model->id}}" {{($transport->model_id ==$model->id) ? 'selected' : ''}}>{{$model->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-4">
                                    <label for="basicInputFile">Cover Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </fieldset>
                                <div class="col-md-2">
                                    <a href="{{asset('uploads/transports/'.$transport->image)}}" target="_blank">
                                        <img src="{{asset('uploads/transports/'.$transport->image)}}" alt=""
                                             height="80">
                                    </a>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="tour_type_id">Transmission</label>
                                    <select class="form-control select2" id="tour_type_id" name="transmission">
                                        <option value="1" {{($transport->transmission == 1) ? 'selected' : ''}} >
                                            Automatic box
                                        </option>
                                        <option value="0" {{($transport->transmission == 0) ? 'selected' : ''}}>
                                            Mechanical Box
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control" name="price"
                                           value="{{$transport->price}}"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="sale">Sale</label>
                                    <input type="number" id="sale" class="form-control" name="sale"
                                           value="{{$transport->sale}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="attributes">Attributes</label>
                                    <select class="form-control select2" id="attributes" name="attributes[]" multiple>

                                        @isset($transport->attributes)
                                            @foreach($transport->attributes as $attr)
                                                {{$data[]= $attr->attribute->id}}
                                            @endforeach
                                        @endisset
                                        @foreach($attributes as $attribute)
                                            <option value="{{$attribute->id}}" {{(isset($data) && in_array($attribute->id,$data)) ? 'selected' : ''}}>{{$attribute->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="person">Person Count</label>
                                    <input type="number" id="person" class="form-control" name="person"
                                           value="{{$transport->person}}"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="motor">Motor</label>
                                    <input type="number" id="motor" class="form-control" name="motor"
                                           value="{{$transport->motor}}"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="door">Door</label>
                                    <input type="number" id="door" class="form-control" name="door"
                                           value="{{$transport->door}}"/>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Driver</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="driver" class="custom-control-input" id="yes"
                                                   value="1" {{($transport->driver == 1) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="yes">Yes</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="driver" class="custom-control-input" id="no"
                                                   value="0" {{($transport->driver == 0) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="short_description_ru">Short Description Ru</label>
                                    <textarea id="short_description_ru" rows="5" class="form-control"
                                              name="short_description_ru">{{$transport->short_description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_description_en">Short Description En</label>
                                    <textarea id="short_description_en" rows="5" class="form-control"
                                              name="short_description_en">{{$transport->short_description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control editor"
                                              name="description_ru">{{$transport->description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control editor"
                                              name="description_en">{{$transport->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-4">
                                    <label for="photos">Images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photos" name="photos[]"
                                               multiple>
                                        <label class="custom-file-label" for="photos">Choose files</label>
                                    </div>
                                </fieldset>

                                @foreach($transport->photos as $photo)
                                    <figure class="effect-zoe" id="photo-{{$photo->id}}">
                                        <img src="{{asset('uploads/transports/photos/'.$photo->name)}}" alt="img25"
                                             height="80">
                                        <figcaption>
                                            <p class="icon-links">
                                                <a href="javascript:void(0);" class="mr-1 photo-delete"
                                                   data-id="{{$photo->id}}"><i
                                                            class="ft-trash"></i></a>
                                            </p>
                                        </figcaption>
                                    </figure>
                                @endforeach
                            </div>
                            <div class="form-actions">
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
@endsection

@section('scripts')
    <script src="{{asset('admin/js/pages/transport.js')}}"></script>
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>
@endsection
