@extends('layouts.app')
@section('title','Blog Details Page')
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
                    <li>News Details</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
  
      <!--== Start Blog Area Wrapper ==-->
      <section class="blog-area blog-single-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 order-1 order-lg-1">
              <!--== Start Sidebar Area ==-->
              <div class="sidebar-area inner-left-padding">
   

                <div class="widget-item">
                  <div class="widget-title">
                    <h3 class="title">Recent Post</h3>
                  </div>
                  <div class="widget-body">
                    @foreach($blogs as $blog)
                    <div class="widget-blog-post">
                      <ul>
                        <li>
                          <div class="thumb">
                            <a href="{{ url('blog/details/' . $blog->id)}}"><img src="{{ asset($blog->image) }}" alt="Image-HasTech"></a>
                          </div>
                          <div class="content">
                            <span>{{ $blog->date }}</span>
                            <h4><a>{{ $blog->title }}</a></h4>
                          </div>
                        </li>
                      </ul>
                    </div>
                    @endforeach
                  </div>
                </div>

              </div>
              <!--== End Sidebar Area ==-->
            </div>
            <div class="col-lg-8 order-0 order-lg-2">
              <div class="row">
                <div class="col-12">
                  <!--== Start Blog Item ==-->
                  <div class="post-single-item">
                    <div class="thumb">
                      <img src="{{ asset($blog->image) }}" class="img" alt="Image-HasTech">
                    </div>
                    <div class="content">
                      <div class="meta">
                        <ul>
                          <li><a class="date">{{ $blog->date }}</a></li>
                        </ul>
                      </div>
                      <h2 class="title">{{$blog->title }}</h2>
                      <p class="p-text1">{{ $blog->description }}</p>
                    </div>
 
                  </div>
                  <!--== End Blog Item ==-->
                </div>
              </div>
             
            </div>
          </div>
        </div>
      </section>
      <!--== End Blog Area Wrapper ==-->
@endsection