<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel | Magical Umbrella</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/newstyle.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

    @yield('css')
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">


    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="ml-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown nav-user">
                    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img width="25" height="25"
                            src="https://e7.pngegg.com/pngimages/799/987/png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper-thumbnail.png"
                            alt="" class="user-avatar-md rounded-circle"></a>
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">
                        <div class="nav-user-info">
                            <h5 class="mb-0 text-light">{{ auth()->user()->name }}</h5>
                            <span class="status"></span><span
                                class="ml-2">{{ auth()->user()->user_type }}</span>
                        </div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i
                                class="mr-2 fas fa-power-off"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image "
                    style="opacity: .8;margin-left:0">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                    <div class="image">
                        <img src="https://e7.pngegg.com/pngimages/799/987/png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper-thumbnail.png"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-columns"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.service.index') }}"
                                class="nav-link {{ request()->routeIs('admin.service.index') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-columns"></i>
                                <p>Services</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('slider.index') }}"
                                class="nav-link {{ request()->routeIs('slider.index') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-window-maximize"></i>
                                <p>Slider Image</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}">
                                <i class="mx-1 fa fa-cube"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('course.index') }}"
                                class="nav-link {{ request()->routeIs('course.index') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-book"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.experience.index') }}"
                                class="nav-link {{ request()->routeIs('admin.experience.index') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-book"></i>
                                <p>Careers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('policy.index') }}"
                                class="nav-link {{ request()->routeIs('policy.index') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-book-open"></i>
                                <p>Terms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('faq.index') }}"
                                class="nav-link {{ request()->routeIs('faq.index') ? 'active' : '' }}">
                                <i class="mx-1 fas fa-info-circle"></i>
                                <p>Faqs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('certificate.index') }}"
                                class="nav-link {{ request()->routeIs('certificate.index') ? 'active' : '' }}">
                                <i class="fas fa-globe"></i>
                                <p>Certificate</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('referral.index') }}"
                                class="nav-link {{ request()->routeIs('referral.index') ? 'active' : '' }}">
                                <i class="fas fa-globe"></i>
                                <p>Referral Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('placement.index') }}"
                                class="nav-link {{ request()->routeIs('placement.index') ? 'active' : '' }}">
                                <i class="fas fa-paper-plane"></i>
                                <p>Placement Details</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('welcome') }}" class="nav-link">
                                <i class="mx-1 fas fa-chevron-left"></i>
                                <p>Go Back</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    @yield('scripts')
    @livewireScripts
</body>

</html>
