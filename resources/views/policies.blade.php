@extends('layouts.header-footer')
@section('content')
    <!-- INNER-BANNER -->
    <div class="inner-banner style-6">
        <img class="center-image" src="{{asset('img/detail/bg_3.jpg')}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">Policies</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-wraper padd-90 bg-grey-2 tabs-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="simple-tab type-2 tab-wrapper">
                        <div class="tabs-content tabs-wrap-style clearfix">
                            <div class="tab-info active">
                                <div class="acc-body">
                                    <div class="acc-body-block">
                                        {!! $condition['description_'.$lang] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection