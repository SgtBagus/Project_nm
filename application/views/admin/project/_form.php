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
        <input type="text" class="form-control" placeholder="Masukan Judul Proyek ..." name="dt[title]" id="judul">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Slug Proyek*</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" placeholder="Slug Proyek Diambil Sesuai Judul" name="dt[slug]" id="slug">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-3 control-label">Gambar Proyek</label>
      <div class="col-sm-9">
        <div class="row">
          <div class="col-md-6 col-xs-12">
            <img src="https://cdn.lifehack.org/wp-content/uploads/2013/04/33.jpg" class="round" alt="User Image" width="100%" height="250px" id="preview_image">
          </div>
          <div class="col-md-6 col-xs-12">
            <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
            <input type="file" class="file" id="imageFile" style="display: none;" name="file"/>
            <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box-body">
              <table class="table table-bordered" style="width: 100%">
                <thead style="font-weight: bold;">
                  <tr>
                    <th>No</th>
                    <th>Image Preview</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="detail_image_open">
                  <tr>
                    <td colspan="3" align="center" id="btn_image_add">
                      <button type="button" class="btn btn-sm btn-primary" id="btnImage_many-1"><i class="fa fa-plus"></i> Tambah Gambar</button>
                    </td>
                  </tr>
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
          <input type="text" name="dt[harga]" id="harga_proyek" class="number-separator form-control" placeholder="Masukan Nominal uang..">
        </div>
      </div>
      <div class="col-sm-4">
        <div class="input-group">
          <input type="number" name="dt[unit]" id="unit_proyek" class="form-control" id="unit" placeholder="Masukan Unit..">
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
              <input type="text" class="form-control" name="dt[periode]">
              <span class="input-group-addon">Tahun</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Return Didapat*</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control" name="dt[return]">
              <span class="input-group-addon">% Per tahun</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Periode Bagi Hasil*</label>
          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control" name="dt[bagi_hasil]">
              <span class="input-group-addon">Tahun</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi </label>
      <div class="col-sm-10">
        <textarea class="textarea form-control" name="dt[deskripsi]"> </textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Url Google Maps </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="dt[url_map]">
        <p class="help-block">Salin Url Lokasi anda melalui Google Maps untuk menampilkan peta Lokasi</p>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>
    <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
  </div>
</form>

<script type="text/javascript">
  $(function () {

    $('#total_proyek').val('Masukan Harga Proyek dan Unit untuk Melihat Total Harga Proyek');

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