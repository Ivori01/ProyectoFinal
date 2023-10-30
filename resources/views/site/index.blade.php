@extends('layouts.site',['title'=>'Docente | Aula Virtual'])

@section('header')
@component('components.site.header')
@endcomponent
@endsection

@section('content')
<section class="hero-slider hero-style-1">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide" data-swiper-autoplay="33000">
        <div class="slide-inner slide-bg-image ">
           <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" class=""style="position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);">
    <source src="{{ asset('assets/jb.mp4')}}{{-- https://player.vimeo.com/external/299978182.sd.mp4?s=8e0f4f7872d60fe0823a728128b8c34934b2c685&profile_id=164&oauth2_token_id=57447761 --}}" type="video/mp4">
  </video>
   <div class="overlay" style="opacity: 0.5;"></div> 

          <div class="container" style="">
            <div data-swiper-parallax="300" class="slide-title">
              <h2>Growth You Career With Complete Courses</h2>
            </div>
            <div data-swiper-parallax="400" class="slide-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum recusandae placeat atque molli</p>
            </div>
            <div class="clearfix"></div>
            <div data-swiper-parallax="500" class="slide-btns services-btn"> <a href="services.html" class="bttn">Services</a> <a href="https://www.youtube.com/embed/9ZOhQTF0G0c?autoplay=1" class="hero-video-btn video-btn"  data-type="iframe" tabindex="0"><i class="far fa-play-circle"></i>Watch About</a> </div>
          </div>
        </div>
        <!-- end slide-inner --> 
      </div>
      <!-- end swiper-slide -->
      
      <div class="swiper-slide" data-swiper-autoplay="14000">
        <div class="slide-inner slide-bg-image" >
                  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" class=""style="position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);">
    <source src="https://player.vimeo.com/external/299978177.sd.mp4?s=09b6d40d32b355e3eab9c1183d37fcd6d89c6974&profile_id=164&oauth2_token_id=57447761" type="video/mp4">
  </video>
   <div class="overlay" style="opacity: 0.5;"></div> 

          <div class="container">
            <div data-swiper-parallax="300" class="slide-title">
              <h2>Growth You Career With Complete Courses</h2>
            </div>
            <div data-swiper-parallax="400" class="slide-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum recusandae placeat atque molli</p>
            </div>
            <div class="clearfix"></div>
            <div data-swiper-parallax="500" class="slide-btns services-btn"> <a href="services.html" class="bttn">Services</a> <a href="https://www.youtube.com/embed/9ZOhQTF0G0c?autoplay=1" class="hero-video-btn video-btn"  data-type="iframe" tabindex="0"><i class="far fa-play-circle"></i>Watch About</a> </div>
          </div>
        </div>
        <!-- end slide-inner --> 
      </div>
       <div class="swiper-slide" data-swiper-autoplay="14000">
        <div class="slide-inner slide-bg-image" >
                  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop" class=""style="position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  z-index: 0;
  -ms-transform: translateX(-50%) translateY(-50%);
  -moz-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translateX(-50%) translateY(-50%);
  transform: translateX(-50%) translateY(-50%);">
    <source src="https://player.vimeo.com/external/203442530.sd.mp4?s=16918f4fb77dafc66c786f78065c127cd7ac888a&profile_id=164&oauth2_token_id=57447761" type="video/mp4">
  </video>
   <div class="overlay" style="opacity: 0.5;"></div> 

          <div class="container">
            <div data-swiper-parallax="300" class="slide-title">
              <h2>Growth You Career With Complete Courses</h2>
            </div>
            <div data-swiper-parallax="400" class="slide-text">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum recusandae placeat atque molli</p>
            </div>
            <div class="clearfix"></div>
            <div data-swiper-parallax="500" class="slide-btns services-btn"> <a href="services.html" class="bttn">Services</a> <a href="https://www.youtube.com/embed/9ZOhQTF0G0c?autoplay=1" class="hero-video-btn video-btn"  data-type="iframe" tabindex="0"><i class="far fa-play-circle"></i>Watch About</a> </div>
          </div>
        </div>
        <!-- end slide-inner --> 
      </div>
      <!-- end swiper-slide --> 
    </div>
    <!-- end swiper-wrapper --> 
    <!-- swipper controls -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>
