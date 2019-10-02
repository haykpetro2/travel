@extends('admin.layouts.header-footer')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('hotel-room.update',$hotelRoom->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="{{$hotelRoom->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="count">Person Count</label>
                                    <input type="number" id="count" class="form-control" name="count"
                                           value="{{$hotelRoom->count}}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <fieldset class="form-group col-md-4">
                                    <label for="photos">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photos" name="photos[]"
                                               multiple>
                                        <label class="custom-file-label" for="photos">Choose files</label>
                                    </div>
                                </fieldset>
                                @foreach($hotelRoom->photos as $photo)
                                    <figure class="effect-zoe" id="photo-{{$photo->id}}">
                                        <img src="{{asset('uploads/hotels/photos/'.$photo->name)}}" alt="img25"
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

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label for="setting">Old Seasons</label>
                                    @foreach($hotelRoom->settings as $setting)
                                        <p>{{$setting->season->name.' : '.$setting->price}}</p>
                                    @endforeach
                                </div>
                            </div>


                            <div class="repeater-default">
                                <div data-repeater-list="settings">
                                    <div data-repeater-item>
                                        <div class="row mb-1 ">
                                            <div class="form-group col-sm-12 col-md-4">
                                                <label for="setting">Seasons</label>
                                                <select class="form-control" id="setting" name="season_id">
                                                    <option value="">-</option>
                                                    @foreach($hotelRoom->hotel->seasons as $season)
                                                        <option
                                                                value="{{$season->id}}">{{$season->name}}</option>
                                                    @endforeach
                                                </select>
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
    <script src="{{asset('admin/vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/form-repeater.js')}}"></script>
@endsection
