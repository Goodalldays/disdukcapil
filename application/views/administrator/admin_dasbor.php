
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h4 mb-0 text-gray-800">Statistik Pengunjung</h4>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengunjung Daring</div>
                            <?php
                                $pengunjung_online;
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengunjung_online; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary  text-uppercase mb-1">
                                Pengunjung Hari Ini</div>
                                <?php
                                    $today_visitor;
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$today_visitor ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Klik Hari Ini</div>
                                <?php
                                    $hits;
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hits['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hand-point-up fa-2x text-gray-300">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pengunjung</div>
                                <?php
                                    $pengunjung;
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengunjung['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <!-- Area Chart -->
        <!-- <div class="col-xl-8 col-lg-7"> -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Kunjungan</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Menu:</div>
                            <a class="dropdown-item" download="GrafikPengunjung.png" href="" id="downloadGrf">Download Grafik</a>
                            <a class="dropdown-item" href="#">Lihat Data Satistik</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Grafik jumlah pengunjung dalam 20 hari terakhir.</p>
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jejak Pendapat</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Menu:</div>
                            <a class="dropdown-item" href="#" id="downloadPie" download="JejakPendapat.png">Download Grafik</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>administrator/jejak_pendapat">Lihat Data Jejak Pendapat</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Tingkat kepuasan pengguna website?</p>
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Sangat Puas
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Puas
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Tidak Puas
                        </span>
                    </div>
                </div>
            </div>
        </div> -->
    </div>



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h4 mb-0 text-gray-800">
Menu Dasbor</h4>
    </div>
    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= base_url() ?>administrator/berita">
                <div class="card border-left-primary shadow h-100 py-2">

                    <div class="card-body">

                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Berita</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_berita ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>

                    </div>

                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/video">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                video</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_video ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/foto">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Foto</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_foto ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-image fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/halaman_statis">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Halaman Statis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_halaman_statis ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/manajemen_pengguna">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pengguna ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/pengumuman">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengumuman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_pengumuman ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/unduhan">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Unduhan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_unduhan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-download fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?= base_url() ?>administrator/agenda">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Agenda</div>
                            <?php
                                $jumlah_agenda
                            ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_agenda ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-week fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>


    </div>





</div>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Inter', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
<?php $grafik = $this->model_app->grafik_kunjungan(); ?>
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
        <?php
            if(count($grafik)>0){
                foreach ($grafik->result_array() as $row) {
                    echo "'" . tgl_indo($row['tanggal']) . "',";
                }
            }
        ?>
    // ].reverse(),
    ],
    datasets: [{
      label: "Pengunjung",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [
          <?php
            if(count($grafik)>0){
                foreach ($grafik->result_array() as $row) {
                    echo "'" . $row['jumlah'] . "',";
                }
            }
        ?>
    //   ].reverse(),
      ]
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7,
          reverse: true
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + " : " + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


document.getElementById("downloadGrf").addEventListener('click', function(){
  /*Get image of canvas element*/
  var url_base64jp = document.getElementById("myAreaChart").toDataURL("image/png");
  /*get download button (tag: <a></a>) */
  var a =  document.getElementById("downloadGrf");
  /*insert chart image url to download button (tag: <a></a>) */
  a.href = url_base64jp;
});



<?php $grafik2 = $this->model_app->grafik_pendapat(); ?>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Inter', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [
        <?php
            if(count($grafik)>0){
                foreach ($grafik->result_array() as $row) {
                    echo "'" . tgl_indo($row['pilihan_data']) . "',";
                }
            }
        ?>
    // ].reverse(),
    ],
    datasets: [{
      data: [10, 10, 40, 40],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

document.getElementById("downloadPie").addEventListener('click', function(){
  /*Get image of canvas element*/
  var url_base64jp = document.getElementById("myPieChart").toDataURL("image/png");
  /*get download button (tag: <a></a>) */
  var a =  document.getElementById("downloadPie");
  /*insert chart image url to download button (tag: <a></a>) */
  a.href = url_base64jp;
});

</script>
