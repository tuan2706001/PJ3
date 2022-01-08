@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('student.update', $student->stu_id)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa thông tin học sinh
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên học sinh</label>
                    <input type="text" name="name" class="form-control" value="{{$student->stu_name}}" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{$student->stu_userName}}">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="passWord" class="form-control" value="{{$student->stu_passWord}}" id="myInput">
                    
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{$student->stu_phone}}">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                        <div class="radio">
							<input type="radio" name="block" value="0"  <?= $student->status == 0 ? "checked" : "" ?>>
							<label>Hoạt động</label>
						</div>
                        <div class="radio">
							<input type="radio" name="block" value="1" <?= $student->status == 1 ? "checked" : "" ?>>
							<label>Khóa</label>
                        </div>
                </div>
                <div class="form-group">
                    <label>Chọn lớp học</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Lớp" data-size="7" name="cl_id">
                        @foreach ($students as $studentpro)
                                
                            <option value="{{$studentpro->cl_id}}">{{$studentpro->cl_name}}</option>                          
                        @endforeach                       
                    </select>
                </div>
                <button type="submit" class="btn btn-fill btn-info">Cập nhật</button>
            </div>
	    </form>
	</div>
    
@endsection