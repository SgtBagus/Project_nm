<div class="content-wrapper">
  <section class="content-header">
    <h1> Investor </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Investor</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-md-6"> </div>
              <div class="col-md-6">
                <div class="pull-right">          
                  <!-- <a href="<?= base_url('admin/investor/create') ?>">
                    <button type="button" class="btn btn-sm btn-success">
                      <i class="fa fa-plus"></i> Tambah Tbl Investor
                    </button> 
                  </a> -->
                  <a href="<?= base_url('fitur/ekspor/tbl_investor') ?>" target="_blank">
                    <button type="button" class="btn btn-sm btn-warning">
                      <i class="fa fa-file-excel-o"></i> Ekspor Tbl Investor
                    </button> 
                  </a>
                  <button type="button" class="btn btn-sm btn-info" onclick="$('#modal-impor').modal()">
                    <i class="fa fa-file-excel-o"></i> Import Tbl Investor
                  </button>
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
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Warga Negara</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Kode Pos</th>
                    <th>No Rek</th>
                    <th>Atas Nama</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach ($tbl_investor as $row) { ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $row['name'] ?></td>
                      <td>
                        <?php if (!$row['tgl_lahir']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo date("d-m-Y", strtotime($row['tgl_lahir']));
                        }?>
                      </td>
                      <td>
                        <?php if (!$row['jk']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          if($row['jk'] == 'L'){
                            echo "Laki Laki";
                          }else{
                            echo "Perempuan";
                          }
                        }?>
                      </td>
                      <td>
                        <?php if (!$row['wrg_negara']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['wrg_negara'];
                        }?>
                      </td>
                      <td><?= $row['email'] ?></td>
                      <td>
                        <?php if (!$row['phone']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['phone'];
                        }?>
                      </td>
                      <td>
                        <?php if (!$row['alamat']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['alamat'];
                        }?>
                      </td>
                      <td>
                        <?php if (!$row['kode_pos']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['kode_pos'];
                        }?>
                      </td>
                      <td>
                        <?php if (!$row['no_rek']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['no_rek'];
                        }?>
                      </td>
                      <td>
                        <?php if (!$row['atas_nama']) {
                          echo "<p class='help-block'><i>Kosong</i></p>";
                        }else {
                          echo $row['atas_nama'];
                        }?>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-info" onclick="view(<?=$row['id']?>)">
                            <i class="fa fa-eye"></i>
                          </button>
                          <button type="button" onclick="hapus(<?=$row['id']?>)" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash-o"></i>
                          </button>
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
    </div>
  </section>
</div>
<div class="modal fade bd-example-modal-sm" tabindex="-1" tbl_investor="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal-delete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id="upload-delete" action="<?= base_url('admin/investor/delete') ?>">
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
        <h4 class="modal-title">Impor Investor</h4>
      </div>
      <form action="<?= base_url('fitur/impor/tbl_investor') ?>" method="POST"  enctype="multipart/form-data">
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

  function view(id) {
    location.href = "<?= base_url('admin/investor/view/') ?>"+id;
  }       

  // function edit(id) {
  //   location.href = "<?= base_url('admin/investor/edit/') ?>"+id;
  // }         

  // function hapus(id) {
  //   $("#modal-delete").modal('show');
  //   $("#delete-input").val(id);
  // }

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