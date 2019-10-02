@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <h4 class="color-white">@lang('translate.transport_found')
                    <span>{{$transports->count()}}</span> @lang('translate.transports')</h4>
                <h2 class="color-white">@lang('translate.transport')</h2>
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
                                    <div
                                        class="form-label color-dark-2 mb-10">@lang('translate.label_choose_type')</div>
                                    <div class="input-style-1 b-50 color-4">
                                        <select name="person" class="form-control custom-select adult"
                                                id="person">
                                            <option value="">Sedan</option>
                                            <option value="">Jeep</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-block clearfix">
                                    <div
                                        class="form-label color-dark-2 mb-10">@lang('translate.label_choose_mark')</div>
                                    <div class="input-style-1 b-50 color-4">
                                        <select name="person" class="form-control custom-select adult"
                                                id="person">
                                            <option value="">Mers</option>
                                            <option value="">BMW</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-block clearfix">
                                    <div
                                        class="form-label color-dark-2 mb-10">@lang('translate.transport_transmission')</div>
                                    <div class="input-style-1 b-50 color-4">
                                        <select name="person" class="form-control custom-select adult"
                                                id="person">
                                            <option value="">@lang('translate.automatic')</option>
                                            <option value="">@lang('translate.mechanical')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="c-button b-40 bg-aqua"
                                   value="@lang('translate.hotel_search_button')">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9">
                    <div class="grid-content clearfix">
                        @foreach($transports as $transport)
                            <div class="list-item-entry">
                                <div class="hotel-item style-8 bg-white">
                                    <div class="table-view">
                                        <div class="radius-top cell-view">
                                            @isset($transport->sale)
                                            <span class="button-s-2 bg-orange fl transport_sale">
                                                @lang('translate.apartment_sale'){{$transport->sale}} %
                                            </span>
                                            @endisset
                                            <img src="{{asset('uploads/transports/'.$transport->image)}}" alt="">
                                        </div>
                                        <div class="title hotel-middle clearfix cell-view">
                                            <div class="hotel-person color-dark-2 list-hidden">
                                                <span>{!! currency($transport->price) !!}</span>
                                            </div>
                                            <h4><b>{{$transport['name_'.$lang]}}</b></h4>
                                            <p class="f-14">{{$transport['short_description_'.$lang]}}</p>
                                            <div class="hotel-icons-block">
                                                @foreach($transport->attributes as $attrs)
                                                    <i class="{{$attrs->attribute->icon}} hotel-icon"></i>
                                                @endforeach
                                            </div>
                                            <a href="{{route('transport.detail',$transport->id)}}"
                                               class="c-button b-40 bg-orange hv-orange-o"
                                               style="margin-top: 10px;">@lang('translate.transport_more')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <div class="c_pagination clearfix padd-120">
                        {{$transports->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
