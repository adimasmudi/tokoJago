<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Produk Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Barang</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Action</th>
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
                          <td>
                              <a href="../kasir/produk/edit/{{ $barang->id }}" class="btn btn-primary mx-2">
                                edit
                              </a>
                          </td>
                        </tr>
                      @empty
                        <p>Tidak ada barang yang ditemukan.</p>
                      @endforelse
                    @endif
                  </tbody>
                </table>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>