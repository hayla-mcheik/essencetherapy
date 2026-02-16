<?php
namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Product;
use App\Helpers\CartHelper;

class AddToCart extends Component
{
    public $product;

    public function mount($product) {
        $this->product = $product;
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product || $product->status != '0') {
            $this->dispatch('message', text: 'Product Does not exist', type: 'warning', status: 404);
            return;
        }

        if (!auth()->check()) {
            CartHelper::addItem($productId);
        } else {
            $cartItem = \App\Models\Cart::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                if ($product->quantity > $cartItem->quantity) {
                    $cartItem->increment('quantity');
                }
            } else {
                \App\Models\Cart::create([
                    'user_id' => auth()->id(),
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
            }
        }

        // Calculate new totals
        $newTotal = $this->calculateNewTotal($productId);
        $newCount = $this->calculateNewCount();
        
        // Dispatch both events to update all components
        $this->dispatch('CartAddedUpdated');
        $this->dispatch('cartUpdated', 
            total: $newTotal, 
            count: $newCount
        );
        
        $this->dispatch('message', text: 'Added to Cart', type: 'success', status: 200);
    }

    private function calculateNewTotal($productId)
    {
        if (auth()->check()) {
            $carts = \App\Models\Cart::where('user_id', auth()->id())->with('product')->get();
            return $carts->sum(function($cart) {
                return ($cart->product->selling_price ?? 0) * $cart->quantity;
            });
        } else {
            $guestCart = CartHelper::getGuestCart();
            $total = 0;
            foreach ($guestCart as $id => $data) {
                $product = Product::find($id);
                if ($product) {
                    $total += $product->selling_price * $data['quantity'];
                }
            }
            return $total;
        }
    }

    private function calculateNewCount()
    {
        if (auth()->check()) {
            return \App\Models\Cart::where('user_id', auth()->id())->count();
        } else {
            return CartHelper::getCartCount();
        }
    }

    public function render() {
        return view('livewire.frontend.cart.add-to-cart');
    }
}