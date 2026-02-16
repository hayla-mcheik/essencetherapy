<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>taly's collection | Laravel Ecommerce</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--== Ionicon CSS ==-->
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet">
    <!--== Simple Line Icon CSS ==-->
    <link href="{{ asset('assets/css/simple-line-icons.css') }}" rel="stylesheet">
    <!--== Line Icons CSS ==-->
    <link href="{{ asset('assets/css/lineIcons.css') }}" rel="stylesheet">
    <!--== Font Awesome Icon CSS ==-->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <!--== Animate CSS ==-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <!--== Swiper CSS ==-->
    <link href="{{ asset('assets/css/swiper.min.css') }}" rel="stylesheet">
    <!--== Range Slider CSS ==-->
    <link href="{{ asset('assets/css/range-slider.css') }}" rel="stylesheet">
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset('assets/css/fancybox.min.css') }}" rel="stylesheet">
    <!--== Slicknav Min CSS ==-->
    <link href="{{ asset('assets/css/slicknav.css') }}" rel="stylesheet">
    <!--== Owl Carousel Min CSS ==-->
    <link href="{{ asset('assets/css/owlcarousel.min.css') }}" rel="stylesheet">
    <!--== Owl Theme Min CSS ==-->
    <link href="{{ asset('assets/css/owltheme.min.css') }}" rel="stylesheet">
    <!--== Spacing CSS ==-->
    <link href="{{ asset('assets/css/spacing.css') }}" rel="stylesheet">

    <!--== Main Style CSS ==-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom CSS for Enhanced Footer Design -->
 

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
       <style>
        /* Sidebar Cleanup */
.mobile-main-nav {
    list-style: none;
    padding: 20px 0;
    margin: 0;
}

.mobile-main-nav > li {
    border-bottom: 1px solid #f2f2f2;
}

.mobile-main-nav > li > a {
    display: block;
    padding: 15px 25px;
    font-size: 12px;
    font-weight: 700;
    color: #51555A;
    text-transform: uppercase;
}

/* Sub-categories Styling */
.mobile-sub-categories {
    list-style: none;
    padding: 0 0 15px 40px;
    background: #fafafa;
}

.mobile-sub-categories li a {
    display: block;
    padding: 10px 0;
    font-size: 11px;
    color: #51555A;
    font-weight: 700;
    text-transform: capitalize;
}

/* Arrow Rotation */
.has-mobile-dropdown.active .ion-ios-arrow-down {
    transform: rotate(180deg);
    transition: 0.3s;
}

.has-mobile-dropdown.active > a {
    color: #D97DA5; /* Your pink theme color */
}
        /* Enhanced Footer Styles */
        .footer-connect-section {
            background: var(--logo-pink-dark) ;
            padding: 0px 0;
            color: #fff;
        }
        
        .footer-connect-section .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 25px;
            color: #fff;
            position: relative;
            display: inline-block;
        }
        
        .footer-connect-section .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 3px;
            background: #d40707;
        }
        
        .social-connect-box {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 30px;
            height: 100%;
            transition: transform 0.3s ease, background 0.3s ease;
        }
        
        .social-connect-box:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1);
        }
        
        .newsletter-box {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 30px;
            height: 100%;
            transition: transform 0.3s ease, background 0.3s ease;
        }
        
        .newsletter-box:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1);
        }
        
        .social-icons-enhanced {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
        }
        
        .social-icons-enhanced a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-icons-enhanced a:hover {
            background: #d40707;
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(236, 107, 129, 0.3);
        }
        
        .social-icons-enhanced .facebook:hover { background: #3b5998; }
        .social-icons-enhanced .twitter:hover { background: #1da1f2; }
        .social-icons-enhanced .youtube:hover { background: #ff0000; }
        .social-icons-enhanced .instagram:hover { 
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); 
        }
        
        .newsletter-form-enhanced .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            height: 50px;
            border-radius: 25px;
            padding: 0 20px;
            margin-bottom: 15px;
            font-size: 12px
        }
        
        .newsletter-form-enhanced .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #d40707;
            box-shadow: 0 0 0 0.2rem rgba(236, 107, 129, 0.25);
            color: #fff;
        }
        
        .newsletter-form-enhanced .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .newsletter-form-enhanced .btn-submit-enhanced {
            background: #d40707;
            border: none;
            color: white;
            height: 50px;
            border-radius: 25px;
            padding: 0 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .newsletter-form-enhanced .btn-submit-enhanced:hover {
            background: #d40707;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(236, 107, 129, 0.3);
        }
        
        .connect-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 0;
        }
        
        .newsletter-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            line-height: 1.5;
            margin-top: 15px;
            margin-bottom: 0;
        }
                .newsletter-form-enhanced .btn-submit-enhanced {
                    font-size: 12px;
                }
        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        @media (max-width: 768px) {
            .footer-connect-section {
                padding: 0px 0;
            }
            
            .social-connect-box,
            .newsletter-box {
                padding: 20px;
                margin-bottom: 30px;
            }
            
            .footer-connect-section .section-title {
                font-size: 1.1rem;
            }

            
            .social-icons-enhanced {
                gap: 10px;
            }
            
            .social-icons-enhanced a {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
        .connect-description{
            font-size: 12px;
        }
    }
        @media (max-width: 576px) {
            .social-icons-enhanced {
                flex-wrap: wrap;
                gap: 8px;
            }
            
            .newsletter-form-enhanced .btn-submit-enhanced {
                padding: 0 20px;
            }
        }

 
#shippingModal .modal-content {
    border: none;
    border-radius: 4px; 
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

#shippingModal .modal-body {
    padding: 50px 40px;
}

