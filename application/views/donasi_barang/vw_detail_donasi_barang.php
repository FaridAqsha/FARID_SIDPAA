<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-6">
                <div class="card border-left-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <img src="<?= base_url('assets/img/barang/') . $dbd['gambar_barang']; ?>" style="width:300px" class="img-fluid img-20">
                            </div>
                            <hr class="mb-0">
                            <div class="card-body">
                                <small class="text-muted d-block pt-10">Donatur</small>
                                <h6><?= $userr['nama']; ?></h6>
                                <small class="text-muted d-block pt-10">Tanggal</small>
                                <h6><?= $dbd['tgl_donasi_barang']; ?></h6>
                                <small class="text-muted d-block pt-10">Nominal</small>
                                <h6><?= $dbd['nominal']; ?></h6>
                            </div>

                        </div>
                        <div class="card-footer justify-content-center">
                            <a href="<?= base_url('Donasi_Barang') ?>" class="btn btn-danger">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>