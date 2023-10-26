<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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
Route::get('/blog',[BlogController::class,'index'])->name('blog');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::get('/category',[CategoryController::class,'index'])->name('category');

//Auth
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/store',[AuthController::class,'store'])->name('store');

//Register
Route::get('/registration',[RegistrationController::class,'index'])->name('registration');
Route::post('/registration/store',[RegistrationController::class,'store'])->name('registration.store');

//Backend

//Middleware
Route::group(['middleware'=>'auth'],function(){

//Pages
Route::get('/app',[HomeController::class,'index'])->name('app');
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
