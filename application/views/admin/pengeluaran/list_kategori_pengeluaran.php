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
              <?php if ($this->session->flashdata('success')) { ?>
              <div class="alert alert-success" role="alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php } else if($this->session->flashdata('error')){ ?>  
              <div class="alert alert-danger">  
                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
              </div>  
            <?php } else if($this->session->flashdata('warning')){ ?>  
              <div class="alert alert-warning">  
                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>  
              </div>  
            <?php } else if($this->session->flashdata('info')){ ?>  
              <div class="alert alert-info">  
                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>  
              </div>  
            <?php } ?>

              <div class="x_panel">
                <div class="x_title">
                  <h2>Kategori pengeluaran</h2>
                  
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#filterTambahKategori" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori pengeluaran</a></ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">

                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                       <table id="list_daftar_ulang" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th width="5%">No.</th>
                              <th>Nama Kategori</th>
                              <th align="center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td align="center">1</td>
                              <td>Kategori</td>
                              <td align="center">
                                <a href="#"  data-toggle="modal" data-target="#editKategoriModal" style="margin-right: 9px" ><i class="fa fa-edit"></i> Edit </a>

                                <!-- Modal Edit Kategori-->
                                    <div class="modal fade" id="editKategoriModal" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title"> No Kategori : 1 </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <div class="modal-body">
                                            <form role="form" action="" method="post">
                                                <input type="hidden" name="" value="">

                                                <div class="form-group col-md-12 col-sm-12">
                                                <div class="item form-group">
                                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="nama_kategori">Nama Kategori</label>
                                                    <div class="col-md-7 col-sm-7 ">
                                                        <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori" required/>
                                                    </div>
                                                </div>
                                                </div>

                                                <br>

                                                <div class="modal-footer">  
                                                  <button type="submit" class="btn btn-success">Edit</button>
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



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
        
        <!-- Tambah Kategori Modal -->
        <div class="modal fade" id="filterTambahKategori" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title"> Tambah Kategori </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
            <div class="modal-body">
            <form role="form" action="" method="post">
              <div class="form-group col-md-12 col-sm-12">
                <div class="item form-group">
                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="nama_kategori">Nama Kategori</label>
                    <div class="col-md-7 col-sm-7 ">
                        <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori" required/>
                    </div>
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
          "order": [[ 0, "asc" ]]
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