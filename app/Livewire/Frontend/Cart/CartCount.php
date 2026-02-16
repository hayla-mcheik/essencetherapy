<?php
namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Helpers\CartHelper;

class CartCount extends Component
{
    public $cartCount = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'updateCount',
        'cartUpdated' => 'updateCount'
    ];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        if (auth()->check()) {
            $this->cartCount = \App\Models\Cart::where('user_id', auth()->id())->count();
        } else {
            $this->cartCount = CartHelper::getCartCount();
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-count');
    }
}