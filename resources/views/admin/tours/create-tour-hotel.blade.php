@extends('admin.layouts.header-footer')
@section('content')
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="row">Rows</label>
                            <input type="number" id="row" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="column">Columns</label>
                            <input type="number" id="column" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <input type="hidden" id="tour_id" value="{{$id}}">
                            <label for="create">&nbsp;</label>
                            <input type="button" class="btn btn-dark form-control" id="create" value="Create">
                        </div>
                    </div>
                    <div class="row" id="table">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/js/pages/tour-hotel.js')}}"></script>
@endsection
