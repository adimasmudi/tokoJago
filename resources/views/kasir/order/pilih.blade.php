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
                  <form method="GET" action="/kasir/order/cart" enctype="multipart/form-data">
                    @csrf
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
                                    <td>{{$p->produkTokoDetail->sum('id')}}</td>
                                    <td>
                                        @forelse($p->produkTokoDetail as $detail)
                                            {{$detail->barang->nama}}
                                        @empty
                                            N/A
                                        @endforelse
                                    </td>
                                    <td>{{$p->produkTokoDetail->sum('harga')}}</td>
                                    <td>{{$p->produkTokoDetail->sum('qty')}}</td>
                                    <td>
                                      <input type="checkbox"id="barang[]" name="barang[]" value={{ $p->id }}>
                                                  
                                    </td>
                                </tr>
                            @empty
                                <p>Tidak ada barang yang ditemukan.</p>
                            @endforelse
                          @endif
                        </tbody>
                    </table>
                        <input type="text" class="form-control" id="order_id" name="order_id" value="{{$orderId}}"hidden >
                        
                    <button type="submit" class="btn btn-primary">masukkan ke Cart</button>
                  </form>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </x-layout>