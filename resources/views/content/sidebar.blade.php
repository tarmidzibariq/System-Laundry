<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Laundry</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CLN</a>
        </div>
        <ul class="sidebar-menu">
            
            <li class="menu-header">Dashboard</li>
            <li class="nav-item ">
                <a href="{{ route('dashboard.dash') }}" class="nav-link "><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            @if(Auth::check())
            @if(Auth::user()->role == 'admin' or Auth::user()->role == 'kasir')
            <li class="nav-item ">
                <a href="{{ route('regispel.index') }}" class="nav-link "><i class="fas fa-users-cog"></i><span>Registrasi Pelanggan</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 'member')
            <li class="nav-item ">
                <a href="{{ route('regispel.createmember') }}" class="nav-link "><i class="fas fa-users-cog"></i><span>Registrasi Pelanggan</span></a>
            </li>
            @endif
            {{-- @if(Auth::user()->role == 'member')
            <li class="nav-item ">
                <a href="{{ route('regispel.indexmember') }}" class="nav-link "><i class="fas fa-users-cog"></i><span>Pelanggan</span></a>
            </li>
            @endif --}}
            @if(Auth::user()->role == 'admin')
            <li class="nav-item ">
                <a href="{{ route('outlet.index') }}" class="nav-link "><i class="fas fa-random"></i><span>Outlet</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('paket.index') }}" class="nav-link "><i class="fas fa-list"></i><span>Paket</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('pengguna.index') }}" class="nav-link "><i class="fas fa-users"></i><span>Pengguna</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 'admin' or Auth::user()->role == 'kasir')
            <li class="nav-item ">
                <a href="{{ route('entri.index') }}" class="nav-link "><i class="fas fa-shopping-cart"></i><span> Entri Transaksi</span></a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link "><i class="fas fa-map-marker-alt"></i><span>GPS Location Pelanggan </span></a>
            </li>
            @endif
            @if(Auth::user()->role == 'admin' or Auth::user()->role == 'kasir' or Auth::user()->role == 'owner')
            <li class="nav-item ">
                <a href="{{ route('laporan.index') }}" class="nav-link "><i class="fas fa-file"></i><span>Laporan</span></a>
            </li>
            @endif
            @if(Auth::user()->role == 'member')
            <li class="nav-item ">
                <a href="{{ route('order.createorder') }}" class="nav-link "><i class="fas fa-shopping-cart"></i><span>Order</span></a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('order.riwayatorder') }}" class="nav-link "><i class="fas fa-shopping-bag"></i><span>Riwayat Order</span></a>
            </li>
            
            @endif
            @endif
        </ul>
    </aside>
</div>
