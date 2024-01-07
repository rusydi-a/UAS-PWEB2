<?php
// Sertakan koneksi ke database atau file konfigurasi database
require 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Tangkap data dari formulir
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telpon = $_POST['telpon'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $role = $_POST['role'];

    // Set your target directory
    $target_dir = 'uploads/';

    // Check if the directory exists, if not, create it
    if (!file_exists($target_dir) && !mkdir($target_dir, 0777, true)) {
        die('Failed to create upload directory');
    }

    // Upload foto
    $foto_name = uploadFile($_FILES['foto'], $target_dir);

    // Masukkan data ke dalam database
    $query = "INSERT INTO login (nama, jenis_kelamin, telpon, email, password, foto, nama_perusahaan, alamat_perusahaan, role) VALUES ('$nama', '$jenis_kelamin', '$telpon', '$email', '$password', '$foto_name', '$nama_perusahaan', '$alamat_perusahaan', '$role')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika berhasil, arahkan kembali ke halaman utama atau halaman data user
        header('Location: datauser.php');
    } else {
        // Jika gagal, tampilkan pesan error atau lakukan tindakan yang sesuai
        echo 'Gagal menambahkan user. Silakan coba lagi.';
    }
} else {
    // Jika bukan metode POST, mungkin perlu melakukan tindakan tambahan atau redirect
    echo 'Akses tidak sah.';
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
