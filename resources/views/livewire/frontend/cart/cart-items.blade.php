<div class="cart-dropdown-wrapper">
    @if(count($items) > 0)
        <ul class="popup-product-list">
            @foreach($items as $item)
                <li class="product-list-item" wire:key="cart-{{ $item['id'] }}">
                    <div class="d-flex align-items-center">
                        <a href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}">
                            @if($item['image'])
                                <img src="{{ asset($item['image']) }}" width="50" height="50" style="object-fit: cover;" alt="{{ $item['name'] }}">
                            @else
                                <img src="{{ asset('assets/img/no-image.png') }}" width="50" height="50" alt="no-image">
                            @endif
                            
                            <div style="margin-left: 10px;">
                                <span class="product-title" style="display:block; font-weight:600;">
                                    {{ $item['name'] }}
                                </span>
                                <span class="product-quantity">
                                    {{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }}
                                </span>
                            </div>
                        </a>
                    </div>
                    
                    <a class="product-close" href="#" wire:click.prevent="removeItem({{ $item['id'] }})" wire:loading.attr="disabled">
                        <i class="la la-close"></i>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="price-content" style="border-top: 1px solid #eee; padding-top: 15px; margin-top: 10px;">
            <div class="cart-total d-flex justify-content-between">
                <span class="label" style="font-weight: 700;">TOTAL</span>
                <span class="value" style="font-weight: 700; color: #D97DA5;">
                    ${{ number_format($total, 2) }}
                </span>
            </div>
        </div>
        
        <div class="checkout mt-3">
            <a href="{{ url('cart') }}" class="btn-Checkout w-100 mb-2" style="text-align: center; display: block; padding: 10px; border: 1px solid #ccc; text-decoration: none; background: white; color: #333;">View Cart</a>
            <a href="{{ url('checkout') }}" class="btn-Checkout w-100" style="text-align: center; display: block; padding: 10px; background-color: #D97DA5; color: white; text-decoration: none;">Checkout</a>
        </div>
    @else
        <div class="text-center py-4">
            <p style="color: #999; margin: 20px 0;">Your cart is empty</p>
        </div>
    @endif
</div>