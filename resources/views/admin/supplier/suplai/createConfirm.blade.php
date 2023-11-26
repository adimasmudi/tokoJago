<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Supplier</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="/admin/supplier/suplaiBarang/save" enctype="multipart/form-data">
                @csrf
                    <h6>Barang yang disuplai</h6>
                <div>
                    <div class="form-group">
                        <label for="barang">barang</label>
                        <select class="form-control select2" style="width: 100%;" name="barang_id">
                          <option selected="selected">--pilih barang--</option>
                          @foreach($barangs as $barang)
                            <option value="{{$barang->id}}">{{$barang->nama}} ({{$barang->harga}})</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kuantitas">kuantitas</label>
                        <input type="number" class="form-control" id="kuantitas" name="kuantitas" placeholder="Masukkan kuantitas ex : 20">
                    </div>
                </div>
                <input type="hidden" name ="supplier_id" value="{{$supplier->id}}">
                <input type="hidden" name ="gudang_id" value="{{$gudang->id}}">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>