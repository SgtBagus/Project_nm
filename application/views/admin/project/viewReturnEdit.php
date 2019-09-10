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
      <div class="col-xs-8">
        <div class="box">
          <div class="box-body">
            <form method="POST" action="<?= base_url('admin/project/editReturn/').$tbl_project_return['id'] ?>" id="upload-create" enctype="multipart/form-data" class="form-horizontal">
              <div class="box-body">
                <div class="show_error"></div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Tahun Ke</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly value="Tahun ke <?= $tbl_project_return['tahun']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Return Didapat*</label>
                    <div class="col-sm-8">
                      <div class="input-group">
                        <input type="number" class="form-control" name="dt[return_tahun]" value="<?= $tbl_project_return['return_tahun'] ?>">
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
                <div class="box-footer" align="right">
                  <div class="col-xs-12" align="center">
                    <a href="<?= base_url('admin/project/viewReturn/').$tbl_project['id']?>">
                      <button type="button" class="btn btn-sm btn-info"><i class="fa fa-arrow-left"></i> Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
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

</script>
