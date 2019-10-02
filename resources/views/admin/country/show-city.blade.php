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
                            <td>{{$city->name_ru}}</td>
                        </tr>
                        <tr>
                            <td>Name En:</td>
                            <td>{{$city->name_en}}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>{{$city->country->name_ru}}</td>
                        </tr>
                        <tr>
                            <td>Capital</td>
                            <td>
                                @if($city->capital)
                                    Capital
                                @else
                                    No Capital
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Description Ru:</td>
                            <td>{{$city->description_ru}}</td>
                        </tr>

                        <tr>
                            <td>Description En:</td>
                            <td>{{$city->description_en}}</td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('city.edit',$city->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <div class="row">
                        @foreach($city->photos as $photo)
                            <figure class="col-lg-3 col-md-6 col-12">
                                <a href="{{asset('uploads/city/'.$photo->name)}}" itemprop="contentUrl"
                                   data-size="480x360" target="_blank">
                                    <img class="img-thumbnail img-fluid" src="{{asset('uploads/city/'.$photo->name)}}"
                                         title="{{$city->name_ru}}">
                                </a>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