<!-- End Slider Area --> 
<!-- Start Feature section Area -->
<section class="feature-section">
  <div class="container">
    <div class="feature-inner">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12"> 
          <!-- Start single services block -->
          <div class="single-services-block">
            <div class="inner-box">
              <div class="icon-box"><img src="{{ asset('assets/images/site/f-icon-1.png')}}" alt=""></div>
              <h3><a href="service-details.html">Arts Programs</a></h3>
              <div class="text">Lorem ipsum dolor sit amet adipelit sed eiusmtempor encid dolore.</div>
              <div class="read-more-btn"><a href="service-details.html" class="theme-btn">Read More <span class="icon-right-arrow2"></span></a></div>
            </div>
          </div>
          <!-- End single services block --> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12"> 
          <!-- Start single services block -->
          <div class="single-services-block active">
            <div class="inner-box">
              <div class="icon-box"><img src="{{ asset('assets/images/site/f-icon-2.png')}}" alt=""></div>
              <h3><a href="service-details.html">Foreign Language</a></h3>
              <div class="text">Lorem ipsum dolor sit amet adipelit sed eiusmtempor encid dolore.</div>
              <div class="read-more-btn"><a href="service-details.html" class="theme-btn">Read More <span class="icon-right-arrow2"></span></a></div>
            </div>
          </div>
          <!-- End single services block --> 
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12"> 
          <!-- Start single services block -->
          <div class="single-services-block">
            <div class="inner-box">
              <div class="icon-box"><img src="{{ asset('assets/images/site/f-icon-3.png')}}" alt=""></div>
              <h3><a href="service-details.html">Sports Playing</a></h3>
              <div class="text">Lorem ipsum dolor sit amet adipelit sed eiusmtempor encid dolore.</div>
              <div class="read-more-btn"><a href="service-details.html" class="theme-btn">Read More <span class="icon-right-arrow2"></span></a></div>
            </div>
          </div>
          <!-- End single services block --> 
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Feature section Area --> 
<!-- Start Feature section Area -->
<section class="about-sec">
  <div class="container">
    <div class="section-title text-center">
      <div class="section-sub-title">
        <h6>What we do</h6>
      </div>
      <div class="section-main-title">
        <h2>About Us</h2>
      </div>
      <div class="em_bar_bg"></div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="about-content-block">
          <h3>We are providing treatment by some experienced physicians</h3>
          <div class="text mb-40">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do ei usmod tempor incididunt.enim minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex commodo conse inquat duis aute irure dolor.<br>
              excepteur sint occaecat cupidatat non proident sunt culpa officia deserunt. quisquam est dolorem</p>
            <ul class="list-style-one">
              <li>Arts Programs</li>
              <li>Online skilled Courses</li>
              <li>Online Course Description</li>
              <li>Successful Growth In our Institution</li>
            </ul>
          </div>
          <div class="link-btn mb-30"><a href="contact.html" class="bttn">Contact Us</a></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-image-block about-img">
          <div class="inner-box">
            <div class="image"> <img src="{{ asset('assets/images/site/dots.png')}}" alt="about bg"> <img class="float-bob-y" src="{{ asset('assets/images/site/about-img.jpg')}}" alt="about Img"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Feature section Area --> 
<!-- Start Counter Sec Area -->
<div class="counter-sec-main">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="counter-sec text-center">
          <div class="animated-bg"><i></i><i></i><i></i> </div>
          <i class="count-icon icon-profile-male"></i> <span class="count-nos" id="target">25890</span>
          <p class="count-lable">Students</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="counter-sec text-center">
          <div class="animated-bg"><i></i><i></i><i></i> </div>
          <i class="count-icon icon-strategy"></i> <span class="count-nos" id="target2">1560</span>
          <p class="count-lable">Instructor</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="counter-sec text-center">
          <div class="animated-bg"><i></i><i></i><i></i> </div>
          <i class="count-icon icon-puzzle"></i> <span class="count-nos" id="target3">21350</span>
          <p class="count-lable">Courses</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="counter-sec text-center">
          <div class="animated-bg"><i></i><i></i><i></i> </div>
          <i class="count-icon icon-trophy"></i> <span class="count-nos" id="target4">128560</span>
          <p class="count-lable">Earnings</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Counter Sec Area --> 
