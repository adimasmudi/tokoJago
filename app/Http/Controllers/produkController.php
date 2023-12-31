<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdukToko; 
use App\Models\ProdukTokoDetail; 
use App\Models\Barang;
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;



class ProdukController extends Controller
{   
    protected $barang;
    protected $ProdukToko;
    protected $ProdukTokoDeatil; 

    public function __construct(Barang $barang,ProdukToko $ProdukToko, ProdukTokoDetail $ProdukTokoDetail)
    {
        $this->barang = $barang;
        $this->ProdukTokoDetail = $ProdukTokoDetail;
        $this->ProdukToko = $ProdukToko; 
    }

    public function index(Request $request){
        $id = $request->session()->get('toko_id');
        $produk= $this->ProdukToko::where('toko_id',$id)->with(['produkTokoDetail', 'produkTokoDetail.barang'])->get();

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
        $ProdukToko = ProdukTokoDetail::find($id);
        $data = $request->validate([
            'qty' => 'numeric',
        ]);
        $ProdukToko->qty = $data['qty'];
        $ProdukToko->save();
        $ProdukTokos = ProdukToko::with('ProdukTokoDetail')->paginate(10);
        return redirect('/kasir/produk/')->with('barangs', $ProdukTokos);

    }

}