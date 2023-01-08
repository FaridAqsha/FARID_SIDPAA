<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Tambah Edit Donasi Uang</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $dua['id']; ?>">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Donasi</label>
                                <input type="text" name="nama_donasi" value="<?= $dua['nama_donasi']; ?>" class="form-control" id="nama_donasi" placeholder="Nama Donasi">
                                <?= form_error('nama_donasi', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDonatur">Donatur</label>
                                <select value="<?= $dua['id_user']; ?>" name="id_user" id="id_user" class="form-control">
                                    <?php foreach ($userr as $r) : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputtgldonasi">Tanggal Donasi</label>
                                <input type="date" name="tgl_donasi_uang" value="<?= $dua['tgl_donasi_uang']; ?>" class="form-control" id="tgl_donasi_uang" placeholder="Tanggal Donasi Uang">
                                <?= form_error('tgl_donasi_uang', '<small class="text-danger p1-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmnominal">Nominal</label>
                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="number" class="form-control" name="nominal" value="<?= $dua['nominal']; ?>" id="nominal" placeholder="Nominal">
                                </div>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary mr-2">Ubah</button>
                            <a href="<?= base_url('Donasi_uang') ?>" class="btn btn-danger">Tutup</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>