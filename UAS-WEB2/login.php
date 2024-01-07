<?php

require 'config/db_connect.php';

session_start();

if (isset($_SESSION['login'])) {
    
    $role = $_SESSION['role'];

    if ($role == 'admin') {
        header('Location: admin_dashboard.php');
    } elseif ($role == 'pimpinan') {
        header('Location: pimpinan_dashboard.php');
    } elseif ($role == 'supplier') {
        header('Location: supplier_dashboard.php');
    } else {
        header('Location: login.php');
    }
    exit;
} 


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role=$_POST['role'];

    $sql = "SELECT * FROM login WHERE email='$email' AND password='$password' AND role='$role'";

    $cek_user = mysqli_query($conn, $sql);

    if (mysqli_num_rows($cek_user) > 0) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header('Location: admin_dashboard.php');
        } elseif ($role == 'supplier') {
            header('Location: supplier_dashboard.php');
        } elseif ($role == 'pimpinan') {
            header('Location: pimpinan_dashboard.php');
        } else {
            // role tidak dikenal, berikan pesan error atau redirect ke halaman login yang biasa
            header('Location: login.php');
        }
    } else {
        echo "
            <script>
                alert('Email atau password salah!');
                window.location.href = 'login.php';
            </script>
        ";
    }
}

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
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    body {
        background-color: #f0f2f5;
    }

    .login-card {
        width: 30%;
        margin: 10% auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    .login-card .btn {
        border-radius: 10px;
    }

    .register-link {
        margin-top: 20px;
        display: block;
        text-align: center;
    }
    #backButton {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 8px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

</style>

<body style="background-color: aliceblue; padding: 10px">
<a href="index.php" id="backButton">Kembali</a>
    <div id="layoutAuthentication" style="height: 100vh" class="flex-row align-items-center">
        <div id="layoutAuthentication_content">
            <main>
                <div class="login-card">
                <h3 class="text-center" style="margin-bottom: 20px;">GadgetRealm Login</h3>
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" id="inputEmail" type="email"
                                placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="password" id="inputPassword" type="password"
                                placeholder="Password" />
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="role" id="role" type="role" placeholder=""
                                aria-label="Floating label select example">
                                <option value="" disabled selected>Pilih kategori pengguna</option>
                                <option value="admin">Admin</option>
                                <option value="supplier">Supplier</option>
                                <option value="pimpinan">Pimpinan</option>
                            </select>
                            <label for="role">Role</label>
                        </div>
                        <div class="mt-4 mb-0 text-center rounded-full">
                            <button class="btn btn-dark " style="width: 100%; border-radius: 10px"
                                name="login">Login</button>
                        </div>
                        <div class="mt-4 mb-0 text-center rounded-full">
                            <a class="btn btn-dark " style="width: 100%; border-radius: 10px"
                                href="register.php">Register</a>
                        </div>
                    </form>
                </div>
            </main>
            <div style="text-align: center;">
                <p> Akses Admin = Email : admin@gmail.com ; Password : admin; Role : Admin </p>
                <p> Akses Pimpinan = Email : pimpinan@gmail.com ; Password : pimpinan; Role : Pimpinan </p>
                <p>Akses Supplier = Email : supplier1@gmail.com ; Password : supplier1; Role : Supplier</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>