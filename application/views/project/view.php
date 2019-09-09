<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b><?= $tbl_project['title'] ?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <?php if($file['dir']){ ?>
            <img src="<?= base_url().$file['dir'] ?>" class="round" id="main_image" alt="Second slide" alt="Second slide" style="height: 390px; width: 100%">
          <?php } else { ?>
            <img src="<?= base_url('webfile/project/default.jpg')?>" class="round" id="main_image" alt="Second slide" alt="Second slide" style="height: 390px; width: 100%">
          <?php } ?>
          <br><br>
          <div class="row">
            <?php
            if($file_detail){
              $i = 1;
              foreach($file_detail as $img){
                ?>
                <div class="col-md-2">
                  <img src="<?= base_url().$img['dir']?>" class="round" id="detail_image-<?=$i?>" alt="User Image" width="100%" height="85px" style="border-radius: 15px">
                </div>
                <?php
                $i++;
              }
            }?>
          </div>
          <br>
          <div class="box box-solid round">
            <div class="box-body" align="center">
              <div class="row">
                <div class="col-md-12" align="center">
                  Telah dibesarkan <b>493</b> Unit disponsori <b>212</b> orang
                </div>
              </div>
            </div>
          </div>
          <div class="box box-solid round">
            <div class="box-header with-border" align="center">
              <i class="fa fa-info"></i>
              <h3 class="box-title">Detail</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6" align="right">
                  Periode :
                </div>
                <div class="col-md-6" align="left">
                  <b><?= $tbl_project['periode'] ?> tahun</b>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6" align="right">
                  Return yang didapat :
                </div>
                <div class="col-md-6" align="left">
                  <b><?= $tbl_project['return'] ?>% per tahun</b>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6" align="right">
                  Periode Bagi Hasil :
                </div>
                <div class="col-md-6" align="left">
                  <b><?= $tbl_project['bagi_hasil'] ?> tahun</b>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-invest">
            <i class="fa fa-credit-card"></i> Lakukan nvestasi 
          </button>
          <br>
        </div>
        <div class="col-md-4">
          <div class="row" align="center" style="margin-top: -20px">
            <h2>Slot Unit : <b><?= $tbl_project['unit'] ?></b></h2>
          </div>
          <div class="box box-solid round">
            <div class="box-body" align="center">
              Harga :
              <h2><b>Rp <?= number_format($tbl_project['harga'],0,',','.') ?>,- / Unit</b></h2>
            </div> 
            <div class="box-body" align="center">
              <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-invest">
                <i class="fa fa-credit-card"></i> Lakukan Investasi 
              </button>
            </div>
          </div>
          <div class="alert alert-success alert-dismissible round status-alert" align="center">
            <i class="fa fa-check-circle"></i> <b>Masih Dibuka</b>
          </div>
          <div style="margin: 5px">
            Proyek dimulai <b><?= date("d-m-Y", strtotime($tbl_project['created_at']))  ?></b> oleh:
          </div>
          <div class="box box-solid round">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-xs-12 col-6 mb-md-0 mb-5" align="center">
                  <img src="<?= base_url().$user_image['dir'] ?>" alt="Second slide" style="height: 100px; width: 100px" class="round">
                </div>
                <div class="col-md-8 col-xs-12 col-6 mb-md-0 mb-5">
                  <h3><?= $user['name'] ?> </h3>
                  <small>Mendaftar pada : <b><?= date("d-m-Y", strtotime($user['created_at']))  ?></b></small>
                </div>
              </div>
            </div> 
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-body">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63219.15520334034!2d112.59676353691754!3d-7.978558877729098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822063dc2fb%3A0x78879446481a4da2!2sMalang%2C%20Malang%20City%2C%20East%20Java%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1567484427303!5m2!1sen!2sus" width="100%" height="215" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_detail_1" data-toggle="tab" aria-expanded="false">Deskripsi</a></li>
                  <li class=""><a href="#tab_detail_2" data-toggle="tab" aria-expanded="false">Simulasi Bagi Hasil</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_detail_1">
                    <div class="row">
                      <div class="col-md-12">
                        <?= $tbl_project['deskripsi'] ?>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_detail_2">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row" align="center">
                          <h3><b>Simulasi Bagi Hasil</b></h3>
                        </div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box-body table-responsive no-padding">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>tahun Ke </th>
                                    <th>Bagi Hasil</th>
                                    <th>ROI</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td colspan="4" align="center">
                                      <img src='https://icon-library.net/images/no-data-icon/no-data-icon-20.jpg' width='100px' height='100px'>
                                      <p>
                                        <b>
                                          Tidak Ada Data
                                        </b>
                                      </p>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>Rp 720.000</td>
                                    <td>18%</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>Rp 720.000</td>
                                    <td>18%</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>Rp 720.000</td>
                                    <td>18%</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <br>

                            <div class="box-group" id="accordion">
                              <div class="panel box box-primary" align="center">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      Buka Simulasi Grafik
                                    </h4>
                                  </div>
                                </a>
                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                  <div class="row" style="width: 100%; height: 300px;">
                                    <canvas id="myChart" style="width: 512px; height: 256px" ></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="modal modal-default fade" id="modal-invest" style="display: none;">
  <div class="modal-dialog round">
    <div class="modal-content round">
      <div class="modal-header top-round bg-green">
        <h4 class="modal-title" align="center"><i class="fa fa-credit-card"></i> Investasi Sekarang</h4>
      </div>
      <div class="modal-body">
        <?php
        if($this->session->userdata('session_sop') == true){
          $this->load->view('modals/invest_form');
        } else if($this->session->userdata('session_sop') == ""){
          ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
            Mohon untuk Melakukan Login Masuk Terlebih Dahulu !
          </div>
          <?php $this->load->view('modals/login_form');
        }
        ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">


  <?php
  if($file_detail){
    $i = 1;
    foreach($file_detail as $img){
      ?>

      $('#detail_image-<?=$i?>').click(function() {
        var main_src = $('#main_image').attr('src');
        var detail_src = $('#detail_image-<?=$i?>').attr('src');

        $('#detail_image-<?=$i?>').attr('src',main_src);
        $('#main_image').attr('src',detail_src);
      });
      <?php
      $i++;
    }
  }
  ?>

  $(function () {
    var ctx = document.getElementById("myChart");

    var data = {
      labels: ["Tahun 1", "Tahun 2", "Tahun 3", "Tahun4"],
      datasets: [
      {
        label: "Profit ",
        data: [0, 65000, 65000, 0],
        backgroundColor: 'rgb(193, 193, 229)',
        borderColor: 'rgb(105, 105, 205)',
        borderWidth: 4,
        pointBorderWidth: 6
      }
      ]
    };

    var options = {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        position: 'top',
      },
      hover: {
        mode: 'label'
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Tahun ke',
            ticks: {
              userCallback: function(value, index, values) {
                return value.replace("Tahun ","");
              }
            }
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Profit'
          },
          gridLines: {
            display: false
          },
          ticks: {
            callback: function(value, index, values) {
              return 'Rp ' + formatNumber(value) + ',-';
            }
          }
        }]
      },
      tooltips: {
        callbacks: {
          label: function(t, d) {
            var xLabel = d.datasets[t.datasetIndex].label;
            var yLabel = "Rp "+ formatNumber(t.yLabel) + ',-';
            return xLabel + ': ' + yLabel;
          }
        }
      },
    }

    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: options
    });
  });

</script>
