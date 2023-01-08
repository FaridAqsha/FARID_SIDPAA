<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url('assets/') ?>/img/auth/lupa.jpg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="<?= base_url('assets/') ?>/index.html"><img src="<?= base_url('assets/') ?>/img/auth_logo.png" alt=""></a>
                        <span class="text">SIDPAA<sup>2022</sup></span>
                    </div>
                    <div class="text-centered">
                        <h5>Ubah Password Anda</h5>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= base_url('auth/changepassword'); ?>">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>" id="password1" placeholder="Masukkan Email anda">
                            <?= form_error('email', '<small class="text-danger p1-3">', '</small>'); ?>
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password1" class="form-control" value="<?= set_value('password'); ?>" id="password1" placeholder="Masukkan password baru">
                            <?= form_error('password1', '<small class="text-danger p1-3">', '</small>'); ?>
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password2" class="form-control" value="<?= set_value('password'); ?>" id="password2" placeholder="Konfirmasi password baru">
                            <?= form_error('password2', '<small class="text-danger p1-3">', '</small>'); ?>
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Change Password</button>
                        </div>
                    </form>
                    <div class="register">
                        <a href="<?= base_url('auth') ?>">Kembali Ke Menu Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>