@extends('admin.layouts.header-footer')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('excursion.update',$excursion->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ru">Name Ru</label>
                                        <input type="text" id="name_ru" class="form-control" name="name_ru"
                                               value="{{$excursion->name_ru}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">Name En</label>
                                        <input type="text" id="name_en" class="form-control" name="name_en"
                                               value="{{$excursion->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="km">Mileage ( km. )</label>
                                        <input type="number" id="km" class="form-control" name="km"
                                               value="{{$excursion->km}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="time">Duration ( time )</label>
                                        <input type="number" id="time" class="form-control" name="time"
                                               value="{{$excursion->time}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" id="price" class="form-control" name="price"
                                               value="{{$excursion->price}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="other_price">Other Price</label>
                                        <input type="number" id="other_price" class="form-control" name="other_price"
                                               value="{{$excursion->other_price}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="sale">Sale</label>
                                        <input type="number" id="sale" class="form-control" name="sale"
                                               value="{{$excursion->sale}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="ticket">Ticket</label>
                                        <input type="number" id="ticket" class="form-control" name="ticket"
                                               value="{{$excursion->ticket}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="percent">My Percent</label>
                                        <input type="number" id="percent" class="form-control" name="percent"
                                               value="{{$excursion->percent}}">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="addition">Addition per person</label>
                                        <input type="number" id="addition" class="form-control" name="addition"
                                               value="{{$excursion->addition}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="guide">Guide</label>
                                        <input type="number" id="guide" class="form-control" name="guide"
                                               value="{{$excursion->guide}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="lunch">Lunch</label>
                                        <input type="number" id="lunch" class="form-control" name="lunch"
                                               value="{{$excursion->lunch}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control editor"
                                              name="description_ru">{{$excursion->description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control editor"
                                              name="description_en">{{$excursion->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="basicInputFile">Cover Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                               name="image" multiple>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </fieldset>
                                <div class="form-group col-md-6">
                                    <a href="{{asset('uploads/excursions/'.$excursion->image)}}" target="_blank">
                                        <img src="{{asset('uploads/excursions/'.$excursion->image)}}" alt=""
                                             height="80">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="basicInputFile">Images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photos"
                                               name="photos[]" multiple>
                                        <label class="custom-file-label" for="photos">Choose files</label>
                                    </div>
                                </fieldset>
                                @foreach($excursion->photos as $photo)
                                    <figure class="effect-zoe" id="photo-{{$photo->id}}">
                                        <img src="{{asset('uploads/excursions/photos/'.$photo->name)}}" alt="img25"
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
    <script src="{{asset('admin/js/pages/excursion.js')}}"></script>
@endsection
