<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url('assets/') ?>/img/auth/login.jpg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="<?= base_url('assets/') ?>/index.html"><img src="<?= base_url('assets/') ?>/img/auth_logo.png" alt=""></a>
                        <span class="text">SIDPAA<sup>2022</sup></span>
                    </div>

                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= base_url('auth/cek_login'); ?>">
                        <div class="form-group">
                            <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" id="email" placeholder="Email">
                            <?= form_error('email', '<small class="text-danger p1-3">', '</small>'); ?>
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" id="password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger p1-3">', '</small>'); ?>
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <a href="<?= base_url('auth/changepassword') ?>">Forgot Password ?</a>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Sign In</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Belum memiliki akun? <a href="<?= base_url('auth/registrasi') ?>">Buat akun Anda</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>