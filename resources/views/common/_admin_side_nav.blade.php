<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('showDashboard')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Shaityoros</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('showDashboard')}}" class="d-block">{{optional(\Auth::guard('admin')->user())->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{url('dashboard')}}" class="nav-link @if($uril=='dashboard') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>

                </li>
                @if(\Auth::guard('admin')->user()->admin_role=='Super Admin')
                 <li class="nav-item">
                     <a href="{{url('createAdmin')}}" class="nav-link @if($uril=='createAdmin') active @endif">
                         <i class="fa fa-circle-o nav-icon"></i>
                         <p>Create Admin</p>
                      </a>
                 </li>
                @endif

                @if(\Auth::guard('admin')->user()->admin_role=='Super Admin')


                <li class="nav-item">
                    <a href="{{url('showUserList')}}" class="nav-link  @if($uril=='showUserList') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>User list</p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{url('postList')}}" class="nav-link @if($uril=='postList') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>User Post</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('manuscriptList')}}" class="nav-link @if($uril=='manuscriptList') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>User Manuscript</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('createMonthCategory')}}" class="nav-link @if($uril=='createMonthCategory') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Selected month</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('documentShow')}}" class="nav-link @if($uril=='documentShow') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Month wise Doc</p>
                    </a>
                </li>
                    <li class="nav-item">
                            <a href="{{url('createLeftAdds')}}" class="nav-link @if($uril=='createLeftAdds') active @endif">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Left Adds</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('createRightAdds')}}" class="nav-link @if($uril=='createRightAdds') active @endif">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Right Adds</p>
                            </a>
                        </li>

                @if(\Auth::guard('admin')->user()->admin_role=='Super Admin')

                    <li class="nav-item">
                    <a href="{{url('createFooter')}}" class="nav-link @if($uril=='createFooter') active @endif">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Fontend footer</p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>