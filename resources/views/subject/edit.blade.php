@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('subject.update', $subject->sub_id)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa môn học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Sửa môn học</label>
                    <input type="text" name="name" class="form-control" value="{{ $subject->sub_name}}">
                    <input type="text" name="duration" class="form-control" value="{{ $subject->duration}}">
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