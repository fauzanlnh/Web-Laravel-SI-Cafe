<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerMenuController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\DashboardMenuController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardStaffController;

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
//Route::get('/',[MakananController::class,'index']);

//Index
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('login/check', [AuthController::class, 'checkLogin']);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', [DashboardOrderController::class, 'indexAdmin']);
    Route::resource('/admin/menu', DashboardMenuController::class);
    Route::resource('/admin/staff', DashboardStaffController::class);

    // 
    Route::get('/admin/Pemesanan', 'App\Http\Controllers\PemesananController@getTransaksi');
    Route::get('/admin/transaksi', 'App\Http\Controllers\PemesananController@viewDataTransaksi');
    Route::get('/admin/Transaksi/Export', 'App\Http\Controllers\PemesananController@export_excel');

    //koki
    Route::get('/koki', [DashboardOrderController::class, 'indexChef']);
    Route::patch('/koki/process/{process}/{id_detail}', [DashboardOrderController::class, 'processOrderChef']);

    //petugas / Kasir
    Route::get('/petugas', [DashboardOrderController::class, 'indexPetugas']);
    Route::get('/petugas/checkout/{orderId}', [DashboardOrderController::class, 'viewCheckoutDetail']);
    Route::patch('/petugas/checkout/{orderId}', [DashboardOrderController::class, 'processCheckout']);

});


//Tamu
// New
Route::get('/customer', [CustomerOrderController::class, 'index']);
Route::post('/customer/check-in', [CustomerOrderController::class, 'checkIn']);
Route::get('/customer/{tableNumber}/order/list', [CustomerOrderController::class, 'detailOrder']);
Route::post('/customer/{tableNumber}/order/detail/save', [CustomerOrderController::class, 'saveToCart']);
Route::delete('/customer/{tableNumber}/order/detail/delete/{orderDetailId}', [CustomerOrderController::class, 'cancelOrderInCart']);
Route::patch('/customer/{tableNumber}/order/detail/process/cart', [CustomerOrderController::class, 'processOrderInCart']);
Route::get('/customer/{tableNumber}/order/invoice', [CustomerOrderController::class, 'viewInvoice']);

Route::get('/customer/{tableNumber}/order/food', [CustomerMenuController::class, 'viewFoodMenu']);
Route::get('/customer/{tableNumber}/order/drink', [CustomerMenuController::class, 'viewDrinkMenu']);
Route::get('/customer/{tableNumber}/order/detail-menu/{idMenu}', [CustomerMenuController::class, 'viewDetailMenu']);