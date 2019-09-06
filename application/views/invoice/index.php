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
                    <button id="cetak" type="button" class="btn btn-success btn-sm round">
                      <i class="fa fa-check"></i> Masih Ada
                    </button>
                  </h3>
                </div>
                <div class="box-body" align="center">
                  <h1><b>24 : 21 : 13</b></h1>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-header with-border">
                  <h3 class="box-title pull-left">Total Donasi</h3>
                </div>
                <div class="box-body" align="center">
                  <h1><b>Rp <?= number_format(46000000,0,',','.'); ?>,-</b></h1>
                </div>
              </div>
            </div>
          </div>
                      <a > <button  type="button" class="btn btn-warning btn-block btn-lg round">
                        <i class="fa fa-credit-card"></i> Menunggu Pembayaran
                      </button></a>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-solid round">
                <div class="box-header with-border">
                  <h3 class="box-title pull-left">Rincian Invoice</h3>
                  <h3 class="box-title pull-right">
                    <button id="cetak" type="button" class="btn btn-primary btn-sm round">
                      <i class="fa fa-print"></i> Cetak Invoice
                    </button>
                  </h3>
                </div>
                <div class="box-body">
                  <h3>Nama Donasi</h3>
                  <table class="table table-bordered">
                    <tr>
                      <th>Kode Invoice</th>
                      <th>asdasdqw341231234</th>
                    </tr>
                    <tr>
                      <th>Judul Proyek</th>
                      <th>Pembudidayaan Sakura</th>
                    </tr>
                    <tr>
                      <th>Nama Pelanggan</th>
                      <th>Bambang</th>
                    </tr>
                    <tr>
                      <th>Email Pelanggan</th>
                      <th>bambang@gmail.com</th>
                    </tr>
                    <tr>
                      <th>No Telpon Pelanggan</th>
                      <th>02812392012</th>
                    </tr>
                    <tr>
                      <th>Tanggal Mendonasi</th>
                      <th><?=date('Y-m-d H:i:s', strtotime('02-02-2019 23:13:12'))?></th>
                    </tr>
                    <tr>
                      <th>Tanggal Kadarluasa</th>
                      <th><?=date('Y-m-d H:i:s', strtotime('02-02-2019 23:13:12'))?></th>
                    </tr>
                    <tr>
                      <th>Metode Pembayaran</th>
                      <th>Payment Banking</th>
                    </tr>
                    <tr>
                      <th>Panduan Pembayaran</th>
                      <th>
                        <a href="#"class="btn btn-success btn-sm round" target="_blank">Download</a>
                      </th>
                    </tr>
                    <tr>
                      <th>Total Donasi</th>
                      <th>Rp <?= number_format(46000000,0,',','.'); ?>,-</th>
                    </tr>
                    <tr>
                      <th>Biaya Admin</th>
                      <th>Rp <?= number_format(0,0,',','.'); ?>,-</th>
                    </tr>
                  </table>
                  <hr>
                  <span> * Lakukan <b>Pembayaran</b> sesuai dengan nominal <b>Total Donasi</b> yang ada pada invoice ini.</span>
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
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
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
	var countDownDate = new Date("<?=$expiredDate?>").getTime();
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