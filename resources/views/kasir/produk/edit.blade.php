<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Produk Toko</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/kasir/produk/update/{{$barang->id}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="nama">Id Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="{{$barang->id}}" value="{{$barang->nama}}" disabled>
                </div>
                <div class="form-group">
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="Qty">Qty</label>
                  <input type="number" class="form-control" id="qty" name="qty" placeholder="{{ $barang->ProdukTokoDetail->sum('qty') }}" value="{{ $barang->ProdukTokoDetail->sum('qty') }}">
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