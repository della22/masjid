<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
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
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Berita Donasi</h2>
                <ul class="nav navbar-right panel_toolbox"><a href="#" data-toggle="modal" data-target="#filterModal" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a></ul>

                <ul class="nav navbar-right panel_toolbox"><a href="#" data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Berita Donasi</a></ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">

                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <?php if ($this->session->flashdata('success') == TRUE) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('success'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php endif; ?>
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Jangka Waktu</th>
                            <th>Judul Berita</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($berita->result_array() as $berita) :
                            $sekarang = date('Y-m-d');
                            $tglSekarang = date('Y-m-d', strtotime($sekarang));
                            $mulai = date('Y-m-d', strtotime($berita['tanggal_mulai']));
                            $selesai = date('Y-m-d', strtotime($berita['tanggal_selesai']));
                            $status = 'Tidak Berstatus';
                            if (($mulai <= $tglSekarang) && ($selesai >= $sekarang)) {
                              $status = '<span class="badge badge-success">Berlangsung</span>';
                            } else if (($mulai >= $tglSekarang) && ($selesai >= $tglSekarang)) {
                              $status = '<span class="badge badge-info">Belum Mulai</span>';
                            } else if (($mulai <= $tglSekarang) && ($selesai <= $tglSekarang)) {
                              $status = '<span class="badge badge-warning">Sudah Selesai</span>';
                            } else {
                              $status = 'Tidak Berstatus';
                            }
                          ?>
                            <tr>

                              <td width="10" align="center"><?= $no++; ?></td>
                              <td width="145"><?= $berita['tanggal_mulai']; ?> - <?= $berita['tanggal_selesai']; ?></td>
                              <td><?= $berita['judul_berita']; ?></td>
                              <td align="center"><?= $status; ?></td>
                              <td width="150" align="center">
                                <a href="<?php echo site_url('admin/berita_donasi/detail/' . $berita['id_berita']) ?>" style="margin-right: 9px"><i class="fa fa-money"></i> Detail </a>
                                <a href="" onclick="deleteConfirm(event,'<?= base_url(); ?>/admin/berita_donasi/hapus/<?= $berita['id_berita']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
                              </td>
                              </td>
                            </tr>
                          <?php endforeach; ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /DataTables -->

        </div>
        <br />

      </div>
      <!-- /page content -->

      <!-- modal -->
      <!-- Filter Modal -->
      <div class="modal fade" id="filterModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Filter </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

              <form role="form" action="" method="get">

                <div class="form-group col-md-12 col-sm-12">
                  <label class="col-form-label col-md-4 col-sm-4 label-align">Status Donasi : </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="status" tabindex="-1">
                      <option value="">Semua Status</option>
                      <option value='1' <?= ($status_sekarang  === 1) ? ' selected' : ''; ?>>Belum Mulai</option>
                      <option value='2' <?= ($status_sekarang  === 2) ? ' selected' : ''; ?>>Berlangsung</option>
                      <option value='3' <?= ($status_sekarang  === 3) ? ' selected' : ''; ?>>Selesai</option>
                    </select>
                  </div>
                </div>

                <br>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Filter</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Tambah Modal -->
      <div class="modal fade" id="tambahModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Tambah Berita Donasi </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="col-md-12 col-sm-12">
                <form action="<?= base_url(); ?>/admin/berita_donasi/proses" method="post" enctype="multipart/form-data">

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Berita : </label>
                    <div class="col-md-9 col-sm-9 ">
                      <input class="form-control" type="text" name="judul_berita" placeholder="Judul Berita" required />
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jangka Waktu : </label>
                    <div class='col-md-5 col-sm-5'>
                      <div class="form-group">
                        <label for="input_to">Dari</label>
                        <div class='input-group date myDatepicker2'>
                          <input type="text" class="form-control" placeholder="Dari " name="tanggal_mulai" required />
                          <span class="input-group-addon" style="padding-top: 10px">
                            <span class="fa fa-calendar-o"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class='col-md-5 col-sm-5'>
                      <div class="form-group">
                        <label for="input_to">Sampai</label>
                        <div class='input-group date myDatepicker2'>
                          <input type="text" class="form-control" placeholder="Sampai " name="tanggal_selesai" required />
                          <span class="input-group-addon" style="padding-top: 10px">
                            <span class="fa fa-calendar-o"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi : </label>
                    <div class="col-md-9 col-sm-9 ">
                      <textarea class="form-control" id="deskripsi_berita" name="deskripsi_berita" placeholder="Deskripsi" required></textarea>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar : </label>
                    <div class="col-md-9 col-sm-9">
                      <input type="file" name="gambar_berita" class="form-control">
                      <input type="hidden" name="upload_image" value="aaa">
                    </div>
                  </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Tambah</button>
            </div>

            </form>
          </div>
        </div>
      </div>


      <!-- Delete Confirmation-->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                Apakah anda yakin?
              </h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
              <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
          </div>
        </div>
      </div>




      <!-- footer content -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- /footer content -->
    </div>
  </div>
  <!-- MODAL -->
  <?php $this->load->view("admin/_partials/modal.php") ?>
  <!-- js -->
  <!-- jQuery -->
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script>

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

  <!-- Datatable DSC -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#list_daftar_ulang').DataTable({
        "order": [
          [0, "desc"]
        ]
      });
    });
  </script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>

  <!-- uang -->
  <script src="<?php echo base_url('https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js') ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      // Format mata uang.
      $('.uang').mask('0.000.000.000', {
        reverse: true
      });
    })
  </script>

  <script>
    function deleteConfirm(e, url) {
      e.preventDefault();
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }

    // function bayarsppConfirm(url){
    //   $('#btn-bayar').attr('href', url);
    //   $('#bayarModal').modal();
    // }
  </script>

  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

  <script src="<?php echo base_url() . 'js/jquery-ui.js' ?>" type="text/javascript"></script>

  <!-- bootstrap-datetimepicker -->
  <script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

  <!-- Initialize datetimepicker -->
  <script type="text/javascript">
    $('.myDatepicker2').datetimepicker({
      format: 'YYYY/MM/DD',
      defaultDate: new Date()
    });

    $('#myDatepicker3').datetimepicker({
      format: 'YYYY',
      defaultDate: new Date()
    });
  </script>

</body>

</html>