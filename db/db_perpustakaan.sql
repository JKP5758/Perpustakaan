-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2024 pada 02.59
-- Versi server: 11.1.2-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `penulis`, `jumlah`, `deskripsi`) VALUES
(1, 'Mengejar Impian', 'Irvan S', 4, 'Perjuangan Seseorang dalam meraih impian dengan segala usaha dan kegigihan.'),
(2, 'Bumi', 'Tereliye', 2, 'Buku ini bercerita tentang 3 tokoh remaja yang hidup berdampingan di dunia Parrarel'),
(3, 'Your Name', 'Makoto Shinkai', 10, 'Novel Your Name mengisahkan tentang seorang gadis SMA bernama Mitsuha. Gadis ini tinggal di sebuah desa yang ada di daerah pegunungan. Suatu hari, Mitsuha bermimpi tentang dirinya yang berubah menjadi seorang anak laki-laki. Mitsuha kemudian bangun dari mimpinya itu, dan mendapati dirinya berada di sebuah kamar yang asing.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_history`
--

CREATE TABLE `data_history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Di Pinjam','Di Kembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_history`
--

INSERT INTO `data_history` (`id`, `id_user`, `id_buku`, `jumlah`, `id_petugas`, `tanggal`, `status`) VALUES
(2, 101, 1, 1, 1, '2024-01-01', 'Di Pinjam'),
(3, 101, 1, 1, 1, '2024-01-05', 'Di Kembalikan'),
(4, 102, 2, 2, 1, '2024-01-10', 'Di Pinjam'),
(5, 101, 3, 1, 1, '2024-01-01', 'Di Pinjam'),
(6, 105, 3, 1, 1, '2024-01-10', 'Di Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pinjam`
--

CREATE TABLE `data_pinjam` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Di Pinjam','DI Kembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_pinjam`
--

INSERT INTO `data_pinjam` (`id`, `id_user`, `id_buku`, `jumlah`, `id_petugas`, `tanggal`, `status`) VALUES
(1, 101, 1, 1, 1, '2024-01-05', 'DI Kembalikan'),
(4, 102, 2, 2, 1, '2024-01-10', 'Di Pinjam'),
(5, 101, 3, 1, 1, '2024-01-01', 'Di Pinjam'),
(6, 105, 3, 1, 1, '2024-01-10', 'Di Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no` varchar(15) NOT NULL,
  `leveluser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `password`, `no`, `leveluser`) VALUES
(1, 'admin', 'admin', '081234567890', 'admin'),
(2, 'Petugas', 'petugas', '080987654321', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `alamat`, `no`) VALUES
(101, 'Joko Purnomo', 'joko123', 'Mojosonggo, Boyolali', '08192168431'),
(102, 'Anji Nur Gilang', 'anji123', 'Klaten, Boyolali', '081928374650'),
(105, 'Adi', 'adi', 'kopang', '091');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `data_history`
--
ALTER TABLE `data_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petugas` (`id_petugas`),
  ADD KEY `buku` (`id_buku`),
  ADD KEY `user` (`id_user`);

--
-- Indeks untuk tabel `data_pinjam`
--
ALTER TABLE `data_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_history`
--
ALTER TABLE `data_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `data_pinjam`
--
ALTER TABLE `data_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_history`
--
ALTER TABLE `data_history`
  ADD CONSTRAINT `buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_pinjam`
--
ALTER TABLE `data_pinjam`
  ADD CONSTRAINT `id_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `id_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
