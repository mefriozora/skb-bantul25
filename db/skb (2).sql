-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 06:48 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `rombel_id` int(11) NOT NULL,
  `jadwal_hari` varchar(40) DEFAULT NULL,
  `mapel_id` int(11) NOT NULL,
  `jadwal_jammulai` varchar(10) DEFAULT NULL,
  `jadwal_jamselesai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`jadwal_id`, `rombel_id`, `jadwal_hari`, `mapel_id`, `jadwal_jammulai`, `jadwal_jamselesai`) VALUES
(7, 1, 'Jumat', 3, '07.00', '09.00'),
(8, 1, 'Jumat', 6, '09.00', '11.30'),
(9, 1, 'Senin', 7, '08.00', '10.30'),
(10, 1, 'Senin', 8, '10.30', '12.00'),
(11, 1, '-', 9, '-', '-'),
(12, 1, '-', 10, '-', '-'),
(13, 1, '-', 11, '-', '-'),
(14, 1, '-', 12, '-', '-'),
(15, 1, '-', 13, '-', '-'),
(16, 1, '-', 14, '-', '-'),
(17, 2, 'Selasa', 15, '08.00', '10.30'),
(18, 2, '-', 16, '-', '-'),
(19, 2, '-', 17, '-', '-'),
(20, 2, '-', 18, '-', '-'),
(21, 2, '-', 19, '-', '-'),
(22, 2, '-', 20, '-', '-'),
(23, 2, '-', 21, '-', '-'),
(24, 2, '-', 22, '-', '-'),
(25, 2, '-', 23, '-', '-'),
(26, 2, '-', 24, '-', '-'),
(27, 3, '-', 25, '-', '-'),
(28, 3, 'Selasa', 26, '07.00', '09.00'),
(29, 3, '-', 27, '-', '-'),
(30, 3, '-', 28, '-', '-'),
(31, 3, '-', 29, '-', '-'),
(32, 3, '-', 30, '-', '-'),
(33, 3, '-', 31, '-', '-'),
(34, 3, 'Kamis', 32, '10.30', '13.00'),
(35, 3, '-', 33, '-', '-'),
(36, 3, '-', 34, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(11) NOT NULL,
  `paket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `kelas_nama`, `paket_id`) VALUES
(1, 'Kelas 4', 1),
(2, 'Kelas 5', 1),
(3, 'Kelas 6', 1),
(4, 'Kelas 7', 2),
(5, 'Kelas 8', 2),
(6, 'Kelas 9', 2),
(7, 'Kelas 10', 3),
(8, 'Kelas 11', 3),
(9, 'Kelas 12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_kode` char(10) NOT NULL,
  `mapel_nama` varchar(50) NOT NULL,
  `mapel_kkm` set('70') NOT NULL,
  `paket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`mapel_id`, `mapel_kode`, `mapel_nama`, `mapel_kkm`, `paket_id`) VALUES
(3, 'MP101', 'Seni Budaya', '70', 1),
(6, 'MP102', 'Bahasa Jawa', '70', 1),
(7, 'MP103', 'IPA', '70', 1),
(8, 'MP104', 'IPS', '70', 1),
(9, 'MP105', 'Bahasa Indonesia', '70', 1),
(10, 'MP106', 'Penjaskes', '70', 1),
(11, 'MP107', 'Bahasa Inggris', '70', 1),
(12, 'MP108', 'PAI', '70', 1),
(13, 'MP109', 'PKN', '70', 1),
(14, 'MP1010', 'Matematika', '70', 1),
(15, 'MP201', 'Matematika', '70', 2),
(16, 'MP202', 'Bahasa Indonesia', '70', 2),
(17, 'MP203', 'Bahasa Inggris', '70', 2),
(18, 'MP204', 'IPA', '70', 2),
(19, 'MP205', 'IPS', '70', 2),
(20, 'MP206', 'PKN', '70', 2),
(21, 'MP207', 'PJOK', '70', 2),
(22, 'MP208', 'PAI', '70', 2),
(23, 'MP209', 'Seni Budaya', '70', 2),
(24, 'MP2010', 'Bahasa Jawa', '70', 2),
(25, 'MP301', 'PAI', '70', 3),
(26, 'MP302', 'PKN', '70', 3),
(27, 'MP303', 'Bahasa Indonesia', '70', 3),
(28, 'MP304', 'Bahasa Inggris', '70', 3),
(29, 'MP305', 'Bahasa Jawa', '70', 3),
(30, 'MP306', 'Sejarah', '70', 3),
(31, 'MP307', 'Matematika', '70', 3),
(32, 'MP308', 'Sosiologi', '70', 3),
(33, 'MP309', 'Geografi', '70', 3),
(34, 'MP3010', 'Ekonomi', '70', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `nilai_id` int(11) NOT NULL,
  `nis` char(12) NOT NULL,
  `rombel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai_tugas` varchar(10) NOT NULL,
  `nilai_pts` varchar(10) NOT NULL,
  `nilai_pas` varchar(10) NOT NULL,
  `nilai_pat` varchar(10) NOT NULL,
  `nilai_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `paket_id` int(11) NOT NULL,
  `paket_nama` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`paket_id`, `paket_nama`) VALUES
