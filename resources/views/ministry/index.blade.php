@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh sách các giáo vụ</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
            <div class="text-right">
                <a href="{{ route('ministry.create') }}" class="btn btn-success btn-fill btn-wd">Thêm giáo vụ</a>
            </div>                          
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>STT</th>
                    <th>Tên giáo vụ</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Quyền</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody>
                    @php
                         $index = 0;
                    @endphp
                    @foreach ($ministry as $ministries)
                        <tr>
                            <td>{{$index+=1}}</td> 
                            <td>{{$ministries->mi_name}}</td> 
                            <td>{{$ministries->mi_userName}}</td>
                            <td>{{$ministries->mi_phone}}</td>
                            <td>
                              @if ($ministries->mi_permission == 0)Quản lý
                             
                                @else
                               Giáo vụ
                               
                              @endif
                            </td>
                            <td>
                               @if ($ministries->mi_status == 0)Hoạt động
                                   
                               @else
                                   Khóa
                               @endif
                               
                            </td>
                                
                            <td>
                                @if ($ministries->mi_permission == 1)
                                <a rel="tooltip" data-original-title="Sửa"class="btn btn-warning ti-pencil-alt" href="{{ route('ministry.edit',$ministries->mi_id) }}"></a>
                                @else
                                  <a></a>  
                                @endif
                            </td>
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">
                {{ $ministry->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection