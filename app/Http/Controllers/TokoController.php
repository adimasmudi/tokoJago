<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class TokoController extends Controller
{
    protected $toko;

    public function __construct(Toko $toko)
    {
        $this->toko = $toko;
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
        $toko = $this->toko::where('id',$id)->first();
        return view('admin.toko.show',[
            'toko' => $toko
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


    public function createSuplaiBarangToko(){
        return view('admin.toko.suplaiToko.create');
    }

    public function createSuplaiBarangTokoConfirm(){
        return view('admin.toko.suplaiToko.createConfirm');
    }


    public function createAddKasirToko(){
        return view('admin.toko.kasir.create');
    }
}
