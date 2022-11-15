<div class="col-md-3 left_col" style="margin-top: 20px">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a class="site_title">
        <img src="<?php echo base_url('images/logomasjid.png') ?>" height="50" width="50" />
        <span style="margin-left: 10px">MENU</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->

    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section" style="margin-top: 20px">
        <?php $role = $this->session->userdata('role'); ?>
        <h3>Sistem Pengelolaan Masjid</h3>
        <div class="title"></div>
        <ul class="nav side-menu">

          <!--  <li><a href="#"  data-toggle="modal" data-target="#uploadrekap"><center><button type="button" class="btn btn-info btn-md">Upload Data</button></center></a></li> -->
          <li><a href="<?php echo site_url('admin/overview') ?>"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
          </li>
          <?php if ($role == 'Bendahara' || $role == 'Admin') : ?>
            <li><a><i class="fa fa-area-chart"></i> Rekapitulasi <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo site_url('admin/rekapitulasi') ?>">Rekapitulasi Bulanan </a></li>
                <li><a href="<?php echo site_url('admin/pemasukan/rekap_masuk') ?>">Rekapitulasi Dana Masuk </a></li>
                <li><a href="<?php echo site_url('admin/pengeluaran/rekap_keluar') ?>">Rekapitulasi Dana Keluar </a></li>
                <li><a href="<?php echo site_url('admin/arisan_kurban/rekap_arisan') ?>">Rekapitulasi Arisan Kurban </a></li>
              </ul>
            </li>
          <?php endif; ?>
          <?php if ($role == 'Sekretaris' || $role == 'Admin') : ?>

            <li><a href="<?php echo site_url('admin/jamaah') ?>"><i class="fa fa-child"></i> Data Jamaah <span class="fa fa-chevron"></span></a>
            </li>
          <?php endif; ?>

          <?php if ($role == 'Bendahara' || $role == 'Admin') : ?>

            <li><a><i class="fa fa-money"></i> Keuangan <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo site_url('admin/pemasukan') ?>">Pemasukan </a></li>
                <li><a href="<?php echo site_url('admin/pengeluaran') ?>">Pengeluaran </a></li>
                <li><a href="<?php echo site_url('admin/arisan_kurban') ?>">Arisan kurban </a></li>
              </ul>
            </li>
          <?php endif; ?>

          <?php if ($role == 'Bendahara' || $role == 'Admin') : ?>

            <li><a><i class="fa fa-edit"></i> Set Kategori <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="<?php echo site_url('admin/pemasukan/kategori_pemasukan') ?>">Kategori Pemasukkan Lain</a></li>
                <li><a href="<?php echo site_url('admin/pengeluaran/kategori_pengeluaran') ?>">Kategori Pengeluaran</a></li>
              </ul>
            </li>
          <?php endif; ?>
          <?php if ($role == 'Sekretaris' || $role == 'Admin') : ?>

            <li><a href="<?php echo site_url('admin/berita_donasi') ?>"><i class="fa fa-newspaper-o"></i> Berita Donasi <span class="fa fa-chevron"></span></a>
            </li>
          <?php endif; ?>

          <?php if ($role == 'Sekretaris' || $role == 'Admin') : ?>

            <li>
              <script src="https://kit.fontawesome.com/1339df6c4b.js" crossorigin="anonymous"></script>
              <a href="<?php echo site_url('admin/profil_masjid') ?>"><i class="fa fa-mosque"></i> Profil Masjid <span class="fa fa-chevron"></span></a>
            </li>
          <?php endif; ?>
          <?php if ($role == 'Admin') : ?>

            <li><a href="<?php echo site_url('admin/user') ?>"><i class="fa fa-user-secret"></i> User Profile <span class="fa fa-chevron"></span></a>
            </li>
          <?php endif; ?>

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