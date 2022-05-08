<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li class="dropdown">
                    <a href="<?= base_url('admin') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-edit2"></span><span class="mtext">Master Produk</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('masterproduk/kategori') ?>">Kategori Produk</a></li>
                        <li><a href="<?= base_url('masterproduk/produk') ?>">Produk</a></li>
                        <li><a href="<?= base_url('masterproduk/promo') ?>">Promo</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-invoice"></span><span class="mtext">Master Transaksi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="<?= base_url('pesanan') ?>">Pesanan</a></li>
                        <li><a href="<?= base_url('pesanan/pelanggan') ?>">Histori Pelanggan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?= base_url('admin/lokasi') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-apartment"></span><span class="mtext"> Lokasi </span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="<?= base_url('laporan') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-analytics-21"></span><span class="mtext">Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user') ?>" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-diagram"></span><span class="mtext">User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>