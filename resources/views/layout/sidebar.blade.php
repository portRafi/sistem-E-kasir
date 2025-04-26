<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/{{auth()->user()->level}}/dashboard" class="brand-link">
                <i class="fas fa-cash-register mr-2"></i>
                <span class="brand-text font-weight-bold">E-Kasir</span>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard" class="brand-link-sm">
                <i class="fas fa-cash-register"></i>
            </a>
        </div>
        
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&background=random" alt="Profile" class="rounded-circle">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{auth()->user()->name}}</div>
                <div class="user-role text-muted text-uppercase">{{auth()->user()->level}}</div>
            </div>
        </div>

        <div class="mt-4"></div>
        
        <ul class="sidebar-menu">
            <li class="menu-header">
                <span>MAIN NAVIGATION</span>
            </li>
            
            <li class="nav-item {{ Request::is('*/dashboard') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/dashboard" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">
                <span>FEATURES</span>
            </li>
            
            @if(auth()->user()->level=='admin')
            <li class="nav-item {{ Request::is('*/kategori') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/kategori" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="/{{auth()->user()->level}}/satuan" class="nav-link"><i class="fas fa-box"></i><span>Satuan</span></a>
            </li>

                        <li class="nav-item {{ Request::is('*/stok-masuk/create') ? 'active' : '' }}">
                <a href="{{ route('stok-masuk.create') }}" class="nav-link">
                    <i class="fas fa-plus-square"></i>
                    <span>Tambah Stok</span>
                </a>
            </li>

            <li class="nav-item {{ Request::is('*/barang') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/barang" class="nav-link">
                    <i class="fas fa-boxes"></i>
                    <span>Barang</span>
                </a>
            </li>
            
            <li class="nav-item {{ Request::is('*/promo') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/promo" class="nav-link">
                    <i class="fas fa-percentage"></i>
                    <span>Promo</span>
                </a>
            </li>
            @endif
            
            @if(auth()->user()->level == 'kasir')   
            <li class="nav-item {{ Request::is('*/penjualan') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/penjualan" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Transaksi</span>
                    <span class="badge badge-info badge-pill ml-1">New</span>
                </a>
            </li>
            
            <li class="nav-item {{ Request::is('*/report') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/report" class="nav-link">
                    <i class="fas fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
            </li>
            @endif
            
            @if(auth()->user()->level == 'admin')
            <li class="nav-item {{ Request::is('*/laporan') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/laporan" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    <span>Laporan</span>
                </a>
            </li>
            
            <li class="nav-item {{ Request::is('*/user') ? 'active' : '' }}">
                <a href="/{{auth()->user()->level}}/user" class="nav-link">
                    <i class="fas fa-user-cog"></i>
                    <span>User</span>
                </a>
            </li>
            @endif
            
            <li class="menu-header">
                <span>ACCOUNT</span>
            </li>
            
            <li class="nav-item">
                <a href="/profile" class="nav-link">
                    <i class="fas fa-user-circle"></i>
                    <span>My Profile</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        
        <div class="mt-4 p-3 sidebar-footer">
            <small class="text-center d-block text-muted">&copy; 2025 E-Kasir</small>
        </div>
    </aside>
</div>

<!-- Don't forget to add this somewhere in your layout -->
 
// Logout Form

