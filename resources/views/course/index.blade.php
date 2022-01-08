@extends('layouts.app')
@section('content')
	
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Danh sách các khóa</h4><br> 
               <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    				<span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    			</div>
	    		</form>
				<div class="text-right">
					<a href="{{ route('course.create') }}" class="btn btn-success btn-fill btn-wd">Thêm khóa</a>
				</div>                           
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>STT</th>
	                    <th>Khóa</th>
						<th>Thông tin</th>
						<th>Hành động</th>
						
	                </thead>
	                <tbody>
                        <?php
                                $index=0;
                            ?>
	                    @foreach ($courses as $course)
                            <tr>
                                <td>{{$index+=1}}</td> 
                                <td>K{{$course->co_name}}</td> 
								<td>BKACAD</td>
								<td><a rel="tooltip" data-original-title="Sửa" class="btn btn-warning ti-pencil-alt" href="{{ route('course.edit',$course->co_id) }}"></a>
									
								</td>
								
								
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				<div class="text-center">
					{{ $courses->appends(['search' => $search])->links() }}
				</div>
	        </div>
	    </div>
    
@endsection