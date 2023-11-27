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
                      <th style="width: 10px">Id</th>
                      <th>Nama</th>
                      <th>Lokasi</th>
                      <th>Kapasitas(terisi)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($gudangs)
                      @foreach($gudangs as $gudang)
                        <tr>
                          <td>{{$gudang->id}}</td>
                          <td>{{$gudang->nama}}</td>
                          <td>{{$gudang->lokasi}}</td>
                          <td>{{$gudang->kapasitas}}</td>
                          <td>
                            <div class="d-flex flex-row">
                              <a href="/admin/gudang/detail/{{$gudang->id}}" class="btn btn-primary mx-2">
                                detail
                              </a>
                              <a href="/admin/gudang/edit/{{$gudang->id}}" class="btn btn-warning mx-2">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <form method="POST"
                                  action="/admin/gudang/delete/{{$gudang->id}}">
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
                {{$gudangs->links()}}
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>