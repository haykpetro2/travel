@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/tables/datatable/datatables.min.css')}}">
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('about.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Description Ru</th>
                            <th>Description En</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($abouts as $about)
                            <tr>
                                <td>{!! $about->description_ru !!}</td>
                                <td>{!! $about->description_en !!}</td>
                                <td>
                                    <a href="{{asset('uploads/about/'.$about->image)}}" target="_blank">
                                        <img src="{{asset('uploads/about/'.$about->image)}}" alt="" height="80">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('about.show',$about->id)}}"><i class="ft-eye"></i></a>
                                    <a href="{{route('about.edit',$about->id)}}"><i class="ft-edit"></i></a>
                                    <i class="ft-trash about-delete" data-id="{{$about->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('admin/js/pages/about.js')}}"></script>
@endsection

