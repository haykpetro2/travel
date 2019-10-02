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
                            <td>{!! $condition->description_ru !!}</td>
                        </tr>
                        <tr>
                            <td>Description En:</td>
                            <td>{!! $condition->description_en !!}</td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('condition.edit',$condition->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
