<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class,'index'])->name('anasayfa');

Route::get('/temizle', function () {
   Artisan::call('cache:clear');
   Artisan::call('route:clear');

   return "Cache cleared successfully";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
    
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth','verified');

Route::get('/view_category', [AdminController::class, 'view_category'])->name('view_category');

Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');

Route::get('/delete_category/{id}', [AdminController::class, 'kategoriSil'])->name('delete_category');

Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');

Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');

Route::get('/show_product', [AdminController::class, 'show_product'])->name('show_product');

Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');

Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');

Route::get('/urun-detaylari/{id}', [HomeController::class, 'urun_detaylari'])->name('urun-detaylari');

Route::get('/iletisim', [HomeController::class, 'iletisim'])->name('iletisim');

Route::get('/hakkimizda', [HomeController::class, 'hakkimizda'])->name('hakkimizda');

Route::get('/yorumlar', [HomeController::class, 'yorumlar'])->name('yorumlar');

Route::get('/urunler', [HomeController::class, 'urunler'])->name('urunler');

Route::get('/neden-biz', [HomeController::class, 'nedenBiz'])->name('neden-biz');

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');

Route::get('/sepetim', [HomeController::class, 'sepetim'])->name('sepetim');

Route::get('/urun_sil/{id}', [HomeController::class, 'urun_sil'])->name('urun_sil');

Route::post('/add_comment', [HomeController::class, 'add_comment'])->name('add_comment');

Route::post('/add_reply', [HomeController::class, 'add_reply'])->name('add_reply');

Route::get('/kapida_ode', [HomeController::class, 'kapida_ode'])->name('kapida_ode');

Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe'])->name('stripe');

Route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');



