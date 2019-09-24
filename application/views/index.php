<div class="cover">
  <div class="div-center">
    <h1 style="color:white; font-size: 44px; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">
      AGNOV<br>
    </h1>
    <h3 style="color:white; font-size: 25px; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center"> Pembiayaan yang Berdampak</h3>
    <p style="color:white; font-size: 15px; font-weight: bold; text-shadow: 2px 2px 4px #000000;" align="center">  Pembiayaan yang menguntungkan, sekaligus berdampak kepada masyarakat dan lingkungan</p>
    <div class="col-md-12 col-sm-12 col-xs-12 " align="center">
      <a href="<?= base_url('project') ?>">
        <button type="button" class="btn btn-block btn-primary btn-lg round cover_button"><i class="fa fa-archive"></i> Lihat Proyek</button>
      </a>
    </div>
  </div>
</div>
<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-6 col-6 mb-md-0 mb-5">
          <div class="small-box bg-orange round">
            <div class="inner">
              <h4>Total Proyek</h4>
              <h2><b><?= $project[0]['project'] ?></b></h2>
            </div>
            <div class="icon">
              <i class="fa fa-archive"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-6 mb-md-0 mb-5">
          <div class="small-box bg-green round">
            <div class="inner">
              <h4>Investor Terdaftar</h4>
              <h2><b><?= $users[0]['users'] ?></b></h2> 
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-6 mb-md-0 mb-5">
          <div class="small-box bg-yellow round">
            <div class="inner">
              <h4>Rata Rata Bagi Hasil</h4>
              <h2><b><?= ceil($avg[0]['AVG']) ?> % - <?= ceil($avg[0]['AVG'])+2 ?> % </b></h2>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-6 mb-md-0 mb-5">
          <div class="small-box bg-blue round">
            <div class="inner">
              <h4>Rata Rata Harga Per Unit</h4>
              <h2><b>Rp <?= number_format($harga[0]['harga']/1000000,0,',','.') ?> Jt ,- / Unit</b></h2>
            </div>
            <div class="icon">
              <i class="fa fa-handshake-o"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="row" align="center">
        <h1><i class="fa fa-info"></i> Cara Kerja</h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="box box-solid round">
            <div class="box-body">
              <h3 align="center"><i class="fa fa-info"></i> <?= $cara_pertama['title'] ?></h3>
              <br>
              <?= $cara_pertama['value'] ?>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="box box-solid round">
            <div class="box-body">
              <h3 align="center"><i class="fa fa-info"></i> <?= $cara_kedua['title'] ?></h3>
              <br>
              <?= $cara_kedua['value'] ?>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="box box-solid round">
            <div class="box-body">
              <h3 align="center"><i class="fa fa-info"></i> <?= $cara_ketiga['title'] ?></h3>
              <br>
              <?= $cara_ketiga['value'] ?>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 mb-md-0 mb-5">
          <div class="box box-solid round">
            <div class="box-body">
              <h3 align="center"><i class="fa fa-info"></i> <?= $cara_keempat['title'] ?></h3>
              <br>
              <?= $cara_keempat['value'] ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row" align="center">
        <h1><i class="fa fa-archive"></i> Mulai Pembiayaan di sini !</h1>
      </div>
      <br>
      <div class="row">
        <?php foreach($tbl_project as $row){ ?>
          <a href="<?= base_url('project/view/').$row['slug'] ?>" class="a_black">
            <div class="col-md-4 col-6 mb-md-0 mb-5">
              <div class="box box-solid round">
                <div class="box-body">
                  <?php $image_src = $this->mymodel->selectDataone('file', array('table'=>'tbl_project', 'table_id' => $row['id'])); ?>
                  <img style="height: 200px; width: 100%; object-fit: cover; display: inline;" src="<?= base_url().$image_src['dir']?>">
                  <h2 align="center">
                    <?= strlen($row["title"]) > 15 ? substr($row["title"],0,15)."..." : $row["title"] ?>
                  </h2>
                  <h5 align="center">
                    <?php 
                    $user = $this->mymodel->selectDataone('user', array('id'=>$row['user_id']));

                    $firstReturn = $this->mymodel->selectWithQuery('SELECT min(return_tahun) as return_tahun from tbl_project_return WHERE project_id = "'.$row[id].'"');

                    $lastReturn = $this->mymodel->selectWithQuery('SELECT max(return_tahun) as return_tahun from tbl_project_return WHERE project_id = "'.$row[id].'"');

                    $countInvestor = $this->mymodel->selectWithQuery('SELECT COUNT(id) as COUNT from tbl_project_invest WHERE project_id = "'.$row[id].'" AND status_pembayaran = "APPROVE" GROUP BY investor_id');

                    $unit = $this->mymodel->selectWithQuery("SELECT SUM(unit) as unit FROM tbl_project_invest WHERE project_id = '".$row['id']."' AND status_pembayaran = 'APPROVE'");

                    $mintunit = $row['unit'] - $unit[0]['unit'];

                    ?>
                    Oleh : <b><?= $user['name'] ?></b>
                    <p class='help-block'><b>Dibuat pada : </b><?= date("d-m-Y", strtotime($row['created_at']))  ?></p>
                    <hr>
                    <?php
                    if($row['status']=='ENABLE'){
                      if($mintunit <= 0){
                        echo '<div class="alert alert-danger alert-dismissible round status-alert" align="center">
                        <i class="fa fa-ban"></i> <b>Stock Telah Habis</b>
                        </div>';
                      }else{
                        echo '<div class="alert alert-success alert-dismissible round status-alert" align="center"> 
                        <i class="fa fa-check-circle"></i> <b>Masih Dibuka</b>
                        </div>';
                      }
                    } else {
                      echo '<div class="alert alert-danger alert-dismissible round status-alert" align="center">
                      <i class="fa fa-ban"></i> <b>Sudah Ditutup</b>
                      </div>';
                    }
                    ?>
                    <hr>
                    Periode Kontrak : <b><?= $row['periode'] ?> Tahun</b>
                    <hr>
                    Return Terkecil : <b><?= $firstReturn[0]['return_tahun'] ?></b>  %
                    <br>
                    Return Terbesar : <b><?= $lastReturn[0]['return_tahun'] ?></b>  %
                    <hr>
                    <?php 
                    $harga = $row['harga'];

                    $firstHarga = $harga*$firstReturn[0]['return_tahun']/100;
                    $lastHarga = $harga*$lastReturn[0]['return_tahun']/100;
                    ?>
                    Return Kembali Terkecil : <b> Rp. <?= number_format($firstHarga,0,',','.')?>,- </b>
                    <br>
                    Return Kembali Terbesar : <b> Rp. <?= number_format($lastHarga,0,',','.')?>,- </b>
                    <hr>
                    Slot Unit Tersisa : <b><?php if ($row['unit'] == 0){
                      echo $row['unit']."/".$row['unit'];
                    } else { 
                      echo $mintunit."/".$row['unit'];
                    }
                    ?></b>
                    <hr>
                    Periode Bagi Hasil : <b><?= $row['bagi_hasil'] ?> Tahun</b>
                  </h5>
                  <br>
                  <h4 align="center">
                    Harga : <b>Rp <?= number_format($row['harga'],0,',','.') ?>,- / Unit</b>
                  </h4>
                  <p class='help-block' align="center">Sebanyak <b> <?php if ($countInvestor[0]['COUNT']){echo $countInvestor[0]['COUNT']; } else { echo "0"; } ?></b> Invest Telah Berhasil Terdaftar</p>
                  <div class="row" align="center">
                    <div class="col-md-12" align="center">
                      <a href="<?= base_url('project/view/').$row['slug'] ?>">
                        <button type="button" class="btn btn-primary btn-block btn-md round">
                          <i class="fa fa-search"></i> Selengkapnya
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
      <div class="row" align="center">
        <a href="<?= base_url('project') ?>">
          <button type="button" class="btn btn-primary btn-lg round">
            <i class="fa fa-search"></i> Lihat Semua Proyek
          </button>
        </a>
      </div>
    </section>
  </div>
</div>
