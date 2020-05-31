<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card">

  <?= session()->getFlashdata('message'); ?>

  <div class="card-header card-header-large bg-white">
    <h4 class="card-header__title"><?= $title; ?></h4>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nim">NIM</label>
          <input type="text" class="form-control" id="nim" name="nim" placeholder="123456789"
            value="<?= $konsultasi->nim_mahasiswa ?>" disabled required autofocus>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe"
            value="<?= $konsultasi->mahasiswa ?>" disabled required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="prodi">Program Studi</label>
          <select id="prodi" name="prodi_id" data-toggle="select" class="form-control" disabled required>
            <?php foreach ($prodi as $row): ?>
            <option value="<?= $row->id ?>" <?= $konsultasi->prodi_mahasiswa == $row->id ? "selected" : null ?>>
              <?= $row->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="tahun_masuk">Tahun Masuk</label>
          <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="2019"
            value="<?= $konsultasi->tahun_masuk ?>" disabled required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="nomor_telepon">No. HP</label>
          <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="08123456789"
            value="<?= $konsultasi->nomor_mahasiswa ?>" disabled required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"
        placeholder="Jl. Ahmad Yani 15 Jakarta, Indonesia" disabled
        required><?= $konsultasi->alamat_mahasiswa ?></textarea>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="periode">Periode</label>
          <select id="periode" name="periode_id" data-toggle="select" class="form-control" disabled required>
            <option value="">Pilih Periode</option>
            <?php foreach ($periode as $row): ?>
            <option value="<?= $row->id ?>" <?= $konsultasi->periode_id == $row->id ? "selected" : null ?>>
              <?= $row->tahun_awal ?>/<?= $row->tahun_akhir ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="dosen">Dosen</label>
          <select id="dosen" name="dosen_id" data-toggle="select" class="form-control" disabled required>
            <option value="">Pilih Dosen</option>
            <?php foreach ($dosen as $row): ?>
            <option value="<?= $row->id ?>" <?= $konsultasi->dosen_id == $row->id ? "selected" : null ?>>
              <?= $row->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    <form action="<?= base_url('detail-konsultasi/store') ?>" method="post">
      <?php if (session()->get('role_code') == 'mahasiswa'): ?>
      <div class="form-group">
        <label for="topik">Topik Konsultasi</label>
        <select id="topik" name="topik_id" data-toggle="select" class="form-control" required>
          <option value="">Pilih Topik Konsultasi</option>
          <?php foreach ($topik as $row): ?>
          <option value="<?= $row->id ?>"><?= $row->nama ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="topik_bahasan">Topik Bahasan</label>
        <textarea class="form-control" id="topik_bahasan" name="topik_bahasan" rows="5"
          placeholder="Silahkan ketik bahasan di sini..." value="<?= session()->get('topik_bahasan') ?>"
          required></textarea>
      </div>
      <?php endif ?>
      <div class="row">
        <div class="col-md-12">
          <a href="<?= base_url('konsultasi') ?>" class="btn btn-light">Kembali</a>
          <div class="button-list float-right">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-qrcode">QR
              Code</button>
            <a href="<?= base_url() ?>/uploads/<?= $konsultasi->file_name ?>" class="btn btn-outline-info">File KHS</a>
            <?php if (session()->get('role_code') == 'mahasiswa'): ?>
            <input type="hidden" name="konsultasi_id" value="<?= $konsultasi->id ?>">
            <input type="hidden" name="tanggal_dibuat" value="<?= date('Y-m-d H:i:s') ?>">
            <input type="hidden" name="user_id" value="<?= $konsultasi->dosen_id ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php endif ?>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header card-header-large bg-white">
    <h4 class="card-header__title">Riwayat Konsultasi</h4>
  </div>

  <div class="table-responsive border-bottom" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
    <div class="search-form search-form--light m-3">
      <input type="text" class="form-control search" placeholder="Search">
      <button class="btn" type="button"><i class="material-icons">search</i></button>
    </div>
    <table class="table mb-0 thead-border-top-0">
      <thead>
        <tr>
          <th>No.</th>
          <th>Hari/ Tanggal</th>
          <th>Topik</th>
          <th>Topik Bahasan</th>
          <th>Hari/ Tanggal</th>
          <th>Rencana Tindak Lanjut</th>
        </tr>
      </thead>
      <tbody class="list" id="staff02">
        <?php $number = 1; ?>
        <?php foreach ($detail as $row): ?>
        <tr>
          <td><?= $number; $number++; ?></td>
          <td><span class="text-muted"><?= date("l, d F Y", strtotime($row->tanggal_dibuat)) ?></span></td>
          <td><?= $row->nama_topik ?></td>
          <td><?= $row->topik_bahasan ?></td>
          <td><span
              class="text-muted"><?= $row->tanggal_dibalas ? date("l, d F Y", strtotime($row->tanggal_dibalas)) : 'Belum dibalas' ?></span>
          </td>
          <td><?= $row->rencana_tindak_lanjut ? $row->rencana_tindak_lanjut : "Belum dibalas" ?></td>
          <?php if (session()->get('role_code') == 'dosen' and $row->tanggal_dibalas == null): ?>
          <td>
            <button type="button" data-id="<?= $row->id ?>" data-konsultasi_id="<?= $row->konsultasi_id ?>"
              data-topik_id="<?= $row->topik_id ?>" data-topik_bahasan="<?= $row->topik_bahasan ?>"
              data-tanggal_dibuat="<?= $row->tanggal_dibuat ?>" class="btn btn-light btn-reply">
              <i class="material-icons">reply</i>
            </button>
          </td>
          <?php endif ?>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<div id="modal-qrcode" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-center-title">QR Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- // END .modal-header -->
      <div class="modal-body text-center">
        <img src="<?= base_url(); ?>/qrcode/<?= $konsultasi->qr_code ?>" alt="QR Code">
      </div> <!-- // END .modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
      </div> <!-- // END .modal-footer -->
    </div> <!-- // END .modal-content -->
  </div> <!-- // END .modal-dialog -->
