<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="<?= base_url('css/awal.css') ?>">
    <link rel="stylesheet" href="<?= base_url() . 'js/mini-event-calendar.min.css' ?>">

    <title>Masjid</title>
</head>

<body>
    <?php $this->load->view("layouts/navbar.php") ?>

    <!-- jumbotron -->
    <div class="m-4">
        <div class="jumbotron background-jumbotron">

        </div>
    </div>
    <!-- end jumbotron -->

    <!-- section left content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 border-right">
                <!-- section saldo -->
                <div class="row">
                    <div class="col-12 col-md-4 text-center">
                        <h6>Pemasukan Januari 2022</h6>
                        <h2>Rp. 9.000.000</h2>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <h6>Pengeluaran Januari 2022</h6>
                        <h2>Rp. 1.000.000</h2>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <h6>Saldo hingga saat ini</h6>
                        <h2>Rp. 8.000.000</h2>
                    </div>

                </div>
                <hr class=" mt-5">
                <div class="container">
                    <div class="row  justify-content-center align-items-center">
                        <div class="col-sm-12">
                            <h3 class="text-center">Rincian Keuangan Bulan Januari 2022</h3>
                        </div>
                        <div class="col-sm-12 ">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Debit (Rp.)</th>
                                            <th>Kredit (Rp.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100">200.000</td>
                                            <td width="100"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100">200.000</td>
                                            <td width="100"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100">200.000</td>
                                            <td width="100"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100">400.000</td>
                                            <td width="100"></td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100"></td>
                                            <td width="100">100.000</td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100"></td>
                                            <td width="100">100.000</td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100"></td>
                                            <td width="100">100.000</td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100"></td>
                                            <td width="100">100.000</td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100"></td>
                                            <td width="100">100.000</td>
                                        </tr>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">22/01/2022</td>
                                            <td width="200">Keterangan</td>
                                            <td width="100"></td>
                                            <td width="100">100.000
                                            </td>
                                        </tr>
                                    <tfoot class="text-center">
                                        <tr ">
                                            <th colspan="3" >Total</th>
                                            <th colspan="1" > <b>Rp. 1.000.000</b> </th>
                                            <th colspan="1" ><b>Rp. 700.000</b></th>
                                        </tr>
                                        <tr style="background: coral;">
                                        <th colspan="4">Saldo Bulan Januari 2022</th>
                                        <th colspan="1"> <b>Rp. 700.000</b> </th>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 my-3 border-top pt-3">
                            <h3 class="text-center">Kondisi Inventaris Masjid Bulan Januari 2022</h3>
                        </div>
                        <div class="col-sm-12 ">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No.</th>
                                            <th>Nama Item</th>
                                            <th>Jumlah</th>
                                            <th>Kondisi</th>
                                            <th>Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td align="center">1.</td>
                                            <td width="150">Mic</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        <tr>
                                            <td align="center">2.</td>
                                            <td width="150">AC</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        </tr>
                                        <tr>
                                            <td align="center">2.</td>
                                            <td width="150">AC</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        </tr>
                                        <tr>
                                            <td align="center">2.</td>
                                            <td width="150">AC</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        </tr>
                                        <tr>
                                            <td align="center">2.</td>
                                            <td width="150">AC</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        </tr>
                                        <tr>
                                            <td align="center">2.</td>
                                            <td width="150">AC</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        </tr>
                                        <tr>
                                            <td align="center">2.</td>
                                            <td width="150">AC</td>
                                            <td width="50">4</td>
                                            <td width="100">Baik</td>
                                            <td width="200">Keterangan</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4 text-center">
                <div class="row justify-content-center align-items-center">
                    <!-- data pengurus -->
                    <div class="col-12">
                        <h4>Data Pengurus</h4>
                        <h6 class="mt-4 mb-3">Ketua : Muhammad Fajri</h6>
                        <h6 class="mb-3">Ketua : Muhammad Fajri</h6>
                        <h6 class="mb-3">Ketua : Muhammad Fajri</h6>
                        <h6 class="mb-3">Ketua : Muhammad Fajri</h6>
                        <h6 class="mb-3">Ketua : Muhammad Fajri</h6>
                    </div>

                    <!-- date kegiatan -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-left">Jadwal Kegiatan</h5>
                                <div class="calendar-container"></div>
                            </div>
                        </div>
                    </div>
                    <!-- date khatib -->
                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-left">Jadwal Imam/Khatib</h5>
                                <div id="calendar-khatib" class="calendar-khatib"></div>
                            </div>
                        </div>
                    </div>
                    <!-- section for donasi -->
                    <div class="col-12 my-5">
                        <div class="card">
                            <div class="card-body text-left">
                                <h5 class="card-title" style="color: red;">Ingin Donasi?</h5>
                                <p class="text-muted">Dapat melalui transfer ke rekening berikut:</p>
                                <h6>
                                    <table>
                                        <tr>
                                            <td>a/n</td>
                                            <td>&nbsp; :</td>
                                            <td>&nbsp; Masjid Nurul Iman</td>
                                        </tr>
                                        <tr>
                                            <td>Norek</td>
                                            <td>&nbsp; :</td>
                                            <td>&nbsp; 2020202020(BSI)</td>
                                        </tr>
                                    </table>
                                </h6>
                                <p class="card-text">Jangan lupa <b>konfirmasi</b> melalui <b>whatsapp</b>
                                    dengan mengirim <b>bukti transfer</b> dan
                                    <b>untuk disalurkan kemana </b> ke nomor <b>08xx-xxxx-xxxx</b>
                                    atau klik link berikut <a href="">konfirmasi</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('layouts/footer') ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url() . 'js/mini-event-calendar.min.js' ?>"></script>

    <script>
        $(function() {
            $('.calendar-container').MEC({
                calendar_link: "jqueryscript.net", // calendar link
                // events: myEvents
            });
        });
    </script>
    <script>
        var myEvents = [

            {
                title: "Jadwal imam/khatib",
                date: new Date().getTime(),
                link: "<?= base_url() ?>"
            },
            // more events here
        ];

        $('.calendar-khatib').MEC({
            calendar_link: "<?= base_url() ?>", // calendar link
            events: myEvents
        });
    </script>

</body>

</html>