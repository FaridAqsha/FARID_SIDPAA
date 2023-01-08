<div class="main-content">
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        <div class="page-header">
            <div class="row clearfix">
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
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <h3 class="card-title">Data Bars</h3>
                            <div class="row mb-15">
                                <div class="col-9">Data User</div>
                                <div class="col-3 text-right"><?= $c_user ?></div>
                                <div class="col-12">
                                    <div class="progress progress-sm mt-5">
                                        <div class="progress-bar bg-dark" role="progressbar" style="width: <?= $c_user ?>%" aria-valuenow="<?= $c_user ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-15">
                                <div class="col-9">Data Donatur</div>
                                <div class="col-3 text-right"><?= $c_donatur ?></div>
                                <div class="col-12">
                                    <div class="progress progress-sm mt-5">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $c_donatur ?>%" aria-valuenow="<?= $c_donatur ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-15">
                                <div class="col-9">Donasi Uang</div>
                                <div class="col-3 text-right">Rp.
                                    <?php
                                    $dutotal  = 0;
                                    ?>
                                    <?php foreach ($donasi_uang as $duang) :
                                        $dutotal += $duang['nominal'];
                                    ?>
                                    <?php endforeach; ?>
                                    <?= $dutotal ?></div>
                                <div class="col-12">
                                    <div class="progress progress-sm mt-5">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $dutotal / 100000 ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-15">
                                <div class="col-9">Pengeluaran</div>
                                <div class="col-3 text-right">Rp.
                                    <?php
                                    $ptotal  = 0;
                                    ?>
                                    <?php foreach ($pengeluaran as $p) :
                                        $ptotal += $p['nominal'];
                                    ?>
                                    <?php endforeach; ?>
                                    <?= $ptotal ?></div>
                                <div class="col-12">
                                    <div class="progress progress-sm mt-5">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $ptotal / 100000 ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-15">
                                <div class="col-9">Data Donasi Barang</div>
                                <div class="col-3 text-right"><?= $c_db ?></div>
                                <div class="col-12">
                                    <div class="progress progress-sm mt-5">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $c_db ?>%" aria-valuenow="<?= $c_db ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>