<div class="content-wrapper">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b><?= $tbl_blog['title'] ?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <?php if($file['dir']){ ?>
            <img src="<?= base_url().$file['dir'] ?>" class="round" alt="Second slide" alt="Second slide" style="height: 390px; width: 100%">
          <?php } else { ?>
            <img src="<?= base_url('webfile/blog/default.jpg')?>" class="round" alt="Second slide" alt="Second slide" style="height: 390px; width: 100%">
          <?php } ?>
        </div>
        <div class="col-md-4">
          Blog ini dibuat pada tanggal <b><?= date("d-m-Y", strtotime($tbl_blog['created_at']))  ?></b> oleh:
          <div class="box box-solid round">
            <div class="box-body">
              <div class="row">
                <div class="col-md-4 col-xs-12 col-6 mb-md-0 mb-5" align="center">
                  <img src="<?= base_url().$user_image['dir'] ?>" alt="Second slide" style="height: 100px; width: 100px" class="round">
                </div>
                <div class="col-md-8 col-xs-12 col-6 mb-md-0 mb-5">
                  <h3><?= $user['name'] ?> </h3>
                  <small>Mendaftar pada : <b><?= date("d-m-Y", strtotime($user['created_at']))  ?></b></small>
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
