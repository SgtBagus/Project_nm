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
                                    <img src="https://png.pngtree.com/png-vector/20190625/ourlarge/pngtree-business-male-user-avatar-vector-png-image_1511454.jpg" class="img-circle" alt="User Image" width="100px" height="100px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?= base_url('/dashboard/account') ?>/edit/">
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
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="overview">
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
                                        <a href="<?= base_url('dashboard/mitra') ?>">
                                            <li class="list-group-item a_black" style="margin-bottom: 5px;" id="mitra">
                                                <i class="fa fa-users"></i> Jadi Mitra
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
                    if($content == 'dashboard'){
                        $this->load->view('dashboard/dashboard');
                    }else if($content == 'notif'){
                        $this->load->view('dashboard/notif');
                    }else if($content == 'account'){
                        $this->load->view('dashboard/account');
                    }else if($content == 'mitra'){
                        $this->load->view('dashboard/mitra');
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
        if('<?= $content ?>' == 'overview'){
            $("#overview").addClass("active");
        }else if('<?= $content ?>' == 'notif'){
            $("#notif").addClass("active");
        }else if('<?= $content ?>' == 'account'){
            $("#account").addClass("active");
        }else if('<?= $content ?>' == 'mitra'){
            $("#mitra").addClass("active");
        }
    });
</script>