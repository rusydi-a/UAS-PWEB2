<?php
// Memulai sesi PHP
session_start();

// Memasukkan konfigurasi koneksi ke database
require 'config/db_connect.php';

// Memeriksa apakah koneksi ke database berhasil
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data user berdasarkan email dari sesi saat ini
$email = $_SESSION['email'];
$data = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");
$user = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <!-- <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Management Stok Barang" />
    <meta name="keywords" content="Management Stock, Stock App, Barang" /> -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>GadgetRealm</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <!-- Top Navigation -->
    <?php require 'templates/topnavigation.php'; ?>

    <!-- Layout Sidenav -->
    <div id="layoutSidenav">
        <!-- Side Navigation -->
        <?php require 'templates/sidenavigation.php'; ?>

        <!-- Layout Sidenav Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-sm-4">
                    <h1 class="my-4">Profil User</h1>

                    <!-- User Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>
                                        <img src="uploads/<?php echo $user['foto']; ?>" alt="User Photo" style="width: 100px; height: 100px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?php echo $user['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?php echo $user['jenis_kelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td>Telpon</td>
                                    <td>:</td>
                                    <td><?php echo $user['telpon']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $user['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Perusahaan</td>
                                    <td>:</td>
                                    <td><?php echo $user['nama_perusahaan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Perusahaan</td>
                                    <td>:</td>
                                    <td><?php echo $user['alamat_perusahaan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td><?php echo $user['role']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <?php require 'templates/footer.php'; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
