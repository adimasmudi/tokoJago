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
        $customers = customer::paginate(10); // Ubah nama model dari customer menjadi customer
        return view('kasir.customer.index', [
            'customers' => $customers // Ubah nama variabel dari $customers menjadi $customers
        ]);
    }
    public function edit($id){
        $customer = customer::where('id', $id)->first();
        return view('kasir.customer.edit', [
            'customer' => $customer
        ]);
    }


    public function tambah(){
        return view('kasir.Customer.tambah');
    }


}
