<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b>Pembudidayaan Bunga Sakura</b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <img src="https://i.etsystatic.com/14036052/r/il/f3b876/1124957092/il_794xN.1124957092_bgb2.jpg" alt="Second slide" style="height: 390px; width: 100%" class="round">
          <br><br>
          <p style="text-indent: 10px;"><?= $row['deskripsiGalang'] ?></p>
        </div>
        <div class="col-md-4">
          <div class="box box-solid round">
            <div class="box-body" align="center">
              <h2><b>Rp 4,800,000 / Unit</b></h2>
            </div>
          </div>
          <br>
          Penggalangan dana dimulai <b><?= $row['dibuat'] ?></b> oleh:
          <br><br>
          <a href="<?= base_url('/profildesa/'.$row['idUser']) ?>" class="a_black">
            <div class="box box-solid round">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-4" align="center">
                    <img src="<?= $admin_url.$row['foto']?>" class="img-circle" alt="User Image" width="80px" height="80px">
                  </div>
                  <div class="col-md-8">
                    <h4><b><?= $row['namaPenggalang'] ?> </b></h4>
                    <small><?= $row['desa_value'] ?></small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_detail_1" data-toggle="tab" aria-expanded="false">Detail</a></li>
                  <li class=""><a href="#tab_detail_2" data-toggle="tab" aria-expanded="false">Update</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_detail_1">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-8 col-sm-8 col-xs-12">
                            <p>
                              <?= $row['detailGalang'] ?>
                            </p>
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <h4>Donatur :</h4>
                            <div class="nav-tabs-custom">
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_donatur_1" data-toggle="tab" aria-expanded="false">Online</a></li>
                                <li class=""><a href="#tab_donatur_2" data-toggle="tab" aria-expanded="false">Offline</a></li>
                              </ul>
                              <div class="tab-content">
                                <div class="tab-pane active" id="tab_donatur_1">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <?php foreach($donaturwaktu as $row){ ?>
                                        <a href="<?= base_url('/profil/'.$row['id']) ?>" class="a_black">
                                          <div class="row">
                                            <div class="col-md-4" align="center">
                                              <img src="<?= base_url().$row['fotoUser']?>" class="img-circle" alt="User Image" width="80px" height="80px">
                                            </div>
                                            <div class="col-md-8">
                                              <h3><b>Rp <?= number_format($row['nominalDonasi'],0,',','.'); ?>,-</b></h3>
                                              <h5>
                                                <b>
                                                  <?php
                                                  if($row['statusDonatur'] == 1){
                                                    echo $row['namaUser'];
                                                  } 
                                                  else{
                                                    echo 'Anonim';
                                                  }
                                                  ?>
                                                </b>
                                              </h5>
                                            </div>
                                          </div>
                                        </a>
                                        <hr/>
                                      <?php } ?>
                                      <br>
                                      <div class="row">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-search"></i> Tampilkan lebih Banyak</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane" id="tab_donatur_2">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <?php foreach($donaturoff as $row){ ?>
                                        <a href="" class="a_black">
                                          <div class="row">
                                            <div class="col-md-4" align="center">
                                              <img src="<?= base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="80px" height="80px">
                                            </div>
                                            <div class="col-md-8">
                                              <h3><b>Rp <?= number_format($row['nominalDonasi'],0,',','.'); ?>,-</b></h3>
                                              <h5>
                                                <b>
                                                  <?php
                                                  if($row['statusDonatur'] == 1){
                                                    echo $row['namaDonatur'];
                                                  } 
                                                  else{
                                                    echo 'Anonim';
                                                  }
                                                  ?>
                                                  (Offline Donatur)
                                                </b>
                                              </h5>
                                            </div>
                                          </div>
                                        </a>
                                      <?php } ?>
                                      <br>
                                      <div class="row">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg round"><i class="fa fa-search"></i> Tampilkan lebih Banyak</button>
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
                  <div class="tab-pane" id="tab_detail_2">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row" align="center">
                          <h3><b>Update Terbaru</b></h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Dana Terpakai</th>
                                <th>Pemberita</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              if($updategalang == null){?>
                                <tr>
                                  <td colspan="5" align="center">
                                    <img src='https://icon-library.net/images/no-data-icon/no-data-icon-20.jpg' width='100px' height='100px'><p><b>Tidak Ada Data</b><p>
                                    </td>
                                  </tr>
                                <?php } else {
                                  $no = 1;
                                  foreach($updategalang as $row){ ?>
                                    <tr>
                                      <td><?= $no++ ?></td>
                                      <td><?= $row['tglupdate'] ?></td>
                                      <td><?= $row['deskripsiUpdate'] ?></td>
                                      <td><?= $row['nominalterpakai'] ?></td>
                                      <td><?= $row['name'] ?></td>
                                    </tr>
                                  <?php } 
                                }
                                ?>
                              </tbody>
                            </table>
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
        <div class="row" align="center">
          <div class="col-md-12">
            <button type="button" class="btn btn-block btn-primary btn-lg round" data-toggle="modal" data-target="#modal-donate">
              <i class="fa fa-credit-card"></i> Donasi Sekarang
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<div class="modal modal-default fade" id="modal-donate" style="display: none;">
  <div class="modal-dialog round">
    <div class="modal-content round">
      <div class="modal-header top-round bg-green">
        <h4 class="modal-title" align="center"><i class="fa fa-credit-card"></i> Donasi Sekarang</h4>
      </div>
      <div class="modal-body">
        <?php
        if($this->session->userdata('session_sop') == true){
          $this->load->view('modals/donate_form');
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