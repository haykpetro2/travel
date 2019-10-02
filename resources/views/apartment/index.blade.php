@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-4">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <h4 class="color-white">@lang('translate.apartment_found')
                        <span>{{$apartments->count()}}</span> @lang('translate.apartments')</h4>
                    <h2 class="color-white">@lang('translate.apartment')</h2>
                    <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-12 col-md-offset-0">
                        <div class="input-style-1 min-80">
                            <img src="{{asset('img/loc_icon_small.png')}}" alt="">
                            <input type="text" placeholder="@lang('translate.your_search')">
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
    <div class="container-fluid">
        <div class="row no-padd">
            @foreach($apartments as $apartment)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="tour-block tour-block-s-1">
                        <div class="tour-layer delay-1"></div>
                        <img src="{{asset('uploads/apartments/'.$apartment->image)}}" class="res-img" alt="">
                        <div class="tour-caption">
                            <div class="vertical-top">
                                <span class="button-s-2 bg-orange fl ">@lang('translate.apartment_sale')
                                    20%</span>
                            </div>
                            <div class="vertical-align">
                                <h3>{{$apartment->name_ru}}</h3>
                                <h4 class="color-orange"><b>{!! currency($apartment->price) !!} </b></h4>
                            </div>
                            <div class="vertical-bottom">
                                <div class="fl">
                                    <div class="tour-info">
                                        <img src="{{asset('img/rooms.png')}}" alt="">
                                        <span class="font-style-2">@lang('translate.apartment_rooms'): <b>{{$apartment->room}}</b> </span>
                                    </div>
                                    <div class="tour-info">
                                        <img src="{{asset('img/square.png')}}" alt="">
                                        <span class="font-style-2">@lang('translate.apartment_area'):<b> {{$apartment->area}} </b> @lang('translate.apartment_m') <sup>2</sup></span>
                                    </div>
                                </div>
                                <a href="{{route('apartment.detail',$apartment->id)}}"
                                   class="c-button small fr border-white"><span>@lang('translate.apartment_more')</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="c_pagination clearfix padd-120 m-50">
        {{$apartments->links()}}
    </div>
@endsection
