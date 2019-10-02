@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-4">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <h4 class="color-white">@lang('translate.tour_found')
                        <span>{{$tours->count()}}</span> @lang('translate.tours')</h4>
                    <h2 class="color-white">@lang('translate.tour')</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="list-wrapper bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="sidebar style-2 clearfix">
                        <div class="sidebar-block">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.tour_search')</h4>
                            <div class="search-inputs">
                                <div class="form-block clearfix">
                                    <div class="input-style-1 b-50 color-4">
                                        <img src="{{asset('img/loc_icon_small_grey.png')}}" alt="">
                                        <input type="text" placeholder="@lang('translate.your_where')">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="c-button b-40 bg-orange hv-orange-o"
                                   value="@lang('translate.hotel_search_button')">
                        </div>
                        <div class="sidebar-block">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.tour_type')</h4>
                            <div class="search-inputs">
                                <div class="form-block type-2 clearfix">
                                    <div class="input-style-1 b-50 color-4">

                                        <input type="radio" id="cash" class="change-total w-auto" name="payment"
                                               value="cash">
                                        <label for="cash">@lang('translate.label_individual')</label>

                                        <input type="radio" id="card" class="change-total w-auto" name="payment"
                                               value="card" checked>
                                        <label for="card">@lang('translate.label_group')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-block">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.tour_type2')</h4>
                            <ul class="sidebar-category color-2">
                                <li class="active">
                                    <a class="cat-drop" href="#">All <span class="fr">({{$tours->count()}})</span></a>
                                </li>
                                @foreach($tour_types as $type)
                                    <li>
                                        <a class="cat-drop" href="#">{{$type['name_'.$lang]}}<span
                                                class="fr">({{$type->tours->count()}})</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="list-content clearfix">
                        @foreach($tours as $tour)
                            <div class="list-item-entry">
                                <div class="hotel-item style-8 bg-white">
                                    <div class="table-view">
                                        <div class="radius-top cell-view">
                                            <img src="{{asset('uploads/tours/'.$tour->image)}}" class="h_100" alt="">
                                            @if ($tour->sale)
                                                <div class="price price-s-3 red tt">
                                                    @lang('translate.tour_sale')
                                                    {{$tour->sale.'%'}}
                                                </div>

                                            @endif

                                        </div>
                                        <div class="title hotel-middle clearfix cell-view">
                                            <h4><b>{{$tour['name_'.$lang]}}</b></h4>
                                            <p class="f-14">{{$tour['short_description_'.$lang]}}</p>

                                        </div>
                                        <div class="title hotel-right bg-orange clearfix cell-view">
                                            <div class="hotel-person text-dark">@lang('translate.tour_from')
                                                <span>{!! currency($tour->price) !!}</span></div>
                                            <a class="c-button b-40 bg-orange-o color-dark-2 hv-white grid-hidden"
                                               href="{{route('tour.detail',$tour->id)}}">@lang('translate.tour_more')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="c_pagination clearfix padd-120">
                        <a href="#" class="c-button b-40 bg-orange hv-orange-o fl">@lang('translate.tour_prev')</a>
                        <a href="#" class="c-button b-40 bg-orange hv-orange-o fr">@lang('translate.tour_next')</a>
                        <ul class="cp_content color-2">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">10</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
