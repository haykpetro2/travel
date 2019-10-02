@extends('layouts.header-footer')
@section('content')

    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/hotels/photos/'.$background->name)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white f-100">@lang('translate.hotel_book')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="detail-wrapper">
        <div class="container">
            <div class="row padd-90">
                <div class="col-xs-12 col-md-12">
                    <form class="simple-from book-hotel">
                        <div class="simple-group">
                            <h3 class="small-title">@lang('translate.hotel_personal_info')</h3>
                            <h4 class="text-right color-orange">
                                <span>@lang('translate.hotel_total'): </span>
                                <span id="total"></span>
                            </h4>
                            <h5 class="text-right color-orange mar_bot" id="per-person"><span>@lang('translate.hotel_per_person'): </span>
                            </h5>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_name')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_name')"
                                                   name="first_name" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_last_name')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_last_name')"
                                                   name="last_name" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_email')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="email" placeholder="@lang('translate.your_email')" name="email"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_phone')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="number" placeholder="@lang('translate.your_phone')"
                                                   name="phone" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_checkin')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                            <input type="text" class="datepicker " name="check_in"
                                                   autocomplete="off"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_checkout')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                            <input type="text" class="datepicker checks" name="check_out"
                                                   autocomplete="off"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_person')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <select name="person" class="form-control custom-select adult"
                                                    id="person" required>
                                                @for ($i = 1; $i <= $room->count; $i++)
                                                    <option value="{{$i}}">
                                                        {{$i}}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_note')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <textarea name="note" id=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="confirm-terms">
                                        <div class="input-entry color-3">
                                            <input class="checkbox-form" id="term" type="checkbox" name="checkbox"
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
                        </div>

                        <input type="hidden" id="loading" value="@lang('translate.loading')">
                        <input type="hidden" id="success-back" value="@lang('translate.success')">
                        <input type="hidden" id="validator-error" value="@lang('translate.validate')">
                        <input type="hidden" id="server-error" value="@lang('translate.error')">
                        <input type="hidden" id="room_id" name="room_id" value="{{$room->id}}">
                        <input type="button" id="booking" class="c-button bg-dr-blue-2 hv-dr-blue-2-o"
                               value="@lang('translate.hotel_confirm')">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/pages/hotel.js')}}"></script>
@endsection
