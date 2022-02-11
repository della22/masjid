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
                  <h2>Jadwal Kegiatan </h2>
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#filterModal" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a></ul>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Jadwal</a></ul>
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
                              <th>Tanggal</th>
                              <th>Nama Imam/Khotib</th>
                              <th>Nama Muadzin</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td align="center">1</td>
                              <td width="150">22/01/2022</td>
                              <td width="150">Ust. Abu Bakar</td>
                              <td width="150">Ust. Abu Bakar</td>
                              <td width="100" align="center">
                                <a href="#"  data-toggle="modal" data-target="#editModal" style="margin-right: 10px"><i class="fa fa-edit"></i> Edit</a>
                                <a onclick="deleteConfirm('#')" href="#!" ><i class="fa fa-trash"></i> Hapus</a></td>
                                <tr>
                              <td align="center">2</td>
                              <td width="150">29/01/2022</td>
                              <td width="150">Ust. Abu Bakar</td>
                              <td width="150">Ust. Abu Bakar</td>
                              <td width="100" align="center">
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
                <h4 class="modal-title"> Edit Jadwal Imam/Khotib </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="#" method="post">

                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Tanggal : </label>
                    <div class='col-md-7 col-sm-7'>
                      <div class='input-group date myDatepicker2' >
                        <input type="text" class="form-control" placeholder="Tanggal " name="tanggal_imakho" required/>
                        <span class="input-group-addon" style="padding-top: 10px">
                        <span class="fa fa-calendar-o"></span>
                      </span>  
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Nama Imam/Khotib : </label>
                    <div class='col-md-7 col-sm-7'>
                       <input class="form-control" type="text" name="nama_imakho" placeholder="Nama Imam/Khotib" required/>    
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Nama Muadzin : </label>
                    <div class='col-md-7 col-sm-7'>
                       <input class="form-control" type="text" name="nama_muadzin" placeholder="Nama Muadzin" required/>    
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
                <h4 class="modal-title"> Tambah Jadwal Imam/Khotib </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <div class="col-md-6 col-sm-6" align="center">
                      <a href="#"  data-toggle="modal" data-target="#tambahExcelModal" class="btn btn-success"><i class="fa fa-plus"></i> Upload Excel</a>
                      
                    </div>
                    <div class="col-md-6 col-sm-6" align="center">
                      <a href="#"  data-toggle="modal" data-target="#tambahManualModal" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Manual</a>
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
                <h4 class="modal-title"> Tambah Manual</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="#" method="post" enctype="multipart/form-data" >
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="tanggal_imakho">Tanggal</label>
                      <div class='col-md-7 col-sm-7'>
                      <div class='input-group date myDatepicker2' >
                        <input type="text" class="form-control" placeholder="Tanggal " name="tanggal_imakho" required/>
                        <span class="input-group-addon" style="padding-top: 10px">
                        <span class="fa fa-calendar-o"></span>
                      </span>  
                      </div>
                    </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="nama_imakho">Nama Imam/Khotib</label>
                      <div class="col-md-7 col-sm-7 ">
                        <input class="form-control" type="text" name="nama_imakho" placeholder="Nama Imam/Khotib" required/>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="nama_imakho">Nama Muadzin</label>
                      <div class="col-md-7 col-sm-7 ">
                        <input class="form-control" type="text" name="nama_muadzin" placeholder="Nama Muadzin" required/>
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                    <div class="col-md-8 col-sm-8 ">
                      <a style="font-size: 10px">*Khusus pada hari ied nama muadzin diisi " - "</a>
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
                  <form action="#" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="form-group col-md-12 col-sm-12">
                      <div class="col-md-8 col-sm-8">
                    
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
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
                        <a href="#" class="btn btn-link btn-sm"><i class="fa fa-file-excel"></i> Sample .XLSX</a>
                        <a href="#" class="btn btn-link btn-sm"><i class="fa fa-file-excel"></i> Sample .XLS</a>
                        <a href="#" class="btn btn-link btn-sm" target="_blank" ><i class="fa fa-file-csv"></i> Sample .CSV</a>
                      </div> 
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>

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
                      
              <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Bulan : </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="select2_single form-control" name="bulan" tabindex="-1">
                    <option value="0">Semua Bulan</option>;
                    <option value="01">Januari</option>;
                    <option value="02">Februari</option>;
                    <option value="03">Maret</option>;
                    <option value="04">April</option>;
                    <option value="05">Mei</option>;
                    <option value="06">Juni</option>;
                    <option value="07">Juli</option>;
                    <option value="08">Agustus</option>;
                    <option value="09">September</option>;
                    <option value="10">Oktober</option>;
                    <option value="11">November</option>;
                    <option value="12">Desember</option>;   
                  </select>
                </div>
              </div>

              <div class="form-group col-md-12 col-sm-12">
                <label class="col-form-label col-md-4 col-sm-4 label-align">Tahun : </label>
                <div class="col-md-6 col-sm-6 ">
                  <div class="form-group">
                    <div class='input-group date' id='myDatepicker3'>
                      <input type='text' class="form-control" placeholder="Semua Tahun" name="tahun_jadwal_keg" />
                      <span class="input-group-addon" style="padding-top: 10px">
                              <span class="fa fa-calendar-o"></span>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <br>
              <div class="modal-footer">  
                <button type="submit" class="btn btn-success">Filter</button>
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
