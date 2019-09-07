<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $tbl_project['title'] ?></h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Project</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="box">
          <div class="box-header">
            <h5 class="box-title">
              Edit Project
            </h5>
          </div>
          <?php $data['data_edit'] = $tbl_project; 
          $data['file'] = $file; 
          $data['file_detail'] = $file_detail; 
          $this->load->view('admin/project/_form', $data) ?>
        </div>
      </div>
    </div>
  </section>
</div>