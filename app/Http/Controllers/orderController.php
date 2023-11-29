<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Customer; 
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use DB;


class OrderController extends Controller
{
    protected $orderDetail;
    protected $order;
    protected $barang;

    public function __construct(Order $order,OrderDetail $orderDetail, Barang $barang)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->barang = $barang;
    }

    public function index(){
        $barangs = $this->barang->paginate(10);

        return view('kasir.order.index', [
            'barangs' => $barangs
        ]);
    }
    public function cart(){
        $barangs = Barang::with('barangGudangDetails')->paginate(10);

        return view('kasir.order.cart', [
            'barangs' => $barangs
        ]);
    }

    public function pembayaran(Request $request){
        $customers = Customer::all();
        $totalHarga = $request->input('totalHarga');
    
        return view('kasir.order.pembayaran', [
            'customers' => $customers,
            'totalHarga' => $request->input('totalHarga'),
        ]);
    }
    public function bayar(Request $request){
        $data = $request->all();

        try{
            $validator = Validator::make($data,[
                'id' => 'required',
            ]);
    
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            $dataBaru = new $this->order;
            $databaru->harga_total = $data['totalHarga'];
            $dataBaru->customer_id = $data['customer'];
            $dataBaru->customer_type = null;
            $dataBaru->deskripsi = null;
            $dataBaru->tanggal = $data['tanggal'];
            $dataBaru->save();

            return redirect('/kasir/order');

        }catch(Exception $e){
            dd($e);
        }
    }
    


}
