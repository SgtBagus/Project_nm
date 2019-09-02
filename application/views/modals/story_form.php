<h3 align="center"> Masukan Detail Cerita Anda</h3>
<form action="<?= base_url('story')?>/create" method="POST" id="sumbit_form">
  <div class="show_error" id="show_alert">
    
  </div>
  <div class="form-group">
    <label>Judul Cerita</label>
    <input type="text" name="dt[judul]" class="form-control" placeholder="Masukan Judul Cerita...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Foto Profil</label>
    <div class="row">
      <div class="col-md-8" align="center">
        <img src="https://cdn.lifehack.org/wp-content/uploads/2013/04/33.jpg" class="round" alt="User Image" width="350px" height="230px" id="preview_image">
      </div>
      <div class="col-md-4">
        <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
        <input type="file" class="file" id="imageFile" style="display: none;" name="dt[gambar_cerita]"/>
        <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label>Deskripsi Singkat Cerita : </label>
    <textarea class="form-control" rows="3" name="dt[deskripsi]" placeholder="Masukan Deskripsi Singkat Cerita !"></textarea>
  </div>
  <div class="row">
    <div class="col-md-6" align="left">
      <button type="button" class="btn pull-left btn-block btn-md btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
    </div>
    <div class="col-md-6" align="right">
      <button type="submit" class="btn btn-block pull-right btn-md btn-primary" id="save"><i class="fa fa-save"></i> Simpan</button>
    </div>
  </div>
</form> 

<script type="text/javascript">
  $("#sumbit_form").submit(function(){
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
        $("#save").addClass("disabled").html("Processing...").attr('disabled',true);
        form.find("#show_alert").slideUp().html("");
      },
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          form.find("#show_alert").hide().html(response).slideDown("fast");
          setTimeout(function(){ 
           window.location.href = "<?= base_url('dashboard/story') ?>";
         }, 1000);
          $("#save").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
        }else{
          form.find("#show_alert").hide().html(response).slideDown("fast");
          $("#save").removeClass("disabled").html('<i class="fa fa-save"></i> Simpan').attr('disabled',false);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr);
        $("$save").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        form.find("#show_alert").hide().html(xhr).slideDown("fast");
      }
    });
    return false;
  });
</script>