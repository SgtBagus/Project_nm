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
        <?php if($data_edit){echo '<input type="hidden" name="dt[id]" value="'.$data_edit['id'].'">'; }  ?>
        <input type="text" class="form-control" placeholder="Masukan Judul Proyek ..." name="dt[title]" id="judul" <?php if($data_edit){echo "value='".$data_edit['title']."'"; }  ?>>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Slug Proyek*</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Slug Proyek Diambil Sesuai Judul" name="dt[slug]" id="slug" <?php if($data_edit){echo "value='".$data_edit['slug']."'"; }  ?> readonly>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Hak Milik Proyek*</label>
      <div class="col-sm-9">
        <?php if($this->session->userdata('role_id') == '17'){ ?>
          <select class="form-control select2" name="dt[user_id]" style="width: 100%">
            <option value=""> Pilih Hak Milik Proyek </option>
            <?php
            $user = $this->mymodel->selectWhere("user", array('role_id' => '18'));
            foreach ($user as $key => $value) {
              ?>
              <option value="<?= $value['id'] ?>" <?php if($data_edit){if($data_edit['user_id'] == $value['id']) { echo "selected"; }} ?> ><?= $value['name'] ?></option>
            <?php } ?>
          </select>
        <?php } else { ?>
          <input type="text" class="form-control" placeholder="Slug Proyek Diambil Sesuai Judul" name="dt[user_id]" value="<?= $this->session->userdata('name')?>" readonly>
        <?php } ?>
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
                <img src="<?= base_url().$file['dir'] ?>" alt="User Image" width="100%" height="250px" id="preview_image">
                <?php
              }
            } else{
              ?>
              <img src="<?= base_url('webfile/project/default.jpg') ?>" alt="User Image" width="100%" height="250px" id="preview_image">
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
              <?php
              if($data_edit){
                ?>
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?= base_url('admin/project/editImage/').$data_edit['id'] ?>">
                      <button type="button" class="btn btn-sm btn-success"><i class="fa fa-file"></i> Ubah Detail Gambar</button>
                    </a>
                  </div>
                </div>
              <?php } else {?>
                <table class="table table-bordered" style="width: 100%">
                  <thead style="font-weight: bold;">
                    <tr>
                      <th style="width: 300px">Gambar</th>
                      <th>Nama File</th>
                    </tr>
                  </thead>
                  <tbody id="detail_image_open">
                  </tbody>
                  <tfoot>
                    <td colspan="2" align="center" id="btn_image_add">
                      <?php if($file_detail){ ?>
                        <button type="button" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-add-image"><i class="fa fa-file"></i> Tambah Gambar Detail</button>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-image"><i class="fa fa-trash"></i> Hapus Semua Gambar</button>
                      <?php } else {?>
                        <button type="button" class="btn btn-sm btn-primary" id="btnFile-many"><i class="fa fa-file"></i> Masukan Gambar Lainnya</button>
                        <input type="file" id="uploadFile" name="file_many[]" style="display: none" multiple accept="image/x-png,image/jpeg,image/jpg" />
                        <p class="help-block" id="note_image">Detail Gambar Bisa Multi Select</p>
                      <?php } ?>
                    </td>
                  </tfoot>
                </table>
                <?php
              }?>
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
          <input type="text" name="dt[harga]" id="harga_proyek" class="number-separator form-control" placeholder="Masukan Hara Proyek.." <?php if($data_edit){echo "value='".number_format($data_edit['harga'],0,',',',')."'"; }  ?>>
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
      <label for="inputEmail3" class="col-sm-3 control-label">Pengembalian Modal*</label>
      <div class="col-sm-9">
        <div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-money"></i> Rp.
          </div>
          <input type="text" name="dt[modal_back]" class="number-separator form-control" placeholder="Masukan Pengembalian Modal.." <?php if($data_edit){echo "value='".number_format($data_edit['modal_back'],0,',',',')."'"; } ?>>
        </div>
      </div>
    </div>
    <div class="form-group">
      <?php if($data_edit){ ?>
        <label for="inputEmail3" class="col-sm-3 control-label">Return Proyek*</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-md-6">
              <a href="<?= base_url('admin/project/viewReturn/').$data_edit['id'] ?>">
                <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah Detail Return Proyek</button>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi </label>
      <div class="col-sm-9">
        <textarea class="textarea form-control" name="dt[deskripsi]"><?php if($data_edit){echo $data_edit['deskripsi']; }  ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Lokasi (Maps) </label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="us3-address" autocomplete="off">
        <div id="us3" style="margin-top:10px; width: 100%; height: 350px; border: 3px solid #CED4DC; border-radius: .25rem;"></div>
        <input type="hidden" name="dt[latitude]" <?php if($data_edit){echo "value='".$data_edit['latitude']."'"; }  ?> id="us3-lat">
        <input type="hidden" name="dt[longitude]" <?php if($data_edit){echo "value='".$data_edit['longitude']."'"; }  ?> id="us3-lon">
      </div>
      <?php 
      if(empty($row['latitude']) || empty($row['longitude'])){
        if($data_edit){
          $row['latitude'] = $data_edit['latitude'];
          $row['longitude'] =  $data_edit['longitude'];
        }else{
          $row['latitude'] = '0';
          $row['longitude'] =  '0';
        }
      }
      ?>
    </div>
  </div>
  <div class="box-footer" align="right">
    <a href="<?= base_url('admin/project') ?> ">
      <button type="button" class="btn btn-info"><i class="fa fa-archive"></i> Data Proyek</button>
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


  $('#us3').locationpicker({
    location: {
      latitude: <?= $row['latitude'] ?>,
      longitude: <?= $row['longitude'] ?>
    },
    radius: 0,
    inputBinding: {
      latitudeInput: $('#us3-lat'),
      longitudeInput: $('#us3-lon'),
      locationNameInput: $('#us3-address')
    },
    enableAutocomplete: true,
    onchanged: function (currentLocation, radius, isMarkerDropped) {
    }
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
