<div>
        <!--== Start Page Header Area Wrapper ==-->
        <div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/bg-02.webp') }}">

            <div class="container">
              <div class="row">
                <div class="col-12 text-center">
                  <div class="page-header-content">
                    <nav class="breadcrumb-area">
                      <ul class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                        <li><a href="#" id="shop-link">Products</a></li>
                        <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
                        <li>Product Single</li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--== End Page Header Area Wrapper ==-->
      


    <!--== Start Product Single Area Wrapper ==-->
    <section class="product-area product-single-area">
        <div class="container pt-60 pb-0">
          <div class="row">
            <div class="col-12">
              <div class="product-single-item" data-margin-bottom="62">
                <div class="row">
                  <div class="col-md-6">

                    <!--== Start Product Thumbnail Area ==-->
                    <div wire:ignore>
                        @if($product->productImages && count($product->productImages) > 0)
                        <div class="product-thumb">
                            <div class="swiper-container single-product-thumb-content single-product-thumb-slider2">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide zoom zoom-hover">
                                        <a class="lightbox-image" data-fancybox="gallery" href="{{ asset($product->productImages[0]->image) }}" id="main-image-link">
                                            <img src="{{ asset($product->productImages[0]->image) }}" alt="Image-HasTech" id="main-image">
                                            <span class="product-flag-new">New</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-container single-product-nav-content single-product-nav-slider2">
                                <div class="swiper-wrapper">
                                    @foreach($product->productImages as $index => $itemImg)
                                        <div class="swiper-slide">
                                            <img src="{{ asset($itemImg->image) }}" class="thumbnail-image" alt="Image-HasTech" data-index="{{ $index }}" data-image="{{ asset($itemImg->image) }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    </div>
                    <!--== End Product Thumbnail Area ==-->

                  </div>
                  <div class="col-md-6">
                    <!--== Start Product Info Area ==-->
                    <div class="product-single-info mt-sm-70">
                      <h1 class="title">{{ $product->name }}</h1>
                      <div class="prices">
                        @if($product->original_price)
                        <span class="price">${{ $product->selling_price }}</span>
                        @endif
                        <span class="old_price">${{ $product->original_price }}</span>
                      </div>
                    @if($product->quantity)
                    <label class="btn-sm py-1 mt-2" style="{{ "font-weight:600; font-size:14px;"}}">In Stock</label>
                    @else
                    <label class="btn-sm py-1 mt-2" style="{{ "font-weight:600;font-size:14px;"}}">Out of Stock</label>
                    @endif
             
                      <div class="product-description">
                        <ul class="product-desc-list">
                          <li>{{ $product->small_description }}</li>
                          <li>{{ $product->description }}</li>

                        </ul>
                      </div>
                      <div class="product-quick-action">
                
                        <a class="btn-product-add" type="submit"  wire:click="addToCart({{ $product->id }})">Add to cart</a>
                        <div class="product-wishlist-compare mb-0">
                          <a class="variant__wishlist--icon mb-0 mx-4" wire:click="addToWishList({{ $product->id }})">
                              <span wire:loading.remove wire:target="addToWishList">  <i class="fa fa-heart"></i> Add To Wishlist </span>
                  <span wire:loading wire:target="addToWishList">Adding...</span>
                          </a>
                        </div>
                      </div>
       
                    </div>
                    <!--== End Product Info Area ==-->
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!--== End Product Single Area Wrapper ==-->
  
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to reinitialize zoom
        function reinitializeZoom() {
            $('.zoom-hover').trigger('zoom.destroy'); // Destroy the previous zoom instance
            $('.zoom-hover').zoom({url: $('#main-image-link').attr('href')}); // Reinitialize zoom with new image
        }

        // Initializing zoom for the first load
        reinitializeZoom();

        // Get all thumbnail images
        const thumbnails = document.querySelectorAll('.thumbnail-image');

        // Iterate over each thumbnail and add click event listener
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function () {
                // Get the main image and link elements
                const mainImage = document.getElementById('main-image');
                const mainImageLink = document.getElementById('main-image-link');

                // Get the new image source from the clicked thumbnail
                const newImageSrc = this.getAttribute('data-image');

                // Update the main image and link
                mainImage.src = newImageSrc;
                mainImageLink.href = newImageSrc;

                // Reinitialize or refresh the zoom functionality
                reinitializeZoom();

                // Update fancybox (lightbox) with the new image
                $.fancybox.destroy(); // Destroy previous fancybox instances
                $('[data-fancybox="gallery"]').fancybox(); // Reinitialize fancybox
            });
        });
        document.getElementById('shop-link').addEventListener('click', function(event) {
        event.preventDefault();
        history.back();
    });
    });
</script>
@endpush