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
              <form method="POST" action="/kasir/order/tambah" enctype="multipart/form-data">
              @csrf
                <label for="search">Search:</label>
                <input type="text" name="search" id="search">
                <button type="submit">Search</button>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>kipas angin1</td>
                        <td>20.000</td>
                        <td>10</td>
                        <td>200.000</td>
                    </tr>
                    
                  </tbody>
                </table>
                
                <div class="card-footer">
                    <p>Harga Total : </p>
                    <button type="submit" class="btn btn-primary">bayar</button>
                </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>