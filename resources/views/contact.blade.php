@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">

                        <h2 class="color-white">@lang('translate.contact_title')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-wrapper">
        <div class="main-wraper padd-40">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-style-1 type-2 color-2">
                                        <input type="text" placeholder="@lang('translate.your_name')*" name="name"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="input-style-1 type-2 color-2">
                                        <input type="email" placeholder="@lang('translate.your_email')*" name="email"
                                               required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <textarea class="area-style-1 color-1" required
                                              placeholder="@lang('translate.your_message')*" name="message"></textarea>

                                    <input type="hidden" id="loading" value="@lang('translate.loading')">
                                    <input type="hidden" id="success-back" value="@lang('translate.success')">
                                    <input type="hidden" id="validator-error" value="@lang('translate.validate')">
                                    <input type="hidden" id="server-error" value="@lang('translate.error')">
                                    <button type="button" id="send-contact"
                                            class="c-button bg-dr-blue-2 hv-dr-blue-2-o">
                                        <span>@lang('translate.contact_send')</span>
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-4">

                        <div class="contact-info">
                            <h4 class="color-dark-2"><strong>@lang('translate.contact_info')</strong></h4>
                            <div class="contact-line color-grey-3"><img src="{{asset('img/phone_icon_2_dark.png')}}"
                                                                        alt="">@lang('translate.contact_phone'): <a
                                        class="color-dark-2" href="tel:37477978883">+374 77 97 8883</a></div>
                            <div class="contact-line color-grey-3"><img src="{{asset('img/mail_icon_b_dark.png')}}"
                                                                        alt="">@lang('translate.contact_mail'):
                                <a class="color-dark-2 tt" href="#">travel@world.com</a></div>
                            <div class="contact-line color-grey-3"><img src="{{asset('img/loc_icon_dark.png')}}"
                                                                        alt="">@lang('translate.contact_addr'):
                                <span class="color-dark-2 tt">@lang('translate.contact_address')</span></div>
                        </div>
                        <div class="contact-socail">
                            <a class="color-grey-3 link-dr-blue-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="color-grey-3 link-dr-blue-2" href="#"><i class="fab fa-twitter"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-block">
        <div id="map-canvas" class="style-2" data-lat="40.205626" data-lng="44.506529" data-zoom="17"
             data-style="2"></div>
        <div class="addresses-block">
            <a data-lat="40.205626" data-lng="44.506529" data-string="Travel Armenia"></a>
        </div>
    </div>
@endsection

@section('script')
    <script defer=""
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6_yS07UHvzDEuzwNYQc_vR1KI7HFiqok&amp;"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="{{asset('js/map.js')}}"></script>
    <script src="{{asset('js/pages/contact.js')}}"></script>
@endsection
