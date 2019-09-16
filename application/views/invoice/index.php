<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-BwKVZAEn_uaPXdIe"></script>
<form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
  <input type="hidden" name="result_type" id="result-type" value=""></div>
  <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row" align="center"> 
        <a class="btn btn-info round" href="javascript:close();">Tutup Invoice</a>
        <h1><i class="fa fa-credit-card"></i> Invoice </h1>
        <small>Selesaikan Pembayaran Anda ! </small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-5 col-sm-5 col-xs-12">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-header with-border">
                  <h3 class="box-title pull-left">Sisa Waktu</h3>
                  <h3 class="box-title pull-right">
                    <?php if($invoice['status_pembayaran'] == "APPROVE") { ?>
                      <span type="button" class="btn-primary btn-sm round">
                        <i class="fa fa-check"></i> Di Terima
                      </span>
                    <?php }else if($invoice['status_pembayaran'] == "REJECT") { ?>
                      <span type="button" class="btn-danger btn-sm round">
                        <i class="fa fa-check"></i> Sudah Tidak ada
                      </span>
                    <?php }else { ?>
                      <span type="button" class="btn-success btn-sm round">
                        <i class="fa fa-check"></i> Masih Ada
                      </span>
                    <?php } ?>
                  </h3>
                </div>
                <div class="box-body" align="center">
                  <?php if($invoice['status_pembayaran'] == "APPROVE") { ?>
                    <h1><b>DITERIMA</b></h1>
                  <?php }else if($invoice['status_pembayaran'] == "REJECT") { ?>
                    <h1><b>DITOLAK</b></h1>
                  <?php }else { ?>
                    <h1><b id="countDownKadarluasa">00 : 00 : 00</b></h1>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-header with-border">
                  <h3 class="box-title pull-left">Total Investasi</h3>
                </div>
                <div class="box-body" align="center">
                  <h1><b>Rp <?= number_format($invoice['total_harga'],0,',','.'); ?>,-</b></h1>
                </div>
              </div>
            </div>
          </div>
          <span type="button" class="btn-block btn-primary btn-lg round" align="center">
            <i class="fa fa-credit-card"></i> Bayar Sekarang
          </span>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-header with-border">
                  <h3 class="box-title pull-left">Rincian Invoice</h3>
                  <h3 class="box-title pull-right">
                    <span id="cetak" type="button" class="btn-primary btn-sm round">
                      <i class="fa fa-print"></i> Cetak Invoice
                    </span>
                  </h3>
                </div>
                <div class="box-body">
                  <h3>Nama Investasi</h3>
                  <table class="table table-bordered">
                    <tr>
                      <th>Kode Invoice</th>
                      <td><b><?= $invoice['code'] ?></b></td>
                    </tr>
                    <tr>
                      <th>Judul Proyek</th>
                      <td><?= $project['title'] ?></td>
                    </tr>
                    <tr>
                      <th>Nama Pelanggan</th>
                      <td><?= $investor['name'] ?></td>
                    </tr>
                    <tr>
                      <th>Email Pelanggan</th>
                      <td><?= $investor['email'] ?></td>
                    </tr>
                    <tr>
                      <th>No Telpon Pelanggan</th>
                      <td><?= $investor['phone'] ?></td>
                    </tr>
                    <tr>
                      <th>Tanggal Mengajukan Pembayaran</th>
                      <td><?=date('Y-m-d H:i:s', strtotime($invoice['created_at']))?></td>
                    </tr>
                    <tr>
                      <th>Tanggal Kadarluasa</th>
                      <td><?=date('Y-m-d H:i:s', strtotime($invoice['tgl_kadarluasa']))?></td>
                    </tr>
                    <tr>
                      <th>Metode Pembayaran</th>
                      <td>Payment Banking</td>
                    </tr>
                    <tr>
                      <th>Panduan Pembayaran</th>
                      <td>
                        <a href="#"class="btn btn-success btn-sm round" target="_blank">Download</a>
                      </td>
                    </tr>
                    <tr>
                      <th>Total Unit</th>
                      <td><b><?= $invoice['unit']; ?></b></td>
                    </tr>
                    <tr>
                      <th>Harga per Unit</th>
                      <td><b>Rp <?= number_format($project['harga'],0,',','.'); ?>,-</b></td>
                    </tr>
                    <tr>
                      <th>Total Harga</th>
                      <td><b>Rp <?= number_format($invoice['total_harga'],0,',','.'); ?>,-</b></td>
                    </tr>
                    <tr>
                      <th>Biaya Admin</th>
                      <th><b>Rp <?= number_format(0,0,',','.'); ?>,-</b></th>
                    </tr>
                  </table>
                  <hr>
                  <span> * Lakukan <b>Pembayaran</b> sesuai dengan nominal <b>Total Investasi</b> pada invoice ini.</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>


<script type="text/javascript">

  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
    
    $.ajax({
      url: '<?=base_url()?>Snap/token?code=<?=$this->uri->segment(2)?>',
      cache: false,

      success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
      }

      snap.pay(data, {

        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
  });

</script>

<script>
  // Set the date we're counting down to
  var countDownDate = new Date("<?=$invoice['tgl_kadarluasa']?>").getTime();
  //alert(countDownDate);2018-09-07 16:29:17
  //alert("2018-09-07 16:29:17");
  // Update the count down every 1 second
  var x = setInterval(function () {

    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("countDownKadarluasa").innerHTML = hours + " : " +minutes + " : " + seconds;

    // If the count down is over, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("countDownKadarluasa").innerHTML = "Kadaluarsa";
    }
  }, 1000);
</script>

<script>
  $('#cetak').click(function(){
   window.print();
 });
</script>