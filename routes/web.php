<?php

use App\Http\Controllers\DashboardOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CustomerMenuController;
use App\Http\Controllers\CustomerOrderController;

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
    //petugas    
//View
    //admin
    Route::get('/admin', 'App\Http\Controllers\PemesananController@index');
    Route::get('/admin/Menu', 'App\Http\Controllers\MenuController@index');
    Route::get('/admin/Menu/Tambah', 'App\Http\Controllers\MenuController@create');
    Route::get('/admin/Menu/Ubah/{id}', 'App\Http\Controllers\MenuController@edit');
    Route::get('/admin/Pegawai', 'App\Http\Controllers\PegawaiController@index');
    Route::get('/admin/Pegawai/Tambah', 'App\Http\Controllers\PegawaiController@create');
    Route::get('/admin/Pegawai/Ubah/{id}', 'App\Http\Controllers\PegawaiController@edit');
    Route::get('/admin/Pemesanan', 'App\Http\Controllers\PemesananController@getTransaksi');
    Route::get('/admin/Transaksi', 'App\Http\Controllers\PemesananController@viewDataTransaksi');
    Route::get('/admin/Transaksi/Export', 'App\Http\Controllers\PemesananController@export_excel');

    //CRUD
    //admin
    Route::post('/admin/Menu/Save', 'App\Http\Controllers\MenuController@store');
    Route::patch('/admin/Menu/Ubah/{id}', 'App\Http\Controllers\MenuController@update');
    Route::delete('/admin/Menu/Delete/{id}', 'App\Http\Controllers\MenuController@destroy');
    Route::post('/admin/Pegawai/Save', 'App\Http\Controllers\PegawaiController@store');
    Route::patch('/admin/Pegawai/Ubah/{id}', 'App\Http\Controllers\PegawaiController@update');
    Route::delete('/admin/Pegawai/Delete/{id}', 'App\Http\Controllers\PegawaiController@destroy');

    //koki
    Route::get('/koki', [DashboardOrderController::class, 'indexChef']);
    Route::patch('/koki/process/{process}/{id_detail}', [DashboardOrderController::class, 'processOrderChef']);

    //petugas / Kasir
    Route::patch('/petugas/Checkout/{id_pemesanan}', 'App\Http\Controllers\PemesananController@prosesCheckout');
    Route::get('/petugas', 'App\Http\Controllers\PemesananController@viewpetugas');
    Route::get('/petugas/Checkout/{id_pemesanan}', 'App\Http\Controllers\PemesananController@viewCheckout');
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