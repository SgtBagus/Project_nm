<div class="row">
    <div class="col-md-12">
        <br>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="row" align="center">
                            <h3><b>Investasi Di Terima</b></h3>
                        </div>
                        <table id="datatable" class="table table-bordered table-striped" >
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Project</th>
                                <th>Banyak Unit</th>
                                <th>Harga per Unit</th>
                                <th>Total Harga</th>
                                <th>Tgl Mengajukan</th>
                                <th>Tgl Kadarluasa</th>
                                <th>Tgl Pembayaran</th>
                                <th>Metode</th>
                                <th>Tgl Konfirmasi</th>
                                <th>Status Pembarayan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($invest as $row) {
                                $project =  $this->mymodel->selectDataOne('tbl_project', array('id' => $row['project_id'] ));
                                ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><b><?= $row['code'] ?></b></td>
                                    <td><?= $project['title']?></td>
                                    <td><?= $row['unit']?></td>
                                    <td><b>Rp <?= number_format($project['harga'],0,',','.') ?></b></td>
                                    <td><b>Rp <?= number_format($row['total_harga'],0,',','.') ?>,-</b></td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($row['created_at']))  ?></td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($row['tgl_kadarluasa'])) ?></td>
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
                                        <?php if ($row['status_pembayaran'] == 'WAITING') {
                                            echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
                                        }else if ($row['status_pembayaran'] == 'APPROVE') {
                                            echo '<small class="label bg-green"><i class="fa fa-check"> </i> Di Terima </small>';
                                        }else{
                                            echo '<small class="label bg-red"><i class="fa fa-ban"> </i> Di Tolak </small>';
                                        }?>
                                    </td>
                                    <td>
                                        <?php if (!$row['tgl_konfirmasi']) {
                                            echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                                        }else {
                                            echo date("d-m-Y", strtotime($row['tgl_konfirmasi']));
                                        }?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('/project/view/').$project['slug'] ?>">
                                            <button class="btn btn-info btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a target="_blank" href="<?= base_url('invoice/payment/').$row['code']?>" target="_blank">
                                            <button class="btn btn-primary btn-xs">
                                                <i class="fa fa-print"></i>
                                            </button>
                                        </a>
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


  <div class="modal modal-default fade" id="modal-delete" style="display: none;">
    <div class="modal-dialog round">
      <div class="modal-content round">
        <div class="modal-header top-round bg-red">
          <h4 class="modal-title" align="center"><i class="fa fa-trash"></i> Hapus Cerita</h4>
        </div>
        <div class="modal-body">
          <?php
          $this->load->view('modals/delete_form');
          ?>
        </div>
      </div>
    </div>
  </div>