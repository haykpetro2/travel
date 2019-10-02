@extends('admin.layouts.header-footer')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/selects/select2.min.css')}}">
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('post.update',$post->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_ru">Title Ru</label>
                                        <input type="text" id="title_ru" class="form-control" name="title_ru"
                                               value="{{$post->title_ru}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">Title En</label>
                                        <input type="text" id="title_en" class="form-control" name="title_en"
                                               value="{{$post->title_en}}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <div class="input-group">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" name="status" class="custom-control-input" id="yes"
                                                   value="1" {{($post->status == 1) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="yes">Publish</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio">
                                            <input type="radio" name="status" class="custom-control-input" id="no"
                                                   value="0" {{($post->status == 0) ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="no">UnPublish</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="country">Select Category</label>
                                    <select class="form-control select2" id="country" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{($category->id == $post->category->id) ? 'selected' : ''}}>{{$category->name_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="tags">Select Tags</label>

                                    <select id="tags" name="tags[]" class="select2 form-control" multiple>

                                        @foreach($post->tags as $tag)
                                            {{$data[] = $tag->tag->id}}
                                        @endforeach

                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}" {{(isset($data) && in_array($tag->id,$data)) ? 'selected' : ''}}>{{$tag->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="short_description_ru">Short Description Ru</label>
                                    <textarea id="short_description_ru" rows="5" class="form-control"
                                              name="short_description_ru">{{$post->short_description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="short_description_en">Short Description En</label>
                                    <textarea id="short_description_en" rows="5" class="form-control"
                                              name="short_description_en">{{$post->short_description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="description_ru">Description Ru</label>
                                    <textarea id="description_ru" rows="5" class="form-control editor"
                                              name="description_ru">{{$post->description_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description_en">Description En</label>
                                    <textarea id="description_en" rows="5" class="form-control editor"
                                              name="description_en">{{$post->description_en}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-4">
                                    <label for="image">Cover Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </fieldset>
                                <a href="{{asset('uploads/posts/'.$post->image)}}">
                                    <img src="{{asset('uploads/posts/'.$post->image)}}" alt="" width="100">
                                </a>
                            </div>
                            <div class="row">
                                <fieldset class="form-group col-md-4">
                                    <label for="photos">Images</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="photos"
                                               name="photos[]" multiple>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose files</label>
                                    </div>
                                </fieldset>
                                @foreach($post->photos as $photo)
                                    <figure class="effect-zoe" id="photo-{{$photo->id}}">
                                        <img src="{{asset('uploads/posts/photos/'.$photo->name)}}" alt="img25"
                                             height="80">
                                        <figcaption>
                                            <p class="icon-links">
                                                <a href="javascript:void(0);" class="mr-1 photo-delete"
                                                   data-id="{{$photo->id}}"><i
                                                            class="ft-trash"></i></a>
                                            </p>
                                        </figcaption>
                                    </figure>
                                @endforeach
                            </div>
                            <div class="form-actions">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <button type="reset" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/post.js')}}"></script>
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>
@endsection

