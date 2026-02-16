<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware grou
p. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes([
    'verify' => true
]);

Route::get('/debug-cart-view', function() {
    if (auth()->check()) {
        $cart = \App\Models\Cart::where('user_id', auth()->id())
            ->with('product')
            ->get()
            ->toArray();
    } else {
        $guestCart = \App\Helpers\CartHelper::getGuestCart();
        $productIds = array_keys($guestCart);
        $products = \App\Models\Product::whereIn('id', $productIds)->get();
        
        $cart = [];
        foreach($products as $product) {
            $cart[] = [
                'id' => $product->id,
                'product' => $product->toArray(),
                'quantity' => $guestCart[$product->id]['quantity']
            ];
        }
    }
    
    return response()->json([
        'cart' => $cart,
        'count' => count($cart),
        'html' => view('debug-cart', ['cart' => $cart])->render()
    ]);
});


    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/','index');
    Route::get('/collections','categories');
    Route::get('/collections/{category_slug}','products');
    Route::get('/collections/{category_slug}/{product_slug}','productView');
Route::get('/new-arrivals', 'newArrival');
Route::get('/featured-products', 'featuredProducts');
Route::get('/aboutus', 'aboutus');
Route::get('/blogs', 'blogs');
Route::get('/blog/details/{id}', 'blogdetails');
Route::get('/contactus', 'contactus');
Route::get('search','searchProducts');
Route::post('/contact/submit', 'contactsubmit');
Route::post('/subscribe', 'subscribe');
Route::get('/product/quick-view/{id}','quickView');
});

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);

    Route::get('orders',[App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}',[App\Http\Controllers\Frontend\OrderController::class, 'show']);
    Route::get('profile',[App\Http\Controllers\Frontend\UserController::class,'index']);
    Route::post('profile',[App\Http\Controllers\Frontend\UserController::class,'updateUserDetails']);
    Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class,'passwordCreate']);
    Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class,'changePassword']);
    Route::get('account', [App\Http\Controllers\Frontend\UserController::class,'account']);
});

Route::get('thank-you',[App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
        Route::get('promocode',[App\Http\Controllers\Admin\PromocodeController::class,'index'])->name('admin.promocode');
    Route::get('promocode/edit/{id}',[App\Http\Controllers\Admin\PromocodeController::class,'edit'])->name('admin.promocode.edit');
    Route::put('promocode/{id}',[App\Http\Controllers\Admin\PromocodeController::class,'update'])->name('admin.promocode.update');
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);

Route::get('settings',[App\Http\Controllers\Admin\SettingController::class, 'index']);
Route::post('settings',[App\Http\Controllers\Admin\SettingController::class, 'store']);

// Add this inside the Route::prefix('admin')->group(function () { ... }); block
Route::controller(App\Http\Controllers\Admin\BannerController::class)->group(function () {
    Route::get('/banners', 'index')->name('admin.banners.index');
    Route::get('/banners/edit', 'edit')->name('admin.banners.edit'); // No {id} needed if it's only one
    Route::put('/banners/update', 'update')->name('admin.banners.update');
});

Route::controller(App\Http\Controllers\Admin\TickerController::class)->group(function () {
    Route::get('/tickers', 'index')->name('admin.tickers.index');
    Route::post('/tickers', 'store')->name('admin.tickers.store'); // Added this line
    Route::put('/tickers/{id}', 'update')->name('admin.tickers.update');
});
Route::controller(App\Http\Controllers\Admin\ReviewsController::class)->group(function () {
Route::get('/reviews','index')->name('admin.reviews.index');
Route::get('/reviews/create','create')->name('admin.reviews.create');
Route::post('/reviews','store')->name('admin.reviews.store');
Route::get('/reviews/{id}/edit/','edit')->name('admin.reviews.edit');
Route::put('/reviews/{id}','update')->name('admin.reviews.update');
Route::get('/reviews/{id}/delete','delete')->name('admin.reviews.delete');
});

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
Route::get('sliders','index');
Route::get('sliders/create','create');
Route::post('sliders/create','store');
Route::get('sliders/{slider}/edit','edit');
Route::put('sliders/{slider}','update');
Route::get('sliders/{slider}/delete','destroy');
    });


    Route::controller(App\Http\Controllers\Admin\BlogsController::class)->group(function () {
        Route::get('blogs','index');
        Route::get('blogs/create','create');
        Route::post('blogs/create','store');
        Route::get('blogs/{blog}/edit','edit');
        Route::put('blogs/{blog}','update');
        Route::get('blogs/{blog}/delete','destroy');
            });

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create','create');   
         Route::post('/products','store');
         Route::get('/products/{product}/edit','edit');
         Route::put('/products/{product}','update');
         Route::get('/products/{product_id}/delete','destroy');
         Route::get('/product-image/{product_image_id}/delete','destroyImage');
         Route::post('/product-color/{prod_color_id}','updateProdColorQty');
         Route::get('/product-color/{prod_color_id}/delete','');

    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create','create');   
        Route::post('/colors/create','store');   
        Route::get('/colors/{color}/edit','edit');   
        Route::put('/colors/{color_id}','update');   
        Route::get('/colors/{color_id}/delete','destroy');   
    });


    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index'); 
        Route::get('/orders/{orderId}', 'show'); 
        Route::put('/orders/{orderId}', 'updateOrderStatus'); 

        Route::get('/invoice/{orderId}', 'viewInvoice'); 
        Route::get('/invoice/{orderId}/generate', 'generateInvoice'); 
        Route::get('/invoice/{orderId}/mail', 'mailInvoice'); 
    });



    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index'); 
        Route::get('/users/create', 'create'); 
        Route::post('/users', 'store'); 
        Route::get('/users/{user_id}/edit', 'edit'); 
        Route::put('/users/{user_id}', 'update'); 
        Route::get('/users/{user_id}/delete', 'destroy'); 
    });
Route::get('/brands',App\Livewire\Admin\Brand\Index::class);

});
Route::get('/run-link', function () {
    Artisan::call('storage:link');
    return "Storage link created successfully!";
});