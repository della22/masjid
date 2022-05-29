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
                  <h2>Data Pemasukan </h2>
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#filterModal" class="btn btn-info"><i class="fa fa-filter"></i> Filter</a></ul>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pemasukan</a></ul>
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
                              <th>Nominal(Rp.)</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $j = 1; ?>
                          <?php foreach ($pemasukan->result_array() as $data_pemasukan):
                          ?>
                            <tr>
                              <td align="center"><?php echo $j++ ?></td>
                              <td width="70"><?=$data_pemasukan['tanggal'];?></td>
                              <td width="70"><?=$data_pemasukan['nominal'];?></td>
                              <td width="300"><?=$data_pemasukan['keterangan'];?></td>
                              <td width="150" align="center">
                                <a href=""  onclick="editData(event, '<?=$data_pemasukan['id'];?>', '<?=$data_pemasukan['tanggal'];?>','<?=$data_pemasukan['nominal'];?>','<?=$data_pemasukan['keterangan'];?>','<?=$data_pemasukan['id_rekapitulasi'];?>')"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?=base_url('admin/pemasukan/print');?>/<?=$data_pemasukan['id'];?>" style="margin-right: 9px" target="_blank"><i class="fa fa-print"></i> Print </a>
                                <a href="" onclick="deleteConfirm(event,'<?=base_url();?>/admin/pemasukan/hapus/<?=$data_pemasukan['id'];?>/<?=$data_pemasukan['id_rekapitulasi'];?>')"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr>
                            <?php endforeach;?>
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
                <h4 class="modal-title"> Edit Pemasukan </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="<?=base_url();?>/admin/pemasukan/edit" method="post">

                  <div class="form-group col-md-12 col-sm-12">
                      <label class="col-form-label col-md-4 col-sm-4 label-align">Kategori Pemasukan : </label>
                      <div class='col-md-7 col-sm-7'>
                        <select class="select2_single form-control" name="kategori_pemasukan" tabindex="-1">
                          <option value="Kategori">Kategori </option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                        </select>
                      </div>
                    </div>

                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Tanggal Pemasukan : </label>
                    <div class='col-md-7 col-sm-7'>
                      <div class='input-group date myDatepicker2' >
                        <input type="hidden" name="id_pemasukan" id="id_pemasukan" value=""/>
                        <input type="hidden" name="id_rekapitulasi" id="id_rekapitulasi" value=""/>
                        <input type="text" class="form-control" placeholder="Tanggal " id="tanggal_pemasukan" name="tanggal_pemasukan" required/>
                        <span class="input-group-addon" style="padding-top: 10px">
                        <span class="fa fa-calendar-o"></span>
                      </span>  
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Nominal(Rp.) : </label>
                    <div class='col-md-7 col-sm-7'>
                       <input class="form-control" type="number" id="nominal_pemasukan" name="nominal_pemasukan" placeholder="Nominal" required/>    
                    </div>
                   
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Keterangan : </label>
                    <div class="col-md-7 col-sm-7 ">
                       <textarea class="form-control" id="keterangan_pemasukan" name="keterangan_pemasukan" placeholder="Keterangan" required></textarea>
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

      
        <!-- Tambah Manual Modal -->
        <div class="modal fade" id="tambahModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> Tambah Pemasukan </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="<?=base_url();?>/admin/pemasukan/proses" method="post" enctype="multipart/form-data" >
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="kategori_pemasukan">Kategori Pemasukan</label>
                      <div class='col-md-7 col-sm-7'>
                        <select class="select2_single form-control" name="kategori_pemasukan" tabindex="-1">
                          <option value="Kategori">Kategori </option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="tanggal_pemasukan">Tanggal Pemasukan</label>
                      <div class='col-md-7 col-sm-7'>
                      <div class='input-group date myDatepicker2' >
                        <input type="text" class="form-control" placeholder="Tanggal " name="tanggal_pemasukan" required/>
                        <span class="input-group-addon" style="padding-top: 10px">
                        <span class="fa fa-calendar-o"></span>
                      </span>  
                      </div>
                    </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="nominal_pemasukan">Nominal(Rp.)</label>
                      <div class="col-md-7 col-sm-7 ">
                        <input class="form-control" type="number" name="nominal_pemasukan" placeholder="Nominal" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="keterangan_pemasukan">Keterangan</label>
                      <div class="col-md-7 col-sm-7 ">
                        <textarea class="form-control" name="keterangan_pemasukan" placeholder="Keterangan" required></textarea>
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
              <div class="col-md-6">
                <div class="form-group">
                    <label for="input_from">Dari</label>
                    <div class='input-group date myDatepicker2' >
                          <input type="text" class="form-control" placeholder="Dari " name="filter_mulai_pemasukan" required/>
                          <span class="input-group-addon" style="padding-top: 10px">
                          <span class="fa fa-calendar-o"></span>
                        </span>  
                    </div>
                </div>
              </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="input_to">Sampai</label>
                  <div class='input-group date myDatepicker2' >
                          <input type="text" class="form-control" placeholder="Sampai " name="filter_selesai_pemasukan" required/>
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

    <script>
      function deleteConfirm(e,url){
        e.preventDefault();
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }

      function editData(e,id,tanggal,nominal,keterangan,id_rekapitulasi){
        e.preventDefault();
        $("#id_pemasukan").val(id);
        $("#tanggal_pemasukan").val(tanggal);
        $("#nominal_pemasukan").val(nominal);
        $("#keterangan_pemasukan").val(keterangan);
        $("#id_rekapitulasi").val(id_rekapitulasi);
        $('#editModal').modal();
      }
    </script>

    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo base_url('assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

    <!-- Initialize datetimepicker -->
    <script  type="text/javascript">
       
        
        $('.myDatepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#myDatepicker3').datetimepicker({
            format: 'YYYY'
        });
    </script>
	
  </body>
</html>
