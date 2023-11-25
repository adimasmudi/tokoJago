<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="/admin/barang/create" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($barangs)
                      @foreach($barangs as $barang)
                        <tr>
                          <td>{{$barang->id}}</td>
                          <td>{{$barang->nama}}</td>
                          <td>{{$barang->harga}}</td>
                          <td>
                            <div class="d-flex flex-row">
                              <a href="/admin/barang/detail/{{$barang->id}}" class="btn btn-primary mx-2">
                                detail
                              </a>
                              <a href="/admin/barang/edit/{{$barang->id}}" class="btn btn-warning mx-2">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <form method="POST"
                                  action="/admin/barang/delete/{{$barang->id}}">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                              </form>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                    
                  </tbody>
                </table>
              </div>
              <div>
                {{$barangs->links()}}
              </div>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>