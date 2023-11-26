<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function edit(){
        return view('kasir.Customer.edit');
    }

    public function index(){
        return view('kasir.Customer.index');
    }

    public function tambah(){
        return view('kasir.Customer.tambah');
    }


}
