<div class="" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500">
    <h1 class="text-white fw-bolder" style="text-shadow: 2px 2px grey;">LaporinAja</h1>
    <h3 class="text-white fw-bolder" style="text-shadow: 2px 2px grey;">Selamat Datang <?= $user['nama'] ?></h3>
    <h3 class="text-white mb-5 fw-bolder" style="text-shadow: 2px 2px grey;">Layanan Aspirasi dan Pengaduan Online
        Rakyat
    </h3>
</div>
<?= $this->session->flashdata('message'); ?>
<div class="row text-center mb-5" data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="1500">

    <div class="col-md-4">
        <a href="<?= base_url('C_bagusUser/pengaduan') ?>">
            <button type="button" class="btn btn-dark btn-outline-primary mb-3">
                <i class="fas fa-plus me-1"></i>
                Tambah Laporan
            </button>
        </a>
    </div>
    <div class="col-md-4">
        <a href="<?= base_url('C_bagusUser/riwayat') ?>">
            <button type="button" class="btn btn-dark btn-outline-primary mb-3">
                <i class="fas fa-history me-1"></i>
                Riwayat Laporan
            </button>
        </a>
    </div>
    <div class="col-md-4">
        <a href="<?= base_url('C_bagusUser/profil') ?>">
            <button type="button" class="btn btn-dark btn-outline-primary mb-3">
                <i class="fa-solid fa-user"></i>
                Profil
            </button>
        </a>
    </div>
</div>

<div class="row mt-5">
    <div class="footer">
        <div class="d-md-flex justify-content-md-end" data-aos="zoom-in" data-aos-easing="linear"
            data-aos-duration="1500">
            <a href="<?= base_url('C_bagusAuth/logoutUser') ?>">
                <button type="button" class="btn btn-dark btn-outline-danger"
                    onclick="return confirm('Apakah anda yakin ingin logout ?')">
                    <i class="fa-solid fa-right-from-bracket me-1"></i>
                    Logout
                </button>
            </a>
        </div>
    </div>
</div>


















































</html>