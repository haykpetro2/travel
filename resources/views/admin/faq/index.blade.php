@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">F.A.Q</h4>
            </div>
            <div class="card-content collpase show">
                <div class="card-body card-dashboard">
                    <a href="{{route('faq.create')}}" class="btn btn-dark mb-2"><i class="ft-plus"></i></a>
                    <table class="table table-striped table-bordered sourced-data">
                        <thead>
                        <tr>
                            <th>Question Ru</th>
                            <th>Answer Ru</th>
                            <th>Question En</th>
                            <th>Answer En</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>{!! $faq->question_ru !!}</td>
                                <td>{!! $faq->answer_ru !!}</td>
                                <td>{!! $faq->question_en !!}</td>
                                <td>{!! $faq->answer_en !!}</td>
                                <td>
                                    <a href="{{route('faq.show',$faq->id)}}"><i class="ft-eye"></i></a>
                                    <a href="{{route('faq.edit',$faq->id)}}"><i class="ft-edit"></i></a>
                                    <i class="ft-trash faq-delete" data-id="{{$faq->id}}"></i>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-9">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                            {{$faqs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/faq.js')}}"></script>
@endsection