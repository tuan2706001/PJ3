@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh sách các ngành</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
            <div class="text-right">
                <a href="{{ route('major.create') }}" class="btn btn-success btn-fill btn-wd">Thêm ngành</a>
            </div>                          
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Hành động</th>
                    
                    
                </thead>
                <tbody>
                    @php
                         $index = 1;
                    @endphp
                    <tr>
                    @foreach ($majors as $major)
                        
                            <td>{{$index++}}</td> 
                            <td>{{$major->ma_name}}</td> 
                            <td><a rel="tooltip" data-original-title="Sửa"class="btn btn-warning ti-pencil-alt" href="{{ route('major.edit',['major' =>$major->ma_id]) }}"></a>
                                
                            </td>
                            
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">
                {{ $majors->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection