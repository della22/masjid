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
              <div class="card mb-3">
                <div class="card-body">
                  <form action="<?=base_url();?>/admin/profil_masjid/editProfil" method="post" enctype="multipart/form-data">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>Profil Masjid</h2>
                    <div class="clearfix"></div>
                     
                  </div>

                  <div class="col-md-5 col-sm-5">
                    
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align">Foto : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <img src="<?=base_url('./images/'.$profil['upload_img']);?>" width="100px" class="img-thumbnail">
                      </div>
                    </div>

                    <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Ganti Foto : </label>
                        <div class="col-md-10 col-sm-10">
                            <input type="file"  name="upload_img" class="form-control">
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat_masjid">Alamat : </label>
                      <div class="col-md-10 col-sm-10 ">
                      <textarea class="form-control" id="alamat_masjid" name="alamat_masjid" placeholder="Alamat" required><?=$profil['alamat_profil'];?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                      <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align" for="notelp_masjid">No Telepon : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$profil['telp_profil'];?>" class="form-control" type="text" name="notelp_masjid" placeholder="No. Telp" required/>
                        </div>
                      </div>

                      <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align" for="email_masjid">Email : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$profil['email_profil'];?>" class="form-control" type="text" name="email_masjid" placeholder="Email" required/>
                        </div>
                      </div>

                      <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align" for="norek_masjid">Norek (Bank) : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$profil['norek_profil'];?>" class="form-control" type="text" name="norek_masjid" placeholder="Norek (Bank)" required/>
                        </div>
                      </div>

                      <div class="item form-group">
                      <label class="col-form-label col-md-5 col-sm-5 label-align" for="deskripsi_masjid">Deskripsi : </label>
                      <div class="col-md-9 col-sm-9 ">
                        <textarea class="form-control" id="deskripsi_masjid" name="deskripsi_masjid" placeholder="Deskripsi" required><?=$profil['desk_profil'];?></textarea>
                      </div>
                    </div>
                    
                  </div>
                  <div class="x_title" style="margin-bottom: 10px;">
                  <div class="clearfix"></div>
                  </div>
                  <ul class="nav navbar-right panel_toolbox"><button type="submit" class="btn btn-success">Simpan</button></ul>
                  <ul class="nav navbar-right panel_toolbox"><button type="cancel" class="btn btn-danger">Batal</button></ul>
                </form>
              </div><!-- /card Body-->
                </div>

                <div class="card mb-3">
                <div class="card-body">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>SDM Masjid</h2>
                    <div class="clearfix"></div>
                     
                  </div>

                  <div class="col-md-5 col-sm-5">

                    <div class="item form-group">
                      <label class="col-form-label col-md-4 col-sm-4 label-align" for="foto_masjid">Foto : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <img src="<?=base_url('./images/'.$sdm['upload_img']);?>" width="100px" class="img-thumbnail">
                      </div>
                    </div>

                    <div class="item form-group">
                    <label class="col-form-label col-md-4 col-sm-4 label-align">Ganti Foto : </label>
                        <div class="col-md-9 col-sm-9">
                            <input type="file"  name="upload_img" class="form-control">
                        </div>
                    </div>

                    <div class="item form-group" >
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Jumlah Pengurus : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$sdm['jumlah_pengurus'];?>" class="form-control" type="text" name="jumlah_pengurus" placeholder="Jumlah Pengurus" required/>
                        </div>
                      </div>

                      
                      <div class="item form-group" >
                        <label class="col-form-label col-md-4 col-sm-4 label-align">Jumlah Remaja Masjid : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$sdm['jumlah_remaja_masjid'];?>" class="form-control" type="text" name="jumlah_remaja_masjid" placeholder="Jumlah Remaja Masjid" required/>
                        </div>
                      </div>

                  </div>

                  <div class="col-md-6 col-sm-6">
                  <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Imam Utama : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$sdm['jumlah_imam_utama'];?>" class="form-control" type="text" name="jumlah_pengurus" placeholder="Jumlah Imam Utama" required/>
                        </div>
                      </div>

                      <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Imam Cadangan : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$sdm['jumlah_imam_cadangan'];?>" class="form-control" type="text" name="jumlah_pengurus" placeholder="Jumlah Imam Cadangan" required/>
                        </div>
                      </div>

                      <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Muadzin : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$sdm['jumlah_muadzin'];?>" class="form-control" type="text" name="jumlah_pengurus" placeholder="Jumlah Muadzin" required/>
                        </div>
                      </div>

                      <div class="item form-group" >
                        <label class="col-form-label col-md-5 col-sm-5 label-align">Jumlah Khatib : </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input value="<?=$sdm['jumlah_khatib'];?>" class="form-control" type="text" name="jumlah_pengurus" placeholder="Jumlah Khatib" required/>
                        </div>
                      </div>

                  </div>

                  <div class="x_title" style="margin-bottom: 10px;">
                  <div class="clearfix"></div>
                  </div>
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#save" class="btn btn-success btn-xs"> Simpan</a></ul>
                  <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#cancel" class="btn btn-danger"> Batal</a></ul>

                </div><!-- /card Body-->
                </div>

                <div class="card mb-3">
                <div class="card-body">
                  <div class="x_title" style="margin-bottom: 30px;">
                    <h2>Layanan dan Kontak</h2>
                    <ul class="nav navbar-right panel_toolbox"><a href="#"  data-toggle="modal" data-target="#tambahModal" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Tambah</a></ul>
                    <div class="clearfix"></div>
                  </div>

                      <div class="card-box table-responsive">
                       <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th width="10">No.</th>
                              <th>Jenis Layanan</th>
                              <th>Penanggung Jawab</th>
                              <th>Kontak</th>
                              <th width="150">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $j = 1; ?>
                            <?php foreach ($layanan->result_array() as $data_layanan):
                            ?>
                            <tr>
                              <td align="center"><?php echo $j++ ?></td>
                              <td><?=$data_layanan['nama_layanan'];?></td>
                              <td><?=$data_layanan['pj_layanan'];?></td>
                              <td><?=$data_layanan['kontak_layanan'];?></td>
                              <td align="center">
                                <a href=""  onclick="editLayanan(event, '<?=$data_layanan['id_layanan'];?>', '<?=$data_layanan['nama_layanan'];?>','<?=$data_layanan['pj_layanan'];?>','<?=$data_layanan['kontak_layanan'];?>')"><i class="fa fa-edit"></i> Edit</a>

                                <a href="" onclick="deleteConfirm(event,'<?=base_url();?>/admin/profil_masjid/hapusLayanan/<?=$data_layanan['id_layanan'];?>')"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr>
                            <?php endforeach;?>

                          </tbody>
                        </table>
                      </div>

                </div><!-- /card Body-->
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
<!-- Modal Edit -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> Edit Layanan dan Kontak </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          
          <div class="modal-body">
            <form role="form" action="<?=base_url();?>/admin/profil_masjid/editLayanan" method="post">
              
              <div class="form-group col-md-12 col-sm-12">
              <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_layanan">Nama Layanan : </label>
                    <div class="col-md-8 col-sm-8 ">
                      <input type="hidden" name="id_layanan" id="id_layanan" value=""/>
                        <input class="form-control" type="text" name="nama_layanan" id="nama_layanan" placeholder="Jenis Layanan" required/>
                    </div>
              </div>

              <div class="form-group col-md-12 col-sm-12">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="pj_layanan">Penanggung Jawab : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="pj_layanan" id="pj_layanan"placeholder="Nama" required/>
                      </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="kontak_layanan">Kontak : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="kontak_layanan" id="kontak_layanan"placeholder="No. Telepon" required/>
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

    <!-- Delete -->
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
                <a id="btn-delete" class="btn btn-danger" href="">Hapus</a>
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
                <h4 class="modal-title"> Form Tambah Layanan </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 col-sm-12">  
                    <form action="<?=base_url();?>/admin/profil_masjid/inputLayanan" method="post" enctype="multipart/form-data" >
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenis_layanan">Nama Layanan : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="nama_layanan" id="nama_layanan" placeholder="Nama Layanan" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="pj_layanan">Penanggung Jawab : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="pj_layanan" id="pj_layanan" placeholder="Nama" required/>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="kontak_layanan">Kontak : </label>
                      <div class="col-md-8 col-sm-8 ">
                        <input class="form-control" type="text" name="kontak_layanan" id="kontak_layanan" placeholder="No. Telepon" required/>
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
        </div>   <!-- End Modal -->


    <?php $this->load->view("admin/_partials/modal.php") ?>    

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>

  <script>
      function deleteConfirm(e,url){
        e.preventDefault();
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
      }

      function editLayanan(e,id,nama,pj,kontak){
        e.preventDefault();
        $("#id_layanan").val(id);
        $("#nama_layanan").val(nama);
        $("#pj_layanan").val(pj);
        $("#kontak_layanan").val(kontak);
        $('#editModal').modal();
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

    <!-- Initialize datetimepicker -->
    <script  type="text/javascript">
        $('.myDatepicker2').datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#myDatepicker3').datetimepicker({
            format: 'YYYY'
        });
    </script>


    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>

  </body>
</html>
