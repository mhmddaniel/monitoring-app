-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2018 at 07:31 AM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u164602079_ppp`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `file_data` text NOT NULL,
  `file_jenis` enum('file','foto') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_name`, `project_id`) VALUES
(1, 'IMG_20180601_112250.jpg', 17),
(2, 'IMG_20180601_140317.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `koordinat`
--

CREATE TABLE `koordinat` (
  `koordinat_id` int(11) NOT NULL,
  `koordinat_nama` varchar(100) DEFAULT NULL,
  `koordinat_lat` varchar(50) DEFAULT NULL,
  `koordinat_lng` varchar(50) DEFAULT NULL,
  `koordinat_alamat` text NOT NULL,
  `koordinat_value` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koordinat`
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
(21, 'Muara DUO', '-1.6141443', '102.9572261', 'Jalan Lintas Bukit Kemuning, Mersam, Kabupaten Batang Hari, Jambi 36654, Indonesia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
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
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`pekerja_nip`, `proyek_id`, `pekerja_nama`, `pekerja_tel`, `pekerja_jenis`, `pekerja_nama_direktur`, `pekerja_tel_direktur`, `pekerja_nama_perusahaan`, `pekerja_alamat_perusahaan`, `pekerja_tel_kantor`) VALUES
('1231232131', 17, 'Terast', '08888', 'kontraktor', 'Renta', '23123', 'asdasd', 'jl.aaa', '08123'),
('323323', 17, 'Eras', '123', 'konsultan', 'Teras', '123', 'Perusahaan X', 'jl.aaa', '32023');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` int(11) NOT NULL,
  `proyek_user_nik` int(11) DEFAULT NULL,
  `proyek_koordinat_id` int(11) NOT NULL,
  `proyek_nama` varchar(50) NOT NULL,
  `proyek_tahun` year(4) NOT NULL,
  `proyek_keuangan` int(11) NOT NULL,
  `proyek_pagu` int(11) NOT NULL,
  `proyek_sech_awal` date NOT NULL,
  `proyek_awal_kontrak` date NOT NULL,
  `proyek_akhir_kontrak` date NOT NULL,
  `proyek_bidang` varchar(50) NOT NULL,
  `proyek_jenis` varchar(50) NOT NULL,
  `proyek_volume` int(11) NOT NULL,
  `proyek_satuan` varchar(15) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `proyek_user_nik`, `proyek_koordinat_id`, `proyek_nama`, `proyek_tahun`, `proyek_keuangan`, `proyek_pagu`, `proyek_sech_awal`, `proyek_awal_kontrak`, `proyek_akhir_kontrak`, `proyek_bidang`, `proyek_jenis`, `proyek_volume`, `proyek_satuan`, `last_update`) VALUES
(17, 90313813, 18, 'Proyek Jalan Tol', 2013, 250000, 100000, '2019-06-23', '2020-07-23', '2020-07-25', 'ciptakarya', '', 0, '', '2018-05-24 07:31:33'),
(18, 12819, 21, 'Relasi Tol', 2015, 150000, 300000, '2020-06-24', '2020-07-24', '2019-07-24', 'ciptakarya', 'lelang_umum', 0, '', '2018-05-24 07:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_bagian`
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
  `pb_foto` text NOT NULL,
  `pb_last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `pb_stat_proyek` enum('wajar','terlambat','kritis','baik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek_bagian`
--

INSERT INTO `proyek_bagian` (`pb_id`, `pb_proyek_id`, `pb_target`, `pb_real`, `pb_devisi`, `pb_ds_kontrak`, `pb_ds_ap`, `pb_ds_keuangan`, `pb_sisa_anggaran`, `pb_foto`, `pb_last_update`, `pb_stat_proyek`) VALUES
(1, 17, 70, 64, -6, 25000, 32000, 32000, 43000, '3ae8af985a6e9fbbbaa1aa7be4cd1b9a.jpg', '2018-05-29 06:06:53', 'wajar'),
(2, 18, 100, 95, -5, 100, 200, 200, 299700, '', '2018-05-24 07:39:46', 'wajar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_nik` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(35) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_telp` char(12) NOT NULL,
  `user_bagian` enum('ppk','kasubid','kabid','ciptakarya') NOT NULL,
  `user_level` enum('admin','bidang','user') NOT NULL,
  `user_photo` varchar(50) NOT NULL DEFAULT 'user_blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_nik`, `user_nama`, `user_username`, `user_password`, `user_email`, `user_telp`, `user_bagian`, `user_level`, `user_photo`) VALUES
(1, 'Administrator', 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', '082371373347', '', 'admin', 'user_blank.png'),
(892, 'Best', '', '', 'best@aa.com', '0129', 'ppk', 'admin', 'user_blank.png'),
(5023, 'Adent', '', '', 'adent@aa.com', '123', 'ppk', 'admin', 'user_blank.png'),
(12819, 'Restu', '', '', 'restu@aaa.com', '0812', 'ppk', 'admin', 'user_blank.png'),
(112233, 'tera', 'tera', '123', 'tera@aaa.com', '082', 'kasubid', 'user', 'user_blank.png'),
(120201, 'Rendy', '', '', 'rendy@aa.com', '092812', 'ppk', 'admin', 'user_blank.png'),
(313521, 'Deeda', 'deya', '202cb962ac59075b964b07152d234b70', 'ada@aa.com', '2323', 'ppk', 'user', 'user_blank.png'),
(90313813, 'Sera', '', '', 'sera@aaa.com', '0812323', 'ppk', 'admin', 'user_blank.png'),
(123123123, 'Yessi', 'tesbidang', '202cb962ac59075b964b07152d234b70', 'tesbidang@aa.com', '01234', 'ciptakarya', 'bidang', 'edc18a0c3460cf2aa791171a4101d970.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `koordinat`
--
ALTER TABLE `koordinat`
  ADD PRIMARY KEY (`koordinat_id`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`pekerja_nip`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`),
  ADD UNIQUE KEY `proyek_user_nik_2` (`proyek_user_nik`,`proyek_koordinat_id`),
  ADD KEY `proyek_koordinat_id` (`proyek_koordinat_id`),
  ADD KEY `proyek_user_nik` (`proyek_user_nik`);

--
-- Indexes for table `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  ADD PRIMARY KEY (`pb_id`),
  ADD KEY `pb_proyek_id` (`pb_proyek_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `koordinat`
--
ALTER TABLE `koordinat`
  MODIFY `koordinat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD CONSTRAINT `pekerja_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`proyek_koordinat_id`) REFERENCES `koordinat` (`koordinat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyek_ibfk_4` FOREIGN KEY (`proyek_user_nik`) REFERENCES `user` (`user_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  ADD CONSTRAINT `proyek_bagian_ibfk_1` FOREIGN KEY (`pb_proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
