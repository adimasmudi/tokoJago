<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\ProdukToko;
use App\Models\ProdukTokoDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class BarangController extends Controller
{
    protected $barang;
    protected $produkToko;
    protected $produkTokoDetail;

    public function __construct(Barang $barang, ProdukToko $produkToko, ProdukTokoDetail $produkTokoDetail)
    {
        $this->barang = $barang;
        $this->produkToko = $produkToko;
        $this->produkTokoDetail = $produkTokoDetail;
    }

    public function index(){
        $barangs = $this->barang::paginate(10);
        return view('admin.barang.index',[
            'barangs' => $barangs
        ]);
    }

    public function create(){
        return view('admin.barang.create');
    }

    public function save(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'nama' => 'required',
                'harga' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->barang;

            $dataBaru->nama = $data['nama'];
            $dataBaru->harga = $data['harga'];
            $dataBaru->save();

            return redirect('/admin/barang');

        }catch(Exception $e){
            dd($e);
        }
    }

    public function show(Request $request, String $id){
        $barang = $this->barang::where('id',$id)->with(['produkTokoDetails','produkTokoDetails.produkToko','produkTokoDetails.produkToko.toko'])->first();
        return view('admin.barang.show',[
            'barang' => $barang
        ]);
    }

    public function edit(Request $request, String $id){
        $barang = $this->barang::where('id',$id)->first();
        return view('admin.barang.edit',[
            'barang' => $barang
        ]);
    }

    public function update(Request $request, String $id){
        $dataUpdate = $this->barang::find($id);

        $data = $request->all();

        $dataUpdate->nama = $data['nama'];
        $dataUpdate->harga = $data['harga'];
        $dataUpdate->save();

        return redirect('/admin/barang/detail/'.$id);
    }

    public function delete(Request $request, String $id){
        $dataDelete = $this->barang::findOrfail($id);
        $dataDelete->delete();
        
        return redirect('/admin/barang');
    }
}


