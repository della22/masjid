<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>

  <link rel="stylesheet" href="<?php echo base_url() . 'css/jquery-ui.css' ?>">


</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php $this->load->view("admin/_partials/sidebar.php") ?>

      <!-- top navigation -->
      <?php $this->load->view("admin/_partials/navbar.php") ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="row">
          <div class="col-md-12 col-sm-12 ">

            <!-- form Tambah -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="x_title" style="margin-bottom: 30px;">
                  <h2>Rekap Bulanan</h2>
                  <div class="clearfix"></div>

                </div>

                <div>
                  <form action="" method="get" enctype="multipart/form-data">

                    <div class="item form-group col-md-12 col-sm-12">
                      <label class="col-form-label col-md-1 col-sm-1 label-align" for="nama_siswa">Bulan : </label>
                      <div class="col-md-2 col-sm-2 ">
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker4'>
                            <input type="text" class="form-control" placeholder="Bulan" name="bulan" required value="<?= $bulan; ?>" />
                            <span class="input-group-addon" style="padding-top: 10px">
                              <span class="fa fa-calendar-o"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <label class="col-form-label col-md-1 col-sm-1 label-align" for="nama_siswa">Tahun : </label>
                      <div class="col-md-2 col-sm-2 ">
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker3'>
                            <input type='text' class="form-control" placeholder="Tahun" name="tahun" required value="<?= $tahun; ?>" />
                            <span class="input-group-addon" style="padding-top: 10px">
                              <span class="fa fa-calendar-o"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 label-align">
                        <button type="submit" class="btn btn-success">Go!</button>

                      </div>


                    </div>
                  </form>
                </div>

              </div><!-- /card Body-->

            </div> <!-- /card mb3-->


            <div class="card mb-3">
              <div class="card-body">
                <div class="x_title">
                  <h2>Rekapitulasi Pemasukan & Pengeluaran <?= $bulan_terbilang; ?> <?= $tahun; ?></h2>
                  <div class="clearfix"></div>

                </div>

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
                <div class="x_content">
                  <div class="row col-sm-12 col-md-12" style="display: inline-block;" align="center">
                    <div class="top_tiles">
                      <div class="col-md-4 col-sm-4  tile">
                        <span>Pemasukan </span>
                        <h2>Rp. <?= rupiah($total_pemasukan_semua); ?></h2>
                      </div>

                    </div>
                    <div class="top_tiles">
                      <div class="col-md-4 col-sm-4  tile">
                        <span>Pengeluaran </span>
                        <h2>Rp. <?= rupiah($total_pengeluaran_semua); ?></h2>
                      </div>

                    </div>
                    <div class="top_tiles">
                      <div class="col-md-4 col-sm-4  tile">
                        <span>Saldo Bulan <?= $bulan_terbilang; ?> <?= $tahun; ?> </span>
                        <h2>Rp. <?= rupiah($total_pemasukan_semua - $total_pengeluaran_semua); ?></h2>
                      </div>

                    </div>
                  </div>

                </div>
              </div>

              <div class="card-body">
                <div class="x_title">
                  <div class="clearfix"></div>
                </div>
                <div align="right">
                  <a href="<?= $link_download; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
              </div>


              <div class="x_content">
                <div class="col-sm-12 col-md-12" align="center">
                  <div class="row">
                    <div class="col p-0">
                      <div class="card-box table-responsive">
                        <table id="tes" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th colspan="2" style="text-align: center !important;" bgcolor="FF9999">PEMASUKAN</th>

                            </tr>

                            <tr bgcolor="C0C0C0" align="center">
                              <th style="width: 130px">KATEGORI</th>
                              <th style="width: 70px">TOTAL(Rp.)</th>
                            </tr>

                            <?php foreach ($kategori_pemasukan as $kat_pemasukan) : ?>
                              <?php
                              // Menghitung total perkategori
                              $total_perkategori_masuk = 0;
                              foreach ($list_bulanan_masuk as $total_pemasukan) {
                                if ($total_pemasukan['id_kategori_masuk'] == $kat_pemasukan['id_kategori_masuk']) {
                                  $total_perkategori_masuk += (int) $total_pemasukan['nominal'];
                                }
                              }
                              ?>
                              <tr>
                                <td>
                                  <?= $kat_pemasukan['nama_kategori_masuk']; ?>
                                </td>
                                <td>
                                  Rp. <?= rupiah($total_perkategori_masuk); ?>
                                </td>

                              </tr>
                            <?php endforeach; ?>

                            <tr>
                              <td colspan="1" style="text-align: center !important; font-weight: bold;" bgcolor="FF9999">Jumlah Total Debet <?= $bulan_terbilang; ?> <?= $tahun; ?> </td>
                              <td style="text-align: center !important; font-weight: bold;" bgcolor="FF9999"> Rp. <?= rupiah($total_pemasukan_semua); ?></td>

                            </tr>


                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col p-0">
                      <div class="card-box table-responsive">
                        <table id="tes" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th colspan="2" style="text-align: center !important;" bgcolor="9999FF">PENGELUARAN</th>

                            </tr>

                            <tr bgcolor="C0C0C0" align="center">
                              <th style="width: 130px">KATEGORI</th>
                              <th style="width: 70px">TOTAL(Rp.)</th>
                            </tr>

                            <?php foreach ($kategori_pengeluaran as $kat_pengeluaran) : ?>
                              <?php
                              $total_perkategori_keluar = 0;
                              foreach ($list_bulanan_keluar as $total_pengeluaran) {
                                if ($total_pengeluaran['id_kategori_keluar'] == $kat_pengeluaran['id_kategori_keluar']) {
                                  $total_perkategori_keluar += (int) $total_pengeluaran['nominal'];
                                }
                              }
                              ?>
                              <tr>
                                <td>
                                  <?= $kat_pengeluaran['nama_kategori_keluar']; ?>
                                </td>
                                <td>
                                  Rp. <?= rupiah($total_perkategori_keluar); ?>
                                </td>

                              </tr>
                            <?php endforeach; ?>

                            <tr>
                              <td colspan="1" style="text-align: center !important; font-weight: bold;" bgcolor="9999FF">Jumlah Total Kredit <?= $bulan_terbilang; ?> <?= $tahun; ?> </td>
                              <td style="text-align: center !important; font-weight: bold;" bgcolor="9999FF"> Rp. <?= rupiah($total_pengeluaran_semua); ?></td>
                            </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-12 p-0 m-0">
                      <table class="table table-striped table-bordered" style="width:100%">
                        <tr bgcolor="C0C0C0" style="text-align: center; font-weight: bold;">
                          <td colspan="3" width="50%">
                            Saldo Bulan <?= $bulan_terbilang; ?> <?= $tahun; ?>
                          </td>
                          <td width="50%">Rp. <?= rupiah($total_pemasukan_semua - $total_pengeluaran_semua); ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="card mb-3">

              <div class="card-body">
                <div class="x_title">
                  <h2>Rekapitulasi Pertanggal <?= $bulan_terbilang; ?> <?= $tahun; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div align="right">
                  <a href="<?= $link_download; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
              </div>


              <div class="x_content">
                <div class="col-sm-12 col-md-12" align="center">
                  <div class="card-box table-responsive">


                    <table id="tes" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr bgcolor="C0C0C0" align="center">
                          <th width="70px">NO</th>
                          <th width="100px">TANGGAL</th>
                          <th>KATEGORI</th>
                          <th>KETERANGAN</th>
                          <th width="170px">DEBET(Rp.)</th>
                          <th width="170px">KREDIT(Rp.)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $total_pemasukan = 0;
                        $total_pengeluaran = 0;
                        $saldo = 0;
                        $no = 1;
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
                            <td align="center"><?= $no++; ?></td>
                            <td align="center"><?= $rekap['tanggal']; ?></td>
                            <td><?= $kategori; ?></td>
                            <td><?= $rekap['keterangan']; ?></td>
                            <td align="right" style="padding-right: 40px"><?= ($rekap['jenis'] == 'pemasukan') ? 'Rp. ' . rupiah($rekap['nominal']) : null; ?></td>
                            <td align="right" style="padding-right: 40px"><?= ($rekap['jenis'] == 'pengeluaran') ? 'Rp. ' . rupiah($rekap['nominal']) : null; ?></td>
                          </tr>
                        <?php endforeach; ?>
                        <tr bgcolor="C0C0C0">
                          <th colspan="4" style="text-align: center;">TOTAL</th>
                          <th style="text-align: right; padding-right: 40px">Rp. <?= rupiah($total_pemasukan); ?></th>
                          <th style="text-align: right; padding-right: 40px">Rp. <?= rupiah($total_pengeluaran); ?></th>
                        </tr>

                      </tbody>
                    </table>
                  </div>

                </div>
              </div>

            </div>

          </div>

        </div>


        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view("admin/_partials/footer.php") ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Modal -->
    <?php $this->load->view("admin/_partials/modal.php") ?>



    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url('assets/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/pdfmake/build/vfs_fonts.js') ?>"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('table.display').DataTable();
      });
    </script>

    <script>
      function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }
    </script>


    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

    <script src="<?php echo base_url() . 'js/jquery-ui.js' ?>" type="text/javascript"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

    <script src="<?php echo base_url() . 'js/jquery-ui.js' ?>" type="text/javascript"></script>

    <!-- bootstrap-datetimepicker -->
    <script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/echarts/dist/echarts.min.js') ?>"></script>

    <!-- Initialize datetimepicker -->
    <script type="text/javascript">
      $('.myDatepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      $('#myDatepicker3').datetimepicker({
        format: 'YYYY'
      });

      $('#myDatepicker4').datetimepicker({
        format: 'MM'
      });
    </script>

    <!-- PNotify -->
    <script src="<?php echo base_url('assets/pnotify/dist/pnotify.js') ?>"></script>
    <script src="<?php echo base_url('assets/pnotify/dist/pnotify.buttons.js') ?>"></script>
    <script src="<?php echo base_url('assets/pnotify/dist/pnotify.nonblock.js') ?>"></script>



    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>





</body>

</html>