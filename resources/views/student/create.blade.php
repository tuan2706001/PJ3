@extends('layouts.app')
@section('content')
<style>
    
</style>
    <div class="card">
        <form method="post" action="{{ route('student.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm sinh viên
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên sinh viên</label>
                    <input type="text" name="name" class="form-control" required autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="passWord" class="form-control" id="myInput" required autofocus="autofocus">
                    
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" required autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label>Chọn lớp học</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Lớp" data-size="7" name="cl_id">
                        @foreach ($class as $classes)
                            <option value="{{$classes->cl_id}}">{{$classes->cl_name}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
               
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
	    </form>
	</div>
@endsection