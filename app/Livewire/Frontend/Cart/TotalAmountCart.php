<?php
namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Helpers\CartHelper;

class TotalAmountCart extends Component
{
    public $totalcartamount = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'updateTotal',
        'cartUpdated' => 'updateTotal'
    ];

    public function mount()
    {
        $this->updateTotal();
    }

    public function updateTotal()
    {
        if (auth()->check()) {
            $carts = \App\Models\Cart::where('user_id', auth()->id())->with('product')->get();
            $this->totalcartamount = $carts->sum(function($cart) {
                return ($cart->product->selling_price ?? 0) * $cart->quantity;
            });
        } else {
            $guestCart = CartHelper::getGuestCart();
            $total = 0;
            
            foreach ($guestCart as $productId => $data) {
                $product = \App\Models\Product::find($productId);
                if ($product) {
                    $total += $product->selling_price * $data['quantity'];
                }
            }
            
            $this->totalcartamount = $total;
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.total-amount-cart');
    }
}