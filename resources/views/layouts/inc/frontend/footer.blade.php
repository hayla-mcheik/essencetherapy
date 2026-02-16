<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!--== Start Footer Widget Area ==-->
        {{-- <div class="footer-widget-area pb-30">
          <div class="row">
            <div class="col-lg-6">
              <div class="widget-item">
                <div class="about-widget">
                  <div class="inner-content">
                    <div class="footer-logo">
                      <a href="{{ url('/') }}">
                        <img class="logo-light" src="{{ asset('assets/img/logo-light.png')}}" alt="Logo">
                      </a>
                    </div>
                    <p class="mt-3">{{ $appSetting->address ?? 'Beirut, Lebanon' }}</p>
                  </div>
                  <div class="widget-desc mt-3">
                    <p>{{ $appSetting->meta_description ?? 'Corporate clients and leisure travelers have been relying on Lakanto for dependable, safe, and professional monk fruit products.' }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="widget-item">
                <div class="widget-menu-wrap">
                  <ul class="nav-menu">
                    <li><a href="{{ url('aboutus') }}">Why Lakanto MonkFruit</a></li>
                    <li><a href="{{ url('contactus') }}">Contact us</a></li>
                    <li><a href="{{ url('blogs') }}">Health News</a></li>
                    <li><a href="{{ url('collections') }}">Stores</a></li>
     
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
        <!--== End Footer Widget Area ==-->
      </div>
    </div>
  </div>
  <!--== Start Footer Bottom Area ==-->
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
<div class="col-lg-12 col-md-12 text-center text-lg-center mb-3 mb-lg-0">
    <p class="copyright mb-0">
        Copyright © {{ date('Y') }} Taly's Collection. All Rights Reserved
    </p>
</div>

        {{-- <div class="col-lg-6 col-md-12 text-center text-lg-end">
          <div class="payment">
            <img src="{{ asset('assets/img/photos/payment.png')}}" alt="Payment Methods" class="img-fluid">
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  <!--== End Footer Bottom Area ==-->
</footer>
<!--== End Footer Area Wrapper ==-->