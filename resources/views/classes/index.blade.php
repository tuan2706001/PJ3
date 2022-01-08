@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh sách các lớp</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
            <div class="text-right">
                <a href="{{ route('classes.create') }}" class="btn btn-success btn-fill btn-wd">Thêm lớp</a>
            </div>                          
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>STT</th>
                    <th>Tên Lớp</th>
                    <th>Hành động</th>
                    
                    
                </thead>
                <tbody>
                    @php
                         $index = 0;
                    @endphp
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{$index+=1}}</td> 
                            <td>{{$class->cl_name}}</td> 
                            <td><a rel="tooltip" data-original-title="Sửa"class="btn btn-warning ti-pencil-alt" href="{{ route('classes.edit',$class->cl_id) }}"></a>
                                
                            </td>
                            
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">
                {{ $classes->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection