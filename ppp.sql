-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2018 pada 11.15
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
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `file_data` text NOT NULL,
  `file_jenis` enum('file','foto') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`file_id`, `proyek_id`, `file_data`, `file_jenis`) VALUES
(1, 20, 'cc29488b7f77ce8ce39f154341c9494b.jpg', 'foto'),
(2, 20, '07e6ecda1b52f1cd658b97b11b7acaf9.pdf', 'file'),
(3, 20, 'bf5e5b4417d30d7b8a84d8f8ec0add0d.rar', 'file'),
(4, 20, '570ca26941ab7220033c99a317e2a0d6.jpg', 'foto'),
(5, 17, 'f557eaa87fefbf8d45143720bb7cc928.jpg', 'foto');

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
(1, 'Majelis Taklim', 'latitude', 'longitude', '', 10),
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
(12, '41asd', '-1.6101229', '103.6131203', 'Jambi, Kota Jambi, Jambi, Indonesia', 0),
(13, 'adas', '-1.469587', '102.35436', 'Unnamed Road 37571, Sungai Alai, Tebo Tengah, Kabupaten Tebo, Jambi 37571, Indonesia', 0),
(14, 'asdasd', '-0.789275', '113.921327', 'Indonesia', 25),
(15, 'asdad', '-1.8331331', '102.3278595', 'Unnamed Road, Dusun Baru, Tabir, Kabupaten Merangin, Jambi 37353, Indonesia', 0),
(16, 'asdasdasd', '-1.7053183', '102.3276569', 'Jl. Ajipurna, Jambi 37353, Indonesia', 0),
(17, 'KARANG', '-1.4985833', '102.1537242', 'Unnamed Road, Tj. Menanti, Bathin II Babeko, Kabupaten Bungo, Jambi 37211, Indonesia', 0),
(18, 'Talang Jambe', '-1.7230961', '102.2664198', 'Jalan Kruing, Mulya Jaya, Pelepat, Kabupaten Bungo, Jambi 37262, Indonesia', 0),
(19, 'Muara Bangau', '-1.6141443', '102.9572261', 'Jalan Lintas Bukit Kemuning, Mersam, Kabupaten Batang Hari, Jambi 36654, Indonesia', 0),
(20, 'Simpang', '-1.2939356', '104.0801269', 'Unnamed Road, Berbak, Kabupaten Tanjung Jabung Timur, Jambi, Indonesia', 0),
(21, 'Muara DUO', '-1.6139542', '102.9568077', 'Jalan Lintas Bukit Kemuning, Mersam, Kabupaten Batang Hari, Jambi 36654, Indonesia', 0),
(22, 'Kandis', '-1.3968064', '103.9786805', 'Jambi-Suak Kandis No.16, Tanjung, Kumpeh, Kabupaten Muaro Jambi, Jambi 36371, Indonesia', 0),
(23, 'Merlung', '-1.2675613', '103.0384046', 'Jl. Lintas Tengah, Merlung, Kabupaten Tanjung Jabung Barat, Jambi, Indonesia', 0),
(24, 'asd', '-1.6101229', '103.6131203', 'Jambi, Kota Jambi, Jambi, Indonesia', 0),
(25, 'Jambi', '-1.6101229', '103.6131203', 'Jambi, Kota Jambi, Jambi, Indonesia', 0),
(26, 'Alpokat', '-1.4347483', '102.3234848', 'Jl. Apokat, Sarimulya, Rimbo Ilir, Kabupaten Tebo, Jambi 37553, Indonesia', 0),
(27, 'Merlung', '-1.264215', '102.999265', 'Unnamed Road, Penyabungan, Merlung, Tj. Jabung B, Jambi 36554, Indonesia', 0),
(28, 'Tebo', '-1.4556422', '102.4034337', 'Unnamed Road, Kabupaten Tebo, Jambi 37573, Indonesia', 0),
(29, 'Kopera', '-1.4173403', '102.3230605', 'Jl. Kopera, Sarimulya, Rimbo Ilir, Kabupaten Tebo, Jambi 37553, Indonesia', 0),
(30, 'Siantar', '-1.4751263', '103.051842', 'Unnamed Road, Kabupaten Batang Hari, Jambi 36552, Indonesia', 0),
(31, 'Muara Jambe', '-1.4177919', '102.8395067', 'Unnamed Road, Tapah Sari, Mersam, Kabupaten Batang Hari, Jambi 36655, Indonesia', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerja`
--

CREATE TABLE `pekerja` (
  `pekerja_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
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

INSERT INTO `pekerja` (`pekerja_id`, `proyek_id`, `pekerja_jenis`, `pekerja_nama_direktur`, `pekerja_tel_direktur`, `pekerja_nama_perusahaan`, `pekerja_alamat_perusahaan`, `pekerja_tel_kantor`) VALUES
(2, 2, 'kontraktor', 'Mahendra wahyu', '08235', 'Ads', 'jl.aaa', '082'),
(3, 6, 'kontraktor', 'Alisa', '0822', 'Asd', 'jl.aaa', '0823141');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanggung_jawab`
--

CREATE TABLE `penanggung_jawab` (
  `pn_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `pn_nama` varchar(25) NOT NULL,
  `pn_email` varchar(50) NOT NULL,
  `pn_tel` char(12) NOT NULL,
  `pn_bagian` enum('sda','bm','ciptakarya','pr','sekretariat','ttdp','ubp','ubpdp','bkdp') NOT NULL,
  `pn_foto` varchar(100) NOT NULL DEFAULT 'user_blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penanggung_jawab`
--

INSERT INTO `penanggung_jawab` (`pn_id`, `proyek_id`, `pn_nama`, `pn_email`, `pn_tel`, `pn_bagian`, `pn_foto`) VALUES
(1, 5, 'Teris', 'teris@aa.com', '082314325', 'ciptakarya', 'user_blank.png'),
(2, 6, 'Heri', 'herianto@aaa.com', '08231352', 'ciptakarya', '974ce975a0ee242bcf9059cb8b9b4110.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` int(11) NOT NULL,
  `proyek_koordinat_id` int(11) NOT NULL,
  `proyek_nama` varchar(50) NOT NULL,
  `proyek_tahun` year(4) NOT NULL,
  `proyek_keuangan` int(11) NOT NULL,
  `proyek_pagu` int(11) NOT NULL,
  `proyek_sech_awal` date NOT NULL,
  `proyek_awal_kontrak` date DEFAULT NULL,
  `proyek_akhir_kontrak` date DEFAULT NULL,
  `proyek_bidang` enum('sda','bm','ciptakarya','pr','sekretariat','ttdp','ubp','ubpdp','bkdp') NOT NULL,
  `proyek_jenis` enum('leum','lena','letas','selmum','pmlangsung','pnlangsung','pglangsung','epurchas','sayembara','kontes','lelce','selsed') NOT NULL,
  `proyek_volume` int(11) NOT NULL,
  `proyek_satuan` varchar(15) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `proyek_koordinat_id`, `proyek_nama`, `proyek_tahun`, `proyek_keuangan`, `proyek_pagu`, `proyek_sech_awal`, `proyek_awal_kontrak`, `proyek_akhir_kontrak`, `proyek_bidang`, `proyek_jenis`, `proyek_volume`, `proyek_satuan`, `last_update`) VALUES
(2, 27, 'Proyek2', 2013, 3692653, 1352634, '2018-06-05', NULL, NULL, 'ciptakarya', 'kontes', 100, 'CM', '2018-06-06 11:56:47'),
(3, 28, 'Proyek 3', 2018, 150000, 100000, '2018-12-24', NULL, NULL, 'ciptakarya', 'selsed', 100, 'M', '2018-06-06 11:45:45'),
(4, 29, 'Proyek4', 2013, 500000, 250000, '2013-02-07', NULL, NULL, 'bm', 'lelce', 300, 'CM', '2018-06-06 14:22:52'),
(5, 30, 'Proyek 10', 1995, 2000000, 2000000, '2018-06-21', NULL, NULL, 'ciptakarya', 'lena', 10, 'M', '2018-06-21 08:32:31'),
(6, 31, 'Proyek Anti Air', 2015, 230000, 250000, '2018-06-19', NULL, NULL, 'sda', '', 50, 'M3', '2018-06-21 08:49:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_bagian`
--

CREATE TABLE `proyek_bagian` (
  `pb_id` int(11) NOT NULL,
  `pb_proyek_id` int(11) NOT NULL,
  `pb_target` float NOT NULL,
  `pb_real` float NOT NULL,
  `pb_devisi` float NOT NULL,
  `pb_ds_kontrak` int(11) NOT NULL,
  `pb_ds_ap` int(11) NOT NULL,
  `pb_ds_keuangan` int(11) NOT NULL,
  `pb_sisa_anggaran` int(11) NOT NULL,
  `pb_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pb_stat_proyek` enum('wajar','terlambat','kritis','baik','belummulai') NOT NULL DEFAULT 'belummulai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek_bagian`
--

INSERT INTO `proyek_bagian` (`pb_id`, `pb_proyek_id`, `pb_target`, `pb_real`, `pb_devisi`, `pb_ds_kontrak`, `pb_ds_ap`, `pb_ds_keuangan`, `pb_sisa_anggaran`, `pb_last_update`, `pb_stat_proyek`) VALUES
(30, 2, 0, 0, 0, 0, 0, 0, 0, '2018-06-06 11:38:09', 'wajar'),
(31, 3, 0, 0, 0, 0, 0, 0, 0, '2018-06-06 11:45:45', 'wajar'),
(32, 4, 0, 0, 0, 0, 0, 0, 0, '2018-06-06 14:22:52', 'belummulai'),
(33, 5, 0, 0, 0, 0, 0, 0, 0, '2018-06-21 08:32:31', 'belummulai'),
(34, 6, 0, 0, 0, 0, 0, 0, 0, '2018-06-21 08:49:47', 'belummulai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_telp` char(12) NOT NULL,
  `user_bagian` enum('sda','bm','ciptakarya','pr','sekretariat','ttdp','ubp','ubpdp','bkdp') NOT NULL,
  `user_level` enum('admin','bidang') NOT NULL,
  `user_photo` varchar(50) NOT NULL DEFAULT 'user_blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_email`, `user_telp`, `user_bagian`, `user_level`, `user_photo`) VALUES
(1, 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', '082371373347', '', 'admin', 'user_blank.png'),
(112233, 'tera', '123', 'tera@aaa.com', '123213', 'bm', 'bidang', 'fb5189025bed2bb4574aa4d5bc79e056.jpg'),
(313521, 'deya', '202cb962ac59075b964b07152d234b70', 'ada@aa.com', '2323', '', '', 'user_blank.png'),
(123123123, 'tesbidang', '202cb962ac59075b964b07152d234b70', 'tesbidang@aa.com', '01234', 'ciptakarya', 'bidang', 'edc18a0c3460cf2aa791171a4101d970.jpg'),
(123123124, 'newuser1', '202cb962ac59075b964b07152d234b70', 'newuser@aaa.com', '08222', '', 'bidang', '1ae312beadd0fb0efd16b50b00a29eb0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indeks untuk tabel `koordinat`
--
ALTER TABLE `koordinat`
  ADD PRIMARY KEY (`koordinat_id`);

--
-- Indeks untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`pekerja_id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indeks untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  ADD PRIMARY KEY (`pn_id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`),
  ADD KEY `proyek_koordinat_id` (`proyek_koordinat_id`);

--
-- Indeks untuk tabel `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  ADD PRIMARY KEY (`pb_id`),
  ADD KEY `pb_proyek_id` (`pb_proyek_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `koordinat`
--
ALTER TABLE `koordinat`
  MODIFY `koordinat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `pekerja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `pn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123123125;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD CONSTRAINT `pekerja_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`proyek_koordinat_id`) REFERENCES `koordinat` (`koordinat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  ADD CONSTRAINT `proyek_bagian_ibfk_1` FOREIGN KEY (`pb_proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
