<!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/admin" class="{{$currentActive == 'admin' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a href="/admin/category" class="{{$currentActive == 'category' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-filter"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/wisata" class="{{$currentActive == 'wisata' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-tree"></i>
          <p>
            Wisata
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/hotel" class="{{$currentActive == 'hotel' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-hotel"></i>
          <p>
            Hotel
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/restaurant" class="{{$currentActive == 'restaurant' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-cloud-meatball"></i>
          <p>
            Restaurant
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/kerajinan" class="{{$currentActive == 'kerajinan' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-crown"></i>
          <p>
            Kerajinan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/transportasi" class="{{$currentActive == 'transportasi' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-car"></i>
          <p>
            Transportasi
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/paket" class="{{$currentActive == 'paket' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-cube"></i>
          <p>
            Paket
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/admin/transaksi" class="{{$currentActive == 'transaksi' ? 'nav-link active' : 'nav-link'}}">
          <i class="nav-icon fas fa-box"></i>
          <p>
            Kelola Transaksi
          </p>
        </a>
      </li> -->
      <li class="nav-item">
          <form class="inline" method="POST" action="/admin/logout">
            @csrf
            <button type="submit" class="nav-link bg-danger shadow-none">
                <i class="fas fa-left"></i>
          
            Logout
          
            </button>
        </form>
        
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>