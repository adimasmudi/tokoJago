<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data Customer</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/kasir/customer/update/{{$customer->id}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                <div>
                  <div class="form-group">
                    <label for="nama">Nama Customer</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama customer" value="{{$customer->nama}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Nama Email" value="{{$customer->email}}">
                  </div>
                  <div class="form-group">
                    <label for="no_telepon">No Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon" value="{{$customer->no_telp}}">
                  </div>
                  <div class="form-group">
                    <label for="alamat">alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" name="alamat">{{$customer->alamat}}</textarea>
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