<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function cart(){
        return view('kasir.Order.cart');
    }

    public function index(){
        return view('kasir.Order.index');
    }

    public function pembayaran(){
        return view('kasir.Order.pembayaran');
    }


}
