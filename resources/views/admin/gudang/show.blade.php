<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">{{$gudang->nama}}</h3>

              <p class="text-muted text-center">Kapasitas Gudang : {{$gudang->kapasitas}}</p>

              <p>Lokasi : {{$gudang->lokasi}}</p>

              <div class="d-flex flex-row">
                <a href="/admin/gudang/edit/{{$gudang->id}}" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <form method="POST"
                    action="/admin/gudang/delete/{{$gudang->id}}">
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
                <li class="nav-item"><a class="nav-link active" href="#deskripsi" data-toggle="tab">deskripsi</a></li>
                <li class="nav-item"><a class="nav-link" href="#barangGudang" data-toggle="tab">barang gudang</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="deskripsi">
                 {{$gudang->deskripsi}}
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
                            @if(count($gudang->barangGudang) > 0)
                              @foreach($gudang->barangGudang as $detailBarang)
                                <tr>
                                  <td>{{$detailBarang->barangGudangDetail->first()->barang_id}}</td>
                                  <td>{{$detailBarang->barangGudangDetail->first()->barang->nama}}</td>
                                  <td>{{$detailBarang->barangGudangDetail->first()->harga}}</td>
                                  <td>{{$detailBarang->barangGudangDetail->first()->qty}}</td>
                                  <td>
                                      <a href="/admin/gudang/barangGudang/edit" class="btn btn-warning mx-2">
                                          <i class="fas fa-edit"></i>
                                      </a>
                                      <a href="#" class="btn btn-danger" id="delete" data-redirect="barangGudang" data-url="barangGudang/delete" data-id="">
                                          <i class="fas fa-trash"></i>
                                      </a>
                                  </td>
                                </tr>
                              @endforeach
                            @endif
                            
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