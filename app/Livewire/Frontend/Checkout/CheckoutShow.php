<?php
namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\PromoCode;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;
use App\Helpers\CartHelper;

class CheckoutShow extends Component
{
    public $carts;
    public $totalProductAmount = 0;
    public $fullname, $phone, $address, $email;
    public $payment_mode = null, $payment_id = null;
    public $promoCode;
    public $promoCodeApplied = false;
    public $isPersonalInfoValid = false;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'phone' => 'required|string|max:15|min:8',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
        ];
    }

    public function mount()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $this->fullname = $user->name;
            $this->email = $user->email;
            if ($user->userDetail) {
                $this->phone = $user->userDetail->phone;
                $this->address = $user->userDetail->address;
            }
        }

        $this->calculateTotal();
    }

    /**
     * Validate personal information and proceed to next step
     */
    public function validatePersonalInformation()
    {
        $validatedData = $this->validate([
            'fullname' => 'required|string|max:121',
            'phone' => 'required|string|max:15|min:8',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
        ]);

        // Mark personal info as valid
        $this->isPersonalInfoValid = true;
        
        // Dispatch event to close personal info section and open payment section
        $this->dispatch('personalInfoValidated');
        
        // Show success message
        $this->dispatch('message', text: 'Personal information saved successfully', type: 'success', status: 200);
    }

    public function applyPromoCode()
    {
        if ($this->promoCodeApplied) {
            $this->dispatch('message', text: 'Promo code already applied.', type: 'error', status: 200);
            return;
        }

        $promo = PromoCode::where('code', $this->promoCode)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->first();

        if (!$promo) {
            $this->dispatch('message', text: 'Invalid or expired promo code.', type: 'error', status: 200);
            return;
        }

        $discountAmount = $this->totalProductAmount * $promo->discount_amount;

        if ($discountAmount <= 0) {
            $this->dispatch('message', text: 'Promo code discount is invalid.', type: 'error', status: 200);
            return;
        }

        $this->totalProductAmount -= $discountAmount;
        $this->promoCodeApplied = true;

        $this->dispatch('message', text: 'Promo code applied successfully', type: 'success', status: 200);
    }

    public function calculateTotal()
    {
        $this->totalProductAmount = 0;

        if (auth()->check()) {
            $this->carts = Cart::where('user_id', auth()->id())->with('product')->get();
        } else {
            $guestCart = CartHelper::getGuestCart();
            $productIds = array_keys($guestCart);
            $products = Product::whereIn('id', $productIds)->get();

            $this->carts = $products->map(function($product) use ($guestCart) {
                return (object) [
                    'product_id' => $product->id,
                    'product' => $product,
                    'quantity' => $guestCart[$product->id]['quantity'],
                    'product_color_id' => null
                ];
            });
        }

        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += ($cartItem->product->selling_price ?? 0) * $cartItem->quantity;
        }
    }

public function placeOrder()
{
    // Make sure personal info is validated
    if (!$this->isPersonalInfoValid) {
        $this->dispatch('message', text: 'Please complete your personal information first', type: 'warning', status: 200);
        return null;
    }

    // For guest users, user_id will be null
    $userId = auth()->check() ? auth()->id() : null;

    $orderData = [
        'user_id' => $userId,
        'tracking_no' => 'talys-' . Str::random(10),
        'fullname' => $this->fullname,
        'email' => !empty($this->email) ? $this->email : null, // Ensure empty string becomes null
        'phone' => $this->phone,
        'address' => $this->address,
        'status_message' => 'in progress',
        'payment_mode' => $this->payment_mode,
        'payment_id' => $this->payment_id,
        'total_price' => $this->totalProductAmount,
    ];

    \Log::info('Creating order with data:', $orderData);

    $order = Order::create($orderData);

    foreach ($this->carts as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'product_color_id' => $cartItem->product_color_id ?? null,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->selling_price,
        ]);

        Product::find($cartItem->product_id)->decrement('quantity', $cartItem->quantity);
    }

    return $order;
}

    public function codOrder()
    {
        // Make sure personal info is validated
        if (!$this->isPersonalInfoValid) {
            $this->dispatch('message', text: 'Please complete your personal information first', type: 'warning', status: 200);
            return;
        }

        $this->payment_mode = 'Cash on Delivery';
        $order = $this->placeOrder();

        if ($order) {
            if (auth()->check()) {
                Cart::where('user_id', auth()->id())->delete();
            } else {
                CartHelper::forgetGuestCart();
            }

            if($order->email) {
                try {
                    Mail::to($order->email)->send(new PlaceOrderMailable($order));
                } catch (\Exception $e) {
                    \Log::error('Order email failed: ' . $e->getMessage());
                }
            }

            $this->dispatch('message', text: 'Order Placed Successfully', type: 'success', status: 200);
            return redirect()->to('thank-you');
        }
    }

    public function render()
    {
        return view('livewire.frontend.checkout.checkout-show', [
            'isPersonalInfoValid' => $this->isPersonalInfoValid
        ]);
    }
}