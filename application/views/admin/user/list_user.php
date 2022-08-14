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
                  <h2>Data User </h2>
                   <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a></ul>
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
                              <th>Nama</th>
                              <th>Telepon</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Role</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $j = 1; ?>
                            <?php foreach ($user_profile->result_array() as $data_user):
                            ?>
                            <tr>
                              <td align="center"><?php echo $j ?></td>
                              <td width="200"><?=$data_user['nama_jamaah'];?></td>
                              <td width="100"><?=$data_user['telepon_jamaah'];?></td>
                              <td width="150"><?=$data_user['username'];?></td>
                              <td width="150"><?=$data_user['password'];?></td>
                              <td width="100"><?=$data_user['role'];?></td>
                              <td width="150" align="center">
                                <a href=""  onclick="editData(event, '<?=$data_user['id_user'];?>', '<?=$data_user['id_jamaah'];?>', '<?=$data_user['nama_jamaah'];?>', '<?=$data_user['telepon_jamaah'];?>','<?=$data_user['username'];?>','<?=$data_user['password'];?>','<?=$data_user['role'];?>')"><i class="fa fa-edit"></i> Edit</a>
                                <a href="" onclick="deleteConfirm(event,'<?=base_url();?>/admin/user/hapus/<?=$data_user['id_user'];?>')"><i class="fa fa-trash"></i> Hapus</a></td>
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
                <h4 class="modal-title"> Edit Data User </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form role="form" action="<?=base_url();?>admin/user/edit" method="post">
                  <div class="form-group col-md-12 col-sm-12">
                    
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama: </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="text" id="nama_jamaah_edit" name="nama_jamaah" placeholder="Nama" />
                      <input type="hidden" name="id_jamaah" id="id_jamaah_edit" value="" />
                      <input type="hidden" name="id_user" id="id_user" value=""/>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Telepon: </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input class="form-control" type="number" id="telepon_jamaah_edit" name="telepon_jamaah" placeholder="Telepon" readonly />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Username : </label>
                    <div class='col-md-8 col-sm-8'>
                       <input class="form-control" type="text" id="username_edit" name="username" placeholder="Username" required/> 
                     </div> 
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Password : </label>
                    <div class='col-md-8 col-sm-8'>
                       <input class="form-control" type="password" id="password_edit" name="password" placeholder="Password" required/>
                     </div>    
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Role : </label>
                    <div class='col-md-8 col-sm-8'>
                       <select class="select2_single form-control form-control-sm" id="role_edit" name="role" tabindex="-1">
                            <?php 
                            if($user->role == "Sekretaris"){ 
                                  echo '<option value="Sekretaris" selected="true">Sekretaris</option>';
                                }else{
                                  echo '<option value="Sekretaris">Sekretaris</option>';
                                }
                            if($user->role == "Bendahara"){ 
                                  echo '<option value="Bendahara" selected="true">Bendahara</option>';
                                }else{
                                  echo '<option value="Bendahara">Bendahara</option>';
                                }
                            if($user->role == "Admin"){ 
                                  echo '<option value="Admin" selected="true">Admin</option>';
                                }else{
                                  echo '<option value="Admin">Admin</option>';
                                }
                            ?>

                      </select>    
                    </div>
                   
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
                <h4 class="modal-title"> Form Tambah User </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="<?=base_url();?>admin/user/proses" method="post" enctype="multipart/form-data" >
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_user">Nama</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" id="nama_jamaah_tambah" name="nama_jamaah" placeholder="Nama" required/>
                        <input type="hidden" id="id_jamaah" name="id_jamaah" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="telepon_user">Telepon</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="number" id="telepon_jamaah" name="telepon_jamaah" placeholder="Telepon" readonly required/>
                      </div>
                    </div>
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" id="username" name="username" placeholder="Username" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password</label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" id="password" name="password" placeholder="Password" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role</label>
                      <div class="col-md-8 col-sm-8 ">
                        <select class="select2_single form-control form-control-sm" id="role" name="role" tabindex="-1">
                            <?php 
                            if($user->role == "Sekretaris"){ 
                                  echo '<option value="Sekretaris" selected="true">Sekretaris</option>';
                                }else{
                                  echo '<option value="Sekretaris">Sekretaris</option>';
                                }
                            if($user->role == "Bendahara"){ 
                                  echo '<option value="Bendahara" selected="true">Bendahara</option>';
                                }else{
                                  echo '<option value="Bendahara">Bendahara</option>';
                                }
                            if($user->role == "Admin"){ 
                                  echo '<option value="Admin" selected="true">Admin</option>';
                                }else{
                                  echo '<option value="Admin">Admin</option>';
                                }
                            ?>

                      </select>   
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
            $( "#nama_jamaah_tambah").autocomplete({
              source: "<?= base_url('admin/user/get_autocomplete/');?>",
              appendTo: "#tambahModal",
              select: function (event,ui){
                console.log(ui.item)
                $( "#id_jamaah").val(ui.item.id_jamaah);
                $( "#telepon_jamaah").val(ui.item.telepon);
              }
            });
            $( "#nama_jamaah_edit").autocomplete({
              source: "<?= base_url('admin/user/get_autocomplete/');?>",
              appendTo: "#editModal",
              select: function (event,ui){
                $( "#id_jamaah_edit").val(ui.item.id_jamaah);
                $( "#telepon_jamaah_edit").val(ui.item.telepon);
              }
            });
        });

      function editData(e,id,id_jamaah,nama,telepon,username,password,role){
        e.preventDefault();
        $("#id_user").val(id);
        $("#id_jamaah_edit").val(id_jamaah);
        $("#nama_jamaah_edit").val(nama);
        $("#telepon_jamaah_edit").val(telepon);
        $("#username_edit").val(username);
        $("#password_edit").val(password);
        $("#role_edit").val(role);

        $('#editModal').modal();
      }
    </script>
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>
	
  </body>
</html>