<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;

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

//Frontend

//Pages
Route::get('/',[FrontendHomeController::class,'index'])->name('home');
Route::get('/product/page',[FrontendHomeController::class,'product'])->name('product.page');
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/category',[CategoryController::class,'index'])->name('category');

Route::get('/products/cart', [ProductController::class,'cart'])->name('cart');


//Auth
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/store',[AuthController::class,'store'])->name('store');

//Register
Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store',[RegistrationController::class,'store'])->name('registration.store');

//Backend

//Middleware
Route::group(['middleware'=>'auth'],function(){

    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

//Pages
Route::get('/app',[HomeController::class,'index'])->name('app');

Route::get('/custom/page', [CustomPageController::class,'index'])->name('custom.page.index');
Route::get('/edit/{id}', [CustomPageController::class,'edit'])->name('custom.page.edit');
Route::post('/update/{id}', [CustomPageController::class,'update'])->name('custom.page.update');

//Product
Route::get('/product', [ProductController::class,'create'])->name('product.create');
Route::post('/product', [ProductController::class,'store'])->name('product');


Route::get('/product/index', [ProductController::class,'index'])->name('products.index');
Route::put('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::delete('/product/delete/{id}', [ProductController::class,'store'])->name('product.destroy');


Route::get('/logout',[TestController::class,'logout'])->name('logout');
Route::get('/form',[TestController::class,'form'])->name('form');
Route::get('/setting',[SettingController::class,'index'])->name('setting');
Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change.password');
Route::post('/update-password/{id}',[ChangePasswordController::class,'update'])->name('update.password');
Route::get('/user-list',[AuthController::class,'list'])->name('user.list');
Route::get('/category-list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category-form',[CategoryController::class,'form'])->name('category.form');
Route::get('/blog-list',[BlogController::class,'list'])->name('blog.list');
Route::get('/blog-form',[BlogController::class,'form'])->name('blog.form');

//profile
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
//post
Route::post('/registration/update{id}',[RegistrationController::class,'update'])->name('registration.update');
});
