@extends('layouts.app')
@section('title','Contact Us')

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
                    <li>Contact us</li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--== End Page Header Area Wrapper ==-->
  
      <!--== Start Contact Area Wrapper ==-->
      <section class="contact-area contact-page-area">
        <div class="container">
          <div class="row contact-page-wrapper">
            <div class="col-lg-6">
              <div class="contact-form-wrap">
                <div class="contact-form-title">
                  <h5 class="sub-title">Don't worry!</h5>
                  <h2 class="title">If you have any query? Contact with us.</h2>
                </div>
                
                <!-- Display Validation Errors -->
                @if ($errors->any())
                  <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                
                <!-- Display Success Message -->
                @if (session('success'))
                  <div class="alert alert-success mb-4">
                    {{ session('success') }}
                  </div>
                @endif
                
                <!--== Start Contact Form ==-->
                <div class="contact-form">
                  <form id="contact-form" action="{{ url('contact/submit') }}" method="POST">
                    @csrf
                  <!-- In your contact.blade.php file -->
<div class="row row-gutter-20">
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control @error('name') is-invalid @enderror" 
                   type="text" 
                   name="name" 
                   placeholder="Name" 
                   value="{{ old('name') }}"
                   requi#d40707>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control @error('email') is-invalid @enderror" 
                   type="email" 
                   name="email" 
                   placeholder="Email" 
                   value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control @error('phone') is-invalid @enderror" 
                   type="tel" 
                   name="phone" 
                   placeholder="Phone" 
                   value="{{ old('phone') }}"
                   requi#d40707>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control @error('subject') is-invalid @enderror" 
                   type="text" 
                   name="subject" 
                   placeholder="Subject" 
                   value="{{ old('subject') }}"
                   requi#d40707>
            @error('subject')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <textarea class="form-control @error('message') is-invalid @enderror" 
                      name="message" 
                      placeholder="Message"
                      requi#d40707>{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="form-group mb--0">
            <button class="btn-theme" type="submit">Submit Now</button>
        </div>
    </div>
</div>
                  </form>
                </div>
                <!--== End Contact Form ==-->
              </div>
            </div>
        <div class="col-lg-6">
    <div class="contact-info-list">
        <div class="contact-info">
            <div class="info-item">
                <div class="info">
                    <h5 class="title">Phone:</h5>
                    <p>
                        <a href="tel:{{ $appSetting->phone1 ?? '00961 3 979504' }}">
                            {{ $appSetting->phone1 ?? '00961 3 979504' }}
                        </a>
                        @if($appSetting->phone2)
                            <br>
                            <a href="tel:{{ $appSetting->phone2 }}">
                                {{ $appSetting->phone2 }}
                            </a>
                        @endif
                    </p>
                </div>
            </div>

            <div class="info-item">
                <div class="info">
                    <h5 class="title">Email:</h5>
                    <p>
                        <a href="mailto:{{ $appSetting->email1 ?? 'info@talyscollection.com' }}">
                            {{ $appSetting->email1 ?? 'info@talyscollection.com' }}
                        </a>
                        @if($appSetting->email2)
                            <br>
                            <a href="mailto:{{ $appSetting->email2 }}">
                                {{ $appSetting->email2 }}
                            </a>
                        @endif
                    </p>
                </div>
            </div>

            <div class="info-item">
                <div class="info">
                    <h5 class="title">Address:</h5>
                    <p>
                        {!! nl2br(e($appSetting->address ?? "PH trading SARL\nMansourieh Maten, main street")) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
          </div>
        </div>
      </section>
      <!--== End Contact Area Wrapper ==-->
@endsection