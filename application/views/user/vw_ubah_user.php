<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Edit Data User</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input type="text" name="nama" value="<?= $user['nama']; ?>" class="form-control" id="nama" placeholder="Nama">
                                <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" id="email" placeholder="Email">
                                <?= form_error('ruangan', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password1" value="<?= $user['password']; ?>" class="form-control" id="password1" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Confirm Password</label>
                                <input type="password" name="password2" value="<?= $user['password']; ?>" class="form-control" id="password2" placeholder="Confirm Password">
                                <?= form_error('password', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmRole">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="Admin" <?php if ($user['role'] == "Admin") {
                                                                echo "selected";
                                                            } ?>>Admin</option>
                                    <option value="Donatur" <?php if ($user['role'] == "Donatur") {
                                                                echo "selected";
                                                            } ?>>Donatur</option>
                                    <option value="User" <?php if ($user['role'] == "User") {
                                                                echo "selected";
                                                            } ?>>User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Alamat</label>
                                <input type="text" name="alamat" value="<?= $user['alamat']; ?>" class="form-control" id="alamat" placeholder="Alamat">
                                <?= form_error('role', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Nomor HP</label>
                                <input type="text" name="nomor" value="<?= $user['nomor']; ?>" class="form-control" id="nomor" placeholder="Nomor HP">
                                <?= form_error('nomor', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <img src="<?= base_url('assets/img/user/') . $user['gambar']; ?>" style="width : 100px;" class="img-thumbnail">
                                <div class="custom-file">
                                    <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                    <label for="gambar" class="custom-file-label">Choose File</label>
                                    <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary mr-2">Ubah</button>
                            <a href="<?= base_url('User') ?>" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>