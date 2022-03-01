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
                  <h2>Data Sarana dan Prasarana Masjid </h2>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Sarpras</a></ul>
                   <ul class="nav navbar-right panel_toolbox"><a href="<?=base_url();?>admin/sarpras/cetak" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export PDF</a></ul>
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
                              <th width="5%">No.</th>
                              <th>Nama Item</th>
                              <th>Jumlah</th>
                              <th>Kondisi</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $j = 1; ?>
                          <?php foreach ($sarpras->result_array() as $data_sarpras):
                          ?>
                            <tr>
                            <td align="center"><?php echo $j++ ?></td>
                              <td width="150"><?=$data_sarpras['item'];?></td>
                              <td width="50"><?=$data_sarpras['jumlah_sarpras'];?></td>
                              <td width="100"><?=$data_sarpras['kondisi'];?></td>
                              <td width="200"><?=$data_sarpras['keterangan_sarpras'];?></td>
                              <td width="150" align="center">
                                <a href=""  onclick="editData(event, '<?=$data_sarpras['id_sarpras'];?>', '<?=$data_sarpras['item'];?>','<?=$data_sarpras['jumlah_sarpras'];?>','<?=$data_sarpras['kondisi'];?>','<?=$data_sarpras['keterangan_sarpras'];?>')"><i class="fa fa-edit"></i> Edit</a>
                                <a href="" onclick="deleteConfirm(event,'<?=base_url();?>/admin/sarpras/hapus/<?=$data_sarpras['id_sarpras'];?>')"><i class="fa fa-trash"></i> Hapus</a></td>
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
                <h4 class="modal-title"> Edit Sarpras Masjid</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="<?=base_url();?>/admin/sarpras/edit" method="post">
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Item : </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="hidden" name="id_sarpras" id="id_sarpras" value=""/>
                      <input class="form-control" type="text" name="nama_item" id="nama_item" placeholder="Nama Item" value=""/>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah : </label>
                    <div class='col-md-8 col-sm-8'>
                       <input class="form-control" type="number" name="jumlah_item" id="jumlah_item" placeholder="Jumlah" required/> 
                     </div> 
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Kondisi : </label>
                    <div class='col-md-8 col-sm-8'>
                       <select class="select2_single form-control form-control-sm" name="kondisi_item" id="kondisi_item" tabindex="-1">
                            <?php 
                            if($sarpras->kondisi == "Baik"){ 
                                  echo '<option value="Baik" selected="true">Baik</option>';
                                }else{
                                  echo '<option value="Baik">Baik</option>';
                                }
                              if($sarpras->kondisi == "Buruk"){ 
                                  echo '<option value="Buruk" selected="true">Buruk</option>';
                                }else{
                                  echo '<option value="Buruk">Buruk</option>';
                                }
                              if($sarpras->kondisi == "Baik, buruk"){ 
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
                       <textarea class="form-control" name="keterangan_item" id="keterangan_item" placeholder="Keterangan" required></textarea>
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
                <h4 class="modal-title"> Tambah Sarpras Masjid</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="<?=base_url();?>/admin/sarpras/proses" method="post" enctype="multipart/form-data" >
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
                            if($sarpras->kondisi == "Baik"){ 
                                  echo '<option value="Baik" selected="true">Baik</option>';
                                }else{
                                  echo '<option value="Baik">Baik</option>';
                                }
                              if($sarpras->kondisi == "Buruk"){ 
                                  echo '<option value="Buruk" selected="true">Buruk</option>';
                                }else{
                                  echo '<option value="Buruk">Buruk</option>';
                                }
                              if($sarpras->kondisi == "Baik, buruk"){ 
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
      function deleteConfirm(e,url){
        e.preventDefault();
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }

      function editData(e,id,item,jumlah,kondisi,keterangan){
        e.preventDefault();
        $("#id_sarpras").val(id);
        $("#nama_item").val(item);
        $("#jumlah_item").val(jumlah);
        $("#kondisi_item").val(kondisi);
        $("#keterangan_item").val(keterangan);
        $('#editModal').modal();
      }
    </script>
	
  </body>
</html>