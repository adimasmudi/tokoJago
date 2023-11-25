<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="cart.blade.php" class="btn btn-primary w-25 mb-3">Cart</a>
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
                      <th>Order</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Toko 1</td>
                        <td>jln. Raya Kamal</td>
                        <td>
                        <a href="/kasir/order/order" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        </td>
                    </tr>
                    
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