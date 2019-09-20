<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="row" align="center">
                            <h3><b>Data Investasi Saya</b></h3>
                        </div>
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
                                        <canvas id="myChart" style="width: 512px; height: 600px" ></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered table-striped" >
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Project</th>
                                <th>Total Investasi</th>
                                <th>Tgl Mengajukan</th>
                                <th>Tgl Pembayaran</th>
                                <th>Metode</th>
                                <th>Tgl Konfirmasi</th>
                                <th>Status Pembarayan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($grafik as $row) {
                                $project =  $this->mymodel->selectDataOne('tbl_project', array('id' => $row['project_id'] ));
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td>
                                        <?= $project['title']?>
                                        <br>
                                        <a href="<?= base_url('/project/view/').$project['slug'] ?>">
                                            <button class="btn btn-block btn-info btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td><b>Rp <?= number_format($row['total_harga'],0,',','.') ?>,-</b></td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($row['created_at']))  ?></td>
                                    <td>
                                        <?php if (!$row['tgl_pembayaran']) {
                                            echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                                        }else {
                                            echo $row['tgl_pembayaran'];
                                        }?>
                                    </td>
                                    <td>
                                        <?php if (!$row['metode_pembayaran']) {
                                            echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                                        }else {
                                            echo $row['metode_pembayaran'];
                                        }?>
                                    </td>
                                    <td>
                                        <?php if (!$row['tgl_konfirmasi']) {
                                            echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                                        }else {
                                            echo date("d-m-Y H:i:s", strtotime($row['tgl_konfirmasi']));
                                        }?>
                                    </td>
                                    <td>
                                        <?php if ($row['status_pembayaran'] == 'WAITING') {
                                            echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
                                        }else if ($row['status_pembayaran'] == 'APPROVE') {
                                            echo '<small class="label bg-green"><i class="fa fa-check"> </i> Di Terima </small>';
                                        }else{
                                            echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Di Tolak </small>';
                                        }?>
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

  $(function () {
    var ctx = document.getElementById("myChart");

    var data = {
      labels: ["Tahun 1", "Tahun 2", "Tahun 3", "Tahun 4", "Tahun 5"],
      datasets: [
      {
        label: "Profit ",
        data: [1000, 2000, 3000, 4000, 5000],
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