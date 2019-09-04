<div class="row">
    <div class="col-md-12">
        <br>
        <div class="row">
            <div class="col-md-12">        
                <div class="box box-solid round" >
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">  
                                <a href="#"><button class="btn btn-block btn-primary btn-sm"><i class="fa fa-inbox"></i> Tandai Sudah Dibaca</button></a>
                            </div>
                        </div>
                        <br>
                        <table id="datatable" class="table table-bordered table-striped" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Dari</th>
                                    <th>Pesan</th>
                                    <th>Waktu Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="font-weight: bold;">
                                    <td>1</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                    <td>09:21 - 12-02-2019</td>
                                    <td>
                                        <a href="<?= base_url('/proyek/view/asd') ?>"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                        <a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-inbox"></i></button></a>
                                        <a href="#"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></button></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                    <td>09:21 - 12-02-2019</td>
                                    <td>
                                        <a href="<?= base_url('/proyek/view/asd') ?>"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                        <a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-inbox"></i></button></a>
                                        <a href="#"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td>3</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                    <td>09:21 - 12-02-2019</td>
                                    <td>
                                        <a href="<?= base_url('/proyek/view/asd') ?>"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                        <a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-inbox"></i></button></a>
                                        <a href="#"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Lorem Ipsum</td>
                                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
                                    <td>09:21 - 12-02-2019</td>
                                    <td>
                                        <a href="<?= base_url('/proyek/view/asd') ?>"><button class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button></a>
                                        <a href="#"><button class="btn btn-primary btn-xs"><i class="fa fa-inbox"></i></button></a>
                                        <a href="#"><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <div class="modal modal-default fade" id="modal-delete" style="display: none;">
    <div class="modal-dialog round">
      <div class="modal-content round">
        <div class="modal-header top-round bg-red">
          <h4 class="modal-title" align="center"><i class="fa fa-trash"></i> Hapus Cerita</h4>
        </div>
        <div class="modal-body">
          <?php
          $this->load->view('modals/delete_form');
          ?>
        </div>
      </div>
    </div>
  </div>