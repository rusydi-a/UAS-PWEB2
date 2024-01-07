<?php
$sql_get_users = "SELECT * FROM login";
$result_get_users = mysqli_query($conn, $sql_get_users);
$data_users = mysqli_fetch_all($result_get_users, MYSQLI_ASSOC);
mysqli_free_result($result_get_users);
?>
