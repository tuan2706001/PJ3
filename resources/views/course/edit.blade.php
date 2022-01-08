@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('course.update', $course->co_id, $course->ma_id)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa khóa học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Sửa khóa</label>
                    <input type="text" name="name" class="form-control" value="{{ $course->co_name}}">
                </div>
                <div class="form-group">
                    <label>Chọn ngành học</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Ngành" data-size="7" name="ma_id">
                        @foreach ($major as $majors)
                            <option value="{{$majors->ma_id}}">{{$majors->ma_name}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                <div class="card-footer text-center">                                       
                    @if (Session::exists('error'))
                        <div class="alert alert-warning">
                            {{ Session::get('error.message')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-fill btn-info">Sửa</button> 
                </div>
                
            </div>
	    </form>
	</div>
@endsection