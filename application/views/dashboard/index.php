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
            </ul>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="card card-stats card-primary card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-analytics"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Penjualan Terakhir</p>
                        <h4 class="card-title">Rp. <?= $data['pajak_badan_terakhir']['penjualan'] ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="card card-stats card-info card-round">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-interface-6"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Pajak</p>
                        <h4 class="card-title">Rp. <?= $data['pajak_badan_terakhir']['pajak'] ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="card card-stats card-success card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-coins"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Penghasilan Terakhir</p>
                        <h4 class="card-title">Rp. <?= $data['pajak_pribadi_terakhir']['penghasilan'] ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="card card-stats card-secondary card-round">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="flaticon-interface-6"></i>
                      </div>
                    </div>
                    <div class="col-7 col-stats">
                      <div class="numbers">
                        <p class="card-category">Pajak</p>
                        <h4 class="card-title">Rp. <?= $data['pajak_pribadi_terakhir']['pajak'] ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-head-row">
                    <div class="card-title">Penjualan 12 Bulan Terakhir</div>
                    <div class="card-tools">
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-container" style="min-height: 375px">
                    <canvas id="chartPenjualan"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        var dataChart, penjualan, pajak;
        getChartData();
        function getChartData() {
            // membuat objek ajax
            var xhr = new XMLHttpRequest();
            var url = "dashboard/chart_penjualan/";
            // menentukan fungsi handler
            xhr.onload = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var data = this.responseText;
                  dataChart = JSON.parse(data);
                  var bulan0 = dataChart[0].bulan;
                  var bulan1 = dataChart[1].bulan;
                  var bulan2 = dataChart[2].bulan;
                  var bulan3 = dataChart[3].bulan;
                  var bulan4 = dataChart[4].bulan;
                  var bulan5 = dataChart[5].bulan;
                  var bulan6 = dataChart[6].bulan;
                  var bulan7 = dataChart[7].bulan;
                  var bulan8 = dataChart[8].bulan;
                  var bulan9 = dataChart[9].bulan;
                  var bulan10 = dataChart[10].bulan;
                  var bulan11 = dataChart[11].bulan;
                  var penjualan0 = dataChart[0].penjualan;
                  var penjualan1 = dataChart[1].penjualan;
                  var penjualan2 = dataChart[2].penjualan;
                  var penjualan3 = dataChart[3].penjualan;
                  var penjualan4 = dataChart[4].penjualan;
                  var penjualan5 = dataChart[5].penjualan;
                  var penjualan6 = dataChart[6].penjualan;
                  var penjualan7 = dataChart[7].penjualan;
                  var penjualan8 = dataChart[8].penjualan;
                  var penjualan9 = dataChart[9].penjualan;
                  var penjualan10 = dataChart[10].penjualan;
                  var penjualan11 = dataChart[11].penjualan;
                  var pajak0 = dataChart[0].pajak;
                  var pajak1 = dataChart[1].pajak;
                  var pajak2 = dataChart[2].pajak;
                  var pajak3 = dataChart[3].pajak;
                  var pajak4 = dataChart[4].pajak;
                  var pajak5 = dataChart[5].pajak;
                  var pajak6 = dataChart[6].pajak;
                  var pajak7 = dataChart[7].pajak;
                  var pajak8 = dataChart[8].pajak;
                  var pajak9 = dataChart[9].pajak;
                  var pajak10 = dataChart[10].pajak;
                  var pajak11 = dataChart[11].pajak;
        var ctx = document.getElementById('chartPenjualan').getContext('2d');

        var chartPenjualan = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [bulan11, bulan10, bulan9, bulan8, bulan7, bulan6, bulan5, bulan4, bulan3, bulan2, bulan1, bulan0],
            datasets: [{
              label: "Penjualan",
              borderColor: '#177dff',
              pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
              pointRadius: 0,
              backgroundColor: 'rgba(23, 125, 255, 0.4)',
              legendColor: '#177dff',
              fill: true,
              borderWidth: 2,
              data: [penjualan11, penjualan10, penjualan9, penjualan8, penjualan7, penjualan6, penjualan5, penjualan4, penjualan3, penjualan2, penjualan1, penjualan0]
            }]
          },
          options : {
            responsive: true, 
            maintainAspectRatio: false,
            legend: {
              display: false
            },
            tooltips: {
              bodySpacing: 4,
              mode:"nearest",
              intersect: 0,
              position:"nearest",
              xPadding:10,
              yPadding:10,
              caretPadding:10
            },
            layout:{
              padding:{left:5,right:5,top:15,bottom:15}
            },
            scales: {
              yAxes: [{
                ticks: {
                  fontStyle: "500",
                  beginAtZero: false,
                  maxTicksLimit: 5,
                  padding: 10
                },
                gridLines: {
                  drawTicks: false,
                  display: false
                }
              }],
              xAxes: [{
                gridLines: {
                  zeroLineColor: "transparent"
                },
                ticks: {
                  padding: 10,
                  fontStyle: "500"
                }
              }]
            }, 
            legendCallback: function(chart) { 
              var text = []; 
              text.push('<ul class="' + chart.id + '-legend html-legend">'); 
              for (var i = 0; i < chart.data.datasets.length; i++) { 
                text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
                if (chart.data.datasets[i].label) { 
                  text.push(chart.data.datasets[i].label); 
                } 
                text.push('</li>'); 
              } 
              text.push('</ul>'); 
              return text.join(''); 
            }  
          }
        });

        var myLegendContainer = document.getElementById("myChartLegend");

        // generate HTML legend
        myLegendContainer.innerHTML = chartPenjualan.generateLegend();
                }
            };
            xhr.open("GET", url, true);
            // mengirim request
            xhr.send();
        }

      </script>