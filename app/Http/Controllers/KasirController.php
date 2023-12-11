<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\Toko;
use App\Models\ProdukToko;
use App\Models\Kasir;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
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
        $toko_id = $request->session()->get('toko_id');

        if (!$toko_id){
            return redirect('/kasir/loginPage');
        }

        $produk_toko=$this->produktoko::where('toko_id',$toko_id)->get();
        $customer = count($this->customer->get());
        $produk= count($produk_toko);
        $order = count($this->order->get());
        return view('kasir.home',[
            'customer' => $customer,
            'produk' => $produk,
            'toko_id' => $toko_id,
            'order' => $order,
        ]);
    }
    
   public function login(Request $request){
        $email=$request->input('email');
        $kasir = Kasir::where('email',$email)->get();
        $id=$kasir->sum('toko_id');
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'password' => 'required',
                'email' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }
            
            $request->session()->put('toko_id', $id);
            return redirect('/kasir');

        }catch(Exception $e){
            dd($e);
        }
    }
    public function logout(Request $request){
        $request->session()->forget('toko_id');

        return redirect('/kasir');
    }

    public function loginPage(Request $request){
        if($request->session()->get('toko_id')){
            return redirect('/kasir');
        }

        return view('kasir.login');
    }
}
