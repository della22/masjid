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
          LAPORAN SARANA DAN PRASARANA
          <br>MASJID NURUL IMAN SELINDUNG BARU KOTA PANGKALPINANG
        </span>
      </td>
    </tr>
  </table>

  <hr class="line-title"> 
  <p align="center">
    LAPORAN SARPRAS MASJID<br>
    <b>BULAN FEBRUARI TAHUN 2022</b>
  </p>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th width="5%">No.</th>
        <th>Nama Item</th>
        <th>Jumlah</th>
        <th>Kondisi</th>
        <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php $j = 1; ?>
    <?php foreach ($sarpras->result_array() as $data_sarpras):
    ?>
    <tr>
      <td align="center"><?php echo $j++ ?></td>
      <td><?=$data_sarpras['item'];?></td>
      <td><?=$data_sarpras['jumlah_sarpras'];?></td>
      <td><?=$data_sarpras['kondisi'];?></td>
      <td><?=$data_sarpras['keterangan_sarpras'];?></td>
    </tr>
  <?php endforeach;?>  
  </tbody>
</table>
  <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>

</body>
</html>