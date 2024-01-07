<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';
require 'config/db_connect.php';
require 'get_datauser.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Management Stok Barang" />
    <meta name="keywords" content="Management Stock, Stock App, Barang" />
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>GadgetRealm</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>



<body class="sb-nav-fixed">

    <?php require 'templates/topnavigation.php'; ?>

    <div id="layoutSidenav">

        <?php require 'templates/sidenavigation.php'; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-sm-4">
                    <h1 class="my-4">Data User</h1>
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                            <div class="py-2">
                                <i class="fas fa-table me-1"></i>
                                Data User
                            </div>
                        </div>
                        <div class="card-body overflow-auto">
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>JK</th>
                                        <th>Telpon</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Foto</th>
                                        <th>Nama.P</th>
                                        <th>Alamat.P</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
            <?php foreach ($data_users as $user): ?>
                
                <tr>
                    <td><?php echo $i; ?></td>
                                            <td><?php echo $user['nama']; ?></td>
                                            <td><?php echo $user['jenis_kelamin']; ?></td>
                                            <td><?php echo $user['telpon']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td><?php echo $user['password']; ?></td>
                                            <td>
                                                <img src="uploads/<?php echo $user['foto']; ?>" alt="User Photo" style="width: 50px; height: 50px;">
                                            </td>
                                            <td><?php echo $user['nama_perusahaan']; ?></td>
                                            <td><?php echo $user['alamat_perusahaan']; ?></td>
                                            <td><?php echo $user['role']; ?></td>
                                            <td>
                                            <td>
                <button class="btn btn-warning mb-1" onclick="editUser(<?= $user['id']; ?>)">Edit</button>
                <button class="btn btn-danger mb-1" onclick="deleteUser(<?= $user['id']; ?>)">Hapus</button>
            </td>
                </tr>
                <?php $i++; ?>

             <?php endforeach; ?>
        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function editUser(userId) {
            window.location.href = 'edit_datauser.php?id=' + userId;
        }

        function deleteUser(userId) {
            window.location.href = 'hapus_datauser.php?id=' + userId;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>

</html>