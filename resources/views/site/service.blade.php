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
            <h2>Services</h2>
            <ul class="bread-list">
              <li><a href="index.html">Home</a></li>
              <li><i class="icofont-simple-right"></i></li>
              <li class="active">Services</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->
<!-- Start Feature section Area -->
<div class="inner-content-wrapper services-sec">
  <div class="container">
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
<!-- End Counter Sec Area --> 


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