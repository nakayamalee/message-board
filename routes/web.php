<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartTypeController;
use App\Http\Controllers\HwController;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/', [FrontController::class, ''])->name('');

Route::get('/cartAdd', [CartController::class, 'cartAdd'])->name('nameCartAdd');
Route::get('/cart-edit/{id}', [CartController::class, ('cartEdit')])->name('nameCartEdit');
Route::get('/cart-product-list', [CartController::class, ('cartProductList')])->name('namecartProductList');

Route::post('/cart-store', [CartController::class, ('cartStore')])->name('namecartStore');
Route::post('/cart-update/{id}', [CartController::class, ('cartUpdate')])->name('namecartUpdate');
Route::post('/cart-delete/{id}', [CartController::class, ('cartDelete')])->name('nameCartDelete');
Route::post('/cart-delete/{id}', [CartController::class, ('cartDelete')])->name('nameCartDelete');

Route::resource('/type', CartTypeController::class);

Route::resource('/hw', HwController::class);

Route::post('/hw/re/{id}',[HwController::class, ('hwRe')])->name('nameRe');
Route::put('/hw/reModify/{id}',[HwController::class, ('hwReModify')])->name('nameReModify');
Route::delete('/hw/reDelete/{id}',[HwController::class, ('hwReDelete')])->name('nameDelete');
