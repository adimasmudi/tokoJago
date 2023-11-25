<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class GudangController extends Controller
{

    protected $gudang;

    public function __construct(Gudang $gudang)
    {
        $this->gudang = $gudang;
    }

    public function index(){
        $gudangs = $this->gudang::paginate(10);
        return view('admin.gudang.index',[
            'gudangs' => $gudangs
        ]);
    }

    public function create(){
        return view('admin.gudang.create');
    }

    public function save(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'nama' => 'required',
                'lokasi' => 'required',
                'deskripsi' => 'required',
                'kapasitas' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->gudang;

            $dataBaru->nama = $data['nama'];
            $dataBaru->lokasi = $data['lokasi'];
            $dataBaru->deskripsi = $data['deskripsi'];
            $dataBaru->kapasitas = $data['kapasitas'];
            $dataBaru->save();

            return redirect('/admin/gudang');

        }catch(Exception $e){
            dd($e);
        }
    }

    public function show(Request $request, String $id){
        $gudang = $this->gudang::where('id',$id)->first();
        return view('admin.gudang.show',[
            'gudang' => $gudang
        ]);
    }

    public function edit(Request $request, String $id){
        $gudang = $this->gudang::where('id',$id)->first();
        return view('admin.gudang.edit',[
            'gudang' => $gudang
        ]);
    }

    public function update(Request $request, String $id){
        $dataUpdate = $this->gudang::find($id);

        $data = $request->all();

        $dataUpdate->nama = $data['nama'];
        $dataUpdate->lokasi = $data['lokasi'];
        $dataUpdate->deskripsi = $data['deskripsi'];
        $dataUpdate->kapasitas = $data['kapasitas'];
        $dataUpdate->save();

        return redirect('/admin/gudang/detail/'.$id);
    }

    public function delete(Request $request, String $id){
        $dataDelete = $this->gudang::findOrfail($id);
        $dataDelete->delete();
        
        return redirect('/admin/gudang');
    }



    public function editBarangGudang(){
        return view('admin.gudang.barangGudang.edit');
    }
}