#shippingModal .shipping-emoji {
    font-size: 30px;
    display: block;
    margin-bottom: 15px;
}

#shippingModal .modal-title-custom {
    color: #D97DA5; /* Your logo pink */
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    font-size: 28px;
    margin-bottom: 25px;
}

#shippingModal .notice-text {
    color: #D97DA5;
    font-size: 15px;
    font-weight: 500;
    line-height: 1.6;
    margin-bottom: 20px;
}

#shippingModal .secondary-text {
    color: #D97DA5;
    font-size: 14px;
    margin-bottom: 30px;
}

#shippingModal .btn-start-shopping {
    background-color: #D97DA5;
    color: white;
    border: none;
    width: 100%;
    padding: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 2px;
    transition: opacity 0.3s;
}

#shippingModal .btn-start-shopping:hover {
    opacity: 0.8;
    color: white;
}

#shippingModal .no-thanks {
    display: block;
    margin-top: 20px;
    color: #999;
    font-size: 13px;
    text-decoration: underline;
    cursor: pointer;
}

#shippingModal .social-links-popup {
    margin-top: 25px;
    display: flex;
    justify-content: center;
    gap: 20px;
    color: #D97DA5;
    font-size: 20px;
}
    </style>
</head>
<body>
<!--wrapper start-->
<div class="wrapper home-default-wrapper">


@if(Request::is('/'))
@include('layouts.inc.frontend.navbar')
@else
@include('layouts.inc.frontend.navbar-style-2')
@endif
    <main class="main-content">

            @yield('content')
            


    <!--== Start Footer Connect Section ==-->
    <section class="footer-connect-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="social-connect-box text-center">
              <h3 class="section-title">Let's Connect On Social</h3>
         <div class="social-icons-enhanced">
    {{-- Safe check for Facebook --}}
    @if(optional($appSetting)->facebook)
        <a href="{{ $appSetting->facebook }}" target="_blank" class="facebook">
            <i class="la la-facebook"></i>
        </a>
    @endif

    {{-- Safe check for TikTok (mapped to youtube field) --}}
    @if(optional($appSetting)->youtube)
        <a href="{{ $appSetting->youtube }}" target="_blank" class="tiktok">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" style="margin-top: 0px;">
                <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z"/>
            </svg>
        </a>
    @endif

    {{-- Safe check for Instagram --}}
    @if(optional($appSetting)->instagram)
        <a href="{{ $appSetting->instagram }}" target="_blank" class="instagram">
            <i class="la la-instagram"></i>
        </a>
    @endif
</div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="newsletter-box text-center">
              <h3 class="section-title">Sign Up For Newsletter</h3>
              <div class="newsletter-form-enhanced">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                @if (session('success'))
                  <div class="alert alert-success">
                    {{ session('success') }}
                  </div>
                @endif
                <form action="{{ url('subscribe') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Your email address" requi#d40707>
                  </div>
                  <button class="btn btn-submit-enhanced" type="submit">Subscribe Now</button>
                </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Footer Connect Section ==-->
        </main>
            @include('layouts.inc.frontend.footer')
              <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="ion-md-arrow-up"></span></div>
