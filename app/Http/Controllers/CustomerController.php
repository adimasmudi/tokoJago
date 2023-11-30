<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Ubah nama model yang diimpor menjadi barang
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CustomerController extends Controller
{
    protected $customer; // Ubah nama properti dari $customer menjadi $customer

    public function __construct(customer $customer)
    {
        $this->customer = $customer; // Ubah nama properti dari $customer menjadi $customer
    }

    public function index(){
        $customers = customer::paginate(10); 
        return view('kasir.customer.index', [
            'customers' => $customers // Ubah nama variabel dari $customers menjadi $customers
        ]);
    }
    public function edit(Request $request, String $id){
        $customer = $this->customer::where('id',$id)->first();
        return view('kasir.customer.edit',[
            'customer' => $customer
        ]);
    }

    public function tambah(){
        return view('kasir.Customer.tambah');
    }
    public function save(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'nama' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'no_telepon' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->customer;

            $dataBaru->nama = $data['nama'];
            $dataBaru->email = $data['email'];
            $dataBaru->alamat = $data['alamat'];
            $dataBaru->no_telp = $data['no_telepon'];
            $dataBaru->save();

            return redirect('/kasir/customer');

        }catch(Exception $e){
            dd($e);
        }
    }
    public function update(Request $request, String $id){
        $dataUpdate = $this->customer::find($id);

        $data = $request->all();

        $dataUpdate->nama = $data['nama'];
        $dataUpdate->email = $data['email'];
        $dataUpdate->alamat = $data['alamat'];
        $dataUpdate->no_telp = $data['no_telepon'];
        $dataUpdate->save();

        return redirect('/kasir/customer/');
    }
    public function delete(Request $request, String $id){
        $dataDelete = $this->customer::findOrfail($id);
        $dataDelete->delete();
        
        return redirect('/kasir/customer');
    }


}
