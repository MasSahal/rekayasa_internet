<div class="card">
    <div class="card-header">
        <h5>Data User <?= $view['fullname']; ?></h5>
        <div class="card-header-right">
            <i class="fa fa-times pointer" onclick="uri('data_users.php')"></i>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="../assets/images/profile/<?= $view['profile']; ?>" class="img-fluid  mt-3">
            </div>
            <div class="col-md-8">
                <table class="table table-borderless w-75">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td><?= $view['fullname']; ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>:</td>
                        <td><?= $view['username']; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>:</td>
                        <td><?= $view['no_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Tipe Akun</th>
                        <td>:</td>
                        <td><?= $view['role'] == 1 ? "Administrator" : "Pengguna"; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Daftar</th>
                        <td>:</td>
                        <td><?= $view['created_user']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>
                            <p><?= $view['alamat']; ?></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-sm btn-secondary" href="./data_users.php" role="button">Kembali</a>
    </div>
</div>