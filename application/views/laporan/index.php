      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?= $title ?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="#">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#"><?= $title ?></a>
              </li>
            </ul>
            <?= $this->session->flashdata('message');?>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title"><?= $subtitle ?></h4>
                    <div class="form-group ml-auto">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fa fa-calendar"></i>
                          </span>
                        </div>
                        <select name="tahun" class="form-control" onchange="getLaporan(this.value)">
                          <option value="pilih tahun">pilih tahun</option>
                          <?php foreach ($tahun as $t) : ?>
                            <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div id="laporan" class="col-md-12">

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        function getLaporan(tahun) {
            // membuat objek ajax
            var xhr = new XMLHttpRequest();
            var url = "laporan/get_laporan/";
            // menentukan fungsi handler
            xhr.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (tahun !== "pilih tahun") {
                      document.getElementById('laporan').innerHTML = this.responseText;
                    }
                }
            };
            xhr.open("GET", url + tahun, true);
            // mengirim request
            xhr.send();
        }
      </script>