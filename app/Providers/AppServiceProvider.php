<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\Cart;
use App\Models\Category; // 1. Added this
use App\Models\Ticker;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
public function boot(): void
{
    Paginator::useBootstrap();

    // Share website settings globally
    $websiteSetting = Setting::first();
    View::share('appSetting', $websiteSetting);

    // Share categories and tickers with the frontend layouts
    View::composer(['layouts.app', 'layouts.inc.frontend.header'], function ($view) {
        $categories = Category::where('status', '0')->get(); 
        $tickers = Ticker::take(3)->get();

        // Corrected syntax using an array
        $view->with([
            'allCategories' => $categories,
            'tickers' => $tickers
        ]);
    });

    // Your existing Cart logic
    View::composer('*', function ($view) {
        $cartItems = collect(); 
        if (auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->user()->id)
                             ->with('product.productImages') 
                             ->get();
        }
        $view->with('carts', $cartItems);
    });
}
}