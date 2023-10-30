<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta charset="utf-8"/>
        <meta content="width=device-width, height=device-height, initial-scale=1" name="viewport">
            <title>
                {{$title ?? ''}}
            </title>
            <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('assets/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css"/>
            <link href="{{ asset('assets/css/select2.min.css')}}" rel="stylesheet"/>
            <link href="{{ asset('assets/css/ace.min.css')}}" rel="stylesheet" type="text/css"/>
            <style type="text/css">
                .slot-col-container {
    width: 210px;
    max-width: 90%;
}

.search-icon {
    margin-top: -7rem;
    margin-left: 6rem;
    opacity: 0.25;
    font-size: 34rem;
    z-index: 0;
}


.slot-column {
    height: 12rem;
    overflow: hidden;
    border-radius: 1rem;
}
.slot-column-bg-top {
    z-index: 1;
    width: 3rem;
    height: 6rem;
    background: linear-gradient(#fff 0%, rgba(255, 255, 255, 0.8) 50%, transparent 80%);
}
.slot-column-bg-bottom {
    z-index: 1;
    width: 3rem;
    height: 6rem;
    background: linear-gradient(to top, #fff 0%, rgba(255, 255, 255, 0.8) 50%, transparent 80%);
}
.slot-column-numbers {
    z-index: 0;
    width: 2rem;
    word-break: break-all;
    line-height: 5rem;
    font-size: 4rem;
}


@keyframes slotMachine {
    0%,100% {transform: translateY(-13%);}
    50% {transform: translateY(-100%);}
}
  
.anim-slot {
    transform: translateY(-13%);
    animation: slotMachine 100ms ease-in-out 200ms,
                slotMachine 150ms ease-in-out 300ms,
                slotMachine 250ms ease-in-out 450ms,
                slotMachine 400ms ease-in-out 700ms;
    animation-fill-mode: forwards;
}

/* start with a little bit delay */
.anim-slot2 {
    transform: translateY(-13%);
    animation: slotMachine 100ms ease-in-out 350ms,
                slotMachine 150ms ease-in-out 450ms,
                slotMachine 250ms ease-in-out 600ms,
                slotMachine 400ms ease-in-out 850ms;
    animation-fill-mode: forwards;
}

/* start with a little bit delay */
.anim-slot3 {
    transform: translateY(-13%);
    animation: slotMachine 100ms ease-in-out 500ms,
                slotMachine 150ms ease-in-out 600ms,
                slotMachine 250ms ease-in-out 750ms,
                slotMachine 400ms ease-in-out 1000ms;
    animation-fill-mode: forwards;
}
  
@keyframes zooming {
    0% {transform: scale(1);}
    25% {transform: scale(0.94);}
    50% {transform: scale(1.06);}
    75% {transform: scale(0.94);}
    100% {transform: scale(1);}
}
  
  
@keyframes rotating {
    0% { transform: translate(4px, -10px) scale(1); }
    11% { transform: translate(6px, -6px) scale(0.96); }
    22% { transform: translate(8px, -4px) scale(1); }
    33% { transform: translate(8px, 4px) scale(1.04); }
    44% { transform: translate(4px, 8px) scale(1); }
  
    55% { transform: translate(-1px, 12px) scale(0.96); }
    65% { transform: translate(-8px, 8px) scale(1); }
    75% { transform: translate(-12px, -1px) scale(1.04); }
    86% { transform: translate(-10px, -8px) scale(1); }
    92% { transform: translate(-5px, -5px) scale(0.98); }
    100% { transform: none ; }
}
.anim-zoom {
    animation: zooming  1300ms ease-in-out 100ms;
    animation: rotating  1200ms ease-in-out 100ms;
}
            .content-bg1 {
  background-color: #f5f7fa; }
  .content-bg1 .nav.has-active-arrow .nav-item.active > .nav-link::after {
    border-right-color: #f5f7fa; }
            </style>
            {{--
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&display=swap" rel="stylesheet" type="text/css">
                --}}
                <link href="{{ asset('assets/logo - copia.png')}}" rel="icon" type="image/x-icon"/>
                @yield('head')
                <body class="" onload="" style="">
                    <div class="body-container">
                        <nav class="navbar navbar-expand-lg navbar-fixed navbar-mediumseagreen">
                            <div class="navbar-inner">
                                
                                <!-- /.navbar-intro -->
                                <div class="navbar-content">
                                    @yield('navbar-content')
                                </div>
                                <!-- .navbar-content -->
                                <!-- mobile #navbarMenu toggler button -->
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

                    <script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript">
                    </script>

                    <script src="{{ asset('assets/js/ace.min.js')}}" type="text/javascript">
                    </script>
                   
                    <!-- this is only for Ace's demo and you don't need it -->
                    <!-- "Gallery" page script to enable its demo functionality -->
                    @yield('script')
                    <!-- /.body-container -->
                </body>
            </link>
        </meta>
    </head>
</html>
