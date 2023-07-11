<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/nucleo-svg.css') ?> rel="stylesheet" />
  <link id="pagestyle" href="<?= base_url('assets/css/material-dashboard.css?v=3.1.0') ?>" rel="stylesheet" />

<main id="main" class="main">
<div class="bs-icon-xl bs-icon-sm bs-icon-circle bs-icon-primary bs-icon my-4">
                                
                            </div>
    <!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
  
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
          <?php //echo json_encode($usergainstat); ?>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
     
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-imc" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Evolution des personnes ayant atteint l'IMC ideal pour l'annee <?= $anneeactuelle; ?></h6>
              <!-- <p class="text-sm ">Last Campaign Performance</p> -->
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <!-- <p class="mb-0 text-sm"> campaign sent 2 days ago </p> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-loss" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Evolution des personnes ayant perdu du poids pour l'annee <?= $anneeactuelle; ?> </h6>
              <!-- <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p> -->
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <!-- <p class="mb-0 text-sm"> updated 4 min ago </p> -->
              </div>
            </div>
          </div>
        </div>
          <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-gain" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 ">Evolution des personnes ayant gagne du poids pour l'annee <?= $anneeactuelle; ?></h6>
                <!-- <p class="text-sm ">Last Campaign Performance</p> -->
                <hr class="dark horizontal">
                <div class="d-flex ">
                  <i class="material-icons text-sm my-auto me-1">schedule</i>
                  <!-- <p class="mb-0 text-sm">just updated</p> -->
                </div>
              </div>
            </div>
          </div>
      
     
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="<?= site_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?= site_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?= site_url('assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
  <script src="<?= site_url('assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('node_modules/chart.js/dist/chart.umd.js') ?>"></script>
  <script src="<?= base_url('node_modules/moment/moment.js') ?>"></script>

  <script>
    var ctx = document.getElementById("chart-gain").getContext("2d");
    var usergainstats = <?php echo json_encode($usergainstat); ?> 

    var monthsgains = [];
    var countsgains = [];

    // Initialize counts for all months to 0
    for (var i = 0; i < 12; i++) {
        monthsgains.push(moment().month(i).format('MMMM'));
        countsgains.push(0);
    }

    usergainstats.forEach(function (stat)
    {
        var monthIndex = stat.month - 1;
        countsgains[monthIndex] = stat.count;

    });
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: monthsgains,
        datasets: [{
          label: "Number of users",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: countsgains,
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-loss").getContext("2d");
    var userlossstats = <?php echo json_encode($userlossstat); ?> 

    var monthsloss = [];
    var countsloss = []
  
    // Initialize counts for all months to 0
    for (var i = 0; i < 12; i++) {
      monthsloss.push(moment().month(i).format('MMMM'));
      countsloss.push(0);
    }

    userlossstats.forEach(function (stat)
    {
        var monthIndex = stat.month - 1;
        countsloss[monthIndex] = stat.count;

    });

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: monthsloss,
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: countsloss,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-imc").getContext("2d");
    var userimcstats = <?php echo json_encode($userIMCstat); ?> 

    var monthsimc = [];
    var countsimc = []

    // Initialize counts for all months to 0
    for (var i = 0; i < 12; i++) {
      monthsloss.push(moment().month(i).format('MMMM'));
      countsloss.push(0);
    }

    userIMCstats.forEach(function (stat)
    {
        var monthIndex = stat.month - 1;
        countsloss[monthIndex] = stat.count;

    });

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: monthsimc,
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: countsimc,
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= site_url('assets/js/material-dashboard.min.js?v=3.1.0'); ?> "></script>

  </main>
