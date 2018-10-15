-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Sep 2018 pada 09.05
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
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `anggaran_id` int(11) NOT NULL,
  `ph_id` int(11) NOT NULL,
  `anggaran_nama` varchar(50) NOT NULL,
  `anggaran_tahun` year(4) NOT NULL,
  `anggaran_pagu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`anggaran_id`, `ph_id`, `anggaran_nama`, `anggaran_tahun`, `anggaran_pagu`) VALUES
(15, 13, 'Anggaran BM1', 2018, 120000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `catatan_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `catatan_isi` text NOT NULL,
  `catatan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_awal`
--

CREATE TABLE `data_awal` (
  `da_id` int(11) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `da_progres` int(11) NOT NULL,
  `da_tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_awal`
--

INSERT INTO `data_awal` (`da_id`, `proyek_id`, `da_progres`, `da_tanggal`) VALUES
(15, 1, 9, '2018-09-18'),
(16, 2, 7, '2018-09-24'),
(17, 2, 1, '2018-09-09'),
(18, 2, 10, '2018-09-26'),
(19, 2, 5, '2018-09-09'),
(20, 2, 10, '2018-09-27'),
(21, 2, 20, '2018-09-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `file_id` int(11) NOT NULL,
  `file_nama` varchar(50) NOT NULL,
  `proyek_id` int(11) NOT NULL,
  `file_data` text NOT NULL,
  `file_jenis` enum('file','foto') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_anggaran`
--

CREATE TABLE `file_anggaran` (
  `file_id` int(11) NOT NULL,
  `file_nama` varchar(50) NOT NULL,
  `anggaran_id` int(11) NOT NULL,
  `file_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Alpokat', '-1.6180472', '103.8332193', 'Sipin Tlk. Duren, Kumpeh Ulu, Kabupaten Muaro Jambi, Jambi, Indonesia', 0),
(2, 'Jambee', '-1.6166059', '103.3317851', 'Unnamed Road, Kubu Kandang, Pemayung, Kabupaten Batang Hari, Jambi 36657, Indonesia', 0),
(3, 'Jambee', '-1.68394', '103.1913383', 'Malapari, Muara Bulian, Kabupaten Batang Hari, Jambi, Indonesia', 0);

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
(28, 1, 'Heri', 'heri@aaa.com', '0823333', 'bm', 'user_blank.png'),
(30, 2, 'Yanto', 'heri@aaa.com', '', 'bm', 'user_blank.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `proyek_id` int(11) NOT NULL,
  `ph_id` int(11) NOT NULL,
  `proyek_koordinat_id` int(11) NOT NULL,
  `proyek_nama` varchar(50) NOT NULL,
  `proyek_tahun` year(4) NOT NULL,
  `proyek_keuangan` bigint(20) DEFAULT NULL,
  `proyek_pagu` bigint(20) NOT NULL,
  `proyek_sech_awal` date DEFAULT NULL,
  `proyek_awal_kontrak` date DEFAULT NULL,
  `proyek_akhir_kontrak` date DEFAULT NULL,
  `proyek_bidang` enum('sda','bm','ciptakarya','pr','sekretariat','ttdp','ubp','ubpdp','bkdp') DEFAULT NULL,
  `proyek_jenis` enum('leum','lena','letas','selmum','pmlangsung','pnlangsung','pglangsung','epurchas','sayembara','kontes','lelce','selsed') NOT NULL,
  `proyek_volume` int(11) NOT NULL,
  `proyek_satuan` varchar(15) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`proyek_id`, `ph_id`, `proyek_koordinat_id`, `proyek_nama`, `proyek_tahun`, `proyek_keuangan`, `proyek_pagu`, `proyek_sech_awal`, `proyek_awal_kontrak`, `proyek_akhir_kontrak`, `proyek_bidang`, `proyek_jenis`, `proyek_volume`, `proyek_satuan`, `last_update`) VALUES
(1, 13, 1, 'Proyek Anti Air', 2018, 2147483647, 25000000, '2018-09-21', '2018-09-21', '2018-09-29', NULL, 'leum', 50, 'CM', '2018-09-20 21:14:07'),
(2, 13, 3, 'Proyek Anti Hujan', 2018, 25000000, 5000000, '2018-09-21', '2018-09-21', '2018-09-30', NULL, 'pmlangsung', 50, 'M', '2018-09-23 06:51:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_bagian`
--

CREATE TABLE `proyek_bagian` (
  `pb_id` int(11) NOT NULL,
  `pb_proyek_id` int(11) NOT NULL,
  `pb_target` float DEFAULT NULL,
  `pb_real` float DEFAULT NULL,
  `pb_devisi` float DEFAULT NULL,
  `pb_ds_kontrak` bigint(20) DEFAULT NULL,
  `pb_ds_ap` bigint(20) DEFAULT NULL,
  `pb_sisa_anggaran` bigint(20) DEFAULT NULL,
  `pb_jenis` enum('fisik','keuangan') NOT NULL,
  `pb_tanggal_prog` date DEFAULT NULL,
  `pb_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pb_stat_proyek` enum('wajar','terlambat','kritis','baik','belummulai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek_bagian`
--

INSERT INTO `proyek_bagian` (`pb_id`, `pb_proyek_id`, `pb_target`, `pb_real`, `pb_devisi`, `pb_ds_kontrak`, `pb_ds_ap`, `pb_sisa_anggaran`, `pb_jenis`, `pb_tanggal_prog`, `pb_last_update`, `pb_stat_proyek`) VALUES
(100, 1, 0, 0, 0, NULL, NULL, NULL, 'fisik', '2018-09-16', '2018-09-20 21:01:52', 'belummulai'),
(102, 2, 0, 0, 0, NULL, NULL, NULL, 'fisik', '2018-09-19', '2018-09-20 21:02:57', 'belummulai'),
(105, 1, 10, 20, 10, NULL, NULL, NULL, 'fisik', '2018-09-22', '2018-09-22 02:31:30', 'baik'),
(107, 1, NULL, NULL, NULL, 2000000, 2145483647, 23000000, 'keuangan', '2018-09-22', '2018-09-22 02:33:59', NULL),
(108, 1, NULL, NULL, NULL, 5000000, 2142483647, 20000000, 'keuangan', '2018-09-23', '2018-09-22 17:59:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_head`
--

CREATE TABLE `proyek_head` (
  `ph_id` int(11) NOT NULL,
  `ph_judul` varchar(50) NOT NULL,
  `ph_anggaran` int(11) NOT NULL,
  `ph_bidang` enum('sda','bm','ciptakarya','pr','sekretariat','ttdp','ubp','ubpdp','bkdp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek_head`
--

INSERT INTO `proyek_head` (`ph_id`, `ph_judul`, `ph_anggaran`, `ph_bidang`) VALUES
(13, 'Kegiatan Bina Marga', 120000000, 'bm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `serapan`
--

CREATE TABLE `serapan` (
  `serapan_id` int(11) NOT NULL,
  `serapan_target` bigint(20) NOT NULL,
  `serapan_persen` float NOT NULL,
  `serapan_bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `serapan`
--

INSERT INTO `serapan` (`serapan_id`, `serapan_target`, `serapan_persen`, `serapan_bulan`) VALUES
(2, 18929913660, 2.28163, 'Januari'),
(3, 72449499348, 8.73236, 'Februari'),
(4, 152578399587, 18.3903, 'Maret'),
(5, 237547414096, 28.6317, 'April'),
(6, 306312647557, 36.92, 'Mei'),
(7, 399633263228, 48.1679, 'Juni'),
(8, 482936755003, 58.2085, 'Juli'),
(9, 563609163351, 67.932, 'Agustus'),
(10, 682486699806, 82.2603, 'September'),
(11, 728430506961, 87.7979, 'Oktober'),
(12, 790114594460, 95.2327, 'November'),
(13, 829666977900, 100, 'Desember');

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
  `user_level` enum('admin','bidang','ppjk') NOT NULL,
  `user_photo` varchar(50) NOT NULL DEFAULT 'user_blank.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_email`, `user_telp`, `user_bagian`, `user_level`, `user_photo`) VALUES
(1, 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', '082371373347', 'sekretariat', 'admin', 'user_blank.png'),
(123123125, 'binamarga', '202cb962ac59075b964b07152d234b70', 'bm@gmail.com', '07112313212', 'bm', 'bidang', 'user_blank.png'),
(123123126, 'ciptakarya', '202cb962ac59075b964b07152d234b70', 'ck@gmail.com', '07113121231', 'ciptakarya', 'admin', 'user_blank.png'),
(123123134, 'heri', '202cb962ac59075b964b07152d234b70', 'heri@aaa.com', '0823333', 'bm', 'ppjk', 'user_blank.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`anggaran_id`),
  ADD KEY `ph_id` (`ph_id`);

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`catatan_id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indeks untuk tabel `data_awal`
--
ALTER TABLE `data_awal`
  ADD PRIMARY KEY (`da_id`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indeks untuk tabel `file_anggaran`
--
ALTER TABLE `file_anggaran`
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
  ADD PRIMARY KEY (`pn_id`),
  ADD KEY `proyek_id` (`proyek_id`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`proyek_id`),
  ADD KEY `proyek_koordinat_id` (`proyek_koordinat_id`),
  ADD KEY `ph_id` (`ph_id`);

--
-- Indeks untuk tabel `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  ADD PRIMARY KEY (`pb_id`),
  ADD KEY `pb_proyek_id` (`pb_proyek_id`);

--
-- Indeks untuk tabel `proyek_head`
--
ALTER TABLE `proyek_head`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indeks untuk tabel `serapan`
--
ALTER TABLE `serapan`
  ADD PRIMARY KEY (`serapan_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `anggaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `catatan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_awal`
--
ALTER TABLE `data_awal`
  MODIFY `da_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `file`
--
ALTER TABLE `file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_anggaran`
--
ALTER TABLE `file_anggaran`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `koordinat`
--
ALTER TABLE `koordinat`
  MODIFY `koordinat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  MODIFY `pekerja_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  MODIFY `pn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `proyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  MODIFY `pb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `proyek_head`
--
ALTER TABLE `proyek_head`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `serapan`
--
ALTER TABLE `serapan`
  MODIFY `serapan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123123135;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `anggaran_ibfk_1` FOREIGN KEY (`ph_id`) REFERENCES `proyek_head` (`ph_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pekerja`
--
ALTER TABLE `pekerja`
  ADD CONSTRAINT `pekerja_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penanggung_jawab`
--
ALTER TABLE `penanggung_jawab`
  ADD CONSTRAINT `penanggung_jawab_ibfk_1` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_2` FOREIGN KEY (`proyek_koordinat_id`) REFERENCES `koordinat` (`koordinat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proyek_ibfk_3` FOREIGN KEY (`ph_id`) REFERENCES `proyek_head` (`ph_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek_bagian`
--
ALTER TABLE `proyek_bagian`
  ADD CONSTRAINT `proyek_bagian_ibfk_1` FOREIGN KEY (`pb_proyek_id`) REFERENCES `proyek` (`proyek_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
