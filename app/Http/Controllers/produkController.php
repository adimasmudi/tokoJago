<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        return view('kasir.produk.index');
    }

    public function tambah(){
        return view('kasir.produk.tambah');
    }

    public function edit(){
        return view('kasir.produk.edit');
    }
}
