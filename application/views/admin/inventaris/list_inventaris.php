<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                  <h2>Data Inventaris Masjid </h2>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Inventaris</a></ul>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#exportModal" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a></ul>
                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                       <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th width="5%">No.</th>
                              <th>Nama Item</th>
                              <th>Jumlah</th>
                              <th>Kondisi</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td align="center">1</td>
                              <td width="150">Mic</td>
                              <td width="50">4</td>
                              <td width="100">Baik</td>
                              <td width="200">Keterangan</td>
                              <td width="150" align="center">
                                <a href="#"  data-toggle="modal" data-target="#editModal" style="margin-right: 10px"><i class="fa fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('#')" href="#!" ><i class="fa fa-trash"></i> Hapus</a></td>
                                <tr>
                              <td align="center">2</td>
                              <td width="150">AC</td>
                              <td width="50">4</td>
                              <td width="100">Baik</td>
                              <td width="200">Keterangan</td>
                              <td width="150" align="center">
                                <a href="#"  data-toggle="modal" data-target="#editModal" style="margin-right: 10px"><i class="fa fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('#')" href="#!" ><i class="fa fa-trash"></i> Hapus</a></td>  
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
                <h4 class="modal-title"> Edit Inventaris Masjid</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="#" method="post">
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Item : </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="text" name="nama_item" placeholder="Nama Item" value=""/>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah : </label>
                    <div class='col-md-8 col-sm-8'>
                       <input class="form-control" type="number" name="jumlah_item" placeholder="Jumlah" required/> 
                     </div> 
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Kondisi : </label>
                    <div class='col-md-8 col-sm-8'>
                       <select class="select2_single form-control form-control-sm" name="kondisi_item" tabindex="-1">
                            <?php 
                            if($inventaris->kondisi == "Baik"){ 
                                  echo '<option value="Baik" selected="true">Baik</option>';
                                }else{
                                  echo '<option value="Baik">Baik</option>';
                                }
                              if($inventaris->kondisi == "Buruk"){ 
                                  echo '<option value="Buruk" selected="true">Buruk</option>';
                                }else{
                                  echo '<option value="Buruk">Buruk</option>';
                                }
                              if($inventaris->kondisi == "Baik, buruk"){ 
                                  echo '<option value="Baik, buruk" selected="true">Baik, buruk</option>';
                                }else{
                                  echo '<option value="Baik, buruk">Baik, buruk</option>';
                                }
                            ?>

                      </select>    
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan : </label>
                    <div class='col-md-8 col-sm-8'>
                       <textarea class="form-control" name="keterangan_item" placeholder="Keterangan" required></textarea>
                     </div>    
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                    <div class="col-md-8 col-sm-8 ">
                      <a style="font-size: 10px">*Tulis - jika tidak dibutuhkan</a>
                    </div>
                  </div>

                  <br>

                  </div>
                  <div class="modal-footer">  
                    <button type="submit" class="btn btn-success">Edit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      
        <!-- Tambah Manual Modal -->
        <div class="modal fade" id="tambahModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> Tambah Inventaris Masjid</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="#" method="post" enctype="multipart/form-data" >
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_item">Nama Item</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="nama_item" placeholder="Nama Item" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="jumlah_item">Jumlah</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="number" name="jumlah_item" placeholder="Jumlah" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="kondisi_item">Kondisi</label>
                      <div class="col-md-8 col-sm-8 ">
                        <select class="select2_single form-control form-control-sm" name="kondisi_item" tabindex="-1">
                            <?php 
                            if($inventaris->kondisi == "Baik"){ 
                                  echo '<option value="Baik" selected="true">Baik</option>';
                                }else{
                                  echo '<option value="Baik">Baik</option>';
                                }
                              if($inventaris->kondisi == "Buruk"){ 
                                  echo '<option value="Buruk" selected="true">Buruk</option>';
                                }else{
                                  echo '<option value="Buruk">Buruk</option>';
                                }
                              if($inventaris->kondisi == "Baik, buruk"){ 
                                  echo '<option value="Baik, buruk" selected="true">Baik, buruk</option>';
                                }else{
                                  echo '<option value="Baik, buruk">Baik, buruk</option>';
                                }
                            ?>

                      </select>   
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Keterangan</label>
                      <div class="col-md-8 col-sm-8 ">
                       <textarea class="form-control" name="keterangan_item" placeholder="Keterangan" required></textarea>
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                    <div class="col-md-8 col-sm-8 ">
                      <a style="font-size: 10px">*Tulis - jika tidak dibutuhkan</a>
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
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>

    <script>
      function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }
    </script>

    </script>
	
  </body>
</html>
