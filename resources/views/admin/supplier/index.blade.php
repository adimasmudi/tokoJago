<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="/admin/supplier/create" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Supplier</h3>
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
                      <th>email</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Supplier 1</td>
                        <td>4723742384</td>
                        <td>supplier1@gmail.com</td>
                        <td>jln. raya surabaya</td>
                        <td>
                        <a href="/admin/supplier/detail" class="btn btn-primary mx-2">
                          detail
                        </a>
                        <a href="/admin/supplier/edit" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="supplier" data-url="supplier/delete" data-id="">
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