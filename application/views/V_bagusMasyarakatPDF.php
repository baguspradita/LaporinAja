<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: grey;
            color: white;
        }

        #footer {
            text-align: center;
            margin-top: 100px;
        }

    </style>

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/logo titel.png') ?>">

</head>

<body>
    <h1 class="">LaporinAja</h1>
    <h3 class="mb-3">081215953726</h3>


    <div style="text-align:center">
        <h1> Laporan Pengaduan Masyarakat</h1>
        <h2>Pemerintah Kabupaten Sukabumi Kecamatan Palabuhan Ratu</h2>
    </div>

    <table id="table" class="mb-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>NIK</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($masyarakat as $m) : ?>
                <tr>
                    <td scope="row"><?= $no++ ?></td>
                    <td><?= $m['nama'] ?></td>
                    <td><?= $m['username'] ?></td>
                    <td><?= $m['nik'] ?></td>
                    <td><?= $m['telepon'] ?></td>

                </tr>
            <?php endforeach;  ?>

        </tbody>
    </table>

    <div class="footer mt-5" style="text-align: center;">
        Citepus, Kec. Pelabuhanratu, Kabupaten Sukabumi, Jawa Barat
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>