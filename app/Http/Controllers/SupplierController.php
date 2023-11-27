<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Gudang;
use App\Models\Barang;
use App\Models\Suplai;
use App\Models\SuplaiDetail;
use App\Models\BarangGudang;
use App\Models\BarangGudangDetail;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SupplierController extends Controller
{
    protected $supplier;
    protected $gudang;
    protected $barang;
    protected $suplai;
    protected $suplaiDetail;
    protected $barangGudang;
    protected $barangGudangDetail;

    public function __construct(Supplier $supplier, Gudang $gudang, Barang $barang, Suplai $suplai, SuplaiDetail $suplaiDetail, BarangGudang $barangGudang, BarangGudangDetail $barangGudangDetail)
    {
        $this->supplier = $supplier;
        $this->gudang = $gudang;
        $this->barang = $barang;
        $this->suplai = $suplai;
        $this->suplaiDetail = $suplaiDetail;
        $this->barangGudang = $barangGudang;
        $this->barangGudangDetail = $barangGudangDetail;
    }

    public function index(){
        $suppliers = $this->supplier::paginate(10);
        return view('admin.supplier.index',[
            'suppliers' => $suppliers
        ]);
    }

    public function create(){
        return view('admin.supplier.create');
    }

    public function save(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'nama' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'no_telepon' => 'required',
                'deskripsi' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->supplier;

            $dataBaru->nama = $data['nama'];
            $dataBaru->email = $data['email'];
            $dataBaru->alamat = $data['alamat'];
            $dataBaru->no_telp = $data['no_telepon'];
            $dataBaru->deskripsi = $data['deskripsi'];
            $dataBaru->save();

            return redirect('/admin/supplier');

        }catch(Exception $e){
            dd($e);
        }
    }

    public function show(Request $request, String $id){
        $supplier = $this->supplier::where('id',$id)->with(['suplai','suplai.suplaiDetails','suplai.suplaiDetails.barang'])->first();

        return view('admin.supplier.show',[
            'supplier' => $supplier
        ]);
    }

    public function edit(Request $request, String $id){
        $supplier = $this->supplier::where('id',$id)->first();
        return view('admin.supplier.edit',[
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, String $id){
        $dataUpdate = $this->supplier::find($id);

        $data = $request->all();

        $dataUpdate->nama = $data['nama'];
        $dataUpdate->email = $data['email'];
        $dataUpdate->alamat = $data['alamat'];
        $dataUpdate->no_telp = $data['no_telepon'];
        $dataUpdate->deskripsi = $data['deskripsi'];
        $dataUpdate->save();

        return redirect('/admin/supplier/detail/'.$id);
    }

    public function delete(Request $request, String $id){
        $dataDelete = $this->supplier::findOrfail($id);
        $dataDelete->delete();
        
        return redirect('/admin/supplier');
    }


    public function createSuplaiBarangSupplier(Request $request, String $id){
        $gudangs = $this->gudang->get();
        $supplier = $this->supplier::where('id',$id)->first();
        return view('admin.supplier.suplai.create',[
            'gudangs' => $gudangs,
            'supplier' => $supplier
        ]);
    }

    public function createSuplaiBarangSupplierConfirm(Request $request, String $id, String $gudangId){
        $gudang = $this->gudang::where('id',$gudangId)->first();
        $supplier = $this->supplier::where('id',$id)->first();
        $barangs = $this->barang->get();
        return view('admin.supplier.suplai.createConfirm',[
            'gudang' => $gudang,
            'supplier' => $supplier,
            'barangs' => $barangs
        ]);
    }

    public function saveSuplaiBarang(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'gudang_id' => 'required',
                'supplier_id' => 'required',
                'barang_id' => 'required',
                'kuantitas' => 'required'
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $barang = $this->barang::where('id', $data['barang_id'])->first();

            $hargaTotal = $barang->harga * $data['kuantitas'];

            $dataSuplai = new $this->suplai;
            $dataSuplai->supplier_id = $data['supplier_id'];
            $dataSuplai->tanggal = Carbon::now();
            $dataSuplai->harga_total = $hargaTotal;
            $dataSuplai->save();

            $dataSuplaiDetail = new $this->suplaiDetail;
            $dataSuplaiDetail->suplai_id = $dataSuplai->id;
            $dataSuplaiDetail->barang_id = $data['barang_id'];
            $dataSuplaiDetail->qty = $data['kuantitas'];
            $dataSuplaiDetail->harga = $barang->harga;
            $dataSuplaiDetail->save();

            $dataSuplaiGudang = new $this->barangGudang;
            $dataSuplaiGudang->gudang_id = $data['gudang_id'];
            $dataSuplaiGudang->save();

            $dataSuplaiGudangDetail = new $this->barangGudangDetail;
            $dataSuplaiGudangDetail->barang_gudang_id = $dataSuplaiGudang->id;
            $dataSuplaiGudangDetail->barang_id = $data['barang_id'];
            $dataSuplaiGudangDetail->qty = $data['kuantitas'];
            $dataSuplaiGudangDetail->harga = $barang->harga;
            $dataSuplaiGudangDetail->save();

            return redirect('/admin/supplier/detail/'.$data['supplier_id']);

        }catch(Exception $e){
            dd($e);
        }
    }
}
