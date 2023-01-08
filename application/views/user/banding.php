<table id="data_table" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th class="nosort">Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th class="nosort">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>001</td>
            <td><img src="../img/users/1.jpg" class="table-user-thumb" alt=""></td>
            <td>Erich Heaney</td>
            <td>erich@example.com</td>
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td>002</td>
            <td><img src="../img/users/2.jpg" class="table-user-thumb" alt=""></td>
            <td>Abraham Douglas</td>
            <td>jgraham@example.com</td>
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td>003</td>
            <td><img src="../img/users/3.jpg" class="table-user-thumb" alt=""></td>
            <td>Roderick Simonis</td>
            <td>grant.simonis@example.com</td>
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td>004</td>
            <td><img src="../img/users/4.jpg" class="table-user-thumb" alt=""></td>
            <td>Christopher Henry</td>
            <td>henry.chris@example.com</td>
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
        </tr>
        <tr>
            <td>005</td>
            <td><img src="../img/users/5.jpg" class="table-user-thumb" alt=""></td>
            <td>Sonia Wilkinson</td>
            <td>boyle.aglea@example.com</td>
            <td>
                <div class="table-actions">
                    <a href="#"><i class="ik ik-eye"></i></a>
                    <a href="#"><i class="ik ik-edit-2"></i></a>
                    <a href="#"><i class="ik ik-trash-2"></i></a>
                </div>
            </td>
        </tr>
    </tbody>
</table>



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

        <tr>
            <?php $i = 1; ?>
            <?php foreach ($userr as $us) : ?>
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
                            <a href="<?= base_url('User/hapus/') . $us['id']; ?>" class="ik ik-trash-2 text-red"></a>
                        <?php
                        }
                        ?>
                    </div>
                </td>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tr>

    </tbody>
</table>