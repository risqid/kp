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
                  <div class="card-head-row">
                    <div class="card-title">
                      <h4 class="card-title"><?= $subtitle ?></h4>
                    </div>
                    <div class="card-tools">
                      <button onclick="javascript:demoFromHTML()" class="btn btn-info btn-border btn-round btn-sm">
                        <span class="btn-label">
                          <i class="fa fa-print"></i>
                        </span>
                        Export
                      </btn>
                    </div>
                      <div class="form-group">
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
        function demoFromHTML() {
          var pdf = new jsPDF('p', 'pt', 'letter', 'landscape')

          // source can be HTML-formatted string, or a reference
          // to an actual DOM element from which the text will be scraped.
          , source = $('#fromHTMLtestdiv')[0]

          // we support special element handlers. Register them with jQuery-style 
          // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
          // There is no support for any other type of selectors 
          // (class, of compound) at this time.
          , specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function(element, renderer){
              // true = "handled elsewhere, bypass text extraction"
              return true
            }
          }

          margins = {
              top: 10,
              bottom: 10,
              left: 10,
              width: 5000
            };
            // all coords and widths are in jsPDF instance's declared units
            // 'inches' in this case
            pdf.fromHTML(
              source // HTML string or DOM elem ref.
              , margins.left // x coord
              , margins.top // y coord
              , {
                'width': margins.width // max width of content on PDF
                , 'elementHandlers': specialElementHandlers
              },
              function (dispose) {
                // dispose: object with X, Y of the last line add to the PDF 
                //          this allow the insertion of new lines after html
                  pdf.save('Laporan.pdf');
                },
              margins
            )
        }
      </script>