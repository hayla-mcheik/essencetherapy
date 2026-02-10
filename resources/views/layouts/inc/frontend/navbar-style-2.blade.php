<header class="header-area header-default header-style">
  <div class="header-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 text-md-start text-center"></div>
        <div class="col-md-6 text-md-end text-center mt-sm-15">
          @guest
          <div class="theme-setting">
            <a class="dropdown-btn" href="#" role="button">
              Login/Register
              <i class="ion-ios-arrow-down"></i> 
            </a>
            <ul class="dropdown-content">
              @if (Route::has('login'))
              <li><a href="{{ url('login') }}">Login</a></li>
              @endif
              @if (Route::has('register'))
              <li><a href="{{ url('register') }}">Register</a></li>
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
              <li><a href="{{ url('admin/dashboard') }}">My Dashboard</a></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
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
              <li><a href="{{ url('account') }}">My account</a></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
              </li>
            </ul>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="header-bottom sticky-header hidden-md-down">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col col-12">
          <div class="header-align align-default">
            <div class="align-left">
              <div class="header-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                  <img class="logo-light d-none" src="{{ asset('assets/img/logo-light.png')}}" alt="Logo">
                </a>
              </div>
              <div class="header-navigation-area hidden-md-down">
                <ul class="main-menu nav position-relative boutique-nav">
                  <li><a href="{{ url('aboutus') }}">About Us</a></li>
                  <li><a href="{{ url('collections')}}">Shop Products</a></li>
                  <li><a href="{{ url('blogs')}}">News</a></li>
                  <li><a href="{{ url('contactus') }}">Contact us</a></li>
                </ul>
              </div>
            </div>
            <div class="align-right">
              <div class="contact-link float-start boutique-text-small">
                <div class="phone">
                  <span>Call us:</span>
                  <a href="tel:00961 79353846">00961 79353846</a>
                </div>
              </div>
              <div class="header-action-area float-start">
                <div class="shop-button-group">
                  <div class="shop-button-item">
                    <a class="shop-button" href="{{ url('wishlist') }}">
                      <i class="icon-heart icon"></i>
                      <sup class="shop-count"><livewire:frontend.wishlist-count /></sup>
                    </a>
                  </div>
                  <div class="shop-button-item">
                    <a class="shop-button" href="#">
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
    </div>
  </div>
  <div class="responsive-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-4">
          <div class="header-item">
            <button class="btn-menu" type="button"><i class="icon-menu"></i></button>
          </div>
        </div>
        <div class="col-4">
          <div class="header-item justify-content-center">
            <div class="header-logo-area">
              <a href="{{ url('/') }}">
                <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
              </a>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="header-item justify-content-end boutique-icon-small">
            <button class="btn-cart" onclick="window.location.href='{{ url('cart') }}'"><i class="icon-bag"></i> <span class="item-count"><livewire:frontend.cart.cart-count /></span></button>
            <button class="btn-cart" onclick="window.location.href='{{url('wishlist')}}'"><i class="icon-heart"></i> <span class="item-count"><livewire:frontend.wishlist-count /></span></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </header>

<style>
  /* 1. Logo Sizing */
  .boutique-logo {
    max-width: 80px !important; /* Forces logo to be small */
    height: auto !important;
  }

  /* 2. Text Sizing (Menu and Top bar) */
  .header-top, 
  .boutique-nav li a, 
  .dropdown-btn, 
  .boutique-text-small span, 
  .boutique-text-small a {
    font-size: 11px !important; /* Very small, elegant text */
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  /* 3. Icons and Shop Buttons */
  .header-action-area .icon, 
  .boutique-icon-small .icon-bag, 
  .boutique-icon-small .icon-heart {
    font-size: 16px !important;
  }

  .shop-count, .item-count {
    font-size: 9px !important;
  }

  /* Hide User Icon as requested */
  .icon-user {
    display: none !important;
  }

  /* Padding adjustment for smaller look */
  .header-top {
    padding: 5px 0 !important;
  }
</style>