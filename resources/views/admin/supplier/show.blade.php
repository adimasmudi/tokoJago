<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">Nama supplier</h3>

              <p class="text-muted text-center">Email</p>
              <p>No Telepon</p>
              <p>Alamat</p>
              <p>Deskripsi</p>

              <div class="d-flex flex-row">
                <a href="/admin/supplier/edit" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <a href="#" class="btn btn-danger" id="delete" data-redirect="supplier" data-url="supplier/delete" data-id="">
                  <i class="fas fa-trash"></i>
                </a>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#suplaiBarang" data-toggle="tab">barang di suplai</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="suplaiBarang">
                    <h4>Barang telah di suplai</h4>
                    <div>
                        <a href="/admin/supplier/suplaiBarang" class="btn btn-primary w-25 mb-3">Suplai Barang</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Televisi</td>
                                <td>20</td>
                                <td>300000</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</x-layout>