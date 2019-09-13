<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $tbl_project['title'] ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Project</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box-group" id="data_investor">
          <div class="panel box box-primary">
            <a data-toggle="collapse" data-parent="#data_investor" href="#collapseInvestor" aria-expanded="false" class="collapsed">
              <div class="box-header with-border">
                <h4 class="box-title">
                  Data Investor
                </h4>
              </div>
            </a>
            <div id="collapseInvestor" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
              <div class="box-body">
                <div class="show_error"></div>
                <div class="table-responsive">
                  <table id="datatable" class="table table-bordered table-striped" >
                    <thead>
                      <tr class="bg-success">
                        <th>No</th>
                        <th>Code</th>
                        <th>Project</th>
                        <th>Investor</th>
                        <th>Banyak Unit</th>
                        <th>Harga per Unit</th>
                        <th>Total Harga</th>
                        <th>Tgl Mengajukan</th>
                        <th>Tgl Kadarluasa</th>
                        <th>Tgl Pembayaran</th> 
                        <th>Metode</th>
                        <th>Status Pembarayan</th>
                        <th>Tgl Konfirmasi</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($tbl_project_invest as $row_invest) { 
                        $project =  $this->mymodel->selectDataOne('tbl_project', array('id' => $row_invest['project_id'] ));
                        $investor =  $this->mymodel->selectDataOne('tbl_investor', array('id' => $row_invest['investor_id'] ));?>
                        <tr>
                          <td><?= $i ?></td>
                          <td><b><?= $row_invest['code'] ?></b></td>
                          <td>
                            <a href="<?= base_url('admin/project/view/').$project['id'] ?>">
                              <?= $project['title'] ?>
                            </a>
                          </td>
                          <td><?= $investor['name'] ?></td>
                          <td><?= $row_invest['unit'] ?></td>
                          <td><b>Rp <?= number_format($project['harga'],0,',','.') ?></b></td>
                          <td><b>Rp <?= number_format($row_invest['total_harga'],0,',','.') ?>,-</b></td>
                          <td><?= date("d-m-Y H:i:s", strtotime($row_invest['created_at']))  ?></td>
                          <td><?= date("d-m-Y H:i:s", strtotime($row_invest['tgl_kadarluasa'])) ?></td>
                          <td>
                            <?php if (!$row_invest['tgl_pembayaran']) {
                              echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                            }else {
                              echo $row_invest['tgl_pembayaran'];
                            }?>
                          </td>
                          <td>
                            <?php if (!$row_invest['metode_pembayaran']) {
                              echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                            }else {
                              echo $row_invest['metode_pembayaran'];
                            }?>
                          </td>
                          <td>
                            <?php if (!$row_invest['tgl_pembayaran']) { ?>
                              <p class='help-block'><i>Invoice Ini Belum Terbayar</i></p>
                            <?php  }else { 
                              if ($row_invest['status_pembayaran'] == 'WAITING') {
                                echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>
                                <hr>
                                <div class="row" align="center">
                                <button type="button" class="btn btn-send btn-approve btn-sm btn-sm btn-primary" onclick="approve('.$row_invest['id'].')"><i class="fa fa-check-circle"></i></button>
                                <button type="button" class="btn btn-send btn-reject btn-sm btn-sm btn-danger" onclick="reject('.$row_invest['id'].')"><i class="fa fa-ban"></i></button>
                                </div>';
                              }else if ($row_invest['status_pembayaran'] == 'APPROVE') {
                                echo '<small class="label bg-green"><i class="fa fa-check"> </i> Di Terima </small>';
                              }else{
                                echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Di Tolak </small>';
                              }?>
                            <?php } ?>
                          </td>
                          <td>
                            <?php if (!$row_invest['tgl_konfirmasi']) {
                              echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                            }else {
                              echo date("d-m-Y", strtotime($row_invest['tgl_konfirmasi']));
                            }?>
                          </td>
                          <td>
                            <a href="<?= base_url('invoice/payment/').$row_invest['code']?>" target="_blank">
                              <button type="button" class="btn btn-sm btn-sm btn-info"><i class="fa fa-print"></i> Invoice</button>
                            </a>
                          </td>
                        </tr>
                        <?php $i++; }  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
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
                      <img src="<?= base_url().$img['dir']?>" id="detail_image-<?=$i?>" alt="User Image" width="100%" height="85px" style="border-radius: 15px">
                    </div>
                    <?php
                    $i++;
                  }
                }?>
              </div>
              <br>
              <div class="box box-solid">
                <div class="box-body" align="center">
                  <div class="row">
                    <div class="col-md-12" align="center">
                      Telah dibesarkan <b>493</b> Unit disponsori <b>212</b> orang
                    </div>
                  </div>
                </div>
              </div>
              <div class="box box-solid">
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
                      Periode Bagi Hasil :
                    </div>
                    <div class="col-md-6" align="left">
                      <b><?= $tbl_project['bagi_hasil'] ?> tahun</b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row" align="center" style="margin-top: -20px">
                <h2>Sisa Slot Unit : <b><?= $tbl_project['unit'] ?></b></h2>
              </div>
              <div class="box box-solid">
                <div class="box-body" align="center">
                  Harga :
                  <h2><b>Rp <?= number_format($tbl_project['harga'],0,',','.') ?>,- / Unit</b></h2>
                  Total Harga : <b> Rp <?= number_format($tbl_project['total_harga'],0,',','.') ?>,-</b>
                </div>
              </div>
              <h5 align="center"><b>Ubah Status</b></h5>
              <div class="row">
                <div class="col-md-6" align="center">
                  Public <br>
                  <?php
                  if($tbl_project['public']=='ENABLE'){
                    echo '<button type="button" class="btn btn-block btn-sm btn-sm btn-danger" onclick="publicDisable('.$tbl_project['id'].')"><i class="fa fa-ban"></i> DISABLE</button>';
                  }else{
                    echo '<button type="button" class="btn btn-block btn-sm btn-sm btn-success" onclick="publicEnable('.$tbl_project['id'].')"><i class="fa fa-check-circle"></i> ENABLE</button>';
                  }
                  ?>
                </div>
                <div class="col-md-6" align="center">
                  Proyek <br>
                  <?php
                  if($tbl_project['status']=='ENABLE'){
                    echo '<button type="button" class="btn btn-block btn-sm btn-sm btn-danger" onclick="statusDisable('.$tbl_project['id'].')"><i class="fa fa-ban"></i> DISABLE</button>';
                  }else{
                    echo '<button type="button" class="btn btn-block btn-sm btn-sm btn-success" onclick="statusEnable('.$tbl_project['id'].')"><i class="fa fa-check-circle"></i> ENABLE</button>';
                  }
                  ?>
                </div>
              </div>
              <div style="margin: 5px">
                Proyek dimulai <b><?= date("d-m-Y", strtotime($tbl_project['created_at']))  ?></b> oleh:
              </div>
              <div class="box box-solid">
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
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid">
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
                                        <th>Tahun Ke </th>
                                        <th>Bagi Hasil</th>
                                        <th>ROI</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = 1; foreach ($tbl_project_return_grafik as $grafik) { ?>
                                        <tr>
                                          <td><?=$i?></td>
                                          <td>Tahun Ke - <?= $grafik['tahun']?></td>
                                          <td><?php 
                                          $total_harga = $tbl_project['total_harga']; 
                                          $persentase = $grafik['return_tahun'];
                                          $hasil = $total_harga*$persentase/100;

                                          echo "Rp ".number_format($hasil,0,',','.').",-"
                                          ?>
                                        </td>
                                        <td><?= $grafik['return_tahun']?> % per Tahun</td>
                                      </tr>
                                    <?php } ?>
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
        <div class="row">
          <div class="col-md-6" align="center">
            <a href="<?= base_url('admin/project') ?>"> <button type="button" class="btn btn-block btn-md btn-sm btn-info"><i class="fa fa-archive"></i> Data Proyek</button></a>
          </div>
          <div class="col-md-6" align="center">
            <a href="<?= base_url('admin/project/edit/').$tbl_project['id'] ?>"> <button type="button" class="btn btn-block btn-md btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah Proyek</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>
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
      labels: [
      <?php foreach ($tbl_project_return_grafik as $grafik) { ?>
        "Tahun <?= $grafik['tahun'] ?>",
      <?php } ?>
      ],
      datasets: [
      {
        label: "Profit ",
        data: [
        <?php foreach ($tbl_project_return_grafik as $grafik) { 
          $total_harga = $tbl_project['total_harga']; 
          $persentase = $grafik['return_tahun'];
          $hasil = $total_harga*$persentase/100;
          echo $hasil.","; } ?>
        ],
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


  function statusDisable(id) {
    location.href = "<?= base_url('admin/project/statusView_disable/') ?>"+id;
  }

  function statusEnable(id) {
    location.href = "<?= base_url('admin/project/statusView_enable/') ?>"+id;
  }

  function publicDisable(id) {
    location.href = "<?= base_url('admin/project/statusPublic_disable/') ?>"+id;
  }

  function publicEnable(id) {
    location.href = "<?= base_url('admin/project/statusPublic_enable/') ?>"+id;
  }


  function approve(id) {
    $.ajax({
      type: "POST",
      url: "<?= base_url('admin/investasi/approve/') ?>"+id,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend : function(){
        $(".btn-send").addClass("disabled").html("<i class='fa fa-spinner'></i>").attr('disabled',true);
        $(".show_error").slideUp().html("");
      },
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          $(".show_error").hide().html(response).slideDown("fast");
          $(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
          $(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
          location.reload();
        }else{
          setTimeout(function(){
            $("#modal-delete").modal('hide');
          }, 1000);
          $(".show_error").hide().html(response).slideDown("fast");
          $(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
          $(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
      }
    });
  }

  function reject(id) {
    $.ajax({
      type: "POST",
      url: "<?= base_url('admin/investasi/reject/') ?>"+id,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend : function(){
        $(".btn-send").addClass("disabled").html("<i class='fa fa-spinner'></i>").attr('disabled',true);
        $(".show_error").slideUp().html("");
      },
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          $(".show_error").hide().html(response).slideDown("fast");
          $(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
          $(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
          location.reload();
        }else{
          setTimeout(function(){
            $("#modal-delete").modal('hide');
          }, 1000);
          $(".show_error").hide().html(response).slideDown("fast");
          $(".btn-approve").removeClass("disabled").html('<i class="fa fa-check-circle"></i> ').attr('disabled',false);
          $(".btn-reject").removeClass("disabled").html('<i class="fa fa-ban"></i> ').attr('disabled',false);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
      }
    });
  }
</script>
