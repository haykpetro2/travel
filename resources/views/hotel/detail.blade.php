@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-4">
        <img class="center-image" src="{{asset('uploads/hotels/'.$hotel->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">{{$hotel['name_'.$lang]}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="detail-content color-1">
                        {{--<img src="{{asset('uploads/hotels/'.$hotel->image)}}" class="res-img" alt="">--}}
                        <div class="gallery-detail">

                            <div class="top-baner arrows">
                                <div class="swiper-container" data-autoplay="1" data-loop="1" data-speed="5000"
                                     data-center="0" data-slides-per-view="1" id="tour-slide-2">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="img-responsive" src="{{asset('uploads/hotels/'.$hotel->image)}}"
                                                 alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" src="{{asset('uploads/hotels/'.$hotel->image)}}"
                                                 alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" src="{{asset('uploads/hotels/'.$hotel->image)}}"
                                                 alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img class="img-responsive" src="{{asset('uploads/hotels/'.$hotel->image)}}"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="pagination pagination-hidden poin-style-1"></div>
                                </div>
                                <div class="arrow-wrapp arr-s-1">
                                    <div class="cont-1170">
                                        <div class="swiper-arrow-left sw-arrow"><span class="fa fa-angle-left"></span>
                                        </div>
                                        <div class="swiper-arrow-right sw-arrow"><span class="fa fa-angle-right"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="detail-content-block">
                            <h2 class="detail-title color-dark-2 mb-0">{{$hotel['name_'.$lang]}}</h2>
                            <div class="detail-rate rate-wrap clearfix">
                                <div class="rate">
                                    @for($i = 0;$i<$hotel->star;$i++)
                                        <span class="fa fa-star color-yellow"></span>
                                    @endfor
                                </div>
                            </div>
                            <p>{{$hotel['description_'.$lang]}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="right-sidebar">
                        <div class="detail-block bg-orange">
                            <h4 class="color-dark-2">{{$hotel['name_'.$lang]}}</h4>
                            <div class="details-desc ">
                                <p class="color-dark-2">@lang('translate.hotel_category'): <span
                                        class="color-dark-2">{{$hotel->type}}</span>
                                </p>
                                <p class="color-dark-2">@lang('translate.hotel_location'): <span class="color-dark-2">{{$hotel->country['name_'.$lang]}} / {{$hotel->city['name_'.$lang]}}</span>
                                </p>
                                <p class="color-dark-2">@lang('translate.hotel_address'): <span
                                        class="color-dark-2">{{$hotel->address}}</span>
                                </p>
                                <p class="color-dark-2">@lang('translate.hotel_phone'): <span
                                        class="color-dark-2">{{$hotel->phone}}</span>
                                </p>
                                <p class="color-dark-2">@lang('translate.hotel_email'): <span
                                        class="color-dark-2 mail-detail">{{$hotel->email}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="popular-tours bg-grey-2">
                            <h4 class="color-dark-2">@lang('translate.other_hotels')</h4>
                            @foreach($popular_hotels as $popular_hotel)
                                <div class="hotel-small style-2 clearfix">
                                    <a class="hotel-img black-hover" href="{{route('hotel.detail', $popular_hotel->id)}}" target="_blank">
                                        <img class="img-responsive radius-3" src="{{asset('uploads/hotels/'.$popular_hotel->image)}}"
                                             alt="">
                                        <div class="tour-layer delay-1"></div>
                                    </a>
                                    <div class="hotel-desc">
                                        <h5><span class="color-dark-2">@lang('translate.tour_from') <strong>{!! currency($popular_hotel->price) !!}</strong></span></h5>
                                        <h4>{{$popular_hotel['name_'.$lang]}}</h4>
                                        <div class="hotel-loc">{{$popular_hotel['short_description_'.$lang]}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-preview row no-margin padd-50-0">
                @foreach ($hotel->rooms as $room)
                    @foreach($room->photos as $photo)
                        <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                            <div class="tp_entry style-2">
                                <div class="tp_image">
                                    <img class="img-full h_100" src="{{asset('uploads/hotels/photos/'.$photo->name)}}"
                                         alt="">
                                </div>
                                <div class="tp_content">

                                    <h4><b>{{$room->name}}</b></h4>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
            <div class="row padd-100">
                <div class="table-responsive col-md-12 hotel-bootstrap">
                    <table class="table style-1 striped">
                        <thead>
                        <tr>
                            <th>@lang('translate.hotel_room_season')</th>

                            @foreach($hotel->seasons->sortBy('start_date') as $season)
                                <th>
                                    {{\Carbon\Carbon::parse($season->start_date)->format('d.m')}}
                                    - {{\Carbon\Carbon::parse($season->end_date)->format('d.m')}}
                                </th>
                            @endforeach

                            <th>@lang('translate.hotel_select')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($hotel->rooms as $room)
                            <tr>
                                <td class="table-label">
                                    {{$room->name}}
                                </td>
                                @foreach($hotel->seasons->sortBy('start_date') as $season)
                                    @php($room_price = isset($room->settings->where('season_id',$season->id)->first()->price) ? $room->settings->where('season_id',$season->id)->first()->price : 0 )
                                    @if($room_price)
                                        <td class="table-label"><strong>{{$room_price}} </strong></td>
                                    @else
                                        <td class="table-label"><strong>-</strong></td>
                                    @endif
                                @endforeach
                                <td><a href="{{route('hotel.form',$room->id)}}"
                                       class="button-s-2 bg-1">@lang('translate.hotel_select')</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
