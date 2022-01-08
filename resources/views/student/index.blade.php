@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh sách Sinh Viên</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
            <div class="text-right">
                <a href="{{ route('student.create') }}" class="btn btn-success btn-fill btn-wd">Thêm sinh viên</a>
            </div>                          
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>STT</th>
                    <th>Tên sinh viên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </thead>
                <tbody>
                    @php
                         $index = 0;
                    @endphp
                    @foreach ($student as $students)
                        <tr>
                            <td>{{$index+=1}}</td> 
                            <td>{{$students->stu_name}}</td> 
                            <td>{{$students->stu_userName}}</td>
                            <td>{{$students->stu_phone}}</td>
                            
                            <td>
                               @if ($students->status == 0)Hoạt động
                                   
                               @else
                                   Khóa
                               @endif
                               
                            </td>
                                
                            <td>
                                <a rel="tooltip" data-original-title="Sửa"class="btn btn-warning ti-pencil-alt" href="{{ route('student.edit',$students->stu_id) }}"></a>
                            </td>
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">
                {{ $student->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection