<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <title>Travel Armenia</title>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="color-theme" content="#ffdd02"/>
    <meta name="author" content="Atom Planet Creative Studio">
    <meta property="og:title" content=""/>
    <meta property="og:keywords" content=""/>
    <meta property="og:description" content=""/>


    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jquery-ui.structure.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/toastr.css')}}">

    @yield('css')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('img/logo.png')}}" rel="shortcut icon"/>
    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/pages/main.js')}}"></script>
    @routes

</head>
<body>
{{--<div id="preloader">--}}
{{--<div id="ctn-preloader" class="ctn-preloader">--}}
{{--<div class="animation-preloader">--}}
{{--<div class="spinner"></div>--}}
{{--<div class="txt-loading">--}}
{{--<span data-text-preloader="A" class="letters-loading">--}}
{{--A--}}
{{--</span>--}}
{{--<span data-text-preloader="G" class="letters-loading">--}}
{{--G--}}
{{--</span>--}}
{{--<span data-text-preloader="A" class="letters-loading">--}}
{{--A--}}
{{--</span>--}}
{{--<span data-text-preloader="&nbsp;" class="letters-loading">--}}
{{--&nbsp;--}}
{{--</span>--}}
{{--<span data-text-preloader="T" class="letters-loading">--}}
{{--T--}}
{{--</span>--}}
{{--<span data-text-preloader="R" class="letters-loading">--}}
{{--R--}}
{{--</span>--}}
{{--<span data-text-preloader="A" class="letters-loading">--}}
{{--A--}}
{{--</span>--}}
{{--<span data-text-preloader="V" class="letters-loading">--}}
{{--V--}}
{{--</span>--}}
{{--<span data-text-preloader="E" class="letters-loading">--}}
{{--E--}}
{{--</span>--}}
{{--<span data-text-preloader="L" class="letters-loading">--}}
{{--L--}}
{{--</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="loader-section section-left"></div>--}}
{{--<div class="loader-section section-right"></div>--}}
{{--</div>--}}
{{--</div>--}}

