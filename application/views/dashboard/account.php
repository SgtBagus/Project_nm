<div class="row">
    <div class="col-md-12">
        <br>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_info" data-toggle="tab" aria-expanded="false">Info</a></li>
                                <li class=""><a href="#tab_image" data-toggle="tab" aria-expanded="false">Foto Profil</a></li>
                                <li class=""><a href="#tab_contact" data-toggle="tab" aria-expanded="false">Kontak</a></li>
                                <li class=""><a href="#tab_dana" data-toggle="tab" aria-expanded="false">Sumber Dana</a></li>
                                <li class=""><a href="#tab_rek" data-toggle="tab" aria-expanded="false">Rekerning</a></li>
                                <li class=""><a href="#tab_doc" data-toggle="tab" aria-expanded="false">Dokumen</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_info">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="editaccount">
                                                    <div class="show_error_account"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" name="dt[name]" class="form-control" placeholder="Masukan Nama Lengkap" value="<?= $user['name']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <select class="form-control select2" name="dt[jk]" style="width: 100%">
                                                                    <option value="">--Pilih Jenis Kelamin--</option>
                                                                    <option value="L" <?php if($user['jk'] == 'L'){echo "selected";} ?>>Laki Laki</option>
                                                                    <option value="P" <?php if($user['jk'] == 'P'){echo "selected";} ?>>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Warga Negara</label>
                                                                <select class="form-control select2" name="dt[wrg_negara]" style="width: 100%">
                                                                    <option value="">--Pilih Warga Negara--</option>
                                                                    <option value="WNI" <?php if($user['wrg_negara'] == 'WNI'){echo "selected";} ?>>WNI</option>
                                                                    <option value="WNA" <?php if($user['wrg_negara'] == 'WNA'){echo "selected";} ?>>WNA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Agama</label>
                                                                <select class="form-control select2" name="dt[agama_id]"  style="width: 100%">
                                                                    <option value="">--Pilih Agama--</option>
                                                                    <?php $tbl_agama = $this->mymodel->selectData("tbl_agama");
                                                                    foreach ($tbl_agama as $key => $value) {?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['agama_id'] == $value['id']){echo "selected"; } ?>><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Tempat Lahir</label>
                                                                <input type="text" name="dt[tpt_lahir]" class="form-control" placeholder="Masukan Tempat Lahir" value="<?= $user['tpt_lahir']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Tanggal Lahir</label>
                                                                <input type="text" name="dt[tgl_lahir]" class="form-control" id="datepicker" placeholder="Masukan Tanggal Lahir" value="<?= date("d-m-Y", strtotime($user['tgl_lahir'])); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" align="right">
                                                        <div class="col-md-12"> 
                                                            <button type="submit" class="btn-send btn btn-primary btn-send" ><i class="fa fa-edit"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_image">
                                    <form action="<?= base_url('dashboard/editphoto') ?>" method="post" enctype="multipart/form-data" id="editphoto">
                                        <div class="show_error_image"></div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Foto Profil</label>
                                            <div class="row">
                                                <div class="col-md-5" align="center">
                                                    <img src="<?= base_url().$file['dir'] ?>"   class="img-circle" alt="User Image" width="250px" height="250px" id="preview_image">
                                                </div>
                                                <div class="col-md-7">
                                                    <button type="button" class="btn btn-sm btn-primary" id="btnFile"><i class="fa fa-file"></i> Browser File</button>
                                                    <input type="file" class="file" id="imageFile" style="display: none;" name="file" accept="image/x-png,image/jpeg,image/jpg" />
                                                    <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                </div>
                                            </div>
                                            <div class="row" align="right">
                                                <div class="col-md-12"> 
                                                    <button type="submit" class="btn-send btn btn-primary btn-send" ><i class="fa fa-edit"></i> Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="tab_contact">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editcontact') ?>" method="post" enctype="multipart/form-data" id="editcontact">
                                                    <div class="show_error_contact"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="dt[email]" class="form-control" placeholder="Masukan Email" value="<?= $user['email']?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>No Hp</label>
                                                                <input type="number" name="dt[phone]" class="form-control" placeholder="Masukan Telephone" value="<?= $user['phone']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12"> 
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea name="dt[alamat]" class="form-control" placeholder="Masukan Alamat"><?= $user['alamat'] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Kelurahan</label>
                                                                <input type="text" name="dt[kelurahan]" class="form-control" placeholder="Masukan Kelurahan" value="<?= $user['kelurahan']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <input type="text" name="dt[kecamatan]" class="form-control" placeholder="Masukan Kecamatan" value="<?= $user['kecamatan']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Provinsi</label>
                                                                <select class="form-control select2" name="dt[provinsi_id]" id="provinsi" style="width: 100%">
                                                                    <option value="">--Pilih Provinsi--</option>
                                                                    <?php 
                                                                    $tbl_provinsi = $this->mymodel->selectData("tbl_provinsi"); foreach ($tbl_provinsi as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['provinsi_id'] == $value['id']){ echo "selected"; } ?>><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Kota</label>
                                                                <select class="form-control select2" name="dt[kota_id]" id="kota" style="width: 100%">
                                                                    <option value="">--Pilih Kota--</option>
                                                                    <?php 
                                                                    $tbl_kota = $this->mymodel->selectData("tbl_kota"); foreach ($tbl_kota as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['kota_id'] == $value['id']){ echo "selected"; } ?>><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Kode Pos</label>
                                                                <input type="text" name="dt[kode_pos]" class="form-control" placeholder="Masukan Kode Pos" value="<?= $user['kode_pos']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" align="right">
                                                        <div class="col-md-12"> 
                                                            <button type="submit" class="btn-send btn btn-primary btn-send" ><i class="fa fa-edit"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_dana">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editdana') ?>" method="post" enctype="multipart/form-data" id="editdana">
                                                    <div class="show_error_dana"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Sumber Dana</label>
                                                                <select class="form-control select2" name="dt[sumberdana_id]" style="width: 100%">
                                                                    <option value="">--Pilih Sumber Dana--</option>
                                                                    <?php 
                                                                    $tbl_sumberdana = $this->mymodel->selectData("tbl_sumberdana"); foreach ($tbl_sumberdana as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['sumberdana_id'] == $value['id']){ echo "selected"; } ?> ><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Pekerjaan</label>
                                                                <select class="form-control select2" name="dt[pekerjaan_id]" style="width: 100%">
                                                                    <option value="">--Pilih Pekerjaan --</option>
                                                                    <?php 
                                                                    $tbl_pekerjaan = $this->mymodel->selectData("tbl_pekerjaan"); foreach ($tbl_pekerjaan as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['pekerjaan_id'] == $value['id']){ echo "selected"; } ?> ><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Penghasilan Bulanan</label>
                                                                <select class="form-control select2" name="dt[gaji_id]" style="width: 100%">
                                                                    <option value="">--Pilih Penghasilan Bulanan--</option>
                                                                    <?php 
                                                                    $tbl_gaji = $this->mymodel->selectData("tbl_gaji"); foreach ($tbl_gaji as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['gaji_id'] == $value['id']){ echo "selected"; } ?> ><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" align="right">
                                                        <div class="col-md-12"> 
                                                            <button type="submit" class="btn-send btn btn-primary btn-send" ><i class="fa fa-edit"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_rek">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editrek') ?>" method="post" enctype="multipart/form-data" id="editrek">
                                                    <div class="show_error_rek"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Bank</label>
                                                                <select class="form-control select2" name="dt[bank_id]" style="width: 100%">
                                                                    <option value="">--Pilih Bank--</option>
                                                                    <?php 
                                                                    $tbl_bank = $this->mymodel->selectData("tbl_bank"); foreach ($tbl_bank as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>" <?php if($user['bank_id'] == $value['id']){ echo "selected"; } ?> ><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Cabang</label>
                                                                <input type="text" name="dt[bank_cabang]" class="form-control" placeholder="Masukan Cabang Bank" value="<?= $user['bank_cabang']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>No Rekening</label>
                                                                <input type="number" name="dt[no_rek]" class="form-control" placeholder="Masukan No Rekening" value="<?= $user['no_rek']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Atas Nama</label>
                                                                <input type="text" name="dt[atas_nama]" class="form-control" placeholder="Masukan Atas Nama" value="<?= $user['atas_nama']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" align="right">
                                                        <div class="col-md-12"> 
                                                            <button type="submit" class="btn-send btn btn-primary btn-send" ><i class="fa fa-edit"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_doc">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editdocument') ?>" method="post" enctype="multipart/form-data" id="editdocument">
                                                    <div class="show_error_document"></div>
                                                    <div class="row">
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>No KTP</label>
                                                                <input type="text" name="dt[no_ktp]" class="form-control" placeholder="Masukan No KTP" value="<?= $user['no_ktp']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>No NPWP</label>
                                                                <input type="text" name="dt[no_npwp]" class="form-control" placeholder="Masukan No NPWP" value="<?= $user['no_npwp']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row"  align="center">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Foto KTP</label>
                                                                <br>
                                                                <?php if($ktp) { ?>
                                                                    <img src="<?= base_url().$ktp['dir']?>" width="250px" height="250px" id="preview_ktp">
                                                                    <br><br>
                                                                    <a href="<?= base_url('webfile/investor/doc/').$ktp['name']?>" target="_blank">
                                                                        <button type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Gambar</button>
                                                                    </a>
                                                                <?php } else {?>
                                                                    <img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" width="250px" height="250px" id="preview_ktp">
                                                                <?php } ?>
                                                                <hr>
                                                                <button type="button" class="btn btn-sm btn-primary" id="btnFile-KTP"><i class="fa fa-file"></i> Browser File</button>
                                                                <input type="file" class="file" id="imageKTP" style="display: none;" name="fileKTP"/>
                                                                <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Foto NPWP</label>
                                                                <br>

                                                                <?php if($npwp) { ?>
                                                                    <img src="<?= base_url().$npwp['dir']?>" width="250px" height="250px" id="preview_npwp">
                                                                    <br><br>
                                                                    <a href="<?= base_url('webfile/investor/doc/').$npwp['name']?>" target="_blank">
                                                                        <button type="button" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Gambar</button>
                                                                    </a>
                                                                <?php } else {?>
                                                                    <img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" width="250px" height="250px" id="preview_npwp">
                                                                <?php } ?>
                                                                <hr>
                                                                <button type="button" class="btn btn-sm btn-primary" id="btnFile-NPWP"><i class="fa fa-file"></i> Browser File</button>
                                                                <input type="file" class="file" id="imageNPWP" style="display: none;" name="fileNPWP"/>
                                                                <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" align="right">
                                                        <div class="col-md-12"> 
                                                            <button type="submit" class="btn-send btn btn-primary btn-send" ><i class="fa fa-edit"></i> Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $("#editaccount").submit(function(){
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
                form.find(".show_error_account").slideUp().html("");
            },

            success: function(response, textStatus, xhr) {
                var str = response;
                if (str.indexOf("success") != -1){
                  form.find(".show_error_account").hide().html(response).slideDown("fast");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('dashboard/account') ?>";
                }, 1000);

                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }else{
                  form.find(".show_error_account").hide().html(response).slideDown("fast");
                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
              console.log(xhr);
              $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              form.find(".show_error_account").hide().html(xhr).slideDown("fast");
          }
      });
        return false;
    });


    $("#editphoto").submit(function(){
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
                form.find(".show_error_image").slideUp().html("");
            },

            success: function(response, textStatus, xhr) {
                var str = response;
                if (str.indexOf("success") != -1){
                  form.find(".show_error_image").hide().html(response).slideDown("fast");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('dashboard/account') ?>";
                }, 1000);

                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }else{
                  form.find(".show_error_image").hide().html(response).slideDown("fast");
                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
              console.log(xhr);
              $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              form.find(".show_error_image").hide().html(xhr).slideDown("fast");
          }
      });
        return false;
    });

    $("#editcontact").submit(function(){
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
                form.find(".show_error_contact").slideUp().html("");
            },

            success: function(response, textStatus, xhr) {
                var str = response;
                if (str.indexOf("success") != -1){
                  form.find(".show_error_contact").hide().html(response).slideDown("fast");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('dashboard/account') ?>";
                }, 1000);

                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }else{
                  form.find(".show_error_contact").hide().html(response).slideDown("fast");
                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
              console.log(xhr);
              $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              form.find(".show_error_contact").hide().html(xhr).slideDown("fast");
          }
      });
        return false;
    });


    $("#editdana").submit(function(){
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
                form.find(".show_error_dana").slideUp().html("");
            },

            success: function(response, textStatus, xhr) {
                var str = response;
                if (str.indexOf("success") != -1){
                  form.find(".show_error_dana").hide().html(response).slideDown("fast");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('dashboard/account') ?>";
                }, 1000);

                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }else{
                  form.find(".show_error_dana").hide().html(response).slideDown("fast");
                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
              console.log(xhr);
              $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              form.find(".show_error_dana").hide().html(xhr).slideDown("fast");
          }
      });
        return false;
    });


    $("#editrek").submit(function(){
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
                form.find(".show_error_rek").slideUp().html("");
            },

            success: function(response, textStatus, xhr) {
                var str = response;
                if (str.indexOf("success") != -1){
                  form.find(".show_error_rek").hide().html(response).slideDown("fast");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('dashboard/account') ?>";
                }, 1000);

                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }else{
                  form.find(".show_error_rek").hide().html(response).slideDown("fast");
                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
              console.log(xhr);
              $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              form.find(".show_error_rek").hide().html(xhr).slideDown("fast");
          }
      });
        return false;
    });

    $("#editdocument").submit(function(){
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
                form.find(".show_error_document").slideUp().html("");
            },

            success: function(response, textStatus, xhr) {
                var str = response;
                if (str.indexOf("success") != -1){
                  form.find(".show_error_document").hide().html(response).slideDown("fast");
                  setTimeout(function(){
                    window.location.href = "<?= base_url('dashboard/account') ?>";
                }, 1000);

                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }else{
                  form.find(".show_error_document").hide().html(response).slideDown("fast");
                  $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              }
          },
          error: function(xhr, textStatus, errorThrown) {
              console.log(xhr);
              $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
              form.find(".show_error_document").hide().html(xhr).slideDown("fast");
          }
      });
        return false;
    });

</script>