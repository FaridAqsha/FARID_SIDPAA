<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Edit Data Donasi Barang</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $dbd['id']; ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Barang</label>
                                <input type="text" name="nama_barang" value="<?= $dbd['nama_barang']; ?>" class="form-control" id="nama_barang" placeholder="Nama Barang">
                                <?= form_error('nama_barang', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDonatur">Donatur</label>
                                <select value="<?= $dbd['id_user']; ?>" name="id_user" id="id_user" class="form-control">
                                    <?php foreach ($userr as $r) : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputtgldonasi">Tanggal Donasi</label>
                                <input type="date" name="tgl_donasi_barang" value="<?= $dbd['tgl_donasi_barang']; ?>" class="form-control" id="tgl_donasi_barang" placeholder="Tanggal Donasi Barang">
                                <?= form_error('tgl_donasi_barang', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmnominal">Nominal</label>
                                <input type="number" class="form-control" name="nominal" value="<?= $dbd['nominal']; ?>" id="nominal" placeholder="Nominal">
                            </div>
                            <div class="form-group">
                                <img src="<?= base_url('assets/img/barang/') . $dbd['gambar_barang']; ?>" style="width : 100px;" class="img-thumbnail">
                                <div class="custom-file">
                                    <input type="file" name="gambar_barang" class="custom-file-input" id="gambar_barang">
                                    <label for="gambar_barang" class="custom-file-label">Choose File</label>
                                    <?= form_error('gambar_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary mr-2">Ubah</button>
                            <a href="<?= base_url('Donasi_Barang') ?>" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>