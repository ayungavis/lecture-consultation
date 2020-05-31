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
        <h4 class="card-header__title">Buat Periode Baru</h4>
      </div>

      <form class="card-body" method="post" action="<?= base_url('periode/store') ?>">

        <div class="form-group">
          <label for="tahun_awal">Tahun Awal</label>
          <input type="number" class="form-control" id="tahun_awal" name="tahun_awal" placeholder="2019" required
            autofocus>
        </div>
        <div class="form-group">
          <label for="tahun_akhir">Tahun Akhir</label>
          <input type="number" class="form-control" id="tahun_akhir" name="tahun_akhir" placeholder="2020" required>
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
              <th style="width: 50px;">No</th>
              <th>Tahun Awal</th>
              <th>Tahun Akhir</th>
              <th style="width: 150px;" class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="list" id="staff02">
            <?php $number = 1; ?>
            <?php foreach ($periode as $row): ?>
            <tr>
              <td><?= $number; $number++; ?></td>
              <td><?= $row->tahun_awal; ?></td>
              <td><?= $row->tahun_akhir; ?></td>
              <td class="button-list">
                <button type="button" data-id="<?= $row->id ?>" data-tahun_awal="<?= $row->tahun_awal ?>"
                  data-tahun_akhir="<?= $row->tahun_akhir ?>" class="btn btn-light btn-edit">
                  <i class="material-icons">edit</i>
                </button>
                <a href="<?= base_url('periode/'. $row->id .'/delete') ?>" class="btn btn-danger">
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
  <form id="form-edit" method="post" action="<?= base_url('periode/update') ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-center-title">Edit Periode</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> <!-- // END .modal-header -->
        <div class="modal-body">


          <?php if (! empty($errors)) : ?>
          <div class="alert alert-danger">
            <?php foreach ($errors as $field => $error) : ?>
            <p><?= $error ?></p>
            <?php endforeach ?>
          </div>
          <?php endif ?>

          <div class="form-group">
            <label for="edit-tahun_awal">Tahun Awal</label>
            <input type="number" class="form-control" id="edit-tahun_awal" name="tahun_awal" placeholder="2019" required
              autofocus>
          </div>
          <div class="form-group">
            <label for="edit-tahun_akhir">Tahun Akhir</label>
            <input type="number" class="form-control" id="edit-tahun_akhir" name="tahun_akhir" placeholder="2020"
              required>
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
    const tahun_awal = $(this).data('tahun_awal');
    const tahun_akhir = $(this).data('tahun_akhir');
    const action = 'periode/' + id + '/update';

    // Set data to Form Edit
    $('#edit-tahun_awal').val(tahun_awal);
    $('#edit-tahun_akhir').val(tahun_akhir);
    $('#form-edit').attr('action', action);

    // Call Modal Edit
    $('#modal-edit').modal('show');
    $('.modal-backdrop').modal('hide');
  });
});
</script>
<?= $this->endSection() ?>