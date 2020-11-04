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
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/custom.css">
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
  <script src="<?= base_url('assets') ?>/vendor/jspdf.min.js"></script>

</head>
<body>
  <div class="wrapper">
  <div class="container">
    <div class="row" style="height: 100vh">
      <div class="col align-self-center">
        <div class="row justify-content-center">
          <div class="card">
            <div class="card-body">
              <img class="mb-3" src="<?= base_url('assets') ?>/img/logo.png" alt="logo">
              <form method="post" action="<?= base_url('auth') ?>">
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fa fa-user"></i>
                    </span>
                    <input name="username" type="text" class="form-control" autofocus placeholder="Username" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-icon">
                    <span class="input-icon-addon">
                      <i class="fas fa-lock"></i>
                    </span>
                    <input id="myPassword" name="password" type="password" class="form-control" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-check ml-2">
                  <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" onclick="showPassword()">
                    <span class="form-check-sign">tampilkan password</span>
                  </label>
                </div>
                <button type="submit" name="submit" class="btn btn-info btn-block mt-3">Login</button>
              </form>
              <?= $this->session->flashdata('message');?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    function showPassword() {
      var x = document.getElementById("myPassword");
      if (x.type == "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>
</html>