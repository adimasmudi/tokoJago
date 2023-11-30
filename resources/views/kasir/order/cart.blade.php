<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Order Cart</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="GET" action="/kasir/order/pembayaran/" enctype="multipart/form-data">
              @csrf
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>jumlah tersedia</th>
                      <th>jumlah dibeli</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($barangs)
                      @forelse($barangs as $barang)
                      <tr>
                        <td>{{ $barang->id }}<input type="text" class="form-control" id="id[]" name="id[]" value="{{$barang->id}}"hidden></td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>{{ $barang->barangGudangDetails->sum('qty') }}</td>
                        <td>
                          <input type="number" class="form-control" id="qty[]" name="qty[]" placeholder="0" >                          
                        </td>
                        <td>            
                      </tr>
                      @empty
                      <p>Tidak ada barang yang ditemukan.</p>
                      @endforelse
                    @endif
                  </tbody>
                </table>
                
                <div class="card-footer">
                  <input type="text" class="form-control" id="order_id" name="order_id" value="{{$orderId}}"hidden> 
                  <button type="submit" class="btn btn-primary">bayar</button>
                </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>