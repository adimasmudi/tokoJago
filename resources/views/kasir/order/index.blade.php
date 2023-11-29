<x-layout>
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <a href="../kasir/order/cart" class="btn btn-primary w-25 mb-3">Cart</a>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Tabel Order</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                             @csrf
                         <table class="table table-bordered">
                             <thead>
                                <tr>
                                   <th style="width: 10px">ID</th>
                                   <th>Nama</th>
                                   <th>Harga</th>
                                   <th>qty</th>
                                </tr>
                             </thead>
                             <tbody>
                                @if($barangs)
                                   @forelse($barangs as $barang)
                                       <tr>
                                          <td>{{ $barang->id }}</td>
                                          <td>{{ $barang->nama }}</td>
                                          <td>{{ $barang->harga }}</td>
                                          <td>{{ $barang->barangGudangDetails->sum('qty') }}</td>
                                       </tr>
                                   @empty
                                       <tr>
                                          <td colspan="4">Tidak ada barang yang ditemukan.</td>
                                       </tr>
                                   @endforelse
                                @endif
                             </tbody>
                         </table>                        
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</x-layout>
