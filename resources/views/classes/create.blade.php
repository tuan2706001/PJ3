@extends('layouts.app')
@section('content')	
	<div class="card">
        <form method="post" action="{{ route('classes.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm lớp học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên lớp học</label>
                    <input type="text" placeholder="Nhập tên lớp" class="form-control" name="cl_name">
                </div>
                <div class="form-group">
                <label>Chọn khóa học</label>
                <select class="selectpicker" data-style="btn btn-danger btn-block" title="Khóa" data-size="7" name="co_id">
                    @foreach ($course as $courses)
                        <option value="{{$courses->co_id}}">{{$courses->co_name}}</option>                                   
                    @endforeach                       
                </select>
                </div>
            
           
            
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