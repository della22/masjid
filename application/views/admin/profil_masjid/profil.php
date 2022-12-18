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
            <div class="card mb-3">
              <?php echo form_error('email_profil', '<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
              <div class="card-body">
                <form action="<?= base_url(); ?>/admin/profil_masjid/editProfil" method="post" enctype="multipart/form-data">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>Profil Masjid</h2>
                    <div class="clearfix"></div>

                  </div>
                  <div class="col-md-5 col-sm-5">
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Foto : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <img src="<?= base_url('./images/' . $profil['upload_img']); ?>" width="100px" class="img-thumbnail">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Foto : </label>
                      <div class="col-md-10 col-sm-10">
                        <input type="file" name="upload_img" class="form-control">
                        <input type="hidden" name="upload_image" value="<?= $profil['upload_img']; ?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat : </label>
                      <div class="col-md-10 col-sm-10 ">
                        <textarea class="form-control" name="alamat_profil" placeholder="Alamat" required><?= $profil['alamat_profil']; ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">No Telepon : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $profil['telp_profil']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="telp_profil" placeholder="No. Telp" required />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Email : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $profil['email_profil']; ?>" class="form-control" type="email" name="email_profil" placeholder="Email" required />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Norek (Bank) : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $profil['norek_profil']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="norek_profil" placeholder="Norek (Bank)" required />
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Bank Atas Nama : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $profil['bank_an']; ?>" class="form-control" type="text" name="bank_an" placeholder="Bank Atas Nama" required />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Deskripsi : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control" name="desk_profil" placeholder="Deskripsi" required><?= $profil['desk_profil']; ?></textarea>
                      </div>
                    </div>

                  </div>
                  <div class="x_title" style="margin-bottom: 10px;">
                    <div class="clearfix"></div>
                  </div>
                  <ul class="nav navbar-right panel_toolbox"><button type="submit" class="btn btn-success">Simpan</button></ul>
                  <ul class="nav navbar-right panel_toolbox"><button type="reset" class="btn btn-danger">Batal</button></ul>
                </form>
              </div><!-- /card Body-->
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <form action="<?= base_url(); ?>/admin/profil_masjid/editSdm" method="post" enctype="multipart/form-data">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>SDM Masjid</h2>
                    <div class="clearfix"></div>

                  </div>

                  <div class="col-md-5 col-sm-5">

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Foto : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <img src="<?= base_url('./images/' . $sdm['foto_bagan']); ?>" width="100px" class="img-thumbnail">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Ganti Foto : </label>
                      <div class="col-md-9 col-sm-9">
                        <input type="file" name="foto_bagan" class="form-control">
                        <input type="hidden" name="old_foto_bagan" value="<?= $sdm['foto_bagan']; ?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Jumlah Pengurus : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $sdm['jumlah_pengurus']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="jumlah_pengurus" placeholder="Jumlah Pengurus" required />
                      </div>
                    </div>


                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Jumlah Remaja Masjid : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $sdm['jumlah_remaja_masjid']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="jumlah_remaja_masjid" placeholder="Jumlah Remaja Masjid" required />
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6 col-sm-6">
                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Imam Utama : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $sdm['jumlah_imam_utama']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="jumlah_imam_utama" placeholder="Jumlah Imam Utama" required />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Imam Cadangan : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $sdm['jumlah_imam_cadangan']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="jumlah_imam_cadangan" placeholder="Jumlah Imam Cadangan" required />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Muadzin : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $sdm['jumlah_muadzin']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="jumlah_muadzin" placeholder="Jumlah Muadzin" required />
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Khatib : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <input value="<?= $sdm['jumlah_khatib']; ?>" class="form-control inputan_angka" type="tel" pattern="[0-9]*" name="jumlah_khatib" placeholder="Jumlah Khatib" required />
                      </div>
                    </div>

                  </div>

                  <div class="x_title" style="margin-bottom: 10px;">
                    <div class="clearfix"></div>
                  </div>
                  <ul class="nav navbar-right panel_toolbox"><button type="submit" class="btn btn-success">Simpan</button></ul>
                  <ul class="nav navbar-right panel_toolbox"><button type="reset" class="btn btn-danger">Batal</button></ul>
                </form>
              </div><!-- /card Body-->
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <div class="x_title" style="margin-bottom: 30px;">
                  <h2>Layanan dan Kontak</h2>
                  <ul class="nav navbar-right panel_toolbox"><a href="#" data-toggle="modal" data-target="#tambahModal" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Tambah</a></ul>
                  <div class="clearfix"></div>
                </div>

                <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th width="10">No.</th>
                        <th>Jenis Layanan</th>
                        <th>Penanggung Jawab</th>
                        <th>Kontak</th>
                        <th width="150">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $j = 1; ?>
                      <?php foreach ($layanan->result_array() as $data_layanan) :
                      ?>
                        <tr>
                          <td align="center"><?php echo $j++ ?></td>
                          <td><?= $data_layanan['nama_layanan']; ?></td>
                          <td><?= $data_layanan['nama_jamaah']; ?></td>
                          <td><?= $data_layanan['telepon_jamaah']; ?></td>
                          <td align="center">
                            <a href="" onclick="editLayanan(event, '<?= $data_layanan['id_layanan']; ?>', '<?= $data_layanan['nama_layanan']; ?>','<?= $data_layanan['pj_layanan']; ?>','<?= $data_layanan['nama_jamaah']; ?>')"><i class="fa fa-edit"></i> Edit</a>

                            <a href="" onclick="deleteConfirm(event,'<?= base_url(); ?>/admin/profil_masjid/hapusLayanan/<?= $data_layanan['id_layanan']; ?>')"><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>

              </div><!-- /card Body-->
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
  <!-- Modal Edit -->
  <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Edit Layanan dan Kontak </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <form role="form" action="<?= base_url(); ?>/admin/profil_masjid/editLayanan" method="post">

            <div class="form-group col-md-12 col-sm-12">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_layanan">Nama Layanan : </label>
              <div class="col-md-8 col-sm-8 ">
                <input type="hidden" name="id_layanan" id="id_layanan" value="" />
                <input class="form-control" type="text" name="nama_layanan" id="nama_layanan" placeholder="Jenis Layanan" required />
              </div>
            </div>

            <div class="form-group col-md-12 col-sm-12">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="pj_layanan">Penanggung Jawab : </label>
              <div class="col-md-8 col-sm-8 ">
                <select class="js-example-basic-single-edit" style="width: 100%;border-radius:none" name="pj_layanan">
                  <option value=""></option>
                  <?php foreach ($jamaah->result_array() as $data_jamaah) :
                  ?>
                    <option value="<?= $data_jamaah['id_jamaah']; ?>"><?= $data_jamaah['nama_jamaah']; ?></option>
                  <?php endforeach; ?>
                </select>
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

  <!-- Delete -->
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
          <a id="btn-delete" class="btn btn-danger" href="">Hapus</a>
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
          <h4 class="modal-title"> Form Tambah Layanan </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="col-md-12 col-sm-12">
            <form action="<?= base_url(); ?>/admin/profil_masjid/inputLayanan" method="post" enctype="multipart/form-data">
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_layanan">Nama Layanan : </label>
                <div class="col-md-8 col-sm-8 ">
                  <input class="form-control" type="text" name="nama_layanan" id="nama_layanan" placeholder="Nama Layanan" required />
                </div>
              </div>

              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pj_layanan">Penanggung Jawab : </label>
                <div class="col-md-8 col-sm-8 ">
                  <select class="js-example-basic-single" style="width: 100%;border-radius:none" name="pj_layanan">
                    <option value=""></option>
                    <?php foreach ($jamaah->result_array() as $data_jamaah) :
                    ?>
                      <option value="<?= $data_jamaah['id_jamaah']; ?>"><?= $data_jamaah['nama_jamaah']; ?></option>
                    <?php endforeach; ?>
                  </select>
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
  </div> <!-- End Modal -->


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


  <!-- Initialize datetimepicker -->
  <script type="text/javascript">
    function editLayanan(e, id, nama, pj, nama_jemaah) {
      e.preventDefault();
      $('.js-example-basic-single-edit').select2({
        placeholder: nama_jemaah
      });
      $('.js-example-basic-single-edit').val(pj);
      $("#id_layanan").val(id);
      $("#nama_layanan").val(nama);
      $("#pj_layanan").val(pj);
      $('#editModal').modal();
    }
    $('.js-example-basic-single').select2({
      placeholder: 'Cari Donatur'
    });
    $(".inputan_angka").on('input', function(e) {
      $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    $('.myDatepicker2').datetimepicker({
      format: 'DD/MM/YYYY'
    });

    $('#myDatepicker3').datetimepicker({
      format: 'YYYY'
    });
  </script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>

</body>

</html>