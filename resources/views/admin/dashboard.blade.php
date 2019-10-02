@extends('admin.layouts.header-footer')
@section('content')

    @inject('tour','App\Models\TourOrder')
    @inject('hotel','App\Models\HotelOrder')
    @inject('transport','App\Models\TransportOrder')
    @inject('apartment','App\Models\ApartmentOrder')
    @inject('excursion','App\Models\ExcursionOrder')

    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-info bg-darken-2">
                                <i class="fa fa-plane font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-info white media-body">
                                <h5><a href="javascript:void(0);" class="text-white orders"
                                       data-name="{{($tour->count() > 0 ) ? 'tour' : ''}}">Tour</a></h5>
                                <h5 class="text-bold-400 mb-0">{{$tour->count()}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-danger bg-darken-2">
                                <i class="fas fa-building font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-danger white media-body">
                                <h5><a href="javascript:void(0);" class="text-white orders"
                                       data-name="{{($hotel->count() > 0 ) ? 'hotel' : ''}}">Hotel</a></h5>
                                <h5 class="text-bold-400 mb-0">{{$hotel->count()}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-warning bg-darken-2">
                                <i class="fas fa-car font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-warning white media-body">
                                <h5><a href="javascript:void(0);" class="text-white orders"
                                       data-name="{{($transport->count() > 0 ) ? 'transport' : ''}}">Transport</a>
                                </h5>
                                <h5 class="text-bold-400 mb-0">{{$transport->count()}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-success bg-darken-2">
                                <i class="fa fa-home font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-success white media-body">
                                <h5><a href="javascript:void(0);" class="text-white orders"
                                       data-name="{{($apartment->count() > 0 ) ? 'apartment' : ''}}">Apartment</a></h5>
                                <h5 class="text-bold-400 mb-0">{{$apartment->count()}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="media align-items-stretch">
                            <div class="p-2 text-center bg-primary bg-darken-2">
                                <i class="fa fa-ship font-large-2 white"></i>
                            </div>
                            <div class="p-2 bg-gradient-x-primary white media-body">
                                <h5><a href="javascript:void(0);" class="text-white orders"
                                       data-name="{{($excursion->count() > 0 ) ? 'excursion' : ''}}">Excursion</a></h5>
                                <h5 class="text-bold-400 mb-0"></i>{{$excursion->count()}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row match-height" style="visibility: hidden">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recent Orders</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        </div>
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/dashboard.js')}}"></script>
@endsection



