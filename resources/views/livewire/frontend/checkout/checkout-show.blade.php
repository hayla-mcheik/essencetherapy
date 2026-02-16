<div>
    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
        <div class="container" data-padding-top="62">
            <div class="shopping-cart-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping-checkout-content">
                            <div class="checkout-accordion" id="accordionExample">
                                <!-- Step 1: Personal Information -->
                                <div class="checkout-accordion-item">
                                    <h2 class="heading" id="headingTwo">
                                        <button class="heading-button @if(!$isPersonalInfoValid) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="@if($isPersonalInfoValid) true @else false @endif" aria-controls="collapseTwo">
                                            <span class="step-number">1</span>
                                            Personal Information
                                            <span class="step-edit"><i class="fa fa-pencil"></i> edit</span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse @if($isPersonalInfoValid) show @endif" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="checkout-accordion-body" data-margin-top="14">
                                            <div class="personal-addresses">
                                                <p class="p-text">The selected address will be used both as your personal address (for invoice) and as your delivery address.</p>
                                                <div class="personal-information">
                                                    {{-- <ul>
                                                        <li>Not you? <a href="#/">Log out</a></li>
                                                        <li><small>If you sign out now, your cart will be emptied.</small></li>
                                                    </ul> --}}
                                                </div>
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

                                <!-- Step 2: Payment -->
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
                                                @guest
                                                    <p></p>
                                                @else
                                                    <div class="personal-information">
                                                        <ul>
                                                            <li>Logged in as: <strong>{{ auth()->user()->name }}</strong></li>
                                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                                                        </ul>
                                                    </div>
                                                @endguest

                                                <!-- Order Summary -->
                                                <div class="order-summary mt-4">
                                                    <h5>Order Summary</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Quantity</th>
                                                                    <th>Price</th>
                                                                    <th>Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($carts as $item)
                                                                <tr>
                                                                    <td>{{ $item->product->name }}</td>
                                                                    <td>{{ $item->quantity }}</td>
                                                                    <td>${{ number_format($item->product->selling_price, 2) }}</td>
                                                                    <td>${{ number_format($item->product->selling_price * $item->quantity, 2) }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="3" class="text-end">Total:</th>
                                                                    <th>${{ number_format($totalProductAmount, 2) }}</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- Payment Method -->
                                                <div class="payment-method mt-4">
                                                    <h5>Payment Method</h5>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" wire:model="payment_mode" checked>
                                                        <label class="form-check-label" for="cod">
                                                            <strong>Cash on Delivery</strong> - Pay when you receive your order
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- Place Order Button -->
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
                            <div class="shopping-checkout-disabled">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="col-md-9 ml-1">
                            <p>If you have a promo code, please enter the code to get a discount.</p>
                            <div class="promocode d-flex justify-content-between">
                                <div class="form-group">
                                    <input class="form-control promocode" wire:model.live="promoCode" type="text" name="promocode" placeholder="Discount Code" />
                                </div>
                                <div class="btn btn-promocode-apply" wire:click="applyPromoCode" type="button">Apply</div>
                            </div>
                        </div>
                        
                        @if($promoCodeApplied)
                            <div class="border-promocode m-2">
                                <span class="applied-promo-code mt-4" style="background-color: #f0808029; padding: 10px; font-weight: 600;">
                                    Promo Code: <i class="fa fa-tag"></i> {{ $promoCode }}
                                </span>
                            </div>
                        @endif
                        
                        @if($totalProductAmount != 0)
                            <div class="shopping-cart-summary mt-md-70 mt-2">
                                <div class="cart-detailed-totals">
                                    <div class="card-block">
                                        {{-- <div class="card-block-item">
                                            <span class="label">Subtotal</span>
                                            <span class="value">${{ number_format($totalProductAmount, 2) }}</span>
                                        </div> --}}
                                        {{-- <div class="card-block-item">
                                            <span class="label">Shipping</span>
                                            <span class="value">Free</span>
                                        </div> --}}
                                        <div class="card-block-item">
                                            <span class="label">Total</span>
                                            <span class="value">${{ number_format($totalProductAmount, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->
    
    <!-- Hidden logout form -->
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        @csrf
    </form>
    
    @script
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('personalInfoValidated', () => {
                // Close the personal info section
                const collapseTwo = document.getElementById('collapseTwo');
                if (collapseTwo) {
                    const bsCollapseTwo = new bootstrap.Collapse(collapseTwo, {
                        toggle: false
                    });
                    bsCollapseTwo.hide();
                }
                
                // Open the payment section
                const collapseThree = document.getElementById('collapseThree');
                if (collapseThree) {
                    const bsCollapseThree = new bootstrap.Collapse(collapseThree, {
                        toggle: false
                    });
                    bsCollapseThree.show();
                }
            });
        });
    </script>
    @endscript
</div>