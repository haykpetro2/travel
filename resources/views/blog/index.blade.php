@extends('layouts.header-footer')
@section('content')
    <div class="inner-banner style-5">
        <img class="center-image" src="{{asset('uploads/backgrounds/'.$background->image)}}" alt="">
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
                        @foreach($posts as  $post)
                            <div class="blog-list-entry">
                                <div class="blog-list-top">
                                    <img class="img-responsive" style="width: 100%"
                                         src="{{asset('uploads/posts/'.$post->image)}}" alt="">
                                </div>
                                <h4 class="blog-list-title"><a class="color-dark-2 link-dr-blue-2"
                                                               href="#">{{$post['title_'.$lang]}}</a></h4>
                                <div class="tour-info-line clearfix">
                                    <div class="tour-info fl">
                                        <img src="{{asset('img/calendar_icon_grey.png')}}" alt="">
                                        <span class="font-style-2 color-dark-2">{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</span>
                                    </div>

                                    <div class="tour-info fl">
                                        <img src="{{asset('img/comment_icon_grey.png')}}" alt="">
                                        <span class="font-style-2 color-dark-2">{{$post->comments->count()}} @lang('translate.blog_comments')</span>
                                    </div>
                                </div>
                                <div class="blog-list-text color-grey-3">{{$post['short_description_'.$lang]}}</div>
                                <a href="{{route('post.detail',$post->id)}}"
                                   class="c-button small bg-dr-blue-2 hv-dr-blue-2-o"><span>@lang('translate.blog_more')</span></a>
                            </div>
                        @endforeach
                        <div class="c_pagination clearfix">
                            {{$posts->links()}}
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
@endsection
