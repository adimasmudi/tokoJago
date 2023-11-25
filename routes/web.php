<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GudangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\BarangController;

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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', function(){
        return view('admin.login');
    });
    Route::get('/', function(){
        return view('admin.home');
    });

    Route::group(['prefix' => 'gudang'], function(){
        Route::get('/', [GudangController::class,'index']);
        Route::get('/create', [GudangController::class, 'create']);
        Route::get('/detail', [GudangController::class, 'show']);
        Route::get('/edit', [GudangController::class, 'edit']);

        Route::group(['prefix' => 'barangGudang'], function(){
            Route::get('/edit', [GudangController::class, 'editBarangGudang']);
        });
    });

    Route::group(['prefix' => 'toko'], function(){
        Route::get('/', [TokoController::class,'index']);
        Route::get('/create', [TokoController::class, 'create']);
        Route::get('/detail', [TokoController::class, 'show']);
        Route::get('/edit', [TokoController::class, 'edit']);

        Route::group(['prefix' => 'suplaiBarangToko'], function(){
            Route::get('/', [TokoController::class, 'createSuplaiBarangToko']);
            Route::get('/confirm', [TokoController::class, 'createSuplaiBarangTokoConfirm']);
        });

        Route::group(['prefix' => 'kasirToko'], function(){
            Route::get('/', [TokoController::class, 'createAddKasirToko']);
        });

        
    });

    Route::group(['prefix' => 'supplier'], function(){
        Route::get('/', [SupplierController::class,'index']);
        Route::get('/create', [SupplierController::class, 'create']);
        Route::get('/detail', [SupplierController::class, 'show']);
        Route::get('/edit', [SupplierController::class, 'edit']);

        Route::group(['prefix' => 'suplaiBarang'], function(){
            Route::get('/', [SupplierController::class, 'createSuplaiBarangSupplier']);
            Route::get('/confirm', [SupplierController::class, 'createSuplaiBarangSupplierConfirm']);
        });
    });

    Route::group(['prefix' => 'barang'], function(){
        Route::get('/', [BarangController::class,'index']);
        Route::get('/create', [BarangController::class, 'create']);
        Route::get('/detail', [BarangController::class, 'show']);
        Route::get('/edit', [BarangController::class, 'edit']);
    });
});
