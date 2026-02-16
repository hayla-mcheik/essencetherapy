<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

class CartHelper
{
    public static function getGuestCart()
    {
        $cookieValue = request()->cookie('guest_cart');
        
        if (empty($cookieValue)) {
            return [];
        }
        
        // Log the raw cookie
        Log::debug('CartHelper: Raw cookie', ['value' => $cookieValue]);
        
        // Try to decode JSON
        $decoded = json_decode($cookieValue, true);
        
        if (is_array($decoded)) {
            Log::debug('CartHelper: Successfully decoded', ['cart' => $decoded]);
            return $decoded;
        }
        
        // If it's URL encoded, decode it first
        if (str_contains($cookieValue, '%7B')) {
            $decoded = urldecode($cookieValue);
            Log::debug('CartHelper: URL decoded', ['decoded' => $decoded]);
            return json_decode($decoded, true) ?? [];
        }
        
        return [];
    }
    
    public static function setGuestCart($cartData)
    {
        $jsonData = json_encode($cartData);
        
        Log::debug('CartHelper: Setting cookie', [
            'cart' => $cartData,
            'json' => $jsonData
        ]);
        
        // Queue the cookie
        cookie()->queue('guest_cart', $jsonData, 10080); // 7 days
        
        // Also set it in the current request
        request()->cookies->set('guest_cart', $jsonData);
        $_COOKIE['guest_cart'] = $jsonData;
    }
    
    public static function addItem($productId, $quantity = 1)
    {
        $cart = self::getGuestCart();
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = ['quantity' => $quantity];
        }
        
        self::setGuestCart($cart);
        return $cart;
    }
    
    public static function removeItem($productId)
    {
        $cart = self::getGuestCart();
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            self::setGuestCart($cart);
        }
        
        return $cart;
    }
    
    public static function updateQuantity($productId, $quantity)
    {
        $cart = self::getGuestCart();
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = max(1, $quantity);
            self::setGuestCart($cart);
        }
        
        return $cart;
    }
    
    public static function clearCart()
    {
        self::forgetGuestCart();
    }
    
    public static function forgetGuestCart()
    {
        // Queue cookie for deletion
        cookie()->queue(cookie()->forget('guest_cart'));
        
        // Remove from current request
        request()->cookies->remove('guest_cart');
        
        // Remove from global $_COOKIE
        if (isset($_COOKIE['guest_cart'])) {
            unset($_COOKIE['guest_cart']);
        }
        
        Log::debug('CartHelper: Guest cart forgotten');
    }
    
    public static function getCartCount()
    {
        return count(self::getGuestCart());
    }
    
    public static function getCartItems()
    {
        return self::getGuestCart();
    }
}