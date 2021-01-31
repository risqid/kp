    <div class="main-header">
      <!-- Logo Header -->
      <div id="logo" class="logo-header" data-background-color="white">
        <a href="<?= base_url() ?>" class="logo">
          <img height="50" src="<?= base_url('assets') ?>/img/logo.png" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
            <i class="icon-menu"></i>
          </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="icon-menu"></i>
          </button>
        </div>
      </div>
      <!-- End Logo Header -->

      <!-- Navbar Header -->
      <nav id="navbar" class="navbar navbar-header navbar-expand-lg" data-background-color="white">
        <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
          <div class="toggle-container mr-3">
            <input data-title="<?= $title ?>" type="checkbox" name="theme" id="switch"><label id="switchLabel" for="switch">Toggle</label>
          </div>
            <li class="nav-item">
              <a class="nav-link btn" href="<?= base_url('auth/logout') ?>" onclick="return confirm('apakah anda yakin ingin keluar?')" data-toggle="tooltip" data-original-title="Keluar">
                <span><i class="fas fa-sign-out-alt"></i></span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>