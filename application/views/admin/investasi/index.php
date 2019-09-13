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
                      <td>
                        <a href="<?= base_url('admin/investor/view/').$investor['id'] ?>">
                          <?= $investor['name'] ?>
                        </a>
                      </td>
                      <td><?= $row_invest['unit'] ?></td>
                      <td><b>Rp <?= number_format($project['harga'],0,',','.') ?></b></td>
                      <td><b>Rp <?= number_format($row_invest['total_harga'],0,',','.') ?>,-</b></td>
                      <td><?= date("d-m-Y H:i:s", strtotime($row_invest['created_at']))  ?></td>
                      <td><?= date("d-m-Y H:i:s", strtotime($row_invest['tgl_kadarluasa'])) ?></td>
                      <td>
                        <?php if (!$row_invest['tgl_pembayaran']) {
                          echo "<p class='help-block'><i>Belum Tersedia</i></p>";
                        }else {
                          echo date("d-m-Y H:i:s", strtotime($row_invest['tgl_pembayaran']));
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
                            echo '<small class="label bg-yellow"><i class="fa fa-warning"> </i> Menunggu Dikonfirmasi </small>';
                            if($this->session->userdata('role_id') == '17'){
                              echo '<hr>
                              <div class="row" align="center">
                              <button type="button" class="btn btn-send btn-approve btn-sm btn-sm btn-primary" onclick="approve('.$row_invest['id'].')"><i class="fa fa-check-circle"></i></button>
                              <button type="button" class="btn btn-send btn-reject btn-sm btn-sm btn-danger" onclick="reject('.$row_invest['id'].')"><i class="fa fa-ban"></i></button>
                              </div>';
                            }
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
  </section>
</div>
<script type="text/javascript">

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