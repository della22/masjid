<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("admin/_partials/head.php") ?>
        <link rel="stylesheet" href="<?= base_url() . 'js/mini-event-calendar.min.css' ?>">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <!-- top navigation -->
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block; width: 100%" >
          <div class="tile_count">
            <div class="col-md-2 col-sm-4 tile_stats_count" style="text-align: center;">
              <a href="#">
              <span class="count_top"><i class="fa fa-child"></i> Total Ustadz</span>
              <div class="count" style="text-align: center;">10</div>
              </a>
            </div>
            <div class="col-md-3 col-sm-4 tile_stats_count" style="text-align: center;">
              <a href="#">
              <span class="count_top"><i class="fa fa-calendar-o"></i> Total Kegiatan Januari 2022</span>
              <div class="count" style="text-align: center;">10</div>
              </a>
            </div>
            <div class="col-md-2 col-sm-4 tile_stats_count" style="text-align: center;">
              <a href="#">
              <span class="count_top"><i class="fa fa-users"></i> Total Pengurus</span>
              <div class="count">7</div>
              </a>
            </div>
            <div class="col-md-5 col-sm-5 tile_stats_count" style="text-align: center;">
              <a href="#">
              <span class="count_top"><i class="fa fa-money"></i>  Saldo Hingga Saat Ini</span>
              <div class="count"> Rp. 6.000.000</div>
            </a>
            </div>
            
            
          </div>
        </div>
          <!-- /top tiles -->

          <!-- grafik -->
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pemasukkan dan Pengeluaran 6 Bulan Terakhir</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="lineChart1"></canvas>
                  </div>
                </div>
              </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br />
          <!-- /grafik -->

          <!-- calendar -->
           <div class="row">

            <div class="col-md-6 col-sm-6 ">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Kegiatan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="calendar-container"></div>
                  </div>
                </div>
            </div>


            <div class="col-md-6 col-sm-6 ">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Imam/Khotib</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="calendar-khatib" class="calendar-khatib"></div>
                  </div>
              </div>
            </div>


          </div>
          <br />
          <!-- calendar -->

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view("admin/_partials/footer.php") ?>
        <!-- /footer content -->
      </div>
    </div>

     <!-- jQuery -->
    <script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('assets/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/fastclick/lib/fastclick.js') ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('assets/nprogress/nprogress.js') ?>"></script>

    <!-- Chart.js -->
    <script src="<?php echo base_url('assets/Chart.js/dist/Chart.min.js') ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url('assets/gauge.js/dist/gauge.min.js') ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url('assets/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/iCheck/icheck.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/echarts/dist/echarts.min.js') ?>"></script>
    
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('js/custom.min.js') ?>"></script>


    <script type="text/javascript">
          function init_charts() {
      
        console.log('run_charts  typeof [' + typeof (Chart) + ']');
      
        if( typeof (Chart) === 'undefined'){ return; }
        
        console.log('init_charts');
      
        
        Chart.defaults.global.legend = {
          enabled: false
        };
 
        // Line chart
      


      if ($('#lineChart1').length ){ 
      
        var ctx = document.getElementById("lineChart1");
        var lineChart1 = new Chart(ctx, {
        type: 'line',
        data: {
          labels: [
           <?php foreach($labelBulan as $d):
              echo '"' . $d. '"';?> ,
              <?php endforeach; ?>
           //"January","February","March", 
          // "April", 
          // "Ma", 
          // "Jun", 
          // "Jul",
          ],
          datasets: [{
          label: "Pemasukkan",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: [
            <?php foreach($grafPemasukkan as $grafPemasukkan):
              echo '"' . $grafPemasukkan. '"';?> ,
              <?php endforeach; ?>
            //131000000, 174000000, 116000000, 139000000, 120000000, 185000000, 117000000
          ]
          }, {
          label: "Pengeluaran",
          backgroundColor: "rgba(195, 3, 3, 0.3)",
          borderColor: "rgba(195, 3, 3, 0.70)",
          pointBorderColor: "rgba(195, 3, 3, 0.70)",
          pointBackgroundColor: "rgba(195, 3, 3, 0.70)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(151,187,205,1)",
          pointBorderWidth: 1,
          data: [
            <?php foreach($grafPengeluaran as $grafPengeluaran):
              echo '"' . $grafPengeluaran. '"';?> ,
              <?php endforeach; ?>
          //82000000, 23000000, 66000000, 9000000, 99000000, 4000000, 2000000
          ]
          }]
        },
        });
      
      }
   
    }



    </script>
    <script type="text/javascript">
      
