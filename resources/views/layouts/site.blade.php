<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Augenblick -school</title>
<!-- Plugins CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/site/animate.min.css')}}" rel="stylesheet" type="text/css"/>
     <link href="{{ asset('assets/css/site/jquery.fancybox.css')}}" rel="stylesheet" type="text/css"/>
     <link href="{{ asset('assets/css/site/themify-icons.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/css/site/magnific-popup.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/css/site/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
 <link href="{{ asset('assets/css/site/icofont.css')}}" rel="stylesheet" type="text/css"/>
 <link href="{{ asset('assets/css/site/boxicons.min.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/css/site/et-line-font.css')}}" rel="stylesheet" type="text/css"/>
   <link href="{{ asset('assets/css/site/slicknav.min.css')}}" rel="stylesheet" type="text/css"/>
      <link href="{{ asset('assets/css/site/swiper.min.css')}}" rel="stylesheet" type="text/css"/>
 
  
 

<!-- Custom CSS -->
<link href="{{ asset('assets/css/site/style.css')}}" rel="stylesheet"> 

<!-- Favicon -->
 <link href="{{ asset('assets/logo - copia.png')}}" rel="icon"  type="image/x-icon"/>
</head>

<body>
<!-- Pre Loader -->
<div id="dvLoading"></div>
<!-- Header Area -->
@yield('header')
<!-- End Header Area --> 
<!-- Start Slider Area -->
@yield('content')
<!-- End Brand Wrapper -->
<!-- footer -->
@yield('footer')
<!--jquery js --> 
 <script src="{{ asset('assets/js/jquery-3.4.1.min.js')}}" type="text/javascript">
            </script>
            <script src="{{ asset('assets/js/popper.min.js')}}" type="text/javascript">
            </script>
            <script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
 <script src="{{ asset('assets/js/site/plugins.js')}}" type="text/javascript"></script>
<!--jquery js --> 
 <script src="{{ asset('assets/js/site/fontawesome.js')}}" type="text/javascript"></script>
 <script src="{{ asset('assets/js/site/swiper-slider.js')}}" type="text/javascript"></script>
 <script src="{{ asset('assets/js/site/fancybox.js')}}" type="text/javascript"></script>
 <script src="{{ asset('assets/js/site/jquery.animateNumber.min.js')}}" type="text/javascript"></script>

 <script src="{{ asset('assets/js/site/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
<!-- MagnificPopup JS --> 
 <script src="{{ asset('assets/js/site/slicknav.min.js')}}" type="text/javascript"></script>
<!-- Slicknav js --> 
 <script src="{{ asset('assets/js/site/custom.js')}}" type="text/javascript"></script>
 <script type="text/javascript">
   var mySwiper = new Swiper('.swiper-container', {
 
});
 </script>
</body>
</html>
