<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="../kasir/customer/tambah" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Customer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>no telepon</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Customer 1</td>
                        <td>2654742354</td>
                        <td>
                        <a href="/kasir/customer/edit" class="btn btn-primary mx-2">
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