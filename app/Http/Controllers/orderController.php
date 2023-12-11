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
use App\Models\ProdukToko; 
use App\Models\ProdukTokoDetail; 
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Carbon\Carbon;


class OrderController extends Controller
{
    protected $orderPayment;
    protected $orderDetail;
    protected $order;
    protected $barang;
    protected $customer;
    protected $ProdukToko;
    protected $ProdukTokoDetail; 

    

    public function __construct(ProdukToko $ProdukToko, ProdukTokoDetail $ProdukTokoDetail, Customer $customer, Order $order, OrderPayment $orderPayment,OrderDetail $orderDetail, Barang $barang)
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->orderPayment = $orderPayment;
        $this->barang = $barang;
        $this->customer = $customer; 
        $this->ProdukTokoDetail = $ProdukTokoDetail;
        $this->ProdukToko = $ProdukToko;
    }

    public function index(){
        $orders = $this->order->paginate(10);

        return view('kasir.order.index', [
            'orders' => $orders
        ]);
    }
    public function pilih(Request $request){
        $id = $request->session()->get('toko_id');
        $produk= $this->ProdukToko::where('toko_id',$id)->with(['produkTokoDetail', 'produkTokoDetail.barang'])->get();
        $orderId = $request->input('order_id');
        return view('kasir.order.pilih',[
            'produk' => $produk,
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
        $barangs = ProdukToko::find($selectedOptions);
        
        return view('kasir.order.cart',[
            'barangs' => $barangs,
            'orderId' => $orderId,
        ]);
    }
    public function addOrder(Request $request){
        $customerId = $request->input('customer');
        $barangs = ProdukToko::with('ProdukTokoDetail')->paginate(10);
        $orders = $this->order->paginate(10);
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
        $id = $request->session()->get('toko_id');
        $orderId = $request->input('order_id');
        $selectedIds = $request->input('id', []);
        $qty = $request->input('qty', []); 
        $barangs = ProdukTokoDetail::find($selectedIds);
        
    
        try {
            foreach ($qty as $index => $quantity) {
                $harga = $barangs[$index]->harga;
                $x=$barangs[$index]->qty;
                $barangs[$index]->qty= $x-$quantity;
                $hargaTotal = $quantity * $harga;
                $barangs[$index]->save();
                OrderDetail::create([
                    'produk_toko_id' => $barangs[$index]->produk_toko_id,
                    'order_id' => $orderId,
                    'harga' => $hargaTotal,                  
                    'qty' => $quantity,
                ]);
            }
            return redirect('/kasir/order/toBayar/'.$orderId);
        } catch(Exception $e){
            dd($e);
        }
    }

    public function toBayar(Request $request, string $orderId){
        $orderDetail = $this->orderDetail::where('order_id', $orderId)->get();
        $order = $this->order::find($orderId);
        
        try {
            $harga = $orderDetail->sum('harga');
            $order->harga_total = $harga;
            $order->save();
            
            return view('kasir.order.pembayaran', [
                'orderDetail' => $orderDetail,
                'orderId' => $orderId,
                'order' => $order,
                ]);
        } catch(Exception $e){
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
        $data = $request->all();
        $harga = (float)$request->input('harga');        
        $bayar = (float)$request->input('jumlah_bayar');
        $kembalian=$bayar-$harga;  

        try {
            $validator = Validator::make($data,[
                'harga' => 'required',
                'jumlah_bayar' => 'required',
                'metode' => 'required',
            ]);
            $dataBaru = new $this->orderPayment;

            $dataBaru->metode_pembayaran = $data['metode'];
            $dataBaru->jumlah_bayar = $data['jumlah_bayar'];
            $dataBaru->kembalian = $kembalian;
            $dataBaru->save();
            
            return redirect('/kasir/order/');
        } catch(Exception $e){
            dd($e);
        }
        
    }
    


}
