<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <section class="content-header">
        <ol class="breadcrumb" style="background: #f3f3f3;">
          <li><a href="<?= base_url() ?>"><b>AGNOV</b></a></li>
          <li><a href="<?= base_url('blog') ?>"><i class="fa fa-newspaper-o"></i> Blog</a></li>
          <li class="active"><?= $tbl_blog['title']?> </li>
        </ol>
      </section>
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b><?= $tbl_blog['title'] ?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8" style="margin-bottom: 15px">
          <?php if($file['dir']){ ?>
            <img src="<?= base_url().$file['dir'] ?>" class="round" alt="Second slide" alt="Second slide" style="height: 390px; width: 100%; object-fit: cover; display: inline;">
          <?php } else { ?>
            <img src="<?= base_url('webfile/blog/default.jpg')?>" class="round" alt="Second slide" alt="Second slide" style="height: 390px; width: 100% object-fit: cover; display: inline;">
          <?php } ?>
        </div>
        <div class="col-md-4">
          <div class="box box-solid round">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-xs-12 col-6 mb-md-0 mb-5" align="center">
                  <img src="<?= base_url().$user_image['dir'] ?>" alt="Second slide" style="height: 100px; width: 100px; border-radius: 50%; object-fit: cover; display: inline;">
                </div>
                <div class="col-md-8 col-xs-12 col-6 mb-md-0 mb-5" align="center">
                  <h3><?= $user['name'] ?> </h3>
                  <small>Blog ini dibuat pada tanggal <br><b><?= date("d-m-Y H:i:s", strtotime($tbl_blog['created_at']))  ?></b></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-solid round">
            <div class="box-body">
              <?= $tbl_blog['deskripsi'] ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
