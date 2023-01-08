<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-success">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h4>Donasi Uang</h4>
                                    <h4>Rp.
                                        <?php
                                        $dutotal  = 0;
                                        ?>
                                        <?php foreach ($donasi_uang as $duang) :
                                            $dutotal += $duang['nominal'];
                                        ?>
                                        <?php endforeach; ?>
                                        <?= $dutotal ?>
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-dollar-sign"></i>
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
                            <a href="<?= base_url() ?>donasi_uang/tambah" class="btn btn-info">Tambah Donasi Uang</a>
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
                                    <th>Nama Donasi</th>
                                    <th>Donatur</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nominal</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($donasi_uang_nama as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?></td>
                                        <td><?= $us['nama_donasi']; ?></td>
                                        <td><?= $us['nama']; ?></td>
                                        <td><?= $us['tgl_donasi_uang']; ?></td>
                                        <td><?= $us['nominal']; ?></td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="<?= base_url('Donasi_uang/detail/') . $us['id']; ?>" class="ik ik-eye text-blue"></a>
                                                <?php
                                                if ($user['role'] == 'Admin') {
                                                ?>
                                                    <a href="<?= base_url('Donasi_uang/edit/') . $us['id']; ?>" class="ik ik-edit-2 text-yellow"></a>
                                                    <a href="<?= base_url('Donasi_uang/hapus/') . $us['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="ik ik-trash-2 text-red"></a>
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