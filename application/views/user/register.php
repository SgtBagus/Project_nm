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
                <div class="show_error" id="register_error_input">

                </div>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="dt[name]" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="dt[email]" class="form-control">
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