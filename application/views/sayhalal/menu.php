<div class="content-wrapper">
    <div class="container">
        <section class="content">
            <div class="row">
                <h1>INFO HALAL</h1>
                <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small>
            </div>
            <br>
            <div class="row">
                <div class="box box-solid round">
                    <div class="box-body">
                        <form action="<?= base_url('halalku') ?>" method="post">
                            <div class="row">
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-group">
                                        <h4>Cari Judul Halalku : </h4>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" class="form-control" name="judul" value="<?= $this->session->userdata('judul') ?>" placeholder="Masukan Judul..">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <h4>Urutkan Berdasarkan : </h4>
                                        <select class="form-control select2" name="urutan">
                                            <?php if ($this->session->userdata('urutan') == 'created_at') ?>
                                            <option value="new" <?php if ($this->session->userdata('urutan') == 'created_at') {
                                                                    echo 'selected';
                                                                } ?>>Paling Baru</option>
                                            <option value="likes" <?php if ($this->session->userdata('urutan') == 'likes') {
                                                                        echo 'selected';
                                                                    } ?>>Paling Disukai</option>
                                            <option value="views" <?php if ($this->session->userdata('urutan') == 'views') {
                                                                        echo 'selected';
                                                                    } ?>>Views Paling Banyak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-success btn-lg"><i class="fa fa-search"></i> Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" id="myList">
                    <li>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="box box-solid round">
                                <div class="box-header" align="center">
                                    <h4><b>Tites Goes Here</b></h4>
                                </div>
                                <img src="https://images.pexels.com/photos/416320/pexels-photo-416320.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Second slide" style="height: 180px; width: 100%; object-fit: cover; display: inline;">
                                <div class="box-body" align="center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="box box-solid round">
                                <div class="box-header" align="center">
                                    <h4><b>Tites Goes Here</b></h4>
                                </div>
                                <img src="https://images.pexels.com/photos/416320/pexels-photo-416320.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Second slide" style="height: 180px; width: 100%; object-fit: cover; display: inline;">
                                <div class="box-body" align="center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="box box-solid round">
                                <div class="box-header" align="center">
                                    <h4><b>Tites Goes Here</b></h4>
                                </div>
                                <img src="https://images.pexels.com/photos/416320/pexels-photo-416320.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="Second slide" style="height: 180px; width: 100%; object-fit: cover; display: inline;">
                                <div class="box-body" align="center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="row" align="center">
                    <h4 style="color:#36b554" id="loadMore">
                        Tampilkan Lebih Banyak <br>
                        <i class="fa fa-angle-down"></i>
                    </h4>
                    <h4 style="color:#36b554" id="showLess">
                        Tampilkan Lebih Sedikit <br>
                        <i class="fa fa-angle-up"></i>
                    </h4>
                </div>
        </section>
    </div>
</div>