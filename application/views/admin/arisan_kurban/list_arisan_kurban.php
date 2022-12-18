<!DOCTYPE html>
<html lang="en">
<?php $role = $this->session->userdata('role'); ?>

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
      <div class="right_col" role="main" style="min-height: 100vh;">
        <div class="row">

          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Data Pembayaran Arisan Kurban</h2>
                <ul class="nav navbar-right panel_toolbox"><a href="#" data-toggle="modal" data-target="#filterModal" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a></ul>
                <?php if ($role !== 'Sekretaris') : ?>
                  <ul class="nav navbar-right panel_toolbox"><a href="#" data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pembayaran Arisan Kurban</a></ul>
                <?php endif; ?>
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
                      <?php if ($this->session->flashdata('error') == TRUE) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('error'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php endif; ?>
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <!-- <th>No.</th> -->
                            <th>No. </th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Biaya(Rp.)</th>
                            <th>Status</th>
                            <th>Bulan Ini</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $j = 1;
                          // var_dump($cicilan_bulan_arisan->result_array());
                          foreach ($arisan_kurban->result_array() as $data_arisan) :
                            $perbulan_harus = $data_arisan['biaya'] / 12;
                            // MELAKUKAN PERHITUNGAN JUMLAH PEMBAYARAN BULAN INI
                            $total_bulan_ini = 0;
                            foreach ($cicilan_bulan_arisan->result_array() as $cicilan_bulan_ini) {

                              if ($data_arisan['id_arisan'] == $cicilan_bulan_ini['id_arisan']) {

                                $total_bulan_ini += $cicilan_bulan_ini['nominal_cicil'];
                              }
                            }
                          ?>

                            <tr>
                              <td align="center"><?php echo $j ?></td>
                              <td width="10"><?= $data_arisan['tahun_periode']; ?></td>
                              <td><?= $data_arisan['nama_jamaah']; ?></td>
                              <td align="right">Rp. <?= rupiah($data_arisan['biaya']); ?></td>
                              <td align="center"><?= $data_arisan['status_arisan'] == 0 ? '<span class="badge badge-danger">Belum Lunas</span>' : '<span class="badge badge-success">Lunas</span>'; ?></td>
                              <td align="center">
                                <?php
                                if ($data_arisan['status_arisan'] == 0) {

                                  if ((int) $total_bulan_ini < (int) $perbulan_harus) {

                                    echo '<span class="badge badge-danger">Belum Lunas</span>';
                                  } else {
                                    echo '<span class="badge badge-success">Sudah Lunas</span>';
                                  }
                                } else {
                                  echo '<span class="badge badge-primary">Lunas Semua Bulan</span>';
                                }
                                ?>
                              </td>
                              <td align="center">
                                <a href="<?php echo site_url('admin/arisan_kurban/cicilan/' . $data_arisan['id_arisan']) ?>" style="margin-right: 9px"><i class="fa fa-money"></i> Detail </a>
                                <?php if ($role !== 'Sekretaris') : ?>
                                  <a href="" onclick="editData(event, '<?= $data_arisan['id_arisan']; ?>', '<?= $data_arisan['id_donatur']; ?>','<?= $data_arisan['nama_jamaah']; ?>','<?= $data_arisan['tahun_periode']; ?>','<?= $data_arisan['biaya']; ?>')"><i class="fa fa-edit"></i> Edit</a>
                                  <a href="" onclick="deleteConfirm(event,'<?= base_url(); ?>/admin/arisan_kurban/hapus/<?= $data_arisan['id_arisan']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
                                <?php endif; ?>
                              </td>
                              </td>
                            </tr>
                            <?php $j++; ?>
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
                  <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun Periode Kurban : </label>
                  <div class='col-md-6 col-sm-6'>
                    <div class='input-group date' id='myDatepicker3'>
                      <input type="text" class="form-control" placeholder="Tahun " value="<?= $tahun; ?>" name="tahun_periode" required />
                      <span class="input-group-addon" style="padding-top: 10px">
                        <span class="fa fa-calendar-o"></span>
                      </span>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-12 col-sm-12">
                  <label class="col-form-label col-md-4 col-sm-4 label-align">Status Pembayaran : </label>
                  <div class="col-md-6 col-sm-6 ">
                    <select class="select2_single form-control" name="status_arisan" tabindex="-1">
                      <option value="semua_tahun">Semua Status & Tahun</option>;
                      <option value="semua">Semua Status</option>;
                      <option value="lunas">Lunas</option>;
                      <option value='belum_lunas'>Belum Lunas</option>;
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

      <?php if ($role !== 'Sekretaris') : ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> Edit Arisan Kurban </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="<?= base_url(); ?>/admin/arisan_kurban/edit" method="post">
                  <div class="form-group col-md-12 col-sm-12">
                    <input type="hidden" name="id_arisan" id="id_arisan" value="" />
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun Periode : </label>
                    <div class="col-md-7 col-sm-7 ">
                      <input class="form-control" type="text" id="tahun_periode_edit" name="tahun_periode" placeholder="Tahun Periode" value="" />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Nama Donatur : </label>
                    <div class='col-md-7 col-sm-7'>
                      <input class="form-control" type="text" id="nama_donatur_edit" name="nama_donatur" placeholder="Nama Donatur" required />
                      <input type="hidden" name="id_donatur" id="id_donatur_edit" value="" />
                    </div>
                  </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Biaya (Rp.)</label>
                    <div class="col-md-7 col-sm-7 ">
                      <input class="form-control" type="number" id="biaya_arisan_edit" name="biaya_arisan" placeholder="Biaya" required />
                    </div>
                  </div>

                  <br>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Edit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($role !== 'Sekretaris') : ?>
        <!-- Tambah Modal -->
        <div class="modal fade" id="tambahModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <form action="<?= base_url(); ?>/admin/arisan_kurban/proses" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <h4 class="modal-title"> Tambah Arisan Kurban </h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-sm-12">
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun Periode Kurban</label>
                      <div class='col-md-7 col-sm-7'>
                        <div class='input-group date' id='myDatepicker4'>
                          <input class="form-control" type="text" placeholder="Tahun " value="<?= $tahun ?>" name="tahun_periode" required />
                          <span class="input-group-addon" style="padding-top: 10px">
                            <span class="fa fa-calendar-o"></span>
                          </span>
                        </div>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Nama Donatur</label>
                      <div class="col-md-7 col-sm-7 ">
                        <!-- <input class="form-control" type="text" id="nama_donatur_tambah" value="" name="nama_donatur" placeholder="Nama Donatur" required />
                      <input type="hidden" id="id_donatur" name="id_donatur" required /> -->
                        <select class="js-example-basic-single" style="width: 100%;border-radius:none" name="id_donatur">
                          <option value=""></option>
                          <?php foreach ($jamaah->result_array() as $data_jamaah) :
                          ?>
                            <option value="<?= $data_jamaah['id_jamaah']; ?>"><?= $data_jamaah['nama_jamaah']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Biaya (Rp.)</label>
                      <div class="col-md-7 col-sm-7 ">
                        <input class="form-control" type="number" id="biaya" name="biaya" placeholder="Biaya" required />
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
      <?php endif; ?>

      <?php if ($role !== 'Sekretaris') : ?>
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
      <?php endif; ?>

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
  <script src="<?php echo base_url('assets/select2/js/select2.min.js') ?>"></script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/jquery-ui.js') ?>" type="text/javascript"></script>
  <!-- <script src="<?php echo base_url('js/custom.min.js') ?>"></script> -->



  <script>
    function deleteConfirm(e, url) {
      e.preventDefault();
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }


    $(document).ready(function() {
      // PENCARIAN SELECT2
      $('.js-example-basic-single').select2({
        placeholder: 'Cari Donatur'
      });
      $('#datatable2').dataTable();
      $("#nama_donatur_tambah").autocomplete({
        source: "<?= base_url('admin/arisan_kurban/get_autocomplete/'); ?>",
        appendTo: "#tambahModal",
        select: function(event, ui) {
          $("#id_donatur").val(ui.item.id_donatur);
        }
      });
      $("#nama_donatur_edit").autocomplete({
        source: "<?= base_url('admin/arisan_kurban/get_autocomplete/'); ?>",
        appendTo: "#editModal",
        select: function(event, ui) {
          $("#id_donatur_edit").val(ui.item.id_donatur);
        }
      });
    });

    function editData(e, id, id_donatur, nama_donatur, periode, biaya) {
      e.preventDefault();
      $("#id_arisan").val(id);
      $("#id_donatur_edit").val(id_donatur);
      $("#nama_donatur_edit").val(nama_donatur);
      $("#tahun_periode_edit").val(periode);
      $("#biaya_arisan_edit").val(biaya);
      $('#editModal').modal();
    }
  </script>

  <!-- bootstrap-daterangepicker -->
  <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

  <!-- bootstrap-datetimepicker -->
  <script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

  <!-- Initialize datetimepicker -->
  <script type="text/javascript">
    $('.myDatepicker2').datetimepicker({
      format: 'DD/MM/YYYY'
    });

    $('#myDatepicker3').datetimepicker({
      format: 'YYYY'
    });
    $('#myDatepicker4').datetimepicker({
      format: 'YYYY'
    });
    // $("body").delegate("#myDatepicker3", "click", function() {
    //   $(this).datetimepicker({
    //     format: 'YYYY'
    //   });
    // });
  </script>
  <script src="http://localhost/masjid/js/custom.min.js"></script>
</body>

</html>