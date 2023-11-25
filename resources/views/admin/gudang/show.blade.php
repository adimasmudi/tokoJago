<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">Nama Gudang</h3>

              <p class="text-muted text-center">Kapasitas</p>

              <p>Lokasi</p>

              <div class="d-flex flex-row">
                <a href="/admin/gudang/edit" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <a href="#" class="btn btn-danger" id="delete" data-redirect="gudang" data-url="gudang/delete" data-id="">
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
                <li class="nav-item"><a class="nav-link active" href="#deskripsi" data-toggle="tab">deskripsi</a></li>
                <li class="nav-item"><a class="nav-link" href="#barangGudang" data-toggle="tab">barang gudang</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="deskripsi">
                 deskripsi
                </div>
                <div class="tab-pane" id="barangGudang">
                    <h4>Tabel Barang di Gudang</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Kuantitas</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Barang 1</td>
                                <td>15000</td>
                                <td>100</td>
                                <td>
                                    <a href="/admin/gudang/barangGudang/edit" class="btn btn-warning mx-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" id="delete" data-redirect="barangGudang" data-url="barangGudang/delete" data-id="">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
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