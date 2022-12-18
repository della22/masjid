<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beranda | Masjid Nurul Iman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('css/depan/style.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('css/depan/responsive.css'); ?>" />
</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <!-- NAVBAR -->
        <?php $this->load->view("layouts/navbar.php") ?>
        <!-- HERO -->
        <div id="hero_profil" class="container bg-green">
            <div class="d-flex flex-column text-center justify-content-center align-items-center">
                <h1 class="font-russo head_profil">Profil Masjid Nurul Iman</h1>
                <img src="<?= base_url('./images/' . $profil['upload_img']); ?>" alt="" class="image_profil" />
            </div>
        </div>
    </header>
    <!-- CONTENT -->
    <section class="content_main">
        <!-- SEJARAH -->
        <div class="main_content container">
            <h3 class="main_title mb-5 text-center">Sejarah & Profil</h3>
            <p class="black-2 text-justify">
                <?= $profil['desk_profil']; ?>
            </p>
        </div>
        <!-- STRUKTUR ORGANISASI -->
        <div class="main_content container">
            <h3 class="main_title mb-5 text-center">Struktur Organisasi</h3>
            <img src="<?= base_url('./images/' . $sdm['foto_bagan']); ?>" class="image-fluid container mx-auto px-5" alt="" />
        </div>
        <!-- INFORMASI TAMBAHAN -->
        <div class="main_content container">
            <h3 class="main_title mb-5 text-center tambahan">INFORMASI TAMBAHAN</h3>
            <div class="row">
                <div class="col-12 col-lg-6 mt-4">
                    <h3 class="main_title mb-5 text-center">Jumlah SDM Masjid</h3>
                    <table class="table_masjid table table-bordered table-striped table-responsive" style="display: table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis SDM</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" class="text-center">1</td>
                                <td>Jumlah Pengurus</td>
                                <td><?= $sdm['jumlah_pengurus']; ?></td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-center">2</td>
                                <td>Jumlah Remaja Masjid</td>
                                <td><?= $sdm['jumlah_remaja_masjid']; ?></td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-center">3</td>
                                <td>Jumlah Imam Utama</td>
                                <td><?= $sdm['jumlah_imam_utama']; ?></td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-center">4</td>
                                <td>Jumlah Imam Cadangan</td>
                                <td><?= $sdm['jumlah_imam_cadangan']; ?></td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-center">5</td>
                                <td>Jumlah Muadzin</td>
                                <td><?= $sdm['jumlah_muadzin']; ?></td>
                            </tr>
                            <tr>
                                <td scope="row" class="text-center">6</td>
                                <td>Jumlah Khatib</td>
                                <td><?= $sdm['jumlah_khatib']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-lg-6 mt-4">
                    <h3 class="main_title mb-5 text-center">Layanan & Kontak</h3>
                    <table class="table_masjid table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Layanan</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Kontak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($layanan->result_array() as $layanan) :
                            ?>
                                <tr>
                                    <td scope="row" class="text-center"><?= $no++; ?></td>
                                    <td><?= $layanan['nama_layanan']; ?></td>
                                    <td><?= $layanan['pj_layanan']; ?></td>
                                    <td><?= $layanan['kontak_layanan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php $this->load->view("layouts/footer.php") ?>
    <!-- BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $("#year").html(new Date().getFullYear());
    </script>
</body>

</html>