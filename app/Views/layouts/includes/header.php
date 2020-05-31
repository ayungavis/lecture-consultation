<?php
use App\Models\NotifikasiModel;

$notifikasiModel = new NotifikasiModel();
$notifikasi = $notifikasiModel->withRelations(session()->get('id'))->getResult();
?>
<!-- Header -->
<div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall"
  data-retarget-mouse-scroll="false">
  <div class="mdk-header__content">

    <div class="navbar navbar-expand-sm navbar-main navbar-dark bg-primary pl-md-0 pr-0" id="navbar" data-primary>
      <div class="container-fluid page__container pr-0">

        <!-- Navbar toggler -->
        <button class="navbar-toggler navbar-toggler-custom  d-lg-none d-flex mr-navbar" type="button"
          data-toggle="sidebar">
          <span class="material-icons icon-14pt">menu</span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample03">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a href="<?= base_url('/') ?>" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Konsultasi</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= base_url('konsultasi/create') ?>">Ajukan Konsultasi</a>
                <a class="dropdown-item" href="<?= base_url('konsultasi') ?>">Lihat Konsultasi</a>
                <?php if (session()->get('role_level') >= 10): ?>
                <a class="dropdown-item" href="<?= base_url('topik-konsultasi') ?>">Topik Konsultasi</a>
                <?php endif ?>
              </div>
            </li>
            <?php if (session()->get('role_level') >= 10): ?>
            <li class="nav-item">
              <a href="<?= base_url('users') ?>" class="nav-link">Pengguna</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('periode') ?>" class="nav-link">Periode</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('fakultas') ?>" class="nav-link">Fakultas</a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('program-studi') ?>" class="nav-link">Program Studi</a>
            </li>
            <?php endif ?>
          </ul>
        </div>

        <form class="ml-auto search-form search-form--light d-none d-sm-flex flex" action="index.html">
          <input type="text" class="form-control" placeholder="Search">
          <button class="btn" type="submit"><i class="material-icons">search</i></button>
        </form>

        <ul class="nav navbar-nav d-none d-md-flex">
          <li class="nav-item dropdown">
            <a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">

              <i
                class="material-icons nav-icon <?php if (!empty($notifikasi)): ?>navbar-notifications-indicator<?php endif ?>">notifications</i>
            </a>
            <div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
              <div class="dropdown-item d-flex align-items-center py-2">
                <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
                <a href="<?= base_url('notifikasi/read/all') ?>" class="text-muted"><small>Clear all</small></a>
              </div>
              <div class="navbar-notifications-menu__content" data-perfect-scrollbar>
                <div class="py-2">
                  <?php if (!empty($notifikasi)): ?>
                  <?php foreach ($notifikasi as $row): ?>
                  <a href="<?= base_url('notifikasi/'. $row->id .'/read?konsultasi_id='. $row->konsultasi_id) ?>"
                    class="btn-read" data-id="<?= $row->id ?>">
                    <div class="dropdown-item d-flex">
                      <div class="mr-3">
                        <div class="avatar avatar-xs">
                          <span class="avatar-title bg-primary rounded-circle"><i
                              class="material-icons icon-16pt">info</i></span>
                        </div>
                      </div>
                      <div class="flex">
                        <?= $row->pesan ?><br>
                        <small class="text-muted"><?= date("d F Y", strtotime($row->created_at)) ?></small>
                      </div>
                    </div>
                    <form id="form-read-<?= $row->id ?>" method="get"
                      action="<?= base_url('notifikasi/'. $row->id .'/read') ?>">
                      <input type="hidden" name="konsultasi_id" value="<?= $row->konsultasi_id ?>">
                    </form>
                  </a>
                  <?php endforeach ?>
                  <?php else: ?>
                  <p class="text-center">Tidak ada notifikasi.</p>
                  <?php endif ?>
                </div>
              </div>
            </div>
          </li>
        </ul>

        <div class="dropdown">
          <a href="#" data-toggle="dropdown" data-caret="false"
            class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar">
            <span class="material-icons">account_circle</span> Profil
          </a>
          <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
            <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

              <span class="mr-3">
                <!-- <img src="assets/images/frontted-logo-blue.svg" width="43" height="43" alt="avatar"> -->
              </span>
              <span class="flex d-flex flex-column">
                <strong class="h5 m-0"><?= session()->get('nama') ?></strong>
                <small class="text-muted text-uppercase"><?= session()->get('role_nama') ?></small>
              </span>

            </div>
            <div class="dropdown-divider"></div>
            <!-- <a class="dropdown-item d-flex align-items-center py-2"
              href="<?= base_url('profil/'. session()->get('id')) ?>">
              <span class="material-icons mr-2">account_circle</span> Edit Account
            </a> -->
            <a class="dropdown-item d-flex align-items-center py-2" href="<?= base_url('auth/logout') ?>">
              <span class="material-icons mr-2">exit_to_app</span> Logout
            </a>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
<!-- // END Header -->

<?= $this->section('extra-scripts') ?>
<script>
$(document).ready(function() {

  // get Edit Product
  $('.btn-read').on('click', function() {
    // get data from button edit
    const id = $(this).data('id');
    $('#form-read-' + id).submit();
  });
});
</script>
<?= $this->endSection() ?>