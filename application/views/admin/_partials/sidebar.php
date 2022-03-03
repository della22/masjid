<div class="col-md-3 left_col" style="margin-top: 20px">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a class="site_title">
        <img src="<?php echo base_url('images/logo.png') ?>" height="50" width="50"  /> 
        <span style="margin-left: 10px">MENU</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->

    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section" style="margin-top: 20px">
        
        <h3>Sistem Pengelolaan Masjid</h3>
        <div class="title"></div>
        <ul class="nav side-menu">

               <!--  <li><a href="#"  data-toggle="modal" data-target="#uploadrekap"><center><button type="button" class="btn btn-info btn-md">Upload Data</button></center></a></li> -->
                <li><a href="<?php echo site_url('admin/overview') ?>"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                </li>

                <li><a href="<?php echo site_url('admin/ustadz') ?>"><i class="fa fa-child"></i> Data Ustadz <span class="fa fa-chevron"></span></a>
                </li>

                
                <li><a><i class="fa fa-money"></i> Keuangan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('admin/pemasukan') ?>">Pemasukan </a></li>
                    <li><a href="<?php echo site_url('admin/pengeluaran') ?>">Pengeluaran </a></li>
                    <li><a href="<?php echo site_url('admin/rekapitulasi') ?>">Rekapitulasi Keuangan </a></li>
                  </ul>
                </li>

                <li><a><i class="fa fa-calendar"></i> Jadwal <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo site_url('admin/jadwal_imakho') ?>">Jadwal Imam / Khotib </a></li>
                    <li><a href="<?php echo site_url('admin/jadwal_keg') ?>">Jadwal Kegiatan </a></li>
                  </ul>
                </li>

                <li><a href="<?php echo site_url('admin/sarpras') ?>"><i class="fa fa-cube"></i> Sarpras Masjid <span class="fa fa-chevron"></span></a>
                </li>

                <li><a href="<?php echo site_url('admin/pengurus') ?>"><i class="fa fa-users"></i> Pengurus Masjid <span class="fa fa-chevron"></span></a>
                </li>

                <li><a href="<?php echo site_url('admin/user') ?>"><i class="fa fa-user-secret"></i> User Profile <span class="fa fa-chevron"></span></a>
                </li>
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= site_url('login/logout') ?>" style="width: 100%;">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
</div>