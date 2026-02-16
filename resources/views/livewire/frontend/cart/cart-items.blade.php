<div class="cart-dropdown-wrapper">
    <ul class="popup-product-list">
        @forelse($items as $item)
            <li class="product-list-item" wire:key="cart-{{ $item['id'] }}">
                <a href="{{ url('collections/'.$item['category_slug'].'/'.$item['slug']) }}">
                    @if($item['image'])
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
                    @else
                        <img src="{{ asset('assets/img/no-image.png') }}" alt="no-image">
                    @endif
                    <span class="product-title">{{ $item['name'] }}</span>
                    <span class="product-quantity">{{ $item['quantity'] }}x</span>
                </a>
                <span class="product-price">${{ number_format($item['price'], 2) }}</span>
                <a class="product-close" href="#" wire:click.prevent="removeItem({{ $item['id'] }})" wire:loading.attr="disabled">
                    <i class="la la-close"></i>
                </a>
            </li>
        @empty
            <li class="m-4 text-center">
                <span class="product-title" style="color: #999;">Your cart is empty</span>
            </li>
        @endforelse
    </ul>

    @if(count($items) > 0)
        <div class="checkout mt-2">
            <a href="{{ url('cart') }}" class="btn-Checkout">View All Items in Cart</a>
        </div>

        <div class="price-content">
            <div class="cart-total">
                <span class="label">Total</span>
                <span class="value">${{ number_format($total, 2) }}</span>
            </div>
        </div>

        <div class="checkout">
            <a href="{{ url('checkout') }}" class="btn-Checkout">Checkout</a>
        </div>
    @endif
</div>