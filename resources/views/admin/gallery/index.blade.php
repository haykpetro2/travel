@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Gallery</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <fieldset class="form-group col-md-6">
                                <label for="basicInputFile">New Images</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photos" name="photos[]" multiple>
                                    <label class="custom-file-label" for="photos">Choose files</label>
                                </div>
                            </fieldset>
                            <div class="form-group col-md-3 mt-1 pt-1">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title En</th>
                            <th>Title Ru</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($galleries as $gallery)
                            <tr>
                                <td>
                                    <a href="{{asset('uploads/gallery/'.$gallery->name)}}" target="_blank">
                                        <img src="{{asset('uploads/gallery/'.$gallery->name)}}" alt="" width="200">
                                    </a>
                                </td>
                                <td>
                                    <label for="title-en-{{$gallery->id}}"></label>
                                    <input type="text" class="form-control" id="title-en-{{$gallery->id}}"
                                           value="{{$gallery->title_en}}"/>
                                </td>
                                <td>
                                    <label for="title-ru-{{$gallery->id}}"></label>
                                    <input type="text" class="form-control" id="title-ru-{{$gallery->id}}"
                                           value="{{$gallery->title_ru}}"/>
                                </td>
                                <td>
                                    <i class="ft-upload-cloud gallery-update" data-id="{{$gallery->id}}"></i>
                                    <i class="ft-trash gallery-delete" data-id="{{$gallery->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$galleries->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $('.gallery-update').on('click', function () {
                var id = $(this).data('id');
                var title_en = $('#title-en-' + id).val();
                var title_ru = $('#title-ru-' + id).val();

                $.ajax({
                    url: "gallery/" + id,
                    type: "post",
                    data: {_method: 'PUT', title_en: title_en, title_ru: title_ru},
                    success: function () {
                        location.reload();
                    }
                });
            });

            $('.gallery-delete').on('click', function () {
                $.ajax({
                    url: "gallery/" + $(this).data('id'),
                    type: "post",
                    data: {_method: 'delete'},
                    success: function () {
                        location.reload();
                    }
                });
            });

        });
    </script>
@endsection