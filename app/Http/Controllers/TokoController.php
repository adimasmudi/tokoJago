<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Gudang;
use App\Models\Barang;
use App\Models\Kasir;
use App\Models\ProdukToko;
use App\Models\ProdukTokoDetail;
use App\Models\BarangGudangDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class TokoController extends Controller
{
    protected $toko;
    protected $gudang;
    protected $barang;
    protected $kasir;
    protected $produkToko;
    protected $produkTokoDetail;
    protected $barangGudangDetail;

    public function __construct(Toko $toko, Gudang $gudang, Barang $barang, Kasir $kasir, ProdukToko $produkToko, ProdukTokoDetail $produkTokoDetail, BarangGudangDetail $barangGudangDetail)
    {
        $this->toko = $toko;
        $this->gudang = $gudang;
        $this->barang = $barang;
        $this->kasir = $kasir;
        $this->produkToko = $produkToko;
        $this->produkTokoDetail = $produkTokoDetail;
        $this->barangGudangDetail = $barangGudangDetail;
    }

    public function index(){
        $tokos = $this->toko::paginate(10);
        return view('admin.toko.index',[
            'tokos' => $tokos
        ]);
    }

    public function create(){
        return view('admin.toko.create');
    }

    public function save(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'nama' => 'required',
                'alamat' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->toko;

            $dataBaru->nama = $data['nama'];
            $dataBaru->alamat = $data['alamat'];
            $dataBaru->save();

            return redirect('/admin/toko');

        }catch(Exception $e){
            dd($e);
        }
    }

    public function show(Request $request, String $id){
        $toko = $this->toko::where('id',$id)->with(['produkToko', 'produkToko.produkTokoDetail','produkToko.produkTokoDetail.barang'])->first();
        $kasirs = $this->kasir::where('toko_id',$id)->get();
        return view('admin.toko.show',[
            'toko' => $toko,
            'kasirs' => $kasirs
        ]);
    }

    public function edit(Request $request, String $id){
        $toko = $this->toko::where('id',$id)->first();
        return view('admin.toko.edit',[
            'toko' => $toko
        ]);
    }

    public function update(Request $request, String $id){
        $dataUpdate = $this->toko::find($id);

        $data = $request->all();

        $dataUpdate->nama = $data['nama'];
        $dataUpdate->alamat = $data['alamat'];
        $dataUpdate->save();

        return redirect('/admin/toko/detail/'.$id);
    }

    public function delete(Request $request, String $id){
        $dataDelete = $this->toko::findOrfail($id);
        $dataDelete->delete();
        
        return redirect('/admin/toko');
    }


    public function createSuplaiBarangToko(Request $request, String $id){
        $toko = $this->toko::where('id', $id)->first();
        $gudangs = $this->gudang->get();
        return view('admin.toko.suplaiToko.create',[
            'toko' => $toko,
            'gudangs' => $gudangs
        ]);
    }

    public function createSuplaiBarangTokoConfirm(Request $request, String $id, String $gudangId){
        $gudang = $this->gudang::where('id',$gudangId)->first();
        $toko = $this->toko::where('id',$id)->first();
        $barangs = $this->barang->get();
        return view('admin.toko.suplaiToko.createConfirm',[
            'barangs' => $barangs,
            'gudang' => $gudang,
            'toko' => $toko
        ]);
    }

    public function saveSuplaibarangToko(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'gudang_id' => 'required',
                'toko_id' => 'required',
                'barang_id' => 'required',
                'kuantitas' => 'required'
            ]);

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $barang = $this->barang::where('id', $data['barang_id'])->first();

            $gudang = $this->gudang::where('id', $data['gudang_id'])->with(['barangGudang','barangGudang.barangGudangDetail'])->first();

            $barangGudang = $gudang->barangGudang;

            $barangGudangDetailQty = 0;
            $barangGudangDetailId = null;

            foreach($barangGudang as $barangDetail){
                if($barangDetail->barangGudangDetail->first()->barang_id == $data['barang_id']){
                    $barangGudangDetailQty = $barangDetail->barangGudangDetail->first()->qty;
                    $barangGudangDetailId = $barangDetail->barangGudangDetail->first()->id;
                }
            }

            if($barangGudangDetailQty < $data['kuantitas']){
                dd('stok gudang yang dipilih tidak sesuai permintaan');
            }

            $produkTokoBaru = new $this->produkToko;
            $produkTokoBaru->toko_id = $data['toko_id'];
            $produkTokoBaru->save();

            $produkTokoBaruDetail = new $this->produkTokoDetail;
            $produkTokoBaruDetail->produk_toko_id = $produkTokoBaru->id;
            $produkTokoBaruDetail->barang_id = $data['barang_id'];
            $produkTokoBaruDetail->qty = $data['kuantitas'];
            $produkTokoBaruDetail->harga = $barang->harga;
            $produkTokoBaruDetail->save();

            $barangGudangDetailQty -= $data['kuantitas'];

            $barangGudangDetailUpdate = $this->barangGudangDetail::find($barangGudangDetailId);
            $barangGudangDetailUpdate->qty = $barangGudangDetailQty;
            $barangGudangDetailUpdate->save();

            return redirect('/admin/toko/detail/'.$data['toko_id']);
        }catch(Exception $e){
            dd($e);
        }
    }


    public function createAddKasirToko(Request $request, String $id){
        $toko = $this->toko::where('id',$id)->first();
        return view('admin.toko.kasir.create',[
            'toko' => $toko
        ]);
    }

    public function saveKasir(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'nama' => 'required',
                'no_telp' => 'required',
                'email' => 'email|required',
                'password' => 'required',
                'alamat' => 'required',
                'toko_id' => 'required'
            ]);

            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->kasir;

            $dataBaru->nama = $data['nama'];
            $dataBaru->no_telp = $data['no_telp'];
            $dataBaru->email = $data['email'];
            $dataBaru->password = $data['password'];
            $dataBaru->alamat = $data['alamat'];
            $dataBaru->toko_id = $data['toko_id'];
            $dataBaru->save();

            return redirect('/admin/toko/detail/'.$data['toko_id']);
        }catch(Exception $e){
            dd($e);
        }
    }
}