<header class="color-1 hovered menu-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="nav">

                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('img/logo.png')}}" alt="Travel Armenia" width="100px">
                    </a>

                    <div class="nav-menu-icon">
                        <a href="#"><i></i></a>
                    </div>
                    <nav class="menu">
                        <ul>
                            <li class="type-1 {{set_active('home')}}"><a
                                        href="{{route('home')}}">@lang('translate.nav_home')</a></li>
                            <li class="type-1 {{set_active('tours','tour.detail','tour.form')}}">
                                <a href="#">@lang('translate.nav_tours')<span class="fa fa-angle-down"></span></a>
                                <ul class="dropmenu">
                                    @foreach($countries as $country)
                                        <li>
                                            <a href="{{route('tours',$country->id)}}">{{$country['name_'.$lang]}}<span
                                                        class="fa fa-angle-down"></span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="type-1 {{set_active('hotels','hotel.detail','hotel.form')}}">
                                <a href="#">@lang('translate.nav_hotels')<span class="fa fa-angle-down"></span></a>
                                <ul class=" multi-level dropmenu">
                                    @foreach($countries as $country)
                                        <li class="dropdown-submenu">
                                            <a href="{{route('hotels',['country'=>$country->id])}}"
                                               class="dropdown-toggle">{{$country['name_'.$lang]}}</a>
                                            <ul class="dropmenu">
                                                @foreach($country->cities as $city)
                                                    <li>
                                                        <a href="{{route('hotels',['country'=>$country->id,'city'=>$city->id])}}">{{$city['name_'.$lang]}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="type-1 {{set_active('transports','transport.detail','apartments','apartment.detail')}}">
                                <a href="#">@lang('translate.nav_rent')<span class="fa fa-angle-down"></span></a>
                                <ul class="dropmenu">
                                    <li><a href="{{route('transports')}}">@lang('translate.nav_transport')</a></li>
                                    <li><a href="{{route('apartments')}}">@lang('translate.nav_apartment')</a></li>
                                </ul>
                            </li>
                            <li class="type-1 {{set_active('excursions','excursion.detail')}}"><a
                                        href="{{route('excursions')}}">@lang('translate.nav_excursion')</a></li>
                            <li class="type-1 {{set_active('posts','post.detail')}}"><a
                                        href="{{route('posts')}}">@lang('translate.nav_blog')</a></li>
                            <li class="type-1 {{set_active('gallery','faq','contact')}}">
                                <a href="#">@lang('translate.nav_other')<span class="fa fa-angle-down"></span></a>
                                <ul class="dropmenu">
                                    <li><a href="{{route('gallery')}}">@lang('translate.nav_gallery')</a></li>
                                    <li><a href="{{route('faq')}}">@lang('translate.nav_faq')</a></li>
                                    <li><a href="{{route('contact')}}">@lang('translate.nav_contact')</a></li>
                                </ul>
                            </li>
                            <li class="type-1">
                                <a href="#">{{Cookie::get('currency')}}<span class="fa fa-angle-down"></span></a>
                                <ul class="dropmenu">
                                    <li><a href="javascript:void(0)" class="currency" data-name="amd"> AMD ֏</a></li>
                                    <li><a href="javascript:void(0)" class="currency" data-name="usd">USD $</a></li>
                                    <li><a href="javascript:void(0)" class="currency" data-name="euro"> EUR &#8364</a>
                                    </li>
                                    <li><a href="javascript:void(0)" class="currency" data-name="rub"> RUB &#8381</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="type-1">
                                <a href="#">{{ LaravelLocalization::getCurrentLocaleName() }} &nbsp;
                                    <img src="{{asset('img/flags/'.LaravelLocalization::getCurrentLocaleName().'.png')}}"
                                         alt="">
                                    <span class="fa fa-angle-down"></span>
                                </a>
                                <ul class="dropmenu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}"
                                               class="{{ $properties['name'] }}"
                                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                                <img src="{{asset('img/flags/'.$properties['name'].'.png')}}" alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>


@yield('content')


<footer class="bg-dark type-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="footer-block">
                    <img src="{{asset('img/logo.png')}}" alt="">
                </div>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-6 col-sm-6 no-padding">
                <div class="footer-block">
                    <h6>@lang('translate.footer_travel')</h6>
                    <ul>
                        <li><a class="link-aqua" href="{{route('posts')}}">@lang('translate.footer_blog')</a></li>
                        <li><a class="link-aqua" href="{{route('faq')}}">@lang('translate.footer_faq')</a></li>
                        <li><a class="link-aqua" href="{{route('contact')}}">@lang('translate.footer_contact')</a></li>
                        <li><a class="link-aqua" href="{{route('condition')}}">@lang('translate.footer_terms')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
                <div class="footer-block">
                    <h6>@lang('translate.footer_newsletter')</h6>
                    <div class="input-style-1 b-50 color-4">
                        <input type="email" placeholder="Enter Email Address" id="subscribe">
                        <a href="javascript:void(0);" id="send_subscribe">
                            <div class="btn-subscribe"><i class="fa fa-paper-plane icon-position"></i></div>
                        </a>
                        <input type="hidden" id="loading-sub" value="@lang('translate.loading')">
                        <input type="hidden" id="success-back-sub" value="@lang('translate.success')">
                        <input type="hidden" id="validator-error-sub" value="@lang('translate.validate')">
                        <input type="hidden" id="server-error-sub" value="@lang('translate.error')">
                    </div>
                    <div class="footer-share">
                        <a href="#"><span class="fab fa-facebook"></span></a>
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="#"><span class="fab fa-google-plus"></span></a>
                        <a href="#"><span class="fab fa-pinterest"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="footer-block">
                    <h6>@lang('translate.footer_info')</h6>
                    <div class="contact-info">
                        <div class="contact-line color-grey-3"><i
                                    class="fas fa-map-marker"></i><span>@lang('translate.footer_address')</span>
                        </div>
                        <div class="contact-line color-grey-3"><i class="fas fa-phone"></i><a href="tel:93123456789">+374
                                77 97 88 83</a></div>
                        <div class="contact-line color-grey-3"><i class="fas fa-envelope"></i><a href="mailto:">travel@mail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <p class="text-center">&copy;
                    <script>document.write(new Date().getFullYear());</script> @lang('translate.footer_rights'). <a
                            href="https://atomplanet.am/"
                            target="_blank"><span style="color: #00c0ff">Atom Planet </span>Creative
                        Studio</a></p>
            </div>
        </div>
    </div>
</footer>
<div id="toTop"><i class="fa fa-angle-up"></i></div>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/extensions/toastr.js')}}"></script>
<script src="{{asset('js/idangerous.swiper.min.js')}}"></script>
<script src="{{asset('js/jquery.viewportchecker.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
@yield('script')
<script src="{{asset('js/all.js')}}"></script>
<script src="{{asset('js/pages/currency.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.c_pagination ul').removeClass('pagination').addClass('cp_content color-2');
        $('.page-item:first-child span').html("@lang('translate.previous')");
        $('.page-item:first-child a').html("@lang('translate.previous')");
        $('.page-item:last-child a').html("@lang('translate.next')");
        $('.page-item:last-child span').html("@lang('translate.next')");
    })
</script>

</body>
</html>
