<div class="sidebar" data-background-color="brown" data-active-color="danger">
	    @if (session()->get('mi_permission') == 0)
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            QL
        </a>

        <a href="#" class="simple-text logo-normal">
            Quản lý 
        </a>
    </div>
     @else
     <div class="logo">
        <a href="#" class="simple-text logo-mini">
            GV
        </a>

        <a href="#" class="simple-text logo-normal">
            Giáo Vụ 
        </a>
    </div>    
        @endif
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <div class="photo">
                    <img src="{{ asset ('assets') }}/img/Tún.png" />
                </div>

                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{Session::get('mi_name')}}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ route ('profile.index')}}">
                                <span class="sidebar-mini"></span>
                                <span class="sidebar-normal"><i class="fas fa-user-circle"></i>Xem thông tin cá nhân</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="#">
                    <i class="ti-bar-chart-alt"></i>
                    <p>Thống kê</p>
                </a>
            </li>
            @if (session()->get('mi_permission') == 0)
						<li>
							<a href="{{ route ('ministry.index')}}">
								<i class="ti-clipboard"></i>
								<p>Quản lý giáo vụ</p>                      
							</a>
						</li>
					@endif	
            <li>
                <a href="{{ route ('major.index')}}">
                    <i class="ti-calendar"></i>
                    <p>Quản lý nghành</p>
                </a>
            </li>
            <li>
                <a href="{{ route ('course.index')}}">
                    <i class="fas fa-save"></i>
                    <p>Quản lý Khóa</p>
                </a>
            </li>
            <li>
                <a href="{{ route ('subject.index')}}">
                    <i class="fas fa-clipboard"></i>
                    <p>Quản lý môn học</p>
                </a>
            </li>
            <li>
                <a href="{{ route ('classes.index')}}">
                    <i class="fas fa-clipboard-list"></i>
                    <p>Quản lý lớp</p>
                </a>
            </li>
            <li>
                <a href="{{ route ('student.index')}}">
                    <i class="fas fa-users"></i>
                    <p>Quản lý sinh viên</p>
                </a>
            </li>
            
                 <li>
                     <a href="{{ route ('book.index')}}">
                    <i class="fas fa-book"></i>
                    <p>Quản lý sách</p>
                     </a>
                    </li>
            <li>
                <a href="{{route ('logout')}}">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Đăng xuất</p>
                </a>
            </li>
        </ul>
    </div>
</div>