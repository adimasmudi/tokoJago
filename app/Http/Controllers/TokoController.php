<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(){
        return view('admin.toko.index');
    }

    public function create(){
        return view('admin.toko.create');
    }

    public function show(){
        return view('admin.toko.show');
    }

    public function edit(){
        return view('admin.toko.edit');
    }


    public function createSuplaiBarangToko(){
        return view('admin.toko.suplaiToko.create');
    }

    public function createSuplaiBarangTokoConfirm(){
        return view('admin.toko.suplaiToko.createConfirm');
    }


    public function createAddKasirToko(){
        return view('admin.toko.kasir.create');
    }
}
