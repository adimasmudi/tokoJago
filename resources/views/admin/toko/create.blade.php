<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Toko Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/toko/save" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Toko</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Toko">
                  </div>
                  <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" name="alamat"></textarea>
                  </div>
              </div>
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