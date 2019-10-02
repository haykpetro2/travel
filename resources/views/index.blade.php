@extends('layouts.header-footer')
@section('css')
    <link rel="stylesheet" href="{{asset('css/jquery.mb.YTPlayer.min.css')}}">
@endsection
@section('content')
    <div class="full-height oh">
        <div class="video-wrapper player" id="bgndVideo"
             data-property="{videoURL:'{{$you_tube->link}}',containment:'.full-height', showControls:false, autoPlay:true,stopMovieOnBlur: false, loop:true, mute:true, startAt:0,ratio:16/9, opacity:1, addRaster:true, quality:'hd720', optimizeDisplay:true}">
        </div>
        <div class="baner-tabs">
            <div class="text-center">
                <div class="drop-tabs">
                    <b>@lang('translate.tab_tours')</b>
                    <a href="#" class="arrow-down"><i class="fa fa-angle-down"></i></a>
                    <ul class="nav-tabs tpl-tabs tabs-style-1">
                        <li class="active click-tabs"><a href="#one" data-toggle="tab"
                                                         aria-expanded="false">@lang('translate.tab_tours')</a>
                        </li>
                        <li class="click-tabs"><a href="#two" data-toggle="tab"
                                                  aria-expanded="false">@lang('translate.tab_hotels')</a></li>
                        <li class="click-tabs"><a href="#three" data-toggle="tab"
                                                  aria-expanded="false">@lang('translate.tab_cars')</a></li>
                        <li class="click-tabs"><a href="#four" data-toggle="tab"
                                                  aria-expanded="false">@lang('translate.tab_apartments')</a>
                        </li>
                        <li class="click-tabs"><a href="#five" data-toggle="tab"
                                                  aria-expanded="false">@lang('translate.tab_excursion')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content tpl-tabs-cont section-text t-con-style-1">
                <div class="tab-pane active in" id="one">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-offset-1 col-md-4 col-sm-4 col-xs-12">
                                <div class="tabs-block">
                                    <div class="form-block type-2 clearfix">
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">

                                            <input type="radio" id="cash" class="change-total" name="payment"
                                                   value="cash">
                                            <label for="cash">@lang('translate.label_individual')</label>

                                            <input type="radio" id="card" class="change-total" name="payment"
                                                   value="card" checked>
                                            <label for="card">@lang('translate.label_group')</label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_country')</h5>
                                    <div class="drop-wrap">
                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
															<a href="#">Armenia</a>
															<a href="#">Artsakh</a>
														</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_type')</h5>
                                    <div class="drop-wrap">
                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
															<a href="#">Tracking</a>
															<a href="#">Hecaniv</a>
														</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                <a href="#" class="c-button b-60 bg-aqua hv-transparent"><i
                                        class="fa fa-search"></i><span>@lang('translate.tab_search')</span></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="two">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-md-offset-1 col-md-2 col-sm-2 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_country')</h5>
                                    <div class="drop-wrap">
                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
															<a href="#">Armenia</a>
															<a href="#">Artsakh</a>

														</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_city')</h5>
                                    <div class="drop-wrap">
                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
															<a href="#">Yerevan</a>
															<a href="#">Gyumri</a>

														</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                <a href="#" class="c-button b-60 bg-aqua hv-transparent"><i
                                        class="fa fa-search"></i><span>@lang('translate.tab_search')</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="three">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-offset-1 col-md-3 col-sm-6 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_type')</h5>
                                    <div class="drop-wrap">

                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
												<a href="#">Sedan</a>
												<a href="#">Jeep</a>
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_mark')</h5>
                                    <div class="drop-wrap">

                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
												<a href="#">BMW</a>
												<a href="#">Audi</a>
												<a href="#">Mercedes</a>
											</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_choose_model')</h5>
                                    <div class="drop-wrap">

                                        <div class="drop">
                                            <b>-</b>
                                            <a href="#" class="drop-list"><i class="fa fa-angle-down"></i></a>
                                            <span>
												<a href="#">E 320</a>
												<a href="#">C 220</a>
												<a href="#">S 500</a>
											</span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                <a href="#" class="c-button b-60 bg-aqua hv-transparent"><i
                                        class="fa fa-search"></i><span>@lang('translate.tab_search')</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="four">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-4 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_search')</h5>
                                    <div class="input-style">
                                        <img src="{{asset('img/loc_icon_small.png')}}" alt="">
                                        <input type="text" placeholder="@lang('translate.your_search')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                <a href="#" class="c-button b-60 bg-aqua hv-transparent"><i
                                        class="fa fa-search"></i><span>@lang('translate.tab_search')</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="five">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-4 col-xs-12">
                                <div class="tabs-block">
                                    <h5>@lang('translate.label_find_excursion')</h5>
                                    <div class="input-style">
                                        <img src="{{asset('img/loc_icon_small.png')}}" alt="">
                                        <input type="text" placeholder="@lang('translate.your_search')">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                <a href="#" class="c-button b-60 bg-aqua hv-transparent"><i
                                        class="fa fa-search"></i><span>@lang('translate.tab_search')</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="main-wraper padd-110">
        <div class="container clearfix contry-wrapp">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="second-title style-3">
                        <h2 class="subtitle color-dark-2-light">@lang('translate.about')</h2>
                        <p class="color-dark-2">{{$about['description_'.$lang]}}</p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-mob-12 col-xs-6 col-sm-4 col-md-4">
                            <a class="contry-item" href="{{route('about',1)}}">
                                <img class="img-responsive" src="{{asset('img/maps/armenia.png')}}" alt="">
                                <h5>Armenia</h5>
                            </a>
                        </div>
                        <div class="col-mob-12 col-xs-6 col-sm-4 col-md-4">
                            <a class="contry-item">
                                <img class="img-responsive" src="{{asset('img/maps/georgia.png')}}" alt="">
                                <h5>Georgia</h5>
                            </a>
                        </div>
                        <div class="col-mob-12 col-xs-6 col-sm-4 col-md-4">
                            <div class="contry-item">
                                <img class="img-responsive" src="{{asset('img/maps/artsakh.png')}}" alt="">
                                <h5>Karabax</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wraper padd-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="second-title">
                        <h2>@lang('translate.tour_title')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tours as $tour)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="radius-mask tour-block hover-aqua">
                            <div class="clip">
                                <div class="bg bg-bg-chrome act"
                                     style="background-image:url({{asset('uploads/tours/'.$tour->image)}})">
                                </div>
                            </div>
                            <div class="tour-layer delay-1"></div>
                            <div class="tour-caption">
                                <div class="vertical-align">
                                    <h3 class="hover-it yell-shadow">{{$tour['name_'.$lang]}}</h3>

                                    <h4 class="yell-shadow"><b>{!! currency($tour->price) !!}</b></h4>
                                </div>
                                <div class="vertical-bottom">
                                    <div class="fl yell-shadow">
                                        <div class="tour-info">
                                            {{--<img src="{{asset('img/people_icon.png')}}" alt="">--}}
                                            <span class="font-style-2 color-grey-4"><strong
                                                    class="color-white">@lang('translate.tour_country'): </strong>{{$tour->country['name_'.$lang]}}</span>
                                        </div>
                                        <div class="tour-info">
                                            {{--<img src="{{asset('img/calendar_icon.png')}}" alt="">--}}
                                            <span class="font-style-2 color-grey-4"><strong
                                                    class="color-white">@lang('translate.tour_types'): </strong> {{$tour->tour_type['name_'.$lang]}}</span>
                                        </div>
                                    </div>
                                    <a href="#" class="c-button b-50 bg-aqua hv-transparent fr"><img
                                            src="{{asset('img/flag_icon.png')}}"
                                            alt=""><span>@lang('translate.more')</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="main-wraper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="second-title">
                        <h2>@lang('translate.hotel_title')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="top-baner arrows">
                    <div class="swiper-container offers-slider" data-autoplay="3000" data-loop="3" data-speed="500"
                         data-slides-per-view="responsive" data-mob-slides="1" data-xs-slides="2" data-sm-slides="2"
                         data-md-slides="3" data-lg-slides="3" data-add-slides="3">
                        <div class="swiper-wrapper">
                            @foreach($hotels as $hotel)
                                <div class="swiper-slide" data-val="{{$loop->iteration}}">
                                    <div class="offers-block radius-mask">
                                        <div class="clip">
                                            <div class="bg bg-bg-chrome act"
                                                 style="background-image:url({{asset('uploads/hotels/'.$hotel->image)}})">
                                            </div>
                                        </div>
                                        <div class="tour-layer delay-1"></div>
                                        <div class="vertical-top">
                                            <div class="rate">
                                                @for($i=0;$i<$hotel->star;$i++)
                                                    <span class="fa fa-star color-yellow"></span>
                                                @endfor
                                            </div>
                                            <h3>{{$hotel['name_'.$lang]}}</h3>
                                        </div>
                                        <div class="vertical-bottom">

                                            <p>{{$hotel['short_description_'.$lang]}}</p>
                                            <a href="{{route('hotel.detail',$hotel->id)}}"
                                               class="c-button bg-aqua hv-aqua-o b-40"><span>@lang('translate.more')</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination  poin-style-1 pagination-hidden"></div>
                    </div>
                    <div class="swiper-arrow-left offers-arrow"><span class="fa fa-angle-left"></span></div>
                    <div class="swiper-arrow-right offers-arrow"><span class="fa fa-angle-right"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wraper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="second-title">
                        <h2>@lang('translate.apartment_title')</h2>
                    </div>
                </div>
            </div>
            <div class="row col-no-padd h-300">
                @foreach($apartments as $apartment )
                    <div class="col-md-4 col-sm-6 col-xs-12 h_100">
                        <div class="photo-block hover-aqua h_100">
                            <div class="tour-layer delay-1"></div>
                            <img src="{{asset('uploads/apartments/'.$apartment->image)}}" alt="" class="h_100">
                            <div class="vertical-align">
                                <div class="photo-title">
                                    <h4 class="delay-1"><b>Only <span class="color-aqua">$235</span></b></h4>
                                    <a class="hover-it" href="#"><h3>{{$apartment['name_'.$lang]}}</h3></a>
                                    <h5 class="delay-1">Orlando, Air/3 Nights</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <div class="main-wraper padd-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="second-title">

                        <h2>@lang('translate.our_partners')</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-container" data-autoplay="0" data-loop="infinite" data-speed="1000" data-center="0"
             data-slides-per-view="responsive" data-mob-slides="1" data-xs-slides="2" data-sm-slides="3"
             data-md-slides="4" data-lg-slides="3" data-add-slides="3">
            <div class="swiper-wrapper">
                <div class="swiper-slide text-center">
                    <div class="partner-entry">
                        <a href="#"><img class="img-responsive" src="{{asset('img/home_7/partner_1.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="pagination pagination-hidden"></div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('js/jquery.mb.YTPlayer.js')}}"></script>
    <script>
        jQuery(function () {
            jQuery("#bgndVideo").YTPlayer();
        });
    </script>
@endsection
