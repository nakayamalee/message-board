<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartTypeController;
use App\Http\Controllers\HwController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ShopController;
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






// 首頁(誰都可以進來，商城首頁)-----------------------------------------------------------
Route::get('/', function()
{
    return view('index');
})->name('nameIndex');

// 商品頁面(誰都可以進來)-----------------------------------------------------------------
Route::get('/products', [FrontController::class, 'product'])->name('front.products');

// 留言板(有登入才可以到留言板，和編輯留言)--------------------------------------------------
Route::middleware('auth')->resource('/hw', HwController::class);

Route::middleware('auth')->prefix('/hw')->group(function () {
Route::post('/re/{id}',[HwController::class, ('hwRe')])->name('nameRe');
Route::put('/reModify/{id}',[HwController::class, ('hwReModify')])->name('nameReModify');
Route::delete('/reDelete/{id}',[HwController::class, ('hwReDelete')])->name('nameDelete');
});


// 使用者資訊頁面---(有登入才可以到自己的使用者登入頁面)--------------------------------------------------------------------------------
Route::middleware('auth','role.weight:2')->prefix('/user')->group(function () {
Route::get('/information',[FrontController::class,('user_info')])->name('user.info');
Route::post('/information/update',[FrontController::class,('user_info_update')])->name('user.info.update');
});

Route::middleware('auth')->post('/products/add-carts', [FrontController::class, 'add_cart'])->name('front.addCart');

// 測試頁面----------------------------------------------------------------------------------------
Route::get('/test',[FrontController::class,'test'])->name('nameTest');
Route::post('/test2',[FrontController::class,('test2')])->name('nameTest2');
Route::post('/test888',[FrontController::class,('test2')])->name('test.store');





// ----------------------------------------------------------------------------------

// 系統預設登入後到的頁面
Route::middleware('auth','isAdmin')->get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// 後台(商家登入首頁)----------------------------------------------------------------------
Route::middleware('auth','isAdmin')->get('/backend/index', [BackController::class, 'index'])->name('backend.index');

// 商品管理-(商家才能登入)-------------------------------------------------------------------------
Route::middleware('auth','isAdmin')->prefix('/cart')->group(function () {
Route::get('/add', [CartController::class, 'cartAdd'])->name('nameCartAdd');
Route::get('/edit/{id}', [CartController::class, ('cartEdit')])->name('nameCartEdit');
Route::get('/product-list', [CartController::class, ('cartProductList')])->name('namecartProductList');
Route::post('/store', [CartController::class, ('cartStore')])->name('namecartStore');
Route::post('/update/{id}', [CartController::class, ('cartUpdate')])->name('namecartUpdate');
Route::post('/delete/{id}', [CartController::class, ('cartDelete')])->name('nameCartDelete');
});



// 類別管理--(商家才能登入)-----------------------------------------------------------------------------------
Route::middleware('auth','role.weight:1')->resource('/type', CartTypeController::class);




// 系統預設
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// 購物車四頁(同學)
Route::middleware('auth')->prefix('/shop')->group(function () {
    // 第一頁(商品)
    Route::get('/orderdetails', [ShopController::class, 'orderdetails'])->name('shopOrderdetailsGet');
    Route::put('/update', [ShopController::class, 'update'])->name('nameUpdate');
    Route::delete('/delete-cart', [ShopController::class, 'deleteCart'])->name('shop.deleteCart');

    // Route::get('/store/price', [ShopController::class, 'storePrice'])->name('shopStorePrice');

    // 第二頁(地址)
    Route::get('/deliver', [ShopController::class, 'deliver'])->name('shopDeliverGet');
    Route::post('/store/deliver', [ShopController::class, 'storeDeliver'])->name('shopStoreDeliver');

    // 第三頁(付款)
    Route::post('/store/money', [ShopController::class, 'storeMoney'])->name('shopStoreMoney');
    Route::get('/money', [ShopController::class, 'money'])->name('shopMoneyGet');

    // 第四頁(感謝)
    // Route::post('/store/order', [ShopController::class, 'thx'])->name('shopStoreOrder');
    Route::get('/thx', [ShopController::class, 'thx'])->name('shopThxGet');
    Route::get('/ordercheck', [ShopController::class, 'ordercheck'])->name('shopOrderCheck');
});

// Route::get('/', [FrontController::class, ''])->name('');


// -------------------整理前的route------------------------------------------------

// 留言板
// Route::resource('/hw', HwController::class);
// Route::middleware('auth')->post('/hw/re/{id}',[HwController::class, ('hwRe')])->name('nameRe');
// Route::middleware('auth')->put('/hw/reModify/{id}',[HwController::class, ('hwReModify')])->name('nameReModify');
// Route::middleware('auth')->delete('/hw/reDelete/{id}',[HwController::class, ('hwReDelete')])->name('nameDelete');



// 商品管理
// Route::get('/cartAdd', [CartController::class, 'cartAdd'])->name('nameCartAdd');
// Route::get('/cart-add', [CartController::class, 'cartAdd'])->name('nameCartAdd');
// Route::get('/cart-edit/{id}', [CartController::class, ('cartEdit')])->name('nameCartEdit');
// Route::get('/cart-product-list', [CartController::class, ('cartProductList')])->name('namecartProductList');

// Route::post('/cart-store', [CartController::class, ('cartStore')])->name('namecartStore');
// Route::post('/cart-update/{id}', [CartController::class, ('cartUpdate')])->name('namecartUpdate');
// Route::post('/cart-delete/{id}', [CartController::class, ('cartDelete')])->name('nameCartDelete');

