<h3 align="center"> Ingin Menginvestasi Berapa Unit ?</h3>
<form class="form-horizontal" action="<?= base_url('project/invest') ?>" method="POST">
  <div class="form-group" align="center">
    <h4>Harga : <b>Rp 4.800.000,-</b> / Unit</h4>
    <small>Sisa Slot : <b>120</b> </small>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Unit*</label>
    <div class="col-sm-9">
      <input type="number" name="dt[unit]" id="unit_proyek" class="form-control" id="unit" placeholder="Masukan Unit..">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Total Harga Proyek*</label>
    <div class="col-sm-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-money"></i> Rp. 
        </div>
        <input type="text" name="dt[total_harga]" id="total_proyek" class="number-separator form-control" readonly="true">
      </div>
    </div>
  </div>
  <div class="row" align="center">
    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
      <a href="<?=  base_url('story/view/1') ?>">
        <button type="button" class="btn btn-block btn-danger btn-md round">
          <i class="fa fa-close"></i> Batalkan
        </button>
      </a>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;"> 
      <button type="submit" class="btn btn-block btn-primary btn-md round">
        <i class="fa fa-send"></i> Kirim
      </button>
    </div>
  </div>
</form>
<script type="text/javascript">
  $(function () {

    var harga = 0
    var unit = 0

    $('#total_proyek').val('Total Harga');

    $('#unit_proyek').keyup(function(){
      if($('#unit_proyek').val() >= 120 ){
        var unit = $('#unit_proyek').val('120');
      }else{
        var harga = parseFloat('4800000'.replace(/,/g, ''));
        var unit = $('#unit_proyek').val();
        $('#total_proyek').val(formatNumber(harga*unit));        
      }
    })
  });

</script>