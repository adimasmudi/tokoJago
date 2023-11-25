<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SupplierController extends Controller
{
    protected $supplier;

    public function __construct(Supplier $supplier)
    {
        $this->supplier = $supplier;
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
        $supplier = $this->supplier::where('id',$id)->first();
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


    public function createSuplaiBarangSupplier(){
        return view('admin.supplier.suplai.create');
    }

    public function createSuplaiBarangSupplierConfirm(){
        return view('admin.supplier.suplai.createConfirm');
    }
}
