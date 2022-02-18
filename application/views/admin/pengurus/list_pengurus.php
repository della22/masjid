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
        <div class="right_col" role="main" style="min-height: 600px;">
          <div class="row">
          
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Pengurus </h2>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengurus</a></ul>
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
                       <table id="datatable2" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th width="5%">No.</th>
                              <th>Nama</th>
                              <th>Jabatan</th>
                              <th>Telepon</th>
                              <th>Alamat</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $j = 1; ?>
                          <?php foreach ($pengurus->result_array() as $data_pengurus):
                          ?>
                            <tr>
                              <td align="center"><?php echo $j ?></td>
                              <td width="150"><?=$data_pengurus['nama_ustadz'];?></td>
                              <td width="120"><?=$data_pengurus['jabatan_pengurus'];?></td>
                              <td width="70"><?=$data_pengurus['telepon_ustadz'];?></td>
                              <td width="350"><?=$data_pengurus['alamat_ustadz'];?></td>
                              <td width="150" align="center">
                                <a href=""  onclick="editData(event, '<?=$data_pengurus['id_pengurus'];?>', '<?=$data_pengurus['nik_pengurus'];?>', '<?=$data_pengurus['nama_ustadz'];?>', '<?=$data_pengurus['jabatan_pengurus'];?>','<?=$data_pengurus['telepon_ustadz'];?>', '<?=$data_pengurus['alamat_ustadz'];?>')"><i class="fa fa-edit"></i> Edit</a>
                                <a href="" onclick="deleteConfirm(event,'<?=base_url();?>/admin/pengurus/hapus/<?=$data_pengurus['id_pengurus'];?>')"><i class="fa fa-trash"></i> Hapus</a></td>
                              </tr>
                            <?php $j++; ?>
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
                <h4 class="modal-title"> Edit Data Pengurus </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="<?=base_url();?>/admin/pengurus/edit" method="post">
                  <div class="form-group col-md-12 col-sm-12">
                     <input type="hidden" name="id_pengurus" id="id_pengurus" value=""/>
                     <input type="hidden" name="nik" id="nik_pengurus_edit" value=""/>
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama : </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="text" id="nama_pengurus_edit" name="nama_pengurus" placeholder="Nama" value=""/>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan : </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="text" id="jabatan_pengurus_edit"name="jabatan_pengurus" placeholder="Jabatan" value=""/>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Telepon : </label>
                    <div class='col-md-8 col-sm-8'>
                       <input class="form-control" type="text" id="telepon_pengurus_edit" name="telepon_pengurus" placeholder="Telepon" readonly/>    
                    </div>
                   
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat : </label>
                    <div class="col-md-8 col-sm-8 ">
                       <textarea class="form-control" id="alamat_pengurus_edit" name="alamat_pengurus" placeholder="Alamat" readonly></textarea>
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
                <h4 class="modal-title"> Form Tambah Pengurus </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="<?=base_url();?>/admin/pengurus/proses" method="post" enctype="multipart/form-data" >
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pengurus">Nama</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" id="nama_pengurus_tambah" name="nama_pengurus" placeholder="Nama" value="" required/>
                        <input type="hidden" id="pengurus_nik" name="nik" required/>
                      </div>
                    </div>
                    

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="jabatan_pengurus">Jabatan</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="jabatan_pengurus" placeholder="Jabatan" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="telepon_pengurus">Telepon</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" id="telepon_pengurus" type="text" name="telepon_pengurus" placeholder="Telepon" readonly/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_pengurus">Alamat</label>
                      <div class="col-md-8 col-sm-8 ">
                        <textarea class="form-control" id="alamat_pengurus" name="alamat_pengurus" placeholder="Alamat" readonly></textarea>
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
    
    <script src="<?php echo base_url('js/jquery-ui.js') ?>" type="text/javascript"></script>

    <script type="text/javascript">
      function deleteConfirm(e,url){
        e.preventDefault();
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }

      $(document).ready(function(){
        $('#datatable2').dataTable();
            $( "#nama_pengurus_tambah").autocomplete({
              source: "<?= base_url('admin/pengurus/get_autocomplete/');?>",
              appendTo: "#tambahModal",
              select: function (event,ui){
                $( "#telepon_pengurus").val(ui.item.telepon_pengurus);
                $( "#alamat_pengurus").val(ui.item.alamat_pengurus);
                $( "#pengurus_nik").val(ui.item.nik_pengurus);
              }
            });
            $( "#nama_pengurus_edit").autocomplete({
              source: "<?= base_url('admin/pengurus/get_autocomplete/');?>",
              appendTo: "#editModal",
              select: function (event,ui){
                $( "#telepon_pengurus_edit").val(ui.item.telepon_pengurus);
                $( "#alamat_pengurus_edit").val(ui.item.alamat_pengurus);
                $( "#nik_pengurus_edit").val(ui.item.nik_pengurus);
              }
            });
        });

      function editData(e,id,nik,nama,jabatan,telepon,alamat){
        e.preventDefault();
        $("#id_pengurus").val(id);
        $("#nik_pengurus_edit").val(nik);
        $("#nama_pengurus_edit").val(nama);
        $("#jabatan_pengurus_edit").val(jabatan);
        $("#telepon_pengurus_edit").val(telepon);
        $("#alamat_pengurus_edit").val(alamat);

        $('#editModal').modal();
      }
    </script>
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>
    
	
  </body>
</html>
