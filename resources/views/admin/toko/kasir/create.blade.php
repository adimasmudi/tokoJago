<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kasir Toko Baru</h3>
            </div>
           
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/toko/kasirToko/save" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div>
                    <h6>Nama Toko : {{$toko->nama}}</h6>
                    <h6>Alamat : {{$toko->alamat}}</h6>
                </div>
                  <div class="form-group">
                    <label for="nama">Nama Kasir</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kasir">
                  </div>
                  <div class="form-group">
                    <label for="no_telp">no telepon</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no telepon">
                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email">
                  </div>
                  <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan password">
                  </div>
                  <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" name="alamat"></textarea>
                  </div>
              </div>
              <input type="hidden" name="toko_id" value="{{request()->route('id')}}">
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  
</x-layout>