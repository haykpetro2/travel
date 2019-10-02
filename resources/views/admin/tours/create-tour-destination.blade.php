@extends('admin.layouts.header-footer')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('tour-destination.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="repeater-default">
                                <div data-repeater-list="destinations">
                                    <div data-repeater-item>
                                        <div class="row mb-1 ">
                                            <div class="form-group col-sm-12 col-md-2">
                                                <label for="day">Day</label>
                                                <input type="number" class="form-control" id="day" name="day">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="title_ru">Title Ru</label>
                                                <input type="text" class="form-control" id="title_ru" name="title_ru">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="title_en">Title En</label>
                                                <input type="text" class="form-control" id="title_en" name="title_en">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-2 text-center mt-1 pt-1">
                                                <button type="button" class="btn btn-danger"
                                                        data-repeater-delete><i
                                                            class="ft-x"></i> Delete
                                                </button>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="description_ru">Description Ru</label>
                                                <textarea id="description_ru" rows="5" class="form-control"
                                                          name="description_ru"></textarea>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="description_en">Description En</label>
                                                <textarea id="description_en" rows="5" class="form-control"
                                                          name="description_en"></textarea>
                                            </div>
                                            <fieldset class="form-group col-md-4">
                                                <label for="basicInputFile">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                           name="image">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                </div>
                                            </fieldset>
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
                                <input type="hidden" name="tour_id" value="{{$id}}">
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
    <script src="{{asset('admin/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/form-repeater.js')}}"></script>
@endsection
