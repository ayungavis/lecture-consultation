<?php
setlocale(LC_TIME, 'id_ID.utf8');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>

  <!-- Prevent the demo from appearing in search engines -->
  <meta name="robots" content="noindex">

  <!-- Perfect Scrollbar -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/vendor/perfect-scrollbar.css" rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/app.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/app.rtl.css" rel="stylesheet">

  <!-- Material Design Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-material-icons.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

  <!-- Font Awesome FREE Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-fontawesome-free.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

  <!-- ion Range Slider -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


  <!-- Flatpickr -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

  <!-- Vector Maps -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">
</head>

<body class="layout-default">
  <div class="container">
    <div class="card mt-4">
      <div class="card-header">
        Laporan Konsultasi Mahasiswa
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 text-center">
            <img src="https://purepng.com/public/uploads/medium/google-stadia-logo-ss2.png" width="150" alt="">
            <h3><strong>Jurnal Bimbingan Akademik</strong></h3>
            <h5>Tahun Akademik <?= $konsultasi->tahun_awal ?>/<?= $konsultasi->tahun_akhir ?></h5>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12">
            <table class="table table-borderless mr-auto ml-auto" style="width: 80%;">
              <tbody>
                <tr>
                  <td class="text-muted">Nama Mahasiswa</td>
                  <td><?= $konsultasi->mahasiswa ?></td>
                  <td class="text-muted">NIM</td>
                  <td><?= $konsultasi->nim_mahasiswa ?></td>
                </tr>
                <tr>
                  <td class="text-muted">Program Studi</td>
                  <td><?= $konsultasi->nama_prodi ?></td>
                  <td class="text-muted">Tahun Masuk</td>
                  <td><?= $konsultasi->tahun_masuk ?></td>
                </tr>
                <tr>
                  <td class="text-muted">Alamat</td>
                  <td><?= $konsultasi->alamat_mahasiswa ?></td>
                  <td class="text-muted">No. HP</td>
                  <td><?= $konsultasi->nomor_mahasiswa ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Hari, Tanggal</th>
                  <th scope="col">Topik</th>
                  <th scope="col">Topik Bahasan</th>
                  <th scope="col">Hari, Tanggal</th>
                  <th scope="col">Rencana Tindak Lanjut</th>
                  <th scope="col">TTD Mahasiswa</th>
                </tr>
              </thead>
              <tbody>
                <?php $number = 1; ?>
                <?php foreach ($detail as $row): ?>
                <tr>
                  <td><small class="text-muted text-center"><?= $number; $number++; ?></small></td>
                  <td><small class="text-muted"><?= strftime("%A, %e %B %G", strtotime($row->tanggal_dibuat)) ?></small>
                  </td>
                  <td><?= $row->nama_topik ?></td>
                  <td><?= $row->topik_bahasan ?></td>
                  <td><small
                      class="text-muted"><?= $row->tanggal_dibalas ? strftime("%A, %e %B %G", strtotime($row->tanggal_dibalas)) : 'Belum dibalas' ?></small>
                  </td>
                  <td><?= $row->rencana_tindak_lanjut ? $row->rencana_tindak_lanjut : "Belum dibalas" ?></td>
                  <td></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-6 d-flex align-items-end">
            <img src="<?= base_url('qrcode/'. $konsultasi->qr_code) ?>" width="100" alt="">
          </div>
          <div class="col-md-6 float-right">
            <p>............................., .................................................</p>
            <p>Dosen Penasihat Akademik (DPA)</p>
            <br />
            <br />
            <br />
            <br />
            <strong><?= $konsultasi->dosen ?></strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>