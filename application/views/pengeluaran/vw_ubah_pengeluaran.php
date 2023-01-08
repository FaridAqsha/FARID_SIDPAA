<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Edit Data Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $pengeluaran['id']; ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Pengeluaran</label>
                                <input type="text" name="nama_pengeluaran" value="<?= $pengeluaran['nama_pengeluaran']; ?>" class="form-control" id="nama_pengeluaran" placeholder="Nama Donasi">
                                <?= form_error('nama_pengeluaran', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputtgldonasi">Tanggal Pengeluaran</label>
                                <input type="date" name="tgl_pengeluaran" value="<?= $pengeluaran['tgl_pengeluaran']; ?>" class="form-control" id="tgl_pengeluaran" placeholder="Tanggal Donasi Uang">
                                <?= form_error('tgl_pengeluaran', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmnominal">Nominal</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="nominal" value="<?= $pengeluaran['nominal']; ?>" id="nominal" placeholder="Nominal">
                                </div>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary mr-2">Ubah</button>
                            <a href="<?= base_url('Pengeluaran') ?>" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>