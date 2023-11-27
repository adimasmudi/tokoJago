<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="/admin/toko/create" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Toko</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($tokos)
                      @foreach($tokos as $toko)
                        <tr>
                          <td>{{$toko->id}}</td>
                          <td>{{$toko->nama}}</td>
                          <td>{{$toko->alamat}}</td>
                          <td>
                            <div class="d-flex flex-row">
                              <a href="/admin/toko/detail/{{$toko->id}}" class="btn btn-primary mx-2">
                              detail
                              </a>
                              <a href="/admin/toko/edit/{{$toko->id}}" class="btn btn-warning mx-2">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <form method="POST"
                                    action="/admin/toko/delete/{{$toko->id}}">
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
                {{$tokos->links()}}
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>