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
              <div class="col-md-6">
                <select onchange="loadtable(this.value)" id="select-status" style="width: 150px" class="form-control">
                  <option value="ENABLE">ENABLE</option>
                  <option value="DISABLE">DISABLE</option>
                </select>
              </div>
              <div class="col-md-6">
                <div class="pull-right">          
                  <a href="<?= base_url('admin/project/create') ?>">
                    <button type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Project</button> 
                  </a>
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
              <div id="load-table"></div>
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
  function loadtable(status) {
    var table = '<table class="table table-bordered" id="mytable">'+
    '     <thead>'+
    '     <tr class="bg-success">'+
    '       <th style="width:20px">No</th>'+'<th>Pembuat</th>'+'<th>Title</th>'+'<th>Harga</th>'+'<th>Unit</th>'+'<th>Total Harga</th>'+'<th>Periode</th>'+'<th>Return</th>'+'<th>Bagi Hasil</th>'+'<th style="width:150px">Status</th>'+
    '       <th style="width:150px"></th>'+
    '     </tr>'+
    '     </thead>'+
    '     <tbody>'+
    '     </tbody>'+
    ' </table>';

    $("#load-table").html(table)

    var t = $("#mytable").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .off('.DT')
        .on('keyup.DT', function(e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {"url": "<?= base_url('admin/project/json?status=') ?>"+status, "type": "POST"},
      columns: [
      {"data": "id","orderable": false},{"data": "name"},{"data": "title"},{"data": "harga"},{"data": "unit"},{"data": "total_harga"},{"data": "periode"},{"data": "return"},{"data": "bagi_hasil"},
      {"data": "status"},
      {   "data": "view",
      "orderable": false
    }
    ],
    order: [[1, 'asc']],
    columnDefs : [{ 
      targets : [3, 5],
      "render": function (data, type, row) {
        return "Rp "+formatNumber(data)+"";
      },
    },
    { 
      targets : [7],
      "render": function (data, type, row) {
        return data+" % per Tahun";
      },
    },
    { 
      targets : [6, 8],
      "render": function (data, type, row) {
        return data+" Tahun";
      },
    },
    { 
      targets : [9],
      render : function (data, type, row, meta) {
        if(row['status']=='ENABLE'){
          var htmls = '<a href="<?= base_url('admin/project/status/') ?>'+row['id']+'/DISABLE">'+
          '    <button type="button" class="btn btn-sm btn-sm btn-success"><i class="fa fa-home"></i> ENABLE</button>'+
          '</a>';
        }else{
          var htmls = '<a href="<?= base_url('admin/project/status/') ?>'+row['id']+'/ENABLE">'+
          '    <button type="button" class="btn btn-sm btn-sm btn-danger"><i class="fa fa-home"></i> DISABLE</button>'+
          '</a>';
        }
        return htmls;
      }
    }],

    rowCallback: function(row, data, iDisplayIndex) {
      var info = this.fnPagingInfo();
      var page = info.iPage;
      var length = info.iLength;
      var index = page * length + (iDisplayIndex + 1);
      $('td:eq(0)', row).html(index);
    }
  });
  }

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