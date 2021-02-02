<div class="container">
  <div class="row" style="height: 100vh">
    <div class="col align-self-center">
      <div class="row justify-content-center">
        <div class="card">
          <div class="card-body">
            <div class="toggle-container">
              <input data-title="<?= $title ?>" type="checkbox" name="theme" id="switch"><label hidden id="switchLabel" for="switch">Toggle</label>
            </div>
            <img class="mb-3" src="<?= base_url('assets') ?>/img/logo.png" alt="logo">
            <form method="post" action="<?= base_url('auth') ?>">
              <div class="form-group">
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <i class="fa fa-user"></i>
                  </span>
                  <input value="teknik" name="username" type="text" class="form-control" autofocus placeholder="Username" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <i class="fas fa-lock"></i>
                  </span>
                  <input value="unwahas" id="myPassword" name="password" type="password" class="form-control" placeholder="Password" required>
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
            <?= $this->session->flashdata('message'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>