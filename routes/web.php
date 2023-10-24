<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {return view('welcome');});
Route::get('/home',[FrontendHomeController::class,'index'])->name('home');

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
Route::get('/setting',[SettingController::class,'index'])->name('setting');
//profile
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
});
