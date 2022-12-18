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
                <a href="<?php echo site_url('admin/berita_donasi/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
              </div>

              <div class="card-body">
                <div class="x_title" style="margin-bottom: 30px;">
                  <h2>Detail Berita Donasi</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <?php if ($role !== 'Sekretaris') : ?>
                      <a href="#" onclick="editData(event,'<?= $berita['id_berita']; ?>','<?= $berita['judul_berita']; ?>','<?= $berita['tanggal_mulai']; ?>','<?= $berita['tanggal_selesai']; ?>','<?= $berita['deskripsi_berita']; ?>','<?= $berita['gambar_berita']; ?>')" class="btn btn-info btn-xs">
                        <i class="fa fa-edit"></i> Edit
                      </a>
                    <?php endif; ?>

                  </ul>
                  <div class="clearfix"></div>

                </div>

                <div class="col-md-5 col-sm-5">
                  <?php if ($this->session->flashdata('success') == TRUE) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= $this->session->flashdata('success'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>
                  <div class="item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Jangka Waktu : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;"><?= $berita['tanggal_mulai']; ?> - <?= $berita['tanggal_selesai']; ?></label>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Judul Berita : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;"><?= $berita['judul_berita']; ?></label>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Deskripsi : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;"><?= $berita['deskripsi_berita']; ?></label>
                    </div>
                  </div>

                  <!-- <div class="item form-group">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Status : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label" style="text-align: left;">Ini status</label>
                    </div>
                  </div> -->

                </div>

                <div class="col-md-6 col-sm-6">
                  <div class="item">
                    <label class="col-form-label col-md-5 col-sm-5 label-align">Gambar : </label>
                    <div class="col-md-6 col-sm-6 ">
                      <img src="<?= base_url('images/berita_donasi/') . $berita['gambar_berita']; ?>" class="img-thumbnail">
                    </div>
                  </div>

                </div>

              </div><!-- /card Body-->
            </div>





            <!-- Delete -->
            <div class="modal fade" id="deleteBerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <!-- End Modal -->
            <?php if ($role !== 'Sekretaris') : ?>

              <!-- Edit Modal -->
              <div class="modal fade" id="editModal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title"> Edit Berita Donasi </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="col-md-12 col-sm-12">
                        <form action="<?= base_url(); ?>/admin/berita_donasi/proses_edit" method="post" enctype="multipart/form-data">

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Berita</label>
                            <div class="col-md-9 col-sm-9 ">
                              <input type="hidden" name="id_berita" value="<?= $berita['id_berita']; ?>" />
                              <input class="form-control" type="text" name="judul_berita" id="judul_berita_edit" placeholder="Judul Berita" value="" required />
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Jangka Waktu : </label>
                            <div class='col-md-5 col-sm-5'>
                              <div class="form-group">
                                <label for="input_to">Dari</label>
                                <div class='input-group date myDatepicker2'>
                                  <input type="text" class="form-control" placeholder="Dari " name="tanggal_mulai" id="tanggal_mulai_edit" value="" required />
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
                                  <input type="text" class="form-control" placeholder="Sampai " name="tanggal_selesai" id="tanggal_selesai_edit" value="" required />
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
                              <textarea class="form-control" name="deskripsi_berita" id="deskripsi_berita_edit" placeholder="Deskripsi" required></textarea>
                            </div>
                          </div>

                          <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar : </label>
                            <div class="col-md-9 col-sm-9">
                              <input type="hidden" name="gambar_berita_default" value="<?= $berita['gambar_berita']; ?>">
                              <input type="file" class="custom-file-input" id="berita_gambar_edit" name="gambar_berita">
                              <label class="custom-file-label berita_gambar_edit_label" for="berita_gambar_edit">Ambil gambar</label>
                            </div>
                          </div>
                          <div class="form-group mt-5 mx-auto" style="max-width: 250px;border:1px solid #ddd">
                            <img id="image_prev_edit" src="<?= base_url('images/berita_donasi/') . $berita['gambar_berita']; ?>" class="img-fluid" alt="">
                          </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Edit</button>
                    </div>

                    </form>
                  </div>
                </div>
              </div>
            <?php endif; ?>

            <!-- Tambah Modal -->
            <div class="modal fade" id="dokumentasiModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title"> Tambah Dokumentasi </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="col-md-12 col-sm-12">
                      <form action="" method="post" enctype="multipart/form-data">

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar : </label>
                          <div class="col-md-8 col-sm-8">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="upload_img">
                            <label class="custom-file-label" for="validatedCustomFile">Pilih Gambar...</label>
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

  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- jQuery -->
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
  <!-- NProgress -->
  <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>

  <script type="text/javascript">
    function deleteConfirm(url) {
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }

    function editData(e, id, judul, tgl_mulai, tgl_selesai, deskripsi, gambar) {
      e.preventDefault();
      $('#id_berita_edit').val(id);
      $('#tanggal_mulai_edit').val(tgl_mulai);
      $('#tanggal_selesai_edit').val(tgl_selesai);
      $('#judul_berita_edit').val(judul);
      $('#deskripsi_berita_edit').val(deskripsi);
      $('.berita_gambar_edit_label').text(gambar.substring(0, 40));
      $('#editModal').modal();
    }

    $('#berita_gambar_edit').change(function() {
      const file = this.files[0];
      if (file) {
        let reader = new FileReader();
        reader.onload = function(event) {
          $('.berita_gambar_edit_label').text(file.name);
          $('#image_prev_edit').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
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
    $('.myDatepicker2').datetimepicker({
      format: 'YYYY-MM-DD',
    });

    $('#myDatepicker3').datetimepicker({
      format: 'YYYY'
    });
  </script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>



</body>

</html>