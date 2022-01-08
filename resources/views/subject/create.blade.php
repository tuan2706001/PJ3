@extends('layouts.app')
@section('content')	
	<div class="card">
        <form method="post" action="{{ route('subject.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm môn học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên môn học</label>
                    <input type="text" placeholder="Nhập tên môn học" class="form-control" name="name">
                    <label>Thời lượng môn</label>
                    <input type="text" placeholder="Nhập thời lượng môn học" class="form-control" name="duration">
                </div>
                
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
        </form>
    </div>
@endsection 