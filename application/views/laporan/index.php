      <div class="content">
        <div class="page-inner">
          <div class="page-header">
            <h4 class="page-title"><?= $title ?></h4>
            <ul class="breadcrumbs">
              <li class="nav-home">
                <a href="<?= base_url() ?>">
                  <i class="flaticon-home"></i>
                </a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="<?= base_url($url) ?>"><?= $title ?></a>
              </li>
            </ul>
            <?= $this->session->flashdata('message');?>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-head-row">
                    <div class="card-title">

                    </div>
                    <div class="card-tools">
                      <a id="export-link" href="<?= base_url('laporan/pdf/').$last_year ?>" class="btn btn-info btn-border btn-round btn-sm">
                        <span class="btn-label">
                          <i class="fa fa-print"></i>
                        </span>
                        Export
                      </a>
                    </div>
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="fa fa-calendar"></i>
                            </span>
                          </div>
                          <select name="tahun" class="form-control" onchange="getLaporan(this.value), addTahun(this.value)">
                            <option value="pilih tahun">Pilih tahun</option>
                            <?php foreach ($tahun as $t) : ?>
                              <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row" id="fromHTMLtestdiv">
                    <div id="laporan" class="col-sm-12 table-responsive">
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

        function addTahun(tahun){
          if (tahun == "pilih tahun") {
            tahun = new Date().getFullYear() - 1;
          }
          document.getElementById('export-link').setAttribute("href", "<?= base_url('laporan/pdf/') ?>" + tahun);
        }
      </script>