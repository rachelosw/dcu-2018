
<!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        Dashboard</a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    
                    <li>
                        <a class="profile-pic" href="#"> <b class="hidden-xs">{{ Auth::user()->name }}</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="{{ route('admin.home') }}" class="waves-effect"><i class="fas fa-home" aria-hidden="true"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users')}}" class="waves-effect"><i class="fas fa-users" aria-hidden="true"></i> Pendaftar</a>
                    </li>
                    
                    <li>
                        <a href="{{ route('admin.seminars') }}" class="waves-effect"><i class="fas fa-bullhorn" aria-hidden="true"></i> Seminar</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.seminarCategories') }}" class="waves-effect"><i class="fas fa-bullhorn" aria-hidden="true"></i> Kategori Seminar</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.getPackages') }}" class="waves-effect"><i class="fas fa-bullhorn" aria-hidden="true"></i> Paket Seminar</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settingsPage') }}" class="waves-effect"><i class="fas fa-cogs"></i> Settings</a>
                    <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                                        
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                    </li>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

                </ul>
                
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->