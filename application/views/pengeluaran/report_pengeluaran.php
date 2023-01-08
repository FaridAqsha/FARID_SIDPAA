<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="row">
        <div class="col text-center">
            <h3 class="h3 text-dark"><?= $title ?></h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Pengeluaran</td>
                    <td>Tanggal Pengeluaran</td>
                    <td>Nominal</td>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($all_pengeluaran as $p) : ?>
                    <tr>
                        <td> <?= $i; ?>.</td>
                        <td><?= $p['nama_pengeluaran'] ?></td>
                        <td><?= $p['tgl_pengeluaran'] ?></td>
                        <td><?= $p['tanggal'] ?> </td>
                        <td>Rp <?= number_format($p['nominal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>