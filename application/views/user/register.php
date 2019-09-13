<?php 
if($this->session->userdata('session_sop')) {
  header('Location: '.base_url());
}
?>
<div class="content-wrapper">
  <div class="container"> 
    <section class="content">
      <div class="row" align="center"> 
        <h1><i class="fa fa-user"></i> Mendaftar </h1>
        <small>Mohon isi Form Berikut !</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-3 col-sm-2 col-xm-12">
        </div>
        <div class="col-md-6 col-sm-8 col-xm-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form action="<?= base_url('user/register_proses') ?>" method="POST" id="register_form">
                <div class="show_error" id="register_error_input"></div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="dt[name]" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="dt[email]" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" name="dt[jk]" style="width: 100%">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Warga Negara</label>
                  <select class="form-control select2" name="dt[wrg_negara]" style="width: 100%">
                    <option value="">--Pilih Warga Negara--</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <input type="text" name="dt[tpt_lahir]" class="form-control" placeholder="Masukan Tempat Lahir">
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" name="dt[tgl_lahir]" class="form-control" id="datepicker" placeholder="Masukan Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="dt[alamat]" class="form-control" placeholder="Masukan Alamat" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <label>Kode Pos</label>
                  <input type="text" name="dt[kode_pos]" class="form-control" placeholder="Masukan Kode Pos" value="<?= $user['kode_pos']?>">
                </div>
                <div class="form-group">
                  <label>Sumber Dana</label>
                  <select class="form-control select2" name="dt[sumberdana_id]" style="width: 100%">
                    <option value="">--Pilih Sumber Dana--</option>
                    <?php 
                    $tbl_sumberdana = $this->mymodel->selectData("tbl_sumberdana"); foreach ($tbl_sumberdana as $key => $value) 
                    { ?>
                      <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Penghasilan Bulanan</label>
                  <select class="form-control select2" name="dt[gaji_id]" style="width: 100%">
                    <option value="">--Pilih Penghasilan Bulanan--</option>
                    <?php 
                    $tbl_gaji = $this->mymodel->selectData("tbl_gaji"); foreach ($tbl_gaji as $key => $value) 
                    { ?>
                      <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Bank</label>
                  <select class="form-control select2" name="dt[bank_id]" style="width: 100%">
                    <option value="">--Pilih Bank--</option>
                    <?php 
                    $tbl_bank = $this->mymodel->selectData("tbl_bank"); foreach ($tbl_bank as $key => $value) 
                    { ?>
                      <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>No Rekening</label>
                  <input type="text" name="dt[no_rek]" class="form-control" placeholder="Masukan No Rekening" value="<?= $user['no_rek']?>">
                </div>
                <button type="submit" class="btn btn-block btn-primary" id="send-btn">
                  <i class="fa fa-user"> </i> Daftar
                </button>
                <p class="help-block pull-right">Sudah punya akun ? <a href="#" data-toggle="modal" data-target="#modal-login">Login Disini </a></p>
                <br>
                <hr>
              </form>
              <h4 align="center">atau</h4>
              <div class="row">
                <div class="col-md-12" align="center">
                  <a href="<?=$this->google_url?>" class="btn btn-block btn-social btn-login btn-md">
                    <img src="http://transformations-spafitness.com/wp-content/uploads/2013/11/google-logo-icon-PNG-Transparent-Background-1.png">
                    <div class="row" align="center">
                      Masuk Dengan Google
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-2 col-xm-12">
        </div>
      </div>
    </section>
  </div>
</div>

<script type="text/javascript">
  $("#register_form").submit(function(){
    var form = $(this);
    var mydata = new FormData(this);
    $.ajax({
      type: "POST",
      url: form.attr("action"),
      data: mydata,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend : function(){
        $("#btn-send").addClass("disabled").html("<i class='la la-spinner la-spin'></i>  Processing...").attr('disabled',true);
        form.find("#register_error_input").slideUp().html("");
      },

      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          form.find("#register_error_input").hide().html(response).slideDown("fast");
          $("#btn-send").removeClass("disabled").html('<i class="fa fa-user"> </i> Daftar').attr('disabled',false);
        }else{
          form.find("#register_error_input").hide().html(response).slideDown("fast");
          $("#btn-send").removeClass("disabled").html('<i class="fa fa-user"> </i> Daftar').attr('disabled',false);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr);
        $("#btn-send").removeClass("disabled").html('<i class="fa fa-user"> </i> Daftar').attr('disabled',false);
        form.find("#register_error_input").hide().html(xhr).slideDown("fast");
      }
    });
    return false;
  });
</script>