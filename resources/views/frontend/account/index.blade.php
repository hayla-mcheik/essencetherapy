@extends('layouts.app')
@section('title','Account Page')
@section('content')
    <!--== Start Account Area Wrapper ==-->
    <section>
        <div class="container" data-padding-top="62"> 
          <h4 class="fz-24 mb-25">Your account</h4>
          <div class="row">
            <div class="col-lg-4 col-sm-6">
              <div class="account-item">
                <div class="account-inner mb-30">
                  <a href="{{ url('profile') }}">
                    <i class="fa fa-user-circle"></i>
                    <span>Information</span>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6">
              <div class="account-item">
                <div class="account-inner mb-30">
                  <a href="{{ url('orders') }}">
                    <i class="fa fa-calendar"></i>
                    <span>Order history and details</span>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="account-item">
                  <div class="account-inner">
                    <a href="#"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">   <i class="fa fa-smile-o"></i>
                      <span>Sign out</span></a>
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
       </form>

       
                   
                    </a>
                  </div>
                </div>
              </div>

              {{-- <div class="col-lg-4 col-sm-6">
                <div class="account-item">
                  <div class="account-inner mb-30">
                    <a href="{{ url('wishlist') }}">
                      <i class="fa fa-heart"></i>
                      <span>Wishlist</span>
                    </a>
                  </div>
                </div>
              </div> --}}
              <div class="col-lg-4 col-sm-6">
                <div class="account-item">
                  <div class="account-inner mb-30">
                    <a href="{{ url('cart') }}">
                      <i class="icon-bag icon"></i>
                      <span>Cart</span>
                    </a>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </section>
      <!--== End Account Area Wrapper ==-->
  
@endsection