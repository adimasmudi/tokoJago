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
                    @if($produk)
                      @forelse($produk as $p)
                        <tr>
                          <td>{{ $p->id }}</td>
                          <td>{{ $p->produkTokoDetail->sum('nama') }}</td>
                          <td>{{ $p->ProdukTokoDetail->sum('harga') }}</td>
                          <td>{{ $p->ProdukTokoDetail->sum('qty') }}</td>
                          <td>
                              <a href="../kasir/produk/edit/{{ $p->id }}" class="btn btn-primary mx-2">
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