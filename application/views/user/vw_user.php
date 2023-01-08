<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget bg-dark">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h4>User</h4>
                                <h4><?= $c_user ?></h4>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="widget bg-primary">
                    <div class="widget-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="state">
                                <h4>Donatur</h4>
                                <h4><?= $c_donatur ?></h4>
                            </div>
                            <div class="icon">
                                <i class="ik ik-users"></i>
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
                        <a href="<?= base_url() ?>user/tambah" class="btn btn-info">Tambah User</a>
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
                                <th class="nosort">Foto</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Nomor HP</th>
                                <th class="nosort">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($userr as $us) : ?>
                                <tr>
                                    <td> <?= $i; ?></td>
                                    <td><img src="<?= base_url('assets/img/user/') . $us['gambar']; ?>" style="width : 100px;" class="rounded-circle"></td>
                                    <td><?= $us['nama']; ?></td>
                                    <td><?= $us['email']; ?></td>
                                    <td><?= $us['role']; ?></td>
                                    <td><?= $us['alamat']; ?></td>
                                    <td><?= $us['nomor']; ?></td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="<?= base_url('User/detail/') . $us['id']; ?>" class="ik ik-eye text-blue"></a>
                                            <?php
                                            if ($user['role'] == 'Admin') {
                                            ?>
                                                <a href="<?= base_url('User/edit/') . $us['id']; ?>" class="ik ik-edit-2 text-yellow"></a>
                                                <a href="<?= base_url('User/hapus/') . $us['id']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="ik ik-trash-2 text-red"></a>
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