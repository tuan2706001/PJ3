@extends('layouts.app')
@section('content')	
	<div class="card">
        <form method="post" action="{{ route('booktype.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm thể loại sách
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên thể loại</label>
                    <input type="text" placeholder="Nhập tên thể loại" class="form-control" name="name">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
        </form>
    </div>
@endsection 