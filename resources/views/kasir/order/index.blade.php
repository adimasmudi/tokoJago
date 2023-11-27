<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>order</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($barangs)
                      @forelse($barangs as $barang)
                        <tr>
                          <td>{{ $barang->id }}</td>
                          <td>{{ $barang->nama }}</td>
                          <td>{{ $barang->harga }}</td>
                          <td>
                            <input type="checkbox" id="barang" name="order" value="#nama">
                          </td>
                        </tr>
                      @empty
                        <p>Tidak ada barang yang ditemukan.</p>
                      @endforelse
                    @endif
                  </tbody>
              </div>
              <a href="../kasir/order/cart" class="btn btn-primary w-25 mb-3">Cart</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>