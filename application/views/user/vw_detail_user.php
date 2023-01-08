<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/user/') . $user['gambar']; ?>" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10"><?= $user["nama"]; ?></h4>
                            <p class="card-subtitle"><?= $user["role"]; ?></p>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <small class="text-muted d-block pt-10">Role</small>
                        <h6><?= $user["role"]; ?></h6>
                        <small class="text-muted d-block pt-10">Email</small>
                        <h6><?= $user["email"]; ?></h6>
                        <small class="text-muted d-block pt-10">Nomor HP</small>
                        <h6><?= $user["nomor"]; ?></h6>
                        <small class="text-muted d-block pt-10">Alamat</small>
                        <h6><?= $user["alamat"]; ?></h6>
                    </div>
                    <div class="card-footer justify-content-center">
                        <a href="<?= base_url('User') ?>" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>