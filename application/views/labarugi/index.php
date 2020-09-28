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
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalInput">
                      <i class="fa fa-plus"></i>
                        Tambah Data
                    </button>
                  </div>
                </div>
                <div class="card-body">

                  <!-- modal input -->
                  <div class="modal fade" id="modalInput" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content bg-dark2">
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
                                    <select name="tahun" class="form-control" data-form="add" onchange="getPenjualan(this.value), getBiayaLain(this.value), resetAdd()">
                                      <option value="pilih tahun">pilih tahun</option>
                                      <?php foreach ($tahun_pajak as $tp) : ?>
                                        <option value="<?= $tp['tahun'] ?>"><?= $tp['tahun'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Penjualan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="penjualan" type="text" required autofocus autocomplete="off" class="form-control" placeholder="pilih tahun  . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="penjualan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Bahan Baku</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="bahan_baku" type="text" required autocomplete="off" class="form-control" placeholder="masukkan bahan baku  . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="bahan_baku" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>TKTL</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="tktl" type="text" required autocomplete="off" class="form-control" placeholder="masukkan tktl . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="tktl" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>HPP</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="hpp" type="text" required autocomplete="off" class="form-control" placeholder="masukkan hpp . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="hpp" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Biaya Lain</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="biaya_lain" type="text" required autocomplete="off" class="form-control" placeholder="pilih tahun . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="biaya_lain" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="total" type="text" required autocomplete="off" class="form-control" placeholder="masukkan total . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="total" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-secondary float-right ml-3" onclick="calculateTotal()">Hitung</button>
                            <button type="submit" name="submit" class="btn btn-primary float-right" onclick="">Tambah</button>
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
                    <table id="multi-filter-select" class="display table table-striped table-hover" >
                      <thead>
                        <tr>
                          <th>Tahun</th>
                          <th>Penjualan</th>
                          <th>Bahan Baku</th>
                          <th>TKTL</th>
                          <th>HPP</th>
                          <th>Biaya Lain</th>
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
                          <td><?= $d['penjualan'] ?></td>
                          <td><?= $d['bahan_baku'] ?></td>
                          <td><?= $d['tktl'] ?></td>
                          <td><?= $d['hpp'] ?></td>
                          <td><?= $d['biaya_lain'] ?></td>
                          <td><?= $d['total'] ?></td>
                          <td>
                            <div class="form-button-action">
                              <a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?= $d['id']?>" data-tahun="<?= $d['tahun']?>" data-penjualan="<?= $d['penjualan']?>" data-bahan_baku="<?= $d['bahan_baku']?>" data-tktl="<?= $d['tktl']?>" data-hpp="<?= $d['hpp']?>" data-biaya_lain="<?= $d['biaya_lain']?>" data-total="<?= $d['total']?>" onclick="loadEditData(this)">
                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-warning btn-lg" data-original-title="Ubah">
                                  <i class="fa fa-edit"></i>
                                </button>
                              </a>
                              <a href="<?= base_url('labarugi/hapus/').$d['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapusnya?')">
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
                      <div class="modal-content bg-dark2">
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
                                    <select name="tahun" class="form-control" onchange="getPenjualanEdit(this.value), getBiayaLainEdit(this.value), resetEdit()">
                                      <option value="pilih tahun">pilih tahun</option>
                                      <?php foreach ($tahun_pajak as $tp) : ?>
                                        <option value="<?= $tp['tahun'] ?>"><?= $tp['tahun'] ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Penjualan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="penjualan" type="text" required autocomplete="off" autofocus="" class="form-control" placeholder="masukkan penjualan  . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="editpenjualan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Bahan Baku</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="bahan_baku" type="text" required autocomplete="off" class="form-control" placeholder="masukkan bahan_baku  . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="editbahan_baku" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>TKTL</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="tktl" type="text" required autocomplete="off" class="form-control" placeholder="masukkan tktl . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="edittktl" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>HPP</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="hpp" type="text" required autocomplete="off" class="form-control" placeholder="masukkan hpp . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="edithpp" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Biaya Lain</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="biaya_lain" type="text" required autocomplete="off" class="form-control" placeholder="masukkan biaya_lain . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="editbiaya_lain" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="total" type="text" required autocomplete="off" class="form-control" placeholder="masukkan total . . ." onkeyup="calculateTotalEdit(), validateEdit(this)">
                                  </div>
                                  <small id="edittotal" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-secondary float-right ml-3" onclick="calculateTotalEdit()">Hitung</button>
                            <button type="submit" name="submit" class="btn btn-primary float-right">Ubah</button>
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
        function getPenjualan(tahun) {
            // membuat objek ajax
            var penjualan = new XMLHttpRequest();
            var url = 'labarugi/get_penjualan/';
            // menentukan fungsi handler
            penjualan.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                  if (tahun !== "pilih tahun") {
                    document.add.penjualan.value = this.responseText;
                  }
                }
            };
            penjualan.open("GET", url + tahun, true);
            // mengirim request
            penjualan.send();
        }
        function getBiayaLain(tahun) {
            // membuat objek ajax
            var biayaLain = new XMLHttpRequest();
            var url = "labarugi/get_biaya_lain/";
            // menentukan fungsi handler
            biayaLain.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                  if (tahun !== "pilih tahun") {
                    if (this.responseText > 0) {
                      document.add.biaya_lain.value = this.responseText;                      
                    }else{
                      document.add.biaya_lain.value = 0;
                    }
                  }
                }
            };
            biayaLain.open("GET", url + tahun, true);
            // mengirim request
            biayaLain.send();
        }
        function resetAdd() {
            document.add.penjualan.value = 0;
            document.add.biaya_lain.value = 0;
            document.add.bahan_baku.value = 0;
            document.add.tktl.value = 0;
            document.add.hpp.value = 0;
            document.add.total.value = 0;
        }
        function calculateTotal() {
            var penjualan = document.add.penjualan.value;
            var biaya_lain = document.add.biaya_lain.value;
            if (penjualan == 0 || biaya_lain == 0) {
              return false
            }else{
              var bahanBaku = penjualan * 0.8;
              var tktl = bahanBaku + 24000000;
              var hpp = penjualan - tktl;
              var total = hpp - biaya_lain;
              document.add.bahan_baku.value = bahanBaku;
              document.add.tktl.value = tktl;
              document.add.hpp.value = hpp;
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
          var total = document.add.total.value;
          var tktl = document.add.tktl.value;
          var hpp = document.add.hpp.value;
          var bahan_baku = document.add.bahan_baku.value;
          var penjualan = document.add.penjualan.value;
          if ( tahun == "pilih tahun" || total == 0 || tktl == 0 || hpp == 0 || bahan_baku == 0 || penjualan == 0){
              return false;
          }
        }

        // form edit
        function loadEditData(baris) {
            var id = baris.getAttribute("data-id");
            var tahun = baris.getAttribute("data-tahun");
            var penjualan = baris.getAttribute("data-penjualan");
            var bahan_baku = baris.getAttribute("data-bahan_baku");
            var tktl = baris.getAttribute("data-tktl");
            var hpp = baris.getAttribute("data-hpp");
            var biaya_lain = baris.getAttribute("data-biaya_lain");
            var total = baris.getAttribute("data-total");
            document.edit.id.value = id;
            document.edit.tahun.value = tahun;
            document.edit.penjualan.value = penjualan;
            document.edit.bahan_baku.value = bahan_baku;
            document.edit.tktl.value = tktl;
            document.edit.hpp.value = hpp;
            document.edit.biaya_lain.value = biaya_lain;
            document.edit.total.value = total;
        }
        function getPenjualanEdit(tahun) {
            // membuat objek ajax
            var xhr = new XMLHttpRequest();
            var url = 'labarugi/get_penjualan/';
            // menentukan fungsi handler
            xhr.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                  if (tahun !== "pilih tahun") {
                    document.edit.penjualan.value = this.responseText;
                  }
                }
            };
            xhr.open("GET", url + tahun, true);
            // mengirim request
            xhr.send();
        }
        function getBiayaLainEdit(tahun) {
            // membuat objek ajax
            var xhr = new XMLHttpRequest();
            var url = "labarugi/get_biaya_lain/";
            // menentukan fungsi handler
            xhr.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                  if (tahun !== "pilih tahun") {
                    if (this.responseText > 0) {
                      document.edit.biaya_lain.value = this.responseText;                      
                    }else{
                      document.edit.biaya_lain.value = 0;
                    }

                  }
                }
            };
            xhr.open("GET", url + tahun, true);
            // mengirim request
            xhr.send();
        }
        function resetEdit() {
            document.edit.penjualan.value = 0;
            document.edit.biaya_lain.value = 0;
            document.edit.bahan_baku.value = 0;
            document.edit.tktl.value = 0;
            document.edit.hpp.value = 0;
            document.edit.total.value = 0;
        }
        function calculateTotalEdit() {
            var penjualan = document.edit.penjualan.value;
            var biaya_lain = document.edit.biaya_lain.value;
            if (penjualan == 0 || biaya_lain == 0) {
              return false
            }else{
              var bahanBaku = penjualan * 0.8;
              var tktl = bahanBaku + 24000000;
              var hpp = penjualan - tktl;
              var total = hpp - biaya_lain;
              document.edit.bahan_baku.value = bahanBaku;
              document.edit.tktl.value = tktl;
              document.edit.hpp.value = hpp;
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
          var total = document.edit.total.value;
          var tktl = document.edit.tktl.value;
          var hpp = document.edit.hpp.value;
          var bahan_baku = document.edit.bahan_baku.value;
          var penjualan = document.edit.penjualan.value;
          if ( tahun == "pilih tahun" || total == 0 || tktl == 0 || hpp == 0 || bahan_baku == 0 || penjualan == 0){
              return false;
          }
        }
      </script>