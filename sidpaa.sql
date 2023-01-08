-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2022 pada 20.54
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidpaa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_barang`
--

CREATE TABLE `donasi_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(50) NOT NULL,
  `tgl_donasi_barang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi_barang`
--

INSERT INTO `donasi_barang` (`id`, `nama_barang`, `gambar_barang`, `id_user`, `nominal`, `tgl_donasi_barang`) VALUES
(8, 'Mie Instan', 'indomie1.jpg', 49, 100, '2022-07-17'),
(9, 'Beras', 'beras1.jpg', 49, 10, '2022-07-17'),
(10, 'Galon Air', 'galon1.jpg', 49, 5, '2022-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi_uang`
--

CREATE TABLE `donasi_uang` (
  `id` int(11) NOT NULL,
  `nama_donasi` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_donasi_uang` date NOT NULL,
  `nominal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi_uang`
--

INSERT INTO `donasi_uang` (`id`, `nama_donasi`, `id_user`, `tgl_donasi_uang`, `nominal`) VALUES
(15, 'Sumbangan', 42, '2022-07-20', 1000000),
(18, 'Sumbangan', 48, '2022-07-16', 800000),
(19, 'Galang Dana', 43, '2022-07-20', 1000000),
(20, 'Sumbangan', 46, '2022-07-20', 350000),
(21, 'Galang Dana', 44, '2022-07-20', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nominal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `nama_pengeluaran`, `tgl_pengeluaran`, `nominal`) VALUES
(1, 'Pembelian Buku Pelajaran', '2022-07-17', 400000),
(2, 'Kebutuhan Pokok', '2022-07-19', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `gambar`, `role`, `alamat`, `nomor`) VALUES
(42, 'Greg', 'Gregsky@gmail.com', '$2y$10$YcpdeIRyUta3hmmn1oJTJOBGDWLBuy2jhccqFiKFHubZzaptfvIF.', '11.jpg', 'Donatur', 'Jl. Evenue No. 11', '0831273017399'),
(43, 'Klein', 'kleinggwp@gmail.com', '$2y$10$xK40T54/D8kIyKAGMJy63Onuud8v36SbkGHaRR4YBu9fSDVwlCN2.', '21.jpg', 'User', 'Jl. Sudirman No.80', '081263813577'),
(44, 'Bapak Alvin ', 'alvin@gmail.com', '$2y$10$Q2lbSYGUxiXBXUppGMGpkex2wdCuiEzdVI0W4FcqHbyscS65HUG7q', '41.jpg', 'Donatur', 'Jl. Singgalang No.13', '081324371048'),
(46, 'Yoru', 'yoru@gmail.com', '$2y$10$ExEkwh4S2nj71tpPUuHN/epVAUULM1ImmE.agvqtcmCCCfPSl3eQ.', 'yoru.jpg', 'User', 'Jl. Srikandi No.88', '081016339547'),
(47, 'Admin', 'admin@gmail.com', '$2y$10$.gfh5hq01PwPEFUVdZVt0uPXKesbJAcb3QkLb7IFiICj0xfZFyzLK', '32.jpg', 'Admin', 'Jl. Admin No.00', '0000000000'),
(48, 'Sova', 'shakdart@gmail.com', '$2y$10$t3kfpkRt0FubQ3Q.ZYmCQOBD7fENUe.7sQlOSmnn2GHxaX0E/lhoG', 'sova2.jpg', 'Donatur', 'Jl. Jalan Gass No.10', '083312342832'),
(49, 'Chriss', 'chrisspatah@gmail.com', '$2y$10$13l5ph4lpLL6ZyG8KGO7EOswvtLOoR/f3Xlq8VHXAd.ZfQ5Xnzf.u', 'chris.jpg', 'User', 'Jl. Gimang No.11', '081623882374');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `donasi_barang`
--
ALTER TABLE `donasi_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_brg` (`id_user`);

--
-- Indeks untuk tabel `donasi_uang`
--
ALTER TABLE `donasi_uang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_ung` (`id_user`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `donasi_barang`
--
ALTER TABLE `donasi_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `donasi_uang`
--
ALTER TABLE `donasi_uang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `donasi_barang`
--
ALTER TABLE `donasi_barang`
  ADD CONSTRAINT `id_user_brg` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `donasi_uang`
--
ALTER TABLE `donasi_uang`
  ADD CONSTRAINT `id_user_ung` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
