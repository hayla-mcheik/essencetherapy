<?php
namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Product;
use App\Helpers\CartHelper;

class CartItems extends Component
{
    public $cartData = [];
    public $total = 0;
    public $count = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'loadCart',
        'cartUpdated' => 'handleCartUpdate'
    ];

    public function mount()
    {
        $this->loadCart();
    }

    public function handleCartUpdate($total, $count)
    {
        // If we receive the total from the event, use it directly
        if ($total !== null) {
            $this->total = $total;
            $this->count = $count;
            // Still reload cart data to ensure items are correct
            $this->loadCartData();
        } else {
            // Fallback to full reload
            $this->loadCart();
        }
    }

    public function loadCart()
    {
        $this->loadCartData();
        $this->calculateTotals();
        
        // Dispatch the updated totals to other components
        $this->dispatch('cartUpdated', 
            total: $this->total, 
            count: $this->count
        );
    }

    public function loadCartData()
    {
        if (auth()->check()) {
            // For authenticated users - get from database
            $dbCarts = \App\Models\Cart::where('user_id', auth()->id())
                ->with('product.productImages', 'product.category')
                ->get();
            
            $items = [];
            foreach ($dbCarts as $cart) {
                if ($cart->product) {
                    $items[] = [
                        'id' => $cart->product->id,
                        'name' => $cart->product->name,
                        'slug' => $cart->product->slug,
                        'price' => $cart->product->selling_price,
                        'quantity' => $cart->quantity,
                        'image' => $cart->product->productImages->first()->image ?? null,
                        'category_slug' => $cart->product->category->slug ?? 'all'
                    ];
                }
            }
            $this->cartData = $items;
        } else {
            // For guest users - get from cookie
            $guestCart = CartHelper::getGuestCart();
            $items = [];
            
            foreach ($guestCart as $productId => $data) {
                $product = Product::with('productImages', 'category')->find($productId);
                if ($product) {
                    $items[] = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'slug' => $product->slug,
                        'price' => $product->selling_price,
                        'quantity' => $data['quantity'],
                        'image' => $product->productImages->first()->image ?? null,
                        'category_slug' => $product->category->slug ?? 'all'
                    ];
                }
            }
            $this->cartData = $items;
        }
    }

    public function calculateTotals()
    {
        $this->total = collect($this->cartData)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $this->count = count($this->cartData);
        
        // Log for debugging (remove in production)
        \Log::info('CartItems totals calculated', [
            'total' => $this->total,
            'count' => $this->count,
            'items' => $this->cartData
        ]);
    }

    public function removeItem($productId)
    {
        if (auth()->check()) {
            \App\Models\Cart::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            CartHelper::removeItem($productId);
        }
        
        $this->loadCart(); // This will recalculate and dispatch events
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-items', [
            'items' => $this->cartData,
            'total' => $this->total,
            'count' => $this->count
        ]);
    }
}