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
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Tahun</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </span>
                                    </div>
                                    <input name="tahun" type="number" required autocomplete="off" min="2000" max="3000" class="form-control" placeholder="masukkan tahun . . ." value="<?= date('Y') ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Bulan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                      </span>
                                    </div>
                                    <select name="bulan" class="form-control" onchange="validateBulan()">
                                      <option value="pilih bulan">pilih bulan</option>
                                      <option value="<?= $bulan[$month_now] ?>">bulan ini</option>
                                      <option value="Januari">Januari</option>
                                      <option value="Februari">Februari</option>
                                      <option value="Maret">Maret</option>
                                      <option value="April">April</option>
                                      <option value="Mei">Mei</option>
                                      <option value="Juni">Juni</option>
                                      <option value="Juli">Juli</option>
                                      <option value="Agustus">Agustus</option>
                                      <option value="September">September</option>
                                      <option value="Oktober">Oktober</option>
                                      <option value="November">November</option>
                                      <option value="Desember">Desember</option>
                                    </select>
                                  </div>
                                  <small id="bulan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Penjualan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="penjualan" type="text" required autocomplete="off" class="form-control" placeholder="masukkan penjualan  . . ." onkeyup="calculatePajak(this.value)">
                                  </div>
                                  <small id="penjualan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Pajak</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="pajak" type="text" required autocomplete="off" class="form-control" placeholder="masukkan pajak . . ." onkeyup="calculatePenjualan(this.value)">
                                  </div>
                                  <small id="pajak" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary float-right" onclick="validateBulan()">Tambah</button>
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
                          <th>Bulan</th>
                          <th>Penjualan</th>
                          <th>Pajak</th>
                          <th style="width: 10%">Aksi</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($data as $d) :?>
                        <tr>
                          <td><?= $d['tahun'] ?></td>
                          <td><?= $d['bulan'] ?></td>
                          <td><?= $d['penjualan'] ?></td>
                          <td><?= $d['pajak'] ?></td>
                          <td>
                            <div class="form-button-action">
                              <a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?= $d['id']?>" data-tahun="<?= $d['tahun']?>" data-bulan="<?= $d['bulan']?>" data-penjualan="<?= $d['penjualan']?>" data-pajak="<?= $d['pajak']?>" onclick="loadEditData(this)">
                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-warning btn-lg" data-original-title="Ubah">
                                  <i class="fa fa-edit"></i>
                                </button>
                              </a>
                              <a href="<?= base_url('pajak/hapus/').$d['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapusnya?')">
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
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Tahun</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </span>
                                    </div>
                                    <input name="tahun" type="number" required autocomplete="off" minlength="4" maxlength="4" min="2000" max="3000" class="form-control" placeholder="masukkan tahun . . ." value="<?= date('Y') ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Bulan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                      </span>
                                    </div>
                                    <select id="" name="bulan" required class="form-control" onchange="validateEditBulan()">
                                      <option value="pilih bulan">pilih bulan</option>
                                      <option value="Januari">Januari</option>
                                      <option value="Februari">Februari</option>
                                      <option value="Maret">Maret</option>
                                      <option value="April">April</option>
                                      <option value="Mei">Mei</option>
                                      <option value="Juni">Juni</option>
                                      <option value="Juli">Juli</option>
                                      <option value="Agustus">Agustus</option>
                                      <option value="September">September</option>
                                      <option value="Oktober">Oktober</option>
                                      <option value="November">November</option>
                                      <option value="Desember">Desember</option>
                                    </select>
                                  </div>
                                  <small id="editBulan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Penjualan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="penjualan" type="text" required autocomplete="off" class="form-control" placeholder="masukkan penjualan  . . ." onkeyup="calculateEditPajak(this.value)" on>
                                  </div>
                                  <small id="editPenjualan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Pajak</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="pajak" type="text" required autocomplete="off" class="form-control" placeholder="masukkan pajak . . ." onkeyup="calculateEditPenjualan(this.value)">
                                  </div>
                                  <small id="editPajak" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
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
          // form input
          function calculatePajak(penjualan) {
              var pajak = penjualan * 0.005;
              document.add.pajak.value = pajak;
              if (isNaN(penjualan)) {
                  document.getElementById('penjualan').innerHTML = "masukkan angka!";
              } else {
                  document.getElementById('penjualan').innerHTML = "";
                  document.getElementById('pajak').innerHTML = "";
              }
          }
          function calculatePenjualan(pajak) {
              var penjualan = pajak / 0.005;
              document.add.penjualan.value = penjualan;
              if (isNaN(pajak)) {
                  document.getElementById('pajak').innerHTML = "masukkan angka!";
              } else {
                  document.getElementById('pajak').innerHTML = "";
                  document.getElementById('penjualan').innerHTML = "";
              }
          }

          function validateBulan() {
              var bulan = document.add.bulan.value;
              if (bulan == "pilih bulan") {
                  document.getElementById('bulan').innerHTML = "pilih bulan!";
              } else {
                  document.getElementById('bulan').innerHTML = "";
              }
          }

          function validateForm() {
              var tahun = document.add.tahun.value;
              var bulan = document.add.bulan.value;
              var penjualan = document.add.penjualan.value;
              var pajak = document.add.pajak.value;
              if (isNaN(tahun) || isNaN(penjualan) || isNaN(pajak) || bulan == "pilih bulan" ) {
                  return false;
              }
          }

          // form edit
          function loadEditData(baris) {
              var id = baris.getAttribute("data-id");
              var tahun = baris.getAttribute("data-tahun");
              var bulan = baris.getAttribute("data-bulan");
              var penjualan = baris.getAttribute("data-penjualan");
              var pajak = baris.getAttribute("data-pajak");

              // document.form's name.input's name.value
              document.edit.id.value = id;
              document.edit.tahun.value = tahun;
              document.edit.bulan.value = bulan;
              document.edit.penjualan.value = penjualan;
              document.edit.pajak.value = pajak;
          }
          function calculateEditPajak(penjualan) {
              var pajak = penjualan * 0.005;
              document.edit.pajak.value = pajak;
              if (isNaN(penjualan)) {
                  document.getElementById('editPenjualan').innerHTML = "masukkan angka!";
              } else {
                  document.getElementById('editPenjualan').innerHTML = "";
                  document.getElementById('editPajak').innerHTML = "";
              }
          }
          function calculateEditPenjualan(pajak) {
              var penjualan = pajak / 0.005;
              document.edit.penjualan.value = penjualan;
              if (isNaN(pajak)) {
                  document.getElementById('editPajak').innerHTML = "masukkan angka!";
              } else {
                  document.getElementById('editPajak').innerHTML = "";
                  document.getElementById('editPenjualan').innerHTML = "";
              }
          }

          function validateEditBulan() {
              var bulan = document.edit.bulan.value;
              if (bulan == "pilih bulan") {
                  document.getElementById('editBulan').innerHTML = "pilih bulan!";
              } else {
                  document.getElementById('editBulan').innerHTML = "";
              }
          }
          function validateFormEdit() {
              var tahun = document.edit.tahun.value;
              var bulan = document.edit.bulan.value;
              var penjualan = document.edit.penjualan.value;
              var pajak = document.edit.pajak.value;
              if (isNaN(tahun) || isNaN(penjualan) || isNaN(pajak) || bulan == "pilih bulan" ) {
                  return false;
              }
          }
      </script>