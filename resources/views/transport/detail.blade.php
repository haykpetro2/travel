@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/transports/'.$transport->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.transport_booking')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-wrapper">
        <div class="container">
            <div class="detail-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="detaile-title">
                            <h2>@lang('translate.transport_details')</h2>
                            <div class="detail-price color-dark-2">@lang('translate.transport_price'): <span
                                    class="color-orange"> {!! currency($transport->price) !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                        <div class="car-tabs">
                            <div class="drop-tabs">
                                <b>@lang('translate.transport_details')</b>
                                <a href="#" class="arrow-down"><i class="fa fa-angle-down"></i></a>
                                <ul class="nav-tabs tpl-tabs tabs-style-1">

                                    <li class=" click-tabs"><a href="#one" data-toggle="tab" aria-expanded="false"><span
                                                class="fas fa-clipboard-list"></span>@lang('translate.transport_description')
                                        </a></li>
                                    <li class="active click-tabs"><a href="#two" data-toggle="tab"
                                                                     aria-expanded="false"><span
                                                class="fa fa-camera"></span>@lang('translate.transport_photos')</a>
                                    </li>
                                    <li class="click-tabs"><a href="#three" data-toggle="tab"
                                                              aria-expanded="false"><span
                                                class="fas fa-dollar-sign"></span>@lang('translate.transport_prices')
                                        </a></li>
                                    <li class="click-tabs"><a href="#four" data-toggle="tab" aria-expanded="false"><span
                                                class="fa fa-comment"></span>@lang('translate.transport_reviews')
                                        </a></li>
                                </ul>
                            </div>

                            <div class="tab-content tpl-tabs-cont section-text t-con-style-1">

                                <div class="tab-pane" id="one">
                                    <div class="transport_description">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{asset('uploads/transports/'.$transport->image)}}"
                                                     class="res-img" alt="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 py-2">
                                                <h3 class="color-orange">{{$transport['name_'.$lang]}}
                                                    <small class="color-orange">(@lang('translate.transport_type'):
                                                        {{$transport->type['name_'.$lang]}})
                                                    </small>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 py-2">
                                                <ul class="offers-info">
                                                    @foreach($transport->attributes as $attr)
                                                        <li><b><i class="{{$attr->attribute->icon}}"></i></b></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 py-2">
                                                <ul class="offers-info">
                                                    <li>@lang('translate.transport_model'):
                                                        <b>{{$transport->model['name_'.$lang]}}</b></li>
                                                    <li>@lang('translate.transport_transmission'):
                                                        <b>{{($transport->transmission == 1)  ? __('translate.automatic') : __('translate.mechanical')}}</b>
                                                    </li>
                                                    <li>@lang('translate.transport_motor'): <b>{{$transport->motor}}</b>
                                                    </li>
                                                    <li>@lang('translate.transport_door'): <b>{{$transport->door}}</b>
                                                    </li>
                                                    <li>@lang('translate.transport_person'):
                                                        <b>{{$transport->person}}</b></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 py-2">
                                                <p>{{$transport['description_'.$lang]}}</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane active in" id="two">
                                    <div class="slider-wth-thumbs style-1 arrows">
                                        <div class="swiper-container thumbnails-preview" data-autoplay="0" data-loop="1"
                                             data-speed="500" data-center="0" data-slides-per-view="1">
                                            <div class="swiper-wrapper">
                                                @foreach($transport->photos as $photo)
                                                    <div class="swiper-slide" data-val="{{$loop->iteration}}">
                                                        <img class="img-responsive img-full"
                                                             src="{{asset('uploads/transports/photos/'.$photo->name)}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="pagination pagination-hidden poin-style-1"></div>
                                            <div class="arrow-wrapp arr-s-1">
                                                <div class="swiper-arrow-left sw-arrow"><span
                                                        class="fa fa-angle-left"></span></div>
                                                <div class="swiper-arrow-right sw-arrow"><span
                                                        class="fa fa-angle-right"></span></div>
                                            </div>
                                        </div>
                                        <div class="swiper-container thumbnails" data-autoplay="0" data-loop="0"
                                             data-speed="500" data-slides-per-view="responsive" data-xs-slides="3"
                                             data-sm-slides="5" data-md-slides="5" data-lg-slides="5"
                                             data-add-slides="5">
                                            <div class="swiper-wrapper">
                                                @foreach($transport->photos as $photo)
                                                    <div class="swiper-slide" data-val="{{$loop->iteration}}">
                                                        <img class="img-responsive img-full"
                                                             src="{{asset('uploads/transports/photos/'.$photo->name)}}"
                                                             alt="">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="pagination hidden"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="three">
                                    <div class="prices">
                                        <div class="row">
                                            <div class="table-responsive col-md-12">
                                                <table class="table style-1 type-2 striped">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('translate.transport_day')</th>
                                                        <th>@lang('translate.transport_price')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($transport->prices as $prices)
                                                        <tr>
                                                            <td class="table-label"><strong>{{$prices->day}}</strong>
                                                            </td>
                                                            <td class="table-label color-dark-2">
                                                                <strong>{!! currency($prices->price) !!}</strong>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="four">
                                    <div class="reviews">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="additional-block">
                                                    <h4 class="additional-title">@lang('translate.transport_reviews')
                                                        <span
                                                            class="color-dr-blue-2">{{$transport->comments->count()}}</span>
                                                    </h4>
                                                    <ul class="comments-block">
                                                        @foreach($transport->comments as $comment)
                                                            <li class="comment-entry clearfix">
                                                                <img class="commnent-img"
                                                                     src="{{asset('img/detail/user-comment.png')}}"
                                                                     alt="">
                                                                <div class="comment-content clearfix">
                                                                    <div class="tour-info-line">
                                                                        <div class="tour-info">
                                                                            <img
                                                                                src="{{asset('img/calendar_icon_grey.png')}}"
                                                                                alt="">
                                                                            <span
                                                                                class="font-style-2 color-dark-2">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                                                        </div>
                                                                        <div class="tour-info">
                                                                            <img
                                                                                src="{{asset('img/people_icon_grey.png')}}"
                                                                                alt="">
                                                                            <span
                                                                                class="font-style-2 color-dark-2">@lang('translate.blog_by') {{$comment->name}}</span>
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
                                                                               name="name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-6">
                                                                <div class="form-block type-2 clearfix">
                                                                    <div
                                                                        class="input-style-1 b-50 brd-0 type-2 color-3">
                                                                        <input type="text" required
                                                                               placeholder="@lang('translate.your_email')"
                                                                               name="email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="form-block type-2 clearfix">
                                                            <textarea name="comment" class="area-style-1 type-2 color-3"
                                                                      required
                                                                      placeholder="@lang('translate.your_comment')"></textarea>
                                                                </div>
                                                                <input type="hidden" name="transport_id"
                                                                       value="{{$transport->id}}">
                                                                <input type="submit"
                                                                       class="c-button b-40 fr bg-dr-blue-2 hv-dr-blue-2-o"
                                                                       value="@lang('translate.transport_post')">
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

                    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                        <div class="detail-company">
                            <div class="detail-block bg-orange">
                                <h4>{{$transport['name_'.$lang]}}</h4>
                                <form class="simple-from book-transport">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.transport_pick')
                                                    *
                                                </div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                                    <input type="text" class="datepicker checks h-35 br-8"
                                                           name="check_in"
                                                           autocomplete="off" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.transport_drop')
                                                    *
                                                </div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                                    <input type="text" class="datepicker checks h-35 br-8"
                                                           name="check_out"
                                                           autocomplete="off" required/>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($transport->attributes as $attr)
                                            <div class="col-xs-12 col-md-6">
                                                <div class="confirm-terms mb-20">
                                                    <div class="input-entry color-3">
                                                        <input class="checkbox-form transport-attributes"
                                                               id="{{$attr->attribute->id}}" type="checkbox"
                                                               name="attr[]"
                                                               value="{{$attr->attribute->id}}">
                                                        <label class="clearfix" for="{{$attr->attribute->id}}">
                                                            <span class="sp-check"><i class="fa fa-check"></i></span>
                                                            <span
                                                                class="checkbox-text">{{$attr->attribute['name_'.$lang]}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row py-3">
                                        <h3 id="transport-total" class="color-orange text-center">
                                            @lang('translate.transport_total'):
                                            <span></span>
                                        </h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.label_name')*
                                                </div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <input type="text" placeholder="@lang('translate.your_name')"
                                                           name="first_name" class="h-35 br-8" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.label_last_name')
                                                    *
                                                </div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <input type="text" placeholder="@lang('translate.your_last_name')"
                                                           name="last_name" class="h-35 br-8" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.label_email')*
                                                </div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <input type="text" placeholder="@lang('translate.your_email')"
                                                           name="email" class="h-35 br-8" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.label_phone')*
                                                </div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <input type="text" placeholder="@lang('translate.your_phone')"
                                                           name="phone" class="h-35 br-8" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12">
                                            <div class="form-block type-2 mb-20 clearfix">
                                                <div class="form-label color-dark-2">@lang('translate.label_note')</div>
                                                <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                    <textarea name="note" class="br-8"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="confirm-terms">
                                                <div class="input-entry color-3">
                                                    <input class="checkbox-form" id="term" type="checkbox"
                                                           name="checkbox"
                                                           value="climat control">
                                                    <label class="clearfix" for="term">
                                                        <span class="sp-check"><i class="fa fa-check"></i></span>
                                                        <span class="checkbox-text">@lang('translate.label_agree')<a
                                                                class="color-dr-blue-2 link-dark-2"
                                                                href="{{route('condition')}}"
                                                                target="_blank"> @lang('translate.label_terms')</a>.</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="loading" value="@lang('translate.loading')">
                                    <input type="hidden" id="success-back" value="@lang('translate.success')">
                                    <input type="hidden" id="validator-error" value="@lang('translate.validate')">
                                    <input type="hidden" id="server-error" value="@lang('translate.error')">

                                    <input type="hidden" id="transport_id" name="transport_id"
                                           value="{{$transport->id}}">
                                    <input type="button" id="booking" class="c-button b-40 bg-tr-1 hv-white"
                                           value="@lang('translate.excursion_confirm')">
                                </form>
                            </div>
                        </div>
                        <div class="popular-tours bg-grey-2">
                            <h4 class="color-dark-2">@lang('translate.other_transport')</h4>
                            @foreach($popular_transports as $popular_transport)
                                <div class="hotel-small style-2 clearfix">
                                    <a class="hotel-img black-hover" href="#">
                                        <img class="img-responsive radius-3"
                                             src="{{asset('img/detail/hotel_small_1.jpg')}}" alt="">
                                        <div class="tour-layer delay-1"></div>
                                    </a>
                                    <div class="hotel-desc">
                                        <h5><span class="color-dark-2">from <strong>$273</strong></span></h5>
                                        <h4>bristol Hotel</h4>
                                        <div class="hotel-loc">2 Place de la Sans Défense, Puteaux, Paris, France.</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/pages/transport.js')}}"></script>
@endsection

