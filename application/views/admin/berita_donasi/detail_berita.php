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
                  <a href="<?php echo site_url('admin/berita_donasi/') ?>"><i class="fa fa-arrow-left"></i> Back</a>
                </div>

                <div class="card-body">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>Detail Berita Donasi</h2>
                    <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#editModal"  class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a></ul>
                    <div class="clearfix"></div>
                     
                  </div>

                  <div class="col-md-5 col-sm-5">
                    <?php if ($this->session->flashdata('success') == TRUE): ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php endif; ?>
                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align" for="nama_siswa">Jangka Waktu : </label>
                      <div class="col-md-6 col-sm-6 ">
                        <label class="col-form-label" style="text-align: left;">001/05/2022 - 29/05/2022</label>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align" for="NIS">Judul Berita : </label>
                      <div class="col-md-6 col-sm-6 ">
                        <label class="col-form-label" style="text-align: left;">Ini judul</label>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align" for="kelas">Deskripsi : </label>
                      <div class="col-md-6 col-sm-6 ">
                        <label class="col-form-label" style="text-align: left;">Ini deskripsi</label>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align" for="kelas">Kategori : </label>
                      <div class="col-md-6 col-sm-6 ">
                        <label class="col-form-label" style="text-align: left;">Kategori A</label>
                      </div>
                    </div>

                  </div>

                  <div class="col-md-6 col-sm-6">
                      <div class="item" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Dana yang terkumpul : </label>
                        <div class="col-md-6 col-sm-6 ">
                          <label class="col-form-label" style="text-align: left;" >Rp. 1.000.000</label>    
                        </div>
                      </div>

                      <div class="item" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Status : </label>
                        <div class="col-md-6 col-sm-6 ">
                          <label class="col-form-label" style="text-align: left;" >Lunas</label>    
                        </div>
                      </div>

                      <div class="item" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Gambar : </label>
                        <div class="col-md-6 col-sm-6 ">
                          <label class="col-form-label" style="text-align: left;" ></label>    
                        </div>
                      </div>

                  </div>

                </div><!-- /card Body-->
                </div>

                <div class="card mb-3">
                <div class="card-body">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>Dokumentasi Penyaluran Donasi</h2>
                    <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#dokumentasiModal" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Tambah Dokumentasi</a></ul>
                    <div class="clearfix"></div>
                     
                  </div>

                  <div class="col-md-6 col-sm-6">

                  <div class="item">
                      <label class="col-form-label col-md-5 col-sm-5 label-align">Gambar ini isinya : </label>
                      <div class="col-md-6 col-sm-6 ">
                        <label class="col-form-label" style="text-align: left;">Gambar</label>
                      </div>
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

      <!-- Tambah Modal -->
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
                <form action="" method="post" enctype="multipart/form-data" >

                <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="judul_berita">Judul Berita</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="judul_berita" placeholder="Judul Berita" required/>
                      </div>
                    </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jangka Waktu : </label>
                      <div class='col-md-4 col-sm-4'>
                        <div class="form-group">
                          <label for="input_to">Dari</label>
                          <input type="time" id="waktu_mulai" name="waktu_mulai" class="form-control">
                        </div>
                      </div>
                      <div class='col-md-4 col-sm-4'>
                        <div class="form-group">
                          <label for="input_to">Sampai</label>
                          <input type="time" id="waktu_selesai" name="waktu_selesai" class="form-control">  
                      </div>
                    </div>
                  </div>

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori : </label>
                    <div class="col-md-8 col-sm-8 ">
                    <select class="select2_single form-control" name="kategori_donasi" tabindex="-1">
                        <option value=1>A</option>;
                        <option value=2>B</option>;
                        <option value=3>C</option>;  
                    </select>
                    </div>
              </div>

              <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi : </label>
                    <div class="col-md-8 col-sm-8 ">
                       <textarea class="form-control" id="deskripsi_berita" name="deskripsi_berita" placeholder="Deskripsi" required></textarea>
                    </div>
                </div>

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
                  <button type="submit" class="btn btn-success">Edit</button>
                </div>

            </form>
            </div>
          </div>
        </div>

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
                <form action="" method="post" enctype="multipart/form-data" >

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

  <script>
      function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }
    </script>


    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

    <script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

    <script src="<?php echo base_url().'js/jquery-ui.js'?>" type="text/javascript"></script>

    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

    <!-- Initialize datetimepicker -->
    <script  type="text/javascript">
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
