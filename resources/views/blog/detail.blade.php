@extends('layouts.header-footer')
@section('content')
    @inject('posts','App\Models\Post')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/posts/'.$post->image)}}" alt="">
        <div class="vertical-align">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-8 col-md-offset-2">
                        <h2 class="color-white">@lang('translate.blog')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="detail-wrapper">
        <div class="container">
            <div class="row padd-90">
                <div class="col-xs-12 col-md-8">
                    <div class="blog-list">
                        <div class="detail-header style-2">
                            <h2 class="detail-title color-dark-2">{{$post['title_'.$lang]}}</h2>
                        </div>
                        <div class="detail-content">
                            <div class="detail-content-block">
                                <div class="blog-list-entry">
                                    <div class="blog-list-top">
                                        <div class="slider-wth-thumbs style-1 arrows">
                                            <div class="swiper-container thumbnails-preview" data-autoplay="0"
                                                 data-loop="1"
                                                 data-speed="500" data-center="0" data-slides-per-view="1">
                                                <div class="swiper-wrapper">
                                                    @foreach($post->photos as $photo)
                                                        <div class="swiper-slide" data-val="1">
                                                            <img class="img-responsive img-full h_100"
                                                                 src="{{asset('uploads/posts/photos/'.$photo->name)}}"
                                                                 alt="">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="pagination pagination-hidden"></div>
                                                <div class="arrow-wrapp arr-s-3">
                                                    <div class="swiper-arrow-left sw-arrow"><span
                                                                class="fa fa-angle-left"></span></div>
                                                    <div class="swiper-arrow-right sw-arrow"><span
                                                                class="fa fa-angle-right"></span></div>
                                                </div>
                                            </div>
                                            <div class="swiper-container thumbnails" data-autoplay="0"
                                                 data-loop="0" data-speed="500" data-center="0"
                                                 data-slides-per-view="responsive" data-mob-slides="2"
                                                 data-xs-slides="3"
                                                 data-sm-slides="4" data-md-slides="5" data-lg-slides="5"
                                                 data-add-slides="5">
                                                <div class="swiper-wrapper">

                                                    <div class="swiper-slide current active" data-val="0">
                                                        <img class="img-responsive img-full h_100"
                                                             src="{{asset('uploads/posts/'.$post->image)}}"
                                                             alt="">
                                                    </div>
                                                    @foreach($post->photos as $photo)
                                                        <div class="swiper-slide" data-val="1">
                                                            <img class="img-responsive img-full h_100"
                                                                 src="{{asset('uploads/posts/photos/'.$photo->name)}}"
                                                                 alt="">
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <div class="pagination hidden"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-list-text color-grey-3">{{$post['description_'.$lang]}}</div>
                                </div>

                                <div class="tags clearfix">
                                    <div class="tags-title color-dark-2">@lang('translate.blog_tag')</div>
                                    <ul class="clearfix">
                                        @foreach($post->tags as $tag)
                                            <li><a class="c-button b-30 b-1 bg-grey-2 hv-orange"
                                                   href="javascript:void(0)">{{$tag->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="additional-block">
                            <h4 class="additional-title">@lang('translate.blog_comments') <span
                                        class="color-dr-blue-2">{{$post->comments->count()}}</span></h4>
                            <ul class="comments-block">
                                @foreach($post->comments as $comment)
                                    <li class="comment-entry clearfix">
                                        <img class="commnent-img" src="{{asset('img/detail/comment_1.jpg')}}" alt="">
                                        <div class="comment-content clearfix">
                                            <div class="tour-info-line">
                                                <div class="tour-info">
                                                    <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                                    <span class="font-style-2 color-dark-2">{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                                </div>
                                                <div class="tour-info">
                                                    <img src="{{asset('img/people_icon_grey.png')}}" alt="">
                                                    <span class="font-style-2 color-dark-2">@lang('translate.blog_by') {{$comment->name}}</span>
                                                </div>
                                            </div>
                                            <div class="comment-text color-grey">
                                                {{ $comment->comment}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <form action="{{route('comment')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-block type-2 clearfix">
                                            <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                <input type="text" required placeholder="@lang('translate.your_name')"
                                                       name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-block type-2 clearfix">
                                            <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                                <input type="text" required placeholder="@lang('translate.your_email')"
                                                       name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">

                                        <div class="form-block type-2 clearfix">
                                        <textarea name="comment" class="area-style-1 type-2 color-3" required
                                                  placeholder="@lang('translate.your_comment')"></textarea>
                                        </div>
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <input type="submit" class="c-button b-40 fr bg-dr-blue-2 hv-dr-blue-2-o"
                                               value="@lang('translate.blog_submit')">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="right-sidebar">
                        <div class="sidebar-block type-2">
                            <div class="widget-search clearfix">
                                <form>
                                    <div class="input-style-1 b-50 brd-0 type-2 color-3">
                                        <input type="text" placeholder="@lang('translate.your_search')">
                                    </div>
                                    <input class="widget-submit" type="submit" value="">
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-block type-2">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.blog_categories')</h4>
                            <ul class="sidebar-category color-5">
                                <li class="active">
                                    <a href="javascript:void(0)" class="post-filter"
                                       data-id="all">@lang('translate.blog_all_categories')
                                        <span
                                                class="fr">{{$posts->count()}}</span></a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="javascript:void(0)" class="post-filter"
                                           data-id="{{$category->id}}">{{$category['name_'.$lang]}}
                                            <span class="fr">{{$category->posts->count()}}</span></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="sidebar-block type-2">
                            <h4 class="sidebar-title color-dark-2">@lang('translate.blog_tags')</h4>
                            <ul class="widget-tags clearfix">
                                @foreach($tags as $tag)
                                    <li>
                                        <a class="c-button b-30 b-1 bg-grey-2 hv-orange tag-filter"
                                           href="javascript:void(0)" data-id="{{$tag->id}}">{{$tag->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/pages/post.js')}}"></script>
@stop
