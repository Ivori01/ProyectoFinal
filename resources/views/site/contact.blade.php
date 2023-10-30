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
          <h2>Contact Us</h2>
          <ul class="bread-list">
            <li><a href="index.html">Home</a></li>
            <li><i class="icofont-simple-right"></i></li>
            <li class="active">Contact Us</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumbs --> 
<!-- Start Feature section Area -->
<div class="inner-content-wrapper contact-section">
    <div class="container">
        <div class="sec-title centered mb-20">
          <h1>Send Us A Message</h1>
        </div>
        <div class="default-form-area">
          <form id="contact-form">
            <div class="row clearfix">
              <div class="col-md-6 column">
                <div class="form-group">
                  <input type="text" name="form_name" class="form-control" value="" placeholder="Name" required>
                </div>
              </div>
              <div class="col-md-6 column">
                <div class="form-group">
                  <input type="email" name="form_email" class="form-control required email" value="" placeholder="Email" required>
                </div>
              </div>
              <div class="col-md-6 column">
                <div class="form-group">
                  <input type="text" name="form_phone" class="form-control" value="" placeholder="Phone">
                </div>
              </div>
              <div class="col-md-6 column">
                <div class="form-group">
                  <input type="text" name="form_subject" class="form-control" value="" placeholder="Subject">
                </div>
              </div>
              <div class="col-md-12 column">
                <div class="form-group">
                  <textarea name="form_message" class="form-control textarea required" placeholder="Message..."></textarea>
                </div>
              </div>
            </div>
            <div class="contact-section-btn">
              <div class="form-group style-two">
                <button class="btn" type="submit" data-loading-text="Please wait...">Send Message</button>
              </div>
            </div>
          </form>
        </div>
        <!-- End form -->
        
        <div class="contact-info">
          <div class="sec-title centered mb-20">
            <h1>Get In Touch</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="contact-info-block">
                <h5>Address</h5>
                <div class="text">0142 Hoffman Avenue, Brooklyn New York, NY-11206</div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="contact-info-block">
                <h5>Email</h5>
                <div class="text">info@test.com</div>
                <div class="text">test@test.com</div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="contact-info-block">
                <h5>Phone</h5>
                <div class="text">+1 (012) 456-1256</div>
                <div class="text">+1 (145) 385-8564</div>
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