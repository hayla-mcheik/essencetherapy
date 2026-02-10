@extends('layouts.app')
@section('title','About Us')

@section('content')

    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/bg-02.webp')}}">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="page-header-content">
                <nav class="breadcrumb-area">
                  <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                    <li>About us</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
  
      <!--== Start About Area Wrapper ==-->
      <section class="about-area about-page-area">
        <div class="container">
          <div class="row about-page-wrap">
            <div class="col-md-6">
              <div class="about-content">
                <h3 class="title">Cartic Story, We Craft Awesome Stuff With Great Experiences.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat Duis aute irure dolor</p>
       
              </div>
            </div>
            <div class="col-md-6">
              <div class="about-thumb">
                <img src="{{ asset('assets/img/about/01.jpg')}}" alt="Image-HasTech" class="img">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--== End About Area Wrapper ==-->
  

@endsection