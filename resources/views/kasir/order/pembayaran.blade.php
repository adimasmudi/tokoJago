<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">Pembayaran</h3>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>harga total</th>
                  </tr>
                </thead>
                <tbody>
                  @if($orderDetail)
                    @forelse($orderDetail as $orderDetail)
                    <tr>
                      <td>{{ $orderDetail->id }}</td>
                      <td>{{ $orderDetail->produk_toko_id }}
                        <input type="text" class="form-control" id="id[]" name="id[]" value="{{ $orderDetail->produk_toko_id }}" hidden> </td>
                      <td>{{ $orderDetail->harga }}</td>
                      <td>{{ $orderDetail->qty }}<input type="number" class="form-control" id="qty[]" name="qty[]"value="{{ $orderDetail->qty }}" hidden ></td>
                      <td>{{ $orderDetail->harga * $orderDetail->qty  }}</td>
                    </tr>
                    @empty
                    <p>Tidak ada barang yang ditemukan.</p>
                    @endforelse
                  @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="card">
            <div class="card-header p-2">
                <p class="text-muted text-center">Harga Total :       </p>
                <p class="text-muted text-center">{{$order->harga_total}} </p>
              
            </div><!-- /.card-header -->
            

            <div class="card-body">
              <div>
                <div id="pembayaran">
                    <h4>Form pembayaran</h4>
                  <form method="GET" action="/kasir/order/bayar" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body d-flex flex-row justify-content-between">
                      <div>
                        <div class="form-group">
                          <p for="MEtode bayar">Metode Bayar</p>
                          <input type="radio" name="metode" id="cash"value="cash" checked>
                          <label for="cash">Cash</label>
                          <input type="radio" name="metode" id="e-pay" value="e-pay">
                          <label for="e-pay">Electronic pay</label>
                        </div>
                      </div>
                      <div>
                        <div class="form-group">
                          <label for="jumlah_bayar">Jumlah Bayar</label>
                          <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" >
                          <input type="text" class="form-control" id="harga" name="harga" value="{{$order->harga_total}}"hidden>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                    </div>
                  </form>
                </div>
                
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</x-layout>