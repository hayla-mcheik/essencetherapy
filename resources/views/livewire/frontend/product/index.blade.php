<div>

            <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container pb-55">
          <div class="row">
            <div class="col-lg-3 order-1 order-lg-1">
              <!--== Start Sidebar Area ==-->
              <div class="shop-sidebar-wrapper">
                <!--== Start Sidebar Item ==-->
                <div class="sidebar-item">
                  <h4 class="sidebar-title"><a href="{{ url('/collections/') }}">All Categories</a></h4>
                  <div class="sidebar-body">
                    <div class="category-sub-menu">
                      <ul>
                        @forelse($categories as $categoryItem)
                        <li>
                          <a href="#/">{{$categoryItem->name}}</a>
                          <span class="collapse-icons collapsed" data-bs-toggle="collapse" data-bs-target="#sub-menu-{{ $categoryItem->id }}" role="button" aria-expanded="false">
                            <i></i>
                          </span>
                          <ul class="collapse" id="sub-menu-{{ $categoryItem->id }}">
                            @forelse($categoryItem->products as $product)
                            <li><a href="#/">{{ $product->name }}</a></li>
                            @empty
                            <li>No Product in this category</li>
                            @endforelse
                          </ul>
                        @empty
                        <li>No Categories</li>
                        @endforelse
                      </ul>
                    </div>
                  </div>
                  {{-- <h4 class="sidebar-title mb-45">Filter By</h4> --}}
                </div>
                <!--== End Sidebar Item ==-->
  
                <!--== Start Sidebar Item ==-->
                {{-- <div class="sidebar-item mb-40">
                  <h4 class="small-title">Price</h4>
                  <div class="sidebar-body">
                    <div class="sidebar-menu-list">
                      <div class="list-item">
                        <label class="d-block">
                           <input type="radio" name="priceSort" wire:model.live="priceInput" value="high-to-low" /> High to Low
                        </label>
                     </div>
                     <div class="list-item">
                        <label class="d-block">
                           <input type="radio" name="priceSort" wire:model.live="priceInput" value="low-to-high" /> Low to High
                        </label>
                     </div>
                     
                    </div>
                  </div>
                </div> --}}
                <!--== End Sidebar Item ==-->
  
                <!--== Start Sidebar Item ==-->
                <div class="sidebar-item mb-40">
                  <h4 class="small-title">Availability</h4>
                  <div class="sidebar-body">
                    <div class="sidebar-menu-list">
                      <div class="list-item">
                        <label class="form-check-label" for="list9">In Stock ({{ $inStockCount }})</label>
                      </div>
                      <div class="list-item">
                        <label class="form-check-label" for="list10">Not available ({{ $outOfStockCount }})</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!--== End Sidebar Item ==-->


              </div>
              <!--== End Sidebar Area ==-->
            </div>
            <div class="col-lg-9 order-0 order-lg-2">
              <!--== Start Shop Area ==-->
              <div class="product-header-wrap">
                <div class="row">
                  <div class="col-4 col-sm-4 col-md-6">
                    <ul class="nav product-tab-nav" id="pills-tab" role="tablist">
                      <li role="presentation">
                        <a class="active" id="grid-tab" data-bs-toggle="pill" href="#grid" role="tab" aria-controls="grid" aria-selected="true"><i class="fa fa-th"></i></a>
                      </li>
            
                    </ul>
                    <div class="total-products">

                      <p class="hidden-sm-down">There are {{ $category->products_count }} products.</p>
                    </div>
                  </div>
                  <div class="col-8 col-sm-8 col-md-6">
                    <div class="row">
                      {{-- <div class="col-sm-3">
                        <div class="sort-by-text">
                          Sort By:
                        </div>
                      </div> --}}
                      {{-- <div class="col-sm-9">
                        <div class="sort-by-form">
                          <select class="form-select" aria-label="Relevance">
                            <option selected="">Relevance</option>
                            <option value="1">Name, A to Z</option>
                            <option value="2">Name, Z to A</option>
                            <option value="3">Price, low to high</option>
                            <option value="4">Price, high to low</option>
                          </select>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-body-wrap">
                <div class="tab-content product-tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                    <div class="row">
                        @forelse ($products as $productItem)
                      <div class="col-sm-6 col-md-4">
                        <!--== Start Shop Item ==-->
                                          <div class="product-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            @if($productItem->productImages->count() > 0)    
                                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                                    @if($productItem->productImages->count() > 1)
                                                        <img class="second-image" src="{{ asset($productItem->productImages[1]->image) }}" alt="{{ $productItem->name }}">
                                                    @endif
                                                </a>
                                            @endif
                                            
                                            <livewire:frontend.indexwish :product="$productItem"/>
                                            
                                            <div class="white-bg">                            
                                                <livewire:frontend.cart.add-to-cart :product="$productItem"/>
                                            </div>

                                           <ul class="product-flag">
                                                <li class="new" style="font-size: 10px;">
                                                    @if ($product->quantity > 0)
                                                        <span>In Stock</span>
                                                    @else
                                                        Out of Stock
                                                    @endif
                                                </li>
                                                @if($product->original_price)
                                                    @php
                                                        $discount = (($product->original_price - $product->selling_price) / $product->original_price ) * 100;
                                                    @endphp
                                                    <li class="discount" style="font-size: 9px;">-{{ round($discount , 0) }}%</li>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="product-desc" style="padding: 10px 0;">
                                            <div class="product-info text-center">
                                                <h4 class="title" style="margin-bottom: 5px;">
                                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" 
                                                       style="color:#51555a; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3px;">
                                                       {{ $productItem->name }}
                                                    </a>
                                                </h4>
                                                <div class="prices">
                                                    @if($productItem->original_price)
                                                        <span class="price-old" style="font-size: 10px; color: #999; text-decoration: line-through; margin-right: 5px;">
                                                            €{{ $productItem->original_price }}
                                                        </span>
                                                    @endif
                                                    <span class="price" style="font-size: 12px; font-weight: 600; color: #D97DA5;">
                                                        €{{ $productItem->selling_price }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <!--== End Shop Item ==-->
                      </div>
         @empty
         <div class="col-sm-6 col-md-4">
            <div><p>No Products Available</p></div>
         </div>
         @endforelse
                    </div>
                  </div>
             
                </div>
                {{-- <div class="row">
                  <div class="col-12">
                    <div class="pagination-content-wrap">
                      <nav class="pagination-nav">
                        <ul class="pagination justify-content-center">
                          <li><a class="active" href="#/">1</a></li>
                          <li><a href="#/">2</a></li>
                          <li><a href="#/"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div> --}}
              </div>
              <!--== End Shop Area ==-->
            </div>
          </div>
        </div>
      </section>
      <!--== End Product Area Wrapper ==-->
      