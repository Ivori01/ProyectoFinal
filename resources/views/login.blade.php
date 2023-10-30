<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, height=device-height,initial-scale=1" name="viewport"/>
        <title>
            Login - Augenblick
        </title>
        <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/css/ace.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/logo - copia.png')}}" rel="icon" type="image/x-icon"/>
        <style type="text/css">
            .body-container {
    background-image: linear-gradient(#6baace, #264783);
    background-attachment: fixed;
    background-repeat: no-repeat;
}
            .carousel-item>div { height: 100%; background-size: cover;background-repeat: no-repeat; background-position:center; }

             @media (max-width: 767.98px) { .tab-sliding .tab-pane:not(.active) { max-height: 0 !important; }

            .tab-sliding .tab-pane.active { min-height: 90vh; max-height: none !important; } }
        </style>
    </head>
    <body>
        <div class="body-container">
            <div class="main-container container">
                <div class="main-content minh-100 justify-content-center" role="main">
                    <div class="p-2 p-md-4">
                        <div class="row">
                            <div class="shadow radius-1 overflow-hidden bg-white col-12 col-lg-10 offset-lg-1">
                                <div class="row">
                                    <div class="d-none d-lg-flex col-lg-5 border-r-1 brc-default-l2 px-0">
                                        <div class="carousel slide minw-100 h-100" id="loginBgCarousel">
                                            <ol class="carousel-indicators d-none">
                                                <li class="active" data-slide-to="0" data-target="#loginBgCarousel">
                                                </li>
                                                <li data-slide-to="1" data-target="#loginBgCarousel">
                                                </li>
                                                <li data-slide-to="2" data-target="#loginBgCarousel">
                                                </li>
                                                <li data-slide-to="3" data-target="#loginBgCarousel">
                                                </li>
                                            </ol>
                                            <div class="carousel-inner minw-100 h-100">
                                                <div class="carousel-item active minw-100 h-100">
                                                    <div class="bgc-primary-l4 d-flex flex-column align-items-center justify-content-center" style="background-image: url({{ asset('assets/images/login-bg-1.jpg')}});">
                                             
                                                        
                                                      
                                                        <div class="mt-auto mb-4 text-dark-tp3">
                                                         
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item minw-100 h-100">
                                                  
                                                </div>
                                                <div class="carousel-item minw-100 h-100">
                                                   
                                                </div>
                                                <div class="carousel-item minw-100 h-100">
                                                    <div class="d-flex flex-column align-items-center justify-content-start" style="background-image: url(assets/images/login-bg-4.jpg);">
                                                        <h1 class="mt-5">
                                                            <i class="fa fa-leaf text-success-m2 text-125">
                                                            </i>
                                                        </h1>
                                                        <h2 class="text-blue-d1">
                                                            Ace
                                                            <span class="text-80 text-dark-tp3">
                                                                Application
                                                            </span>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 py-lg-5 bgc-white px-0">
                                        <!-- you can also use tab links -->
                                        <ul class="d-none mt-n4 mb-4 nav nav-tabs nav-tabs-simple justify-content-end" role="tablist">
                                            <li class="nav-item">
                                                <a aria-controls="login" aria-selected="true" class="nav-link active" data-toggle="tab" href="#id-tab-login" role="tab">
                                                    Login
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-sliding border-0 p-0" data-swipe="right">
                                            <div class="tab-pane active show mh-100 px-3 px-lg-0 pb-3" id="id-tab-login">
                                                <div class="d-none d-lg-block col-md-6 offset-md-3 mt-lg-4 px-0">
                                                    <h4 class="text-dark-tp4 border-b-1 brc-grey-l1 pb-1 text-130">
                                                        <i class="fa fa-coffee text-orange-m2 mr-1">
                                                        </i>
                                                        Bienvenido
                                                    </h4>
                                                </div>
                                                <div class="d-lg-none text-secondary-m1 my-4 text-center">
                                                    <a href="html/dashboard.html">
                                                        <i class="fa fa-leaf text-success-m2 text-200 mb-4">
                                                        </i>
                                                    </a>
                                                    <h1 class="text-170">
                                                        <span class="text-blue-d1">
                                                            Ace
                                                            <span class="text-80 text-dark-tp3">
                                                                Application
                                                            </span>
                                                        </span>
                                                    </h1>
                                                    Welcome back
                                                </div>
                                                <form action="{{ route('login') }} " class="form-row mt-4" id="form-login" method="Post" novalidate="novalidate" role="form">
                                                    <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                                                        <div class="form-group col-md-6 offset-md-3">
                                                            <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                                                <input class="form-control form-control-lg pr-4 shadow-none" id="user" name="user" required="required" type="text"/>
                                                                <i class="fa fa-user text-grey-m2 ml-n4">
                                                                </i>
                                                                <label class="floating-label text-grey-l1 text-100 ml-n3">
                                                                    Username
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6 offset-md-3 mt-2 mt-md-1">
                                                            <div class="d-flex align-items-center input-floating-label text-blue-m1 brc-blue-m2">
                                                                <input autocomplete="off" class="form-control form-control-lg pr-4 shadow-none" id="password" name="password" type="password"/>
                                                                <i class="fa fa-key text-grey-m2 ml-n4">
                                                                </i>
                                                                <label class="floating-label text-grey-l1 text-100 ml-n3" for="id-login-password">
                                                                    Password
                                                                </label>
                                                            </div>
                                                        </div>
                                                       {{--  <div class="col-md-6 offset-md-3 text-right text-md-right mt-n2 mb-2">
                                                            <a class="text-primary-m2 text-95" data-target="#id-tab-forgot" data-toggle="tab" href="#">
                                                                Forgot Password?
                                                            </a>
                                                        </div> --}}
                                                        <div class="form-group col-md-6 offset-md-3">
                                                            <label class="d-inline-block mt-3 mb-0 text-secondary-d2">
                                                                <input class="mr-1" id="id-remember-me" type="checkbox"/>
                                                                Remember me
                                                            </label>
                                                            <button class="btn btn-info btn-block btn-md btn-bold mt-2 mb-4">
                                                                Sign In
                                                            </button>
                                                        </div>
                                                    </input>
                                                </form>
                                                {{-- <div class="form-row">
                                                    <div class="col-12 col-md-6 offset-md-3 d-flex flex-column align-items-center justify-content-center">
                                                        <hr class="brc-default-m4 mt-0 mb-2 w-100"/>
                                                        <hr class="brc-default-m4 w-100 mb-2"/>
                                                        <div class="mt-n4 bgc-white-tp2 px-3 py-1 text-default-d1 text-90">
                                                            Or Get Started Using
                                                        </div>
                                                        <div class="my-2">
                                                            <button class="btn btn-bgc-white btn-lighter-primary btn-h-primary btn-a-primary border-2 radius-round btn-lg mx-1" type="button">
                                                                <i class="fab fa-facebook-f text-110">
                                                                </i>
                                                            </button>
                                                            <button class="btn btn-bgc-white btn-lighter-blue btn-h-info btn-a-info border-2 radius-round btn-lg px-25 mx-1" type="button">
                                                                <i class="fab fa-twitter text-110">
                                                                </i>
                                                            </button>
                                                            <button class="btn btn-bgc-white btn-lighter-red btn-h-red btn-a-red border-2 radius-round btn-lg px-25 mx-1" type="button">
                                                                <i class="fab fa-google text-110">
                                                                </i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="tab-pane mh-100 px-3 px-lg-0 pb-3" data-swipe-prev="#id-tab-login" id="id-tab-forgot">
                                                <div class="position-tl ml-3 mt-2">
                                                    <a class="btn btn-light-default bg-transparent" data-target="#id-tab-login" data-toggle="tab" href="#">
                                                        <i class="fa fa-arrow-left">
                                                        </i>
                                                    </a>
                                                </div>
                                                <div class="col-md-6 offset-md-3 mt-5 px-0">
                                                    <h4 class="pt-4 pt-md-0 text-dark-tp4 border-b-1 brc-grey-l1 pb-1 text-130">
                                                        <i class="fa fa-key text-brown-m2 mr-1">
                                                        </i>
                                                        Recover Password
                                                    </h4>
                                                </div>
                                                <form novalidate="novalidate" role="form">
                                                    <div class="form-group col-md-6 offset-md-3">
                                                        <label class="text-secondary-m1 mb-3">
                                                            Enter your email address and we'll send you the instructions:
                                                        </label>
                                                        <div class="d-flex align-items-center form-group">
                                                            <input autocomplete="off" class="form-control form-control-lg pr-4 shadow-none" id="user" placeholder="Email" value="{{ old('user') }}"/>
                                                            <i class="fa fa-envelope text-grey-m2 ml-n4">
                                                            </i>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 offset-md-3 mt-1">
                                                        <button class="btn btn-warning btn-block btn-md btn-bold mt-2 mb-4" type="button">
                                                            Continue
                                                        </button>
                                                    </div>
                                                </form>
                                                <div class="form-row w-100">
                                                    <div class="col-12 col-md-6 offset-md-3 d-flex flex-column align-items-center justify-content-center">
                                                        <hr class="brc-default-m4 mt-0 mb-2 w-100"/>
                                                        <div class="p-0 px-md-2 text-dark-tp4 my-3">
                                                            <a class="text-blue-m2 text-600" data-target="#id-tab-login" data-toggle="tab" href="#">
                                                                Back to Login
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .tab-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-none my-3 text-white-tp1 text-center">
                            <i class="fa fa-leaf text-success-l3 mr-1 text-110">
                            </i>
                            Ace Company © 2020
                        </div>
                    </div>
                </div>
                <!-- /main -->
            </div>
        </div>
        <!-- /.main-container -->
        <!-- include common vendor scripts used in demo pages -->
    </body>
</html>
<script src="{{ asset('assets/js/jquery-3.4.1.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/popper.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/ace.min.js')}}" type="text/javascript">
</script>
<script src="{{ asset('assets/js/jquery.validate.min.1.19.1.js')}}">
</script>
<script type="text/javascript">
    jQuery(function($) {



          var $invalidClass = 'brc-danger-tp2';
          var $validClass = 'brc-info-tp2';
    $('#form-login').validate({
            errorElement: 'span',
            errorClass: 'form-text form-error text-danger-m2',
            focusInvalid: false,
            ignore: "",
            rules: {
              user: {
                required: true,
              },
             
              password: {
                required: true,
              }
            },

            messages: {
              email: {
                user: "Ingrese Usuario.",
              },
              password: {
                required: "Ingrese Contraseña.",
              }
            },


            highlight: function(element) {
              var $element = $(element);

              //remove error messages to be inserted again, so that the .fa-exclamation-circle is inserted in `errorPlacement` function
              $element.closest('.form-group').find('.form-text').remove();

              if ($element.is('input[type=checkbox]') || $element.is('input[type=radio]')) return;

              else if ($element.is('.select2')) {
                var container = $element.siblings('[class*="select2-container"]');
                container.find('.select2-selection').addClass($invalidClass);
              } else if ($element.is('.chosen')) {
                var container = $element.siblings('[class*="chosen-container"]');
                container.find('.chosen-choices, .chosen-single').addClass($invalidClass);
              } else {
                $element.addClass($invalidClass + ' d-inline-block').removeClass($validClass);
              }
            },

            success: function(error, element) {
              var parent = error.parent();
              var $element = $(element);

              $element.removeClass($invalidClass)
                .closest('.form-group').find('.form-text').remove();

              if ($element.is('input[type=checkbox]') || $element.is('input[type=radio]')) return;

              else if ($element.is('.select2')) {
                var container = $element.siblings('[class*="select2-container"]');
                container.find('.select2-selection').removeClass($invalidClass);
              } else if ($element.is('.chosen')) {
                var container = $element.siblings('[class*="chosen-container"]');
                container.find('.chosen-choices, .chosen-single').removeClass($invalidClass);
              } else {
                $element.addClass($validClass + ' d-inline-block');
              }

              //append 'ok' mark
              parent.append('<span class="form-text d-inline-block ml-sm-2"><i class=" fa fa-check text-success-m1 text-120"></i></span>');
            },

            errorPlacement: function(error, element) {
              //prepend 'x' mark
              error.prepend('<i class="form-text fa fa-exclamation-circle text-danger-m1 text-100 mr-1 ml-2"></i>');

              if (element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
                element.closest('div[class*="col-"]').append(error);
              } else if (element.is('.select2')) {
                var container = element.siblings('[class*="select2-container"]');
                error.insertAfter(container);
                container.find('.select2-selection').addClass($invalidClass);
              } else if (element.is('.chosen')) {
                var container = element.siblings('[class*="chosen-container"]');
                error.insertAfter(container);
                container.find('.chosen-choices, .chosen-single').addClass($invalidClass);
              } else {
                error.addClass('d-inline-block').insertAfter(element);
              }
            },

            submitHandler: function(form) {
                form.submit();
            },
            invalidHandler: function(form) {}
          });
               
            
                      
          //because "Login Here" and "Signup now" links are not inside a "UL" or ".nav", they preserve "active" class
          //and we should remove that, to continue moving between tab-panes
          $('a[data-toggle="tab"]').on('click', function() {
            $('a[data-toggle="tab"]').removeClass('active');
          });

          //start/show carousel to change backgrounds
          $('#id-start-carousel').on('click', function(e) {
            e.preventDefault();
            $('.carousel-indicators').removeClass('d-none');
            $('#loginBgCarousel').carousel(1);
          });

          //remove the background/carousel section
          $('#id-remove-carousel').on('click', function(e) {
            e.preventDefault();
            var row = $('.carousel').parent().parent(); //.row
            row.children().eq(0).remove();
            row.children().eq(0).removeClass('col-lg-7 col-lg-8').parent().parent().removeClass('col-12 col-lg-10 offset-lg-1').addClass('col-12 col-lg-5').parent().addClass('justify-content-center');

            $('.col-md-6.offset-md-3').removeClass('col-md-6 offset-md-3').addClass('col-md-8 offset-md-2');
            $('h4').parent().next().removeClass('d-lg-none').prev().remove();
          });

          //make the login area fullscreen
          $('#id-fullscreen').on('click', function(e) {
            e.preventDefault();
            if (window.navigator.msPointerEnabled) $('.body-container').addClass('h-100'); //for IE only

            $('.main-container').removeClass('container');
            $('.main-content').removeClass('justify-content-center minh-100').addClass('px-4 px-lg-0')
              .children().attr('class', 'my-3 m-lg-0 d-flex flex-column flex-lg-row flex-grow-1') //remove the padding classes
              .children().eq(0).addClass('flex-grow-1')
              .children().removeClass('shadow radius-1 col-lg-10 offset-lg-1').addClass('d-lg-flex')
              .children().addClass('flex-grow-1')
              .children().eq(0).removeClass('col-lg-5').addClass('col-lg-4').next().removeClass('col-lg-7 offset-2').addClass('col-lg-6 mx-auto d-flex align-items-center justify-content-center');
          });

        });
</script>
<!-- /.body-container -->
