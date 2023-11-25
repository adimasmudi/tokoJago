<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">{{$barang->nama}}</h3>

              <p class="text-muted text-center">Harga : {{$barang->harga}}</p>

              <div class="d-flex flex-row">
                <a href="/admin/barang/edit/{{$barang->id}}" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <form method="POST"
                    action="/admin/barang/delete/{{$barang->id}}">
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
                <li class="nav-item"><a class="nav-link active" href="#tokoPemilikBarang" data-toggle="tab">toko pemilik barang</a></li>
                <li class="nav-item"><a class="nav-link" href="#orderBarang" data-toggle="tab">pemesanan terhadap barang</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="tokoPemilikBarang">
                    <h4>Toko Pemilik Barang</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">No</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="orderBarang">
                    <h4>Pemesanan Terhadap Barang</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">No</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                
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