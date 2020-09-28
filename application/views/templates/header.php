<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title><?= $title ?></title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="icon" href="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/img/icon.ico" type="image/x-icon"/>

  <!-- Fonts and icons -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {"families":["Lato:300,400,700,900"]},
      custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url('assets') ?>/vendor/atlantis-lite/assets/css/fonts.min.css']},
      active: function() {
        sessionStorage.fonts = true;
      }
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/css/editedbootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/css/atlantis.css">

  <!--   Core JS Files   -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/core/jquery.3.2.1.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/core/popper.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/core/bootstrap.min.js"></script>
  <!-- Bootstrap Notify -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
  <!-- Sweet Alert -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
  <!-- Chart JS -->
  <script src="<?= base_url('assets') ?>/vendor/atlantis-lite/assets/js/plugin/chart.js/chart.min.js"></script>

</head>
<body data-background-color='dark'>
  <div class="wrapper">