<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AGNOV</b></a></li>
          <li class="active"><i class="fa fa-newspaper-o"></i> Blog</li>
        </ol>
      </section>
      <div class="row" align="center"> 
        <h1><i class="fa fa-newspaper-o"></i> Blog </h1>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-solid round">
            <div class="box-body">
              <form class="form-horizontal" method="GET" action="">
                <div class="form-group" style="margin-bottom: -5px">
                  <label for="inputEmail3" class="col-sm-3 control-label">Lakukan Pencarian Judul Blog :</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-10 col-md-8 col-xs-6">
                        <input type="text" class="form-control round" style="box-shadow: none;" name="title" <?php if($_GET['title']){ echo "value='".$_GET['title']."'"; }?> >
                      </div>
                      <div class="col-sm-2 col-md-4 col-xs-6">
                        <button type="submit" class="btn btn-block btn-primary btn-md round" style="box-shadow: none;">
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
        <?php if($tbl_blog) { 
          foreach($tbl_blog as $row){ ?>
            <a href="<?= base_url('blog/').$row['slug'] ?>" class="a_black">
              <li>
                <div class="col-md-4 col-6 mb-md-0 mb-5">
                  <div class="box box-solid round">
                    <div class="box-body">
                      <?php 
                      $image_src = $this->mymodel->selectDataone('file', array('table'=>'tbl_blog', 'table_id' => $row['id'])); 

                      $user = $this->mymodel->selectDataone('user', array('id'=> $row['user_id'])); 
                      ?>
                      <img style="height: 200px; width: 100%; object-fit: cover; display: inline;" src="<?= base_url().$image_src['dir']?>">
                      <h3 align="center">
                        <?= strlen($row["title"]) > 15 ? substr($row["title"],0,15)."..." : $row["title"] ?>
                      </h3>
                      <!-- <?= strlen($row["deskripsi"]) > 150 ? substr($row["deskripsi"],0,150)."..." : $row["deskripsi"] ?> -->
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
                          <a href="<?= base_url('blog/').$row['slug'] ?>">
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
            </a>
          <?php } 
        } else { ?>
          <div class="col-md-12" align="center">
            <div class="alert alert-danger alert-dismissible">
              <h4><i class="fa fa-ban"></i> Perhatihan</h4>
              <p>Mohon Maaf Data Yang anda cari tidak ditemukan</p>
            </div>
          </div>
          <?php
        } ?>
      </div>
      <?php if($tbl_blog) { ?>
        <div class="row" align="center">
          <button type="button" id="loadMore" class="btn btn-primary btn-lg round">
            <i class="fa fa-search"></i> Tampilkan Lebih Banyak
          </button>
          <button type="button" id="showLess" class="btn btn-danger btn-lg round">
            <i class="fa fa-search"></i> Tampilkan Lebih Sedikit
          </button>
        </div>
      <?php } ?>
    </section>
  </div>
</div>