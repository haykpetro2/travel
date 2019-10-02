@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-2">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <h4 class="color-white">@lang('translate.hotel_found')
                    <span>{{$hotels->count()}}</span> @lang('translate.hotel')</h4>
                <h2 class="color-white">@lang('translate.hotels')</h2>
            </div>
        </div>
    </div>
    <div class="list-wrapper bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="sidebar style-2 clearfix">
                        <div class="sidebar-block">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.hotel_search')</h4>
                            <div class="search-inputs">
                                <div class="form-block clearfix">
                                    <div class="input-style-1 b-50 color-4">
                                        <img src="{{asset('img/loc_icon_small_grey.png')}}" alt="">
                                        <input type="text" placeholder="@lang('translate.your_hotel')">
                                    </div>
                                </div>
                                <div class="form-block clearfix">
                                    <div class="input-style-1 b-50 color-4">
                                        <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                        <input type="text" placeholder="@lang('translate.your_checkin')"
                                               class="datepicker">
                                    </div>
                                </div>
                                <div class="form-block clearfix">
                                    <div class="input-style-1 b-50 color-4">
                                        <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                        <input type="text" placeholder="@lang('translate.your_checkout')"
                                               class="datepicker">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="c-button b-40 bg-aqua"
                                   value="@lang('translate.hotel_search_button')">
                        </div>
                        <div class="sidebar-block padd-0">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.hotel_category')</h4>
                            <div class="search-inputs">
                                <div class="form-block clearfix">
                                    <div class="input-style-1 b-50 color-4 padd-20-0">
                                        <div class="drop-wrap">
                                            <div class="drop text-dark">
                                                <b class="font-18">-</b>
                                                <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                                <span>
															<a href="#">Armenia</a>
															<a href="#">Artsakh</a>
														</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="sidebar-block">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.hotel_rating')</h4>
                            <div class="sidebar-rating">
                                <div class="input-entry color-3">
                                    <input class="checkbox-form" id="star-5" type="checkbox" name="checkbox"
                                           value="climat control">
                                    <label class="clearfix" for="star-5">
                                        <span class="sp-check"><i class="fa fa-check"></i></span>
                                        <span class="rate">
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
										</span>
                                    </label>
                                </div>
                                <div class="input-entry color-3">
                                    <input class="checkbox-form" id="star-4" type="checkbox" name="checkbox"
                                           value="climat control">
                                    <label class="clearfix" for="star-4">
                                        <span class="sp-check"><i class="fa fa-check"></i></span>
                                        <span class="rate">
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
										</span>
                                    </label>
                                </div>
                                <div class="input-entry color-3">
                                    <input class="checkbox-form" id="star-3" type="checkbox" name="checkbox"
                                           value="climat control">
                                    <label class="clearfix" for="star-3">
                                        <span class="sp-check"><i class="fa fa-check"></i></span>
                                        <span class="rate">
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
										</span>
                                    </label>
                                </div>
                                <div class="input-entry color-3">
                                    <input class="checkbox-form" id="star-2" type="checkbox" name="checkbox"
                                           value="climat control">
                                    <label class="clearfix" for="star-2">
                                        <span class="sp-check"><i class="fa fa-check"></i></span>
                                        <span class="rate">
											<span class="fa fa-star color-yellow"></span>
											<span class="fa fa-star color-yellow"></span>
										</span>
                                    </label>
                                </div>
                                <div class="input-entry color-3">
                                    <input class="checkbox-form" id="star-1" type="checkbox" name="checkbox"
                                           value="climat control">
                                    <label class="clearfix" for="star-1">
                                        <span class="sp-check"><i class="fa fa-check"></i></span>
                                        <span class="rate">
											<span class="fa fa-star color-yellow"></span>
										</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="list-content clearfix">
                        @foreach($hotels as $hotel)
                            <div class="list-item-entry">
                                <div class="hotel-item style-9 bg-white">
                                    <div class="table-view">
                                        <div class="radius-top cell-view">
                                            @isset($hotel->rooms->sale)
                                                <span class="button-s-2 bg-orange fl excursion_sale">
                                                @lang('translate.apartment_sale')20%
                                            </span>
                                            @endisset
                                            <img src="{{asset('uploads/hotels/'.$hotel->image)}}" alt="">
                                        </div>
                                        <div class="title hotel-middle cell-view">
                                            <div class="tour-info-line clearfix">
                                                <div class="tour-info fl hotel-info">
                                                    <img src="{{asset('img/loc_icon_small_grey.png')}}" alt="">
                                                    <span class="font-style-2 color-grey-3">{{$hotel->address}}</span>
                                                </div>
                                            </div>
                                            <h4><b>{{$hotel['name_'.$lang]}}</b></h4>
                                            <p class="f-14 color-grey-3">{{$hotel['short_description_'.$lang]}}</p>
                                            <div class="buttons-block bg-dr-blue-2">
                                                <a href="{{route('hotel.detail',$hotel->id)}}"
                                                   class="c-button b-40 bg-white hv-transparent fr">@lang('translate.hotel_details')</a>
                                            </div>
                                        </div>
                                        <div class="title hotel-right clearfix cell-view grid-hidden">
                                            <div class="rate-wrap">
                                                <div class="rate">
                                                    @for($i = 0;$i<$hotel->star;$i++)
                                                        <span class="fa fa-star color-yellow"></span>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="hotel-person color-dark-2">@lang('translate.hotel_from') <span
                                                        class="color-orange">$755</span> @lang('translate.hotel_night')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="c_pagination clearfix padd-120">
                        {{$hotels->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
