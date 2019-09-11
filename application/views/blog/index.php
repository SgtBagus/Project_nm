<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row" align="center"> 
        <h1><i class="fa fa-newspaper-o"></i> Blog </h1>
        <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form class="form-horizontal">
                <div class="form-group" style="margin-bottom: -5px">
                  <label for="inputEmail3" class="col-sm-3 control-label">Lakukan Pencarian Judul Blog :</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-10">
                        <input type="text" class="form-control round" style="box-shadow: none;">
                      </div>
                      <div class="col-sm-2">
                        <button type="button" class="btn btn-block btn-primary btn-md round" style="box-shadow: none;">
                          <i class="fa fa-search"></i> <b> Cari </b>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="myList">
        <?php foreach($tbl_blog as $row){ ?>
          <li>
            <div class="col-md-4 col-6 mb-md-0 mb-5">
              <div class="box box-solid round">
                <div class="box-body">
                  <?php 
                  $image_src = $this->mymodel->selectDataone('file', array('table'=>'tbl_blog', 'table_id' => $row['id'])); 

                  $user = $this->mymodel->selectDataone('user', array('id'=> $row['user_id'])); 
                  ?>
                  <img style="height: 200px; width: 100%; object-fit: cover; display: inline;" src="<?= base_url().$image_src['dir']?>">
                  <h2 align="center">
                    <?= strlen($row["title"]) > 25 ? substr($row["title"],0,25)."..." : $row["title"] ?>
                  </h2>
                  <?= strlen($row["deskripsi"]) > 150 ? substr($row["deskripsi"],0,150)."..." : $row["deskripsi"] ?>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                      <small class="label bg-primary btn-md round"> 
                        <i class="fa fa-user"></i> <?= $user['name'] ?></b>
                      </small>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                      <small class="label bg-green btn-md round"> 
                        <i class="fa fa-calendar"></i> <?= date("d-m-Y", strtotime($row['created_at'])); ?></b>
                      </small>
                    </div>
                  </div>
                  <br>
                  <div class="row" align="center">
                    <div class="col-md-12" align="center">
                      <a href="<?= base_url('blog/view/').$row['slug'] ?>">
                        <button type="button" class="btn btn-primary btn-block btn-md round">
                          <i class="fa fa-search"></i> Selengkapnya
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
      </div>
      <div class="row" align="center">
        <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Banyak
        </button>
        <button type="button" id="showLess" class="btn btn-danger btn-lg round">
          <i class="fa fa-search"></i> Tampilkan Lebih Sedikit
        </button>
      </div>
    </section>
  </div>
</div>