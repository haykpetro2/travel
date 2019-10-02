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
                                        class="fa fa-list-alt"></i>
                                Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutIcon31-tab1" data-toggle="tab" href="#aboutIcon31"
                               aria-controls="aboutIcon31" role="tab" aria-selected="false"><i
                                        class="fa fa-hashtag"></i>
                                Tags</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <div class="tab-pane active show" id="homeIcon31" aria-labelledby="homeIcon3-tab1" role="tab"
                             aria-selected="true">
                            <a href="{{route('post.create')}}" class="btn btn-dark mb-1">New</a>
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            @if($post->status)
                                                Publish
                                            @else
                                                UnPublish
                                            @endif
                                        </td>
                                        <td>{{$post->title_en}}</td>
                                        <td>{{$post->category->name_en}}</td>
                                        <td>{!! $post->short_description_en !!}</td>
                                        <td>
                                            <a href="{{asset('uploads/posts/'.$post->image)}}">
                                                <img src="{{asset('uploads/posts/'.$post->image)}}" alt="" width="100">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{route('post.show',$post->id)}}"><i class="ft-eye"></i></a>
                                            <a href="{{route('post.edit',$post->id)}}"><i class="ft-edit"></i></a>
                                            <i class="ft-trash post-delete" data-id="{{$post->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-9">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                    {{$posts->links()}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane in" id="profileIcon31" aria-labelledby="profileIcon3-tab1" role="tab"
                             aria-selected="false">

                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name Ru</th>
                                    <th>Name En</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" id="category_name_ru" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" id="category_name_en" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="mt-1 btn btn-dark category-create">New</button>
                                    </td>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><input type="text" id="category-name-ru-{{$category->id}}"
                                                   value="{{$category->name_ru}}"
                                                   class="form-control"></td>
                                        <td><input type="text" id="category-name-en-{{$category->id}}"
                                                   value="{{$category->name_en}}"
                                                   class="form-control"></td>
                                        <td>
                                            <i class="ft-edit category-update" data-id="{{$category->id}}"></i>
                                            <i class="ft-trash category-delete" data-id="{{$category->id}}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="aboutIcon31" aria-labelledby="aboutIcon31-tab1" role="tab"
                             aria-selected="false">
                            <table class="table table-striped table-bordered sourced-data">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <input type="text" id="tag_name" class="form-control">
                                    </td>
                                    <td>
                                        <button type="button" class="mt-1 btn btn-dark tag-create">New</button>
                                    </td>
                                </tr>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td><input type="text" id="tag-name-{{$tag->id}}" value="{{$tag->name}}"
                                                   class="form-control"></td>
                                        <td>
                                            <i class="ft-edit tag-update" data-id="{{$tag->id}}"></i>
                                            <i class="ft-trash tag-delete" data-id="{{$tag->id}}"></i>
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
@section('scripts')
    <script src="{{asset('admin/js/pages/post.js')}}"></script>
@endsection
