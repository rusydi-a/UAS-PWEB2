<?php

require 'config/db_connect.php';

$namabarang = $_POST['namabarang'];
$stok = $_POST['stok'];
$tipe = $_POST['tipe'];
$deskripsi = $_POST['deskripsi'];

$sql = "INSERT INTO stock (namabarang, stock, tipe, deskripsi) values('$namabarang', '$stok', '$tipe', '$deskripsi')";
$addtotable = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: admin_dashboard.php');

?>