<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card">
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
          <select id="prodi" name="prodi_id" data-toggle="select" class="form-control"
            value="<?= $konsultasi->prodi_mahasiswa ?>" disabled required>
            <?php foreach ($prodi as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
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
        placeholder="Jl. Ahmad Yani 15 Jakarta, Indonesia" disabled value="<?= $konsultasi->alamat_mahasiswa ?>"
        required></textarea>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="periode">Periode</label>
          <select id="periode" name="periode_id" data-toggle="select" class="form-control"
            value="<?= $konsultasi->periode_id ?>" disabled required>
            <option value="">Pilih Periode</option>
            <?php foreach ($periode as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->tahun_awal ?>/<?= $row->tahun_akhir ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="dosen">Dosen</label>
          <select id="dosen" name="dosen_id" data-toggle="select" class="form-control"
            value="<?= $konsultasi->dosen_id ?>" disabled required>
            <option value="">Pilih Dosen</option>
            <?php foreach ($dosen as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
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
    <?php elseif (session()->get('role_code') == 'dosen'): ?>
    <div class="form-group">
      <label for="rencana_tindak_lanjut">Rencana Tindak Lanjut</label>
      <textarea class="form-control" id="rencana_tindak_lanjut" name="rencana_tindak_lanjut" rows="5"
        placeholder="Silahkan ketik pesan di sini..." value="<?= session()->get('rencana_tindak_lanjut') ?>"
        required></textarea>
    </div>
    <?php endif ?>
    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url('konsultasi') ?>" class="btn btn-light">Batal</a>
        <div class="button-list float-right">
          <button type="<?= base_url('konsultasi') ?>" class="btn btn-outline-info" data-toggle="modal"
            data-target="#modal-qrcode">QR Code</button>
          <button type="<?= base_url('konsultasi') ?>" class="btn btn-outline-info">File KHS</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
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
          <td><?= $row->rencana_tindak_lanjut ?></td>
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
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div> <!-- // END .modal-footer -->
    </div> <!-- // END .modal-content -->
  </div> <!-- // END .modal-dialog -->
</div>
<?= $this->endSection() ?>