@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <table class="table table-striped table-bordered sourced-data">
                        <tbody>
                        <tr>
                            <td>Description Ru:</td>
                            <td>{!! $about->description_ru !!}</td>
                        </tr>
                        <tr>
                            <td>Description En:</td>
                            <td>{!! $about->description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Cover Image</td>
                            <td>
                                <a href="{{asset('uploads/about/'.$about->image)}}" target="_blank">
                                    <img src="{{asset('uploads/about/'.$about->image)}}" alt="" height="100">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('about.edit',$about->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
