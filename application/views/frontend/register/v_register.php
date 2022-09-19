<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-success-style3 alert-st-bg2">
                    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                    </button>
                    <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
                    <p><strong>Warning!</strong> Coba Lagi!!!</p>', '</div>');

                    if ($this->session->flashdata('error')) {
                        echo '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
                      <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
          <span class="icon-sc-cl" aria-hidden="true">&times;</span>
        </button>
                      <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
                      <p><strong>Danger!</strong> Gagal.</p>';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-success-style1 alert-st-bg">
                      <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
          <span class="icon-sc-cl" aria-hidden="true">&times;</span>
        </button>
                      <i class="fa fa-check adminpro-checked-pro admin-check-pro admin-check-pro-clr" aria-hidden="true"></i>
                      <p><strong>Success!</strong>successful</p>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    echo form_open('pelanggan/login');
                    ?>
                    <input type="email" placeholder="Email Address" name="email" value="<?= set_value('email') ?>" />
                    <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password" required />
                    <button type="submit" class="btn btn-default">Login</button>
                    <?php echo form_close() ?>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <?php
                    echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Sukses</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }

                    echo form_open('pelanggan/registrasi');
                    ?>
                    <input type="text" name="username" value="<?= set_value('username') ?>" placeholder="Name" />
                    <input type="text" name="jenis_kel" value="<?= set_value('jenis_kel') ?>" placeholder="Jenis Kelamin" />
                    <input type="text" name="no_tlpn" value="<?= set_value('no_tlpn') ?>" placeholder="No Telpon" />
                    <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email Address" required />
                    <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password" required />
                    <input type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" placeholder="Ulangi Password" required />
                    <button type="submit" class="btn btn-default">Signup</button>
                    <?php echo form_close() ?>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->