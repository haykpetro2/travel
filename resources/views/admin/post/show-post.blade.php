@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-iconfall">
                        <li class="nav-item">
                            <a class="nav-link active show" id="homeIcon3-tab1" data-toggle="tab" href="#homeIcon31"
                               aria-controls="homeIcon31" role="tab" aria-selected="true"><i
                                        class="fa fa-newspaper-o"></i> Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profileIcon3-tab1" data-toggle="tab" href="#profileIcon31"
                               aria-controls="profileIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-comment"></i>
                                Comments</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <table class="table table-striped table-bordered sourced-data">
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if($post->status)
                                            Publish
                                        @else
                                            UnPublish
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{$post->category->name_en}}</td>
                                </tr>
                                <tr>
                                    <td>Title Ru</td>
                                    <td>{{$post->title_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Title En</td>
                                    <td>{{$post->title_en}}</td>
                                </tr>
                                <tr>
                                    <td>Cover Image</td>
                                    <td>
                                        <a href="{{asset('uploads/posts/'.$post->image)}}">
                                            <img src="{{asset('uploads/posts/'.$post->image)}}" alt="" width="100">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Short Description Ru</td>
                                    <td>{{$post->short_description_ru}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description En</td>
                                    <td>{{$post->short_description_en}}</td>
                                </tr>

                                <tr>
                                    <td>Description Ru:</td>
                                    <td>{!! $post->description_ru !!}</td>
                                </tr>
                                <tr>
                                    <td>Description En:</td>
                                    <td>{!! $post->description_en !!}</td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td>
                                        @foreach($post->photos as $photo)
                                            <a href="{{asset('uploads/posts/photos/'.$photo->name)}}"
                                               style="margin-left: 10px">
                                                <img src="{{asset('uploads/posts/photos/'.$photo->name)}}" alt=""
                                                     width="80">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tags</td>
                                    <td>
                                        @foreach($post->tags as $tags)
                                            <span>{{$tags->tag->name}}</span><br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Action</td>
                                    <td>
                                        <a href="{{route('post.edit',$post->id)}}"><i class="ft-edit"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Publish</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>
                                            {{$comment->name}}
                                        </td>
                                        <td>
                                            {{$comment->email}}
                                        </td>
                                        <td>{{$comment->comment}}</td>
                                        <td>
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" class="custom-control-input pub"
                                                       id="yes-{{$comment->id}}" data-id="{{$comment->id}}"
                                                       value="1" {{($comment->status == 1) ? 'checked' : ''}}>
                                                <label class="custom-control-label"
                                                       for="yes-{{$comment->id}}">Yes</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" class="custom-control-input pub"
                                                       id="no-{{$comment->id}}" data-id="{{$comment->id}}"
                                                       value="0" {{($comment->status == 0) ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="no-{{$comment->id}}">No</label>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
