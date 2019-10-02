@extends('layouts.header-footer')
@section('content')
    <div class="main-wraper padd-90">
        <div class="container">
            <div class="row padd-95-0">
                <div class="col-xs-12 col-md-6 col-md-push-6 col-sm-12">
                    <div class="popular-desc text-left">
                        <div class="clip">
                            <div class="bg bg-bg-chrome act bg-contain"
                                 style="background-image:url({{asset('img/home_1/arm.png')}})">
                            </div>
                        </div>
                        <div class="vertical-align">
                            <h3>Armenia, Yerevan</h3>
                            <p class="color-grey">Curabitur nunc erat, consequat in erat ut, congue bibendum nulla.
                                Suspendisse id pharetra lacus, et hendrerit mi Praesent at vestibulum tortor. Praesent
                                condimentum efficitur massa, nec congue sem dapibus sed. </p>
                            <h4>cities</h4>
                            <div class="row cities">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <ul>
                                        <li><a href="#"><strong>Rome</strong></a></li>
                                        <li><a href="#">Venice</a></li>
                                        <li><a href="#">Pisa</a></li>
                                        <li><a href="#">Naples</a></li>
                                        <li><a href="#">Milan</a></li>
                                        <li><a href="#">Capri</a></li>
                                        <li><a href="#">Matera</a></li>
                                        <li><a href="#">Pompeii</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-md-pull-6 col-sm-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="radius-mask popular-img">

                                <img class="img-full" src="{{asset('uploads/country/'.$country->image)}}" alt="">
                                {{--<div class="bg bg-bg-chrome act"
                                     style="background-image:url(../../public/uploads/about/1548676077.jpg)">
                                </div>--}}

                                <div class="tour-layer delay-1"></div>
                                {{--<div class="vertical-bottom">
                                    <h4><a href="#">Maecenas sit amet</a></h4>
                                    <h5><b class="color-aqua">from $235</b> per person</h5>
                                </div>--}}
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="radius-mask popular-img">
                                 <div class="clip">
                                     <div class="bg bg-bg-chrome act"
                                          style="background-image:url(../../public/img/home_1/popular_travel_img_2.jpg)">
                                     </div>
                                 </div>
                                 <div class="tour-layer delay-1"></div>
                                 <div class="vertical-bottom">
                                     <h4><a href="#">Aenean iaculis enim</a></h4>
                                     <h5><b class="color-aqua">from $180</b> per person</h5>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="radius-mask popular-img">
                                 <div class="clip">
                                     <div class="bg bg-bg-chrome act"
                                          style="background-image:url(../../public/img/home_1/popular_travel_img_3.jpg)">
                                     </div>
                                 </div>
                                 <div class="tour-layer delay-1"></div>
                                 <div class="vertical-bottom">
                                     <h4><a href="#">Pellentesque tempus</a></h4>
                                     <h5><b class="color-aqua">from $195</b> per person</h5>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="radius-mask popular-img">
                                 <div class="clip">
                                     <div class="bg bg-bg-chrome act"
                                          style="background-image:url(../../public/img/home_1/popular_travel_img_4.jpg)">
                                     </div>
                                 </div>
                                 <div class="tour-layer delay-1"></div>
                                 <div class="vertical-bottom">
                                     <h4><a href="#">Donec id maximus</a></h4>
                                     <h5><b class="color-aqua">from $350</b> per person</h5>
                                 </div>
                             </div>
                         </div>--}}
                    </div>
                </div>
            </div>
            <div class="top-preview row no-margin padd-50-0">
                <div class="col-mob-12 col-xs-12 col-sm-12 col-md-12 no-padding">

                    <div class="tour-info-line clearfix">
                        <div class="tour-info fl">
                            <span class="font-style-2 font-14 color-grey-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at consequuntur cum dolor dolores et id impedit in itaque, maiores mollitia quas quos ratione reiciendis sapiente sit tempora totam vero! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam, animi corporis cum ducimus eius incidunt itaque, magnam maiores molestias odit officia optio placeat, repellat reprehenderit sint soluta temporibus tenetur?</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="top-preview row no-margin padd-70-0">
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-mob-12 col-xs-6 col-sm-6 col-md-3 no-padding">
                    <div class="tp_entry style-2">
                        <div class="tp_image">
                            <img class="center-image" src="../../public/img/home_9/preview_1.jpg" alt="">
                        </div>
                        <div class="tp_content">
                            {{-- <div class="rate-wrap clearfix">
                                 <div class="rate">
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                     <span class="fa fa-star color-yellow"></span>
                                 </div>
                                 <i>485 rewies</i>
                                 <div class="tp_price">$273</div>
                             </div>--}}
                            <h4><b>tours in monaco</b></h4>
                            <div class="tour-info-line clearfix">
                                {{--<div class="tour-info fl">
                                    <img src="../../public/img/calendar_icon_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">July <strong>19th 2015</strong></span>
                                </div>--}}
                                <div class="tour-info fl">
                                    <img src="../../public/img/loc_icon_small_grey.png" alt="">
                                    <span class="font-style-2 color-grey-3">alaska</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
