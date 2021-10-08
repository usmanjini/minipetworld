@extends('layouts.master')

@section('title', 'about')

@section('content')
 <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(assets/img/banner/banner-2.jpg);">
         <div class="container">
            <div class="breadcrumb-content text-center">
               <h2>About Us</h2>
               <ul>
                  <li><a href="{{route('home')}}">home</a></li>
                  <li class="active">About Us</li>
               </ul>
            </div>
         </div>
      </div> 
	  
	        <div class="about-us-area pt-100 pb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="about-us-img pr-30 wow fadeInLeft"><img alt="" src="assets/img/banner/banner-3.png"></div>
               </div>
               <div class="col-lg-6 col-md-6 d-flex align-items-center">
                  <div class="about-us-content">
                     <h2>About Marten</h2>
                     <p>Lorem ipsum dolor sit amet, consectetur adipis elit, sed do eiusmod tempor incididu ut labore et dolore magna aliqua. Ut enim ad minim  quis nostrud exercitat ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                     <div class="about-us-list">
                        <ul>
                           <li>There are many variations of passages</li>
                           <li>Contrary to popular belief is not simply</li>
                           <li>But I must explain to you how all this mistaken</li>
                        </ul>
                     </div>
                     <div class="about-us-btn"><a class="btn-style" href="#">CONTACT US</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="project-count-area pb-70 pt-100 gray-bg">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="single-count mb-30 text-center">
                     <h2 class="count">18</h2>
                     <span>Years in Business</span>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="single-count mb-30 text-center">
                     <h2 class="count">290</h2>
                     <span>Happy People</span>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="single-count mb-30 text-center">
                     <h2 class="count">24</h2>
                     <span>Billion Sales</span>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                  <div class="single-count mb-30 text-center">
                     <h2 class="count">17</h2>
                     <span>Award Winning</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="testimonial-area pt-90 pb-70 bg-img" style="background-image:url(assets/img/banner/banner-1.jpg);">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 ml-auto mr-auto">
                  <div class="testimonial-wrap">
                     <div class="testimonial-text-slider text-center">
                        <div class="sin-testiText">
                           <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="sin-testiText">
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or amro porano ja cai tomi tai go amro porano  amro porano ja cai tomi tai go  ....</p>
                        </div>
                        <div class="sin-testiText">
                           <p>Lorem ipsum dolor sit amet, co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercita ullamco laboris nisi ut aliquip ex ea commodo</p>
                        </div>
                        <div class="sin-testiText">
                           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or amro porano ja cai tomi tai go amro porano  amro porano ja cai tomi tai go  ....</p>
                        </div>
                     </div>
                     <div class="testimonial-image-slider text-center">
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/3.jpg" alt="">
                           <h3>Samia Robiul</h3>
                           <h5>Customer</h5>
                        </div>
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/4.jpg" alt="">
                           <h3>Samia Robiul</h3>
                           <h5>Customer</h5>
                        </div>
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/3.jpg" alt="">
                           <h3>F H Shuvo</h3>
                           <h5>Developer</h5>
                        </div>
                        <div class="sin-testiImage">
                           <img src="assets/img/testi/5.jpg" alt="">
                           <h3>T T Rayed</h3>
                           <h5>CEO</h5>
                        </div>
                     </div>
                     <div class="testimonial-shap"><img src="assets/img/icon-img/testi-shap.png" alt=""></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="team-ara pt-95 pb-70">
         <div class="container">
            <div class="section-title text-center mb-55">
               <h2>Our Team</h2>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing</p>
            </div>
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="team-wrapper mb-30">
                     <div class="team-img">
                        <a href="#"><img src="assets/img/team/team-1.jpg" alt=""></a>
                        <div class="team-social"><a href="#"><i class="ti-facebook"></i></a><a href="#"><i class="ti-pinterest"></i></a><a href="#"><i class="ti-twitter-alt"></i></a><a href="#"><i class="ti-instagram"></i></a></div>
                     </div>
                     <div class="team-content text-center">
                        <h4>Adam Jonson</h4>
                        <span>Customer</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="team-wrapper mb-30">
                     <div class="team-img">
                        <a href="#"><img src="assets/img/team/team-2.jpg" alt=""></a>
                        <div class="team-social"><a href="#"><i class="ti-facebook"></i></a><a href="#"><i class="ti-pinterest"></i></a><a href="#"><i class="ti-twitter-alt"></i></a><a href="#"><i class="ti-instagram"></i></a></div>
                     </div>
                     <div class="team-content text-center">
                        <h4>Rose Evans</h4>
                        <span>Manager</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="team-wrapper mb-30">
                     <div class="team-img">
                        <a href="#"><img src="assets/img/team/team-3.jpg" alt=""></a>
                        <div class="team-social"><a href="#"><i class="ti-facebook"></i></a><a href="#"><i class="ti-pinterest"></i></a><a href="#"><i class="ti-twitter-alt"></i></a><a href="#"><i class="ti-instagram"></i></a></div>
                     </div>
                     <div class="team-content text-center">
                        <h4>Bruce Cole</h4>
                        <span>Customer</span>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="team-wrapper mb-30">
                     <div class="team-img">
                        <a href="#"><img src="assets/img/team/team-4.jpg" alt=""></a>
                        <div class="team-social"><a href="#"><i class="ti-facebook"></i></a><a href="#"><i class="ti-pinterest"></i></a><a href="#"><i class="ti-twitter-alt"></i></a><a href="#"><i class="ti-instagram"></i></a></div>
                     </div>
                     <div class="team-content text-center">
                        <h4>Debra Lane</h4>
                        <span>Manager</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
@endsection