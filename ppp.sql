-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Bulan Mei 2018 pada 09.27
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
(1, 'Kategori 1'),
(6, 'Kategori 3');

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
(7, 'Limboer', '-2.0499785', '102.4245782', '', 100),
(8, 'TG', '-1.2469685', '104.3859743', 'Unnamed Road, Remau Baku Tuo, Sadu, Kabupaten Tanjung Jabung Timur, Jambi 36773, Indonesia', 0),
(9, 'Pantai', '-1.2797012', '103.0905024', 'Jl. Trans Sumatra, Kabupaten Tanjung Jabung Barat, Jambi, Indonesia', 0),
(10, 'Perintis Kemerdekaan', '-1.6101229', '103.6131203', 'Jambi, Kota Jambi, Jambi, Indonesia', 0),
(11, 'Talang', '-1.7500031', '101.9611475', 'Unnamed Road, Aur Cino, Kec. Bathin III Ulu, Kabupaten Bungo, Jambi 37261, Indonesia', 80),
(12, '41asd', '-1.6101229', '103.6131203', 'Jambi, Kota Jambi, Jambi, Indonesia', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerja`
--

CREATE TABLE `pekerja` (
  `pekerja_nip` varchar(20) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `pekerja_nama` varchar(35) NOT NULL,
  `pekerja_tel` char(12) NOT NULL,
  `pekerja_jenis` enum('kontraktor','konsultan') NOT NULL,
  `pekerja_nama_direktur` varchar(50) NOT NULL,
  `pekerja_tel_direktur` char(12) NOT NULL,
  `pekerja_nama_perusahaan` varchar(50) NOT NULL,
  `pekerja_alamat_perusahaan` text NOT NULL,
  `pekerja_tel_kantor` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerja`
--

INSERT INTO `pekerja` (`pekerja_nip`, `proyek_id`, `pekerja_nama`, `pekerja_tel`, `pekerja_jenis`, `pekerja_nama_direktur`, `pekerja_tel_direktur`, `pekerja_nama_perusahaan`, `pekerja_alamat_perusahaan`, `pekerja_tel_kantor`) VALUES
('1', 0, 'teraa', '0', '', '0', '0', '0', '0', '0'),
('2', 0, 'Hendra', '0', '', '0', '0', '0', '0', '0'),
('2222', 0, 'ADSA', '232', '', 'asdsad', '23232', 'asd', 'asd', '232'),
('3', 0, 'asdsad', '0', '', '0', '0', '0', '0', '0'),
('4', 0, 'Deden', '0', '', '0', '0', '0', '0', '0'),
('5151152', 0, 'asd', '2312', '', 'asda', '21312', 'asdasd', 'adasd', '51512');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` int(11) NOT NULL,
  `proyek_kategori_id` int(11) NOT NULL,
  `proyek_user_nik` int(11) DEFAULT NULL,
  `proyek_koordinat_id` int(11) NOT NULL,
  `proyek_nama` varchar(50) NOT NULL,
  `proyek_tahun` year(4) NOT NULL,
  `proyek_keuangan` int(11) NOT NULL,
  `proyek_pagu` int(11) NOT NULL,
  `proyek_kontrak` date NOT NULL,
  `proyek_sech_awal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `proyek_kategori_id`, `proyek_user_nik`, `proyek_koordinat_id`, `proyek_nama`, `proyek_tahun`, `proyek_keuangan`, `proyek_pagu`, `proyek_kontrak`, `proyek_sech_awal`) VALUES
(2, 1, 145, 10, 'Proyek 8', 2004, 20000, 10000, '2020-06-27', '2019-06-27'),
(3, 6, 123, 6, 'Proyek 7', 1995, 30000, 50000, '2018-04-02', '2018-04-22'),
(4, 1, 145, 7, 'Proyek 6', 1995, 30000, 50000, '2018-04-02', '2018-04-22'),
(5, 1, 145, 5, 'Proyek 5', 2004, 20000, 10000, '2020-06-27', '2019-06-27'),
(6, 1, 145, 1, 'Proyek 4', 2004, 20000, 10000, '2020-06-27', '2019-06-27'),
(7, 1, 145, 2, 'Proyek 3', 1995, 30000, 50000, '2018-04-02', '2018-04-22'),
(8, 6, 123, 3, 'Proyek 2', 1995, 30000, 50000, '2018-04-02', '2018-04-22'),
(9, 1, 145, 4, 'Proyek 1', 2004, 20000, 10000, '2020-06-27', '2019-06-27'),
(10, 6, 6060, 11, 'Proyek Lanjutan', 2019, 5000, 35000, '2019-05-28', '2020-05-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_nik` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_telp` char(12) NOT NULL,
  `user_bagian` enum('ppk','kasubid','kabid') NOT NULL,
  `user_level` enum('admin','petugas','user') NOT NULL,
  `user_photo` varchar(50) NOT NULL DEFAULT 'user_blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_nik`, `user_nama`, `user_username`, `user_password`, `user_email`, `user_telp`, `user_bagian`, `user_level`, `user_photo`) VALUES
(1, 'Administrator', 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', '082371373347', '', 'admin', 'user_blank.png'),
(123, 'aaaa', '', '', 'aa@aaa.com', '2323', 'ppk', 'admin', 'user_blank.png'),
(145, 'aaaa', '', '', 'aa@aaa.com', '12312', 'kasubid', 'admin', 'user_blank.png'),
(6060, 'Deni', '', '', 'dee@aa.com', '0220', 'ppk', 'admin', 'user_blank.png'),
(313521, 'Deeda', 'deya', '', 'ada@aa.com', '2323', 'ppk', 'user', 'user_blank.png'),
(51212451, 'asdas', '', '', '231@asda.com', '1312', 'ppk', 'admin', 'user_blank.png');

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
  ADD PRIMARY KEY (`pekerja_nip`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`),
  ADD KEY `proyek_kategori_id` (`proyek_kategori_id`),
  ADD KEY `proyek_koordinat_id` (`proyek_koordinat_id`),
  ADD KEY `proyek_user_nik` (`proyek_user_nik`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `koordinat`
--
ALTER TABLE `koordinat`
  MODIFY `koordinat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`proyek_kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`proyek_koordinat_id`) REFERENCES `koordinat` (`koordinat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyek_ibfk_4` FOREIGN KEY (`proyek_user_nik`) REFERENCES `user` (`user_nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
