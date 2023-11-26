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
                <h6>Nama Supplier : {{$supplier->nama}}</h6>
                <h6>Alamat : {{$supplier->alamat}}</h6>
              <div>
                <div class="form-group">
                    <label for="gudang">gudang untuk disuplai</label>
                    <select class="form-control select2" style="width: 100%;" name="gudang_id" id="gudang_id">
                      <option selected="selected">--pilih gudang--</option>
                      @foreach($gudangs as $gudang)
                        <option value="{{$gudang->id}}">{{$gudang->nama}}({{$gudang->kapasitas}})</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <a href="#" id="selanjutnyaLink" class="btn btn-primary w-25 mb-3">Selanjutnya</a>
              
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    // Add an event listener to the select element
    document.getElementById('gudang_id').addEventListener('change', function() {
      // Get the selected value
      var selectedGudangId = this.value;

      // Update the href attribute of the link
      var link = document.getElementById('selanjutnyaLink');
      link.href = "/admin/supplier/suplaiBarang/confirm/"+id+'/' + selectedGudangId;
    });
  </script>
</x-layout>