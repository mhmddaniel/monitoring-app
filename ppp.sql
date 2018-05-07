-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Apr 2018 pada 04.51
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'asd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koordinat`
--

CREATE TABLE `koordinat` (
  `koordinat_id` int(11) NOT NULL,
  `koordinat_nama` varchar(100) DEFAULT NULL,
  `koordinat_lat` varchar(50) DEFAULT NULL,
  `koordinat_lng` varchar(50) DEFAULT NULL,
  `koordinat_alamat` text NOT NULL,
  `koordinat_value` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `koordinat`
--

INSERT INTO `koordinat` (`koordinat_id`, `koordinat_nama`, `koordinat_lat`, `koordinat_lng`, `koordinat_alamat`, `koordinat_value`) VALUES
(1, 'Majelis Taklim', '-1.8743864', '103.2536984', '', 10),
(2, 'Mushola Al Taqwa', '-1.9172228', '103.2509026', '', 30),
(3, 'TK Al Quran', '-1.223287', '104.1088266', '', 50),
(4, 'Rantau Rasua', '-1.204803', '104.1711287', '', 70),
(5, 'Pasar Baru', '-2.0735364', '102.2662472', '', 80),
(6, 'Gunung Masurai', '-2.4770791', '101.7585909', '', 20),
(7, 'Limboer', '-2.0499785', '102.4245782', '', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerja`
--

CREATE TABLE `pekerja` (
  `pekerja_id` int(11) NOT NULL,
  `pekerja_nama` varchar(50) NOT NULL,
  `pekerja_alamat` text NOT NULL,
  `pekerja_telp_kantor` char(12) NOT NULL,
  `pekerja_direktur` varchar(50) NOT NULL,
  `pekerja_telp_direktur` char(12) NOT NULL,
  `pekerja_jenis` enum('kontraktor','konsultan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerja`
--

INSERT INTO `pekerja` (`pekerja_id`, `pekerja_nama`, `pekerja_alamat`, `pekerja_telp_kantor`, `pekerja_direktur`, `pekerja_telp_direktur`, `pekerja_jenis`) VALUES
(1, 'asd', 'asd', '232', 'asds', '2332', 'kontraktor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `petugas_nik` varchar(20) NOT NULL,
  `petugas_nama` varchar(50) NOT NULL,
  `petugas_tel` char(12) NOT NULL,
  `petugas_bag` enum('ppk','kasubid','kabid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`petugas_nik`, `petugas_nama`, `petugas_tel`, `petugas_bag`) VALUES
('2323', 'asdsd', '2323', 'ppk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` int(11) NOT NULL,
  `proyek_nama` varchar(50) NOT NULL,
  `proyek_tahun` year(4) NOT NULL,
  `proyek_kategori_id` int(11) NOT NULL,
  `proyek_keuangan` int(11) NOT NULL,
  `proyek_pagu` int(11) NOT NULL,
  `proyek_kontrak` int(11) NOT NULL,
  `proyek_sech_awal` date NOT NULL,
  `proyek_sech_akhir` date NOT NULL,
  `proyek_koordinat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `proyek_nama`, `proyek_tahun`, `proyek_kategori_id`, `proyek_keuangan`, `proyek_pagu`, `proyek_kontrak`, `proyek_sech_awal`, `proyek_sech_akhir`, `proyek_koordinat_id`) VALUES
(13, '123', 2011, 1, 10000, 7, 2, '2018-04-09', '2018-04-19', 1),
(14, 'asdsdada', 2012, 1, 2000, 6, 3, '2018-04-10', '2018-04-11', 2),
(15, 'asds', 2013, 1, 3000, 5, 4, '2018-04-10', '2018-04-19', 3),
(16, 'asds', 2015, 1, 4000, 4, 5, '2018-04-13', '2018-04-11', 4),
(17, 'a', 2016, 1, 5000, 3, 6, '2018-04-09', '2018-04-19', 5),
(18, 'asd', 2017, 1, 6000, 2, 7, '2018-04-10', '2018-04-05', 6),
(19, 'as', 2018, 1, 72000, 1, 8, '2018-04-11', '2018-04-10', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_email` varchar(35) DEFAULT NULL,
  `user_telp` varchar(12) DEFAULT NULL,
  `user_level` enum('admin','petugas') DEFAULT NULL,
  `user_photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_email`, `user_telp`, `user_level`, `user_photo`) VALUES
(1, 'Administrator', 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', '082371373347', 'admin', 'user_blank.png'),
(2, 'asd', 'ads', '202cb962ac59075b964b07152d234b70', '', '123', 'petugas', '7ff19edb966495cd9619cc7688b8be43.jpg'),
(3, 'asdasdsd', 'asd', 'caf1a3dfb505ffed0d024130f58c5cfa', 'aa@aa.com', '123', 'petugas', '0772948ee86994cc7d1e0705719041bd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `koordinat`
--
ALTER TABLE `koordinat`
  ADD PRIMARY KEY (`koordinat_id`);

--
-- Indeks untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`pekerja_id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_nik`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `koordinat`
--
ALTER TABLE `koordinat`
  MODIFY `koordinat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `pekerja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