<aside class="off-canvas-wrapper ul-sidebar">
  <div class="off-canvas-inner">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-content">
      <div class="off-canvas-header">
        <div class="close-action">
          <button class="btn-menu-close ul-sidebar-closer">MENU <i class="icon-arrow-left"></i></button>
        </div>
      </div>

      <div class="off-canvas-item">
        <div class="custom-mobile-menu">
          <ul class="mobile-main-nav">
            <li><a href="{{ url('aboutus') }}">About Us</a></li>
            
            <li class="has-mobile-dropdown">
              <a href="javascript:void(0)" class="mobile-dropdown-trigger">
                Products <i class="ion-ios-arrow-down float-end"></i>
              </a>
              <ul class="mobile-sub-categories" style="display: none;">
                @foreach($allCategories as $categoryItem)
                  <li>
                    <a href="{{ url('collections/'.$categoryItem->slug) }}">
                      {{ $categoryItem->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </li>

            <li><a href="{{ url('blogs') }}">News</a></li>
            <li><a href="{{ url('contactus') }}">Contact us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</aside>
     
    </div>

    <div class="modal fade" id="shippingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-end p-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <span class="shipping-emoji">🚨</span>
                <h2 class="modal-title-custom">Shipping Update</h2>
                
                <p class="notice-text">
                    loreum ipsum loreum ipsum loreum ipsum loreum ipsum loreum ipsum loreum ipsum loreum ipsum.
                </p>
                
                <p class="secondary-text">
                    You can also shop our Direct Delivery items for faster shipping.
                </p>
                
                <a href="{{ url('/collections') }}" class="btn btn-start-shopping">Start Shopping</a>
                
                <span class="no-thanks" data-bs-dismiss="modal">No thanks</span>
                
                <div class="social-links-popup">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-tiktok"></i></a>
                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=== Modernizr Min Js ===-->
<script src="{{ asset('assets/js/modernizr.js')}}"></script>
<!--=== jQuery Min Js ===-->
<script src="{{ asset('assets/js/jquery-main.js')}}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{ asset('assets/js/jquery-migrate.js')}}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<!--=== jQuery Appear Js ===-->
<script src="{{ asset('assets/js/jquery.appear.js')}}"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="{{ asset('assets/js/swiper.min.js')}}"></script>
<!--=== jQuery Fancy Box Min Js ===-->
<script src="{{ asset('assets/js/fancybox.min.js')}}"></script>
<!--=== jQuery Slick Nav Js ===-->
<script src="{{ asset('assets/js/slicknav.js')}}"></script>
<!--=== jQuery Waypoints Js ===-->
<script src="{{ asset('assets/js/waypoints.js')}}"></script>
<!--=== jQuery Owl Carousel Min Js ===-->
<script src="{{ asset('assets/js/owlcarousel.min.js')}}"></script>
<!--=== jQuery Match Height Min Js ===-->
<script src="{{ asset('assets/js/jquery-match-height.min.js')}}"></script>
<!--=== jQuery Zoom Min Js ===-->
<script src="{{ asset('assets/js/jquery-zoom.min.js')}}"></script>
<!--=== Countdown Js ===-->
<script src="{{ asset('assets/js/countdown.js')}}"></script>

<!--=== Custom Js ===-->
<script src="{{ asset('assets/js/custom.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    // Inside your existing DOMContentLoaded block:
const mobileDropTrigger = document.querySelector('.mobile-dropdown-trigger');

if (mobileDropTrigger) {
    mobileDropTrigger.addEventListener('click', function(e) {
        e.preventDefault();
        const parentLi = this.parentElement;
        const subMenu = this.nextElementSibling;
        
        // Toggle Active Class
        parentLi.classList.toggle('active');
        
        // Slide Toggle logic
        if (subMenu.style.display === "none" || subMenu.style.display === "") {
            subMenu.style.display = "block";
        } else {
            subMenu.style.display = "none";
        }
    });
}
    window.addEventListener('message', event => {
        alertify.set('notifier','position', 'top-right');
        alertify.notify(event.detail.text , event.detail.type);
    });

    document.addEventListener('DOMContentLoaded', function () {
        console.log("Checking for Shipping Popup..."); // Check F12 Console for this

        // 1. Check if we are on the Home Page
        var isHomePage = window.location.pathname === '/' || 
                         window.location.pathname === '/index.php' ||
                         window.location.pathname.endsWith('/');

        if (isHomePage) {
            
            // 2. Check Session Storage (Clear your cache/incognito to test)
            if (!sessionStorage.getItem('shownShippingPopup')) {
                
                var modalElement = document.getElementById('shippingModal');
                
                if (modalElement) {
                    // Force a delay to ensure Bootstrap is fully loaded
                    setTimeout(function() {
                        try {
                            // Using the modern Bootstrap 5 way
                            var myModal = new bootstrap.Modal(modalElement);
                            myModal.show();
                            sessionStorage.setItem('shownShippingPopup', 'true');
                            console.log("Popup launched successfully.");
                        } catch (err) {
                            console.error("Bootstrap Modal Error: ", err);
                            // Fallback for Bootstrap 4 if the above fails
                            if (window.$) {
                                $(modalElement).modal('show');
                            }
                        }
                    }, 1000); 
                } else {
                    console.error("Error: Element #shippingModal not found in HTML.");
                }
            } else {
                console.log("Popup already shown this session.");
            }
        }
    });
</script>
    @yield('script')
    @livewireScripts
    @stack('scripts')
    

</body>
</html>