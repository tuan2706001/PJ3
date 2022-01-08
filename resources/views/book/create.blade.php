@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('book.store')}}" enctype="multipart/form-data">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm sách
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên sách</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ảnh sách</label>
                    <input type="file" name="img" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label>Chọn thể loại sách</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Thể loại" data-size="7" name="bt_id">
                        @foreach ($booktype as $booktypes)
                            <option value="{{$booktypes->bt_id}}">{{$booktypes->bt_name}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label>Chọn môn học</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Môn học" data-size="7" name="sub_id">
                        @foreach ($subject as $subjects)
                            <option value="{{$subjects->sub_id}}">{{$subjects->sub_name}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                     <label>Số lượng</label>
                    <input type="text" name="remain" class="form-control">
                </div>
            </div>
            
                <div>
                <div class="card-footer text-center">                                       
                    @if (Session::exists('error'))
                        <div class="alert alert-warning">
                            {{ Session::get('error.message')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-fill btn-info">Thêm</button> 
                </div>
            </div>
	    </form>
	</div>
@endsection