<div class="content-wrapper">
  <section class="content-header">
    <h1> Investasi </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Investasi</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-body">
            <div class="show_error"></div>
            <table id="datatable" class="table table-bordered table-striped" >
              <thead>
                <tr class="bg-success">
                  <th>No</th>
                  <th>Code</th>
                  <th>Project</th>
                  <th>Investor</th>
                  <th>Banyak Unit</th>
                  <th>Total Harga</th>
                  <th>Status Invest</th>
                  <th>Tgl Pembayaran</th>
                  <th>Tgl Konfirmasi</th>
                  <th>Tgl Kadarluasa</th>
                  <th>Status Pembarayan</th>
                  <th>Metode</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($tbl_project_invest as $row_invest) { 
                  $project =  $this->mymodel->selectDataOne('tbl_project', array('id' => $row_invest['project_id'] ));
                  $investor =  $this->mymodel->selectDataOne('tbl_investor', array('id' => $row_invest['investor_id'] ));?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $row_invest['code'] ?></td>
                    <td><?= $project['title'] ?></td>
                    <td><?= $investor['name'] ?></td>
                    <td><?= $row_invest['unit'] ?></td>
                    <td>Rp <?= number_format($row_invest['total_harga'],0,',','.') ?>,-</td>
                    <td>
                      <?= $row_invest['status_invest'] ?>
                      <div class="row" align="center">
                        <button type="button" class="btn btn-sm btn-sm btn-primary"><i class="fa fa-check-circle"></i></button>
                        <button type="button" class="btn btn-sm btn-sm btn-danger"><i class="fa fa-ban"></i></button>
                      </div>
                    </td>
                    <td><?= date("d-m-Y", strtotime($row_invest['created_at']))  ?></td>
                    <td>
                      <?php if (!$row_invest['tgl_konfirmasi']) {
                        echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                      }else {
                        echo date("d-m-Y", strtotime($row_invest['tgl_konfirmasi']));
                      }?>
                    </td>
                    <td>
                      <?php if (!$row_invest['tgl_kadarluasa']) {
                        echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                      }else {
                        echo date("d-m-Y", strtotime($row_invest['tgl_kadarluasa']));
                      }?>
                    </td>
                    <td>
                      <?php if (!$row_invest['status_pembayaran']) {
                        echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                      }else {
                        echo $row_invest['status_pembayaran'];
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
                      <button type="button" class="btn btn-sm btn-sm btn-info"><i class="fa fa-print"></i> Invoice</button>
                    </td>
                  </tr>
                  <?php $i++; }  ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-6">
                  <button type="button" class="btn btn-block btn-sm btn-sm btn-danger"><i class="fa fa-ban"></i> TOLAK SEMUA</button>
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-block btn-sm btn-sm btn-primary"><i class="fa fa-check-circle"></i> TERIMA SEMUA</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>