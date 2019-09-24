<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AGNOV</b></a></li>
          <li class="active"><i class="fa fa-archive"></i> Proyek</li>
        </ol>
      </section>
      <div class="row" align="center">
        <h1><i class="fa fa-archive"></i> Proyek </h1>
        <small>Setiap bibit yang Anda biayai, berarti juga bermanfaat untuk kesejahteraan petani dan kebaikan alam.</small>
      </div>
      <br>
      <div class="row">
        <div class="box box-solid round">
          <div class="box-body">
           <form class="form-horizontal">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Lakukan Pencarian Berdasarkan</label>
              <div class="col-sm-9"> 
                <div class="radio">
                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" onclick="filternew()" id="optionsRadios1" value="filter 1" <?php if(!$_GET['search']) { echo "checked"; }?>>
                    Baru Berjalan 
                  </label>
                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" onclick="filterlast()" id="optionsRadios1" value="filter 1" <?php if($_GET['search'] == 'last') { echo "checked"; }?>>
                    Lama Berjalan
                  </label>
                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" onclick="filterreturn()" id="optionsRadios1" value="filter 1" <?php if($_GET['search'] == 'return') { echo "checked"; }?>>
                    Return Pertama yang Terbesar
                  </label>
                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" onclick="filterinvest()" id="optionsRadios1" value="filter 1" <?php if($_GET['search'] == 'invest') { echo "checked"; }?>>
                    Proyek Dengan Banyak Investor Berhasil Terdaftar
                  </label>
                </div>
              </div>
            </div> 
          </form>
        </div>
      </div>
      <div id="map" style="width: 100%; height:350px; border: 3px solid #CED4DC; border-radius: .25rem;margin-bottom:15px;">
      </div>
      <div class="row" id="myList">
        <?php foreach($tbl_project as $row){ ?>
          <li>
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
          </li>
        <?php } ?>
      </div>
      <div class="row" align="center">
        <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Banyak
        </button>
        <button type="button" id="showLess" class="btn btn-danger btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Sedikit
        </button>
      </div>
    </section>
  </div>
</div>
<script type="text/javascript">

  function filterall(id) {
    window.location.href = "<?= base_url('project') ?>";
  }

  function filternew(id) {
    window.location.href = "<?= base_url('project?search=new') ?>";
  }

  function filterlast(id) {
    window.location.href = "<?= base_url('project?search=last') ?>";
  }

  function filterreturn(id) {
    window.location.href = "<?= base_url('project?search=return') ?>";
  }

  function filterinvest(id) {
    window.location.href = "<?= base_url('project?search=invest') ?>";
  }

  var locations = [
  <?php foreach($tbl_project as $row){ ?>
    ['<a target="_blank" href="<?=base_url()?>project/view/<?=$row['slug']?>"><?=$row['title']?></a>', <?=$row['latitude']?>, <?=$row['longitude']?>, 4],
  <?php } ?>
  ];

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(-7.975145899999999, 112.61960810000005),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  var infowindow = new google.maps.InfoWindow();

  var marker, i;

  for (i = 0; i < locations.length; i++) { 
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }

</script>