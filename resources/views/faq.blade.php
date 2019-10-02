@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.faq')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wraper bg-grey-2 padd-90">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="second-title">
                        <h2 class="color-orange">@lang('translate.faq_title')</h2>
                    </div>
                </div>
            </div>
            <div class="accordion style-6">
                @foreach($faqs as $faq)
                    <div class="acc-panel">
                        <div class="acc-title"><span class="acc-icon"></span>{{$faq['question_'.$lang]}}
                        </div>
                        <div class="acc-body">
                            <p>{{$faq['answer_'.$lang]}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
