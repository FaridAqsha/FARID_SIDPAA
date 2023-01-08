<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-warning">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h4>Donasi Barang</h4>
                                    <h4><?= $c_db ?></h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-package"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <?php
                        if ($user['role'] == 'Admin') {
                        ?>
                            <a href="<?= base_url() ?>donasi_barang/tambah" class="btn btn-info">Tambah Donasi Barang</a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message') ?>
                        <table id="data_table" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th class="nosort">Gambar Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Donatur</th>
                                    <th>Tanggal Donasi</th>
                                    <th>Nominal</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($donasi_barang_nama as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?></td>
                                        <td><img src="<?= base_url('assets/img/barang/') . $us['gambar_barang']; ?>" style="width : 100px;" class="img-fluid img-20"></td>
                                        <td><?= $us['nama_barang']; ?></td>
                                        <td><?= $us['nama']; ?></td>
                                        <td><?= $us['tgl_donasi_barang']; ?></td>
                                        <td><?= $us['nominal']; ?></td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="<?= base_url('Donasi_barang/detail/') . $us['id']; ?>" class="ik ik-eye text-blue"></a>
                                                <?php
                                                if ($user['role'] == 'Admin') {
                                                ?>
                                                    <a href="<?= base_url('Donasi_barang/edit/') . $us['id']; ?>" class="ik ik-edit-2 text-yellow"></a>
                                                    <a href="<?= base_url('Donasi_barang/hapus/') . $us['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="ik ik-trash-2 text-red"></a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>