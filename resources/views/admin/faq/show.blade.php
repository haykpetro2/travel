@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content collapse show">
                <div class="card-body">
                    <table class="table table-striped table-bordered sourced-data">
                        <tbody>
                        <tr>
                            <td>Question Ru:</td>
                            <td>{!! $faq->question_ru !!}</td>
                        </tr>
                        <tr>
                            <td>Answer Ru:</td>
                            <td>{!! $faq->answer_ru !!}</td>
                        </tr>
                        <tr>
                            <td>Question En:</td>
                            <td>{!! $faq->question_en !!}</td>
                        </tr>
                        <tr>
                            <td>Answer En:</td>
                            <td>{!! $faq->answer_en !!}</td>
                        </tr>
                        <tr>
                            <td>Action</td>
                            <td>
                                <a href="{{route('faq.edit',$faq->id)}}"><i class="ft-edit"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
