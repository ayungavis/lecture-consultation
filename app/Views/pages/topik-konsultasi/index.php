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
        <h4 class="card-header__title">Buat Topik Konsultasi Baru</h4>
      </div>

      <form class="card-body" method="post" action="<?= base_url('topik-konsultasi/store') ?>">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Kuliah Kerja Nyata" required
            autofocus>
        </div>
        <div class="form-group">
          <label for="code">Kode</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="KKN" required>
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
              <th style="width: 200px;">Kode</th>
              <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="list" id="staff02">
            <?php $number = 1; ?>
            <?php foreach ($topik as $row): ?>
            <tr>
              <td><?= $number; $number++; ?></td>
              <td><?= $row->nama ?></td>
              <td><?= $row->code ?></td>
              <td class="button-list">
                <button type="button" data-id="<?= $row->id ?>" data-nama="<?= $row->nama ?>"
                  data-code="<?= $row->code ?>" class="btn btn-light btn-edit">
                  <i class="material-icons">edit</i>
                </button>
                <a href="<?= base_url('topik-konsultasi/'. $row->id .'/delete') ?>" class="btn btn-danger">
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
  <form id="form-edit" method="post" action="<?= base_url('topik-konsultasi/update') ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-center-title">Edit Topik Konsultasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <!-- // END .modal-header -->
        <div class="modal-body">
          <div class="form-group">
            <label for="edit-nama">Nama</label>
            <input type="text" class="form-control" id="edit-nama" name="nama" placeholder="Kuliah Kerja Nyata" required
              autofocus>
          </div>
          <div class="form-group">
            <label for="edit-code">Kode</label>
            <input type="text" class="form-control" id="edit-code" name="code" placeholder="KKN" required>
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
    const code = $(this).data('code');
    const action = 'topik-konsultasi/' + id + '/update';

    // Set data to Form Edit
    $('#edit-nama').val(nama);
    $('#edit-code').val(code);
    $('#form-edit').attr('action', action);

    // Call Modal Edit
    $('#modal-edit').modal('show');
  });
});
</script>
<?= $this->endSection() ?>