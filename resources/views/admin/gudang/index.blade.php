<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="/admin/gudang/create" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Gudang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Lokasi</th>
                      <th>Kapasitas(terisi)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Gudang Utama</td>
                        <td>Tellang</td>
                        <td>300(120)</td>
                        <td>
                        <a href="/admin/gudang/detail" class="btn btn-primary mx-2">
                          detail
                        </a>
                        <a href="/admin/gudang/edit" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="gudang" data-url="gudang/delete" data-id="">
                            <i class="fas fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>