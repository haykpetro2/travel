@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('apartment.update',$apartment->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>Home Page</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="home" class="custom-control-input" id="yes"
                                                   value="1" {{($apartment->home == 1) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="yes">Yes</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="home" class="custom-control-input" id="no"
                                                   value="0" {{($apartment->home == 0) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name_ru">Name Ru</label>
                                        <input type="text" id="name_ru" class="form-control" name="name_ru"
                                               value="{{$apartment->name_ru}}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" id="name_en" class="form-control" name="name_en"
                                               value="{{$apartment->name_ru}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="apartment" {{($apartment->type == 'apartment') ? 'selected' : ''}}>
                                            Apartment
                                        </option>
                                        <option value="house" {{($apartment->type == 'house') ? 'selected' : ''}}>
                                            House
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control" name="price"
                                           value="{{$apartment->price}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="room">Room</label>
                                    <input type="number" id="room" class="form-control" name="room"
                                           value="{{$apartment->room}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="area">Area</label>
                                    <input type="number" id="area" class="form-control" name="area"
                                           value="{{$apartment->area}}">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sale">Sale</label>
                                        <input type="number" id="sale" class="form-control" name="sale"
                                               value="{{$apartment->sale}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" class="form-control" name="address"
                                               value="{{$apartment->address}}">
                                    </div>
                                </div>
                                <fieldset class="form-group col-md-4">
                                    <label for="basicInputFile">Cover Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </fieldset>
                                <div class="col-md-2">
                                    <a href="{{asset('uploads/apartments/'.$apartment->image)}}" target="_blank">
                                        <img src="{{asset('uploads/apartments/'.$apartment->image)}}" alt="" height="80">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control editor"
                                              name="description_ru">{{$apartment->description_ru}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control editor"
                                              name="description_en">{{$apartment->description_en}}</textarea>
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
                                @foreach($apartment->photos as $photo)
                                    <figure class="effect-zoe" id="photo-{{$photo->id}}">
                                        <img src="{{asset('uploads/apartments/photos/'.$photo->name)}}" alt="img25"
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
    <script src="{{asset('admin/js/pages/apartment.js')}}"></script>
@endsection
