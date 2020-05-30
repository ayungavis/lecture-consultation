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
</head>
<body class="layout-login-centered-boxed">
    <div class="layout-login-centered-boxed__form">
        <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-2 navbar-light">
            <a href="<?php echo base_url(); ?>" class="navbar-brand text-center mb-4 mr-0" style="min-width: 0">
                <span class="ml-2">QR Code</span>
            </a>
        </div>

        <div class="card card-body">

            <?= session()->getFlashdata('message'); ?>

            <form action="" method="post">
                <div class="form-group">
                    <label class="text-label" for="email">Email Address:</label>
                    <div class="input-group input-group-merge">
                        <input id="email" name="email" type="email" required class="form-control form-control-prepended" placeholder="john@doe.com" autofocus>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="far fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-label" for="password">Password:</label>
                    <div class="input-group input-group-merge">
                        <input id="password" name="password" type="password" required class="form-control form-control-prepended" placeholder="Masukkan password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-key"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked id="remember_me" name="remember_me">
                        <label class="custom-control-label" for="remember_me">Ingat saya?</label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Login</button>
                </div>
                <!-- <div class="form-group text-center">
                    <a href="<?php echo base_url() ?>/auth/password/reset">Forgot password?</a> <br>
                </div> -->
            </form>
        </div>
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
</body>

</html>