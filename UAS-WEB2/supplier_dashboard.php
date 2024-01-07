<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';
require 'get_barang_keluar.php';
require 'get_barang_masuk.php';


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
            
            <?php require 'templates/sidenavigation-supplier.php'; ?>
    
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
                        <h1 class="my-4">Penyimpanan Logistik</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data Penyimpanan Logistik
                                </div>
                                
                            </div>
                            
                            <?php foreach($data_stok_barang as $item): ?>
                                <?php if ($item['stock'] == 0): ?>
                                    <div class="alert alert-danger alert-dismissible fade show mt-2 mb-0 mx-3">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        <strong>Perhatian!</strong> Stok barang <?php echo $item['namabarang']; ?> sudah habis.
                                    </div>
                                    <?php endif ?>
                            <?php endforeach ?>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Tipe</th>
                                            <th>Deskripsi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data_stok_barang as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['namabarang']; ?></td>
                                                <td><?php echo $item['stock']; ?></td>
                                                <td><?php echo $item['tipe']; ?></td>
                                                <td><?php echo $item['deskripsi']; ?></td>
                                                
                                            </tr>

                                            <?php $i++; ?>

                                           
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

       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
