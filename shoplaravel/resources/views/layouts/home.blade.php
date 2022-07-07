<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="dark-sidenav">
<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="#" class="logo">
                    <span>
                        <img src="/assets/images/logo-sm.png" alt="logo-small" class="logo-sm">
                    </span>
            <span>
                        <img src="/assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="/assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">
                    </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        @include("layouts.menu")
    </div>
</div>
<!-- end left-sidenav-->


<div class="page-wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        @include("layouts.topbar")
    </div>

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            @yield('content')
        </div>

        <footer class="footer text-center text-sm-left">
            &copy; 2022 Dastyle <span class="d-none d-sm-inline-block float-right">Crafted with <i
                    class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
        </footer><!--end footer-->
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
@include('layouts.footer')
</body>

</html>
