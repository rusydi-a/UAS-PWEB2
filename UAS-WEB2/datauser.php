<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
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
    </head>
    <body class="sb-nav-fixed">

        <?php require 'templates/topnavigation.php'; ?>
        
        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
                        <h1 class="my-4">Data User</h1>
                        <div class="card mb-4 overflow-auto">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data User
                                </div>
                                <button type="button" class="btn btn-primary mr-auto" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Tambah User Pimpinan
                                </button>
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
                                        <th>Nama Perusahaan</th>
                                        <th>Alamat Perusahaan</th>
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
                                                <div class="d-flex">
    <button type="button" class="btn btn-warning mb-1 me-2" style="width: 75px; height: 40px;" data-bs-toggle="modal" data-bs-target="#edit<?php echo $user['id']; ?>">
        Edit
    </button>
    <button type="button" class="btn btn-danger mb-1" style="width: 75px; height: 40px;" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $user['id']; ?>">
        Hapus
    </button>
</div>

                                            </tr>

                                            <?php $i++; ?>

                                            <div class="modal fade" id="edit<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit No.Telpon & Password User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="edit_datauser.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                                                <input type="text" name="telpon" value="<?php echo $user['telpon']; ?>" class="form-control mb-3" required />
                                                                <input type="text" name="password" value="<?php echo $user['password']; ?>" class="form-control mb-3" required />
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="hapus<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="hapus_datauser.php">
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus <?php echo $user['nama']; ?> ?</p>
                                                                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php require 'templates/footer.php'; ?>

            </div>
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User Pimpinan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="tambah_user_pimpinan.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="nama" placeholder="Nama Pimpinan" class="form-control mb-3" required />
                    <div class="mb-3">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
        <option value="" disabled selected>Pilih jenis kelamin</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>

                    <input type="text" name="telpon" placeholder="Telpon" class="form-control mb-3" required />
                    <input type="email" name="email" placeholder="Email" class="form-control mb-3" required />
                    <input type="password" name="password" placeholder="Password" class="form-control mb-3" required />
                    <input type="file" name="foto" class="form-control mb-3" enctype="multipart/form-data" required />
                    <input type="text" name="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control mb-3" required />
                    <textarea name="alamat_perusahaan" placeholder="Alamat Perusahaan" class="form-control mb-3" required></textarea>
                    <select name="role" class="form-control mb-3" required>
                        <option value="Pimpinan">Pimpinan</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
