@extends('admin.layouts.header-footer')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('hotel.update',$hotel->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>Home Page</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="home" class="custom-control-input" id="yes"
                                                   value="1" {{($hotel->home == '1') ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="yes">Yes</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="home" class="custom-control-input" id="no"
                                                   value="0" {{($hotel->home == '0') ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="country">Select Country</label>
                                    <select class="form-control" id="country" name="country_id">
                                        <option value="{{$hotel->country_id}}"
                                                selected>{{$hotel->country->name_en}}</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="city">Select City</label>
                                    <select class="form-control" id="city" name="city_id">
                                        <option value="{{$hotel->city_id}}" selected>{{$hotel->city->name_en}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ru">Name Ru</label>
                                        <input type="text" id="name_ru" class="form-control" name="name_ru"
                                               value="{{$hotel->name_ru}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" id="name_en" class="form-control" name="name_en"
                                               value="{{$hotel->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="hotel" {{($hotel->type == 'hotel') ? 'selected' : ''}}>Hotel
                                        </option>
                                        <option value="hostel" {{($hotel->type == 'hostel') ? 'selected' : ''}}>Hostel
                                        </option>
                                        <option value="resort" {{($hotel->type == 'resort') ? 'selected' : ''}}>Resort
                                        </option>
                                        <option value="villa" {{($hotel->type == 'villa') ? 'selected' : ''}}>Villa
                                        </option>
                                        <option value="motel" {{($hotel->type == 'motel') ? 'selected' : ''}}>Motel
                                        </option>
                                        <option value="bungalow" {{($hotel->type == 'bungalow') ? 'selected' : ''}}>
                                            Bungalow
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="star">Star</label>
                                    <select class="form-control" id="star" name="star">
                                        <option value="1" {{($hotel->star == 1) ? 'selected' : ''}}>☆</option>
                                        <option value="2" {{($hotel->star == 2) ? 'selected' : ''}}>☆☆</option>
                                        <option value="3" {{($hotel->star == 3) ? 'selected' : ''}}>☆☆☆</option>
                                        <option value="4" {{($hotel->star == 4) ? 'selected' : ''}}>☆☆☆☆</option>
                                        <option value="5" {{($hotel->star == 5) ? 'selected' : ''}}>☆☆☆☆☆</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" class="form-control" name="address"
                                               value="{{$hotel->address}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" id="phone" class="form-control" name="phone"
                                               value="{{$hotel->phone}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               value="{{$hotel->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="short_description_ru">Short Description Ru</label>
                                    <textarea id="short_description_ru" rows="5" class="form-control"
                                              name="short_description_ru">{{$hotel->short_description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_description_en">Short Description En</label>
                                    <textarea id="short_description_en" rows="5" class="form-control"
                                              name="short_description_en">{{$hotel->short_description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control editor"
                                              name="description_ru">{{$hotel->description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control editor"
                                              name="description_en">{{$hotel->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="basicInputFile">Cover Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </fieldset>
                                <div class="col-md-6">
                                    <img src="{{asset('uploads/hotels/'.$hotel->image)}}" alt="" width="150">
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="hidden" name="_method" value="PUT">
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
    <script src="{{asset('admin/js/pages/hotel.js')}}"></script>
@endsection