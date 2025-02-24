<!-- ! Hide app brand if navbar-full -->
<div class="app-brand demo d-flex align-items-center justify-content-center" style="padding-left: 1rem !important;">
    <a href="{{ URL::to('/dashboard') }}" class="app-brand-link d-flex align-items-center justify-content-center">
        <img src="tamaparfume.png" alt="Tama Logo" class="logo-image" style="height: 3rem; width: auto;">
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
</div>

<div class="menu-inner-shadow"></div>

@php $link = request()->segment(1); @endphp
<ul class="menu-inner py-1">
    <li class="menu-item <?php if(empty($link) or $link == 'dashboard'){echo 'active';} ?>">
        <a href="{{ URL::to('/dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div class="text-truncate">Dashboard</div>
        </a>
    </li>
    @if(session('auth_user')['role'] == 'admin')
    <li class="menu-item <?php if($link == 'user' or $link == 'add-user' or $link == 'edit-user'){echo 'active';} ?>">
        <a href="{{ URL::to('/user') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div class="text-truncate">Users</div>
        </a>
    </li>

    <li
        class="menu-item <?php if($link == 'pelanggan' or $link == 'add-pelanggan' or $link == 'edit-pelanggan'){echo 'active';} ?>">
        <a href="{{ URL::to('/pelanggan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-male-female"></i>
            <div class="text-truncate">Pelanggan</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'kategori' or $link == 'add-kategori' or $link == 'edit-kategori'){echo 'active';} ?>">
        <a href="{{ URL::to('/kategori') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book-open"></i>
            <div class="text-truncate">Kategori</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'produk' or $link == 'add-produk' or $link == 'edit-produk'){echo 'active';} ?>">
        <a href="{{ URL::to('/produk') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book"></i>
            <div class="text-truncate">Produk</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'botol' or $link == 'add-botol' or $link == 'edit-botol'){echo 'active';} ?>">
        <a href="{{ URL::to('/botol') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-cuboid"></i>
            <div class="text-truncate">Botol</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'banner' or $link == 'add-banner' or $link == 'edit-banner'){echo 'active';} ?>">
        <a href="{{ URL::to('/banner') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-image"></i>
            <div class="text-truncate">Banner</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'toko' or $link == 'add-toko' or $link == 'edit-toko'){echo 'active';} ?>">
        <a href="{{ URL::to('/toko') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-building"></i>
            <div class="text-truncate">Toko</div>
        </a>
    </li>
    <li class="menu-item <?php if($link == 'chat' or $link == 'add-chat' or $link == 'edit-chat'){echo 'active';} ?>">
        <a href="{{ URL::to('/chat') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-message"></i>
            <div class="text-truncate">Chat</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'transaksi' or $link == 'add-transaksi' or $link == 'edit-transaksi'){echo 'active';} ?>">
        <a href="{{ URL::to('/transaksi') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar"></i>
            <div class="text-truncate">Pesanan</div>
        </a>
    </li>

    <li class="menu-item <?php if($link == 'laporan-keuangan'){echo 'active';} ?>">
        <a href="{{ URL::to('/laporan-keuangan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-chart"></i>
            <div class="text-truncate">Laporan Keuangan</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'laporan' or $link == 'add-laporan' or $link == 'edit-laporan'){echo 'active';} ?>">
        <a href="{{ URL::to('/laporan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-box"></i>
            <div class="text-truncate">Laporan Pemesanan</div>
        </a>
    </li>

    @else
    <li
        class="menu-item <?php if($link == 'laporan-produk' or $link == 'add-laporan-produk' or $link == 'edit-laporan-produk'){echo 'active';} ?>">
        <a href="{{ URL::to('/laporan-produk') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-archive"></i>
            <div class="text-truncate">Laporan Produk</div>
        </a>
    </li>
    <li
        class="menu-item <?php if($link == 'laporan' or $link == 'add-laporan' or $link == 'edit-laporan'){echo 'active';} ?>">
        <a href="{{ URL::to('/laporan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-box"></i>
            <div class="text-truncate">Laporan Pemesanan</div>
        </a>
    </li>

    <li
        class="menu-item <?php if($link == 'laporan-penjualan' or $link == 'add-laporan-penjualan' or $link == 'edit-laporan-penjualan'){echo 'active';} ?>">
        <a href="{{ URL::to('/laporan-penjualan') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-book"></i>
            <div class="text-truncate">Laporan Penjualan</div>
        </a>
    </li>
    @endif
</ul>