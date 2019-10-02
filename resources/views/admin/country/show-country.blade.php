@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="card">

            <div class="card-content collapse show">
                <div class="card-body">
                    <table class="table table-striped table-bordered sourced-data">
                        <tbody>
                        <tr>
                            <td>Name Ru:</td>
                            <td>{{$country->name_ru}}</td>
                        </tr>
                        <tr>
                            <td>Name En:</td>
                            <td>{{$country->name_en}}</td>
                        </tr>

                        <tr>
                            <td>Description Ru:</td>
                            <td>{{$country->description_ru}}</td>
                        </tr>

                        <tr>
                            <td>Description En:</td>
                            <td>{{$country->description_en}}</td>
                        </tr>
                        <tr>
                            <td>Cover Image:</td>
                            <td><a href="{{asset('uploads/country/'.$country->image)}}" target="_blank"><img
                                        src="{{asset('uploads/country/'.$country->image)}}" alt="" width="100"></a></td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('country.edit',$country->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
