-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Jan 2024 pada 02.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `penerima` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `qty`, `penerima`) VALUES
(27, 19, '2023-12-19 19:39:02', 50, 'ELEVEN'),
(29, 4, '2023-12-20 02:00:16', 200, 'RENDY CELL'),
(30, 2, '2023-12-20 02:03:52', 100, 'ERAFONE'),
(32, 3, '2023-12-31 04:01:46', 45, 'FARLIGHT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `role` enum('supplier','admin','pimpinan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `jenis_kelamin`, `telpon`, `email`, `password`, `foto`, `nama_perusahaan`, `alamat_perusahaan`, `role`) VALUES
(1, 'Putri', 'Perempuan', '081234567890', 'admin@gmail.com', 'admin', 'foto1.jpg', 'Perusahaan A', 'Jl. A No. 1, Kota A', 'admin'),
(2, 'Arya', 'Laki-laki', '081234567891', 'pimpinan@gmail.com ', 'pimpinan', 'foto2.jpg', 'Perusahaan A', 'Jl. A No. 1, Kota A', 'pimpinan'),
(3, 'Ricardo', 'Laki-laki', '081234567892', 'supplier1@gmail.com ', 'supplier1', 'foto3.jpg', 'Perusahaan B', 'Jl. B No. 2, Kota B', 'supplier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `qty` int(11) NOT NULL,
  `penerima` varchar(25) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `qty`, `penerima`, `email`) VALUES
(31, 2, '2023-12-20 01:49:58', 100, 'VERIL', 'supplier1@gmail.com'),
(32, 3, '2023-12-20 01:50:31', 100, 'RISKI', 'supplier1@gmail.com'),
(33, 4, '2023-12-20 01:51:22', 100, 'ZALDI', 'supplier1@gmail.com'),
(34, 5, '2023-12-20 01:53:20', 100, 'RUSYDI', 'supplier1@gmail.com'),
(35, 6, '2023-12-20 01:53:34', 100, 'VERIL', 'supplier1@gmail.com'),
(36, 7, '2023-12-20 01:53:56', 100, 'RISKI', 'supplier1@gmail.com'),
(37, 8, '2023-12-20 01:54:11', 100, 'ZALDI', 'supplier1@gmail.com'),
(38, 9, '2023-12-20 01:54:29', 100, 'RUSYDI', 'supplier1@gmail.com'),
(39, 10, '2023-12-20 01:54:45', 100, 'VERIL', 'supplier1@gmail.com'),
(40, 1, '2023-12-20 01:58:14', 100, 'RUSYDI', 'supplier1@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(25) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `tipe`, `stock`) VALUES
(1, 'Asus Rog', 'Laptop gaming terbaik dunia', 'Laptop', 194),
(2, 'Macbook Pro', 'Laptop profesional dari Apple', 'Laptop', 200),
(3, 'Dell XPS', 'Laptop kaya fitur dan desain kekinian', 'Laptop', 355),
(4, 'Samsung Galaxy S21', 'Smartphone terbaru dari Samsung', 'Smartphone', 420),
(5, 'Apple iPhone 12', 'Smartphone kaya fitur dari Apple', 'Smartphone', 600),
(6, 'OnePlus 9 Pro', 'Smartphone premium dari OnePlus', 'Smartphone', 700),
(7, 'Google Pixel 5a', 'Smartphone akses harga dari Google', 'Smartphone', 800),
(8, 'Huawei P40 Pro', 'Smartphone top tier dari Huawei', 'Smartphone', 900),
(9, 'Xiaomi 11 Pro', 'Smartphone pemula dari Xiaomi', 'Smartphone', 1000),
(10, 'Sony WH-1000XM4', 'Headset kulit wireless top termahal', 'Headset', 1100),
(11, 'Apple AirPods Max', 'Headset kulit wireless top terbaik', 'Headset', 1100),
(12, 'Bose QuietComfort 35', 'Headset wireless dengan kualitas audio tinggi', 'Headset', 1200),
(13, 'Sennheiser HD 660 S', 'Headset semi kulit dengan kualitas audio tinggi', 'Headset', 1300),
(14, 'Logitech G Pro X', 'Gamepad konsol independent', 'Gamepad', 1400),
(15, 'Razer Viper Ultimate', 'Mouse gaming ergonomis dengan DPI tinggi', 'Mouse', 1500),
(16, 'Razer BlackWidow Chroma V', 'Keyboard gaming dengan backlight dan DPI tinggi', 'Keyboard', 1600),
(17, 'Nintendo Switch', 'Konsol game home dunia terbaik', 'Konsol', 1700),
(18, 'PlayStation 5', 'Konsol game home dunia yang baru', 'Konsol', 1800),
(19, 'Xbox Series X', 'Konsol game home dunia terbaik dengan fitur cloud ', 'Konsol', 1900),
(20, 'Roku TV 50', 'Pleyer media sambil streaming yang murah harga', 'Media Player', 2000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
