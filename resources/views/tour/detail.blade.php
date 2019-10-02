@extends('layouts.header-footer')
@section('content')
    <!-- INNER-BANNER -->
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/tours/'.$tour->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.tour_details')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DETAIL WRAPPER -->
    <div class="detail-wrapper">
        <div class="container">
            <div class="detail-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <h2 class="detail-title color-dark-2">{{$tour['name_'.$lang]}}</h2>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="detail-price color-dark-2">@lang('translate.tour_price') <span
                                class="color-orange"> {!! currency($tour->price) !!}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="detail-content">
                        <div class="detail-top">
                            <div class="embed-responsive embed-responsive-16by9">

                                <img class="img-responsive img-full"
                                     src="{{asset('uploads/tours/'.$tour->image)}}" alt="">
                            </div>
                        </div>

                        <div class="detail-content-block">
                            <div class="simple-tab color-1 tab-wrapper">
                                <div class="tab-nav-wrapper">
                                    <div class="nav-tab  clearfix">
                                        <div class="nav-tab-item active">
                                            @lang('translate.tour_description')
                                        </div>
                                        <div class="nav-tab-item">
                                            @lang('translate.tour_destinations')
                                        </div>
                                        <div class="nav-tab-item">
                                            @lang('translate.tour_reviews')
                                        </div>

                                    </div>
                                </div>
                                <div class="tabs-content clearfix">
                                    <div class="tab-info active">
                                        <h3>{{$tour['name_'.$lang]}}</h3>
                                        <p>{{$tour['description_'.$lang]}}</p>
                                        <img class="right-img dest-img" src="{{asset('img/detail/tab_img.jpg')}}"
                                             alt="">
                                        <h4>interesting for you</h4>
                                        <p>Pellentesque ac turpis egestas, varius justo et, condimentum augue. Praesent
                                            aliquam, nisl feugiat vehicula condimentum, justo tellus scelerisque
                                            metus.</p>

                                    </div>
                                    <div class="tab-info">
                                        <div class="row">
                                            @foreach($tour->destinations as $destination)
                                                <div class="col-md-12">
                                                    <img class="right-img dest-img"
                                                         src="{{asset('uploads/tours/destinations/'.$destination->image)}}"
                                                         alt="">
                                                    <h4>{{$destination['title_'.$lang]}}</h4>
                                                    <h2>{{$destination->day}}</h2>
                                                    <p>{{$destination['description_'.$lang]}} </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-info bg-white">
                                        <div class="reviews">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="additional-block">
                                                        <h4 class="additional-title">@lang('translate.tour_reviews')
                                                            <span
                                                                class="color-dr-blue-2">{{$tour->comments->count()}}</span>
                                                        </h4>
                                                        <ul class="comments-block">
                                                            @foreach($tour->comments as $comment)
                                                                <li class="comment-entry clearfix">
                                                                    <img class="commnent-img"
                                                                         src="{{asset('img/detail/user-comment.png')}}"
                                                                         alt="">
                                                                    <div class="comment-content clearfix">
                                                                        <div class="tour-info-line">
                                                                            <div class="tour-info">
                                                                                <i class="fas fa-calendar-alt"></i>
                                                                                <span
                                                                                    class="font-style-2 color-dark-2">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                                                            </div>
                                                                            <div class="tour-info">
                                                                                <i class="fas fa-users"></i>
                                                                                <span
                                                                                    class="font-style-2 color-dark-2">@lang('translate.tour_from') {{$comment->name}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="comment-text color-grey">
                                                                            {{ $comment->comment}}
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <form action="{{route('comment')}}" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <div class="form-block type-2 clearfix">
                                                                        <div
                                                                            class="input-style-1 b-50 brd-0 type-2 color-3">
                                                                            <input type="text" required
                                                                                   placeholder="@lang('translate.your_name')"
                                                                                   name="name"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <div class="form-block type-2 clearfix">
                                                                        <div
                                                                            class="input-style-1 b-50 brd-0 type-2 color-3">
                                                                            <input type="text" required
                                                                                   placeholder="@lang('translate.your_email')"
                                                                                   name="email"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12">

                                                                    <div class="form-block type-2 clearfix">
                                                                        <textarea name="comment"
                                                                                  class="area-style-1 type-2 color-3"
                                                                                  required
                                                                                  placeholder="@lang('translate.your_comment')"></textarea>
                                                                    </div>
                                                                    <input type="hidden" name="tour_id"
                                                                           value="{{$tour->id}}">
                                                                    <input type="submit"
                                                                           class="c-button b-40 fr bg-dr-blue-2 hv-dr-blue-2-o"
                                                                           value="@lang('translate.blog_submit')">
                                                                    @if(session()->has('message'))
                                                                        <strong>{{session()->get('message')}}</strong>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="right-sidebar">

                        <div class="detail-block bg-dr-blue-2">
                            <h4 class="text-dark">@lang('translate.tour_detail')</h4>
                            <div class="details-desc">
                                <p class="color-dark">@lang('translate.tour_country'): <span
                                        class="color-orange">{{$tour->country['name_'.$lang]}}</span>
                                </p>
                                <p class="color-dark">@lang('translate.tour_type'): <span
                                        class="color-orange">{{($tour->type == 1) ? 'Groups' : 'Individual'}}</span>
                                </p>
                                <p class="color-dark">@lang('translate.tour_start'): <span
                                        class="color-orange">322323</span>
                                </p>
                                <p class="color-dark">@lang('translate.tour_end'): <span
                                        class="color-orange">16.11.2019</span></p>
                                <p class="color-dark">@lang('translate.tour_types'): <span
                                        class="color-orange">{{$tour->tour_type['name_'.$lang]}}</span>
                                </p>
                                @isset($tour->sale)
                                    <p class="color-dark">@lang('translate.tour_sale'): <span class="color-orange">{{$tour->sale}}%</span>
                                    </p>
                                @endisset
                            </div>
                        </div>
                        <div class="detail-logo bg-grey-2">
                            <div class="detail-logo-name">@lang('translate.tour_expert')</div>
                            <img src="{{asset('uploads/experts/'.$tour->expert->image)}}" alt=""
                                 style="border-radius: 50%;width: 100px;height: 100px;}">
                            <p class="color-dark"><i class="fas fa-user"></i>{{$tour->expert->name}}</p>
                            @isset($tour->expert->email)
                                <p class="color-dark"><i class="fas fa-at"></i> {{$tour->expert->email}}</p>
                            @endisset
                            @isset($tour->expert->skype)
                                <p class="color-dark"><i class="fab fa-skype"></i> {{$tour->expert->skype}}</p>
                            @endisset
                            @isset($tour->expert->phone)
                                <p class="color-dark"><i class="fas fa-mobile-alt"></i> {{$tour->expert->phone}}</p>
                            @endisset
                        </div>
                        <div class="popular-tours bg-grey-2">
                            <h4 class="color-dark-2">@lang('translate.other_tours')</h4>
                            @foreach($popular_tours as $popular_tour)
                                <div class="hotel-small style-2 clearfix">
                                    <a class="hotel-img black-hover" href="{{route('tour.detail', $popular_tour->id)}}" target="_blank">
                                        <img class="img-responsive radius-3" src="{{asset('uploads/tours/'.$popular_tour->image)}}"
                                             alt="">
                                        <div class="tour-layer delay-1"></div>
                                    </a>
                                    <div class="hotel-desc">
                                        <h5><span class="color-dark-2">@lang('translate.tour_from') <strong>{!! currency($popular_tour->price) !!}</strong></span></h5>
                                        <h4>{{$popular_tour['name_'.$lang]}}</h4>
                                        <div class="hotel-loc">{{$popular_tour['short_description_'.$lang]}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="row padd-100">
                <div class="table-responsive col-md-12 hotel-bootstrap">
                    <table class="table style-1 striped">
                        <thead>
                        <tr>
                            <th>@lang('translate.hotels')</th>
                            @foreach($tour->tour_hotels as $tour_hotel)
                                @foreach ($tour_hotel->prices as $day => $price)
                                    <th><strong>{{$day}}</strong></th>
                                @endforeach
                            @endforeach
                            <th>@lang('translate.hotel_select')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tour->tour_hotels as $tour_hotel)
                            <tr>
                                <td><a href="{{route('hotel.detail', $tour_hotel->id)}}"
                                       target="_blank">{{$tour_hotel->hotel['name_'.$lang]}}</a></td>
                                @foreach ($tour_hotel->prices as $day => $price)
                                    <td>{{$price}}</td>
                                @endforeach
                                <td>
                                    <a href="{{route('tour.form',$tour->id)}}"
                                       class="button-s-2 bg-1">@lang('translate.hotel_select')</a>
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
