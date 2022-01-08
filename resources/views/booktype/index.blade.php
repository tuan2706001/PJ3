@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Danh mục thể loại</h4><br> 
           <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
                        </div>
            </form> 
            <div class="text-right">
                <a href="{{ route('booktype.create') }}" class="btn btn-success btn-fill btn-wd">Thêm thể loại</a>
            </div>                          
        <div class="card-content table-responsive table-full-width">
            <table class="table table-striped">
                <thead>
                    <th>STT</th>
                    <th>Tên thể loại</th>
                    <th>Hành động</th>
                    
                    
                </thead>
                <tbody>
                    @php
                         $index = 1;
                    @endphp
                    <tr>
                    @foreach ($booktype as $booktypes)
                        
                            <td>{{$index++}}</td> 
                            <td>{{$booktypes->bt_name}}</td> 
                            <td><a rel="tooltip" data-original-title="Sửa"class="btn btn-warning ti-pencil-alt" href="{{ route('booktype.edit',['booktype' =>$booktypes->bt_id]) }}"></a>
                                
                            </td>
                            
                        </tr> 
                    @endforeach                                       
                </tbody>
            </table>
            <div class="text-center">
                {{ $booktype->appends(['search' => $search])->links() }}
            </div>
        </div>
    </div>
    @endsection