function init_echarts() {
    
        if( typeof (echarts) === 'undefined'){ return; }
        console.log('init_echarts');
      
    
          var theme = {
          color: [
            '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
            '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
            itemGap: 8,
            textStyle: {
              fontWeight: 'normal',
              color: '#408829'
            }
          },

          dataRange: {
            color: ['#1f610a', '#97b58d']
          },

          toolbox: {
            color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
            backgroundColor: 'rgba(0,0,0,0.5)',
            axisPointer: {
              type: 'line',
              lineStyle: {
                color: '#408829',
                type: 'dashed'
              },
              crossStyle: {
                color: '#408829'
              },
              shadowStyle: {
                color: 'rgba(200,200,200,0.3)'
              }
            }
          },

          dataZoom: {
            dataBackgroundColor: '#eee',
            fillerColor: 'rgba(64,136,41,0.2)',
            handleColor: '#408829'
          },
          grid: {
            borderWidth: 0
          },

          categoryAxis: {
            axisLine: {
              lineStyle: {
                color: '#408829'
              }
            },
            splitLine: {
              lineStyle: {
                color: ['#eee']
              }
            }
          },

          valueAxis: {
            axisLine: {
              lineStyle: {
                color: '#408829'
              }
            },
            splitArea: {
              show: true,
              areaStyle: {
                color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
              }
            },
            splitLine: {
              lineStyle: {
                color: ['#eee']
              }
            }
          },
          timeline: {
            lineStyle: {
              color: '#408829'
            },
            controlStyle: {
              normal: {color: '#408829'},
              emphasis: {color: '#408829'}
            }
          },

          k: {
            itemStyle: {
              normal: {
                color: '#68a54a',
                color0: '#a9cba2',
                lineStyle: {
                  width: 1,
                  color: '#408829',
                  color0: '#86b379'
                }
              }
            }
          },
          map: {
            itemStyle: {
              normal: {
                areaStyle: {
                  color: '#ddd'
                },
                label: {
                  textStyle: {
                    color: '#c12e34'
                  }
                }
              },
              emphasis: {
                areaStyle: {
                  color: '#99d2dd'
                },
                label: {
                  textStyle: {
                    color: '#c12e34'
                  }
                }
              }
            }
          },
          force: {
            itemStyle: {
              normal: {
                linkStyle: {
                  strokeColor: '#408829'
                }
              }
            }
          },
          chord: {
            padding: 4,
            itemStyle: {
              normal: {
                lineStyle: {
                  width: 1,
                  color: 'rgba(128, 128, 128, 0.5)'
                },
                chordStyle: {
                  lineStyle: {
                    width: 1,
                    color: 'rgba(128, 128, 128, 0.5)'
                  }
                }
              },
              emphasis: {
                lineStyle: {
                  width: 1,
                  color: 'rgba(128, 128, 128, 0.5)'
                },
                chordStyle: {
                  lineStyle: {
                    width: 1,
                    color: 'rgba(128, 128, 128, 0.5)'
                  }
                }
              }
            }
          },
          gauge: {
            startAngle: 225,
            endAngle: -45,
            axisLine: {
              show: true,
              lineStyle: {
                color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                width: 8
              }
            },
            axisTick: {
              splitNumber: 10,
              length: 12,
              lineStyle: {
                color: 'auto'
              }
            },
            axisLabel: {
              textStyle: {
                color: 'auto'
              }
            },
            splitLine: {
              length: 18,
              lineStyle: {
                color: 'auto'
              }
            },
            pointer: {
              length: '90%',
              color: 'auto'
            },
            title: {
              textStyle: {
                color: '#333'
              }
            },
            detail: {
              textStyle: {
                color: 'auto'
              }
            }
          },
          textStyle: {
            fontFamily: 'Arial, Verdana, sans-serif'
          }
        };
    </script>

    <!-- Kalender -->
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url() . 'js/mini-event-calendar.min.js' ?>"></script>

    <script>
        $(function() {
            $('.calendar-container').MEC({
                calendar_link: "jqueryscript.net", // calendar link
                // events: myEvents
            });
        });
    </script>
    <script>
        var myEvents = [
            {
                title: "Jadwal imam/khatib",
                date: new Date().getTime(),
                link: "<?= base_url() ?>"
            },
            // more events here
        ];

        $('.calendar-khatib').MEC({
            calendar_link: "<?= base_url() ?>", // calendar link
            events: myEvents
        });
    </script>

    <!-- MODAL -->
    <?php $this->load->view("admin/_partials/modal.php") ?>

	
  </body>
</html>
