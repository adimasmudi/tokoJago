<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangGudangDetail;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\Order;
use App\Models\Customer; 
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Carbon\Carbon;


class OrderController extends Controller
{
    protected $orderDetail;
    protected $order;
    protected $barang;
    protected $customer;
    protected $BarangGudangDetail;

    

    public function __construct(BarangGudangDetail $BarangGudangDetail, customer $customer, order $order, Orderpayment $orderpayment,OrderDetail $orderDetail, Barang $barang)
    {
        $this->order = $order;
        $this->BarangGudangDetail= $BarangGudangDetail;
        $this->orderDetail = $orderDetail;
        $this->orderpayment = $orderpayment;
        $this->barang = $barang;
        $this->customer = $customer; 
    }

    public function index(){
        $orders = $this->order->paginate(10);

        return view('kasir.order.index', [
            'orders' => $orders
        ]);
    }
    public function pilih(Request $request){
        $barangs = Barang::with('BarangGudangDetails')->paginate(10);
        $orderId = $request->input('order_id');
        return view('kasir.order.pilih',[
            'barangs' => $barangs,
            'orderId' => $orderId
        ]);
    }
    public function create(){
        $customers = $this->customer->paginate(10);
        return view('kasir.order.pembeli', [
            'customers' => $customers
        ]);
    }
    
    public function cart(Request $request)
    {
        // Validasi request sesuai kebutuhan
        
        $orderId = $request->input('order_id');
        $selectedOptions = $request->input('barang', []);
        $barangs = barang::find($selectedOptions);
        
        return view('kasir.order.cart',[
            'barangs' => $barangs,
            'orderId' => $orderId,
        ]);
    }
    public function addOrder(Request $request){
        $customerId = $request->input('customer');
        $barangs = Barang::with('barangGudangDetails')->paginate(10);
        $orders = this->order>paginate(10);
        $tanggal = Carbon::now();
        try {
            $order = Order::create([
                'customer_id' => $customerId,
                'tanggal' => $tanggal,
                'harga_total' => 00, 
                'catatan' => null,
            ]);

            return redirect('/kasir/order/');
        }catch(Exception $e){
            dd($e);
        }
    }
    
    public function pembayaran(Request $request){
        
        $orderId = $request->input('order_id');
        $selectedids = $request->input('id', []);
        $qty = $request->input('qty', []); 
        $barangs = barang::find($selectedids);
        $Totalharga= 0;
        $dataUpdate = $this->order::find($orderId);
       
        try {
            foreach ($qty as $index => $quantity) {
                $barang = $barangs[$index];
                $hargaTotal = $quantity * $barang->harga;
                OrderDetail::create([
                        'produk_toko_id' => $barangs[$index]->id,
                        'order_id' => $orderId,
                        'harga' => $hargaTotal,
                        'qty' => $quantity,
                    ]);
                
            }
            $orderDetail=$this->orderDetail::where('order_id',$orderId)->get();
            foreach ($orderDetail as $od){
                $Totalharga=$Totalharga +$od->harga;
            }
            $dataUpdate->harga_total = $Totalharga;      
            $dataUpdate->save();
            $orderDetail=$this->orderDetail::where('order_id',$orderId)->get();
            $order = $this->order::find($orderId);
            return view('kasir.order.pembayaran', [
                'orderDetail' => $orderDetail,
                'orderId' => $orderId,
                'order' => $order,
                ]);
    
        }catch(Exception $e){
            dd($e);
        }
    }   
    public function detail(Request $request, String $id){
        $orderDetail=$this->orderDetail::where('order_id',$id)->get();

        return view('kasir.order.show',[
            'orderDetail' => $orderDetail,
        ]);
    }
    
    public function bayar(Request $request){
        $selectedids = $request->input('id', []);
        $qty = $request->input('qty', []); 
        $harga = $request->input('harga');        
        $bayar = $request->input('jumlah_bayar');
        $metode = $request->input('metode');
        $kembalian=intv($bayar)-intv($harga);   

        try {
            Orderpayment::create([
                'metode_pembayaran' => $metode,
                'jumlah_bayar' => $bayar,
                'kembalian' => $kembalian,
               ]);           
            

            return redirect('/kasir/order/');
        }catch(Exception $e){
            dd($e);
        }
    }
    


}
