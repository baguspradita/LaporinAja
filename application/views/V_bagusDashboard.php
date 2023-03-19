<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <h1 class="mt-4 fw-bolder">Dashboard</h1>

                <?= $this->session->flashdata('read'); ?>

                <!-- Button trigger modal -->
                <button type="button" class="icon-button btn btn-primary mb-3 ms-auto " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <span class="material-icons"><i class="fa-solid fa-bell "></i></span>
                    <span class="icon-button__badge "><?= $jumlah['notif'] ?></span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan Baru</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php foreach ($notif as $n) : ?>

                                <?php if ($n['read_status'] == 0) { ?>
                                <div class="row">
                                    <div class="col-md-10">
                                        <?= $n['nama'] . ' telah membuat pengaduan baru' ?>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <a href="<?= base_url('C_bagusDashboard/read/' . $n['notif_id']) ?>">
                                            <button type="button" class="btn btn-success btn-sm"><i
                                                    class="fa-solid fa-eye"></i></button>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>





                <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            Hello, world! This is a toast message.
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body fw-bolder">Pengaduan</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?= $jumlah['pengaduan'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body fw-bolder">Proses</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?= $jumlah['proses'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body fw-bolder">Selesai</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <?= $jumlah['selesai'] ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-user me-1"></i>
                                Data Diri
                            </div>

                            <table class="table table-bordered">

                                <tr>
                                    <td>
                                        <h6>Nama</h6>
                                    </td>
                                    <td>
                                        <h6>: <?= $user['nama_petugas'] ?></h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h6>Sebagai</h6>
                                    </td>
                                    <td>
                                        <h6>: <?= $user['level'] ?></h6>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h6>Nomor Telepon</h6>
                                    </td>
                                    <td>
                                        <h6>: <?= $user['telepon'] ?></h6>
                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Masyarakat Yang Telah Register
                            </div>

                            <table class="table table-bordered">

                                <thead class="bg-secondary">
                                    <tr>
                                        <td>Nama</td>
                                        <td>NIK</td>
                                        <td>Nomer Telepon</td>
                                    </tr>

                                </thead>

                                <tbody>
                                    <?php foreach ($masyarakat as $m) : ?>
                                    <tr>
                                        <td><?= $m['nama'] ?></td>
                                        <td><?= $m['nik'] ?></td>
                                        <td><?= $m['telepon'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Histori Laporan Terselesaikan
                    </div>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Pelapor</th>
                                <th>Tanggal</th>
                                <th>Laporan</th>
                                <th>Foto</th>

                            </tr>
                        </thead>


                        <tbody>
                            <?php foreach ($pengaduan as $p) : ?>
                            <?php if ($p['status'] == 'selesai') { ?>
                            <tr>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['tanggal_pengaduan'] ?></td>
                                <td><?= $p['isi_laporan'] ?></td>
                                <td><img src="<?= base_url('assets/uploads/' . $p['foto']) ?>" alt=""></td>

                            </tr>
         
                   <?php } ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>