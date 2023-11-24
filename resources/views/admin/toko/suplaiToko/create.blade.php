<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h6>Nama Toko</h6>
                <h6>Alamat</h6>
              <div>
                <div class="form-group">
                    <label for="gudang">gudang penyuplai</label>
                    <select class="form-control select2" style="width: 100%;" name="gudang_id">
                      <option selected="selected">--pilih gudang--</option>
                      <option value="1">gudang1</option>
                    </select>
                  </div>
              </div>
              <a href="/admin/toko/suplaiBarangToko/confirm" class="btn btn-primary w-25 mb-3">Selanjutnya</a>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>