<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudangController extends Controller
{
    
    public function index(){
        return view('admin.gudang.index');
    }

    public function create(){
        return view('admin.gudang.create');
    }

    public function show(){
        return view('admin.gudang.show');
    }

    public function edit(){
        return view('admin.gudang.edit');
    }



    public function editBarangGudang(){
        return view('admin.gudang.barangGudang.edit');
    }
}
