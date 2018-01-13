@if (Auth::check())
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('backpack::base.administration') }}</li>
            <!-- ================================================ -->
            <!-- ==== Recommended place for admin menu items ==== -->
            <!-- ================================================ -->
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

            <!-- ======================================= -->
            <li class="header">Content</li>
            <li><a href="{{ route('crud.content.index') }}"><i class="fa fa-tag"></i> <span>Videos</span></a></li>
            <li><a href="{{ route('crud.lesson.index') }}"><i class="fa fa-tag"></i> <span>Lessons</span></a></li>
            <li><a href="{{ route('crud.subject.index') }}"><i class="fa fa-tag"></i> <span>Subjects</span></a></li>
            <li><a href="{{ route('crud.grade.index') }}"><i class="fa fa-tag"></i> <span>Grades</span></a></li>
            <li><a href="{{ route('crud.stage.index') }}"><i class="fa fa-tag"></i> <span>Stages</span></a></li>

            <!-- ======================================= -->
            <li class="header">{{ trans('backpack::base.user') }}</li>
            <!-- Users, Roles Permissions -->
            <li><a href="{{ route('crud.user.index') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li><a href="{{ route('crud.role.index') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
            <li><a href="{{ route('crud.permission.index') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
            <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}">
                    <i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span>
                </a>
            </li>
            <li class="header">Settings</li>

            <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/backup') }}">
                    <i class="fa fa-hdd-o"></i>
                    <span>Backups</span>
                </a>
            </li>

            <li>
                <a href="{{ url(config('backpack.base.route_prefix').'/page') }}">
                    <i class="fa fa-file-o"></i> 
                    <span>Pages</span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endif
