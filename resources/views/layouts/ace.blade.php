<!DOCTYPE html>
<html lang="es">
    <head>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta charset="utf-8"/>
        <meta content="width=device-width, height=device-height, initial-scale=1" name="viewport"/>
          <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            {{$title ?? ''}}

          
        </title>

        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/select2.min.css')}}" rel="stylesheet"/>
        @yield('linksAfterAce')
        <link href="{{ asset('assets/css/ace.min.css')}}" rel="stylesheet" type="text/css"/>
        <style type="text/css">
            .content-bg1 {
                background-color: #f5f7fa; 
                }
                .content-bg1 .nav.has-active-arrow .nav-item.active>.nav-link::after {
                border-right-color: #f5f7fa; 
                }
        </style>
        {{--
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet" type="text/css">
            --}}
            <link href="{{ asset('assets/logo - copia.png')}}" rel="icon" type="image/x-icon"/>
            @yield('head')
        </link>
    </head>
    <style>
        .navbar-mediumseagreen {
            background-color: #0e89f3;
        }

        .sidebar-gradient2 {
            background-color: #2c333d;
            background-image: linear-gradient(#2c333d,#2c333d);
        }
    </style>

<body class="" onload="" style="">
    <div class="body-container" id="app">
        
        <nav class="navbar navbar-expand-lg navbar-fixed navbar-mediumseagreen">
            <div class="navbar-inner">
                <div class="navbar-intro justify-content-xl-between">
                    @yield('logo')
                </div>
                <!-- /.navbar-intro -->
                <div class="navbar-content">
                    @yield('navbar-content')
                </div>
                <!-- .navbar-content -->
                <!-- mobile #navbarMenu toggler button -->
                <button aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu" class="navbar-toggler ml-1 mr-2 px-1" data-target="#navbarMenu" data-toggle="collapse" type="button">
                    <span class="pos-rel">
                        <img alt="Jason's Photo" class="border-2 brc-white-tp1 radius-round" src="{{ url(Storage::url('sistem/photos/'.Auth::user()->persona->foto))}}" width="36">
                            <span class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-1px mt-1px">
                            </span>
                        </img>
                    </span>
                </button>
                <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
                    @yield('navbar-menu')
                </div>
                <!-- /.navbar-menu.navbar-collapse -->
            </div>
            <!-- /.navbar-inner -->
        </nav>
        <div class="main-container {{ $bg_body ?? '' }} ">
            @yield('sidebar')
            <!-- /#sidebar -->
            <div class="main-content" role="main">
                <div class="d-none content-nav mb-1 bgc-grey-l4">
                    <div class="d-flex justify-content-between align-items-center">
                        <ol class="breadcrumb pl-2">
                            <li class="breadcrumb-item active text-grey">
                                <i class="fa fa-home text-dark-m3 mr-1">
                                </i>
                                <a class="text-blue" href="#">
                                    Home
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-grey-d1">
                                Gallery
                            </li>
                        </ol>
                        <div class="nav-search">
                            <form class="form-search">
                                <span class="d-inline-flex align-items-center">
                                    <input autocomplete="off" class="form-control pr-4 form-control-sm radius-1 brc-info-m2 text-grey" placeholder="Search ..." type="text">
                                        <i class="fa fa-search text-info-m1 ml-n4">
                                        </i>
                                    </input>
                                </span>
                            </form>
                        </div>
                        <!-- /.nav-search -->
                    </div>
                </div>
                <!-- breadcrumbs -->
                <div class="page-content container">
                    <div class="page-header">
                        @yield('page-name')
                        <div class="page-tools">
                        </div>
                    </div>
                    {{--
                    <div class="container">
                        --}}
                                    @yield('content')
                                     {{--
                    </div>
                    --}}
                </div>
                <!-- /.page-content -->
                <footer class="footer d-none d-sm-block">
                    @yield('footer')
                </footer>
                <!-- footer toolbox for mobile view -->
                {{--
                <footer class="d-sm-none footer footer-sm footer-fixed">
                    <div class="footer-inner">
                        <div class="btn-group d-flex h-100 mx-2 border-x-1 border-t-2 brc-primary-m3 bgc-default-l4 radius-t-1 shadow">
                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0">
                                <i class="fas fa-sliders-h text-blue-m1 text-120">
                                </i>
                            </button>
                            <button class="btn btn-outline-purple btn-h-lighter-purple btn-a-lighter-purple border-0">
                                <i class="fa fa-plus-circle text-purple-m2 text-120">
                                </i>
                            </button>
                            <button aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navbar search" class="btn btn-outline-warning btn-h-lighter-warning btn-a-lighter-warning border-0" data-target="#navbarSearch" data-toggle="collapse">
                                <i class="fa fa-search text-warning text-120">
                                </i>
                            </button>
                            <button class="btn btn-outline-brown btn-h-lighter-brown btn-a-lighter-brown border-0 mr-0">
                                <i class="fa fa-bell text-brown-m1 text-120">
                                </i>
                            </button>
                        </div>
                    </div>
                </footer>
                --}}
            </div>
            <!-- /main -->
            @yield('page-settings')
            <!-- .modal-aside -->
        </div>
        <!-- /.main-container -->
    </div>
    <div class="scroll-btn-observe">
    </div>
    <!-- include common vendor scripts used in demo pages -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/popper.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/select2.min.js')}}">
    </script>
    <script src="{{ asset('assets/js/bootbox/bootbox.all.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/ace.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/sweetalert2.all.min.js')}}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/jquery.validate.min.1.19.1.js')}}">
    </script>
    <script src="{{ asset('assets/js/functions.js')}}">
    </script>
  
    <!-- this is only for Ace's demo and you don't need it -->
    <!-- "Gallery" page script to enable its demo functionality -->
    @yield('script')
    <!-- /.body-container -->
</body>
</html>