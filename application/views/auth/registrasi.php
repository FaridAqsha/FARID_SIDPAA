<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url('assets/') ?>/img/auth/regis.jpg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">
                        <a href="<?= base_url('assets/') ?>/index.html"><img src="<?= base_url('assets/') ?>/img/auth_logo.png"></a>
                        <span class="text">SIDPAA<sup>2022</sup></span>
                    </div>
                    <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="nama" name="nama" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama">
                            <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" id="email" placeholder="Email">
                            <?= form_error('ruangan', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password1" value="<?= set_value('password1'); ?>" class="form-control" id="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password2" value="<?= set_value('password2'); ?>" class="form-control" id="password2" placeholder="Confirm Password">
                            <?= form_error('password2', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <select name="role" value="<?= set_value('role'); ?>" id="role" class="form-control" Role>
                                <option value="User">User</option>
                            </select>
                            <?= form_error('jenis_kelamin', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="alamat" value="<?= set_value('alamat'); ?>" class="form-control" id="alamat" placeholder="Alamat">
                            <?= form_error('alamat', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nomor" value="<?= set_value('nomor'); ?>" class="form-control" id="nomor" placeholder="Nomor HP">
                            <?= form_error('nomor', '<small class="text-danger p1-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                <label for="gambar" class="custom-file-label">Choose File</label>
                            </div>
                        </div>

                        <div class="sign-btn text-center">
                            <button type="submit" name="tambah" class="btn btn-theme">Buat Akun</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Sudah Memiliki Akun? <a href="<?= base_url('Auth') ?>">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>