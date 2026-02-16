<section class="product-area">
    <div class="container" data-padding-top="62">
        <div class="shopping-cart-wrap">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping-cart-content">
                        <h4 class="title">Shopping Cart</h4>

                        @if(count($items) > 0)
                            @foreach($items as $item)
                                <div class="shopping-cart-item" wire:key="cart-item-{{ $item['id'] }}">
                                    <div class="row">
                                        <div class="col-4 col-md-3">
                                            <div class="product-thumb">
                                                <a href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}">
                                                    @if($item['image'])
                                                        <img class="border-radius-5" src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                                                    @else
                                                        <img src="{{ asset('assets/img/no-image.png') }}" style="width: 100px; height: 100px; object-fit: cover;" alt="no-image">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-4">
                                            <div class="product-content">
                                                <h5 class="title"><a href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}">{{ $item['name'] }}</a></h5>
                                                <h6 class="product-price">${{ number_format($item['price'], 2) }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-6 offset-4 offset-md-0 col-md-5">
                                            <div class="product-info">
                                                <div class="row">
                                                    <div class="col-md-10 col-xs-6">
                                                        <div class="row">
                                                            <div class="col-md-6 col-xs-6 qty">
                                                                <div class="product-quick-qty">
                                                                    <div class="quantity__box">
                                                                        <button type="button" class="quantity__value quickview__value--quantity decrease" wire:click="updateQuantity({{ $item['product_id'] }}, 'decrease')" wire:loading.attr="disabled">-</button>
                                                                        <label>
                                                                            <input type="number" class="quantity__number quickview__value--number" value="{{ $item['quantity'] }}" readonly />
                                                                        </label>
                                                                        <button type="button" class="quantity__value quickview__value--quantity increase" wire:click="updateQuantity({{ $item['product_id'] }}, 'increase')" wire:loading.attr="disabled">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-xs-2 price">
                                                                <h6 class="product-price">${{ number_format($item['price'] * $item['quantity'], 2) }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 text-end">
                                                        <div class="product-close">
                                                            <a href="#" wire:click="removeItem({{ $item['product_id'] }})" wire:loading.attr="disabled">
                                                                <i class="ion-md-trash"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="shopping-cart-item">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <p class="text-center py-4">Your cart is empty</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <a class="btn-primary" href="{{ url('collections') }}">Continue shopping</a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="shopping-cart-summary mt-md-70">
                        <div class="cart-detailed-totals">
                            <div class="card-block">
                                <div class="card-block-item">
                                    <span class="label">{{ collect($items)->sum('quantity') }} items</span>
                                    <span class="value">${{ number_format($total, 2) }}</span>
                                </div>
                      
                            </div>
                            <div class="separator"></div>
                            <div class="card-block">
                                <div class="card-block-item">
                                    <span class="label">Total</span>
                                    <span class="value">${{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                            <div class="separator"></div>
                        </div>
                        
                        @if($total > 0)
                            <div class="checkout-shopping">
                                <a class="btn-checkout" href="{{ url('checkout') }}">Proceed to checkout</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>