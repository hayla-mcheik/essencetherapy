<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Helpers\CartHelper;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        $guestCart = CartHelper::getGuestCart();
        
        if (!empty($guestCart)) {
            foreach ($guestCart as $productId => $details) {
                \App\Models\Cart::updateOrCreate(
                    ['user_id' => $user->id, 'product_id' => $productId],
                    ['quantity' => $details['quantity']]
                );
            }
            // Delete the cookie after merging
            CartHelper::forgetGuestCart();
        }

        return $user->role_as == '1' 
            ? redirect('admin/dashboard') 
            : redirect('/')->with('status','Logged In Successfully');
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}