(1, 'PAKET A'),
(2, 'PAKET B'),
(3, 'PAKET C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pamong_belajar`
--

CREATE TABLE `tb_pamong_belajar` (
  `nik` char(16) NOT NULL,
  `pamong_nama` varchar(50) NOT NULL,
  `pamong_tempat_lhr` varchar(30) NOT NULL,
  `pamong_tanggal_lhr` date NOT NULL,
  `pamong_jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `pamong_agama` varchar(12) NOT NULL,
  `pamong_alamat` varchar(100) NOT NULL,
  `pamong_no_hp` varchar(14) NOT NULL,
  `pamong_jabatan` enum('Pamong Belajar','Tutor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pamong_belajar`
--

INSERT INTO `tb_pamong_belajar` (`nik`, `pamong_nama`, `pamong_tempat_lhr`, `pamong_tanggal_lhr`, `pamong_jenkel`, `pamong_agama`, `pamong_alamat`, `pamong_no_hp`, `pamong_jabatan`) VALUES
('123456', 'Andri', 'Bantul', '1990-02-14', 'Laki-Laki', 'ISLAM', 'bantul', '08562971772', 'Tutor'),
('55678832', 'kiki', 'madiun', '1992-01-31', 'Perempuan', 'ISLAM', 'jombor', '089679322309', 'Pamong Belajar'),
('7891011', 'Yanto', 'Sleman', '1998-02-11', 'Laki-Laki', 'KRISTEN', 'Jalan Imogiri', '085732324921', 'Pamong Belajar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftar`
--

CREATE TABLE `tb_pendaftar` (
  `no_pendaftar` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nisn` varchar(12) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `agama` varchar(12) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `paket_kesetaraan` enum('A','B','C','') NOT NULL,
  `kelas_kesetaraan` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `pekerjaan_wali` varchar(20) NOT NULL,
  `alamat_wali` varchar(100) NOT NULL,
  `no_hp_ortuwali` varchar(14) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status_pendaftar` varchar(15) NOT NULL,
  `akte` varchar(40) NOT NULL,
  `kk` varchar(40) NOT NULL,
  `ijazah_raport` varchar(40) NOT NULL,
  `sk_pindah_sekolah` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`no_pendaftar`, `nama`, `nisn`, `tempat_lhr`, `tanggal_lhr`, `agama`, `jenkel`, `alamat`, `no_hp`, `paket_kesetaraan`, `kelas_kesetaraan`, `tgl_pendaftaran`, `asal_sekolah`, `alamat_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `no_hp_ortuwali`, `foto`, `status_pendaftar`, `akte`, `kk`, `ijazah_raport`, `sk_pindah_sekolah`) VALUES
('A202001270001', 'juju', '3163111085', 'Bantul', '2000-10-10', 'ISLAM', 'Perempuan', 'Jalan Parangtritis KM 4,5', '085732324921', 'A', 'Kelas 6', '2020-01-27', 'SDN 1 panjangan bantul', 'Jalan Pajangan Bantul', 'Paijo', 'Painem', 'Buruh', 'IRT', 'Jalan Pajangan Bantul', '-', '-', '-', '08562971772', 'default.jpg', 'Belum Diterima', 'akta.pdf', 'kk.pdf', 'rapot.pdf', 'sk.pdf'),
('B202001270001', 'mefri', '3163111096', 'Bantul', '2005-05-07', 'ISLAM', 'Laki-Laki', 'Jalan Srandakan Bantul', '08562971772', 'B', 'Kelas 9', '2020-01-27', 'SMPN 1 panjangan bantul', 'Jalan Pajangan Bantul', 'Damar Prasetyo', 'Yuli', 'Dosen', 'Dosen', 'Jalan Srandakan Bantul', '-', '-', '-', '08562971772', 'default.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('C202001270001', 'lala', '3163111048', 'Sleman', '2020-01-10', 'KRISTEN', 'Perempuan', 'Jombor Sleman', '089679322309', 'C', 'Kelas 12', '2020-01-27', 'SMAN 1 sleman', 'Jalan Magelang KM 7', 'Widodo', 'Ning', 'swasta', 'IRT', 'Jombor Sleman', '-', '-', '-', '08562971772', 'default.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_username` varchar(30) NOT NULL,
  `pengguna_password` char(32) NOT NULL,
  `pengguna_level` enum('Admin','Pamong','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_level`) VALUES
(2, 'juju', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Siswa'),
(3, 'Yanto', '7891011', 'a108ee5445b04d7abe10a8daff9e9ba3', 'Pamong'),
(8, 'kiki', '55678832', '0ecc919bae7167a2657b2ee029bbd98e', 'Pamong'),
(9, 'mefri', '3163111096', '0dcf1a8be38efa8d1093c08b5f22845b', 'Siswa'),
(11, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(12, 'lala', '032001120001', '68845fcf6d4123bdfb8cbbf72b82e42d', 'Siswa'),
(13, 'mefri', '02200190001', 'd878454076a0fef13915dca002887027', 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `rombel_id` int(11) NOT NULL,
  `ta_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nik` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rombel`
--

INSERT INTO `tb_rombel` (`rombel_id`, `ta_id`, `kelas_id`, `nik`) VALUES
(1, 5, 1, '123456'),
(2, 5, 6, '7891011'),
(3, 5, 9, '55678832');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel_siswa`
--

CREATE TABLE `tb_rombel_siswa` (
  `romsiswa_id` int(11) NOT NULL,
  `rombel_id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rombel_siswa`
--

INSERT INTO `tb_rombel_siswa` (`romsiswa_id`, `rombel_id`, `nis`) VALUES
(2, 3, '032001120001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `semester_id` int(11) NOT NULL,
  `semester` varchar(7) NOT NULL,
  `semester_status` varchar(12) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`semester_id`, `semester`, `semester_status`) VALUES
(1, 'Ganjil', 'Aktif'),
(2, 'Genap', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` char(12) NOT NULL,
  `no_pendaftar` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `siswa_status` enum('Aktif','Tidak Aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `no_pendaftar`, `nama_siswa`, `siswa_status`) VALUES
('02200190001', 'B202001270001', 'mefri', 'Aktif'),
('032001120001', 'C202001270001', 'lala', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `ta_id` int(11) NOT NULL,
  `ta_nama` varchar(12) NOT NULL,
  `ta_status` varchar(12) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahunajaran`
--

INSERT INTO `tb_tahunajaran` (`ta_id`, `ta_nama`, `ta_status`) VALUES
(1, '2016/2017', 'Tidak Aktif'),
(2, '2017/2018', 'Tidak Aktif'),
(3, '2018/2019', 'Tidak Aktif'),
(4, '2019/2020', 'Tidak Aktif'),
(5, '2020/2021', 'Aktif'),
(6, '2021/2022', 'Tidak Aktif'),
(8, '2022/2023', 'Tidak Aktif'),
(9, '2023/2024', 'Tidak Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `kode_ta` (`rombel_id`),
  ADD KEY `kode_mapel` (`mapel_id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`mapel_id`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `no_induk` (`nis`),
  ADD KEY `kode_ta` (`kelas_id`),
  ADD KEY `id_detail_mapel` (`mapel_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `rombel_id` (`rombel_id`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`paket_id`);

--
-- Indexes for table `tb_pamong_belajar`
--
ALTER TABLE `tb_pamong_belajar`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pendaftar`
--
ALTER TABLE `tb_pendaftar`
  ADD PRIMARY KEY (`no_pendaftar`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  ADD PRIMARY KEY (`rombel_id`),
  ADD KEY `ta_id` (`ta_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `nis` (`nik`);

--
-- Indexes for table `tb_rombel_siswa`
--
ALTER TABLE `tb_rombel_siswa`
  ADD PRIMARY KEY (`romsiswa_id`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `no_pendaftar` (`no_pendaftar`);

--
-- Indexes for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  ADD PRIMARY KEY (`ta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `rombel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_rombel_siswa`
--
ALTER TABLE `tb_rombel_siswa`
  MODIFY `romsiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`rombel_id`) REFERENCES `tb_rombel` (`rombel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD CONSTRAINT `tb_mapel_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`paket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`no_pendaftar`) REFERENCES `tb_pendaftar` (`no_pendaftar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
