<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard active"></i> Home</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <?php if($this->session->userdata('role_id') == '17'){ ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-archive"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Proyek</span>
              <span class="info-box-number"><?= $Totalproyek[0]['total'] ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bar-chart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Rata Rata Return Semua Proyek</span>
              <span class="info-box-number"><?= number_format($AVGpersent[0]['persent'],0,',','.')  ?> % </span> per Tahun
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Harga Semua Proyek</span>
              <span class="info-box-number"> Rp <?= number_format($SUMReturn[0]['SUM']/1000000,0,',','.')  ?> Jt ,- </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Banyak Investor Bergabung</span>
              <span class="info-box-number"><?= $InvestorJOIN[0]['InvestorJOIN'] ?></span>
            </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-archive"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Total Proyek</span>
              <span class="info-box-number"><?= $Totalproyek[0]['total'] ?></span>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Rata Rata Total Harga Semua Proyek</span>
              <span class="info-box-number"> Rp <?= number_format($AVGReturn[0]['AVG'],0,',','.')  ?> ,- </span>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Banyak Investor Bergabung</span>
              <span class="info-box-number"><?= $InvestorJOIN[0]['InvestorJOIN'] ?></span>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Proyek Selama <b>5</b> Tahun Kedepan</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <?php if($this->session->userdata('role_id') == '17'){ ?>
                <div class="col-md-8 col-xs-12">
                  <p class="text-center">
                    Rata Rata Return Semua Proyek selama <b>5</b> Tahun Kedepan
                  </p>

                  <div class="chart">

                    <canvas id="myChart" style="width: 512px; height: 256px" ></canvas>
                  </div>
                </div>
                <div class="col-md-4 col-xs-12">
                  <p class="text-center">
                    <strong>Unit 5 Proyek Terbaru dan Terjual</strong>
                  </p>
                  <?php foreach ($tbl_project as $row) { 
                    $unit = $this->mymodel->selectWithQuery("SELECT SUM(unit) as unit FROM tbl_project_invest WHERE project_id = '".$row['id']."' AND status_pembayaran = 'APPROVE'");

                    $unit_terjual = 0;
                    if($unit[0]['unit']){
                      $unit_terjual = $unit[0]['unit'];
                    }
                    
                    $totalunit = $row['unit'];

                    $persent = $unit_terjual/$totalunit*100;

                    ?>
                    <div class="progress-group">
                      <span class="progress-text"><?= $row['title'] ?></span>
                      <span class="progress-number"><b><?= $unit_terjual ?></b>/<?= $totalunit ?></span>

                      <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua" style="width: <?=$persent?>%"></div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              <?php } else { ?>
                <div class="col-md-12 col-xs-12">
                  <?php foreach ($tbl_project as $row) { 
                    $unit = $this->mymodel->selectWithQuery("SELECT SUM(unit) as unit FROM tbl_project_invest WHERE project_id = '".$row['id']."' AND status_pembayaran = 'APPROVE'");

                    $unit_terjual = 0;
                    if($unit[0]['unit']){
                      $unit_terjual = $unit[0]['unit'];
                    }
                    $totalunit = $row['unit'] + $unit[0]['unit'];

                    $persent = $unit_terjual/$totalunit*100;

                    ?>
                    <div class="progress-group">
                      <span class="progress-text"><?= $row['title'] ?></span>
                      <span class="progress-number"><b><?= $unit_terjual ?></b>/<?= $totalunit ?></span>

                      <div class="progress sm">
                        <div class="progress-bar progress-bar-aqua" style="width: <?=$persent?>%"></div>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Proyek Terbaru</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table id="datatable" class="table table-bordered table-striped" >
                <thead>
                  <tr class="bg-success">
                    <th style="width:20px">No</th>
                    <th>Pembuat</th>
                    <th>Title</th>
                    <th>Bagi Hasil</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach ($tbl_project_all as $row) { $user =  $this->mymodel->selectDataOne('user', array('id' => $row['user_id'] )); $return = $this->mymodel->selectWithQuery("SELECT count(id) as return_row FROM tbl_project_return WHERE project_id = $row[id] "); ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td>
                      <?= $user['name'] ?>
                    </td>
                    <td><?= $row['title'] ?></td>
                    <td>
                      <?php if (!$row['bagi_hasil']) {
                        echo "<p class='help-block'><i>Kosong</i></p>";
                      }else {
                        echo $row['bagi_hasil']." Tahun";
                      }?>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-info" onclick="view(<?=$row['id']?>)">
                          <i class="fa fa-eye"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Investor Terbaru</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <ul class="users-list clearfix">
              <?php foreach ($investor as $row_invest) { ?>
                <li>
                  <a href="<?= base_url('admin/investor/view/').$row_invest['id']?>" style="color:black">
                    <?php $image_src = $this->mymodel->selectDataone('file', array('table'=>'tbl_investor', 'table_id' => $row_invest['id'])); ?>
                    <img style="height: 50px; width: 50px; object-fit: cover; display: inline;" src="<?= base_url().$image_src['dir']?>" alt="User Image">

                    <?= strlen($row_invest["name"]) > 5 ? substr($row_invest["name"],0,5)."..." : $row_invest["name"] ?> 
                    <span class="users-list-date"><?= date("m-Y", strtotime($row_invest['created_at']))  ?></span>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="box-footer" align="center">
            <a href="<?= base_url('admin/investor')?>">
              <button type="button" class="btn btn-sm btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Semua Investor</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<script type="text/javascript">

  $(function () {
    var ctx = document.getElementById("myChart");

    var data = {
      labels: ["Tahun ke 1", "Tahun ke 2", "Tahun ke 3", "Tahun ke 4", "Tahun ke 5"],
      datasets: [{
        label: "Profit ",
        data: [
        <?= ($AVGReturn[0]['AVG']*$AVGpersentyear1[0]['year1']/100) ?>, 
        <?= ($AVGReturn[0]['AVG']*$AVGpersentyear2[0]['year2']/100) ?>, 
        <?= ($AVGReturn[0]['AVG']*$AVGpersentyear3[0]['year3']/100) ?>, 
        <?= ($AVGReturn[0]['AVG']*$AVGpersentyear4[0]['year4']/100) ?>, 
        <?= ($AVGReturn[0]['AVG']*$AVGpersentyear5[0]['year5']/100) ?>, 
        ], 
        backgroundColor: 'rgb(193, 193, 229)',
        borderColor: 'rgb(105, 105, 205)',
        borderWidth: 4,
        pointBorderWidth: 6
      }],
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


  function view(id) {
    location.href = "<?= base_url('admin/project/view/') ?>"+id;
  }

</script>