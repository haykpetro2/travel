@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('city.update',$city->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ru">Name Ru</label>
                                        <input type="text" id="name_ru" class="form-control" name="name_ru"
                                               value="{{$city->name_ru}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" id="name_en" class="form-control" name="name_en"
                                               value="{{$city->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="country">Select Country</label>
                                    <select class="form-control select2" id="country" name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{($city->country_id == $country->id) ? 'selected' : ''}}>{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Capital</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="capital" class="custom-control-input" id="yes"
                                                   value="1" {{($city->capital == 1) ? 'checked':''}}>
                                            <label class="custom-control-label" for="yes">Yes</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="capital" class="custom-control-input" id="no"
                                                   value="0" {{($city->capital == 0) ? 'checked':''}}>
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control"
                                              name="description_ru">{{$city->description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control"
                                              name="description_en">{{$city->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="basicInputFile">Images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                               name="photos[]" multiple>
                                        <label class="custom-file-label" for="photos">Choose files</label>
                                    </div>
                                </fieldset>
                                @foreach($city->photos as $photo)
                                    <figure class="effect-zoe" id="photo-{{$photo->id}}">
                                        <img src="{{asset('uploads/city/'.$photo->name)}}" alt="img25" height="80">
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
    <script src="{{asset('admin/js/pages/country.js')}}"></script>
@endsection
