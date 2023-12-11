<x-layout>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div id="hiddenList">
            <table class="table table-bordered">
              <thead>
                  <tr>
                  <th style="width: 10px">ID</th>
                  <th>order_id</th>
                  <th>id barang</th>
                  <th>qty</th>
                  <th>harga Total</th>
                  </tr>
              </thead>
              <tbody>
                @forelse($orderDetail as $order)
                <tr>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->order_id }}</td>
                  <td>{{ $order->produk_toko_id }}</td>
                  <td>{{ $order->qty }}</td>
                  <td>{{ $order->harga }}</td>
                  <td>
                    <form method="POST" action="/kasir/order/delete/{{$order->id}}">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @empty
                <p>Tidak ada pelanggan yang ditemukan</p>
                @endforelse            
              </tbody>
            </table>
        </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </x-layout>