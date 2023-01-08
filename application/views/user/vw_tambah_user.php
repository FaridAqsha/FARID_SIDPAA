<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Tambah Data User</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control" id="nama" placeholder="Nama">
                                <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" id="email" placeholder="Email">
                                <?= form_error('ruangan', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password1" value="<?= set_value('password1'); ?>" class="form-control" id="password1" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                <input type="password" name="password2" value="<?= set_value('password2'); ?>" class="form-control" id="password2" placeholder="Confirm Password">
                                <?= form_error('password2', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmRole">Role</label>
                                <select name="role" value="<?= set_value('role'); ?>" id="role" class="form-control" Role>
                                    <option value="Admin">Admin</option>
                                    <option value="Donatur">Donatur</option>
                                    <option value="User">User</option>
                                </select>
                                <?= form_error('jenis_kelamin', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Alamat</label>
                                <input type="text" name="alamat" value="<?= set_value('alamat'); ?>" class="form-control" id="alamat" placeholder="Alamat">
                                <?= form_error('alamat', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Nomor HP</label>
                                <input type="text" name="nomor" value="<?= set_value('nomor'); ?>" class="form-control" id="nomor" placeholder="Nomor HP">
                                <?= form_error('nomor', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                    <label for="gambar" class="custom-file-label">Choose File</label>
                                </div>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary mr-2">Simpan</button>
                            <a href="<?= base_url('User') ?>" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>