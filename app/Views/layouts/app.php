<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>

  <!-- Prevent the demo from appearing in search engines -->
  <meta name="robots" content="noindex">

  <!-- Perfect Scrollbar -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/vendor/perfect-scrollbar.css" rel="stylesheet">

  <!-- App CSS -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/app.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/app.rtl.css" rel="stylesheet">

  <!-- Material Design Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-material-icons.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-material-icons.rtl.css" rel="stylesheet">

  <!-- Font Awesome FREE Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-fontawesome-free.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-fontawesome-free.rtl.css" rel="stylesheet">

  <!-- ion Range Slider -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-ion-rangeslider.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-ion-rangeslider.rtl.css" rel="stylesheet">


  <!-- Flatpickr -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>/assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

  <!-- Vector Maps -->
  <link type="text/css" href="<?php echo base_url(); ?>/assets/vendor/jqvmap/jqvmap.min.css" rel="stylesheet">
</head>

<body class="layout-default">
  <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
    <div class="mdk-drawer-layout__content">

      <!-- Header Layout -->
      <div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>

        <?= $this->include('layouts/includes/header'); ?>

        <!-- Header Layout Content -->
        <div
          class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page"
          style="padding-top: 60px;">
          <div class="container-fluid page__container">

            <?= $this->renderSection('content') ?>

          </div>
          <!-- // END header-layout__content -->

        </div>
        <!-- // END header-layout -->

      </div>
      <!-- // END drawer-layout__content -->

      <div class="mdk-drawer js-mdk-drawer" id="default-drawer" data-align="start">
        <div class="mdk-drawer__content">
          <div class="sidebar sidebar-dark sidebar-left bg-dark-gray" data-perfect-scrollbar>

            <div class="d-flex align-items-center sidebar-p-a sidebar-account flex-shrink-0">
              <a href="index.html" class="flex d-flex align-items-center text-underline-0">
                <span class="flex d-flex flex-column">
                  <span class="sidebar-brand">QR Code</span>
                  <small>Dashboard</small>
                </span>
              </a>
            </div>

            <ul class="sidebar-menu">
              <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="index.html">
                  <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dashboard</i>
                  <span class="sidebar-menu-text">Beranda</span>
                </a>
              </li>

              <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="index.html">
                  <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">forum</i>
                  <span class="sidebar-menu-text">Konsultasi</span>
                </a>
              </li>
            </ul>

            <div class="sidebar-heading">Administrator</div>
            <div class="sidebar-block p-0">
              <ul class="sidebar-menu mt-0">
                <li class="sidebar-menu-item active">
                  <a class="sidebar-menu-button" href="student-dashboard.html">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>
                    <span class="sidebar-menu-text">Mahasiswa</span>
                  </a>
                </li>
                <li class="sidebar-menu-item">
                  <a class="sidebar-menu-button" href="student-courses.html">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i>
                    <span class="sidebar-menu-text">Dosen</span>
                  </a>
                </li>
                <li class="sidebar-menu-item">
                  <a class="sidebar-menu-button" href="student-course-purchase.html">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">account_balance</i>
                    <span class="sidebar-menu-text">Fakultas</span>
                  </a>
                </li>
                <li class="sidebar-menu-item">
                  <a class="sidebar-menu-button" href="student-lessons.html">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                    <span class="sidebar-menu-text">Program Studi</span>
                  </a>
                </li>
                <li class="sidebar-menu-item">
                  <a class="sidebar-menu-button" href="student-quiz.html">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment</i>
                    <span class="sidebar-menu-text">Topik Konsultasi</span>
                  </a>
                </li>
                <li class="sidebar-menu-item">
                  <a class="sidebar-menu-button" href="student-discussions.html">
                    <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">timelapse</i>
                    <span class="sidebar-menu-text">Tahun Akademik</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- // END drawer-layout -->

    <!-- App Settings FAB -->
    <div id="app-settings">
      <app-settings layout-active="default" :layout-location="{
      'default': 'student-dashboard.html',
      'fixed': 'fixed-student-dashboard.html',
      'fluid': 'fluid-student-dashboard.html',
      'mini': 'mini-student-dashboard.html'
    }"></app-settings>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>/assets/vendor/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap.min.js"></script>

    <!-- Perfect Scrollbar -->
    <script src="<?php echo base_url(); ?>/assets/vendor/perfect-scrollbar.min.js"></script>

    <!-- DOM Factory -->
    <script src="<?php echo base_url(); ?>/assets/vendor/dom-factory.js"></script>

    <!-- MDK -->
    <script src="<?php echo base_url(); ?>/assets/vendor/material-design-kit.js"></script>

    <!-- Range Slider -->
    <script src="<?php echo base_url(); ?>/assets/vendor/ion.rangeSlider.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/ion-rangeslider.js"></script>

    <!-- App -->
    <script src="<?php echo base_url(); ?>/assets/js/toggle-check-all.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/check-selected-row.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/dropdown.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/sidebar-mini.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/app.js"></script>

    <!-- App Settings (safe to remove) -->
    <script src="<?php echo base_url(); ?>/assets/js/app-settings.js"></script>

    <!-- Flatpickr -->
    <script src="<?php echo base_url(); ?>/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/flatpickr.js"></script>

</body>

</html>