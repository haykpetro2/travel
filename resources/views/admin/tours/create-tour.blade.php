@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('tour.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Home Page</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="home" class="custom-control-input" id="yes"
                                                   value="1">
                                            <label class="custom-control-label" for="yes">Yes</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="home" class="custom-control-input" id="no"
                                                   value="0">
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Type</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="type" class="custom-control-input" id="groups"
                                                   value="1">
                                            <label class="custom-control-label" for="groups">Groups</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="type" class="custom-control-input" id="individual"
                                                   value="0">
                                            <label class="custom-control-label" for="individual">Individual</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Select Country</label>
                                    <select class="form-control" id="country" name="country_id">
                                        <option value="">-</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ru">Name Ru</label>
                                        <input type="text" id="name_ru" class="form-control" name="name_ru">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" id="name_en" class="form-control" name="name_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="expert">Expert</label>
                                    <select class="form-control" id="expert" name="expert_id">
                                        <option value="">-</option>
                                        @foreach($experts as $expert)
                                            <option value="{{$expert->id}}">{{$expert->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tour_type_id">Select Tour Type</label>
                                    <select class="form-control select2" id="tour_type_id" name="tour_type_id">
                                        <option value="">-</option>
                                        @foreach($tour_types as $tour_type)
                                            <option value="{{$tour_type->id}}">{{$tour_type->name_en}}</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sale">Sale</label>
                                        <input type="number" id="sale" class="form-control" name="sale">
                                    </div>
                                </div>

                            </div>
                            <div class="repeater-default">
                                <div data-repeater-list="checks">
                                    <div data-repeater-item>
                                        <div class="row mb-1 ">
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="check_in">Check in</label>
                                                <input type="date" id="check_in" class="form-control"
                                                       name="check_in">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="check_out">Check out</label>
                                                <input type="date" id="check_out" class="form-control"
                                                       name="check_out">
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
                                            <i class="icon-plus4"></i> Add Date
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="short_description_ru">Short Description Ru</label>
                                    <textarea id="short_description_ru" rows="5" class="form-control"
                                              name="short_description_ru"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_description_en">Short Description En</label>
                                    <textarea id="short_description_en" rows="5" class="form-control"
                                              name="short_description_en"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control editor"
                                              name="description_ru"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control editor"
                                              name="description_en"></textarea>
                                </div>
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
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="{{asset('admin/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/form-repeater.js')}}"></script>
@endsection
