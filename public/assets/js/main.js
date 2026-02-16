document.addEventListener("DOMContentLoaded", (event) => {
    // 1. PRELOADER
    const preloader = document.getElementById('preloader');
    if (preloader) {
        preloader.style.display = 'none';
        document.body.style.position = 'static';
    }

    // 2. HEADER NAV & SIDEBAR LOGIC
    if (document.querySelector(".ul-header-nav")) {
        const ulSidebar = document.querySelector(".ul-sidebar");
        const ulSidebarOpener = document.querySelector(".ul-header-sidebar-opener");
        const ulSidebarCloser = document.querySelector(".ul-sidebar-closer");
        const ulMobileMenuContent = document.querySelector(".to-go-to-sidebar-in-mobile");
        const ulHeaderNavMobileWrapper = document.querySelector(".ul-sidebar-header-nav-wrapper");
        const ulHeaderNavOgWrapper = document.querySelector(".ul-header-nav-wrapper");

        // Function to move menu between desktop and mobile sidebar
        function updateMenuPosition() {
            if (window.innerWidth < 992 && ulHeaderNavMobileWrapper && ulMobileMenuContent) {
                ulHeaderNavMobileWrapper.appendChild(ulMobileMenuContent);
            } else if (window.innerWidth >= 992 && ulHeaderNavOgWrapper && ulMobileMenuContent) {
                ulHeaderNavOgWrapper.appendChild(ulMobileMenuContent);
            }
        }

        updateMenuPosition();
        window.addEventListener("resize", updateMenuPosition);

        // Sidebar Open/Close
        if (ulSidebarOpener) {
            ulSidebarOpener.addEventListener("click", () => ulSidebar.classList.add("active"));
        }
        if (ulSidebarCloser) {
            ulSidebarCloser.addEventListener("click", () => ulSidebar.classList.remove("active"));
        }

        // 3. DROPDOWN / MEGA MENU CLICK LOGIC (Desktop & Mobile)
        const ulHeaderNavMobile = document.querySelector(".ul-header-nav");
        // Target both standard sub-menus and your new Products dropdown
        const subMenuTriggers = ulHeaderNavMobile.querySelectorAll(".has-sub-menu, .has-dropdown");

        subMenuTriggers.forEach((item) => {
            const triggerLink = item.querySelector('a');

            triggerLink.addEventListener("click", function (e) {
                // If on mobile OR using the 'dropdown-click-trigger' class on desktop
                if (window.innerWidth < 992 || this.classList.contains('dropdown-click-trigger')) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Close other open siblings for a clean accordion effect
                    subMenuTriggers.forEach(sib => {
                        if (sib !== item) sib.classList.remove("active");
                    });

                    // Toggle active class to show/hide menu
                    item.classList.toggle("active");

                    // Handle Mega Menu specific 'is-open' class for Style2
                    const megaMenu = item.querySelector('.mega-menu');
                    if (megaMenu) {
                        megaMenu.classList.toggle('is-open');
                    }
                }
            });
        });

        // Close desktop mega-menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!ulHeaderNavMobile.contains(e.target)) {
                subMenuTriggers.forEach(item => {
                    item.classList.remove("active");
                    const mega = item.querySelector('.mega-menu');
                    if (mega) mega.classList.remove('is-open');
                });
            }
        });
    }

    // 4. SEARCH FORM LOGIC
    const ulHeaderSearchOpener = document.querySelector(".ul-header-search-opener");
    const ulHeaderSearchCloser = document.querySelector(".ul-search-closer");
    const ulSearchFormWrapper = document.querySelector(".ul-search-form-wrapper");

    if (ulHeaderSearchOpener && ulSearchFormWrapper) {
        ulHeaderSearchOpener.addEventListener("click", () => ulSearchFormWrapper.classList.add("active"));
    }
    if (ulHeaderSearchCloser && ulSearchFormWrapper) {
        ulHeaderSearchCloser.addEventListener("click", () => ulSearchFormWrapper.classList.remove("active"));
    }

    // 5. STICKY HEADER
    const ulHeader = document.querySelector(".to-be-sticky");
    if (ulHeader) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 80) {
                ulHeader.classList.add("sticky");
            } else {
                ulHeader.classList.remove("sticky");
            }
        });
    }

    // 6. SLIM SELECT INITIALIZATION
    if (document.querySelector("#ul-header-search-category")) {
        new SlimSelect({
            select: '#ul-header-search-category',
            settings: { showSearch: false }
        });
    }

    // 7. SWIPER SLIDERS
    // Products Slider 1
    if (document.querySelector(".ul-products-slider-1")) {
        new Swiper(".ul-products-slider-1", {
            slidesPerView: 3,
            loop: true,
            autoplay: true,
            spaceBetween: 15,
            navigation: {
                nextEl: ".ul-products-slider-1-nav .next",
                prevEl: ".ul-products-slider-1-nav .prev",
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                480: { slidesPerView: 2 },
                992: { slidesPerView: 3 },
                1700: { spaceBetween: 30 }
            }
        });
    }

    // Products Slider 2
    if (document.querySelector(".ul-products-slider-2")) {
        new Swiper(".ul-products-slider-2", {
            slidesPerView: 3,
            loop: true,
            autoplay: true,
            spaceBetween: 15,
            navigation: {
                nextEl: ".ul-products-slider-2-nav .next",
                prevEl: ".ul-products-slider-2-nav .prev",
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                480: { slidesPerView: 2 },
                992: { slidesPerView: 3 }
            }
        });
    }

    // 8. QUANTITY FIELD LOGIC
    const quantityWrapper = document.querySelectorAll(".ul-product-quantity-wrapper");
    if (quantityWrapper.length > 0) {
        quantityWrapper.forEach((item) => {
            const quantityInput = item.querySelector(".ul-product-quantity");
            const btnIncrease = item.querySelector(".quantityIncreaseButton");
            const btnDecrease = item.querySelector(".quantityDecreaseButton");

            btnIncrease.addEventListener("click", () => {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            });
            btnDecrease.addEventListener("click", () => {
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                }
            });
        });
    }

    // 9. WOW JS ANIMATIONS
    if (typeof WOW !== 'undefined') {
        new WOW({}).init();
    }
    
    // 10. MIXITUP FILTERING
    if (document.querySelector(".ul-filter-products-wrapper")) {
        mixitup('.ul-filter-products-wrapper');
    }
});