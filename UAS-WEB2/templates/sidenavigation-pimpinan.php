<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-3">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'pimpinan_dashboard') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-layer-group"></i></div>
                    Penyimpanan Logistik
                </a>
                <a class="nav-link" href="barang_masuk-pimpinan.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'barang_masuk') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-plus"></i></div>
                    Logistik Penerimaan
                </a>
                <a class="nav-link" href="barang_keluar-pimpinan.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'barang_keluar') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-minus"></i></div>
                    Logistik Pengiriman
                </a>
                <a class="nav-link mt-4" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                    Log Out
                </a>
                
            </div>
        </div>
 <!-- Bagian Profil Pengguna -->
 <div class="sb-sidenav-footer">
            <?php
            include 'config/db_connect.php';
            // Mengambil foto profil pengguna dari basis data
            $email = $_SESSION['email'];
            $query = "SELECT foto,nama,role FROM login WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $foto = $row['foto'];
                $nama = $row['nama'];
                $role = $row['role'];

                // Memeriksa apakah URL foto tidak kosong
                if (!empty($foto)) {
                    $uploadsFolder = 'uploads/'; // Sesuaikan dengan lokasi folder uploads Anda
                    $photoUrl = $uploadsFolder . $foto;

                    // Menampilkan foto pengguna dengan lebar dan tinggi maksimum
                    echo '<div class="user-button">';
                    echo '<a href="profil-pimpinan.php">';
                    echo '<img src="' . $photoUrl . '" alt="Foto Pengguna" class="user-photo">';
                    echo '<span class="user-name">' . $nama . ' - ' . $role . '</span>';
                    echo '</a>';
                    echo '</div>';
                }

                // Menampilkan pesan "Logged in as" dan email pengguna
                echo '<div class="small">Logged in as: ' . $_SESSION['email'] . '</div>';
            }
            ?>
        </div>
    </nav>
</div>

<style>
    /* Tambahkan di bagian paling bawah CSS Anda atau sesuaikan dengan gaya yang sudah ada */

    .user-button a {
        display: flex;
        align-items: center;
        text-decoration: none; /* Menghapus garis bawah pada tautan */
        color: inherit; /* Mengambil warna teks dari konteksnya */
    }

    .user-photo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
        transition: transform 0.3s;
    }

    .user-name {
        font-size: 1.2em;
        color: #333; /* Ganti warna teks sesuai kebutuhan Anda */
    }
</style>
