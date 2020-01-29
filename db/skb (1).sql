-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jan 2020 pada 16.08
-- Versi Server: 10.1.26-MariaDB
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
-- Struktur dari tabel `tb_jadwal`
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
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`jadwal_id`, `rombel_id`, `jadwal_hari`, `mapel_id`, `jadwal_jammulai`, `jadwal_jamselesai`) VALUES
(7, 1, 'Jumat', 3, '07.00', '09.00'),
(8, 1, 'Jumat', 6, '09.00', '11.30'),
(9, 1, 'Senin', 7, '08.00', '10.30'),
(10, 1, 'Senin', 8, '10.30', '12.00'),
(11, 1, 'Rabu', 9, '08.00', '09.30'),
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
(26, 2, '-', 24, '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(11) NOT NULL,
  `paket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
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
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_kode` char(10) NOT NULL,
  `mapel_nama` varchar(50) NOT NULL,
  `mapel_kkm` set('70') NOT NULL,
  `paket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`mapel_id`, `mapel_kode`, `mapel_nama`, `mapel_kkm`, `paket_id`) VALUES
(3, 'MP1001', 'Seni Budaya', '70', 1),
(6, 'MP1002', 'Bahasa Jawa', '70', 1),
(7, 'MP1003', 'IPA', '70', 1),
(8, 'MP1004', 'IPS', '70', 1),
(9, 'MP1005', 'Bahasa Indonesia', '70', 1),
(10, 'MP1006', 'Penjasorkes', '70', 1),
(11, 'MP1007', 'Bahasa Inggris', '70', 1),
(12, 'MP1008', 'PAI', '70', 1),
(13, 'MP1009', 'PKN', '70', 1),
(14, 'MP1010', 'Matematika', '70', 1),
(15, 'MP2001', 'Matematika', '70', 2),
(16, 'MP2002', 'Bahasa Indonesia', '70', 2),
(17, 'MP2003', 'Bahasa Inggris', '70', 2),
(18, 'MP2004', 'IPA', '70', 2),
(19, 'MP2005', 'IPS', '70', 2),
(20, 'MP2006', 'PKN', '70', 2),
(21, 'MP2007', 'PJOK', '70', 2),
(22, 'MP2008', 'PAI', '70', 2),
(23, 'MP2009', 'Seni Budaya', '70', 2),
(24, 'MP2010', 'Bahasa Jawa', '70', 2),
(25, 'MP3001', 'PAI', '70', 3),
(26, 'MP3002', 'PKN', '70', 3),
(27, 'MP3003', 'Bahasa Indonesia', '70', 3),
(28, 'MP3004', 'Bahasa Inggris', '70', 3),
(29, 'MP3005', 'Bahasa Jawa', '70', 3),
(30, 'MP3006', 'Sejarah', '70', 3),
(31, 'MP3007', 'Matematika', '70', 3),
(32, 'MP3008', 'Sosiologi', '70', 3),
(33, 'MP3009', 'Geografi', '70', 3),
(34, 'MP3010', 'Ekonomi', '70', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
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
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `paket_id` int(11) NOT NULL,
  `paket_nama` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`paket_id`, `paket_nama`) VALUES
(1, 'PAKET A'),
(2, 'PAKET B'),
(3, 'PAKET C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pamong_belajar`
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
-- Dumping data untuk tabel `tb_pamong_belajar`
--

INSERT INTO `tb_pamong_belajar` (`nik`, `pamong_nama`, `pamong_tempat_lhr`, `pamong_tanggal_lhr`, `pamong_jenkel`, `pamong_agama`, `pamong_alamat`, `pamong_no_hp`, `pamong_jabatan`) VALUES
('3402060102990001', 'Suwardi', 'Bantul', '1980-01-01', 'Laki-Laki', 'ISLAM', 'Ringinharjo  Bantul', '085679871109', 'Pamong Belajar'),
('3402060109870001', 'Kasmakto', 'Bantul', '1973-07-11', 'Laki-Laki', 'ISLAM', 'Sewon Bantul', '089611094209', 'Pamong Belajar'),
('3402060302690001', 'Hestri Tias Utami', 'Bantul', '1987-07-10', 'Perempuan', 'ISLAM', 'Umbulharjo Yorgyakarta', '089611094200', 'Tutor'),
('3402060302990001', 'Bulan Balkis', 'Surabaya', '1985-06-19', 'Perempuan', 'ISLAM', 'Sewon Bantul', '085629807712', 'Pamong Belajar'),
('3402060607990001', 'Dewi Usmawati', 'Bantul', '1982-10-13', 'Perempuan', 'ISLAM', 'Imogiri Bantul', '089611094208', 'Pamong Belajar'),
('3402060667890001', 'Erny Isnainy', 'Bantul', '1988-09-29', 'Perempuan', 'ISLAM', 'Sewon Bantul', '089775987278', 'Tutor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendaftar`
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
-- Dumping data untuk tabel `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`no_pendaftar`, `nama`, `nisn`, `tempat_lhr`, `tanggal_lhr`, `agama`, `jenkel`, `alamat`, `no_hp`, `paket_kesetaraan`, `kelas_kesetaraan`, `tgl_pendaftaran`, `asal_sekolah`, `alamat_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `nama_wali`, `pekerjaan_wali`, `alamat_wali`, `no_hp_ortuwali`, `foto`, `status_pendaftar`, `akte`, `kk`, `ijazah_raport`, `sk_pindah_sekolah`) VALUES
('A202001270001', 'Juwita', '3163111085', 'Bantul', '2000-10-10', 'ISLAM', 'Perempuan', 'Jalan Parangtritis KM 4,5', '085732324921', 'A', 'Kelas 6', '2020-01-27', 'SDN 1 panjangan bantul', 'Jalan Pajangan Bantul', 'Paijo', 'Painem', 'Buruh', 'IRT', 'Jalan Pajangan Bantul', '-', '-', '-', '08562971772', 'default.jpg', 'Belum Diterima', 'akta.pdf', 'kk.pdf', 'rapot.pdf', 'sk.pdf'),
('B202001270001', 'Triana Rosida', '3163111096', 'Bantul', '2005-05-07', 'ISLAM', 'Perempuan', 'Jalan Srandakan Bantul', '08562971772', 'B', 'Kelas 9', '2020-01-27', 'SMPN 1 panjangan bantul', 'Jalan Pajangan Bantul', 'Damar Prasetyo', 'Yuli', 'Dosen', 'Dosen', 'Jalan Srandakan Bantul', '-', '-', '-', '08562971772', 'default.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('B202001280002', 'Arumti Bunga Lestari', '2134567891', 'Sleman', '2020-01-08', 'ISLAM', 'Laki-Laki', 'Pandak Bantul', '085629807712', 'B', 'Kelas 8', '2020-01-28', 'SD 1 Pajangan', 'Pajangan Bantul', 'Wriman', 'Siti', 'PNS', 'PNS', 'Pandak Bantul', '-', '-', '-', '089765123456', 'default.jpg', 'Diterima', 'kk.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('C202001270001', 'Lala Kuswara', '3163111048', 'Sleman', '2020-01-10', 'KRISTEN', 'Perempuan', 'Jombor Sleman', '089679322309', 'C', 'Kelas 12', '2020-01-27', 'SMAN 1 sleman', 'Jalan Magelang KM 7', 'Widodo', 'Ning', 'swasta', 'IRT', 'Jombor Sleman', '-', '-', '-', '08562971772', 'default.jpg', 'Diterima', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_username` varchar(30) NOT NULL,
  `pengguna_password` char(32) NOT NULL,
  `pengguna_level` enum('Admin','Pamong','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_username`, `pengguna_password`, `pengguna_level`) VALUES
(2, 'juju', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Siswa'),
(3, 'Yanto', '7891011', 'a108ee5445b04d7abe10a8daff9e9ba3', 'Pamong'),
(8, 'kiki', '55678832', '0ecc919bae7167a2657b2ee029bbd98e', 'Pamong'),
(9, 'mefri', '3163111096', '0dcf1a8be38efa8d1093c08b5f22845b', 'Siswa'),
(11, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(12, 'lala', '032001120001', '68845fcf6d4123bdfb8cbbf72b82e42d', 'Siswa'),
(13, 'mefri', '02200190001', 'd878454076a0fef13915dca002887027', 'Siswa'),
(14, 'Mefri Andriyanto', '022001120001', '88f0c84ee9f89b514f5ea261f9cda332', 'Siswa'),
(15, 'Suwardi', '3402060102990001', '05f52baeaded2245277ec9ca1daed0de', 'Pamong'),
(16, 'Bulan Balkis', '3402060302990001', '61d5614e938035fe5d920b810b332410', 'Pamong'),
(17, 'Dewi Usmawati', '3402060607990001', '29af09e3ecf907fbc68b350f031a1414', 'Pamong'),
(18, 'Kasmakto', '3402060109870001', '383c015121f23ee52839310bbf8b2172', 'Pamong'),
(19, 'Hestri Tias Utami', '3402060302690001', '887cbc64fec8dc60b884069cbb8fea05', 'Pamong'),
(20, 'Erny Isnainy', '3402060667890001', '77e2e59cb32479953e86f9b2543e0290', 'Pamong'),
(21, 'Triana Rosida', '022001270001', '6f3a2fd653a50f2602d0924db7d694b8', 'Siswa'),
(22, 'Arumti Bunga Lestari', '022001280002', '51cfde9e9754fa380cf37cd51d014d6a', 'Siswa'),
(23, 'Lala Kuswara', '032001270001', 'd502dfaf78a05f934fcc426d663d77d7', 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rombel`
--

CREATE TABLE `tb_rombel` (
  `rombel_id` int(11) NOT NULL,
  `ta_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nik` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rombel`
--

INSERT INTO `tb_rombel` (`rombel_id`, `ta_id`, `kelas_id`, `nik`) VALUES
(1, 5, 1, '3402060302990001'),
(2, 5, 2, '3402060302990001'),
(3, 5, 4, '3402060109870001'),
(4, 5, 5, '3402060109870001'),
(6, 5, 7, '3402060102990001'),
(7, 5, 8, '3402060102990001'),
(8, 5, 9, '3402060102990001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rombel_siswa`
--

CREATE TABLE `tb_rombel_siswa` (
  `romsiswa_id` int(11) NOT NULL,
  `rombel_id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `semester_id` int(11) NOT NULL,
  `semester` varchar(7) NOT NULL,
  `semester_status` varchar(12) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`semester_id`, `semester`, `semester_status`) VALUES
(1, 'Ganjil', 'Aktif'),
(2, 'Genap', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` char(12) NOT NULL,
  `no_pendaftar` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `siswa_status` enum('Aktif','Tidak Aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `no_pendaftar`, `nama_siswa`, `siswa_status`) VALUES
('022001270001', 'B202001270001', 'Triana Rosida', 'Aktif'),
('022001280002', 'B202001280002', 'Arumti Bunga Lestari', 'Aktif'),
('032001270001', 'C202001270001', 'Lala Kuswara', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `ta_id` int(11) NOT NULL,
  `ta_nama` varchar(12) NOT NULL,
  `ta_status` varchar(12) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahunajaran`
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
  ADD PRIMARY KEY (`romsiswa_id`),
  ADD KEY `rombel_id` (`rombel_id`),
  ADD KEY `nis` (`nis`);

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
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `rombel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`rombel_id`) REFERENCES `tb_rombel` (`rombel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`paket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD CONSTRAINT `tb_mapel_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `tb_paket` (`paket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`rombel_id`) REFERENCES `tb_rombel` (`rombel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_3` FOREIGN KEY (`semester_id`) REFERENCES `tb_semester` (`semester_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_4` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`mapel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rombel`
--
ALTER TABLE `tb_rombel`
  ADD CONSTRAINT `tb_rombel_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rombel_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tb_pamong_belajar` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rombel_ibfk_3` FOREIGN KEY (`ta_id`) REFERENCES `tb_tahunajaran` (`ta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_rombel_siswa`
--
ALTER TABLE `tb_rombel_siswa`
  ADD CONSTRAINT `tb_rombel_siswa_ibfk_1` FOREIGN KEY (`rombel_id`) REFERENCES `tb_rombel` (`rombel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rombel_siswa_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`no_pendaftar`) REFERENCES `tb_pendaftar` (`no_pendaftar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
