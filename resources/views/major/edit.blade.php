@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('major.update', $major->ma_id)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa ngành học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Sửa ngành</label>
                    <input type="text" name="name" class="form-control" value="{{ $major->ma_name}}">
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