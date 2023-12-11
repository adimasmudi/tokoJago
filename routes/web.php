<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GudangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProdukController;

use Illuminate\Support\Facades\DB;

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

Route::get('/check_db', function() {
    try {
        DB::connection('sqlsrv')->getPDO();
        echo DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        dd($e);
    }
});


Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', function(){
        return view('admin.login');
    });
    Route::get('/', [AdminController::class, 'home']);

    Route::group(['prefix' => 'gudang'], function(){
        Route::get('/', [GudangController::class,'index']);
        Route::get('/create', [GudangController::class, 'create']);
        Route::get('/detail/{id}', [GudangController::class, 'show']);
        Route::get('/edit/{id}', [GudangController::class, 'edit']);

        Route::post('/save', [GudangController::class,'save']);
        Route::post('/update/{id}', [GudangController::class,'update']);
        Route::delete('/delete/{id}', [GudangController::class,'delete']);

        Route::group(['prefix' => 'barangGudang'], function(){
            Route::get('/edit', [GudangController::class, 'editBarangGudang']);
        });
    });

    Route::group(['prefix' => 'toko'], function(){
        Route::get('/', [TokoController::class,'index']);
        Route::get('/create', [TokoController::class, 'create']);
        Route::get('/detail/{id}', [TokoController::class, 'show']);
        Route::get('/edit/{id}', [TokoController::class, 'edit']);

        Route::post('/save', [TokoController::class,'save']);
        Route::post('/update/{id}', [TokoController::class,'update']);
        Route::delete('/delete/{id}', [TokoController::class,'delete']);

        Route::group(['prefix' => 'suplaiBarangToko'], function(){
            Route::get('/{id}', [TokoController::class, 'createSuplaiBarangToko']);
            Route::get('/confirm/{id}/{gudangId}', [TokoController::class, 'createSuplaiBarangTokoConfirm']);

            Route::post('/save',[TokoController::class, 'saveSuplaiBarangToko']);
        });

        Route::group(['prefix' => 'kasirToko'], function(){
            Route::get('/{id}', [TokoController::class, 'createAddKasirToko']);

            Route::post('/save',[TokoController::class, 'saveKasir']);
        });

        
    });

    Route::group(['prefix' => 'supplier'], function(){
        Route::get('/', [SupplierController::class,'index']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::get('/detail/{id}', [SupplierController::class, 'show']);
        Route::get('/edit/{id}', [SupplierController::class, 'edit']);

        Route::post('/save', [SupplierController::class,'save']);
        Route::post('/update/{id}', [SupplierController::class,'update']);
        Route::delete('/delete/{id}', [SupplierController::class,'delete']);

        Route::group(['prefix' => 'suplaiBarang'], function(){
            Route::get('/{id}', [SupplierController::class, 'createSuplaiBarangSupplier']);
            Route::get('/confirm/{id}/{gudangId}', [SupplierController::class, 'createSuplaiBarangSupplierConfirm']);

            Route::post('/save',[SupplierController::class, 'saveSuplaiBarang']);
        });
    });

    Route::group(['prefix' => 'barang'], function(){
        Route::get('/', [BarangController::class,'index']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::get('/detail/{id}', [BarangController::class, 'show']);
        Route::get('/edit/{id}', [BarangController::class, 'edit']);

        Route::post('/save', [BarangController::class,'save']);
        Route::post('/update/{id}', [BarangController::class,'update']);
        Route::delete('/delete/{id}', [BarangController::class,'delete']);
    });
});

Route::group(['prefix' => 'kasir'], function(){
        Route::post('/login', [KasirController::class, 'login']);
        Route::post('/logout', [KasirController::class, 'loginpage']);
        
        Route::get('/', [KasirController::class, 'loginpage']);
        Route::get('/Home', [KasirController::class, 'home']);
        
        
        Route::group(['prefix' => 'customer'], function(){
            Route::get('/', [customerController::class,'index']);
            Route::get('/tambah', [customerController::class, 'tambah']);
            Route::get('/edit/{id}', [customerController::class, 'edit']);
            Route::post('/save', [customerController::class,'save']);
            Route::post('/update/{id}', [customerController::class,'update']);
            Route::delete('/delete/{id}', [customerController::class,'delete']);

        });
    
        Route::group(['prefix' => 'order'], function(){
            Route::get('/', [orderController::class,'index']);
            Route::get('/cart', [orderController::class, 'cart']);
            Route::delete('/delete/{id}', [orderController::class, 'delete']);
            Route::get('/pembayaran', [orderController::class, 'pembayaran']);
            Route::get('/bayar', [orderController::class, 'bayar']);
            Route::get('/toBayar/{orderId}', [orderController::class, 'toBayar']);
            Route::get('/addOrder', [orderController::class, 'addOrder']);
            Route::get('/create', [orderController::class, 'create']);
            Route::get('/pilih', [orderController::class, 'pilih']);
            Route::get('/detail/{id}', [orderController::class, 'detail']);
            
        });
    
        Route::group(['prefix' => 'produk'], function(){
            Route::get('/', [ProdukController::class,'index']);
        });
    
});