</div>

<div id="modal-reply" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title"
  aria-hidden="true">
  <form id="form-reply" method="post" action="<?= base_url('detail-konsultasi/update') ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-center-title">Balas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <!-- // END .modal-header -->
        <div class="modal-body">
          <div class="form-group">
            <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut</label>
            <textarea class="form-control" id="rencana_tindak_lanjut" name="rencana_tindak_lanjut" rows="5"
              placeholder="Silahkan ketik pesan di sini..." required></textarea>
          </div>
          <input type="hidden" name="konsultasi_id" id="reply-konsultasi_id">
          <input type="hidden" name="topik_id" id="reply-topik_id">
          <input type="hidden" name="topik_bahasan" id="reply-topik_bahasan">
          <input type="hidden" name="tanggal_dibuat" id="reply-tanggal_dibuat">
          <input type="hidden" name="user_id" value="<?= $konsultasi->user_id ?>">
        </div> <!-- // END .modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Balas</button>
        </div> <!-- // END .modal-footer -->
      </div> <!-- // END .modal-content -->
    </div> <!-- // END .modal-dialog -->
  </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra-script') ?>
<script>
$(document).ready(function() {

  // get Edit Product
  $('.btn-reply').on('click', function() {
    // get data from button edit
    const id = $(this).data('id');
    const konsultasi_id = $(this).data('konsultasi_id');
    const topik_id = $(this).data('topik_id');
    const topik_bahasan = $(this).data('topik_bahasan');
    const tanggal_dibuat = $(this).data('tanggal_dibuat');
    const action = '<?= base_url() ?>/detail-konsultasi/' + id + '/update';

    // Set data to Form Edit
    $('#reply-konsultasi_id').val(konsultasi_id);
    $('#reply-topik_id').val(topik_id);
    $('#reply-topik_bahasan').val(topik_bahasan);
    $('#reply-tanggal_dibuat').val(tanggal_dibuat);
    $('#form-reply').attr('action', action);

    // Call Modal Edit
    $('#modal-reply').modal('show');
  });
});
</script>
<?= $this->endSection() ?>