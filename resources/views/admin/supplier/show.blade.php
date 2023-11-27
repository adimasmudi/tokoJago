<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">{{$supplier->nama}}</h3>

              <p class="text-muted text-center">Email : {{$supplier->email}}</p>
              <p>No Telepon : {{$supplier->no_telp}}</p>
              <p>Alamat : {{$supplier->alamat}}</p>
              <p>Deskripsi : {{$supplier->deskripsi}}</p>

              <div class="d-flex flex-row">
                <a href="/admin/supplier/edit/{{$supplier->id}}" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <form method="POST"
                    action="/admin/supplier/delete/{{$supplier->id}}">
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
                <li class="nav-item"><a class="nav-link active" href="#suplaiBarang" data-toggle="tab">barang di suplai</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="suplaiBarang">
                    <h4>Barang telah di suplai</h4>
                    <div>
                        <a href="/admin/supplier/suplaiBarang/{{$supplier->id}}" class="btn btn-primary w-25 mb-3">Suplai Barang</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Nama Barang</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(count($supplier->suplai) > 0)
                              @foreach($supplier->suplai as $suplaiDetail)
                                <tr>
                                  <td>{{$suplaiDetail->suplaiDetails->first()->suplai_id}}</td>
                                  <td>{{$suplaiDetail->suplaiDetails->first()->barang->nama}}</td>
                                  <td>{{$suplaiDetail->suplaiDetails->first()->qty}}</td>
                                  <td>{{$suplaiDetail->suplaiDetails->first()->harga}}</td>
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