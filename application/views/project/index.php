<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row" align="center">
        <h1><i class="fa fa-archive"></i> Proyek Pendanaan </h1>
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
                    <input type="radio" name="filter" id="optionsRadios1" value="filter 1" checked="true">
                    Semua Proyek
                  </label>

                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" id="optionsRadios1" value="filter 1">
                    Baru Berjalan
                  </label>

                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" id="optionsRadios1" value="filter 1">
                    Lama Berjalan
                  </label>

                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" id="optionsRadios1" value="filter 1">
                    Return Terbesar
                  </label>

                  <label style="margin-right: 5px">
                    <input type="radio" name="filter" id="optionsRadios1" value="filter 1">
                    Proyek Terbaik
                  </label>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row" id="myList">
        <?php foreach($tbl_project as $row){ ?>
          <li>
            <div class="col-md-4 col-6 mb-md-0 mb-5">
              <div class="box box-solid round">
                <div class="box-body">
                  <?php $image_src = $this->mymodel->selectDataone('file', array('table'=>'tbl_project', 'table_id' => $row['id'])); ?>
                  <img style="height: 200px; width: 100%; object-fit: cover; display: inline;" src="<?= base_url().$image_src['dir']?>">
                  <h2 align="center">
                    <?= strlen($row["title"]) > 15 ? substr($row["title"],0,15)."..." : $row["title"] ?>
                  </h2>
                  <h5 align="center">
                    <?php $user = $this->mymodel->selectDataone('user', array('id'=>$row['user_id'])); ?>
                    <?php $return = $this->mymodel->selectDataone('tbl_project_return', array('project_id'=>$row['id'], 'public' => 'ENABLE')); ?>
                    Oleh : <b><?= $user['name'] ?></b>
                    <hr>
                    <?php
                    if($row['status']=='ENABLE'){
                      echo '<div class="alert alert-success alert-dismissible round status-alert" align="center">
                      <i class="fa fa-check-circle"></i> <b>Masih Dibuka</b>
                      </div>';
                    }else{
                      echo '<div class="alert alert-danger alert-dismissible round status-alert" align="center">
                      <i class="fa fa-ban"></i> <b>Sudah Ditutup</b>
                      </div>';
                    }
                    ?>
                    <hr>
                    Periode Kontrak : <b><?= $row['periode'] ?> Tahun</b>
                    <hr>
                    Return Tahun ke <b><?=$return['tahun']?></b> : <b><?= $return['return_tahun'] ?></b>  % per Tahun
                    <hr>
                    Stok : <b><?= $row['unit'] ?></b>
                    <hr>
                    Periode Bagi Hasil : <b><?= $row['bagi_hasil'] ?> Tahun</b>
                  </h5>
                  <br>
                  <h4 align="center">
                    Harga : <b>Rp <?= number_format($row['harga'],0,',','.') ?>,- / Unit</b>
                  </h4>
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
