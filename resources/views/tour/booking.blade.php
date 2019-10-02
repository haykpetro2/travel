@extends('layouts.header-footer')
@section('content')

    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/tours/'.$tour->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.tour_booking')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="detail-wrapper">
        <div class="container">
            <div class="row padd-90">
                <div class="col-xs-12 col-md-12">
                    <form class="simple-from book-tour">
                        <div class="simple-group">
                            <h3 class="small-title">@lang('translate.tour_personal_info')</h3>
                            <h4 class="text-right color-orange mar_bot">
                                <span>@lang('translate.tour_total'): </span>
                                <span id="total">0</span>
                            </h4>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_name')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_name')"
                                                   name="first_name" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_last_name')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_last_name')"
                                                   name="last_name" required/>
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
                                            <input type="text" placeholder="@lang('translate.your_phone')" name="phone"
                                                   required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_adults')*</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <select name="adult" class="form-control custom-select adult send-total"
                                                    id="adult" required>
                                                <option value="0">-</option>
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
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_child_1')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <select name="child_6" class="form-control custom-select adult send-total"
                                                    id="child_6">
                                                <option value="0">-</option>
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
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_child_2')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <select name="child_12" class="form-control custom-select adult send-total"
                                                    id="child_12">
                                                <option value="0">-</option>
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
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-block type-2 clearfix">
                                        <div class="form-label color-dark-2">@lang('translate.label_promo')</div>
                                        <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                            <input type="text" placeholder="@lang('translate.your_promo')"
                                                   id="promo_code" name="promo_code">
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
                        </div>

                        <input type="hidden" id="loading" value="@lang('translate.loading')">
                        <input type="hidden" id="success-back" value="@lang('translate.success')">
                        <input type="hidden" id="validator-error" value="@lang('translate.validate')">
                        <input type="hidden" id="server-error" value="@lang('translate.error')">

                        <input type="hidden" id="tour_id" name="tour_id" value="{{$tour->id}}">
                        <input type="button" id="booking" class="c-button bg-dr-blue-2 hv-dr-blue-2-o"
                               value="@lang('translate.tour_confirm')">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/pages/tour.js')}}"></script>
@endsection

