<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\Toko;
use App\Models\ProdukToko;
use App\Models\Kasir;
use App\Models\Customer;


use Illuminate\Http\Request;

class KasirController extends Controller
{
    protected $order;
    protected $customer;
    protected $barang;
    protected $toko;
    protected $produktoko;
    protected $kasir;

    public function __construct(Barang $barang,ProdukToko $produktoko,Order $order, Toko $toko, Kasir $kasir, Customer $customer){
        $this->barang = $barang;
        $this->order = $order;
        $this->toko = $toko;
        $this->produktoko = $produktoko;
        $this->kasir = $kasir;
        $this->customer = $customer;
    }
    public function home(Request $request){
        dd($request);
        $customer = count($this->customer->get());
        $produk = count($this->barang->get());
        $order = count($this->order->get());
        dd($customer);
        return view('kasir.home',[
            'gudang' => $customer,
            'produk' => $produk,
            'order' => $order,
        ]);
    }
    
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $kasir = Kasir::where('email',$email)->get();
        $id= $kasir->toko_id;
        return view('kasir.home');
    }

    
}
