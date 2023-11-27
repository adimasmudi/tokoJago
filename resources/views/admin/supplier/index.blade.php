<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="/admin/supplier/create" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Supplier</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>no telepon</th>
                      <th>email</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($suppliers)
                      @foreach($suppliers as $supplier)
                        <tr>
                          <td>{{$supplier->id}}</td>
                          <td>{{$supplier->nama}}</td>
                          <td>{{$supplier->no_telp}}</td>
                          <td>{{$supplier->email}}</td>
                          <td>{{$supplier->alamat}}</td>
                          <td>
                            <div class="d-flex flex-row">
                              <a href="/admin/supplier/detail/{{$supplier->id}}" class="btn btn-primary mx-2">
                                detail
                              </a>
                              <a href="/admin/supplier/edit/{{$supplier->id}}" class="btn btn-warning mx-2">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <form method="POST"
                                  action="/admin/supplier/delete/{{$supplier->id}}">
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
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>