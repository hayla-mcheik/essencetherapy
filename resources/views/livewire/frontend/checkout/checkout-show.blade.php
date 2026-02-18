<div>
    <section class="product-area">
        <div class="container" data-padding-top="62">
            <div class="shopping-cart-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping-checkout-content">
                            <div class="checkout-accordion" id="accordionExample">
                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingTwo">
                                        <button class="heading-button @if(!$isPersonalInfoValid) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="@if($isPersonalInfoValid) true @else false @endif" aria-controls="collapseTwo">
                                            <span class="step-number">1</span>
                                            Personal Information
                                            <span class="step-edit"><i class="fa fa-pencil"></i> edit</span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse @if(!$isPersonalInfoValid) show @endif" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body" data-margin-top="14">
                                            <div class="personal-addresses">
                                                <p class="p-text">The selected address will be used both as your personal address and as your delivery address.</p>
                                                <div class="delivery-address-form">
                                                    <form wire:submit.prevent="validatePersonalInformation">
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="f_name">Full Name <span class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <input id="f_name" wire:model="fullname" class="form-control" type="text" placeholder="Your full name">
                                                                @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="frm_address">Address <span class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <input id="frm_address" wire:model="address" class="form-control" type="text" placeholder="Your address">
                                                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="frm-phone">Phone <span class="text-danger">*</span></label>
                                                            <div class="col-md-6">
                                                                <input id="frm-phone" wire:model="phone" class="form-control" type="tel" placeholder="Your phone number">
                                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3" for="frm-email">Email <span class="text-muted">(optional)</span></label>
                                                            <div class="col-md-6">
                                                                <input id="frm-email" wire:model="email" class="form-control" type="email" placeholder="Your email for order confirmation">
                                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-md-12 text-end">
                                                                <button type="submit" class=" btn btn-promocode-apply">Continue to Payment</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingThree">
                                        <button class="heading-button @if($isPersonalInfoValid) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="@if($isPersonalInfoValid) true @else false @endif" aria-controls="collapseThree" @if(!$isPersonalInfoValid) disabled @endif>
                                            <span class="step-number">2</span>
                                            Payment
                                            <span class="step-edit"><i class="fa fa-pencil"></i> edit</span>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse @if($isPersonalInfoValid) show @endif" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body" data-margin-top="14">
                                            <div class="personal-addresses">
                                                @auth
                                                    <div class="personal-information mb-3">
                                                        <ul>
                                                            <li>Logged in as: <strong>{{ auth()->user()->name }}</strong></li>
                                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                @endauth

                                                <div class="payment-method">
                                                    <h5>Payment Method</h5>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" wire:model="payment_mode" checked>
                                                        <label class="form-check-label" for="cod">
                                                            <strong>Cash on Delivery</strong> - Pay when you receive your order
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <div class="col-md-12 text-end">
                                                        <button type="button" class="btn btn-promocode-apply" wire:click="codOrder" wire:loading.attr="disabled">
                                                            <span wire:loading.remove>Place Order (Cash on Delivery)</span>
                                                            <span wire:loading>Processing Order...</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="shopping-cart-summary mt-md-70 mt-2 p-3 border">
                            <h4 class="mb-3">Order Summary</h4>
                            
                            <div class="order-items mb-3">
                                @foreach($carts as $item)
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div>
                                            <h6 class="mb-0" style="font-size: 14px;">{{ $item->product->name }}</h6>
                                            <small class="text-muted">Quantity: {{ $item->quantity }}</small>
                                        </div>
                                        <div class="text-end">
                                            <span style="font-size: 14px;">${{ number_format($item->product->selling_price * $item->quantity, 2) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="promocode-box">
                                <p class="small">If you have a promo code, enter it below:</p>
                                <div class="promocode d-flex justify-content-between mb-3">
                                    <input class="form-control promocode me-2" wire:model.live="promoCode" type="text" placeholder="Discount Code" />
                                    <button class="btn btn-promocode-apply" wire:click="applyPromoCode" type="button">Apply</button>
                                </div>
                                @if($promoCodeApplied)
                                    <div class="mb-3">
                                        <span class="badge bg-light text-dark p-2 w-100" style="border: 1px dashed #f08080;">
                                            Code Applied: <i class="fa fa-tag text-danger"></i> {{ $promoCode }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            
                            @if($totalProductAmount != 0)
                                <div class="cart-detailed-totals">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="label">Subtotal</span>
                                        <span class="value">${{ number_format($totalProductAmount, 2) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="label">Shipping</span>
                                        <span class="value text-success">Free</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between fw-bold">
                                        <span class="label">Total Amount</span>
                                        <span class="value" style="color: #D97DA5;">${{ number_format($totalProductAmount, 2) }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
    
    @script
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('personalInfoValidated', () => {
                const collapseTwo = document.getElementById('collapseTwo');
                if (collapseTwo) {
                    const bsCollapseTwo = new bootstrap.Collapse(collapseTwo, { toggle: false });
                    bsCollapseTwo.hide();
                }
                const collapseThree = document.getElementById('collapseThree');
                if (collapseThree) {
                    const bsCollapseThree = new bootstrap.Collapse(collapseThree, { toggle: false });
                    bsCollapseThree.show();
                }
            });
        });
    </script>
    @endscript
</div>