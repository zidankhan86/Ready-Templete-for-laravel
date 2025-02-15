<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;




    // ===============================
    // FRONTEND ROUTES
    // ===============================

    //Pages
    Route::prefix('/')->group(function () {
        Route::get('/', [FrontendHomeController::class, 'index'])->name('home');
        Route::get('/about', [CustomPageController::class, 'about'])->name('about.page');

        // Product Routes
        Route::get('/product/page', [FrontendHomeController::class, 'product'])->name('product.page');
        Route::get('/product/details/{slug}', [FrontendHomeController::class, 'details'])->name('product.details');

        // Category & Contact
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');

        // Cart
        Route::get('/products/cart', [ProductController::class, 'cart'])->name('cart');
    });


    // ===============================
    // AUTHENTICATION ROUTES
    // ===============================
    Route::prefix('auth')->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/store', [AuthController::class, 'store'])->name('store');

        // Registration Routes
        Route::get('/registration', [RegistrationController::class, 'index'])->name('registration');
        Route::post('/registration/store', [RegistrationController::class, 'store'])->name('registration.store');
    });

    // ===============================
    // BACKEND ROUTES (Protected by Auth Middleware)
    // ===============================
    Route::prefix('admin')->middleware('auth')->group(function () {

    // ===============================
    // CART MANAGEMENT
    // ===============================
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');

    // ===============================
    // DASHBOARD & CUSTOM PAGES
    // ===============================
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/custom/page', [CustomPageController::class, 'index'])->name('custom.page.index');
    Route::get('/custom/page/edit/{id}', [CustomPageController::class, 'edit'])->name('custom.page.edit');
    Route::post('/custom/page/update/{id}', [CustomPageController::class, 'update'])->name('custom.page.update');

    // ===============================
    // PRODUCT MANAGEMENT
    // ===============================
    Route::get('/product/create', [PropertyController::class, 'create'])->name('product.create');
    Route::post('/product/store', [PropertyController::class, 'store'])->name('product.store');
    Route::get('/product/index', [PropertyController::class, 'index'])->name('products.index');
    Route::get('/product/edit/{id}', [PropertyController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [PropertyController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{id}', [PropertyController::class, 'destroy'])->name('product.destroy');

    // ===============================
    // AUTH & USER MANAGEMENT
    // ===============================
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user-list', [AuthController::class, 'list'])->name('user.list');

    // ===============================
    // CATEGORY MANAGEMENT
    // ===============================
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

    // ===============================
    // SETTINGS & PASSWORD MANAGEMENT
    // ===============================
    Route::get('/settings', [SettingController::class, 'index'])->name('setting');
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/update-password/{id}', [ChangePasswordController::class, 'update'])->name('update.password');

    // ===============================
    // PROFILE MANAGEMENT
    // ===============================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    // ===============================
    // REGISTRATION UPDATE
    // ===============================
    Route::post('/registration/update/{id}', [RegistrationController::class, 'update'])->name('registration.update');

    // ===============================
    // ROLE & PERMISSION MANAGEMENT
    // ===============================
    Route::get('/roles', [RolePermissionController::class, 'createRole'])->name('roles.permission.create');
    Route::get('/roles/permission/index', [RolePermissionController::class, 'index'])->name('roles.permission.index');
    Route::post('/roles/store', [RolePermissionController::class, 'storeRole'])->name('store.roles');
    Route::post('/permissions/store', [RolePermissionController::class, 'createPermission'])->name('permissions.create');
    Route::post('/roles/assign', [RolePermissionController::class, 'assignRole'])->name('assign.role');
    Route::post('/permissions/assign', [RolePermissionController::class, 'assignPermission'])->name('assign.permission');
});
