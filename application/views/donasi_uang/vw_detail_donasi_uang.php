<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/user/') . $userr['gambar']; ?>" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10"><?= $userr["nama"]; ?></h4>
                            <p class="card-subtitle"><?= $userr["role"]; ?></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <small class="text-muted d-block pt-10">Role</small>
                        <h6><?= $userr['role']; ?></h6>
                        <small class="text-muted d-block pt-10">Tanggal</small>
                        <h6><?= $dua['tgl_donasi_uang']; ?></h6>
                        <small class="text-muted d-block pt-10">Nominal</small>
                        <h6><?= $dua['nominal']; ?></h6>
                    </div>
                    <div class="card-footer justify-content-center">
                        <a href="<?= base_url('Donasi_Uang') ?>" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>