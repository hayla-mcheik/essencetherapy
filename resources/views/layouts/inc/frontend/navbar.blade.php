<!--== Start Header Wrapper ==-->
  <header class="header-area header-default header-style2">
    <!--== Start Header Top ==-->
    <div class="header-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 hidden-md-down">
            <div class="contact-email">
              <span>Email us: <a href="mailto:admin@accessories.com">info@talyscollection.com</a></span>
            </div>
          </div>

                <div class="col-md-6 col-lg-4 text-md-start text-lg-center text-center">
                    <div class="luxury-ticker">
                        <div class="ticker-item text-white">✨ Free Delivery on all orders over $100</div>
                        <div class="ticker-item text-white">💎 New Jewelry Collection is Live</div>
                        <div class="ticker-item text-white">🌸 Handcrafted with Love in Lebanon</div>
                    </div>
                </div>
          <div class="col-md-6 col-lg-4 text-md-end text-center mt-sm-15">
            @guest
            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                Login/Register
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                @if (Route::has('login'))
                <li>
                  <a href="{{ url('login') }}">Login</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li>
                  <a href="{{ url('register') }}">Register</a>
                </li>
@endif


              </ul>
            </div>

            @elseif (auth()->user()->role_as == '1')
            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                {{ Auth::user()->name }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="{{ url('admin/dashboard') }}">My Dashboard</a>
                </li>
                <li >
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign Out</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </li>

              </ul>
            </div>
@else

            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                {{ Auth::user()->name }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="{{ url('account') }}">My account</a>
                </li>
       
                <li >
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign Out</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </li>

              </ul>
            </div>
            @endif
                     <div class="theme-currency">
              <a class="dropdown-btn" href="#" role="button">
          USD $
              </a>
     
            </div>
         
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Top ==-->

    <!--== Start Header Middle ==-->
    <div class="header-middle hidden-md-down">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col col-md-4 col-sm-12">
            <div class="contact-link">
      <div class="contact-info">
    <span class="phone" style="display: block; font-weight: 600; margin-bottom: 3px;">
        Talk To Us: <a href="tel:00961 79353846" style="color: #D97DA5;">00961 79353846</a>
    </span>
    <div class="time-contact" style="font-size: 9px; color: #aaa; text-transform: uppercase; letter-spacing: 1.2px; line-height: 1.4;">
        Our style concierge is at your service Monday through Saturday, 9 AM – 10 PM
    </div>
</div>
            </div>
          </div>
          <div class="col col-md-4 col-sm-12">
            <div class="header-logo-area text-center">
              <a href="{{url('/') }}">
                <img class="logo-main" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                <img class="logo-light d-none" src="{{asset('assets/img/logo-light.png')}}" alt="Logo">
              </a>
            </div>
          </div>
          <div class="col col-md-4 col-sm-12">
            <div class="header-action-area float-end">
              {{-- <div class="search-content-wrap">
                <button class="btn-search">
                  <span class="icon icon-search icon-magnifier"></span>
                </button>
                <div class="btn-search-content">
                  <form action="{{ url('search') }}" method="GET" role="search">
                    <div class="form-input-item">
                      <input type="text" placeholder="Enter your search key ..."  value="{{ Request::get('search') }}" name="search">
                      <button type="submit" class="btn-src">
                        <i class="icon-magnifier"></i>
                      </button>
          
                    </div>
                  </form>
                </div>
              </div> --}}
              <div class="shop-button-group">
       
                    <div class="shop-button-item">
                      <a class="shop-button" href="{{ url('wishlist') }}">
                        <i class="icon-heart icon"></i>
                        <sup class="shop-count"><livewire:frontend.wishlist-count /></sup>
                      </a>
                    </div>
                <div class="shop-button-item">
                  <a class="shop-button">
                    <i class="icon-bag icon"></i>
                    <sup class="shop-count"><livewire:frontend.cart.cart-count /></sup>
   
                  <livewire:frontend.cart.total-amount-cart />
                  </a>
                  <div class="popup-cart-content">
                    <livewire:frontend.cart.cart-items />
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Middle ==-->

    <!--== Start Header Bottom ==-->
    <div class="header-bottom sticky-header hidden-md-down">
      <div class="container">
        <div class="row align-items-center">
          <div class="col col-12 position-relative">
            <div class="header-align align-default justify-content-center">
              <div class="header-navigation-area hidden-md-down">
                <ul class="main-menu nav">
              
                      <li><a href="{{ url('aboutus') }}">About Us</a></li>
                      <li><a href="{{ url('collections')}}">Shop Products</a>
                      <li><a href="{{ url('collections')}}">Jewellery</a>
                      <li><a href="{{ url('collections')}}">lunette</a>
                      <li><a href="{{ url('collections')}}">bags</a>
                      <li><a href="{{ url('collections')}}">makeup</a>
                      <li><a href="{{ url('blogs')}}">News</a>           
                      </li>
                      <li><a href="{{ url('contactus') }}">Contact us</a></li>
                    </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Bottom ==-->

    <!--== Start Responsive Header ==-->
    <div class="responsive-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <div class="header-item">
              <button class="btn-menu" type="button"><i class="icon-menu"></i></button>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-center">
              <div class="header-logo-area">
                <a href="{{ url('/')}}">
                  <img class="logo-main" src="assets/img/logo.png" alt="Logo">
                </a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-end">
              <button class="btn-user" onclick="window.location.href='{{url('account') }}'"><i class="icon-user"></i></button>
              <button class="btn-cart" onclick="window.location.href='{{url('cart')}}'"><i class="icon-bag"></i> <span class="item-count"><livewire:frontend.cart.cart-count /></span></button>
               <button class="btn-cart" onclick="window.location.href='{{url('wishlist')}}'"><i class="icon-heart"></i> <span class="item-count"><livewire:frontend.wishlist-count /></span></button>
       
              </div>
          </div>
          {{-- <div class="col-12">
            <div class="responsive-search-content">
              <form action="{{ url('search') }}" method="GET" role="search">
                <div class="form-input-item">
                  <input type="text" placeholder="Enter your search key ..."  value="{{ Request::get('search') }}" name="search">
                  <button type="submit" class="btn-src">
                    <i class="icon-magnifier"></i>
                  </button>
           
                </div>
              </form>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    <!--== End Responsive Header ==-->
  </header>
  <!--== End Header Wrapper ==-->
<style>
    
    /* Small text aesthetic for luxury feel */
    .header-top, 
    .main-menu li a, 
    .contact-info span, 
    .dropdown-btn {
      font-size: 13px !important; 
      text-transform: capitalize;
      font-weight: 700;
    }

    .header-top {
      border-bottom: 1px solid #f2f2f2;
      padding: 6px 0;
    }

    .shop-count {
      background: #D97DA5 !important; /* Subtle gold/neutral tone for accessories */
      font-size: 9px !important;
    }

    .icon-user {
      display: none;
    }

    /* Sticky Blur Effect */
    .sticky-header.sticky-on {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .header-area .header-top .contact-email span{
      font-size: 13px !important;
        text-transform: capitalize;
        font-weight: 700;
    }
      .header-area .header-top .contact-email span a { 
          text-transform: lowercase;
      }
  /* ANIMATED TICKER CSS */
    .luxury-ticker {
        height: 20px;
        overflow: hidden;
        position: relative;
    }
    .ticker-item {
        font-size: 12px;
        font-weight: 600;
        text-transform: lowercase;

        color: #D97DA5; /* Matches your logo pink */
        line-height: 20px;
        animation: tickerAnimation 9s infinite;
        position: absolute;
        width: 100%;
        opacity: 0;
    }
    .ticker-item:nth-child(1) { animation-delay: 0s; }
    .ticker-item:nth-child(2) { animation-delay: 3s; }
    .ticker-item:nth-child(3) { animation-delay: 6s; }

    @keyframes tickerAnimation {
        0% { opacity: 0; transform: translateY(10px); }
        5% { opacity: 1; transform: translateY(0); }
        30% { opacity: 1; transform: translateY(0); }
        35% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 0; }
    }
    @media (max-width: 991px) {
     .logo-main {
      max-width: 90px !important; /* Forces logo to be small and elegant */
      height: auto;
      transition: transform 0.3s ease;
    }
    
}
    @media (min-width: 991px) {
     .logo-main {
      max-width: 100px !important; /* Forces logo to be small and elegant */
      height: auto;
      transition: transform 0.3s ease;
    }
    
}
  </style>