<div class="content-wrapper">
  <section class="content-header">
    <h1> Project </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Project</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-md-12">
                <div class="pull-right">
                  <?php if($this->session->userdata('role_id') == '17'){ ?>
                    <a href="<?= base_url('admin/project/create') ?>">
                      <button type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Project</button>
                    </a>
                  <?php } ?>
                  <a href="<?= base_url('fitur/ekspor/tbl_project') ?>" target="_blank">
                    <button type="button" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Ekspor Project</button>
                  </a>
                  <button type="button" class="btn btn-sm btn-info" onclick="$('#modal-impor').modal()"><i class="fa fa-file-excel-o"></i> Import Project</button>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="show_error"></div>
            <div class="table-responsive">
              <table id="datatable" class="table table-bordered table-striped" >
                <thead>
                  <tr class="bg-success">
                    <th style="width:20px">No</th>
                    <th>Pembuat</th>
                    <th>Title</th>
                    <th>Harga</th>
                    <th>Unit</th>
                    <th>Total Harga</th>
                    <th>Periode</th>
                    <th>Return per Tahun</th>
                    <th>Bagi Hasil</th>
                    <th style="width:150px">Public</th>
                    <th style="width:150px">Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1; foreach ($tbl_project as $row) {
                    $user =  $this->mymodel->selectDataOne('user', array('id' => $row['user_id'] ));
                    $return = $this->mymodel->selectWithQuery("SELECT count(id) as return_row FROM tbl_project_return WHERE project_id = $row[id] ");
                    ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td>
                        <?= $user['name'] ?>
                      </td>
                      <td><?= $row['title'] ?></td>
                      <td>Rp <?= number_format($row['harga'],0,',','.') ?>,-</td>
                      <td><?= $row['unit'] ?></td>
                      <td>Rp <?= number_format($row['total_harga'],0,',','.') ?>,-</td>
                      <td>
                        <?php if (!$row['periode']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['periode']." Tahun";
                        }?>
                      </td>
                      <td>
                        <a href="<?= base_url('admin/project/viewReturn/').$row['id'] ?>">
                          <button type="button" class="btn btn-sm btn-sm btn-info"><i class="fa fa-eye"></i> Lihat Detail Return</button>
                        </a>
                      </td>
                      <td>
                        <?php if (!$row['bagi_hasil']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['bagi_hasil']." Tahun";
                        }?>
                      </td>
                      <td>
                        <?php if($row['public']=='ENABLE'){?>
                          <a href="<?= base_url('admin/project/publicStatus/').$row['id'] ?>/DISABLE">
                            <button type="button" class="btn btn-sm btn-sm btn-success" <?php if(!$return[0]['return_row']) { echo "disabled"; }?>>
                              <i class="fa fa-check-circle"></i> ENABLE
                            </button>
                          </a>
                        <?php }else { ?>
                          <a href="<?= base_url('admin/project/publicStatus/').$row['id'] ?>/ENABLE">
                            <button type="button" class="btn btn-sm btn-sm btn-danger" <?php if(!$return[0]['return_row']) { echo "disabled"; }?>>
                              <i class="fa fa-ban"></i> DISABLE
                            </button>
                          </a>
                        <?php } if(!$return[0]['return_row']) { echo "<p class='help-block'><i>Mohon Untuk Melakukan Set pada Return per Tahun Terlebih Dahulu</i></p>"; } ?>
                      </td>
                      <td>
                        <?php if($row['status']=='ENABLE'){?>
                          <a href="<?= base_url('admin/project/status/').$row['id'] ?>/DISABLE">
                            <button type="button" class="btn btn-sm btn-sm btn-success" <?php if(!$return[0]['return_row']) { echo "disabled"; }?>>
                              <i class="fa fa-check-circle"></i> ENABLE
                            </button>
                          </a>
                        <?php }else { ?>
                          <a href="<?= base_url('admin/project/status/').$row['id'] ?>/ENABLE">
                            <button type="button" class="btn btn-sm btn-sm btn-danger" <?php if(!$return[0]['return_row']) { echo "disabled"; }?>>
                              <i class="fa fa-ban"></i> DISABLE
                            </button>
                          </a>
                        <?php } if(!$return[0]['return_row']) { echo "<p class='help-block'><i>Mohon Untuk Melakukan Set pada Return per Tahun Terlebih Dahulu</i></p>"; } ?>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-info" onclick="view(<?=$row['id']?>)">
                            <i class="fa fa-eye"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-primary" onclick="edit(<?=$row['id']?>)">
                            <i class="fa fa-edit"></i>
                          </button>
                          <?php if($this->session->userdata('role_id') == '17'){ ?>
                            <button type="button" onclick="hapus(<?=$row['id']?>)" class="btn btn-sm btn-danger">
                              <i class="fa fa-trash-o"></i>
                            </button>
                          <?php } ?>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="modal fade bd-example-modal-sm" tabindex="-1" tbl_project="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal-delete">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id="upload-delete" action="<?= base_url('admin/project/delete') ?>">
          <div class="modal-header">
            <h5 class="modal-title">Confirm delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" id="delete-input">
            <p>Are you sure to delete this data?</p>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-send">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-impor">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Impor Tbl Project</h4>
        </div>
        <form action="<?= base_url('fitur/impor/tbl_project') ?>" method="POST"  enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="">File Excel</label>
              <input type="file" class="form-control" id="" name="file" placeholder="Input field">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">

    loadtable($("#select-status").val());

    function edit(id) {
      location.href = "<?= base_url('admin/project/edit/') ?>"+id;
    }

    function view(id) {
      location.href = "<?= base_url('admin/project/view/') ?>"+id;
    }

    function hapus(id) {
      $("#modal-delete").modal('show');
      $("#delete-input").val(id);
    }

    $("#upload-delete").submit(function(){
      event.preventDefault();
      var form = $(this);
      var mydata = new FormData(this);
      $.ajax({
        type: "POST",
        url: form.attr("action"),
        data: mydata,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function(){
          $(".btn-send").addClass("disabled").html("<i class='la la-spinner la-spin'></i>  Processing...").attr('disabled',true);
          $(".show_error").slideUp().html("");
        },
        success: function(response, textStatus, xhr) {
          var str = response;
          if (str.indexOf("success") != -1){
            $(".show_error").hide().html(response).slideDown("fast");
            $(".btn-send").removeClass("disabled").html('Yes, Delete it').attr('disabled',false);
          }else{
            setTimeout(function(){
              $("#modal-delete").modal('hide');
            }, 1000);
            $(".show_error").hide().html(response).slideDown("fast");
            $(".btn-send").removeClass("disabled").html('Yes , Delete it').attr('disabled',false);
            loadtable($("#select-status").val());
          }
        },
        error: function(xhr, textStatus, errorThrown) {
        }
      });
      return false;
    });
  </script>
