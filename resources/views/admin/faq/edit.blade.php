@extends('admin.layouts.header-footer')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <form class="form" action="{{route('faq.update',$faq->id)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="question_ru">Question Ru</label>
                                    <textarea id="question_ru" rows="5" class="form-control editor"
                                              name="question_ru">{{$faq->question_ru}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="answer_ru">Answer Ru</label>
                                    <textarea id="answer_ru" rows="5" class="form-control editor"
                                              name="answer_ru">{{$faq->answer_ru}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="question_en">Question En</label>
                                    <textarea id="question_en" rows="5" class="form-control editor"
                                              name="question_en">{{$faq->question_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="answer_en">Answer En</label>
                                    <textarea id="answer_en" rows="5" class="form-control editor"
                                              name="answer_en">{{$faq->answer_en}}</textarea>
                                </div>
                            </div>
                            <div class="form-actions">

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
