<div class="content-wrapper" style="min-height: 655px;">
  <div class="container">
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <h1>
            <b><?=$data[0]->title?></b>
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="box box-solid round">
            <div class="box-body">
              <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_detail_1">
                    <div class="row">
                      <div class="col-md-12">
                        <p style="text-align:justify;">
                          <?=$data[0]->content?>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-solid round">
            <div class="box-body">
              <h3 style="margin:0px;padding:0px; margin-left: 15px; margin-bottom: 5px">Informasi Lainnya :</h3>
              <ul class="list-group list-group-unbordered">
                <?php
                $lainnya = $this->db->query("SELECT * FROM webpage WHERE status='ENABLE' ORDER BY prioritas ASC")->result();
                ?>
                <?php 
                $no = 0; foreach($lainnya as $a){  $no++;
                  ?>
                  <a href="<?= base_url()?>info/view/<?=$a->slug?>">
                    <li class="list-group-item a_black   <?= $a->slug == $data[0]->slug ? "active" : "" ?> " style="margin-bottom: 5px;" id="donasi">
                      <i class="fa fa-list"></i> <?=$a->title?>
                    </li>
                  </a>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>