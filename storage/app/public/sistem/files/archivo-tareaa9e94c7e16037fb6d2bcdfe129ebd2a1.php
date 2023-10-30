<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta charset="utf-8"/>
        <title>
            Home
        </title>
        <meta content="Large & Small" name="description"/>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport"/>
        <!-- bootstrap & fontawesome -->
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assets/font-awesome/css/all.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assets/icon-128x128.ico')}}" rel="icon" sizes="1288x128" type="image/x-icon"/>
        <!-- page specific plugin styles -->
        <!-- text fonts -->
        <link href="{{ asset('assets/css/fonts.googleapis.com.css')}}" rel="stylesheet"/>
        <!-- ace styles -->
        <link class="ace-main-stylesheet" href="{{ asset('assets/css/ace.min.css')}}" id="main-ace-style" rel="stylesheet"/>
        <!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
        <link href="{{asset('assets/css/ace-skins.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/css/ace-rtl.min.css')}}" rel="stylesheet"/>
        <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="{{asset('assets/js/ace-extra.min.js')}}">
        </script>
        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
        <!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body class="no-skin">
        @include('partials.navbar')
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="row">
                            <div class="col-xs-12 ">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="page-header">
                                    <h1>
                                        <small>
                                            <i class="ace-icon fa ">
                                            </i>
                                        </small>
                                    </h1>
                                </div>
                                <!-- /.page-header -->
                                @php
$Director="fas fa-briefcase ";
$Secretaria="fas fa-desktop ";
$Alumno="fas fa-user-graduate";
$Docente="fas fa-chalkboard-teacher";
$Apoderado="fa fa-users";
$SuperAdmin="fa fa-briefcase"

@endphp
                                <div class="col-xs-12 center">
                                    <!-- #section:pages/profile.picture -->
                                    @foreach(Auth::user()->getRoleNames() as $rol)
												@php $rolname=trim(str_replace('-', '', $rol)); @endphp
                                    <span class="profile-picture">
                                        <div class=" pricing-box">
                                            <div class="widget-box pricing-box-small widget-color-green">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger lighter">
                                                        {{$rol}}
                                                    </h5>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <ul class="list-unstyled spaced2">
                                                            <li>
                                                                <i class="{{ $$rolname }} " style="font-size:700%;">
                                                                </i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        @if($rol!='Super-Admin')
                                                        <a class="btn btn-block btn-success" href="{{url(strtolower($rol))}}">
                                                            @else
                                                            <a class="btn btn-block btn-success" href="{{url('/director')}}">
                                                                @endif
                                                                <span>
                                                                    Ingresar
                                                                </span>
                                                            </a>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.page-content -->
                    </div>
                </div>
                <!-- /.main-content -->
                @include('partials.footer')
            </div>
            <!-- /.main-container -->
            <!-- basic scripts -->
            <!--[if !IE]> -->
            <script src="assets/js/jquery-2.1.4.min.js">
            </script>
            <!-- <![endif]-->
            <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
            <script type="text/javascript">
                if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
            </script>
            <script src="{{asset('assets/js/bootstrap.min.js')}}">
            </script>
            <!-- page specific plugin scripts -->
            <!-- ace scripts -->
            <script src="{{asset('assets/js/ace-elements.min.js')}}">
            </script>
            <script src="{{asset('assets/js/ace.min.js')}}">
            </script>
            <!-- inline scripts related to this page -->
        </div>
    </body>
</html>
