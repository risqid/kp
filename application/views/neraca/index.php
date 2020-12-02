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
                  <div class="d-flex align-items-center">
                    <h4 class="card-title"><?= $subtitle ?></h4>
                    <button class="btn btn-info btn-round ml-auto" data-toggle="modal" data-target="#modalInput">
                      <i class="fa fa-plus"></i>
                        Tambah
                    </button>
                  </div>
                </div>
                <div class="card-body">

                  <!-- modal input -->
                  <div class="modal fade" id="modalInput" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header no-bd justify-content-center">
                          <h4 class="modal-title">Tambah <?= $subtitle ?></h4>
                        </div>
                        <div class="modal-body">
                          <form name="add" action="" method="post" onsubmit="return validateForm()">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label>Tahun</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </span>
                                    </div>
                                    <select name="tahun" class="form-control" onchange="getLabaRugi(this.value), resetAdd()">
                                      <option value="pilih tahun">pilih tahun</option>
                                      <?php foreach ($tahun as $t) : ?>
                                        <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>modal</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="modal" type="text" value="50000000" required autocomplete="off" autofocus="" class="form-control" placeholder="masukkan modal  . . ." onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="modal" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Laba Rugi</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="laba_rugi" type="text" value="0" required autocomplete="off" class="form-control" placeholder="pilih tahun  . . ." onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="laba_rugi" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>kas</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="kas" type="text" value="0" required autocomplete="off" class="form-control" placeholder="masukkan kas . . ." onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="kas" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="total" type="text" value="0" required autocomplete="off" class="form-control" placeholder="masukkan total . . ." onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="total" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-secondary float-right ml-3" onclick="calculateTotal()">Hitung</button>
                            <button type="submit" name="submit" class="btn btn-info float-right" onclick="">Tambah</button>
                          </form>
                        </div>
                        <div class="modal-footer no-bd">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal input end -->

                  <!-- table -->
                  <div class="table-responsive">
                    <table id="multi-filter-select" class="table table-head-bg-info table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Tahun</th>
                          <th>Modal</th>
                          <th>Laba Rugi</th>
                          <th>Kas</th>
                          <th>Total</th>
                          <th style="width: 10%">Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($data as $d) :?>
                        <tr>
                          <td><?= $d['tahun'] ?></td>
                          <td>Rp<?= number_format($d['modal'], 0,',','.')  ?></td>
                          <td>Rp<?= number_format($d['laba_rugi'], 0,',','.')  ?></td>
                          <td>Rp<?= number_format($d['kas'], 0,',','.')  ?></td>
                          <td>Rp<?= number_format($d['total'], 0,',','.')  ?></td>
                          <td>
                            <div class="form-button-action">
                              <a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?= $d['id']?>" data-tahun="<?= $d['tahun']?>" data-modal="<?= $d['modal']?>" data-laba_rugi="<?= $d['laba_rugi']?>" data-kas="<?= $d['kas']?>" data-total="<?= $d['total']?>" onclick="loadEditData(this)">
                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-warning btn-lg" data-original-title="Ubah">
                                  <i class="fa fa-edit"></i>
                                </button>
                              </a>
                              <a href="<?= base_url('neraca/hapus/').$d['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapusnya?')">
                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger" data-original-title="Hapus">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- table end -->

                  <!-- modal edit -->
                  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header no-bd justify-content-center">
                          <h4 class="modal-title">Ubah <?= $subtitle ?></h4>
                        </div>
                        <div class="modal-body">
                          <!-- form's name is important to make loadEditData() function works -->
                          <form name="edit" action="" method="post" onsubmit="return validateFormEdit()">
                            <div class="row">
                              <input type="text" name="id" class="form-control" hidden>
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label>Tahun</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </span>
                                    </div>
                                    <select name="tahun" class="form-control" onchange="getLabaRugiEdit(this.value), resetEdit()">
                                      <option value="pilih tahun">pilih tahun</option>
                                      <?php foreach ($tahun as $t) : ?>
                                        <option value="<?= $t['tahun'] ?>"><?= $t['tahun'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>modal</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="modal" type="text" value="50000000" required autocomplete="off" autofocus="" class="form-control" placeholder="masukkan modal  . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="edittoal" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Laba Rugi</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="laba_rugi" type="text" value="0" required autocomplete="off" class="form-control" placeholder="pilih tahun  . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="editlaba_rugi" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>kas</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="kas" type="text" value="0" required autocomplete="off" class="form-control" placeholder="masukkan kas . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="editkas" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="total" type="text" value="0" required autocomplete="off" class="form-control" placeholder="masukkan total . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="edittotal" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-secondary float-right ml-3" onclick="calculateTotalEdit()">Hitung</button>
                            <button type="submit" name="submit" class="btn btn-info float-right">Ubah</button>
                          </form>
                        </div>
                        <div class="modal-footer no-bd">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal edit end -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        function getLabaRugi(tahun) {
            // membuat objek ajax
            var xhr = new XMLHttpRequest();
            var url = "neraca/get_laba_rugi/";
            // menentukan fungsi handler
            xhr.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (tahun !== "pilih tahun") {
                      document.add.laba_rugi.value = this.responseText;
                    }
                }
            };
            xhr.open("GET", url + tahun, true);
            // mengirim request
            xhr.send();
        }
        function resetAdd() {
            document.add.modal.value = 50000000;
            document.add.laba_rugi.value = 0;
            document.add.kas.value = 0;
            document.add.total.value = 0;
        }
        function calculateTotal() {
            var laba_rugi = parseFloat(document.add.laba_rugi.value);
            if (laba_rugi == 0) {
              return false
            }else{
              var modal = parseFloat(document.add.modal.value);
              var kas = modal + laba_rugi;
              var total = modal + laba_rugi;
              document.add.kas.value = kas;
              document.add.total.value = total;
            }
        }
        function validateInput(el){
            var id = el.getAttribute('name');
            if (isNaN(el.value)) {
                document.getElementById(id).innerHTML = "masukkan angka!"
            }else{
                document.getElementById(id).innerHTML = "";
            }
        }
        function validateForm(){
          var tahun = document.add.tahun.value;
          var modal = document.add.modal.value;
          var laba_rugi = document.add.laba_rugi.value;
          var kas = document.add.kas.value;
          var total = document.add.total.value;
          if ( tahun == "pilih tahun" || modal == 0 || laba_rugi == 0 || kas == 0 || total == 0){
              return false;
          }
        }
        // form edit
        function loadEditData(baris) {
            var id = baris.getAttribute("data-id");
            var tahun = baris.getAttribute("data-tahun");
            var modal = baris.getAttribute("data-modal");
            var laba_rugi = baris.getAttribute("data-laba_rugi");
            var kas = baris.getAttribute("data-kas");
            var total = baris.getAttribute("data-total");
            document.edit.id.value = id;
            document.edit.tahun.value = tahun;
            document.edit.modal.value = modal;
            document.edit.laba_rugi.value = laba_rugi;
            document.edit.kas.value = kas;
            document.edit.total.value = total;
        }
        function getLabaRugiEdit(tahun) {
            // membuat objek ajax
            var xhr = new XMLHttpRequest();
            var url = "neraca/get_laba_rugi/";
            // menentukan fungsi handler
            xhr.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (tahun !== "pilih tahun") {
                      document.edit.laba_rugi.value = this.responseText;
                    }
                }
            };
            xhr.open("GET", url + tahun, true);
            // mengirim request
            xhr.send();
        }
        function resetEdit() {
            document.edit.modal.value = 50000000;
            document.edit.laba_rugi.value = 0;
            document.edit.kas.value = 0;
            document.edit.total.value = 0;
        }
        function calculateTotalEdit() {
            var laba_rugi = parseFloat(document.edit.laba_rugi.value);
            if (laba_rugi == 0) {
              return false
            }else{
              var modal = parseFloat(document.edit.modal.value);
              var kas = modal + laba_rugi;
              var total = modal + laba_rugi;
              document.edit.kas.value = kas;
              document.edit.total.value = total;
            }
        }
        function validateEdit(el){
            var id ="edit" + el.getAttribute('name');
            if (isNaN(el.value)) {
                document.getElementById(id).innerHTML = "masukkan angka!"
            }else{
                document.getElementById(id).innerHTML = "";
            }
        }
        function validateFormEdit(){
          var tahun = document.edit.tahun.value;
          var modal = document.edit.modal.value;
          var laba_rugi = document.edit.laba_rugi.value;
          var kas = document.edit.kas.value;
          var total = document.edit.total.value;
          if ( tahun == "pilih tahun" || total == 0 || kas == 0 || hpp == 0 || laba_rugi == 0 || modal == 0){
              return false;
          }
        }
      </script>