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
                                                <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="upload-create">
                                                    <div class="show_error"></div>
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
                                                                <select class="form-control select2" name="dt[jk]">
                                                                    <option value="">--Pilih Jenis Kelamin--</option>
                                                                    <option value="L">Laki Laki</option>
                                                                    <option value="P">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Warga Negara</label>
                                                                <select class="form-control select2" name="dt[jk]">
                                                                    <option value="">--Pilih Warga Negara--</option>
                                                                    <option value="WNI">WNI</option>
                                                                    <option value="WNA">WNA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Agama</label>
                                                                <select class="form-control select2" name="dt[provinsi_id]">
                                                                    <option value="">--Pilih Agama--</option>
                                                                    <?php $tbl_agama = $this->mymodel->selectData("tbl_agama");
                                                                    foreach ($tbl_agama as $key => $value) {?>
                                                                        <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
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
                                                                <input type="text" name="dt[tgl_lahir]" class="form-control" id="datepicker" placeholder="Masukan Tanggal Lahir" value="<?= $user['tgl_lahir']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
                                <div class="tab-pane" id="tab_contact">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="upload-create">
                                                    <div class="show_error"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="dt[email]" class="form-control" placeholder="Masukan Email" value="<?= $user['email']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Telephone</label>
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
                                                                <select class="form-control select2" name="dt[provinsi_id]" style="width: 100%">
                                                                    <option value="">--Pilih Provinsi--</option>
                                                                    <?php 
                                                                    $tbl_provinsi = $this->mymodel->selectData("tbl_provinsi"); foreach ($tbl_provinsi as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Kota</label>
                                                                <select class="form-control select2" name="dt[kode_id]" style="width: 100%">
                                                                    <option value="">--Pilih Provinsi--</option>
                                                                    <?php 
                                                                    $tbl_kota = $this->mymodel->selectData("tbl_kota"); foreach ($tbl_kota as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
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
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_dana">
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="box-body">
                                                <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="upload-create">
                                                    <div class="show_error"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
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
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Pekerjaan</label>
                                                                <select class="form-control select2" name="dt[pekerjaan_id]" style="width: 100%">
                                                                    <option value="">--Pilih Pekerjaan --</option>
                                                                    <?php 
                                                                    $tbl_pekerjaan = $this->mymodel->selectData("tbl_pekerjaan"); foreach ($tbl_pekerjaan as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
                                                            <div class="form-group">
                                                                <label>Penghasilan Bulanan</label>
                                                                <select class="form-control select2" name="dt[sumberdana_id]" style="width: 100%">
                                                                    <option value="">--Pilih Penghasilan Bulanan--</option>
                                                                    <?php 
                                                                    $tbl_gaji = $this->mymodel->selectData("tbl_gaji"); foreach ($tbl_gaji as $key => $value) 
                                                                    { ?>
                                                                        <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
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
                                                <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="upload-create">
                                                    <div class="show_error"></div>
                                                    <div class="row">
                                                        <div class="col-md-6"> 
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
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Cabang</label>
                                                                <input type="text" name="dt[cabang]" class="form-control" placeholder="Masukan Cabang Bank" value="<?= $user['bank_cabang']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>No Rekening</label>
                                                                <input type="text" name="dt[no_rek]" class="form-control" placeholder="Masukan No Rekening" value="<?= $user['no_rek']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label>Atas Nama</label>
                                                                <input type="text" name="dt[atas_nama]" class="form-control" placeholder="Masukan Atas Nama" value="<?= $user['atas_nama']?>">
                                                            </div>
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
                                                <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data" id="upload-create">
                                                    <div class="show_error"></div>
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
                                                                <img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" width="250px" height="250px" id="preview_ktp">
                                                                <br>
                                                                <button type="button" class="btn btn-sm btn-primary" id="btnFile-KTP"><i class="fa fa-file"></i> Browser File</button>
                                                                <input type="file" class="file" id="imageKTP" style="display: none;" name="file"/>
                                                                <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">  
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Foto NPWP</label>
                                                                <br>
                                                                <img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" width="250px" height="250px" id="preview_npwp">
                                                                <br>
                                                                <button type="button" class="btn btn-sm btn-primary" id="btnFile-NPWP"><i class="fa fa-file"></i> Browser File</button>
                                                                <input type="file" class="file" id="imageNPWP" style="display: none;" name="file"/>
                                                                <p class="help-block">Foto yang diupload disarankan berukuran 70px x 70px dan memiliki format PNG, JPG, atau JPEG</p>
                                                            </div>
                                                        </div>
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