<!-- Start Services Sec Area -->
<section class="services-sec">
  <div class="container">
    <div class="section-title text-center">
      <div class="section-sub-title">
        <h6>Our Services </h6>
      </div>
      <div class="section-main-title">
        <h2>Our Awesome Services</h2>
      </div>
      <div class="em_bar_bg"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6"> 
        <!-- Start Single Services Sec -->
        <div class="single_service">
          <div class="single_service_inner"> 
           <div class="icon"> <i class="bx bx-book"></i></div>
            <h4>Awesome Courses</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6"> 
        <!-- Start Single Services Sec -->
        <div class="single_service">
          <div class="single_service_inner"> 
           <div class="icon"> <i class="bx bx-plus-medical"></i></div>
            <h4>Medical Service</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6"> 
        <!-- Start Single Services Sec -->
        <div class="single_service">
          <div class="single_service_inner"> 
           <div class="icon"> <i class="bx bx-football"></i></div>
            <h4>Many Sports</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6"> 
        <!-- Start Single Services Sec -->
        <div class="single_service">
          <div class="single_service_inner"> 
           <div class="icon"> <i class="bx bx-globe"></i></div>
            <h4>Online Courses</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6"> 
        <!-- Start Single Services Sec -->
        <div class="single_service">
          <div class="single_service_inner"> 
           <div class="icon"> <i class="bx bx-car"></i></div>
            <h4>Transportation</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6"> 
        <!-- Start Single Services Sec -->
        <div class="single_service">
          <div class="single_service_inner"> 
           <div class="icon"> <i class="bx bx-phone"></i></div>
            <h4>Customer Support</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Services Sec Area --> 
<!-- Start Our Team Sec Area -->
<section class="our-team-sec">
   <div class="container">
    <div class="section-title text-center">
      <div class="section-sub-title">
        <h6>Our Team </h6>
      </div>
      <div class="section-main-title">
        <h2>Our Awesome Team</h2>
      </div>
      <div class="em_bar_bg"></div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6"> 
       <!-- Start Single Team Sec -->
       <div class="single_team mb-4">
        <div class="single_team_thumb"> <img src="{{ asset('assets/images/site/team-img1.jpg')}}" alt="">
          <div class="single_team_icon"> <a href=""><i class="fa fa-facebook"></i></a> <a href=""><i class="fa fa-twitter"></i></a> <a href=""><i class="fa fa-linkedin"></i></a> <a href=""><i class="fa fa-pinterest"></i></a> </div>
        </div>
        <div class="single_team_content">
          <h4>Job Title</h4>
          <span>Designation</span> </div>
      </div>      
      </div>
      <div class="col-lg-3 col-md-6"> 
        <!-- Start Single Team Sec -->
        <div class="single_team mb-4">
         <div class="single_team_thumb"> <img src="{{ asset('assets/images/site/team-img2.jpg')}}" alt="">
           <div class="single_team_icon"> <a href=""><i class="fa fa-facebook"></i></a> <a href=""><i class="fa fa-twitter"></i></a> <a href=""><i class="fa fa-linkedin"></i></a> <a href=""><i class="fa fa-pinterest"></i></a> </div>
         </div>
         <div class="single_team_content">
          <h4>Job Title</h4>
          <span>Designation</span> </div>
       </div>      
       </div>
       <div class="col-lg-3 col-md-6"> 
        <!-- Start Single Team Sec -->
        <div class="single_team mb-4">
         <div class="single_team_thumb"> <img src="{{ asset('assets/images/site/team-img3.jpg')}}" alt="">
           <div class="single_team_icon"> <a href=""><i class="fa fa-facebook"></i></a> <a href=""><i class="fa fa-twitter"></i></a> <a href=""><i class="fa fa-linkedin"></i></a> <a href=""><i class="fa fa-pinterest"></i></a> </div>
         </div>
         <div class="single_team_content">
          <h4>Job Title</h4>
          <span>Designation</span> </div>
       </div>      
       </div>
       <div class="col-lg-3 col-md-6"> 
        <!-- Start Single Team Sec -->
        <div class="single_team mb-4">
         <div class="single_team_thumb"> <img src="{{ asset('assets/images/site/team-img4.jpg')}}" alt="">
           <div class="single_team_icon"> <a href=""><i class="fa fa-facebook"></i></a> <a href=""><i class="fa fa-twitter"></i></a> <a href=""><i class="fa fa-linkedin"></i></a> <a href=""><i class="fa fa-pinterest"></i></a> </div>
         </div>
         <div class="single_team_content">
          <h4>Job Title</h4>
          <span>Designation</span> </div>
       </div>      
       </div>
    </div>
   </div>
