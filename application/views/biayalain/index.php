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
                                  <label>Kantor</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="kantor" type="text" required autofocus autocomplete="off" class="form-control" placeholder="masukkan kantor  . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="kantor" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Gaji</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="gaji" type="text" required autocomplete="off" class="form-control" placeholder="masukkan gaji  . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="gaji" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Bonus</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="bonus" type="text" required autocomplete="off" class="form-control" placeholder="masukkan bonus . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="bonus" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Transport</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="transport" type="text" required autocomplete="off" class="form-control" placeholder="masukkan transport . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="transport" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Listrik</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="listrik" type="text" required autocomplete="off" class="form-control" placeholder="masukkan listrik . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="listrik" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Keamanan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="keamanan" type="text" required autocomplete="off" class="form-control" placeholder="masukkan keamanan . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="keamanan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Kesehatan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="kesehatan" type="text" required autocomplete="off" class="form-control" placeholder="masukkan kesehatan . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="kesehatan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Konsumsi</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="konsumsi" type="text" required autocomplete="off" class="form-control" placeholder="masukkan konsumsi . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="konsumsi" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Air</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="air" type="text" required autocomplete="off" class="form-control" placeholder="masukkan air . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="air" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Lain-lain</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="lain_lain" type="text" required autocomplete="off" class="form-control" placeholder="masukkan lain_lain . . ." value="0" onkeyup="calculateTotal(), validateInput(this)">
                                  </div>
                                  <small id="lain_lain" class="form-text text-danger"></small>
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
                          <th>Kantor</th>
                          <th>Gaji</th>
                          <th>Bonus</th>
                          <th>Transport</th>
                          <th>Listrik</th>
                          <th>Keamanan</th>
                          <th>Kesehatan</th>
                          <th>Konsumsi</th>
                          <th>Air</th>
                          <th>Lainlain</th>
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
                          <td><?= $d['kantor'] ?></td>
                          <td><?= $d['gaji'] ?></td>
                          <td><?= $d['bonus'] ?></td>
                          <td><?= $d['transport'] ?></td>
                          <td><?= $d['listrik'] ?></td>
                          <td><?= $d['keamanan'] ?></td>
                          <td><?= $d['kesehatan'] ?></td>
                          <td><?= $d['konsumsi'] ?></td>
                          <td><?= $d['air'] ?></td>
                          <td><?= $d['lain_lain'] ?></td>
                          <td><?= $d['total'] ?></td>
                          <td>
                            <div class="form-button-action">
                              <a href="#" data-toggle="modal" data-target="#modalEdit" data-id="<?= $d['id']?>" data-tahun="<?= $d['tahun']?>" data-kantor="<?= $d['kantor']?>" data-gaji="<?= $d['gaji']?>" data-bonus="<?= $d['bonus']?>" data-transport="<?= $d['transport']?>" data-listrik="<?= $d['listrik']?>" data-keamanan="<?= $d['keamanan']?>" data-kesehatan="<?= $d['kesehatan']?>" data-konsumsi="<?= $d['konsumsi']?>" data-air="<?= $d['air']?>" data-lain_lain="<?= $d['lain_lain']?>" data-total="<?= $d['total']?>" onclick="loadEditData(this)">
                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-warning btn-lg" data-original-title="Ubah">
                                  <i class="fa fa-edit"></i>
                                </button>
                              </a>
                              <a href="<?= base_url('biayalain/hapus/').$d['id'] ?>" onclick="return confirm('apakah anda yakin ingin menghapusnya?')">
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
                                  <label>Kantor</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="kantor" type="text" required autocomplete="off" autofocus="" class="form-control" placeholder="masukkan kantor  . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editkantor" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Gaji</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="gaji" type="text" required autocomplete="off" class="form-control" placeholder="masukkan gaji  . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editgaji" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Bonus</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="bonus" type="text" required autocomplete="off" class="form-control" placeholder="masukkan bonus . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editbonus" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Transport</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="transport" type="text" required autocomplete="off" class="form-control" placeholder="masukkan transport . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="edittransport" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Listrik</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="listrik" type="text" required autocomplete="off" class="form-control" placeholder="masukkan listrik . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editlistrik" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Keamanan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="keamanan" type="text" required autocomplete="off" class="form-control" placeholder="masukkan keamanan . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editkeamanan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Kesehatan</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="kesehatan" type="text" required autocomplete="off" class="form-control" placeholder="masukkan kesehatan . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editkesehatan" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Konsumsi</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="konsumsi" type="text" required autocomplete="off" class="form-control" placeholder="masukkan konsumsi . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editkonsumsi" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Air</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="air" type="text" required autocomplete="off" class="form-control" placeholder="masukkan air . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editair" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Lain-lain</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="lain_lain" type="text" required autocomplete="off" class="form-control" placeholder="masukkan lain_lain . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="editlain_lain" class="form-text text-danger"></small>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label>Total</label>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input name="total" type="text" required autocomplete="off" class="form-control" placeholder="masukkan total . . ." onkeyup="calculateEditTotal(), validateEdit(this)">
                                  </div>
                                  <small id="edittotal" class="form-text text-danger"></small>
                                </div>
                              </div>
                            </div>
                            <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Batal</button>
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
        function calculateTotal(){
          var kantor = document.add.kantor.value;
          var gaji = document.add.gaji.value;
          var bonus = document.add.bonus.value;
          var transport = document.add.transport.value;
          var listrik = document.add.listrik.value;
          var keamanan = document.add.keamanan.value;
          var kesehatan = document.add.kesehatan.value;
          var konsumsi = document.add.konsumsi.value;
          var air = document.add.air.value;
          var lain_lain = document.add.lain_lain.value;
          document.add.total.value = parseFloat(kantor) + parseFloat(gaji) + parseFloat(bonus) + parseFloat(transport) + parseFloat(listrik) + parseFloat(keamanan) + parseFloat(kesehatan) + parseFloat(konsumsi) + parseFloat(air) + parseFloat(lain_lain);
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
            var kantor = document.add.kantor.value;
            var gaji = document.add.gaji.value;
            var bonus = document.add.bonus.value;
            var transport = document.add.transport.value;
            var listrik = document.add.listrik.value;
            var keamanan = document.add.keamanan.value;
            var kesehatan = document.add.kesehatan.value;
            var konsumsi = document.add.konsumsi.value;
            var air = document.add.air.value;
            var lain_lain = document.add.lain_lain.value;
            var total = document.add.total.value;
            if (isNaN(tahun) || isNaN(kantor) || isNaN(gaji) || isNaN(bonus) || isNaN(transport) || isNaN(listrik) || isNaN(keamanan) || isNaN(kesehatan) || isNaN(konsumsi) || isNaN(air) || isNaN(lain_lain) || total == 0){
                return false;
            }
        }

        // form edit
        function loadEditData(baris) {
            var id = baris.getAttribute("data-id");
            var tahun = baris.getAttribute("data-tahun");
            var kantor = baris.getAttribute("data-kantor");
            var gaji = baris.getAttribute("data-gaji");
            var bonus = baris.getAttribute("data-bonus");
            var transport = baris.getAttribute("data-transport");
            var listrik = baris.getAttribute("data-listrik");
            var keamanan = baris.getAttribute("data-keamanan");
            var kesehatan = baris.getAttribute("data-kesehatan");
            var konsumsi = baris.getAttribute("data-konsumsi");
            var air = baris.getAttribute("data-air");
            var lain_lain = baris.getAttribute("data-lain_lain");
            var total = baris.getAttribute("data-total");
            document.edit.id.value = id;
            document.edit.tahun.value = tahun;
            document.edit.kantor.value = kantor;
            document.edit.gaji.value = gaji;
            document.edit.bonus.value = bonus;
            document.edit.transport.value = transport;
            document.edit.listrik.value = listrik;
            document.edit.keamanan.value = keamanan;
            document.edit.kesehatan.value = kesehatan;
            document.edit.konsumsi.value = konsumsi;
            document.edit.air.value = air;
            document.edit.lain_lain.value = lain_lain;
            document.edit.total.value = total;
        }

        function calculateEditTotal(){
          var kantor = document.edit.kantor.value;
          var gaji = document.edit.gaji.value;
          var bonus = document.edit.bonus.value;
          var transport = document.edit.transport.value;
          var listrik = document.edit.listrik.value;
          var keamanan = document.edit.keamanan.value;
          var kesehatan = document.edit.kesehatan.value;
          var konsumsi = document.edit.konsumsi.value;
          var air = document.edit.air.value;
          var lain_lain = document.edit.lain_lain.value;
          document.edit.total.value = parseFloat(kantor) + parseFloat(gaji) + parseFloat(bonus) + parseFloat(transport) + parseFloat(listrik) + parseFloat(keamanan) + parseFloat(kesehatan) + parseFloat(konsumsi) + parseFloat(air) + parseFloat(lain_lain);
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
            var kantor = document.edit.kantor.value;
            var gaji = document.edit.gaji.value;
            var bonus = document.edit.bonus.value;
            var transport = document.edit.transport.value;
            var listrik = document.edit.listrik.value;
            var keamanan = document.edit.keamanan.value;
            var kesehatan = document.edit.kesehatan.value;
            var konsumsi = document.edit.konsumsi.value;
            var air = document.edit.air.value;
            var lain_lain = document.edit.lain_lain.value;
            var total = document.edit.total.value;
            if (isNaN(tahun) || isNaN(kantor) || isNaN(gaji) || isNaN(bonus) || isNaN(transport) || isNaN(listrik) || isNaN(keamanan) || isNaN(kesehatan) || isNaN(konsumsi) || isNaN(air) || isNaN(lain_lain) || total == 0){
                return false;
            }
        }
      </script>