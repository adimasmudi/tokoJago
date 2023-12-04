<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\Customer;


use Illuminate\Http\Request;

class KasirController extends Controller
{
    protected $order;
    protected $customer;
    protected $barang;

    public function __construct(Barang $barang, Order $order, Customer $customer){
        $this->barang = $barang;
        $this->order = $order;
        $this->customer = $customer;
    }

    public function home(){
        $barangs = count($this->barang->get());
        $orders = count($this->order->get());
        $customers = count($this->customer->get());
        return view('Kasir.home',[
            'barangs' => $barangs,
            'orders' => $orders,
            'customers' => $customers
        ]);
    }
}
