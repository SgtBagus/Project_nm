<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b>Buat Proyek</b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="box box-solid round">
          <div class="box-body">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Judul Proyek*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Masukan Judul Proyek ...">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Gambar Proyek*</label>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col-md-6 col-xs-12">
                      <img src="https://cdn.lifehack.org/wp-content/uploads/2013/04/33.jpg" class="round" alt="User Image" width="100%" height="300px" id="preview_image">
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
                      <input type="file" class="file" id="imageFile" style="display: none;" name="dt[gambar_cerita]"/>
                      <p class="help-block">Gambar yang diupload disarankan memiliki format PNG, JPG, atau JPEG</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Harga Proyek*</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-money"></i> Rp. 
                    </div>
                    <input type="text" name="dt[nominalDonasi]" id="harga_proyek" class="number-separator form-control" placeholder="Masukan Nominal uang..">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group">
                    <input type="number" name="dt[nominalDonasi]" id="unit_proyek" class="form-control" id="unit" placeholder="Masukan Unit..">
                    <span class="input-group-addon">Unit</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Total Harga Proyek*</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-money"></i> Rp. 
                    </div>
                    <input type="text" name="dt[nominalDonasi]" id="total_proyek" class="number-separator form-control" readonly="true">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Detail* : </label>
                <div class="col-sm-10">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Periode*</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-addon">Tahun</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Return Didapat*</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-percent"></i> Per tahun</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Periode Bagi Hasil*</label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-addon">Tahun</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi* : </label>
                <div class="col-sm-10">
                  <textarea id="editor1" name="dt[isiCerita]">
                  </textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Url Google Maps : </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control">
                  <p class="help-block">Salin Url Lokasi anda melalui Google Maps untuk menampilkan peta Lokasi</p>
                </div>
              </div>
              <div class="row" align="center">
                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;">
                  <a href="<?=  base_url('story/view/1') ?>">
                    <button type="button" class="btn btn-block btn-danger btn-lg round">
                      <i class="fa fa-close"></i> Batalkan
                    </button>
                  </a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom: 10px;"> 
                  <button type="submit" class="btn btn-block btn-primary btn-lg round">
                    <i class="fa fa-send"></i> Kirim
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
  $(function () {

    CKEDITOR.replace('editor1');

    $('#total_proyek').val('Masukan Harga Proyek dan Unit untuk Melihat Total Harga Proyek');

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
</script>