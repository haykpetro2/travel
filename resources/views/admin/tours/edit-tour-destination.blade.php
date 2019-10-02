@extends('admin.layouts.header-footer')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('tour-destination.update',$tourDestination->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-2">
                                    <label for="day">Day</label>
                                    <input type="number" class="form-control" id="day" name="day"
                                           value="{{$tourDestination->day}}">
                                </div>
                                <div class="form-group col-sm-12 col-md-5">
                                    <label for="title_ru">Title Ru</label>
                                    <input type="text" class="form-control" id="title_ru" name="title_ru"
                                           value="{{$tourDestination->title_ru}}">
                                </div>
                                <div class="form-group col-sm-12 col-md-5">
                                    <label for="title_en">Title En</label>
                                    <input type="text" class="form-control" id="title_en" name="title_en"
                                           value="{{$tourDestination->title_en}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control"
                                              name="description_ru">{{$tourDestination->description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control"
                                              name="description_en">{{$tourDestination->description_en}}</textarea>
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
                                <div class="form-group col-md-4">
                                    <a href="{{asset('uploads/tours/destinations/'.$tourDestination->image)}}"
                                       target="_blank">
                                        <img src="{{asset('uploads/tours/destinations/'.$tourDestination->image)}}"
                                             alt="" height="80">
                                    </a>
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

