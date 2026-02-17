<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        
        <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-cart menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="{{ Request::is('admin/category*') ? 'true' : 'false' }}">
                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="category" data-bs-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}" href="{{ url('admin/category') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="{{ Request::is('admin/products*') ? 'true' : 'false' }}">
                <i class="mdi mdi-package-variant-closed menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show' : '' }}" id="products" data-bs-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link {{ Request::is('admin/products') ? 'active' : '' }}" href="{{ url('admin/products') }}">View Product</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ Request::is('admin/sliders*') || Request::is('admin/banners*') || Request::is('admin/tickers*') || Request::is('admin/about*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#page-content" aria-expanded="false">
                <i class="mdi mdi-file-document-outline menu-icon"></i>
                <span class="menu-title">Page Content</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/sliders*') || Request::is('admin/banners*') || Request::is('admin/tickers*') || Request::is('admin/about*') ? 'show' : '' }}" id="page-content" data-bs-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/sliders') ? 'active' : '' }}" href="{{ url('admin/sliders') }}">Home Sliders</a></li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/banners') ? 'active' : '' }}" href="{{ url('admin/banners') }}">Banner Images</a></li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/tickers') ? 'active' : '' }}" href="{{ url('admin/tickers') }}">Top Tickers</a></li>
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/about') ? 'active' : '' }}" href="{{ url('admin/about') }}">About Us</a></li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="{{ Request::is('admin/users*') ? 'true' : 'false' }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show' : '' }}" id="users" data-bs-parent="#sidebar">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> 
                        <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('admin/users') }}">View Users</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item {{ Request::is('admin/reviews') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/reviews') }}">
                <i class="mdi mdi-star-outline menu-icon"></i>
                <span class="menu-title">Reviews</span>
            </a>
        </li>
        
        <li class="nav-item {{ Request::is('admin/promocode') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/promocode') }}">
                <i class="mdi mdi-ticket-percent menu-icon"></i>
                <span class="menu-title">PromoCode</span>
            </a>
        </li>
        
        <li class="nav-item {{ Request::is('admin/blogs') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/blogs') }}">
                <i class="mdi mdi-book-open-variant menu-icon"></i>
                <span class="menu-title">Blogs/News</span>
            </a>
        </li>
        
        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>
    </ul>
</nav>