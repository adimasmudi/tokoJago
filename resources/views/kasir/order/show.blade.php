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
                  <th>harga</th>
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