</section>
<!-- End Our Team Sec Area -->
<!-- Start Pricing Sec Area -->
<section class="pricing-sec">
   <div class="container">
    <div class="section-title text-center">
      <div class="section-sub-title">
        <h6>Pricing Table</h6>
      </div>
      <div class="section-main-title">
        <h2>Our Best Plans</h2>
      </div>
      <div class="em_bar_bg"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <!-- Start Single Pricing Sec Area -->
        <div class="price-box">
          <div class="price-box-header">
            <div class="price-name"> Freelance </div>
            <h5 class="price-val"> <sup>$</sup> 19 </h5>
          </div>
          <div class="price-box-content">
            <ul>
              <li><i class="icon-right fas fa-check"></i><span>1000 Max Connections</span> </li>
              <li><i class="icon-right fas fa-check"></i><span>Unlimited Support</span> </li>
              <li><i class="icon-del fas fa-times"></i><span>Medium SSL Protection</span> </li>
              <li><i class="icon-del fas fa-times"></i><span>Unlimited Channels</span> </li>
            </ul>
          </div>
          <div class="price-footer"> <a href="#" class="btn btn-main">Buy Now <span></span></a> </div>
        </div>        
      </div>
      <div class="col-lg-4 col-md-6">
        <!-- Start Single Pricing Sec Area -->
        <div class="price-box featured">
          <span class="featured-mark">Featured</span>
          <div class="price-box-header">
            <div class="price-name"> Freelance </div>
            <h5 class="price-val"> <sup>$</sup> 199 </h5>
          </div>
          <div class="price-box-content">
            <ul>
              <li><i class="icon-right fas fa-check"></i><span>1000 Max Connections</span> </li>
              <li><i class="icon-right fas fa-check"></i><span>Unlimited Support</span> </li>
              <li><i class="icon-del fas fa-times"></i><span>Medium SSL Protection</span> </li>
              <li><i class="icon-del fas fa-times"></i><span>Unlimited Channels</span> </li>
            </ul>
          </div>
          <div class="price-footer"> <a href="#" class="btn btn-main">Buy Now <span></span></a> </div>
        </div>        
      </div>
      <div class="col-lg-4 col-md-6">
        <!-- Start Single Pricing Sec Area -->
        <div class="price-box">
          <div class="price-box-header">
            <div class="price-name"> Freelance </div>
            <h5 class="price-val"> <sup>$</sup> 299 </h5>
          </div>
          <div class="price-box-content">
            <ul>
              <li><i class="icon-right fas fa-check"></i><span>1000 Max Connections</span> </li>
              <li><i class="icon-right fas fa-check"></i><span>Unlimited Support</span> </li>
              <li><i class="icon-del fas fa-times"></i><span>Medium SSL Protection</span> </li>
              <li><i class="icon-del fas fa-times"></i><span>Unlimited Channels</span> </li>
            </ul>
          </div>
          <div class="price-footer"> <a href="#" class="btn btn-main">Buy Now <span></span></a> </div>
        </div>        
      </div>
    </div>
   </div>
</section>
<!-- End Pricing Sec Area -->
<!-- Start Testimonials Sec Area -->
<section class="testimonials-sec">
  <div class="dots"></div>
  <div class="container">
   <div class="section-title text-center">
     <div class="section-sub-title">
       <h6> What Our Clients Say! </h6>
     </div>
     <div class="section-main-title">
       <h2> Testimonials </h2>
     </div>
     <div class="em_bar_bg"></div>
   </div>
   <div class="row">
     <div class="col-12">
      <div id="testimonial-carousel" class="testimonial-carousel box-shadow owl-carousel">
        <!-- Start Testimonials Item -->
        <div class="testi-item d-flex align-items-center"> <img src="{{ asset('assets/images/site/testi-1.jpg')}}" alt="img">
          <div class="testi-content">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante, commodo iacul viverra."</p>
            <h3>John Doe</h3>
            <ul class="rattings">
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
            </ul>
            <span>Director</span> </div>
          <i class="fa fa-quote-right"></i> </div>
           <!-- End Testimonials Item -->
                   <!-- Start Testimonials Item -->
        <div class="testi-item d-flex align-items-center"> <img src="{{ asset('assets/images/site/testi-2.jpg')}}" alt="img">
          <div class="testi-content">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante, commodo iacul viverra."</p>
            <h3>John Doe</h3>
            <ul class="rattings">
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
            </ul>
            <span>Director</span> </div>
          <i class="fa fa-quote-right"></i> </div>
           <!-- End Testimonials Item -->
           <!-- Start Testimonials Item -->
        <div class="testi-item d-flex align-items-center"> <img src="{{ asset('assets/images/site/testi-3.jpg')}}" alt="img">
          <div class="testi-content">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante, commodo iacul viverra."</p>
            <h3>John Doe</h3>
            <ul class="rattings">
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
              <li><i class="fa fa-star"></i></li>
            </ul>
            <span>Director</span> </div>
          <i class="fa fa-angle-right"></i> </div>
           <!-- End Testimonials Item -->
        </div>
        
     </div>
   </div>
  </div>
