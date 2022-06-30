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
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#filterModal" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a></ul>
                  <!-- <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pembayaran Daftar Ulang</a></ul> -->
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Berita Donasi</a></ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">

                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <?php if ($this->session->flashdata('success') == TRUE): ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success');?>
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
                              <th>Jangka Waktu</th>
                              <th>Judul Berita</th>
                              <th>Terkumpul (Rp.)</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td width="10" align="center">1</td>
                              <td width="145">01/05/2022 - 29/05/2022</td>
                              <td>Ini adalah judul berita</td>
                              <td align="right">1.000.000</td>
                              <td align="center">Berlangsung</td>
                              <td align="center">
                                <a href="<?php echo site_url('admin/berita_donasi/detail') ?>" style="margin-right: 9px" ><i class="fa fa-money"></i> Detail </a>
                                <a onclick="" href="#!" ><i class="fa fa-trash"></i> Hapus</a>
                              </td>
                            </tr>
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
            <form role="form" action="" method="post">

            <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Status Donasi : </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="select2_single form-control" name="status_daftar_ulang" tabindex="-1">
                    <option value="">Semua Status</option>;
                    <option value=1>Lunas</option>;
                    <option value=0>Belum Lunas</option>;  
                  </select>
                </div>
              </div>

              <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Bulan Donasi : </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="select2_single form-control" name="tahun_ajaran" tabindex="-1">
                    <option value=0>Semua</option>;
                  </select>
                </div>
              </div>

              <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun Donasi : </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="select2_single form-control" name="tahun_ajaran" tabindex="-1">
                    <option value=0>Semua</option>;
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
        $('#list_daftar_ulang').DataTable( {
          "order": [[ 0, "desc" ]]
        } );
      } );

    </script>


    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>

    <!-- uang --> 
    <script src="<?php echo base_url('https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '.uang' ).mask('0.000.000.000', {reverse: true});
    })
    </script>

    <script>
      function deleteConfirm(url){
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

  </body>
</html>
