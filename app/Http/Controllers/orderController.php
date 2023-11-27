<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\OrderDetail;
use App\Models\Customer; 
use Exception;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use DB;


class OrderController extends Controller
{
    protected $orderDetail;
    protected $barang;

    public function __construct(OrderDetail $orderDetail, Barang $barang)
    {
        $this->orderDetail = $orderDetail;
        $this->barang = $barang;
    }

    public function cart(){
        $orderDetails = $this->orderDetail->with('barang')->paginate(10);

        return view('kasir.order.cart', [
            'orderDetails' => $orderDetails
        ]);
    }

    public function index(){
        $barangs = $this->barang->paginate(10);

        return view('kasir.order.index', [
            'barangs' => $barangs
        ]);
    }

    public function pembayaran(){
        $barangs = Barang::paginate(10);
        $customers = Customer::all();
    
        return view('kasir.order.pembayaran', [
            'barangs' => $barangs,
            'customers' => $customers,
        ]);
    }
    public function addToCart(Request $request){
        try {
            $selectedBarangIds = $request->input('order');
            DB::beginTransaction();

            foreach ($selectedBarangIds as $barangId) {
                $orderDetail = new OrderDetail([
                    'barang_id' => $barangId,
                    'qty' => 1, // Misalnya, setiap barang yang ditambahkan memiliki qty 1
                ]);

                $orderDetail->save();
                }

            DB::commit();
            return redirect('/kasir/order/cart');
        } catch (\Exception $e) {
        // Jika terjadi kesalahan, rollback transaksi dan tangani kesalahan
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menambahkan barang ke keranjang.');
        }
    }


}
