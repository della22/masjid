<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php"); ?>
  <link rel="stylesheet" href="<?= base_url() . 'js/mini-event-calendar.min.css'; ?>">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php $this->load->view("admin/_partials/sidebar.php"); ?>

      <!-- top navigation -->
      <?php $this->load->view("admin/_partials/navbar.php"); ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block; width: 100%">
          <div class="tile_count">
            <div class="col-md-2 col-sm-4 tile_stats_count" style="text-align: center;">
              <a href="<?= base_url('admin/berita_donasi'); ?>">
                <span class="count_top"><i class="fa fa-money"></i> Donasi Berlangsung </span>
                <div class="count" style="text-align: center;"><?= $donasi_berlangsung; ?></div>
              </a>
            </div>
            <div class="col-md-2 col-sm-4 tile_stats_count" style="text-align: center;">
              <a href="<?= base_url('admin/arisan_kurban'); ?>">
                <span class="count_top"><i class="fa fa-child"></i> Donatur Arisan Kurban </span>
                <div class="count"><?= $jumlah_donatur; ?></div>
              </a>
            </div>
            <div class="col-md-4 col-sm-3 tile_stats_count" style="text-align: center;">
              <a href="<?= base_url('admin/arisan_kurban'); ?>">
                <span class="count_top"><i class="fa fa-user"></i> Tunggakan Arisan Kurban Bulan Ini</span>
                <div class="count" style="text-align: center;" id="tunggakan_bulan_ini">-</div>
              </a>
            </div>

            <div class="col-md-4 col-sm-5 tile_stats_count" style="text-align: center;">
              <a href="<?= base_url('admin/rekapitulasi'); ?>">
                <span class="count_top"><i class="fa fa-calculator"></i> Saldo Hingga Saat Ini</span>
                <div class="count"> Rp. <?= rupiah($total_keuangan); ?></div>
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
                    <div id="chartLine" style="height:350px;width:100%"></div>

                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <br />
        <!-- /grafik -->

        <!-- pie -->
        <div class="row">

          <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <a href="">
                  <h2>Dana Masuk</h2>
                </a>
                <div class="clearfix"></div>
              </div>
              <table class="" style="width:100%">
                <tr>
                  <th style="width:37%;">
                    <p><?= $bulan_terbilang; ?> <?= $tahun; ?></p>
                  </th>
                  <th>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                      <?php
                      $total_pemasukan_semua = 0;
                      // Untuk menghitung semua total pemasukan
                      foreach ($kategori_pemasukan as $kat_pemasukan) {
                        foreach ($list_bulanan_masuk as $total_pemasukan) {
                          if ($total_pemasukan['id_kategori_masuk'] == $kat_pemasukan['id_kategori_masuk']) {
                            $total_pemasukan_semua += (int) $total_pemasukan['nominal'];
                          }
                        }
                      }; ?>
                      <p class="">Rp. <?= rupiah($total_pemasukan_semua); ?></p>
                    </div>

                  </th>
                </tr>

              </table>
              <div class="x_content">

                <div id="chartpemasukan" style="height:350px;"></div>

              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <a href="">
                  <h2>Dana Keluar</h2>
                </a>
                <div class="clearfix"></div>
              </div>
              <table class="" style="width:100%">
                <tr>
                  <th style="width:37%;">
                    <p><?= $bulan_terbilang; ?> <?= $tahun; ?></p>
                  </th>
                  <th>
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                      <?php
                      $total_pengeluaran_semua = 0;
                      // Untuk menghitung semua total pengeluaran
                      foreach ($kategori_pengeluaran as $kat_pengeluaran) {
                        foreach ($list_bulanan_keluar as $total_pengeluaran) {
                          if ($total_pengeluaran['id_kategori_keluar'] == $kat_pengeluaran['id_kategori_keluar']) {
                            $total_pengeluaran_semua += (int) $total_pengeluaran['nominal'];
                          }
                        }
                      }

                      ?>
                      <p class="">Rp. <?= rupiah($total_pengeluaran_semua); ?></p>
                    </div>

                  </th>
                </tr>

              </table>
              <div class="x_content">

                <div id="chartpengeluaran" style="height:350px;"></div>

              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <a href="">
                  <h2>Arisan Kurban <?= $bulan_terbilang; ?> <?= $tahun; ?></h2>
                </a>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div id="chartarisan" style="height:350px;"></div>

              </div>
            </div>
          </div>

        </div>
        <!-- /pie -->

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
  <script src="<?php echo base_url('assets/amcharts5/index.js') ?>"></script>
  <script src="<?php echo base_url('assets/amcharts5/percent.js') ?>"></script>
  <script src="<?php echo base_url('assets/amcharts5/xy.js') ?>"></script>
  <script src="<?php echo base_url('assets/amcharts5/themes/Animated.js') ?>"></script>
  <!-- Chart code -->
  <script>
    $.ajax('<?= base_url('admin/pemasukan/apiKategoriChart'); ?>', {
      type: 'get',
      data: {
        bulan: <?= $bulan; ?>,
        tahun: <?= $tahun; ?>
      },
      dataType: 'json', // type of response data
      success: function(data, status, xhr) {
        pasangChart(data.data, 'chartpemasukan');
      },
      error: function(jqXhr, textStatus, errorMessage) {
        console.log('Error: ' + errorMessage);
      }
    });

    $.ajax('<?= base_url('admin/pengeluaran/apiKategoriChart'); ?>', {
      type: 'get',
      data: {
        bulan: <?= $bulan; ?>,
        tahun: <?= $tahun; ?>
      },
      dataType: 'json', // type of response data
      success: function(data, status, xhr) {
        pasangChart(data.data, 'chartpengeluaran');
      },
      error: function(jqXhr, textStatus, errorMessage) {
        console.log('Error: ' + errorMessage);
      }
    });
    $.ajax('<?= base_url('admin/arisan_kurban/apiArisanBulanIni'); ?>', {
      type: 'get',
      data: {
        bulan: <?= $bulan; ?>,
        tahun: <?= $tahun; ?>
      },
      dataType: 'json', // type of response data
      success: function(data, status, xhr) {
        $('#tunggakan_bulan_ini').html(data.data[1].value);
        pasangChart(data.data, 'chartarisan');
      },
      error: function(jqXhr, textStatus, errorMessage) {
        console.log('Error: ' + errorMessage);
      }
    });

    $.ajax('<?= base_url('admin/overview/apiPemasukanPengeluaran'); ?>', {
      type: 'get',
      dataType: 'json', // type of response data
      success: function(data, status, xhr) {
        // Merubah data date jadi sring to time format
        const dataNew = data.data.map((items, index) => {
          return {
            ...data.data[index],
            date: new Date(items.date).getTime()
          }
        })
        // short data dari yang terkecil
        dataNew.sort((a, b) => a.date > b.date)
        // masukan data ke fungsi line chart yang sudah kita buat
        chartLine(dataNew);
      },
      error: function(jqXhr, textStatus, errorMessage) {
        console.log('Error: ' + errorMessage);
      }
    });


    function pasangChart(data, idchart) {

      am5.ready(function() {
        // Create root element
        var root = am5.Root.new(idchart);
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
          am5themes_Animated.new(root)
        ]);
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
          layout: root.verticalLayout,
          radius: 80
        }));

        // Create serie
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
        var series = chart.series.push(am5percent.PieSeries.new(root, {
          valueField: "value",
          categoryField: "category",
          alignLabels: false,
          legendLabelText: "[{fill}]{category}[/]",
          legendValueText: ""
        }));

        series.labels.template.setAll({
          radius: 8,
          maxWidth: 110,
          oversizedBehavior: "wrap",
          fontSize: 16,
          textAlign: "left",
          fill: am5.color(0x333333),
          text: "[bold]{category}[/]"
        });
        series.slices.template.set("tooltipText", "{category}: ({value})");
        // Set data
        series.data.setAll(data);
        // membuat legend
        // Label dibawah
        var legend = chart.children.push(am5.Legend.new(root, {
          centerX: am5.percent(50),
          x: am5.percent(50),
          marginTop: 15,
          marginBottom: 15
        }));

        legend.valueLabels.template.set("forceHidden", false);

        legend.data.setAll(series.dataItems);
        series.appear(1000, 100);

      });
    }
    // chartLine();

    function chartLine(data) {

      am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartLine");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
          am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
          panX: true,
          panY: true,
          wheelX: "panX",
          wheelY: "zoomX",
          pinchZoomX: true
        }));

        chart.get("colors").set("step", 2);


        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
          behavior: "none"
        }));
        cursor.lineY.set("visible", false);


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
          maxDeviation: 0.2,
          baseInterval: {
            timeUnit: "month",
            count: 1
          },
          renderer: am5xy.AxisRendererX.new(root, {}),
          tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
          renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.LineSeries.new(root, {
          name: "Series 1",
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: "value1",
          valueXField: "date",
          tooltip: am5.Tooltip.new(root, {
            labelText: "[bold]Pemasukan[/] :Rp. {valueY}\n[bold]Pengeluaran[/]:Rp. {value2}"
          })
        }));

        series.strokes.template.setAll({
          strokeWidth: 3
        });

        series.get("tooltip").get("background").set("fillOpacity", 0.5);

        var series2 = chart.series.push(am5xy.LineSeries.new(root, {
          name: "Series 2",
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: "value2",
          valueXField: "date"
        }));
        series2.strokes.template.setAll({
          strokeWidth: 3
        });

        // Set date fields
        // https://www.amcharts.com/docs/v5/concepts/data/#Parsing_dates
        root.dateFormatter.setAll({
          dateFormat: "yyyy-MM",
          dateFields: ["valueX"]
        });



        series.fills.template.setAll({
          fillOpacity: 0.2,
          visible: true
        });
        series2.fills.template.setAll({
          fillOpacity: 0.2,
          visible: true
        });
        series.data.setAll(data);
        series2.data.setAll(data);


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        series2.appear(1000);
        chart.appear(1000, 100);

      });
    }
  </script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url('js/custom.min.js') ?>"></script>



  <!-- <script type="text/javascript">
    function init_echarts() {

      if (typeof(echarts) === 'undefined') {
        return;
      }
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
            normal: {
              color: '#408829'
            },
            emphasis: {
              color: '#408829'
            }
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
              color: [
                [0.2, '#86b379'],
                [0.8, '#68a54a'],
                [1, '#408829']
              ],
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
  </script> -->

  <!-- MODAL -->
  <?php $this->load->view("admin/_partials/modal.php") ?>


</body>

</html>