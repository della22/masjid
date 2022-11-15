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
              <div class="card-header">

              </div>

              <?php if ($this->session->flashdata('error') == TRUE) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('error'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php if ($this->session->flashdata('success') == TRUE) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?= $this->session->flashdata('success'); ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <?php if ($this->session->flashdata('msg') == 'success') : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil Diedit
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>

              <div class="card-body">
                <div class="x_title">
                  <h2 class="col-md-12 col-sm-12" style="text-align: center;">Edit Profile Admin</h2>
                  <div class="clearfix"></div>

                </div>
                <form action=" <?= base_url('admin/profile/changeProfil'); ?>" method="post" enctype="multipart/form-data">

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="hidden" name="id_user" value="<?= $ubah->id_user; ?>" />
                      <input class="form-control" type="text" id="username" name="username" placeholder="username" value="<?= $ubah->username; ?>" />
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label col-md-12 col-sm-12">*Kosongkan Form Password Baru Jika Tidak Mengubah Password* </label>
                    </div>

                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Password Baru*</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="password" name="password_baru" placeholder="Password Baru" value="" />
                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Konfirmasi Password Baru*</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="password" value="" name="password_konfirm" placeholder="Konfirmasi Password Baru" data-validate-linked='password_baru' />
                    </div>

                  </div>
                  <br>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Password Lama</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="password" name="password_lama" placeholder="Password Lama" value="" required />
                    </div>

                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">

                      <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                    </div>
                  </div>

                </form>


              </div>

              <div class="card-footer small text-muted">

              </div>

              <!-- /form Tambah -->



            </div>

          </div>
          <br />

        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- /footer content -->
    </div>
  </div>

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


  <script src="<?php echo base_url() . 'js/jquery-ui.js' ?>" type="text/javascript"></script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>



</body>

</html>