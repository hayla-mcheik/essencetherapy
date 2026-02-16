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

  <div class="header-bottom sticky-header hidden-md-down to-be-sticky">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col col-12">
          <div class="header-align align-default">
            <div class="align-left">
              <div class="header-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                </a>
              </div>
              <div class="header-navigation-area hidden-md-down">
                <ul class="main-menu nav position-relative boutique-nav ul-header-nav">
                  <li><a href="{{ url('aboutus') }}">About Us</a></li>
                  
                  <li class="has-dropdown">
                    <a href="javascript:void(0)" class="dropdown-click-trigger">Products <i class="ion-ios-arrow-down"></i></a>
                    <ul class="boutique-dropdown">
                        @if(isset($allCategories))
                            @foreach($allCategories as $categoryItem)
                                <li>
                                    <a href="{{ url('collections/'.$categoryItem->slug) }}">
                                        {{ $categoryItem->name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                  </li>

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
                  {{-- <div class="shop-button-item">
                    <a class="shop-button" href="{{ url('wishlist') }}">
                      <i class="icon-heart icon"></i>
                      <sup class="shop-count"><livewire:frontend.wishlist-count /></sup>
                    </a>
                  </div> --}}
                  <div class="shop-button-item">
                    <a class="shop-button" href="{{ url('cart') }}">
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
            <button class="btn-menu ul-header-sidebar-opener" type="button"><i class="icon-menu"></i></button>
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
            {{-- <button class="btn-cart" onclick="window.location.href='{{url('wishlist')}}'"><i class="icon-heart"></i> <span class="item-count"><livewire:frontend.wishlist-count /></span></button>
       --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<style>
  /* 1. New Classic Dropdown Styling */
  .boutique-dropdown {
    position: absolute;
    top: 100%;
    left: 10%;
    background: #fff;
    min-width: 200px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    padding: 15px 0;
    display: none;
    z-index: 999;
    border: 1px solid #f2f2f2;
    border-radius: 4px;
    text-align: left;
  }

  /* Show on Hover */
  @media (min-width: 992px) {
    .has-dropdown:hover .boutique-dropdown {
        display: block;
    }
  }

  /* Show on Click (via JS) */
  .boutique-dropdown.is-open {
    display: block !important;
  }

  .boutique-dropdown li {
    display: block;
    width: 100%;
    padding: 0 !important;
    margin: 0 !important;
  }

  .boutique-dropdown li a {
    padding: 10px 25px !important;
    color: #444 !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    text-transform: capitalize !important;
    display: block;
    border: none !important;
  }

  .boutique-dropdown li a:hover {
    color: #D97DA5 !important; /* Theme Pink */
    background: #fafafa;
    padding-left: 30px !important;
  }

  /* 2. Aesthetics & Logic */
  .boutique-logo {
    max-width: 80px !important;
    height: auto !important;
  }

  .header-top, .boutique-nav li a, .boutique-text-small a {
    font-size: 11px !important;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
  }

  .has-dropdown i {
    transition: 0.3s;
  }

  .has-dropdown:hover i {
    transform: rotate(180deg);
  }

  /* Sidebar/Mobile specific display */
  .ul-sidebar .boutique-dropdown {
    position: static !important;
    width: 100% !important;
    box-shadow: none !important;
    display: none; /* Controlled by mobile script toggle */
    padding-left: 20px !important;
    background: transparent;
    border: none;
  }
  
  .ul-sidebar .has-dropdown.active .boutique-dropdown {
    display: block !important;
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const trigger = document.querySelector('.dropdown-click-trigger');
    const menu = document.querySelector('.boutique-dropdown');

    if (trigger && menu) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            menu.classList.toggle('is-open');
            this.parentElement.classList.toggle('active');
        });

        // Close menu when clicking anywhere else
        document.addEventListener('click', function(e) {
            if (!menu.contains(e.target) && !trigger.contains(e.target)) {
                menu.classList.remove('is-open');
                trigger.parentElement.classList.remove('active');
            }
        });
    }
});
</script>