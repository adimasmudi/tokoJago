<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">

              <h3 class="profile-username text-center">pilih customer</h3>

              <p class="text-muted text-center">Jenis Customer</p>


              <div id="hiddenList">
                <form method="GET" action="/kasir/order/addOrder" enctype="multipart/form-data">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th style="width: 10px">ID</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($customers as $customer)
                      <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->nama }}</td>
                        <td>{{ $customer->no_telp }}</td>
                        <td><input type="radio" id="customer_{{ $customer->id }}"name="customer" value="{{ $customer->id }}"></td>
                      </tr>
                      @empty
                      <p>Tidak ada pelanggan yang ditemukan</p>
                      @endforelse            
                    </tbody>
                  </table>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</x-layout>