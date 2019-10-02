@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/excursions/'.$excursion->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.excursion_booking')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-wrapper">
        <div class="container">
            <div class="row padd-90">
                <div class="col-xs-12 col-md-12">
                    <form class="simple-from book-excursion">
                        <div class="simple-group">
                            <div class="row">
                                <h3 class="small-title col-md-6 col-xs-12">@lang('translate.excursion_personal_info')</h3>
                                <h4 class="text-right color-orange col-md-6 col-xs-12">
                                    <span>@lang('translate.excursion_total'): </span>
                                    <span id="excursion-total">
                                    {!! currency($excursion->price) !!}
                                </span>
                                </h4>
                                <h5 class="text-right color-orange mar_bot col-md-6 col-xs-12">
                                    <span>@lang('translate.excursion_per_person'): </span>
                                    <span id="per-person">
                                      {!! currency($excursion->price) !!}
                                </span>
                                </h5>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_name')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_name')"
                                                   name="first_name"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_last_name')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_last_name')"
                                                   name="last_name"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
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
                                                   name="phone"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_checkin')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                            <input type="text" class="datepicker" name="check_in" autocomplete="off"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_checkout')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                            <input type="text" class="datepicker" name="check_out" autocomplete="off"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_person')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <select name="person" class="form-control custom-select adult change-total"
                                                    id="person" required>
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
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_guide')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">

                                            <input type="radio" id="guide_yes" class="change-total" name="guide"
                                                   value="yes">
                                            <label for="guide_yes">@lang('translate.label_yes')</label>

                                            <input type="radio" id="guide_no" class="change-total" name="guide"
                                                   value="no" checked>
                                            <label for="guide_no">@lang('translate.label_no')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_lunch')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">

                                            <input type="radio" id="lunch_yes" class="change-total" name="lunch"
                                                   value="yes">
                                            <label for="lunch_yes">@lang('translate.label_yes')</label>

                                            <input type="radio" id="lunch_no" class="change-total" name="lunch"
                                                   value="no" checked>
                                            <label for="lunch_no">@lang('translate.label_no')</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_note')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <textarea name="note"></textarea>
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

                        <input type="hidden" name="excursion_id" value="{{$excursion->id}}">
                        <input type="button" id="booking" class="c-button bg-dr-blue-2 hv-dr-blue-2-o"
                               value="@lang('translate.excursion_confirm')">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
