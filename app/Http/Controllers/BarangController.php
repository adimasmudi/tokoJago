<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        return view('admin.barang.index');
    }

    public function create(){
        return view('admin.barang.create');
    }

    public function show(){
        return view('admin.barang.show');
    }

    public function edit(){
        return view('admin.barang.edit');
    }
}
