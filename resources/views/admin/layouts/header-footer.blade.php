<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Travel Armenia</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/app.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" href="{{asset('admin/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/pages/timeline.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap-iconpicker.css')}}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/extensions/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/pages/gallery.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
    @yield('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        const adminUrl = "{{url('/super-admin')}}";
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    @routes
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu" data-col="2-columns">

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <h2 class="brand-text">Travel</h2></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                                                  data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown"><span
                                    class="avatar avatar-online"></span><span
                                    class="user-name">{{Auth::user()->name}}</span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{route('admin.index')}}"><i class="ft-home"></i>Dashboard</a></li>
            <li class="nav-item">
                <a class="menu-item" href="{{route('country.index')}}"><i class="ft-globe"></i>Country</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('tour.index')}}"><i class="fa fa-plane"></i>Tours</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('hotel.index')}}"><i class="fa fa-building"></i>Hotels</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('excursion.index')}}"><i class="fa fa-ship"></i>Excursions</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('transport.index')}}"><i class="fa fa-car"></i>Transports</a>
            </li>
            <li class="nav-item">
                <a class="menu-item" href="{{route('apartment.index')}}"><i class="fa fa-home"></i>Apartments</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('post.index')}}"><i class="fa fa-newspaper-o"></i>Blog</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('faq.index')}}"><i class="fa fa-info"></i>F.A.Q</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('gallery.index')}}"><i class="fa fa-file-image-o"></i>Gallery</a>
            </li>
            <li class=" nav-item">
                <a class="menu-item" href="{{route('about.index')}}"><i class="fa fa-info-circle"></i>About</a>
            </li>

            <li class=" nav-item">
                <a class="menu-item" href="{{route('currency.index')}}"><i class="fa fa-cogs"></i>Other Settings</a>
            </li>
        </ul>
    </div>
</div>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2018 <a
                    class="text-bold-800 grey darken-2" href=""
                    target="_blank">Atom Planet </a>, All rights reserved. </span><span
                class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i
                    class="ft-heart pink"></i></span></p>
</footer>

<script src="{{asset('admin/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('admin/vendors/js/extensions/unslider-min.js')}}"></script>
<script src="{{asset('admin/vendors/js/timeline/horizontal-timeline.js')}}"></script>
<script src="{{asset('admin/js/core/app-menu.js')}}"></script>
<script src="{{asset('admin/js/core/app.js')}}"></script>
<script src="{{asset('admin/js/scripts/customizer.js')}}"></script>
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('admin/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/extensions/toastr.js')}}"></script>


<script>
    $(document).ready(function () {
        $('.editor').ckeditor();
        $('.pub').on('change', function () {
            $.ajax({
                url: "{{route('comment.status')}}",
                type: "post",
                data: {id: $(this).data('id'), val: $(this).val()},
                success: function () {
                    location.reload();
                }
            });
        });
    });
</script>
@yield('scripts')
</body>
</html>
