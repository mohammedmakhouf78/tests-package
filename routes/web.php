<?php

// use Illuminate\Support\Facades\Route;
// use Mohammedmakhlouf78\Tests\Http\Controllers\ProductController;


// Route::get('auth/facebook-redirect', [ProductController::class, 'facebookRedirect'])->name('auth.facebookRedirect');
// Route::get('auth/facebook-callback', [ProductController::class, 'facebookCallback'])->name('auth.facebookCallback');
// Route::get('auth/user-logout', [ProductController::class, 'userLogout'])->name('auth.userLogout');
// Route::post('auth/user-register', [ProductController::class, 'userRegister'])->name('auth.userRegister');
// Route::post('auth/user-login', [ProductController::class, 'userLogin'])->name('auth.userLogin');

// Route::group(['as' => 'front.'], function () {
//     Route::get('/login-page', [ProductController::class, 'loginPage'])->name('loginPage');
//     Route::get('/register-page', [ProductController::class, 'registerPage'])->name('registerPage');

//     Route::get('/', [ProductController::class, 'home'])->name('home');
//     Route::get('/profile', [ProductController::class, 'profile'])->name('profile')->middleware('auth');
//     Route::get('/profile/update/page', [ProductController::class, 'profileUpdatePage'])->name('profileUpdatePage')->middleware('auth');
//     Route::post('/profile/update', [ProductController::class, 'profileUpdate'])->name('profileUpdate')->middleware('auth');

//     Route::get('products', [ProductController::class, 'productsPage'])->name('productsPage');
//     // Route::get('getProducts', [ProductController::class, 'getProducts'])->name('getProducts');
//     Route::get('products/{product}', [ProductController::class, 'productShow'])->name('productShow');
//     Route::get('products/{product}/rate', [ProductController::class, 'productRate'])->name('productRate');
//     Route::post('products/{product}/comment', [ProductController::class, 'productComment'])->name('productComment');
// });



// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.',
// ], function () {
//     Route::group([], function () {
//         Route::get('/', [ProductController::class, 'home'])->name('home');

//         Route::resource('setting', ProductController::class);
//         Route::get('/loginPage', [ProductController::class, 'loginPage'])->name('loginPage');
//         Route::post('/login', [ProductController::class, 'login'])->name('login');
//         Route::get('/logout', [ProductController::class, 'logout'])->name('logout');
//         Route::resource('slider', ProductController::class);
//         Route::resource('category', ProductController::class);
//         Route::resource('category', ProductController::class);
//         Route::resource('brand', ProductController::class);
//         Route::resource('product', ProductController::class);
//         Route::resource('color', ProductController::class);
//         Route::resource('productColor', ProductController::class);
//         Route::resource('size', ProductController::class);
//         Route::resource('productSize', ProductController::class);
//         Route::resource('productSpecification', ProductController::class);
//         Route::resource('productImage', ProductController::class);
//         //{route}
//     });
// });
