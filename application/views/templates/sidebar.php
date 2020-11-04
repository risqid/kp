    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-info">
            <?php $menu = $this->db->get('menu')->result_array() ?>
            <?php foreach ($menu as $m) :?>
              <?php if ($title == $m['menu']) : ?>
              <li class="nav-item active">
                <a href="<?= $m['url'] ?>">
                  <i class="<?= $m['icon'] ?>"></i>
                  <p><?= $m['menu'] ?></p>
                  <!-- <span class="caret"></span> -->
                </a>
              </li>
              <?php else : ?>
              <li class="nav-item">
                <a href="<?= $m['url'] ?>">
                  <i class="<?= $m['icon'] ?>"></i>
                  <p><?= $m['menu'] ?></p>
                </a>
              </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">