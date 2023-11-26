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
                    <tr>
                        <td>1</td>
                        <td>Kipas Angin</td>
                        <td>10</td>
                        <td>60000</td>
                        <td>
                        <a href="../kasir/produk/edit" class="btn btn-primary mx-2">
                          edit
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="customer" data-url="customer/delete" data-id="">
                            <i class="fas fa-trash"></i>
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