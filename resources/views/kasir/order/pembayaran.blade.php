<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">Pembayaran</h3>

              <p class="text-muted text-center">Jenis Customer</p>

              <input type="radio" name="options" id="option1" checked>
              <label for="option1">Walk in</label>
              <input type="radio" name="options" id="option2">
              <label for="option2">Member</label>
              <div id="hiddenList">
              <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 10px">ID</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Customer 1</td>
                        <td>2654742354</td>
                        <td>
                            <a href="/kasir/order/bayar" class="btn btn-warning mx-2">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                            
                </tbody>
              </table>
              </div>
              <script src="scripts.js"></script>
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
              <p class="text-muted text-center">Harga Total :</p>

            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="deskripsi">
                 deskripsi
                </div>
                <div class="tab-pane" id="barangGudang">
                    <h4>Form pembayaran</h4>
                  <form method="POST" action="/kasir/customer/update" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body d-flex flex-row justify-content-between">
                      <div>
                        <div class="form-group">
                          <p for="MEtode bayar">Metode Bayar</p>
                          <input type="radio" name="metode" id="metode1" checked>
                          <label for="metode1">Cash</label>
                          <input type="radio" name="metode" id="metode2">
                          <label for="metode2">Electronic pay</label>
                        </div>
                      </div>
                      <div>
                        <div class="form-group">
                          <label for="jumlah_bayar">Jumlah Bayar</label>
                          <input type="disabled" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="######" value="######">
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                    </div>
                  </form>
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