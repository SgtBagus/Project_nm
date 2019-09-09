<div class="row">
    <div class="col-md-12">
        <br>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="upload-create">
                            <div class="show_error"></div>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_accountr" data-toggle="tab" aria-expanded="false">Akun</a></li>
                                    <li class=""><a href="#tab_image" data-toggle="tab" aria-expanded="false">Foto Profil</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_accountr">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                                        <input type="text" name="dt[name]" class="form-control" id="username" placeholder="Masukan Nama Lengkap" value="<?= $user['name']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nomor Whatsapp</label>
                                                        <input type="number" name="dt[phone]" class="form-control" placeholder="Masukan Nomor Whatsapp" value="<?= $user['phone']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" name="dt[email]" class="form-control" id="useremail" placeholder="Masukan Email" value="<?= $user['email']?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_image">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Foto Profil</label>
                                            <div class="row">
                                                <div class="col-md-5" align="center">
                                                    <img src="<?= base_url().$file['dir'] ?>"   class="img-circle" alt="User Image" width="250px" height="250px" id="preview_image">
                                                </div>
                                                <div class="col-md-7">
                                                    <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
                                                    <input type="file" class="file" id="imageFile" style="display: none;" name="file"/>
                                                    <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary btn-send"><i class="fa fa-edit"></i> Ubah Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

  $("#upload-create").submit(function(){
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
        $(".btn-send").addClass("disabled").html("<i class='la la-spinner la-spin'></i>  Processing...").attr('disabled',true);
        form.find(".show_error").slideUp().html("");
    },

    success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          form.find(".show_error").hide().html(response).slideDown("fast");
          setTimeout(function(){ 
            location.reload();
        }, 1000);

          $(".btn-send").removeClass("disabled").html('<i class="fa fa-edit"></i> Ubah Akun').attr('disabled',false);
      }else{
          form.find(".show_error").hide().html(response).slideDown("fast");
          $(".btn-send").removeClass("disabled").html('<i class="fa fa-edit"></i> Ubah Akun').attr('disabled',false);
      }
  },
  error: function(xhr, textStatus, errorThrown) {
    console.log(xhr);
    $(".btn-send").removeClass("disabled").html('<i class="fa fa-edit"></i> Ubah Akun').attr('disabled',false);
    form.find(".show_error").hide().html(xhr).slideDown("fast");
}
});
    return false;
});
</script>