<!DOCTYPE html>
<html lang="en">
<?php $role = $this->session->userdata('role'); ?>

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
              <div class="card-header">
                <a href="<?php echo site_url('admin/arisan_kurban/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
              </div>
              <div class="card-body">
                <?php
                $total_dibayar = 0;
                foreach ($cicil_arisan_kurban->result_array() as $data_cicil) {
                  $total_dibayar += $data_cicil['nominal_cicil'];
                }

                $kekurangan_cal = $arisan_kurban['biaya'] - $total_dibayar;
                $kekurangan = ($kekurangan_cal > 0) ? $kekurangan_cal : $kekurangan_cal * -1
                ?>
                <div class="x_title" style="margin-bottom: 30px;">
                  <h2>Riwayat Pembayaran / Cicilan Arisan Kurban</h2>
                  <div class="clearfix"></div>

                </div>

                <div class="col-md-6 col-sm-6">

                  <div class="item">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Nama Donatur : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;"><?= $arisan_kurban['nama_jamaah']; ?></label>
                    </div>
                  </div>

                  <div class="item">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Tahun Periode Kurban : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;"><?= $arisan_kurban['tahun_periode']; ?></label>
                    </div>
                  </div>

                  <div class="item">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Total Yang Telah Dibayar : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;">Rp. <?= rupiah($total_dibayar); ?></label>
                    </div>
                  </div>

                  <div class="item" style="margin-bottom: 10px;">
                    <label class="col-form-label col-md-5 col-sm-5 label-align"><?= $kekurangan_cal > 0 ? 'Kekurangan' : 'Kelebihan'; ?> : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;"><strong>Rp. <?= rupiah($kekurangan); ?></strong></label>
                    </div>
                  </div>

                  <div class="item">
                    <label class="col-form-label col-md-5 col-sm-5 label-align"></label>
                    <div class="col-md-6 col-sm-6 ">
                      <?php if ($role !== 'Sekretaris') : ?>
                        <a href="#" data-toggle="modal" data-target="#bayarModal" style="text-align: left;"><button type="button" class="btn btn-success btn-xs">Cicil</button></a>
                      <?php endif; ?>
                    </div>
                  </div>

                </div>

                <div class="col-md-6 col-sm-6">
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
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $j = 1; ?>
                          <?php foreach ($cicil_arisan_kurban->result_array() as $data_cicil) :
                          ?>
                            <tr>
                              <td align="center"><?php echo $j ?></td>
                              <td><?= $data_cicil['tanggal_cicil']; ?></td>
                              <td>Rp. <?= rupiah($data_cicil['nominal_cicil']); ?></td>
                              <td>
                                <?php if ($role !== 'Sekretaris') : ?>
                                  <a href="" onclick="editData(event, '<?= $data_cicil['id_cicil_arisan']; ?>', '<?= $arisan_kurban['id_arisan']; ?>','<?= $data_cicil['tanggal_cicil']; ?>','<?= $data_cicil['nominal_cicil']; ?>')"><i class="fa fa-edit"></i> Edit</a>
                                <?php endif; ?>
                                <a href="<?= base_url('admin/arisan_kurban/print'); ?>/<?= $data_cicil['id_cicil_arisan']; ?>" style="margin-right: 9px" target="_blank"><i class="fa fa-print"></i> Print </a>
                                <?php if ($role !== 'Sekretaris') : ?>
                                  <a href="" onclick="deleteConfirm(event,'<?= base_url(); ?>/admin/arisan_kurban/hapusCicil/<?= $data_cicil['id_cicil_arisan']; ?>/<?= $arisan_kurban['id_arisan']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
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

              </div><!-- /card Body-->

            </div> <!-- /card mb3-->

          </div>

        </div>

      </div>


      <!-- /page content -->

      <!-- footer content -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- /footer content -->
    </div>
  </div>

  <?php if ($role !== 'Sekretaris') : ?>
    <!-- Modal Edit Cicil -->
    <div class="modal fade" id="editCicil" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Edit Pembayaran / Cicilan </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <form role="form" action="<?= base_url(); ?>/admin/arisan_kurban/editCicil" method="post">
              <input type="hidden" name="id_cicil_arisan" id="id_cicil_arisan_edit" value="">
              <input type="hidden" name="id_arisan" id="id_arisan_edit" value="">

              <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Nominal (Rp.) : </label>
                <div class="col-md-8 col-sm-8 ">
                  <input class="form-control form-control-sm col-md-8 col-sm-8" type="number" min=0 id="nominal_cicil_edit" name="nominal_cicil" placeholder="Nominal Cicilan" required value="" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Tanggal Cicilan : </label>
                <div class='col-md-8 col-sm-8'>
                  <div class='input-group date myDatepicker2 col-md-8 col-sm-8'>
                    <input type="text" class="form-control form-control-sm" placeholder="Tanggal Cicil" id="tanggal_cicil_edit" name="tanggal_cicil" required value="" />
                    <span class="input-group-addon" style="padding-top: 10px">
                      <span class="fa fa-calendar-o"></span>
                    </span>
                  </div>
                </div>
              </div>
              <br>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Edit Cicilan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($role !== 'Sekretaris') : ?>
    <!-- Modal -->
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <!-- Modal bayar-->
    <div class="modal fade" id="bayarModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

          <div class="modal-body">
            <form role="form" action="<?= base_url(); ?>/admin/arisan_kurban/tambahCicil" method="post">

              <div class="form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Nama Donatur : </label>
                <label class="col-form-label col-md-8 col-sm-8" style="text-align: left;"><?= $arisan_kurban['nama_jamaah']; ?></label>
              </div>
              <div class="form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun Kurban : </label>
                <label class="col-form-label col-md-8 col-sm-8" style="text-align: left;"><?= $arisan_kurban['tahun_periode']; ?></label>
              </div>

              <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Nominal (Rp.) : </label>
                <div class="col-md-8 col-sm-8 ">
                  <input type="hidden" name="id_arisan" value='<?= $arisan_kurban['id_arisan']; ?>' />
                  <input class="form-control form-control-sm col-md-8 col-sm-8 inputan_angka" type="tel" pattern="[0-9]*" value="" name="nominal_cicil" placeholder="Nominal Cicilan" required value=0 />
                </div>
              </div>
              <div class="form-group">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Tanggal Cicil : </label>
                <div class=' col-md-8 col-sm-8'>
                  <div class='input-group date myDatepicker2 col-md-8 col-sm-8'>
                    <input type="text" class="form-control form-control-sm" placeholder="Tanggal Cicil" name="tanggal_cicil" required />
                    <span class="input-group-addon" style="padding-top: 10px">
                      <span class="fa fa-calendar-o"></span>
                    </span>
                  </div>
                </div>
              </div>
              <br>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Cicil</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($role !== 'Sekretaris') : ?>
    <!-- Delete -->
    <div class="modal fade" id="deleteCicil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a id="btn-delete" class="btn btn-danger" href="">Hapus</a>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- MODAL -->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- jQuery -->
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>

  <script>
    function deleteConfirm(e, url) {
      e.preventDefault();
      $('#btn-delete').attr('href', url);
      $('#deleteCicil').modal();
    }

    function editData(e, id, id_arisan, tanggal, nominal) {
      e.preventDefault();
      $("#id_cicil_arisan_edit").val(id);
      $("#id_arisan_edit").val(id_arisan);
      $("#tanggal_cicil_edit").val(tanggal);
      $("#nominal_cicil_edit").val(nominal);
      $('#editCicil').modal();
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

  <!-- Initialize datetimepicker -->
  <script type="text/javascript">
    $(".inputan_angka").on('input', function(e) {
      $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    $('.myDatepicker2').datetimepicker({
      format: 'YYYY-MM-DD',
      defaultDate: new Date()

    });

    $('#myDatepicker3').datetimepicker({
      format: 'YYYY',
      defaultDate: new Date()

    });
  </script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>



</body>

</html>