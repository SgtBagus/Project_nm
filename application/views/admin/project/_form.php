<?php 
$action = base_url('admin/project/store');

if($data_edit){
  $action = base_url('admin/project/update');
}

?>

<form method="POST" action="<?= $action ?>" id="upload-create" enctype="multipart/form-data" class="form-horizontal">
  <div class="box-body">
    <div class="show_error"></div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Judul Proyek*</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Masukan Judul Proyek ..." name="dt[title]" id="judul" <?php if($data_edit){echo "value='".$data_edit['title']."'"; }  ?>> 
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Slug Proyek*</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Slug Proyek Diambil Sesuai Judul" name="dt[slug]" id="slug" <?php if($data_edit){echo "value='".$data_edit['slug']."'"; }  ?>>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Gambar Proyek</label>
      <div class="col-sm-9">
        <div class="row"> 
          <div class="col-md-4 col-xs-12">
            <?php
            if($file){
              if($file['dir']!=""){
                ?>
                <img src="<?= base_url().$file['dir'] ?>" class="round" alt="User Image" width="100%" height="250px" id="preview_image">
                <?php
              } 
            } else{
              ?>
              <img src="https://cdn.lifehack.org/wp-content/uploads/2013/04/33.jpg" class="round" alt="User Image" width="100%" height="250px" id="preview_image">
              <?php
            }?>
          </div>
          <div class="col-md-8 col-xs-12">
            <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
            <input type="file" class="file" id="imageFile" style="display: none;" name="file" accept="image/x-png,image/jpeg,image/jpg" />
            <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box-body">
              <table class="table table-bordered" style="width: 100%">
                <thead style="font-weight: bold;">
                  <tr>
                    <th style="width: 300px">Gambar</th>
                    <th>Nama File</th>
                  </tr>
                </thead>
                <tbody id="detail_image_open">
                  <?php
                  if($file_detail){
                    $i = 1;
                    foreach($file_detail as $img){
                      ?>
                      <tr id="detail_image_edit">
                        <td>
                          <img src="<?= base_url().$img['dir']?>" class="round" alt="User Image" height="150px" style="margin: 15px">
                        </td>
                        <td>Gambar Ke-<?= $i ?></td>
                      </tr>
                      <?php
                      $i++;
                    }
                  }?>
                  <td colspan="2" align="center" id="btn_image_add">
                    <?php if($file_detail){ ?>
                      <button type="button" class="btn btn-sm btn-primary" id="btnFile-many_edit"><i class="fa fa-file"></i> Ubah Detail Gambar</button>
                    <?php } else {?>
                      <button type="button" class="btn btn-sm btn-primary" id="btnFile-many"><i class="fa fa-file"></i> Masukan Gambar Lainnya</button>
                    <?php } ?>
                    <input type="file" id="uploadFile" name="file_many[]" style="display: none" multiple accept="image/x-png,image/jpeg,image/jpg" />
                    <p class="help-block">Detail Gambar Bisa Multi Select</p>
                  </td>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Harga Proyek*</label>
      <div class="col-sm-5">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-money"></i> Rp. 
          </div>
          <input type="text" name="dt[harga]" id="harga_proyek" class="number-separator form-control" placeholder="Masukan Nominal uang.." <?php if($data_edit){echo "value='".number_format($data_edit['harga'],0,',',',')."'"; }  ?>>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group">
          <input type="number" name="dt[unit]" id="unit_proyek" class="form-control" id="unit" placeholder="Masukan Unit.." <?php if($data_edit){echo "value='".$data_edit['unit']."'"; }  ?>>
          <span class="input-group-addon">Unit</span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Total Harga Proyek*</label>
      <div class="col-sm-9">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-money"></i> Rp. 
          </div>
          <input type="text" name="dt[total_harga]" id="total_proyek" class="number-separator form-control" readonly="true">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Detail* : </label>
      <div class="col-sm-9">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Periode*</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="number" class="form-control" name="dt[periode]" <?php if($data_edit){echo "value='".$data_edit['periode']."'"; }  ?>>
              <span class="input-group-addon">Tahun</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Return Didapat*</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="number" class="form-control" name="dt[return]" <?php if($data_edit){echo "value='".$data_edit['return']."'"; }  ?>>
              <span class="input-group-addon">% Per tahun</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Periode Bagi Hasil*</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="number" class="form-control" name="dt[bagi_hasil]" <?php if($data_edit){echo "value='".$data_edit['bagi_hasil']."'"; }  ?>>
              <span class="input-group-addon">Tahun</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi </label>
      <div class="col-sm-10">
        <textarea class="textarea form-control" name="dt[deskripsi]"><?php if($data_edit){echo $data_edit['deskripsi']; }  ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Url Google Maps </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="dt[url_map]" <?php if($data_edit){echo $data_edit['url_map']; } ?>>
        <p class="help-block">Salin Url Lokasi anda melalui Google Maps untuk menampilkan peta Lokasi</p>
      </div>
    </div>
  </div>
  <div class="box-footer" align="right">
    <a href="<?= base_url('admin/project') ?> ">
      <button type="button" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</button>
    </a>
    <?php if($data_edit){ ?>
      <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-edit"></i> Edit</button>
    <?php } else { ?>
      <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>
    <?php } ?>
  </div>
</form>

<script type="text/javascript">
  $(function () {

    <?php if($data_edit){ ?>
      $('#total_proyek').val('<?php echo number_format($data_edit['total_harga'],0,',',',') ?>');
    <?php }else { ?>
      $('#total_proyek').val('Masukan Harga Proyek dan Unit untuk Melihat Total Harga Proyek');
    <?php } ?>

    $('#judul').keyup(function(){
      var title = $('#judul').val();
      $('#slug').val(slugify(title));
    })

    $('#slug').change(function(){
      var slug = $('#slug').val();
      $('#slug').val(slugify(slug));
    })

    var harga = 0
    var unit = 0

    $('#harga_proyek').keyup(function(){
      if($('#unit_proyek').val() != null){
        var harga = parseFloat($('#harga_proyek').val().replace(/,/g, ''));
        var unit = $('#unit_proyek').val();
        $('#total_proyek').val(formatNumber(harga*unit));        
      }
    })

    $('#unit_proyek').keyup(function(){
      if($('#harga_proyek').val() != null){
        var harga = parseFloat($('#harga_proyek').val().replace(/,/g, ''));
        var unit = $('#unit_proyek').val();
        $('#total_proyek').val(formatNumber(harga*unit));        
      }
    })
  });


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
            window.location.href = "<?= base_url('admin/project') ?>"; 
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


  $('.textarea').wysihtml5();
</script>