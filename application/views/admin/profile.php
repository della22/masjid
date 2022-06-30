<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>

  <link rel="stylesheet" href="<?php echo base_url().'css/jquery-ui.css'?>">
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
              <div class="card-body">
                <div class="x_title">
                  <h2 class="col-md-12 col-sm-12" style="text-align: center;">Edit Profile Admin</h2>
                  <div class="clearfix"></div>

                </div>
                  
                <form action="" method="post" enctype="multipart/form-data" >

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Username</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control" type="text" id="nama_siswa" name="username" placeholder="username" value="<?= $this->session->userdata('username')?>"/>
                    </div>
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Email</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="email" name="email" placeholder="Email" />
                    </div>                      
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Telepon</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="number" name="telepon" placeholder="Telepon" />
                    </div>                      
                  </div>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                    <div class="col-md-6 col-sm-6 ">
                      <label class="col-form-label col-md-12 col-sm-12">*Kosongkan Form Password Baru Jika Tidak Mengubah Password* </label>
                    </div>

                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Password Baru*</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="password" name="password_baru" placeholder="Password Baru" />
                    </div>                      
                  </div>


                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Konfirmasi Password Baru*</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="password" name="password_baru_konfirm" placeholder="Konfirmasi Password Baru" data-validate-linked='password_baru' />
                    </div>

                  </div>
                  <br>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Password Lama</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input class="form-control " type="password" name="password" placeholder="Password Lama" required />
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


  <script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>


  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>



</body>
</html>
