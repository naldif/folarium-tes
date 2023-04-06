<!doctype html>
<html lang="en">

<head>

    @stack('before-style')

    @include('includes.dashboard.style')

    @stack('after-style')
    <!-- Title -->
    <title>Hacbu - Handyman Services HTML Template</title>

</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            @include('includes.dashboard.topbar')
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            @include('includes.dashboard.sidebar')
        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('content')
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                @include('includes.dashboard.footer')
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    {{-- @stack('before-script') --}}
    
    @include('includes.dashboard.script')

    {{-- @stack('after-script') --}}

    {{-- {{ $script ?? '' }} --}}
    
    
</body>

</html>