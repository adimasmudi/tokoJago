<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; // Ubah nama model yang diimpor menjadi barang
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


class OrderController extends Controller
{
    protected $barang; // Ubah nama properti dari $barang menjadi $barang

    public function __construct(Barang $barang)
    {
        $this->barang = $barang; // Ubah nama properti dari $barang menjadi $barang
    }
    public function cart(){
        $barangs = Barang::paginate(10); // Ubah nama model dari barang menjadi Barang
        return view('kasir.order.cart', [
            'barangs' => $barangs // Ubah nama variabel dari $barangs menjadi $barangs
        ]);
    }

    public function index(){
        $barangs = Barang::paginate(10); // Ubah nama model dari barang menjadi Barang
        return view('kasir.order.index', [
            'barangs' => $barangs // Ubah nama variabel dari $barangs menjadi $barangs
        ]);
    }

    public function pembayaran(){
        return view('kasir.Order.pembayaran');
    }


}
