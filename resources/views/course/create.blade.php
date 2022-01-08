@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('course.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm khóa
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Thêm khóa</label>
                    <input type="text" name="co_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Chọn ngành học</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Ngành" data-size="7" name="ma_id">
                        @foreach ($major as $majors)
                            <option value="{{$majors->ma_id}}">{{$majors->ma_name}}</option>                                   
                        @endforeach                       
                    </select>
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