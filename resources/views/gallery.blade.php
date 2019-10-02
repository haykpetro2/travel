@extends('layouts.header-footer')
@section('css')
    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet"/>
@endsection
@section('content')

    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.gallery')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wraper padd-20-0">
        <div class="container">
            <div class="filter-content row popup-gallery">
                <div class="grid-sizer col-mob-12 col-xs-6 col-sm-4"></div>
                @foreach($photos as $photo)
                    <div class="item tours gal-item col-mob-12 col-xs-6 col-sm-4 ">
                        <a class="black-hover" href="{{asset('uploads/gallery/'.$photo->name)}}">
                            <img class="img-full img-responsive" src="{{asset('uploads/gallery/'.$photo->name)}}"
                                 alt="">
                            <div class="tour-layer delay-1"></div>
                            <div class="vertical-align">
                                <h3 class="color-white"><b>{{$photo['title_'.$lang]}}</b></h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
@endsection
