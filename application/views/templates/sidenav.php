<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?= base_url('C_bagusDashboard') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">MASTERDATA</div>
                <a class="nav-link" href="<?= base_url('C_bagusDashboard/kategori') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Kategori
                </a>
                <a class="nav-link" href="<?= base_url('C_bagusDashboard/masyarakat') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Masyarakat
                </a>
                <a class="nav-link" href="<?= base_url('C_bagusDashboard/petugas') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Admin & Petugas
                </a>

                <div class="sb-sidenav-menu-heading">PENGADUAN</div>
                <a class="nav-link" href="<?= base_url('C_bagusDashboard/pengaduan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></i></div>
                    Pengaduan
                </a>

                <?php if ($user['level'] == 'admin') { ?>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-pdf"></i></div>
                    Generate Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <?php } ?>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?= base_url('C_bagusDashboard/pengaduanpdf') ?>"> <i
                                class="fa-solid fa-download me-1"></i> Pengaduan</a>
                        <a class="nav-link" href="<?= base_url('C_bagusDashboard/masyarakatpdf') ?>"> <i
                                class="fa-solid fa-download me-1"></i> Masyarakat</a>
                    </nav>
                </div>


                <!-- <a class="nav-link" href="<?= base_url('C_bagusDashboard/laporan') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Laporan
                </a> -->

                <div class="sb-sidenav-menu-heading">SETTING</div>
                <a class="nav-link" href="<?= base_url('C_bagusDashboard/setting') ?>">
                    <div class="sb-nav-link-icon"><i class="fa-sharp fa-solid fa-rotate-right"></i>
                    </div>
                    Reset Password
                </a>


      
      </div>
        </div>

    </nav>
</div>