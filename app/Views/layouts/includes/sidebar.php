<div class="mdk-drawer js-mdk-drawer" id="default-drawer" data-align="start">
  <div class="mdk-drawer__content">
    <div class="sidebar sidebar-dark sidebar-left bg-dark-gray" data-perfect-scrollbar>

      <div class="d-flex align-items-center sidebar-p-a sidebar-account flex-shrink-0">
        <a href="<?= base_url('/') ?>" class="flex d-flex align-items-center text-underline-0">
          <span class="flex d-flex flex-column">
            <span class="sidebar-brand">QR Code</span>
            <small>Dashboard</small>
          </span>
        </a>
      </div>

      <ul class="sidebar-menu">
        <li class="sidebar-menu-item">
          <a class="sidebar-menu-button" href="<?= base_url('/') ?>">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i>
            <span class="sidebar-menu-text">Beranda</span>
          </a>
        </li>

        <li class="sidebar-menu-item">
          <a class="sidebar-menu-button" href="<?= base_url('konsultasi/create') ?>">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">create</i>
            <span class="sidebar-menu-text">Ajukan Konsultasi</span>
          </a>
        </li>

        <li class="sidebar-menu-item">
          <a class="sidebar-menu-button" href="<?= base_url('konsultasi') ?>">
            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">forum</i>
            <span class="sidebar-menu-text">Lihat Konsultasi</span>
          </a>
        </li>
      </ul>

      <?php if (session()->get('role_level') >= 10): ?>
      <div class="sidebar-heading">Administrator</div>
      <div class="sidebar-block p-0">
        <ul class="sidebar-menu mt-0">
          <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="<?= base_url('users') ?>">
              <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>
              <span class="sidebar-menu-text">Pengguna</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="<?= base_url('fakultas') ?>">
              <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_balance</i>
              <span class="sidebar-menu-text">Fakultas</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="<?= base_url('program-studi') ?>">
              <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
              <span class="sidebar-menu-text">Program Studi</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="<?= base_url('topik-konsultasi') ?>">
              <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment</i>
              <span class="sidebar-menu-text">Topik Konsultasi</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a class="sidebar-menu-button" href="<?= base_url('periode') ?>">
              <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">timelapse</i>
              <span class="sidebar-menu-text">Periode</span>
            </a>
          </li>
        </ul>
      </div>
      <?php endif ?>
    </div>
  </div>
</div>