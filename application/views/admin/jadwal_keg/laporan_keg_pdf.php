<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan</title>
  <link rel="stylesheet" href="">
  <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>
  <img src="<?= base_url('/images/logo.png')?>" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          LAPORAN JADWAL KEGIATAN
          <br>MASJID NURUL IMAN SELINDUNG BARU KOTA PANGKALPINANG
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p align="center">
    LAPORAN JADWAL KEGIATAN MASJID<br>
    <b><?=$judul_pdf;?></b>
  </p>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th width="5%">No.</th>
        <th>Nama Kegiatan</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Tempat</th>
        <th>Pengisi Kegiatan</th>
    </tr>
  </thead>
  <tbody>
    <?php $j = 1; ?>
    <?php foreach ($jadwal_keg->result_array() as $data_keg):
    ?>
    <tr>
      <td align="center"><?php echo $j++ ?></td>
      <td><?=$data_keg['nama_keg'];?></td>
      <td><?=$data_keg['tanggal_keg'];?></td>
      <td><?=$data_keg['waktu_keg'];?></td>
      <td><?=$data_keg['tempat_keg'];?></td>
      <td><?=$data_keg['tanggal_keg'];?></td>
    </tr>
  <?php endforeach;?> 
  </tbody>
</table>
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>

</body>
</html>