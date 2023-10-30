@extends('layouts.site',['title'=>'Docente | Aula Virtual'])

@section('header')
@component('components.site.header')
@endcomponent
@endsection

@section('content')
<div class="inner-content-wrapper blog-sec blog-area">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 col-lg-8 mb-30">
        <div class="blog-details">
          <div class="blogs-wrapper mb-35 pos-rel">
            <div class="blog-img"> <a href="javascript:void(0)"><img src="{{ asset('assets/images/site/services-img.jpg')}}" alt=""></a>
              <div class="blog-text">
                <div class="blog-meta"> <span><a href="javascript:void(0)"> <i class="fa fa-calendar-alt"></i>19 May, 2020</a></span> <span> <a href="javascript:void(0)"> <i class="fa fa-user-alt"></i>BY ADMIN</a></span> </div>
                <h4><a href="javascript:void(0)">Tips on Finding the Best Maid Cleaning Service</a></h4>
              </div>
            </div>
          </div>
          <div class="post-text mb-20">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna
              aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo.</p>
            <p>Bccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum. Sed ut perspiciatis
              unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
              aperiam, eaque ipsa quae ab
              illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
              enim ipsam voluptatem quia
              voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui
              ratione voluptatem sequi
              nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
              adipisci velit, sed quia non
              numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
              voluptatem.</p>
            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
              <footer>- Rosalina Pong</footer>
            </blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna
              aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat.
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
              nulla pariatur. Excepteur sint
              occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna
              aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat.
              Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
              fugiat nulla pariatur. Excepteur
              sint
              occaecat cupidatat non proident, sunt in culpa qui officia.</p>
          </div>
          <div class="row mt-50">
            <div class="col-xl-8 col-lg-8 col-md-8 mb-15">
              <div class="blog-post-tag"> <span>Releted Tags</span> <a href="#">Course</a> <a href="javascript:void(0)">HTML</a> <a href="#">Responsive</a> </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 mb-15">
              <div class="blog-share-icon text-left text-md-right"> <span>Share: </span> <a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a> <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a> <a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="navigation-border pt-50 mt-40"></div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="bakix-navigation b-next-post text-left mb-30"> <span><a href="#">Prev Post</a></span>
                <h4><a href="#">Tips on Minimalist</a></h4>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="bakix-navigation b-next-post text-left text-md-right  mb-30"> <span><a href="#">Next Post</a></span>
                <h4><a href="#">Tips on Minimalist</a></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="b-author mt-40 mb-60">
          <div class="author-img"> <img src="{{ asset('assets/images/site/author.png')}}" alt=""> </div>
          <div class="author-text">
            <h3>MD. Salim Rana</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip . </p>
            <div class="author-icon"> <a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a> <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a> <a href="javascript:void(0)"><i class="fa fa-behance-square"></i></a> <a href="javascript:void(0)"><i class="fa fa-youtube"></i></a> <a href="javascript:void(0)"><i class="fa fa-vimeo-v"></i></a> </div>
          </div>
        </div>
        <div class="post-comments">
          <div class="blog-coment-title mb-30">
            <h2>03 Comments</h2>
          </div>
          <div class="latest-comments">
            <ul>
              <li>
                <div class="comments-box">
                  <div class="comments-avatar"> <img src="{{ asset('assets/images/site/comments1.png')}}" alt=""> </div>
                  <div class="comments-text">
                    <div class="avatar-name">
                      <h5>Karon Balina</h5>
                      <span>19th May 2018</span> <a class="reply" href="javascript:void(0)"><i class="fas fa-reply"></i>Reply</a> </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt
                      ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
              </li>
              <li class="children">
                <div class="comments-box">
                  <div class="comments-avatar"> <img src="{{ asset('assets/images/site/comments2.png')}}" alt=""> </div>
                  <div class="comments-text">
                    <div class="avatar-name">
                      <h5>Julias Roy</h5>
                      <span>19th May 2018</span> <a class="reply" href="javascript:void(0)"><i class="fas fa-reply"></i>Reply</a> </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt
                      ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation
                      ullamco laboris nisi ut aliquip.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="comments-box">
                  <div class="comments-avatar"> <img src="{{ asset('assets/images/site/comments3.png')}}" alt=""> </div>
                  <div class="comments-text">
                    <div class="avatar-name">
                      <h5>Arista Williamson</h5>
                      <span>19th May 2018</span> <a class="reply" href="javascript:void(0)"><i class="fas fa-reply"></i>Reply</a> </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt
                      ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                      exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="post-comments-form">
          <div class="post-comments-title">
            <h2>Post Comments</h2>
          </div>
          <form id="contacts-form" class="conatct-post-form" action="#">
            <div class="row">
              <div class="col-xl-12">
                <div class="contact-icon contacts-name">
                  <input type="text" placeholder="Your Name">
                </div>
              </div>
              <div class="col-xl-12">
                <div class="contact-icon contacts-email">
                  <input type="email" placeholder="Your Email">
                </div>
              </div>
              <div class="col-xl-12">
                <div class="contact-icon contacts-message">
                  <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Your Comments"></textarea>
                </div>
              </div>
              <div class="col-xl-12">
                <button class="btn" type="submit"> Post comment <i class="far fa-long-arrow-right"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 mb-30">
        <div class="widget mb-40">
          <form class="search-form">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <div class="widget mb-40">
          <h3 class="widget-title">Popular Feeds</h3>
          <ul class="recent-posts">
            <li>
              <div class="widget-posts-image"> <a href="javascript:void(0)"><img src="{{ asset('assets/images/site/001.jpg')}}" alt=""></a> </div>
              <div class="widget-posts-body">
                <h6 class="widget-posts-title"><a href="javascript:void(0)">Fluid Responsive Typography
                  With CSS Poly Fluid Sizing.</a></h6>
                <div class="widget-posts-meta">October 18, 2018 </div>
              </div>
            </li>
            <li>
              <div class="widget-posts-image"> <a href="javascript:void(0)"><img src="{{ asset('assets/images/site/002.jpg')}}" alt=""></a> </div>
              <div class="widget-posts-body">
                <h6 class="widget-posts-title"><a href="javascript:void(0)">An Abridged Cartoon Introdu
                  Ction To WebAssembly.</a></h6>
                <div class="widget-posts-meta">October 24, 2018 </div>
              </div>
            </li>
            <li>
              <div class="widget-posts-image"> <a href="javascript:void(0)"><img src="{{ asset('assets/images/site/003.jpg')}}" alt=""></a> </div>
              <div class="widget-posts-body">
                <h6 class="widget-posts-title"><a href="javascript:void(0)">Basic Patterns Mobile Navig
                  Pros And Cons WebAss</a></h6>
                <div class="widget-posts-meta">October 28, 2018 </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="widget mb-40">
          <h3 class="widget-title">Categories</h3>
          <ul class="service-list">
            <li> <a href="javascript:void(0)">Sea Freight </a> </li>
            <li> <a href="javascript:void(0)">Road Freight </a> </li>
            <li> <a href="javascript:void(0)">Packaging </a> </li>
            <li> <a href="javascript:void(0)">Supply Chain </a> </li>
            <li> <a href="javascript:void(0)">Home Delivery </a> </li>
          </ul>
        </div>
        <div class="widget mb-40">
          <h3 class="widget-title">Social Profile</h3>
          <div class="social-profile"> <a href="javascript:void(0)"><i class="fa fa-facebook-f"></i></a> <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a> <a href="javascript:void(0)"><i class="fa fa-behance"></i></a> <a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a> <a href="javascript:void(0)"><i class="fa fa-youtube"></i></a> </div>
        </div>
        <div class="widget">
          <h3 class="widget-title">Popular Tags</h3>
          <div class="tag"> <a href="javascript:void(0)">Popular</a> <a href="javascript:void(0)">desgin</a> <a href="javascript:void(0)">usability</a> <a href="javascript:void(0)">develop</a> <a href="javascript:void(0)">consult</a> <a href="javascript:void(0)">icon</a> <a href="javascript:void(0)">HTML</a> <a href="javascript:void(0)">ux</a> <a href="javascript:void(0)">business</a> <a href="javascript:void(0)">kit</a> <a href="javascript:void(0)">keyboard</a> <a href="javascript:void(0)">tech</a> </div>
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