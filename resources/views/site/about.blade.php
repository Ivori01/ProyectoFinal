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
            <h2>About Us</h2>
            <ul class="bread-list">
              <li><a href="index.html">Home</a></li>
              <li><i class="icofont-simple-right"></i></li>
              <li class="active">About Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->
<!-- Start Feature section Area -->
<div class="inner-content-wrapper about-sec">
  <div class="container">
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