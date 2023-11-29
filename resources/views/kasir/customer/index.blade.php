<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="../kasir/customer/tambah" class="btn btn-primary w-25 mb-3">Tambah</a>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel Customer</h3>
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($customers)
                      @forelse($customers as $customer)
                        <tr>
                          <td>{{ $customer->id }}</td>
                          <td>{{ $customer->nama }}</td>
                          <td>{{ $customer->no_telp }}</td>
                          <td>
                            <div class="d-flex flex-row">
                              <a href="/kasir/customer/edit/{{$customer->id}}" class="btn btn-warning mx-2">
                                  <i class="fas fa-edit"></i>
                              </a>
                              <form method="POST"
                                  action="/kasir/customer/delete/{{$customer->id}}">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
                              </form>
                            </div>
                          </td>
                        </tr>
                      @empty
                        <p>Tidak ada customer yang ditemukan.</p>
                      @endforelse
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