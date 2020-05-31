<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="alert alert-soft-info d-flex align-items-center card-margin" role="alert">
  <i class="material-icons mr-3">error_outline</i>
  <div class="text-body">Selamat datang, <strong><?= session()->get('nama'); ?>!</strong></div>
</div>
<?= $this->endSection() ?>