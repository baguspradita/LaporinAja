<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo titel.png') ?>">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">LaporinAja</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>


        <!-- Navbar-->


        <!-- notif -->
        <ul class="navbar-nav me-5">








        </ul>

        <ul class="navbar-nav ms-auto ">
            <li class="nav-item dropdown ms-md-0 me-3 me-lg-4">

                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw me-1"></i><?= $user['nama_petugas'] ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                    <li><a class="dropdown-item" href="<?= base_url('C_bagusAuth/logout') ?>"
                            onclick="return confirm('Apakah anda yakin ingin logout ?')">Logout</a></li>

                </ul>
            </li>
        </ul>
    </nav>