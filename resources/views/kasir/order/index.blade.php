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
                          <form method="GET" action="../kasir/order/cart" enctype="multipart/form-data">
                              @csrf
                              <table class="table table-bordered">
                                  <thead>
                                      <tr>
                                          <th style="width: 10px">ID</th>
                                          <th>Nama</th>
                                          <th>Harga</th>
                                          <th>Order</th>
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
                                                      <input type="checkbox" id="barang_{{ $barang->id }}" name="order[]" value="{{ $barang->id }}">
                                                  </td>
                                              </tr>
                                          @empty
                                              <tr>
                                                  <td colspan="4">Tidak ada barang yang ditemukan.</td>
                                              </tr>
                                          @endforelse
                                      @endif
                                  </tbody>
                              </table>
                              <button type="submit" class="btn btn-primary w-25 mb-3">Add to Cart</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</x-layout>
