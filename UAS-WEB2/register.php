<?php
require 'config/db_connect.php';

if (isset($_POST['register'])) {
    // Retrieve form data
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telpon = $_POST['telpon'];
    $email = $_POST['email'];
    $password = $_POST['password']; // No hashing for simplicity
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $role = $_POST['role'];

    // Set your target directory
    $target_dir = 'uploads/';

    // Check if the directory exists, if not, create it
    if (!file_exists($target_dir) && !mkdir($target_dir, 0777, true)) {
        die('Failed to create upload directory');
    }

    $foto = uploadFile($_FILES['foto'], $target_dir);

    // Insert data into the database
    $sql = "INSERT INTO login (nama, jenis_kelamin, telpon, email, password, foto, nama_perusahaan, alamat_perusahaan, role) 
            VALUES ('$nama', '$jenis_kelamin', '$telpon', '$email', '$password', '$foto', '$nama_perusahaan', '$alamat_perusahaan', '$role')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "
        <script>
                alert('Registrasi berhasil');
                window.location.href = 'register.php';
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Function to handle file upload with unique filename
function uploadFile($file, $target_dir)
{
    if ($file['error'] == 0) {
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $unique_filename = uniqid() . '_' . time() . '.' . $file_extension;
        $foto = $target_dir . $unique_filename;

        if (move_uploaded_file($file['tmp_name'], $foto)) {
            echo 'File berhasil diunggah. Registrasi berhasil!';
            return $unique_filename; // Mengembalikan nama file yang unik
        } else {
            die('Gagal mengunggah file.');
        }
    } else {
        die('Terjadi kesalahan saat mengunggah file.');
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Open Sans', sans-serif;
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

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            width: 100%;
            margin-bottom: 1px;
            color: #777;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
            color: #333;
        }

        select {
            width: 105%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 14px;
            color: #333;
        }

        button {
            width: 100%;
            padding: 8px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }

        p {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        /* CSS Modification */
        .form-row {
            display: flex;
            justify-content: space-between;
        }

        
    </style>
</head>
<body>
<a href="login.php" id="backButton">Kembali</a>
    <h1>Registrasi</h1>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>

        <div class="form-row">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-row">
            <label for="telpon">Telpon:</label>
            <input type="text" id="telpon" name="telpon" required>
        </div>

        <div class="form-row">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-row">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-row">
            <label for="profile_picture">Upload Foto:</label>
            <input type="file" id="foto" name="foto" required>
        </div>

        <div class="form-row">
            <label for="company_name">Nama Perusahaan:</label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan" required>
        </div>
        <div class="form-row">
            <label for="company_address">Alamat Perusahaan:</label>
            <input type="text" id="alamat_perusahaan" name="alamat_perusahaan" required>
        </div>
        <div class="form-row">
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="supplier">Supplier</option>
            </select>
        </div>
        <button type="submit" name="register">Daftar</button>
    </form>

    

</body>
</html>
