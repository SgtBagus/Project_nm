<?php 
if($this->session->userdata('session_sop')=="") {
    header('Location: '.base_url());
}else{
    if($this->session->userdata('role') != 'investor'){
        header('Location: '.base_url('admin'));
    }
}
?>
<div class="content-wrapper">
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h1><?= $title ?> </h1>
                    <div class="box box-solid round avatar">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <img src="<?= base_url().$file['dir']?>" class="img-circle" alt="User Image" width="100px" height="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?= base_url('/dashboard/account') ?>">
                                <button type="submit" class="btn btn-block btn-primary btn-md round"><i class="fa fa-edit"></i> Ubah Profil</button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid round">
                                <div class="box-body">
                                    <ul class="list-group list-group-unbordered">
                                        <a href="<?= base_url('dashboard') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="dashboard">
                                                <i class="fa fa-dashboard"></i> Dashboard
                                            </li>
                                        </a>
                                        <a href="<?= base_url('dashboard/notif') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="notif">
                                                <span class="badge bg-red">2</span>
                                                <i class="fa fa-bell"></i> Notifikasi
                                            </li>
                                        </a>
                                        <a href="<?= base_url('dashboard/account') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="account">
                                                <i class="fa fa-user-circle"></i> Akun Saya
                                            </li>
                                        </a>
                                    </ul>
                                    <a href="<?= base_url('AuthLogin/logout') ?>"><button type="button" class="btn btn-block btn-danger btn-md"><i class="fa fa-sign-out"></i> Logout</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                    <?php 
                        $data['user'] = $user;
                        $data['file'] = $file;
                        
                    if($content == 'dashboard'){
                        $data['invest'] = $invest;
                        $data['total_harga'] = $total_harga;
                        $data['total_project'] = $total_project;
                        $this->load->view('dashboard/dashboard');
                    }else if($content == 'notif'){
                        $this->load->view('dashboard/notif');
                    }else if($content == 'account'){
                        $this->load->view('dashboard/account');
                    }else{
                        $this->load->view('errors/html/error_404.php');
                    } 
                    ?>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        if('<?= $content ?>' == 'dashboard'){
            $("#dashboard").addClass("active");
        }else if('<?= $content ?>' == 'notif'){
            $("#notif").addClass("active");
        }else if('<?= $content ?>' == 'account'){
            $("#account").addClass("active");
        }
    });
</script>