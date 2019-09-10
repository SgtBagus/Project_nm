<div class="content-wrapper">
  <section class="content-header">
    <h1> Project <?= $tbl_project['title'] ?> </h1>
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
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add-return" ><i class="fa fa-plus"></i> Tambah Return</button>
                </div>
              </div>
            </div>
          </div>
          <div class="box-body">
            <div class="show_delete"></div>
            <table id="datatable" class="table table-bordered table-striped" >
              <thead>
                <tr class="bg-success">
                  <th style="width:20px">No</th>
                  <th>Tahun</th>
                  <th>Return per Tahun</th>
                  <th>Public Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($tbl_project_return as $row) {?>
                <tr>
                  <td><?= $i ?></td>
                  <td>Tahun ke <b> <?= $row['tahun'] ?></b></td>
                  <td><?= $row['return_tahun'] ?> %</td>
                  <td>
                    <?php if($row['public']=='ENABLE'){?>
                      <small class="label bg-blue">
                        <i class="fa fa-eye"></i> Dipublikasikan
                      </small>
                    <?php }else { ?>
                      <a href="<?= base_url('admin/project/publicStatusReturn/').$row['id'] ?>">
                        <button type="button" class="btn btn-sm btn-sm btn-success">
                          <i class="fa fa-check-circle"></i> ENABLE
                        </button>
                      </a>
                    <?php } ?>
                    <p class='help-block'><i>Public Status Hanya Akan Tampil Satu Data Di Halaman Utama</i></p>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-primary" onclick="edit(<?= $row['id'] ?>)">
                        <i class="fa fa-edit"></i> Edit Return
                      </button>
                    </div>
                    <div class="btn-group">
                      <button type="button" onclick="hapus(<?= $row['id'] ?>)" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash-o"></i> Delete
                      </button>
                    </div>
                  </td>
                </tr>
              <?php $i++; } ?>
              </tbody>
            </table>
            <div class="row">
              <div class="col-xs-12" align="center">
                <a href="<?= base_url('admin/project/')?>">
                  <button type="button" class="btn btn-sm btn-info"><i class="fa fa-archive"></i> Lihat Semua Proyek</button>
                </a>
                <a href="<?= base_url('admin/project/edit/'.$tbl_project['id'])?>">
                  <button type="button" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit Proyek</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal modal-default fade" id="modal-add-return" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-blue">
        <h4 class="modal-title" align="center"><i class="fa fa-bar-chart"></i> Tambah Return</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('admin/project/addReturn/').$tbl_project['id'] ?>" id="upload-create" enctype="multipart/form-data" class="form-horizontal">
          <div class="box-body">
            <div class="show_error"></div>
            <div class="form-group">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Tahun Ke</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" readonly value="Tahun ke <?= $i; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Return Didapat*</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input type="number" class="form-control" name="dt[return_tahun]">
                      <span class="input-group-addon">% Per tahun</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Periode Bagi Hasil*</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <input type="number" class="form-control" readonly value="1">
                      <span class="input-group-addon">Tahun</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer" align="right">
            <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
            <button type="submit" class="btn btn-primary btn-send" ><i class="fa fa-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-sm" tabindex="-1" tbl_project="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal-delete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="upload-delete" action="<?= base_url('admin/project/delReturn/') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="delete-input">
          <p>Anda yakin ingin menghapus ?</p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-send">Yes, Delete</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  function edit(id) {
    location.href = "<?= base_url('admin/project/viewReturnEdit/') ?>"+id;
  }

  function hapus(id) {
    $("#modal-delete").modal('show');
    $("#delete-input").val(id);
  }

  $("#upload-create").submit(function(){
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
        form.find(".show_error").slideUp().html("");
      },

      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          form.find(".show_error").hide().html(response).slideDown("fast");
          setTimeout(function(){
            window.location.href = "<?= base_url('admin/project/viewReturn/').$tbl_project['id'] ?>";
          }, 1000);

          $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        }else{
          form.find(".show_error").hide().html(response).slideDown("fast");
          $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log(xhr);
        $(".btn-send").removeClass("disabled").html('<i class="fa fa-save"></i> Save').attr('disabled',false);
        form.find(".show_error").hide().html(xhr).slideDown("fast");
      }
    });
    return false;
  });

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
        $(".show_delete").slideUp().html("");
      },
      success: function(response, textStatus, xhr) {
        var str = response;
        if (str.indexOf("success") != -1){
          $(".show_delete").hide().html(response).slideDown("fast");
          $(".btn-send").removeClass("disabled").html('Yes, Delete it').attr('disabled',false);
          location.reload();
        }else{
          setTimeout(function(){
            $("#modal-delete").modal('hide');
          }, 1000);
          $(".show_delete").hide().html(response).slideDown("fast");
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
