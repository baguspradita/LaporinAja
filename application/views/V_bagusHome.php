<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LaporinAja</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('lp/') ?>css/styles.css" rel="stylesheet" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo titel.png') ?>">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bolder">LaporinAja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">



                </ul>
            </div>
        </div>
    </nav>
    <!-- Header - set the background image for the header in the line below-->
    <header class="py-5 bg-image-full "
        style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900'); height:90vh;">
        <div class="container my-5">

            <div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">

                <h1 class="text-white fw-bolder ">LaporinAja</h1>
                <h3 class="text-white-50 mb-3">Layanan Aspirasi dan Pengaduan Online Rakyat</h3>

                <p class="lead text-white-50">Sebuah fasilitas yang dibuat pemerintah untuk masyarakat yang
                    berbasis web, diharapkan dapat membantu masyarakat, tata usaha, petugas dan kepala suku dinas dalam
                    melakukan pendataan pengaduan masyarakat dan tidak terjadi kesalahan pada saat pembuatan laporan
                </p>




                <a href="<?= base_url('C_bagusAuth/loginUser') ?>"><button type="button"
                        class="btn btn-dark btn-outline-primary" style="border-radius: 10px;">Login</button></a>

                <a href="<?= base_url('C_bagusAuth/registerUser') ?>"> <button type="button"
                        class="btn btn-dark btn-outline-light" style="border-radius: 10px;">Daftar</button></a>
            </div>

        </div>
    </header>
    <!-- Content section-->
    <!-- Footer-->
    <footer class="py-4 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Bagus Pradita</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url('lp/') ?>js/scripts.js"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
    AOS.init();
    </script>
</body>

</html>
