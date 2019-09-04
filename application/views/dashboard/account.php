<div class="row">
    <div class="col-md-12">
        <br>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <form action="<?= base_url('dashboard/editaccount') ?>" method="post" enctype="multipart/form-data">
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
                                                        <input type="text" name="dt[namaUser]" class="form-control" id="username" placeholder="Masukan Nama Lengkap" value="Erwin Kurch">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nomor Whatsapp</label>
                                                        <input type="number" name="dt[teleponUser]" class="form-control" placeholder="Masukan Nomor Whatsapp" value="08192832231">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="text" name="dt[emailUser]" class="form-control" id="useremail" placeholder="Masukan Email" value="iwan@gmail.com">
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
                                                    <img src="https://png.pngtree.com/png-vector/20190625/ourlarge/pngtree-business-male-user-avatar-vector-png-image_1511454.jpg"   class="img-circle" alt="User Image" width="250px" height="250px" id="preview_image">
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
                                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Ubah Akun</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>