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
    <li class="nav-item">
      <a href="/admin/gudang" class="{{$currentActive == 'gudang' ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fas fa-filter"></i>
        <p>
          Gudang
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/toko" class="{{$currentActive == 'toko' ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fas fa-tree"></i>
        <p>
          Toko
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/supplier" class="{{$currentActive == 'supplier' ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fas fa-hotel"></i>
        <p>
          Supplier
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/admin/barang" class="{{$currentActive == 'barang' ? 'nav-link active' : 'nav-link'}}">
        <i class="nav-icon fas fa-cloud-meatball"></i>
        <p>
          Barang
        </p>
      </a>
    </li>
    
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