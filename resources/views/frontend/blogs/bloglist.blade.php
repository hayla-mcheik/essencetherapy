@extends('layouts.app')
@section('title','Blogs Page')
@section('content')
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area bg-img" data-bg-img="assets/img/photos/bg-02.jpg">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <div class="page-header-content">
                <nav class="breadcrumb-area">
                  <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                    <li>News</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
  
      <!--== Start Blog Area Wrapper ==-->
      <section class="blog-area">
        <div class="container pb-80">
          <div class="row">
            @forelse($blogs as $blog)
            <div class="col-sm-6 col-lg-4">
              <!--== Start Blog Item ==-->
              <div class="post-item">
                <div class="inner-content mb-70 mb-md-30">
                  <div class="thumb">
                    <a href="{{ url('blog/details/'. $blog->id) }}"><img src="{{ asset($blog->image)}}" class="img" alt="Image-HasTech"></a>
                  </div>
                  <div class="content">
                    <h4 class="title"><a href="{{ url('blog/details/'. $blog->id) }}">{{ $blog->title }}</a></h4>
     
                  </div>
                </div>
              </div>
              <!--== End Blog Item ==-->
            </div>
            @empty
            <div class="col-12">
      <p>No Blogs Available
            </div>
   @endforelse
          </div>
        </div>
      </section>
      <!--== End Blog Area Wrapper ==-->
@endsection