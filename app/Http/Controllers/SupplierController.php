<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('admin.supplier.index');
    }

    public function create(){
        return view('admin.supplier.create');
    }

    public function show(){
        return view('admin.supplier.show');
    }

    public function edit(){
        return view('admin.supplier.edit');
    }


    public function createSuplaiBarangSupplier(){
        return view('admin.supplier.suplai.create');
    }

    public function createSuplaiBarangSupplierConfirm(){
        return view('admin.supplier.suplai.createConfirm');
    }
}
