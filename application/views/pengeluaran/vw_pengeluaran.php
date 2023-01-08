<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget bg-danger">
                        <div class="widget-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="state">
                                    <h4>Pengeluaran</h4>
                                    <h4>Rp.
                                        <?php
                                        $ptotal  = 0;
                                        ?>
                                        <?php foreach ($pengeluaran as $p) :
                                            $ptotal += $p['nominal'];
                                        ?>
                                        <?php endforeach; ?>
                                        <?= $ptotal ?>
                                    </h4>
                                </div>
                                <div class="icon">
                                    <i class="ik ik-file-text"></i>
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
                            <a href="<?= base_url() ?>pengeluaran/tambah" class="btn btn-info">Tambah Data Pengeluaran</a>
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
                                    <th>Nama Pengeluaran</th>
                                    <th>Tanggal Pengeluaran</th>
                                    <th>Nominal</th>
                                    <th class="nosort">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pengeluaran as $us) : ?>
                                    <tr>
                                        <td> <?= $i; ?></td>
                                        <td><?= $us['nama_pengeluaran']; ?></td>
                                        <td><?= $us['tgl_pengeluaran']; ?></td>
                                        <td><?= $us['nominal']; ?></td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="<?= base_url('Pengeluaran/detail/') . $us['id']; ?>" class="ik ik-eye text-blue"></a>
                                                <?php
                                                if ($user['role'] == 'Admin') {
                                                ?>
                                                    <a href="<?= base_url('Pengeluaran/edit/') . $us['id']; ?>" class="ik ik-edit-2 text-yellow"></a>
                                                    <a href="<?= base_url('Pengeluaran/hapus/') . $us['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="ik ik-trash-2 text-red"></a>
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