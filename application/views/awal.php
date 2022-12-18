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
        <div id="hero" class="container bg-green">
            <div class="row hero_welcome">
                <div class="col-md-6 text-white hero_welcome_title">
                    <h1 class="font-russo">Selamat Datang di Masjid Nurul Iman</h1>
                    <p class="mt-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit ut
                        aliquam, purus sit amet luctus venenatis, lectus magna fringilla
                        urna, porttitor
                    </p>
                    <a href="#keuangan" class="btn btn-white py-3 px-4 mt-3">Rincian Keuangan</a>
                </div>
                <div class="col-md-6 d-flex justify-content-end mt-gambar_hero">
                    <div class="image_sidebar">
                        <img src="<?= base_url('assets/depan/masjid.jpg'); ?>" alt="" class="image_hero" />
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- INFO CASH -->
    <section class="info_cash container text-center">
        <?php
        $total_pemasukan_semua = 0;
        $total_pengeluaran_semua = 0;
        // Untuk menghitung semua total pemasukan
        foreach ($kategori_pemasukan as $kat_pemasukan) {
            foreach ($list_bulanan_masuk as $total_pemasukan) {
                if ($total_pemasukan['id_kategori_masuk'] == $kat_pemasukan['id_kategori_masuk']) {
                    $total_pemasukan_semua += (int) $total_pemasukan['nominal'];
                }
            }
        }
        // Untuk menghitung semua total pengeluaran
        foreach ($kategori_pengeluaran as $kat_pengeluaran) {
            foreach ($list_bulanan_keluar as $total_pengeluaran) {
                if ($total_pengeluaran['id_kategori_keluar'] == $kat_pengeluaran['id_kategori_keluar']) {
                    $total_pengeluaran_semua += (int) $total_pengeluaran['nominal'];
                }
            }
        }

        ?>
        <div class="row mt-5 gap-cash">
            <div class="col-md-4">
                <div class="card_duit">
                    <h2>Pemasukan <?= $bulan_terbilang; ?> <?= $tahun; ?></h2>
                    <h4>Rp. <?= rupiah($total_pemasukan_semua); ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card_duit middle_card">
                    <h2>Pengeluaran <?= $bulan_terbilang; ?> <?= $tahun; ?></h2>
                    <h4>Rp. <?= rupiah($total_pengeluaran_semua); ?></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card_duit">
                    <h2>Saldo Hingga Saat Ini</h2>
                    <h4>Rp. <?= rupiah($total_keuangan); ?></h4>
                </div>
            </div>
        </div>
    </section>
    <!-- INFO JADWAL SHOLAT -->
    <section class="jadwal_sholat container">
        <div class="row d-flex align-items-center">
            <div class="col-md-4 jadwal_image">
                <img src="<?= base_url('assets/depan/sholat.png'); ?>" alt="" />
            </div>
            <div class="col-md-8">
                <h3 class="text-white">Jadwal Sholat Hari ini</h3>
                <div class="row gap-cash">
                    <div class="col-12 col-md-3">
                        <div class="card_jadwal">
                            <div class="head_jadwal">Subuh</div>
                            <p id="subuh">-</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg">
                        <div class="card_jadwal">
                            <div class="head_jadwal">Dzhuhur</div>
                            <p id="dzuhur">-</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg">
                        <div class="card_jadwal">
                            <div class="head_jadwal">Ashar</div>
                            <p id="ashr">-</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg">
                        <div class="card_jadwal">
                            <div class="head_jadwal">Magrib</div>
                            <p id="magrib">-</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg">
                        <div class="card_jadwal">
                            <div class="head_jadwal">Isya</div>
                            <p id="isya">-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="keuangan" class="container content_main">
        <!-- INFO CASH BULANAN -->
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9">
                <div class="main_content">
                    <h3 class="main_title mb-4">Rincian Keuangan <?= $bulan_terbilang; ?> <?= $tahun; ?></h3>
                    <div class="table_main mr-4">
                        <table class="table_masjid table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Debit (Rp)</th>
                                    <th scope="col">Kredit (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_pemasukan = 0;
                                $total_pengeluaran = 0;
                                $saldo = 0;
                                $no = 1;
                                if (count($list_rekapitulasi) > 0) :
                                    foreach ($list_rekapitulasi as $rekap) :
                                        $total_pemasukan += ($rekap['jenis'] == 'pemasukan') ? $rekap['nominal'] : 0;
                                        $total_pengeluaran +=  ($rekap['jenis'] == 'pengeluaran') ? $rekap['nominal'] : 0;
                                        // $saldo = ($total_pemasukan - $total_pengeluaran);
                                        if ($rekap['jenis'] == 'pemasukan') {
                                            $kategori = $rekap['nama_kategori_masuk'];
                                        } elseif ($rekap['jenis'] == 'pengeluaran') {
                                            $kategori = $rekap['nama_kategori_masuk'];
                                        }
                                ?>
                                        <tr>
                                            <td scope="row" class="text-center"><?= $no++; ?></td>
                                            <td><?= $rekap['tanggal']; ?></td>
                                            <td><?= $kategori; ?></td>
                                            <td><?= $rekap['keterangan']; ?></td>
                                            <td><?= ($rekap['jenis'] == 'pemasukan') ? 'Rp. ' . rupiah($rekap['nominal']) : '-'; ?></td>
                                            <td><?= ($rekap['jenis'] == 'pengeluaran') ? 'Rp. ' . rupiah($rekap['nominal']) : '-'; ?></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                else : ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">Data Bulan <?= $bulan_terbilang; ?> <?= $tahun; ?> Kosong</td>

                                    </tr>
                                <?php
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- BERITA DONASI -->
                    <div class="main_content">
                        <h3 class="main_title mb-4">Berita Donasi Berlangsung</h3>
                        <div class="row mr-3 berita_donasi gap-cash">
                            <?php
                            $no = 1;
                            if (count($berita->result_array()) > 0) :
                                foreach ($berita->result_array() as $berita) :
                            ?>
                                    <div class="col-12 col-lg-4">
                                        <div class="card_donasi">
                                            <figure><img src="<?= base_url('images/berita_donasi/') . $berita['gambar_berita']; ?>" alt="" /></figure>
                                            <h3 class="mb-0"><?= $berita['judul_berita']; ?></h3>
                                            <div class="tanggal_donasi p-13 text-green mt-0 mb-2">
                                                <?= dates($berita['tanggal_mulai']); ?> - <?= dates($berita['tanggal_selesai']); ?>
                                            </div>
                                            <p class="p-13 text-secondary">
                                                <?= $berita['deskripsi_berita']; ?>
                                            </p>
                                        </div>
                                    </div>
                            <?php
                                endforeach;
                            endif;
                            ?>
                            <!-- <div class="col-12 mt-5 text-center h3 bg-warning" style="color: #333; padding:32px 16px;opacity:0.7;border-radius:16px;background:#aaa">Tidak Ada Berita Donasi Berlangsung</div> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <!-- DONASI -->
                <div class="main_content">
                    <h3 class="main_title mb-4">Ingin Donasi?</h3>
                    <div class="card_green">
                        <p class="mb-2 p-14">
                            Dapat melaui transfer ke rekening berikut:
                        </p>
                        <table class="mb-2">
                            <tr>
                                <td>a.n&nbsp;</td>
                                <td>:&nbsp;</td>
                                <td class="bold"><?= $profil['bank_an']; ?></td>
                            </tr>
                            <tr>
                                <td>norek&nbsp;</td>
                                <td>:&nbsp;</td>
                                <td class="bold"><?= $profil['norek_profil']; ?></td>
                            </tr>
                        </table>
                        <p class="p-14">
                            Jangan lupa konfirmasi melalui whatapps dengan mengirim bukti
                            transfer dan untuk disalurkan kemana kirim ke nomor
                            <?= $profil['telp_profil']; ?>
                        </p>
                        <a target="_blank" href="http://wa.me/62<?= substr($profil['telp_profil'], 1, 20); ?>" class="btn btn-white btn-block py-3">Link Bukti Transfer</a>
                    </div>
                </div>
                <!-- ARISAN -->
                <div class="main_content">
                    <div class="card_green">
                        <h3 class="title_arisan mb-4">Data Arisan Kurban Periode <?= $periode_terbaru; ?></h3>
                        <div class="bg-white panel_arisan">

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-lunas" role="tabpanel" aria-labelledby="pills-lunas-tab">
                                    <ul class="arisan_list" id="list_arisan_lunas" style="overflow: scroll;max-height:320px;overflow-x: hidden;">
                                        <?php $j = 1;
                                        // var_dump($cicilan_bulan_arisan->result_array());

                                        foreach ($arisan_kurban->result_array() as $data_arisan) {
                                            echo '<li>' . $data_arisan['nama_jamaah'] . '</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <?php $this->load->view("layouts/footer.php") ?>
    <!-- BOOTSTRAP -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $("#year").html(new Date().getFullYear());
        if ($("#list_arisan_belum_lunas li").length == 0) {
            $("#list_arisan_belum_lunas").append("<li style='list-style:none;text-align:center'>Belum Ada Data</li>");
        }
        if ($("#list_arisan_lunas li").length == 0) {
            $("#list_arisan_lunas").append("<li style='list-style:none;text-align:center'>Belum Ada Data</li>");
        }

        // MENGAMBIL API SHOLAT PANGKALPINANG
        const tanggal = new Date();
        const hari = tanggal.getDate().toFixed() - 1;
        const bulan = (tanggal.getMonth() + 1).toString();
        const tahun = (tanggal.getFullYear()).toString();
        const url_api = `https://raw.githubusercontent.com/lakuapik/jadwalsholatorg/master/adzan/pangkalpinang/${tahun}/${bulan}.json`
        console.log(hari)
        $.ajax(url_api, {
            type: 'get',
            dataType: 'json', // type of response data

            success: function(data, status, xhr) {
                const data_azan = data[hari];

                $('#subuh').html(data_azan.shubuh)
                $('#dzuhur').html(data_azan.dzuhur)
                $('#ashr').html(data_azan.ashr)
                $('#magrib').html(data_azan.magrib)
                $('#isya').html(data_azan.isya)
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error: ' + errorMessage);
            }
        });
    </script>
</body>

</html>