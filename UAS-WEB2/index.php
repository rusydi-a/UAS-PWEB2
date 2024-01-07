<!DOCTYPE html>
<?php
    session_start();

    // Redirect logged-in users to the logistics dashboard
    if (isset($_SESSION['login'])) {
        header('Location: login.php');
        exit;
    }

    session_destroy();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Optimalkan rantai pasokan Anda dengan Portal Logistik kami." />
    <meta name="keywords" content="Logistik, Rantai Pasokan, Manajemen" />
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>Portal Logistik GadgetRealm</title>
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            background-color: #1a1a1a; /* Warna latar belakang gelap */
            color: #fff; /* Warna teks terang */
            font-family: 'Arial', sans-serif;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
        }

        .content {
            width: 600px;
            margin-left: 4rem;
            text-align: left;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }

        .login-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            text-decoration: none;
            background-color: #6495ed; /* Warna tombol biru */
            color: #fff;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #4169e1; /* Warna biru yang lebih gelap saat dihover */
        }

        .logistics-image {
            width: 100%;
            max-width: 400px;
            margin-right: 4rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Selamat Datang di Portal Logistik GadgetRealm</h1>
            <p>Optimalkan rantai pasokan Anda, kelola operasi logistik, dan optimalkan proses bisnis Anda!</p>
            <a href="login.php" class="login-btn">Masuk di sini</a>
        </div>
        <div class="logistics-image">
            <img src="./images/stock.png" alt="latar belakang logistik">
        </div>
    </div>
</body>
</html>
