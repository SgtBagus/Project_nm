<div class="content-wrapper">
  <div class="container"> 
    <section class="content">
      <div class="row" align="center"> 
        <h1><i class="fa fa-user"></i> Mendaftar </h1>
        <small>Mohon isi Form Berikut !</small>
      </div>
      <br>
      <div class="row">
        <div class="box box-solid round">
          <div class="box-body">
            <form action="#" method="POST" id="login_form">
              <div class="show_error" id="error_input">

              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="passowrd" name="first-password" class="form-control">
              </div>
              <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="passowrd" name="second-password" class="form-control">
              </div>
              <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" name="phone" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask>
              </div>
              <button type="submit" class="btn btn-block btn-primary">
                <i class="fa fa-user"> </i> Daftar
              </button>
                <p class="help-block pull-right">Sudah punya akun ? <a href="#" data-toggle="modal" data-target="#modal-login">Login Disini </a></p>
              <br>
              <hr>
            </form>
            <h4 align="center">atau</h4>
            <div class="row">
              <div class="col-md-12" align="center">
                <a href="<?=$this->google_url?>" class="btn btn-block btn-social btn-login btn-md">
                  <img src="http://transformations-spafitness.com/wp-content/uploads/2013/11/google-logo-icon-PNG-Transparent-Background-1.png">
                  <div class="row" align="center">
                    Masuk Dengan Google
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>