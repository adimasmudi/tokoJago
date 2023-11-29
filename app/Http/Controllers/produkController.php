<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; // Ubah nama model yang diimpor menjadi barang
use App\Models\BarangGudangDetail; // Ubah nama model yang diimpor menjadi barang
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;



class ProdukController extends Controller
{   
    protected $barang; // Ubah nama properti dari $barang menjadi $barang

    public function __construct(Barang $barang)
    {
        $this->barang = $barang; // Ubah nama properti dari $barang menjadi $barang
    }

    public function index(){
        $barangs = Barang::with('barangGudangDetails')->paginate(10);
        return view('kasir.produk.index', [
            'barangs' => $barangs
        ]);
    }

    public function tambah(){
        return view('kasir.produk.tambah');
    }

    public function edit($id)
    {
        $barang = Barang::with('barangGudangDetails')->find($id);
        return view('kasir.produk.edit', compact('barang'));
    }

    public function update(Request $request, String $id){
        $barang = Barang::with('barangGudangDetails')->find($id);
        $data = $request->validate([
            'qty' => 'numeric',
        ]);
        foreach ($barang->barangGudangDetails as $barangGudangDetail) {
            $barangGudangDetail->qty = $data['qty'];
            $barangGudangDetail->save();
        }
        $barangs = Barang::with('barangGudangDetails')->paginate(10);
        return redirect('/kasir/produk/')->with('barangs', $barangs);

    }

}