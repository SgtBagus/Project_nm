<div class="content-wrapper">
  <section class="content-header">
    <h1>Investor</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Investor</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-8">
        <div class="box">
          <div class="box-header">
            <h5 class="box-title">
              Edit Investor
            </h5>
          </div>
          <?php $data['data_edit'] = $tbl_investor;
          $data['file_edit'] = $file;
          $this->load->view('admin/investor/_form', $data) ?>
        </div>
      </div>
    </div>
  </section>
</div>