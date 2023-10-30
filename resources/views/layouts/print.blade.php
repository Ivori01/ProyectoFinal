<html>
    <head>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
        <meta charset="utf-8"/>
        <meta content="width=device-width, height=device-height, initial-scale=1" name="viewport"/>
        <title>
            {{$title ?? ''}}
        </title>
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css"/>
       
        <link href="{{ asset('assets/css/ace.min.css')}}" rel="stylesheet" type="text/css"/>
       
    </head>
    <body>
        <div class="body-container">
            <div class="main-container">
                <div class="main-content" role="main">
                    <div class="page-content container">
                        @yield('content')
                    </div>
                    <!-- .page-content -->
                </div>
                <!-- main -->
            </div>
            <!-- .main-container -->
        </div>
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js')}}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/js/ace.min.js')}}" type="text/javascript">
        </script>
        <!-- .body-container -->
        @yield('script')
    </body>
</html>
