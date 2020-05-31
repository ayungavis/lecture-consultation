<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card">
  <div class="card-header card-header-large bg-white">
    <h4 class="card-header__title"><?= $title; ?></h4>
  </div>

  <form class="card-body" enctype="multipart/form-data" action="<?= base_url('konsultasi/store') ?>" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="nim">NIM</label>
          <input type="text" class="form-control" id="nim" name="nim" placeholder="123456789" value="<?= $user->nim ?>"
            required autofocus>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe"
            value="<?= $user->nama ?>" disabled required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="prodi">Program Studi</label>
          <select id="prodi" name="prodi_id" data-toggle="select" class="form-control" required>
            <?php foreach ($prodi as $row): ?>
            <option value="<?= $row->id ?>" <?= $user->prodi_id == $row->id ? "selected" : null ?>><?= $row->nama ?>
            </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="tahun_masuk">Tahun Masuk</label>
          <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="2019"
            value="<?= $user->tahun_masuk ?>" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="nomor_telepon">No. HP</label>
          <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="08123456789"
            value="<?= $user->nomor_telepon ?>" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea class="form-control" id="alamat" name="alamat" rows="3"
        placeholder="Jl. Ahmad Yani 15 Jakarta, Indonesia" required><?= $user->alamat ?></textarea>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="periode">Periode</label>
          <select id="periode" name="periode_id" data-toggle="select" class="form-control" required>
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
          <select id="dosen" name="dosen_id" data-toggle="select" class="form-control" required>
            <option value="">Pilih Dosen</option>
            <?php foreach ($dosen as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
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
        placeholder="Silahkan ketik bahasan di sini..." required></textarea>
    </div>
    <div class="form-group">
      <label for="file">File KHS</label>
      <input type="file" class="form-control" id="file" name="file" required>
    </div>
    <div class="row">
      <div class="col-md-12">
        <a href="<?= base_url('konsultasi') ?>" class="btn btn-light">Batal</a>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
      </div>
    </div>

  </form>
</div>
</div>
<?= $this->endSection() ?>