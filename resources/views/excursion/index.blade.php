@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <h4 class="color-white">@lang('translate.excursion_found')
                        <span>{{$excursions->count()}}</span> @lang('translate.excursions')</h4>
                    <h2 class="color-white">@lang('translate.excursion')</h2>
                    <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-md-offset-0">
                        <div class="input-style-1 min-80">
                            <img src="{{asset('img/loc_icon_small.png')}}" alt="">
                            <input type="text" placeholder="@lang('translate.label_find_excursion')">
                        </div>
                        <div class="submit">
                            <input class="c-button b-60 bg-orange hv-orange" type="submit"
                                   value="@lang('translate.tab_search')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-wrapper bg-grey-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="list-content clearfix">
                        @foreach($excursions as $excursion)
                            <div class="list-item-entry">
                                <div class="hotel-item style-10 bg-white">
                                    <div class="container-fluid">
                                        <div class="row h-300">
                                            <div class="arrows col-md-6 h_100">
                                        <span class="button-s-2 bg-orange fl excursion_sale">@lang('translate.apartment_sale')
                                    20%</span>
                                                <div class="swiper-container h_100" data-autoplay="1" data-loop="1"
                                                     data-speed="5000"
                                                     data-center="0" data-slides-per-view="1" id="tour-slide-2">
                                                    <div class="swiper-wrapper h_100">
                                                        <div class="swiper-slide h_100">
                                                            <img class="img-responsive h_100 w_100"
                                                                 src="{{asset('uploads/hotels/1549707108.jpg')}}"
                                                                 alt="">
                                                        </div>
                                                        <div class="swiper-slide h_100">
                                                            <img class="img-responsive h_100 w_100"
                                                                 src="{{asset('uploads/hotels/1551112618.jpg')}}"
                                                                 alt="">
                                                        </div>

                                                    </div>
                                                    <div class="pagination pagination-hidden poin-style-1"></div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <h5>@lang('translate.from') <strong
                                                        class="color-orange">{!! currency($excursion->price) !!} </strong>
                                                    / @lang('translate.person')
                                                </h5>
                                                <h4><strong>{{$excursion['name_'.$lang]}}</strong> <span
                                                        class="color-orange f-right"><i
                                                            class="far fa-clock"></i> {{$excursion->time}} @lang('translate.h') &nbsp;<i
                                                            class="fas fa-route"></i> {{$excursion->km}} @lang('translate.km')</span>
                                                </h4>

                                                <div class="form-block type-2 clearfix w_50 mb-10">
                                                    <div
                                                        class="form-label color-dark-2">@lang('translate.label_person')</div>
                                                    <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                        <select name="person"
                                                                class="form-control custom-select adult change-total h-35 br-8"
                                                                id="person">
                                                            <option value="">
                                                                -
                                                            </option>
                                                            <option value="1">
                                                                1
                                                            </option>
                                                            <option value="2">
                                                                2
                                                            </option>
                                                            <option value="3">
                                                                3
                                                            </option>
                                                            <option value="4">
                                                                4
                                                            </option>
                                                            <option value="5">
                                                                5
                                                            </option>
                                                            <option value="6">
                                                                6
                                                            </option>
                                                            <option value="7">
                                                                7
                                                            </option>
                                                            <option value="8">
                                                                8
                                                            </option>
                                                            <option value="9">
                                                                9
                                                            </option>
                                                            <option value="10">
                                                                10
                                                            </option>
                                                            <option value="11">
                                                                11
                                                            </option>
                                                            <option value="12">
                                                                12
                                                            </option>
                                                            <option value="13">
                                                                13
                                                            </option>
                                                            <option value="14">
                                                                14
                                                            </option>
                                                            <option value="15">
                                                                15
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h4 class="color-orange">
                                                    <span>@lang('translate.excursion_total'): </span>
                                                    <span id="excursion-total">
                                    {!! currency($excursion->price) !!}
                                </span></h4>
                                                <h5 class="color-orange"><span>@lang('translate.excursion_per_person'): </span>
                                                    <span id="per-person">
                                      {!! currency($excursion->price) !!}
                                </span></h5>
                                                <p>
                                                    {{$excursion['description_'.$lang]}}
                                                </p>
                                                <a href="{{route('excursion.detail',$excursion->id)}}"
                                                   class="c-button b-40 bg-orange hv-orange-o"
                                                   style="margin: 10px 0;">@lang('translate.excursion_book')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="c_pagination clearfix  padd-120">
                        {{$excursions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/pages/excursion.js')}}"></script>
@endsection
