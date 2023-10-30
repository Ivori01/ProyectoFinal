@extends('layouts.site',['title'=>'Docente | Aula Virtual'])

@section('header')
@component('components.site.header')
@endcomponent
@endsection

@section('content')
<div class="breadcrumbs overlay">
    <div class="container">
      <div class="bread-inner">
        <div class="row">
          <div class="col-12">
            <h2>Blog</h2>
            <ul class="bread-list">
              <li><a href="index.html">Home</a></li>
              <li><i class="icofont-simple-right"></i></li>
              <li class="active">Blog Grid</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->
<!-- Start Feature section Area -->
<div class="inner-content-wrapper blog-sec">
  <div class="container">
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
                </a> <a href="blog-single.html" class="blog-btn"> Read More <i class="fa fa-angle-right" aria-hidden="true"></i>
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
               </a> <a href="blog-single.html" class="blog-btn"> Read More <i class="fa fa-angle-right" aria-hidden="true"></i>
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
             </a> <a href="blog-single.html" class="blog-btn"> Read More <i class="fa fa-angle-right" aria-hidden="true"></i>
             </a> </div>
         </div>
         <div></div>
       </div>        
     </div>
      <div></div></div>
  </div>
</div>
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