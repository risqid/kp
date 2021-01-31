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
  <!-- style dark-light togle button -->
  <style type="text/css">
    input#switch {
      height: 0;
      width: 0;
      visibility: hidden;
    }

    label#switchLabel {
      cursor: pointer;
      text-indent: -9999px;
      width: 52px;
      height: 27px;
      background: grey;
      float: right;
      border-radius: 100px;
      position: relative;
    }

    label#switchLabel:after {
      content: '';
      position: absolute;
      top: 3px;
      left: 3px;
      width: 20px;
      height: 20px;
      background: #fff;
      border-radius: 90px;
      -webkit-transition: 0.3s;
      transition: 0.3s;
    }

    input#switch:checked + label#switchLabel {
      background: #3694ff;
    }

    input#switch:checked + label#switchLabel:after {
      left: calc(100% - 5px);
      -webkit-transform: translateX(-100%);
              transform: translateX(-100%);
    }

    label#switchLabel:active:after {
      width: 45px;
    }

    html.transition,
    html.transition *,
    html.transition *:before,
    html.transition *:after {
      -webkit-transition: all 0.75s !important;
      transition: all 0.75s !important;
      -webkit-transition-delay: 0 !important;
              transition-delay: 0 !important;
    }
  </style>
</head>
<body>
  <div class="wrapper">