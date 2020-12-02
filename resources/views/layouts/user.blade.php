<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 10:29:25 GMT -->
<head>
    <meta charset="utf-8" />
    <title> {{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/theme.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">
    <div class="header-border"></div>
    <header id="page-topbar">
        <div class="navbar-header">

            <div class="d-flex align-items-left">
                <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>

            <div class="d-flex align-items-center">



                <div class="dropdown d-inline-block ml-2">
                    <button type="button" class="btn header-item waves-effect"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                            <img class="rounded-circle header-profile-user" src="{{asset(Auth::user()->profile_image)}}" alt="{{Auth::user()->name}}">
                        @else
                            <img class="rounded-circle header-profile-user" src="https://images-na.ssl-images-amazon.com/images/I/51e6kpkyuIL._AC_SX466_.jpg" alt="{{Auth::user()->name}}">
                        @endif
                        <span class="d-none d-sm-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="{{route('user.profile')}}">
                            Profile
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="{{route('user.change.password')}}">
                            <span>Change Password</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span>Log Out</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <div class="navbar-brand-box">
                <a href="index.html" class="logo">

                    <span>
                               <img src="{{asset($gn->logo)}}" style="height: 61px;width: 100%">
                            </span>
                </a>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('home')}}" class="waves-effect"><i class="mdi mdi-home-analytics"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li>
                        <a href="{{route('my.orders')}}" class="waves-effect"><i class="mdi mdi-home-analytics"></i>
                            <span>My Orders</span></a>
                    </li>
                    <li>
                        <a href="{{route('user.profile')}}" class="waves-effect"><i class="mdi mdi-home-analytics"></i>
                            <span>Profile</span></a>
                    </li>

                    <li>
                        <a href="{{route('user.change.password')}}" class="waves-effect"><i class="mdi mdi-home-analytics"></i>
                            <span>Change Password</span></a>
                    </li>



                    <li>
                        <a  class="waves-effect" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="mdi mdi-home-analytics"></i>
                            <span>Logout</span></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('user')
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        {{$date}} © {{$gn->site_name}}.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Develop by <a href="">SR TUSHER</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Overlay-->
<div class="menu-overlay"></div>


<!-- jQuery  -->
<script src="{{asset('assets/admin/')}}/js/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/metismenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/waves.js"></script>
<script src="{{asset('assets/admin/')}}/js/simplebar.min.js"></script>


<!-- Sparkline Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Chart Custom Js-->
<script src="{{asset('assets/admin/')}}/pages/knob-chart-demo.js"></script>


<!-- Morris Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/morris-js/morris.min.js"></script>

<!-- Raphael Js-->
<script src="http://myrathemes.com/xeloro/layouts/plugins/raphael/raphael.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('assets/admin/')}}/pages/dashboard-demo.js"></script>

<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/theme.js"></script>

@yield('js')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')


</body>


<!-- Mirrored from myrathemes.com/xeloro/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Aug 2020 10:30:38 GMT -->
</html>
