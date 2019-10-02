<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet"/>
    <title>Travel Armenia</title>
</head>
<body data-color="theme-1">

<!-- LOADER -->
<div class="loading dr-blue-2">
    <div class="loading-center">
        <div class="loading-center-absolute">
            <div class="object object_four"></div>
            <div class="object object_three"></div>
            <div class="object object_two"></div>
            <div class="object object_one"></div>
        </div>
    </div>
</div>
<img class="center-image" src="{{asset('img/special/bg-1.jpg')}}" alt="">

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3" style="background-color: white;">
            <div class="f-login-content">
                <div class="f-login-header">
                    <div class="f-login-title color-dr-blue-2">Welcome back!</div>
                    <div class="f-login-desc color-grey">Please login to your account</div>
                </div>
                <form class="f-login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-style-1 b-50 type-2 color-5">
                        <input type="text" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="input-style-1 b-50 type-2 color-5">
                        <input type="password" placeholder="Enter your password" name="password" required>
                    </div>
                    <div class="checkbox-group">
                        <div class="input-entry color-3">
                            <input class="checkbox-form" id="remember" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="clearfix" for="remember">
                                <span class="sp-check"><i class="fa fa-check"></i></span>
                                <span class="checkbox-text">Remember me</span>
                            </label>
                        </div>
                    </div>
                    <input type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o"
                           value="LOGIN TO ADMIN">
                </form>
            </div>
        </div>
    </div>
    <div class="full-copy">© 2018 All rights reserved. Atom Planet</div>
</div>

<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/all.js')}}"></script>

</body>
</html>


