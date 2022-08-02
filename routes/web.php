<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\CurrencyCountryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('oms');
// });


Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
//////////////////////////////////////////////////////////////////////////////////////////

Route::get('/sessions', [PagesController::class, 'index']); // To see sessions
// Route::get('/users', [UserController::class, 'index']);

Route::resource('currency_countries', CurrencyCountryController::class);
Route::resource('orders', OrderController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('carts', CartController::class);

// Route::get('/patients/show/{id}', [PatientController::class, 'show'])->name('patients.show');
Route::get('/shop', [ProductController::class, 'shopindex'])->name('shop');

Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/update-cart', [CartController::class, 'update'])->name('update.cart');
Route::get('/remove-from-cart/{id}', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('/carts-checkout/{id}', [CartController::class, 'checkout'])->name('carts.checkout');

//->name() = die link bv ->name('remove.from.cart'); is op carts.inex page as  <a href="{{ route('remove.from.cart', $id) }}"
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['namespace' => 'App\Http\Controllers'], function () {
//     /**
//      * Home Routes
//      */
//     // Route::get('/', 'HomeController@index')->name('home.index'); //changed to redirect to orders index page

//     Route::group(['middleware' => ['guest']], function () {
//         /**
//          * Register Routes
//          */
//         Route::get('/register', [RegisterController::class, 'showLoginForm'])->name('register.showLoginForm');
//         Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
//         Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

//         /**
//          * Login Routes
//          */
//         // Route::get('/login', [LoginController::class, 'show'])->name('login.show');
//         Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
//     });

// });

// Route::get('/logout', [LoginController::class, 'logout']);
