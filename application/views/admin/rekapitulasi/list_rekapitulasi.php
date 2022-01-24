<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>

  <link rel="stylesheet" href="<?php echo base_url().'css/jquery-ui.css'?>">


</head>

<body class="nav-md" >
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
            <div class="card-body">
              <div class="x_title" style="margin-bottom: 30px;">
                <h2>Rekap Bulanan</h2>
                <div class="clearfix"></div>

              </div>

              <div>
                <form action="#" method="post" enctype="multipart/form-data" >

                  <div class="item form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-1 col-sm-1 label-align" for="nama_siswa">Bulan : </label>
                    <div class="col-md-2 col-sm-2 ">
                      <div class="form-group">
                        <div class='input-group date' id='myDatepicker4'>
                          <input type="text" class="form-control" placeholder="Bulan" name="bulan" required value="01"/>
                          <span class="input-group-addon" style="padding-top: 10px">
                              <span class="fa fa-calendar-o"></span>
                            </span>
                        </div>
                      </div>
                    </div>
                    <label class="col-form-label col-md-1 col-sm-1 label-align" for="nama_siswa">Tahun : </label>
                    <div class="col-md-2 col-sm-2 ">
                      <div class="form-group">
                        <div class='input-group date' id='myDatepicker3'>
                          <input type='text' class="form-control" placeholder="Tahun" name="tahun" required value="2022"/>
                          <span class="input-group-addon" style="padding-top: 10px">
                              <span class="fa fa-calendar-o"></span>
                            </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 col-sm-2 label-align">
                      <button type="submit" class="btn btn-success">Go!</button>

                    </div>


                  </div>
                </form>
              </div>

            </div><!-- /card Body-->

          </div> <!-- /card mb3-->


          <div class="card mb-3">

            <div class="card-body">
              <div class="x_title" >
                <h2 >Rekapitulasi Total Penerimaan & Pengeluaran</h2>
                <div class="clearfix"></div>

              </div>

              <div class="x_content">
               <div class="row col-sm-12 col-md-12" style="display: inline-block;" align="center" >
                <div class="top_tiles" >
                  <div class="col-md-4 col-sm-4  tile">
                    <span>Total Penerimaan </span>
                    <h2>Rp. 300.000</h2>
                  </div>

                </div>
                <div class="top_tiles" >
                  <div class="col-md-4 col-sm-4  tile">
                    <span>Total Pengeluaran </span>
                    <h2>Rp. 60.000</h2>
                  </div>

                </div>
                <div class="top_tiles" >
                  <div class="col-md-4 col-sm-4  tile">
                    <span>Saldo Bulan Januari 2022 </span>
                    <h2>Rp. 240.000</h2>
                  </div>

                </div>
              </div>

            </div>
          </div>

          <div class="card-body">
            <div class="x_title" >
              <div class="clearfix"></div>
            </div>
            <div align="right">
                  <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                </div>
          </div>


          <div class="x_content">
            <div class="col-sm-12 col-md-12" align="center" >
              <div class="card-box table-responsive">
                

                <table id="tes" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr bgcolor="C0C0C0" align="center">
                      <th width="70px">NO</th>
                      <th width="100px">TANGGAL</th>
                      <th>KETERANGAN</th>
                      <th width="170px">DEBET(Rp.)</th>
                      <th width="170px">KREDIT(Rp.)</th>
                    </tr>            
                  </thead>
                  <tbody>
                      <tr>
                        <td align="center">1</td>
                        <td align="center">22/01/2022</td>
                        <td>KETERANGAN</td>
                        <td align="right" style="padding-right: 40px">Rp. 200.000</td>
                        <td align="right" style="padding-right: 40px"></td>
                      </tr> 

                      <tr>
                        <td align="center">2</td>
                        <td align="center">23/01/2022</td>
                        <td>KETERANGAN</td>
                        <td align="right" style="padding-right: 40px">Rp. 100.000</td>
                        <td align="right" style="padding-right: 40px"></td>
                      </tr> 
                      <tr>
                        <td align="center">3</td>
                        <td align="center">24/01/2022</td>
                        <td>KETERANGAN</td>
                        <td align="right" style="padding-right: 40px"></td>
                        <td align="right" style="padding-right: 40px">Rp. 10.000</td>
                      </tr> 
                      <tr>
                        <td align="center">4</td>
                        <td align="center">25/01/2022</td>
                        <td>KETERANGAN</td>
                        <td align="right" style="padding-right: 40px"></td>
                        <td align="right" style="padding-right: 40px">Rp. 50.000</td>
                      </tr> 
                    
                    <tr bgcolor="C0C0C0">
                      <th colspan="3" style="text-align: center;">TOTAL</th>
                        <th style="text-align: right; padding-right: 40px">Rp. 300.000</th>
                        <th style="text-align: right; padding-right: 40px"> Rp. 60.000</th>
                    </tr>

                    <tr bgcolor="E59866">
                      <th colspan="4" style="text-align: center;">SALDO BULAN JANUARI 2022</th>
                        <th style="text-align: right; padding-right: 40px"> Rp. 240.000</th>
                    </tr>

                    </tbody>
                  </table>
                </div>
                
                
                
              </div>
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
<?php $this->load->view("admin/_partials/modal.php") ?>



<!-- jQuery -->
<script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>

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
<script type="text/javascript">
  $(document).ready(function() {
    $('table.display').DataTable();
  } );


</script>

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
    <script src="<?php echo base_url('assets/echarts/dist/echarts.min.js') ?>"></script>

    <!-- Initialize datetimepicker -->
    <script  type="text/javascript">
      $('.myDatepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
      });

      $('#myDatepicker3').datetimepicker({
        format: 'YYYY'
      });

      $('#myDatepicker4').datetimepicker({
        format: 'MM'
      });
    </script>

    <!-- PNotify -->
    <script src="<?php echo base_url('assets/pnotify/dist/pnotify.js') ?>"></script>
    <script src="<?php echo base_url('assets/pnotify/dist/pnotify.buttons.js') ?>"></script>
    <script src="<?php echo base_url('assets/pnotify/dist/pnotify.nonblock.js') ?>"></script>



    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>
    


    

  </body>
  </html>