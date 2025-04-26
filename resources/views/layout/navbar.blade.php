<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="bx bx-menu"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="bx bx-search-alt-2"></i></a></li>
    </ul>
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
      <button class="btn" type="submit"><i class="bx bx-search-alt-2"></i></button>
      <div class="search-backdrop"></div>
    </div>
  </form>
  
  <ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle">
      <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg">
        <i class="bx bx-bell"></i>
        <span class="badge badge-danger badge-counter">3</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-lg">
        <div class="dropdown-header">Notifikasi
          <div class="float-right">
            <a href="#">Mark All As Read</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
          <a href="#" class="dropdown-item dropdown-item-unread">
            <div class="dropdown-item-icon bg-primary text-white">
              <i class="bx bx-cart"></i>
            </div>
            <div class="dropdown-item-desc">
              Transaksi baru telah dibuat
              <div class="time text-primary">5 min ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-warning text-white">
              <i class="bx bx-package"></i>
            </div>
            <div class="dropdown-item-desc">
              Stok barang 'Mie Instan' hampir habis
              <div class="time">12 hours ago</div>
            </div>
          </a>
          <a href="#" class="dropdown-item">
            <div class="dropdown-item-icon bg-success text-white">
              <i class="bx bx-badge-check"></i>
            </div>
            <div class="dropdown-item-desc">
              Laporan bulanan tersedia
              <div class="time">2 days ago</div>
            </div>
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">Lihat Semua <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
    
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="https://ui-avatars.com/api/?name={{auth()->user()->nama}}&background=4e73df&color=ffffff" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->nama}}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
        <div class="dropdown-header">{{auth()->user()->level}}</div>
        <a href="/{{auth()->user()->level}}/profile/{{auth()->user()->id}}" class="dropdown-item has-icon">
          <i class="fas fa-user"></i> Profile
        </a>
        <a href="#" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="/logout" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>