<x-layout>
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                <a href="/kasir/order/create" class="btn btn-primary w-25 mb-3">create</a>
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Tabel Order</h3>
                      </div>
                      <!-- /.card-header -->
                      <div id="hiddenList">
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="width: 10px">ID</th>
                                <th>customer_id</th>
                                <th>tanggal</th>
                                <th>harga total</th>
                                <th>customer_type</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @forelse($orders as $order)
                              <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_id }}</td>
                                <td>{{ $order->tanggal }}</td>
                                <td>{{ $order->harga_total }}</td>
                                <td>{{ $order->customer_type }}</td>
                                <td> 
                                  <div class="d-flex flex-row">
                                    @if ($order->harga_total == 0.0)
                                                                          
                                      <form method="GET" action="/kasir/order/pilih">
                                        <input type="text" class="form-control" id="order_id" name="order_id" value="{{$order->id}}" hidden>
                                        <button>order</i></button>
                                      </form>
                                    @else
                                      <form method="GET" action="/kasir/order/detail/{{$order->id}}">
                                        <input type="text" class="btn btn-warning mx-2" id="id" name="id" value="{{$order->id}}" hidden>
                                        <button>detail</i></button>
                                      </form>
                                    @endif     
                                    
                                  </div>
                                </td>
                              </tr>
                              @empty
                              <p>Tidak ada pelanggan yang ditemukan</p>
                              @endforelse            
                            </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</x-layout>
