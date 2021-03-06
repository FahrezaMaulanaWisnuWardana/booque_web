    
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(180deg, rgba(9,9,121,1) 0%, rgba(0,212,255,1) 100%);">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Booque Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('dashboard/user')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-list"></i>
          <span>Blog</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Blog:</h6>
            <a class="collapse-item" href="{{url('dashboard/blog')}}">Blog</a>
            <a class="collapse-item" href="{{url('dashboard/blog-category')}}">Blog Category</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading mb-2">
        Booque App Master
      </div>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Banner
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('banner.index')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Banner</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Category
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('book-category.index')}}">
          <i class="fas fa-fw fa-code-branch"></i>
          <span>Category</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Location
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-map"></i>
          <span>Location</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Location:</h6>
            <a class="collapse-item" href="{{route('city.index')}}">City</a>
            <a class="collapse-item" href="{{route('province.index')}}">Province</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Book
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('book.index')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Books</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        Booqers
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('booqer.index')}}">
          <i class="fas fa-fw fa-users"></i>
          <span>Booqers</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{route('transaksi.index')}}">
          <i class="fas fa-fw fa-list"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>