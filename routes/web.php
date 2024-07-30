<?php


use App\Http\Controllers\HomePageController;
use App\Http\Controllers\shopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\cartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\checkoutController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//home route

Route::get('/', [HomePageController::class, 'index'])->name(name:'home');


//login route

Route::get('/login', [AuthManager::class, 'login'])->name(name:'login');

Route::post('/login', [AuthManager::class, 'loginPost'])->name(name:'login.post');

// Registration route
Route::get('/registration', [AuthManager::class, 'registration'])->name(name:'registration');

Route::post('/registration', [AuthManager::class, 'registrationPost'])->name(name:'registration.post');

// user profile route
Route::get('/profile', [AuthManager::class, 'profile'])->name(name:'profile');
// logout route
Route::get('/logout', [AuthManager::class, 'logout'])->name(name:'logout');

//shop route

Route::get('/shopping', [shopController::class, 'index'])->name(name:'shopping');

//Single Product route

Route::get('/shopping/{product}', [shopController::class, 'show'])->name(name:'shop.show');

//Product card route

Route::get('/product', function(){
    return view('productCard');
})->name(name:'productCard');

//cart
/*Route::get('/cart', function(){
    return view('cart');
})->name(name:'cart');*/

Route::get('/cart', [cartController::class, 'index'])->name(name:'cart.index');
Route::post('/cart', [cartController::class, 'store'])->name(name:'cart.store');

//delete item cart
Route::delete('/cart/{product}', [cartController::class, 'destroy'])->name('cart.destroy');

//update item cart
//Route::patch('/cart/{product}', [cartController::class, 'update'])->name('cart.update');
Route::patch('/cart/update', [cartController::class, 'update'])->name('cart.update');
//Route::patch('/cart/update', 'App\Http\Controllers\CartController@update')->name('cart.update');

//checkout route
Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout.index');







Route::get('empty', function(){
    Cart::destroy();
});





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
