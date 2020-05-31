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
        <h4 class="card-header__title">Buat Program Studi Baru</h4>
      </div>

      <form class="card-body" method="post" action="<?= base_url('program-studi/store') ?>">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Sistem Informasi" required
            autofocus>
        </div>
        <div class="form-group">
          <label for="singkatan">Singkatan</label>
          <input type="text" class="form-control" id="singkatan" name="singkatan" placeholder="SI" required>
        </div>
        <div class="form-group">
          <label for="fakultas">Fakultas</label>
          <select id="fakultas" name="fakultas_id" data-toggle="select" class="form-control" required>
            <?php foreach ($fakultas as $row): ?>
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
              <th style="width: 200px;">Singkatan</th>
              <th>Fakultas</th>
              <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="list" id="staff02">
            <?php $number = 1; ?>
            <?php foreach ($prodi as $row): ?>
            <tr>
              <td><?= $number; $number++; ?></td>
              <td><?= $row->nama ?></td>
              <td><?= $row->singkatan ?></td>
              <td><?= $row->fakultas_nama ?></td>
              <td class="button-list">
                <button type="button" data-id="<?= $row->id ?>" data-nama="<?= $row->nama ?>"
                  data-singkatan="<?= $row->singkatan ?>""
                  data-fakultas_id=" <?= $row->fakultas_id ?>" class="btn btn-light btn-edit">
                  <i class="material-icons">edit</i>
                </button>
                <a href="<?= base_url('program-studi/'. $row->id .'/delete') ?>" class="btn btn-danger">
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
          <h5 class="modal-title" id="modal-center-title">Edit Program Studi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <!-- // END .modal-header -->
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-nama">Nama</label>
            <input type="text" class="form-control" id="edit-nama" name="nama" placeholder="Sistem Informasi" required
              autofocus>
          </div>
          <div class="form-group">
            <label for="edit-singkatan">Singkatan</label>
            <input type="text" class="form-control" id="edit-singkatan" name="singkatan" placeholder="SI" required>
          </div>
          <div class="form-group">
            <label for="edit-fakultas">Fakultas</label>
            <select id="edit-fakultas" name="fakultas_id" data-toggle="select" class="form-control" required>
              <?php foreach ($fakultas as $row): ?>
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
    const nama = $(this).data('nama');
    const singkatan = $(this).data('singkatan');
    const fakultas_id = $(this).data('fakultas_id');
    const action = 'program-studi/' + id + '/update';

    // Set data to Form Edit
    $('#edit-nama').val(nama);
    $('#edit-singkatan').val(singkatan);
    $('#edit-fakultas_id').val(fakultas_id);
    $('#form-edit').attr('action', action);

    // Call Modal Edit
    $('#modal-edit').modal('show');
  });
});
</script>
<?= $this->endSection() ?>