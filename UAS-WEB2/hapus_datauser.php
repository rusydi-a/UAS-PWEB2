<?php

require 'config/db_connect.php';

$userId = $_POST['id'];

$sql_hapus_user = "DELETE FROM login WHERE id='$userId'";
$barang_barang = mysqli_query($conn, $sql_hapus_user);

mysqli_close($conn);

header('Location: datauser.php');

?>