@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('ministry.update', $ministry->mi_id)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa thông tin giáo vụ
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên giáo vụ</label>
                    <input type="text" name="name" class="form-control" value="{{$ministry->mi_name}}" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{$ministry->mi_userName}}">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="passWord" class="form-control" value="{{$ministry->mi_passWord}}" id="myInput">
                    
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{$ministry->mi_phone}}">
                </div>
                <div class="form-group">
                    <label>Quyền</label>
                        <div class="radio">
							<input type="radio" name="role" value="0" <?= $ministry->mi_permission == 0 ? "checked" : "" ?>>
							<label>Quản lý</label>
						</div>
                        <div class="radio">
							<input type="radio" name="role" value="1" <?= $ministry->mi_permission == 1 ? "checked" : "" ?>>
							<label>Giáo vụ</label>
                        </div>
                </div>
                <div class="form-group">
                    <label>Khóa</label>
                        <div class="radio">
							<input type="radio" name="block" value="0"  <?= $ministry->mi_status == 0 ? "checked" : "" ?>>
							<label>Hoạt động</label>
						</div>
                        <div class="radio">
							<input type="radio" name="block" value="1" <?= $ministry->mi_status == 1 ? "checked" : "" ?>>
							<label>Khóa</label>
                        </div>
                </div>
                <button type="submit" class="btn btn-fill btn-info">Cập nhật</button>
            </div>
	    </form>
	</div>
    
@endsection