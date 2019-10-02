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

