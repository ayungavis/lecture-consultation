<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="card">

  <?= session()->getFlashdata('message'); ?>

  <div class="card-header card-header-large bg-white">
    <h4 class="card-header__title"><?= $title; ?></h4>
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
          <th>Mahasiswa</th>
          <th>Dosen</th>
          <th style="width: 200px;">Periode</th>
          <th style="width: 200px;">Tanggal Diajukan</th>
          <th style="width: 150px;" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="list" id="staff02">
        <?php $number = 1; ?>
        <?php foreach ($konsultasi as $row): ?>
        <tr>
          <td><?= $number; $number++; ?></td>
          <td><?= $row->mahasiswa ?></td>
          <td><?= $row->dosen ?></td>
          <td><?= $row->tahun_awal ?>/<?= $row->tahun_akhir ?></td>
          <td><small class="text-muted"><?= date("d F Y", strtotime($row->updated_at)) ?></small></td>
          <td class="button-list text-center">
            <a href="<?= base_url('konsultasi/'. $row->id) ?>" class="btn btn-light">
              <i class="material-icons">remove_red_eye</i>
            </a>
            <?php if (session()->get('role_level') >= 10): ?>
            <a href="<?= base_url('konsultasi/'. $row->id .'/delete') ?>" class="btn btn-danger">
              <i class="material-icons">close</i>
            </a>
            <?php endif ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>