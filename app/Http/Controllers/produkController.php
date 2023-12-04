<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukToko; 
use App\Models\ProdukTokoDetail; 
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;



class ProdukController extends Controller
{   
    protected $ProdukToko; 

    public function __construct(ProdukToko $ProdukToko, ProdukTokoDetail $ProdukTokoDetail)
    {
        $this->ProdukTokoDetail = $ProdukTokoDetail;
        $this->ProdukToko = $ProdukToko; 
    }

    public function index(Request $request){
        $toko_id = $request->session()->get('toko_id');
        $produk=ProdukToko::where('toko_id',$toko_id)->get();
        return view('kasir.produk.index', [
            'produk' => $produk,
        ]);
    }

    public function tambah(){
        return view('kasir.produk.tambah');
    }

    public function edit($id)
    {
        $barang = ProdukToko::with('ProdukTokoDetail')->find($id);
        return view('kasir.produk.edit', compact('barang'));
    }

    public function update(Request $request, String $id){
        $ProdukToko = ProdukToko::with('ProdukTokoDetail')->find($id);
        $data = $request->validate([
            'qty' => 'numeric',
        ]);
        foreach ($ProdukToko->ProdukTokoDetails as $ProdukTokoDetail) {
            $ProdukTokoDetail->qty = $data['qty'];
            $ProdukTokoDetail->save();
        }
        $ProdukTokos = ProdukToko::with('ProdukTokoDetail')->paginate(10);
        return redirect('/kasir/produk/')->with('barangs', $ProdukTokos);

    }

}