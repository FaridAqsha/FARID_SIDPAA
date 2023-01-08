<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <small class="text-muted d-block pt-10">Nama Pengeluaran</small>
                        <h6><?= $pengeluaran['nama_pengeluaran']; ?></h6>
                        <small class="text-muted d-block pt-10">Tanggal Pengeluaran</small>
                        <h6><?= $pengeluaran['tgl_pengeluaran']; ?></h6>
                        <small class="text-muted d-block pt-10">Nominal</small>
                        <h6><?= $pengeluaran['nominal']; ?></h6>
                    </div>
                    <div class="card-footer justify-content-center">
                        <a href="<?= base_url('Pengeluaran') ?>" class="btn btn-danger">Tutup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>