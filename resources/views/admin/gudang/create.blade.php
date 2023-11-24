<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Gudang Baru</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/gudang/save" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                <div>
                  <div class="form-group">
                    <label for="nama_gudang">Nama Gudang</label>
                    <input type="text" class="form-control" id="nama_gudang" name="nama_gudang" placeholder="Masukkan Nama Gudang">
                  </div>
                  <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <textarea name="lokasi" id="lokasi" class="form-control" cols="30" rows="10" name="lokasi"></textarea>
                  </div>
                </div>
                <div>
                  <div class="form-group">
                    <label for="kapasitas">kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan kapasitas ex : 2000">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label><br>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10" name="deskripsi"></textarea>
                  </div>

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