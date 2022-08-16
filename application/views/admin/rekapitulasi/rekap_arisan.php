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

            <div class="card mb-3">
              <div class="card-body">
                <div class="x_title" style="margin-bottom: 30px;">
                  <h2>Rekap Cicilan Arisan Kurban </h2>
                  <div class="clearfix"></div>

                </div>

                <div>
                <form action="" method="post" enctype="multipart/form-data" >
                    
                    <div class="item form-group col-md-12 col-sm-12">
                      <label class="col-form-label col-md-1 col-sm-1 label-align" for="nama_siswa">Tahun : </label>
                      <div class="col-md-2 col-sm-2 ">
                        <div class="form-group">
                          <div class='input-group date' id='myDatepicker3'>
                            <input type='text' class="form-control" placeholder="Tahun" name="tahun" required value="" />
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
                  <h2>Arisan Kurban 2022</h2>
                  <div class="clearfix"></div>

                </div>

                <div class="x_content">
                 <div class="row col-sm-12 col-md-12" style="display: inline-block;" align="center" >
                  <div class="top_tiles" >
                    <div class="col-md-4 col-sm-4  tile">
                      <span>Terbayar</span>
                      <h2>Rp. 10.000.000</h2>
                    </div>
                    <div class="col-md-4 col-sm-4  tile">
                      <span>Belum dibayar</span>
                      <h2>Rp. 50.000.000</h2>
                    </div>
                    <div class="col-md-4 col-sm-4  tile">
                      <span>Target Arisan Kurban</span>
                      <h2>Rp. 60.000.000</h2>
                    </div>

                  </div>
                </div>

              </div>



            </div>

            <div class="card-body">


              <div class="x_content">




                <div id="echart_pieSPP" style="height:450px;"></div>

              </div>



            </div>

          </div> 

          <div class="card mb-3">
            <div class="x_panel">
              <div class="x_title">
                <h2> Data Jamaah Arisan Kurban</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#lunas1" role="tab" aria-controls="home" aria-selected="true">Lunas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#belumlunas1" role="tab" aria-controls="profile" aria-selected="false">Belum Lunas</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="lunas1" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-box table-responsive width">
                     <table class="display table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>No. Telepon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td width=10>1</td>
                            <td>Nama</td>
                            <td>081212121</td>
                            <td align="center">
                              <a href="<?php echo site_url('admin/arisan_kurban/detail') ?>" style="margin-right: 9px" ><i class="fa fa-money"></i> Detail </a>
                            </td>
                          </tr> 
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="belumlunas1" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-box table-responsive">
                     <table class="display table table-striped table-bordered " style="width:100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>No. Telepon</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width=10>1</td>
                            <td>Nama</td>
                            <td>0812121212</td>
                            <td align="center">
                              <a href="<?php echo site_url('admin/arisan_kurban/detail') ?>" style="margin-right: 9px" ><i class="fa fa-money"></i> Detail </a>
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

          <div class="card mb-3">
            <div class="x_panel">
              <div class="x_title">
                <h2> Laporan Lengkap Arisan Kurban 2022</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="card-box table-responsive">
                  <div align="right">
                    <a href="" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                  </div>

                 <table class="table table-striped table-bordered " style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Target (Rp)</th>
                      <th>Terbayar (Rp)</th>
                      <th>Kekurangan (Rp)</th>
                    </tr>

                    <tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width=10>1</td>
                            <td>Nama Saya Panjang Sekali</td>
                          <td align="right">100.000.000</td>
                          <td align="right">40.000.000</td>
                          <td align="right">60.000.000</td>
                      </tr> 
                    </tbody>
                  </table>
                </div>

<br>

              </div>
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


<!-- Modal --> 
<?php $this->load->view("admin/_partials/modal.php") ?>





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



<script type="text/javascript">
  $(document).ready(function(){

    $('#nama_siswa').autocomplete({
      source: "<?php echo site_url('admin/bayar_catering/get_autocomplete');?>",
      select: function (event, ui) {
        $('[name="nama_siswa"]').val(ui.item.label); 
        $('[name="nis"]').val(ui.item.nomor);
        $('[name="kelas"]').val(ui.item.kelas);
        $('[name="biaya_catering"]').val(ui.item.biaya); 
      }
    });

  });
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



    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>
    <script type="text/javascript">

    </script>


    

  </body>
  </html>
