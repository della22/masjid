<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
                <h2>Data Jamaah </h2>
                <ul class="nav navbar-right panel_toolbox"><a href="#" data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Jamaah</a></ul>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">

                      <?php echo form_error('telepon_jamaah', '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button></div>'); ?>

                      <?php if ($this->session->flashdata('success') == TRUE) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('success'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php endif; ?>
                      <?php if ($this->session->flashdata('error_import') == TRUE) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= $this->session->flashdata('error_import'); ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      <?php endif; ?>
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th width="5%">No.</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $j = 1; ?>
                          <?php foreach ($jamaah->result_array() as $data_jamaah) :
                          ?>
                            <tr>
                              <td align="center"><?php echo $j ?></td>
                              <td width="200"><?= $data_jamaah['nama_jamaah']; ?></td>
                              <td width="50"><?= $data_jamaah['telepon_jamaah']; ?></td>
                              <td width="350"><?= $data_jamaah['alamat_jamaah']; ?></td>
                              <td width="150" align="center">
                                <a href="" onclick="editData(event, '<?= $data_jamaah['id_jamaah']; ?>','<?= $data_jamaah['nama_jamaah']; ?>','<?= $data_jamaah['telepon_jamaah']; ?>','<?= $data_jamaah['alamat_jamaah']; ?>')"><i class="fa fa-edit"></i> Edit</a>
                                <a href="" onclick="deleteConfirm(event,'<?= base_url(); ?>/admin/jamaah/hapus/<?= $data_jamaah['id_jamaah']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
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

      <!-- footer content -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- /footer content -->
    </div>
  </div>

  <!-- Modal -->
  <!-- Logout Delete Confirmation-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
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

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Edit Data Jamaah </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form role="form" action="<?= base_url(); ?>/admin/jamaah/edit" method="post">
            <div class="form-group col-md-12 col-sm-12">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Nama : </label>
              <div class="col-md-8 col-sm-8 ">
                <input type="hidden" name="id_jamaah" id="id_jamaah" value="" />
                <input class="form-control" type="text" name="nama_jamaah" id="nama_jamaah" placeholder="Nama" value="" />
              </div>
            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Telepon : </label>
              <div class='col-md-8 col-sm-8'>
                <input class="form-control" type="number" name="telepon_jamaah" id="telepon_jamaah" placeholder="Telepon" required />
              </div>

            </div>
            <div class="form-group col-md-12 col-sm-12">
              <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat : </label>
              <div class="col-md-8 col-sm-8 ">
                <textarea class="form-control" name="alamat_jamaah" id="alamat_jamaah" placeholder="Alamat" required></textarea>
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

  <!-- Tambah Modal -->
  <div class="modal fade" id="tambahModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Tambah Data Jamaah </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-sm-12">
            <div class="col-md-6 col-sm-6" align="center">
              <a href="#" data-toggle="modal" data-target="#tambahExcelModal" class="btn btn-success"><i class="fa fa-plus"></i> Upload Excel</a>

            </div>
            <div class="col-md-6 col-sm-6" align="center">
              <a href="#" data-toggle="modal" data-target="#tambahManualModal" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Manual</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 col-sm-12">
            <div class="col-md-12">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Manual Modal -->
  <div class="modal fade" id="tambahManualModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Form Tambah Jamaah </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-sm-12">
            <form action="<?= base_url(); ?>/admin/jamaah/proses" method="post" enctype="multipart/form-data">
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_jamaah">Nama</label>
                <div class="col-md-8 col-sm-8 ">
                  <input class="form-control" type="text" name="nama_jamaah" placeholder="Nama" value="<?= set_value('nama_jamaah'); ?>" required />
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="telepon_jamaah">Telepon</label>
                <div class="col-md-8 col-sm-8 ">
                  <input class="form-control" type="tel" pattern="[0-9]*" name="telepon_jamaah" placeholder="Telepon" value="<?= set_value('telepon_jamaah'); ?>" required />
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_jamaah">Alamat</label>
                <div class="col-md-8 col-sm-8 ">
                  <textarea class="form-control" name="alamat_jamaah" placeholder="Alamat" required><?= set_value('alamat_jamaah'); ?></textarea>
                </div>
              </div>

              <br>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Tambah</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah via Upload Excel Modal -->
  <div class="modal fade" id="tambahExcelModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Upload Excel </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>admin/phpspreadsheet/import_jamaah" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="form-group col-md-12 col-sm-12">
              <div class="col-md-8 col-sm-8">

                <input type="file" class="custom-file-input" id="validatedCustomFile" name="upload_file">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
              </div>
              <div class="col-md-4 col-sm-4">

                <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
              </div>

            </div>

          </form>
        </div>
        <div class="modal-footer">
          <div class="col-md-12 col-sm-12">
            <div class="col-md-12">
              <div> <label>Contoh template excel untuk upload</label>
              </div>
              <div class="float-right">
                <a href="<?php print base_url('assets/uploads/sample-xlsx.xlsx') ?>" class="btn btn-link btn-sm"><i class="fa fa-file-excel"></i> Sample .XLSX</a>
                <a href="<?php print base_url('assets/uploads/sample-xls.xls') ?>" class="btn btn-link btn-sm"><i class="fa fa-file-excel"></i> Sample .XLS</a>
                <a href="<?php print base_url('assets/uploads/sample-csv.csv') ?>" class="btn btn-link btn-sm" target="_blank"><i class="fa fa-file-csv"></i> Sample .CSV</a>
              </div>
            </div>
          </div>

        </div>
      </div>
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

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/jquery-ui.js') ?>"></script>
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>

  <script>
    function deleteConfirm(e, url) {
      e.preventDefault();
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }

    function editData(e, id_jamaah, nama, telepon, alamat) {
      e.preventDefault();
      $("#id_jamaah").val(id_jamaah);
      $("#nama_jamaah").val(nama);
      $("#telepon_jamaah").val(telepon);
      $("#alamat_jamaah").val(alamat);
      $('#editModal').modal();
    }
    $("input[name='telepon_jamaah']").on('input', function(e) {
      $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
  </script>

</body>

</html>