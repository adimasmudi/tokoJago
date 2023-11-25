<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">{{$toko->nama}}</h3>

              <p class="text-muted text-center">Alamat : {{$toko->alamat}}</p>

              <div class="d-flex flex-row">
                <a href="/admin/toko/edit/{{$toko->id}}" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <form method="POST"
                    action="/admin/toko/delete/{{$toko->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                </form>
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
                <li class="nav-item"><a class="nav-link active" href="#produkToko" data-toggle="tab">barang di toko</a></li>
                <li class="nav-item"><a class="nav-link" href="#kasirToko" data-toggle="tab">kasir di toko</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="produkToko">
                    <h4>Barang di Toko</h4>
                    <div>
                        <a href="/admin/toko/suplaiBarangToko" class="btn btn-primary w-25 mb-3">Suplai</a>
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
                <div class="tab-pane" id="kasirToko">
                    <h4>Kasir di Toko</h4>
                    <a href="/admin/toko/kasirToko" class="btn btn-primary w-25 mb-3">Tambah Kasir Toko</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Kasir</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Marsupilami</td>
                                <td>087345143111</td>
                                <td>mars@gmial.com</td>
                                <td>jln. raya Tellang</td>
                                <td>mars43261</td>
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