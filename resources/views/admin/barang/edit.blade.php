<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/barang/update" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                  </div>
                  <div class="form-group">
                    <label for="harga">harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga ex : 100000">
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