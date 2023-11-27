<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Order;
use App\Models\Toko;
use App\Models\Supplier;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $gudang;
    protected $toko;
    protected $order;
    protected $supplier;

    public function __construct(Gudang $gudang, Toko $toko, Order $order, Supplier $supplier){
        $this->gudang = $gudang;
        $this->toko = $toko;
        $this->order = $order;
        $this->supplier = $supplier;
    }

    public function home(){
        $gudangs = count($this->gudang->get());
        $tokos = count($this->toko->get());
        $orders = count($this->order->get());
        $suppliers = count($this->supplier->get());
        return view('admin.home',[
            'gudang' => $gudangs,
            'toko' => $tokos,
            'order' => $orders,
            'supplier' => $suppliers
        ]);
    }
}