</section>
<!-- End Testimonials Sec Area -->
<!-- Start Blog Sec Area -->
<section class="blog-sec">
  <div class="container">
    <div class="section-title text-center">
      <div class="section-sub-title">
        <h6> our Blog </h6>
      </div>
      <div class="section-main-title">
        <h2> Our Latest Articles </h2>
      </div>
      <div class="em_bar_bg"></div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
         <!-- Start Single Blog Sec -->
         <div class="blog-card">
          <div class="blog-img"> <a href="blog-single.html"><img src="{{ asset('assets/images/site/blog-img1.jpg')}}" alt=""></a>
            <div class="blog-date"> <span>21 Feb</span> </div>
          </div>
          <div class="blog-text">
            <h3><a href="blog-single.html">7 Education Reports That Defined</a></h3>
            <div class="post-info"> <img src="{{ asset('assets/images/site/blog-author-1.png')}}" alt=""> <a href="#" class="ml-3">
              <p>Aikin Ward</p>
              </a> <a href="blog-single.html" class="blog-btn"> Read More <i class="fa fa-angle-right"></i>
              </a> </div>
          </div>
          <div></div>
        </div>        
      </div>
      <div class="col-lg-4 col-md-6">
        <!-- Start Single Blog Sec -->
        <div class="blog-card">
         <div class="blog-img"> <a href="blog-single.html"><img src="{{ asset('assets/images/site/blog-img2.jpg')}}" alt=""></a>
           <div class="blog-date"> <span>21 Feb</span> </div>
         </div>
         <div class="blog-text">
           <h3><a href="blog-single.html">7 Education Reports That Defined</a></h3>
           <div class="post-info"> <img src="{{ asset('assets/images/site/blog-author-2.png')}}" alt=""> <a href="#" class="ml-3">
             <p>Aikin Ward</p>
             </a> <a href="blog-single.html" class="blog-btn"> Read More <i class="fa fa-angle-right"></i>
             </a> </div>
         </div>
         <div></div>
       </div>        
     </div>
     <div class="col-lg-4 col-md-6">
      <!-- Start Single Blog Sec -->
      <div class="blog-card">
       <div class="blog-img"> <a href="blog-single.html"><img src="{{ asset('assets/images/site/blog-img3.jpg')}}" alt=""></a>
         <div class="blog-date"> <span>21 Feb</span> </div>
       </div>
       <div class="blog-text">
         <h3><a href="blog-single.html">7 Education Reports That Defined</a></h3>
         <div class="post-info"> <img src="{{ asset('assets/images/site/blog-author-3.png')}}" alt=""> <a href="#" class="ml-3">
           <p>Aikin Ward</p>
           </a> <a href="blog-single.html" class="blog-btn"> Read More <i class="fa fa-angle-right"></i>
           </a> </div>
       </div>
       <div></div>
     </div>        
   </div>
    </div>
  </div>
</section>
<!-- End Blog Sec Area -->
<!-- Start CTA Sec Area -->
<div class="cta-sec">
  <div class="container">
    <div class="wrapper-box">
      <h2>Are You Ready to Buy This Template! </h2>
     <div class="read-more"><a href="javascript:void(0)" class="bttn">Buy Now</a></div>
    </div>    
  </div>
</div>
<!-- End CTA Sec Area -->
<!-- Start Brand Wrapper -->
<div class="brand-wrapper">
  <div class="container">
    <div class="owl-carousel owl-theme brand-slider">
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-1.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-2.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-3.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-4.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-2.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-1.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-3.png')}}" alt="" title=""></a> </div>
      <div class="item"> <a target="_blank" href="JavaScript:Void(0)"> <img src="{{ asset('assets/images/site/client-logo-4.png')}}" alt="" title=""></a> </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
@component('components.site.footer')
@endcomponent
@endsection