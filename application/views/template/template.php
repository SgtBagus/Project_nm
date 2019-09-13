<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AGNOV</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/iCheck/all.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?= base_url('assets/') ?>/jquery/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  
  <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyASx6JCkfcpuUIDho2q_G_ayRSsq4BpV2Q'></script>
  <script src="<?= base_url('assets/') ?>maps/locationpicker.jquery.min.js"></script>
  <link rel="stylesheet" href="<?= base_url('assets/') ?>custom/css_custom.css">
  <style>
    #myList li{ display:none;
      list-style-type:none;
    }
    #showLess {
      display:none;
    }
  </style>
</head>
<?php 
$actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$this->session->set_userdata(array('url_session' => $actual_link));
?>
<body class="hold-transition skin-green layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url()?>" class="navbar-brand"><b>AGNOV</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="collapse navbar-collapse pull-left menu-custom_css" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?= base_url('project') ?>"><i class="fa fa-archive"></i> Proyek</a></li>
              <li><a href="<?= base_url('blog') ?>"><i class="fa fa-newspaper-o"></i> Blog</a></li>
              <!-- <li><a href="<?= base_url('dashboard/mitra') ?>"><i class="fa fa-users"></i> Jadi Mitra</a></li> -->
              <li><a href="<?= base_url('info/view/tentang-aplikasi') ?>"><i class="fa fa-list"></i> Info Lainnya</a></li>
            </ul>
          </div>
          <?php
          if($this->session->userdata('session_sop') == true){
            if($this->session->userdata('role') != 'Investor'){
              $photo = $this->mymodel->selectDataone('file', array('table'=>'user', 'table_id' => $this->session->userdata('id'))); 
            }else{
              $photo = $this->mymodel->selectDataone('file', array('table'=>'tbl_investor', 'table_id' => $this->session->userdata('id'))); 
            }
            ?>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url().$photo['dir'] ?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?php echo $this->session->userdata('name') ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="user-header">
                      <img src="<?= base_url().$photo['dir'] ?>" class="img-circle" alt="User Image">
                      <p>
                        <?php echo $this->session->userdata('name'). '<br><b>'.$this->session->userdata('role').'</b>'; ?>
                        <small><?php echo $this->session->userdata('email') ?></small>
                      </p>
                    </li>
                    <li class="user-body">
                      <div class="row">
                        <div class="col-md-6 col-xs-12" style="margin-top: 5px; margin-bottom: 5px">
                          <a href="<?= base_url('dashboard') ?>">
                            <button type="button" class="btn btn-block btn-primary"><i class="fa fa-dashboard"></i> Dashboard</button>
                          </a>
                        </div>  
                        <div class="col-md-6 col-xs-12" style="margin-top: 5px; margin-bottom: 5px">
                          <a href="<?= base_url('login/logout') ?>">
                            <button type="button" class="btn btn-block btn-danger"><i class="fa fa-sign-out"></i> Logout</button>
                          </a>
                        </div>        
                      </div>
                    </li>
                  </ul>
                </li>
                <li>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="refresh">
                    <i class="fa fa-refresh"></i>
                  </button>
                </li>
              </ul>
            </div>
            <?php
          } else if($this->session->userdata('session_sop') == ""){
            ?>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li><a href="#" data-toggle="modal" data-target="#modal-login">Login</a></li>
                <li>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="refresh">
                    <i class="fa fa-refresh"></i> 
                  </button>
                </li>
              </ul>
            </div>
            <?php
          }
          ?>
        </div>
      </nav> 
    </header>
    <div class="row" style="height: 45px;background-color: #f3f3f3;"></div>
    <?=$contents?>
    <div class="modal modal-default fade" id="modal-login" style="display: none;">
      <div class="modal-dialog round">
        <div class="modal-content round">
          <div class="modal-header top-round bg-green">
            <h4 class="modal-title" align="center"><b>Login</b></h4>
          </div>
          <div class="modal-body">
            <?php $this->load->view('modals/login_form') ?>
          </div>
        </div>
      </div>
    </div>
    <footer class="main-footer">
      <div class="container" align="center">
        <strong>Copyright © 2019  by <a href="https://www.agnov.id/">Agnov</a></strong>
      </div>
    </footer>
  </div>
</body>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url('assets/') ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/ckeditor/ckeditor.js"></script> 
<script src="<?= base_url('assets/') ?>plugins/iCheck/icheck.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/') ?>custom/number-separator.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
<script>
  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }

  $(document).ready(function () {
    size_li = $("#myList li").size();
    x=3;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
      x= (x+3 <= size_li) ? x+3 : size_li;
      $('#myList li:lt('+x+')').show();
      $('#showLess').show();
      if(x == size_li){
        $('#loadMore').hide();
      }
    });
    $('#showLess').click(function () {
      x=(x-3<0) ? 3 : x-3;
      $('#myList li').not(':lt('+x+')').hide();
      $('#loadMore').show();
      $('#showLess').show();
      if(x == 3){
        $('#showLess').hide();
      }
    });
  });

  $(function () {
    $('.select2').select2()
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })

    $('[data-mask]').inputmask();

    $('#reservation').daterangepicker()
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    );

    $('#datepicker').datepicker({
      format: 'dd-mm-yyyy',
    });

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    });

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    });

    $('.my-colorpicker1').colorpicker();
    $('.my-colorpicker2').colorpicker();

    $('.timepicker').timepicker({
      showInputs: false
    });

    $('#datatable').DataTable({
      "paging"      : true,
      "lengthChange": true,
      "searching"   : true,
      "ordering"    : true,
      "info"        : false,
      "scrollX": true,
      "scrollY": true,
      "language": {
        "search": "<b> Pencarian : </b>",
        "zeroRecords": function () {
          return "<img src='https://icon-library.net/images/no-data-icon/no-data-icon-20.jpg' width='100px' height='100px'><p><b>Tidak Ada Data</b><p>";
        },
        "paginate": {
          "previous": "Sebelumnya",
          "next" : "Selanjutnya"
        }
      },
    });
  });

  $("#btnFile").click(function() {
    document.getElementById('imageFile').click();
  });

  $("#imageFile").change(function() {
    imagePreview(this);
  });

  function imagePreview(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#preview_image').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  };

  $("#btnFile-KTP").click(function() {
    document.getElementById('imageKTP').click();
  });

  $("#imageKTP").change(function() {
    imageKTP(this);
  });

  function imageKTP(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#preview_ktp').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  };

  $("#btnFile-NPWP").click(function() {
    document.getElementById('imageNPWP').click();
  });

  $("#imageNPWP").change(function() {
    imageNPWP(this);
  });

  function imageNPWP(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#preview_npwp').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  };

  $('#refresh').click(function() {
    location.reload();
  });
</script>
</html>