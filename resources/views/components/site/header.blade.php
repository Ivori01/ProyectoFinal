<header class="header" > 
  <!-- Topbar -->
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-5 col-12"> 
          <!-- Contact -->
          <ul class="top-link">
           {{--  <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="faq.html">FAQ</a></li> --}}
          </ul>
          <!-- End Contact --> 
        </div>
        <div class="col-lg-6 col-md-7 col-12"> 
          <!-- Top Contact -->
          <ul class="top-contact">
            <li><i class="fa fa-phone"></i>+010 1234 56789</li>
            <li><i class="fa fa-envelope"></i><a href="mailto:support@yourmail.com">support@yourmail.com</a></li>
          </ul>
          <!-- End Top Contact --> 
        </div>
      </div>
    </div>
  </div>
  <!-- End Topbar --> 
  <!-- Header Inner -->
  <div class="header-inner">
    <div class="container">
      <div class="inner">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-12"> 
            <!-- Start Logo -->
            <div class="logo"> <a href="{{ route('Site.Index') }}"><img src="{{ asset('assets/log.png')}}" width="160" height="37" alt=""></a> </div>
            <!-- End Logo --> 
            <!-- Mobile Nav -->
            <div class="mobile-nav"></div>
            <!-- End Mobile Nav --> 
          </div>
          <div class="col-lg-9 col-md-9 col-12"> 
            <!-- Main Menu -->
            <div class="main-menu">
              <nav class="navigation">
                <ul class="nav menu">
                  <li class="active"><a href="{{ route('Site.Index') }}">Inicio</a></li>
                  <li><a href="{{ route('Site.About') }}">Nosotros</a></li>
                  <li><a href="JavaScript:Void(0)">Servicios <i class="icofont-rounded-down"></i></a>
                    <ul class="dropdown">
                      <li><a href="{{ route('Site.Service') }}">Servicio</a></li>
                      <li><a href="{{ route('Site.Service.Detail') }}">Detalles de servicio</a></li>
                    </ul>
                  </li>
               {{--    <li><a href="JavaScript:Void(0)">Pages <i class="icofont-rounded-down"></i></a>
                    <ul class="dropdown">
                      <li> <a href="about.html" >About Us</a> </li>
                      <li> <a href="pricing.html" >Pricing</a> </li>
                      <li> <a href="testimonials.html" >Testimonials</a> </li>
                      <li> <a href="team.html" >Team</a> </li>
                      <li> <a href="terms-conditions.html" >Terms Conditions</a> </li>
                      <li> <a href="privacy-policy.html" >Privacy Policy</a> </li>
                      <li> <a href="log-in.html" >Log In</a> </li>
                      <li> <a href="sign-up.html" >Sign Up</a> </li>
                      <li> <a href="coming-soon.html" >Coming Soon</a> </li>
                      <li> <a href="faq.html" >FAQ</a> </li>
                      <li> <a href="404.html" >404 Error</a> </li>
                    </ul>
                  </li> --}}
                  <li><a href="JavaScript:Void(0)">Blog <i class="icofont-rounded-down"></i></a>
                    <ul class="dropdown">
                      <li><a href="{{ route('Site.Blog') }}">Blogs</a></li>
                      <li><a href="{{ route('Site.Blog.Detail') }}">Detalle de blog</a></li>
                    </ul>
                  </li>
                  <li><a href="{{ route('Site.Contact') }}">Contáctanos</a></li>
                    <li><a href="{{route('login')}}">Intranet </a>
                 
                  </li>
              
                
             
                </ul>
              </nav>
            </div>
            <!--/ End Main Menu --> 
          </div>
        
        </div>
      </div>
    </div>
  </div>
  <!--/ End Header Inner --> 
</header>
<!-- Quote Section -->
