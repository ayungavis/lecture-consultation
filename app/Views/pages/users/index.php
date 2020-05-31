<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-4">

    <?= session()->getFlashdata('message'); ?>

    <?php if (! empty($errors)) : ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $field => $error) : ?>
      <p><?= $error ?></p>
      <?php endforeach ?>
    </div>
    <?php endif ?>

    <div class="card">
      <div class="card-header card-header-large bg-white">
        <h4 class="card-header__title">Buat Pengguna Baru</h4>
      </div>

      <form class="card-body" method="post" action="<?= base_url('users/store') ?>">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe" required autofocus>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="john@doe.com" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"
            required>
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select id="role" name="role_id" data-toggle="select" class="form-control" required>
            <?php foreach ($role as $row): ?>
            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">

      <div class="card-header card-header-large bg-white">
        <h4 class="card-header__title"><?= $title; ?></h4>
      </div>

      <div class="table-responsive border-bottom" data-toggle="lists"
        data-lists-values='["js-lists-values-employee-name"]'>
        <div class="search-form search-form--light m-3">
          <input type="text" class="form-control search" placeholder="Search">
          <button class="btn" type="button"><i class="material-icons">search</i></button>
        </div>
        <table class="table mb-0 thead-border-top-0">
          <thead>
            <tr>
              <th style="width: 50px;">No.</th>
              <th>Nama</th>
              <th style="width: 200px;">Role</th>
              <th style="width: 200px;">Tanggal Dibuat</th>
              <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="list" id="staff02">
            <?php $number = 1; ?>
            <?php foreach ($user as $row): ?>
            <tr>
              <td><?= $number; $number++; ?></td>
              <td>
                <span class="js-lists-values-employee-name"><?= $row->nama ?></span>
              </td>
              <td>
                <?php if ($row->role_code === 'administrator'): ?>
                <span class="badge badge-info"><?= $row->role_nama ?></span>
                <?php elseif ($row->role_code === 'dosen'): ?>
                <span class="badge badge-secondary"><?= $row->role_nama ?></span>
                <?php else: ?>
                <span class="badge badge-primary"><?= $row->role_nama ?></span>
                <?php endif ?>
              </td>
              <td><small class="text-muted"><?= date("d F Y", strtotime($row->created_at)) ?></small></td>
              <td class="button-list">
                <button type="button" data-id="<?= $row->id ?>" data-nim="<?= $row->nim ?>"
                  data-nama="<?= $row->nama ?>" data-email="<?= $row->email ?>" data-alamat="<?= $row->alamat ?>"
                  data-nomor_telepon="<?= $row->nomor_telepon ?>" data-tahun_masuk="<?= $row->tahun_masuk ?>"
                  data-role_id="<?= $row->role_id ?>" data-prodi_id="<?= $row->prodi_id ?>"
                  class="btn btn-light btn-edit">
                  <i class="material-icons">edit</i>
                </button>
                <a href="<?= base_url('users/'. $row->id .'/delete') ?>" class="btn btn-danger">
                  <i class="material-icons">close</i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<div id="modal-edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-center-title"
  aria-hidden="true">
  <form id="form-edit" method="post" action="<?= base_url('users/update') ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-center-title">Edit Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <!-- // END .modal-header -->
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-nim">NIM</label>
            <input type="text" class="form-control" id="edit-nim" name="nim" placeholder="123456789" autofocus>
          </div>
          <div class="form-group">
            <label for="edit-nama">Nama</label>
            <input type="text" class="form-control" id="edit-nama" name="nama" placeholder="John Doe" required>
          </div>
          <div class="form-group">
            <label for="edit-email">Email</label>
            <input type="email" class="form-control" id="edit-email" name="email" placeholder="john@doe.com" required>
          </div>
          <div class="form-group">
            <label for="edit-password">Password</label>
            <input type="password" class="form-control" id="edit-password" name="password"
              placeholder="Masukkan password">
          </div>
          <div class="form-group">
            <label for="edit-role">Role</label>
            <select id="edit-role" name="role_id" data-toggle="select" class="form-control" required>
              <?php foreach ($role as $row): ?>
              <option value="<?= $row->id ?>"><?= $row->nama ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="edit-alamat">Alamat</label>
            <textarea type="text" class="form-control" id="edit-alamat" name="alamat"
              placeholder="Jl. Ahmad Yani 15 Jakarta, Indonesia"></textarea>
          </div>
          <div class="form-group">
            <label for="edit-nomor_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" id="edit-nomor_telepon" name="nomor_telepon"
              placeholder="08123456789">
          </div>
          <div class="form-group">
            <label for="edit-tahun_masuk">Tahun Masuk</label>
            <input type="number" class="form-control" id="edit-tahun_masuk" name="tahun_masuk" placeholder="2019">
          </div>
          <div class="form-group">
            <label for="edit-prodi">Program Studi</label>
            <select id="edit-prodi" name="prodi_id" data-toggle="select" class="form-control select2-hidden-accessible"
              data-select2-id="select01" tabindex="-1" aria-hidden="true">
              <?php foreach ($prodi as $row): ?>
              <option value="<?= $row->id ?>"><?= $row->nama ?></option>
              <?php endforeach; ?>
            </select>
          </div>

        </div> <!-- // END .modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
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
  $('.btn-edit').on('click', function() {
    // get data from button edit
    const id = $(this).data('id');
    const nim = $(this).data('nim');
    const nama = $(this).data('nama');
    const email = $(this).data('email');
    const alamat = $(this).data('alamat');
    const nomor_telepon = $(this).data('nomor_telepon');
    const tahun_masuk = $(this).data('tahun_masuk');
    const role_id = $(this).data('role_id');
    const prodi_id = $(this).data('prodi_id');
    const action = 'users/' + id + '/update';

    // Set data to Form Edit
    $('#edit-nim').val(nim);
    $('#edit-nama').val(nama);
    $('#edit-email').val(email);
    $('#edit-alamat').val(alamat);
    $('#edit-nomor_telepon').val(nomor_telepon);
    $('#edit-tahun_masuk').val(tahun_masuk);
    $('#edit-role_id').val(role_id);
    $('#edit-prodi_id').val(prodi_id);
    $('#form-edit').attr('action', action);

    // Call Modal Edit
    $('#modal-edit').modal('show');
  });
});
</script>
<?= $this->endSection() ?>