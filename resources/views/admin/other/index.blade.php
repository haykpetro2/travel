@extends('admin.layouts.header-footer')
@section('content')
    @include('admin.modals.background-modal')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-iconfall">
                        <li class="nav-item">
                            <a class="nav-link active show" id="homeIcon3-tab1" data-toggle="tab" href="#homeIcon31"
                               aria-controls="homeIcon31" role="tab" aria-selected="true"><i
                                        class="fa fa-money"></i> Currency</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon3-tab1" data-toggle="tab" href="#profileIcon31"
                               aria-controls="profileIcon31" role="tab" aria-selected="false"><i class="fa fa-book"></i>
                                Conditions</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i class="fa fa-users"></i>
                                Subscribers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#background31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-file-image-o"></i>
                                Backgrounds</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Amd</th>
                                    <th>Rub</th>
                                    <th>Usd</th>
                                    <th>Euro</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @if(isset($currency))
                                        <th><input type="number" class="form-control" id="amd"
                                                   value="{{$currency->amd}}"></th>
                                        <th><input type="number" class="form-control" id="rub"
                                                   value="{{$currency->rub}}"></th>
                                        <th><input type="number" class="form-control" id="usd"
                                                   value="{{$currency->usd}}"></th>
                                        <th><input type="number" class="form-control" id="euro"
                                                   value="{{$currency->euro}}"></th>
                                    @else
                                        <th><input type="number" class="form-control" id="amd" value="">
                                        </th>
                                        <th><input type="number" class="form-control" id="rub" value="">
                                        </th>
                                        <th><input type="number" class="form-control" id="usd" value="">
                                        </th>
                                        <th><input type="number" class="form-control" id="euro" value="">
                                        </th>
                                    @endif

                                    <th>
                                        <i class="ft-edit currency-update"></i>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">
                            <a href="{{route('condition.create')}}" class="btn btn-dark mb-2">New</a>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Description Ru</th>
                                    <th>Description En</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($conditions as $condition)
                                    <tr>
                                        <td>{!! $condition->description_ru !!}</td>
                                        <td>{!! $condition->description_en !!}</td>
                                        <td>
                                            <a href="{{route('condition.show',$condition->id)}}"><i class="ft-eye"></i></a>
                                            <a href="{{route('condition.edit',$condition->id)}}"><i class="ft-edit"></i></a>
                                            <i class="ft-trash condition-delete" data-id="{{$condition->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subscribers as $subscribe)
                                    <tr>
                                        <th>{{$subscribe->email}}</th>
                                        <th><i class="fa fa-send"></i></th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="background31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <i data-toggle="modal" data-target="#background-modal" class="btn btn-dark mb-2">New</i>

                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Page Name</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($you_tube)
                                    <tr>
                                        <td><strong>Home Video</strong></td>
                                        <td><a href="{{$you_tube->link}}" target="_blank">{{$you_tube->link}}</a></td>
                                        <td>Only New</td>
                                    </tr>
                                @endisset
                                @foreach($backgrounds as $background)
                                    <tr>
                                        <td>
                                            <strong style="text-transform: capitalize">{{$background->page}}</strong>
                                        </td>
                                        <td>
                                            <a href="{{asset('uploads/backgrounds/'.$background->image)}}"
                                               target="_blank">
                                                <img src="{{asset('uploads/backgrounds/'.$background->image)}}"
                                                     alt=""
                                                     height="80">
                                            </a>
                                        </td>
                                        <td>
                                            <i class="ft-trash background-delete" data-id="{{$background->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/other.js')}}"></script>
@endsection
