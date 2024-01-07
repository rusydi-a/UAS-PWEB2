<?php

require 'config/db_connect.php';

$userId = $_POST['id'];
$telpon = $_POST['telpon'];
$password = $_POST['password'];

$sql_edit = "UPDATE login SET telpon='$telpon', password='$password' WHERE id='$userId'";
$edit_user = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: datauser.php');

?>