@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('expert.update',$expert->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name"
                                               value="{{$expert->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email"
                                               value="{{$expert->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="skype">Skype</label>
                                    <input type="text" id="skype" class="form-control" name="skype"
                                           value="{{$expert->skype}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" class="form-control" name="phone"
                                           value="{{$expert->phone}}">
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-6">
                                    <label for="basicInputFile">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </fieldset>
                                <div class="col-md-6">
                                    <img src="{{asset('uploads/experts/'.$expert->image)}}" alt="" width="150">
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
