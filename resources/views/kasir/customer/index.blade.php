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
                          <td>10</td>
                          <td>
                              <a href="../kasir/cutomer/edit/{{ $customer->id }}" class="btn btn-primary mx-2">
                                edit
                              </a>
                              <a href="#" class="btn btn-danger" id="delete" data-redirect="customer" data-url="customer/delete" data-id="">
                                  <i class="fas fa-trash"></i>
                              </a>
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