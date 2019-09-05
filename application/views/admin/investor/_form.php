<?php 
$action = base_url('admin/investor/store');

if($data_edit){
  $action = base_url('admin/investor/update');
}

?>

<form method="POST" action="<?= $action ?>" id="upload-create" enctype="multipart/form-data">
  <div class="box-body">
    <div class="show_error"></div>
    <div class="form-group">
      <label for="form-name">Name</label>
      <input type="text" class="form-control" id="form-name" placeholder="Masukan Name" name="dt[name]" <?php if($data_edit){ echo "value='".$data_edit['name']."'"; } ?>>
    </div>
    <div class="form-group">
      <label for="form-email">Email</label>
      <input type="text" class="form-control" id="form-email" placeholder="Masukan Email" name="dt[email]" <?php if($data_edit){ echo "value='".$data_edit['email']."'"; } ?>>
    </div>
    <div class="form-group">
      <label for="form-address">Address</label>
      <textarea name="dt[address]" class="form-control"> <?php if($data_edit){ echo $data_edit['address']; } ?> </textarea>
    </div>
    <div class="form-group">
      <label for="form-phone">Phone</label>
      <input type="text" class="form-control" id="form-phone" placeholder="Masukan Phone" name="dt[phone]" <?php if($data_edit){ echo "value='".$data_edit['phone']."'"; } ?>>
    </div>

    <?php
    if($file){
      if($file['dir']!=""){
        $types = explode("/", $file['mime']);
        if($types[0]=="image"){ ?>
          <img src="<?= base_url($file['dir']) ?>" style="width: 200px" class="img img-thumbnail">
          <br>
        <?php }else{ ?>
          <i class="fa fa-file fa-5x text-danger"></i>
          <br>
          <a href="<?= base_url($file['dir']) ?>" target="_blank"><i class="fa fa-download"></i> <?= $file['name'] ?></a>
          <br>
          <br>
        <?php } 
      } 
    } ?>

    <div class="form-group">
      <label for="form-file">File</label>
      <input type="file" class="form-control" id="form-file" placeholder="Masukan File" name="file">
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
  </div>
</form>

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
            window.location.href = "<?= base_url('admin/investor') ?>"; 
          }, 1000);

          $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        }else{
          form.find(".show_error").hide().html(response).slideDown("fast");
          $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr);
        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        form.find(".show_error").hide().html(xhr).slideDown("fast");
      }
    });
    return false;
  });
</script>