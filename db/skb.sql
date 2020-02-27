-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27 Feb 2020 pada 06.46
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
  `rombel_id` int(11) DEFAULT NULL,
  `ta_id` int(11) DEFAULT NULL,
  `jadwal_hari` varchar(40) DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `jadwal_jammulai` varchar(10) DEFAULT NULL,
  `jadwal_jamselesai` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ta_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `mapel_id` int(11) NOT NULL,
  `nilai_tugas` varchar(10) DEFAULT NULL,
  `nilai_pts` varchar(10) DEFAULT NULL,
  `nilai_pas_pat` varchar(10) DEFAULT NULL,
  `status` varchar(15) NOT NULL
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
('3402060102990001', 'Suwardi K', 'Bantul', '1980-01-01', 'Laki-Laki', 'ISLAM', 'Ringinharjo  Bantul', '085679871109', 'Pamong Belajar'),
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
  `paket_kesetaraan` enum('A','B','C','') NOT NULL,
  `kelas_kesetaraan` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `agama` varchar(12) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat_domisili` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `asal_sekolah` varchar(30) NOT NULL,
  `putus_sekolah_kelas` varchar(20) NOT NULL,
  `putus_sekolah_semester` varchar(20) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `bertempat_tinggal` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(20) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL,
  `no_hp_ortuwali` varchar(14) NOT NULL,
  `status_pendaftar` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `akte` varchar(40) NOT NULL,
  `kk` varchar(40) NOT NULL,
  `ijazah_raport` varchar(40) NOT NULL,
  `sk_pindah_sekolah` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftar`
--

INSERT INTO `tb_pendaftar` (`no_pendaftar`, `paket_kesetaraan`, `kelas_kesetaraan`, `nama`, `tempat_lhr`, `tanggal_lhr`, `agama`, `jenkel`, `alamat_domisili`, `no_hp`, `tgl_pendaftaran`, `asal_sekolah`, `putus_sekolah_kelas`, `putus_sekolah_semester`, `alamat_sekolah`, `bertempat_tinggal`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat_ortu`, `no_hp_ortuwali`, `status_pendaftar`, `foto`, `akte`, `kk`, `ijazah_raport`, `sk_pindah_sekolah`) VALUES
('A202002050001', 'A', 'Kelas 6', 'Tegar Arif Pratama', 'Bantul', '1995-05-22', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '089611094208', '2020-02-05', 'SD Negeri 3 Imogiri', '2', '2', 'Imogiri Bantul', 'Ortu', 'Wariman', 'Siti', 'Buruh', 'Buruh', 'Imogiri Bantul', '08675342134', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050002', 'A', 'Kelas 6', 'Abdul Muiz', 'Bantul', '1998-04-27', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '085629807712', '2020-02-05', 'SD Muhammadiyah 1 Sewon', '2', '1', 'Sewon Bantul', 'Ortu', 'Tugiman', 'Tugiyah', 'PNS', 'Swasta', 'Sewon Bantul', '089765123456', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050003', 'A', 'Kelas 6', 'Abdullah Hudzafah', 'Bantul', '1998-10-06', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '089611094208', '2020-02-05', 'SD Negeri 4 Bantul', '2', '2', 'Bantul', 'Ortu', 'Kirno', 'Bandia', 'Buruh', 'Swasta', 'Sewon Bantul', '089765123456', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'rapot.pdf', 'sk.pdf'),
('A202002050004', 'A', 'Kelas 6', 'Azizah Qolbun S', 'Sleman', '1996-08-22', 'ISLAM', 'Perempuan', 'Ringinharjo Bantul', '089611094208', '2020-02-05', 'SD Negeri 1 Ringinharjo', '2', '2', 'Ringinharjo Bantul', 'Ortu', 'Seto Handoyo', 'Rina', 'Buruh', 'Swasta', 'Riginharjo Bantul', '089765123459', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050005', 'A', 'Kelas 6', 'Fahmida', 'Bantul', '2002-04-17', 'ISLAM', 'Perempuan', 'Sewon Bantul', '085679871109', '2020-02-05', 'SD Aisyah Sewon', '2', '2', 'Sewon Bantul', 'Ortu', 'Lilik', 'Lusi', 'Buruh', 'Swasta', 'Sewon Bantul', '089765166788', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'rapot.pdf', 'sk.pdf'),
('A202002050006', 'A', 'Kelas 6', 'Ghoizatul Z', 'Bantul', '2005-06-16', 'ISLAM', 'Perempuan', 'Imogiri Bantul', '085679871108', '2020-02-05', 'SD Muhammadiyah 3 Imogiri', '2', '2', 'Imogiri Bantul', 'Ortu', 'Tono', 'Tini', 'Buruh', 'Swasta', 'Imogiri Bantul', '0897651234560', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050007', 'A', 'Kelas 6', 'Haidar Fatih', 'Bantul', '2004-05-03', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '085629807718', '2020-02-05', 'SD Muhammadiyah 1 Sewon', '2', '2', 'Sewon Bantul', 'Ortu', 'Riyanto', 'Lusi', 'PNS', 'Swasta', 'Sewon Bantul', '089765123455', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050008', 'A', 'Kelas 6', 'Isnaini Nur A', 'Bantul', '2003-09-22', 'ISLAM', 'Perempuan', 'Sewon Bantul', '085629807712', '2020-02-05', 'SD Aisyah Sewon', '2', '2', 'Sewon Bantul', 'Ortu', 'Tukiman', 'Tini', 'Buruh', 'Buruh', 'Sewon Bantul', '089765123456', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050009', 'A', 'Kelas 6', 'Syamil Umar A', 'Bantul', '2005-02-24', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '089775987211', '2020-02-05', 'SD Negeri 2 Bantul', '2', '2', 'Bantul', 'Ortu', 'Hartono', 'Tia', 'Buruh', 'Buruh', 'Sewon Bantul', '089765123459', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('A202002050010', 'A', 'Kelas 6', 'Sahila Ilyas', 'Surabaya', '2007-06-12', 'ISLAM', 'Perempuan', 'Melikan Bantul', '089775987211', '2020-02-05', 'SD Muhammadiyah 1 Surabaya', '2', '2', 'Surabaya', 'Ortu', 'Rio', 'Ria', 'PNS', 'PNS', 'Melikan Bantul', '089765123456', 'Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('B202002050001', 'B', 'Kelas 9', 'Ahas Kusdiyanto', 'Bantul', '2002-06-04', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '089611094209', '2020-02-05', 'SD Muhammadiyah 1 Sewon', '5', '2', 'Sewon Bantul', 'Ortu', 'Wartoyo', 'Susi', 'Swasta', 'Swasta', 'Sewon Bantul', '0897651234560', 'Belum Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf'),
('B202002050002', 'B', 'Kelas 9', 'Arwan Febriyanto', 'Bantul', '2011-06-14', 'ISLAM', 'Laki-Laki', 'Sewon Bantul', '089611094209', '2020-02-05', 'SD Muhammadiyah 1 Sewon', '5', '1', 'Sewon Bantul', 'Ortu', 'Rukijo', 'Tuti', 'Buruh', 'Buruh', 'Sewon Bantul', '0897651234560', 'Belum Diterima', 'default.jpg', 'akta.pdf', 'kk.pdf', 'ijazah.pdf', 'sk.pdf');

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
(11, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(15, 'Suwardi', '3402060102990001', '05f52baeaded2245277ec9ca1daed0de', 'Pamong'),
(16, 'Bulan Balkis', '3402060302990001', '61d5614e938035fe5d920b810b332410', 'Pamong'),
(17, 'Dewi Usmawati', '3402060607990001', '29af09e3ecf907fbc68b350f031a1414', 'Pamong'),
(18, 'Kasmakto', '3402060109870001', '383c015121f23ee52839310bbf8b2172', 'Pamong'),
(19, 'Hestri Tias Utami', '3402060302690001', '887cbc64fec8dc60b884069cbb8fea05', 'Pamong'),
(20, 'Erny Isnainy', '3402060667890001', '77e2e59cb32479953e86f9b2543e0290', 'Pamong'),
(24, 'Lala Kuswara', '012002040001', 'c8c00142c1d463511caf03f1c6275b63', 'Siswa'),
(25, 'mefri', '022002040001', 'dcc2a0c1d663b5e04deead06640daad6', 'Siswa'),
(26, 'Arumti Bunga Lestari', '032002040001', 'db6dd483396bb938ba52665aab03ff16', 'Siswa'),
(27, 'Tegar Arif Pratama', '012002060001', '3303cc366ccbeac452b484ba7d5d19f4', 'Siswa'),
(28, 'Abdul Muiz', '012002060002', '44792b017ac48fc306a4290d9140e867', 'Siswa'),
(29, 'Abdullah Hudzafah', '012002060003', 'a47ac1df00081bdfb98195aa7889de5a', 'Siswa'),
(30, 'Azizah Qolbun S', '012002060004', 'c1aac94cffcb760f2c9d85635e89e180', 'Siswa'),
(31, 'Fahmida', '012002060005', 'a0c6711abf1df564e31bd29ea39c1079', 'Siswa'),
(32, 'Ghoizatul Z', '012002060006', 'f2d9746be1b12f0f66ca4c6ad81ed39b', 'Siswa'),
(33, 'Haidar Fatih', '012002060007', 'e454c2cbcb6676af42605b4eaf2c5adf', 'Siswa'),
(34, 'Isnaini Nur A', '012002060008', 'e2a5083f4be76196b7c2d0e0e1f41f68', 'Siswa'),
(35, 'Syamil Umar A', '012002060009', 'a733ed18957250ea6c35ac3915d2d6bb', 'Siswa'),
(36, 'Sahila Ilyas', '012002060010', 'e2887418badb7cd69e9ae43d82ddaccd', 'Siswa');

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
(1, 2, 1, '3402060302990001'),
(2, 2, 2, '3402060302990001'),
(3, 2, 3, '3402060302990001'),
(4, 2, 4, '3402060109870001'),
(5, 2, 5, '3402060109870001'),
(6, 2, 6, '3402060109870001'),
(7, 2, 7, '3402060102990001'),
(8, 2, 8, '3402060102990001'),
(9, 2, 9, '3402060109870001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rombel_siswa`
--

CREATE TABLE `tb_rombel_siswa` (
  `romsiswa_id` int(11) NOT NULL,
  `rombel_id` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rombel_siswa`
--

INSERT INTO `tb_rombel_siswa` (`romsiswa_id`, `rombel_id`, `nis`) VALUES
(1, 2, '012002050005'),
(2, 2, '012002050006'),
(3, 3, '012002060001'),
(4, 3, '012002060002'),
(5, 3, '012002060003'),
(6, 3, '012002060004'),
(7, 3, '012002060007');

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
(1, 'Ganjil', 'Tidak Aktif'),
(2, 'Genap', 'Aktif');

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
('012002050005', 'A202002050005', 'Fahmida', 'Aktif'),
('012002050006', 'A202002050006', 'Ghoizatul Z ', 'Aktif'),
('012002060001', 'A202002050001', 'Tegar Arif Pratama', 'Aktif'),
('012002060002', 'A202002050002', 'Abdul Muiz', 'Aktif'),
('012002060003', 'A202002050003', 'Abdullah Hudzafah', 'Aktif'),
('012002060004', 'A202002050004', 'Azizah Qolbun S', 'Aktif'),
('012002060007', 'A202002050007', 'Haidar Fatih', 'Aktif'),
('012002060008', 'A202002050008', 'Isnaini Nur A', 'Aktif'),
('012002060009', 'A202002050009', 'Syamil Umar A', 'Aktif'),
('012002060010', 'A202002050010', 'Sahila Ilyas', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `ta_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `ta_nama` varchar(12) NOT NULL,
  `ta_status` varchar(12) NOT NULL DEFAULT 'Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tahunajaran`
--

INSERT INTO `tb_tahunajaran` (`ta_id`, `semester_id`, `ta_nama`, `ta_status`) VALUES
(1, 1, '2019/2020', 'Tidak Aktif'),
(2, 2, '2019/2020', 'Aktif'),
(3, 1, '2020/2021', 'Tidak Aktif'),
(4, 2, '2020/2021', 'Tidak Aktif');

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
  ADD KEY `rombel_id` (`rombel_id`),
  ADD KEY `ta_id` (`ta_id`);

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
  ADD PRIMARY KEY (`ta_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_rombel`
--
ALTER TABLE `tb_rombel`
  MODIFY `rombel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_rombel_siswa`
--
ALTER TABLE `tb_rombel_siswa`
  MODIFY `romsiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `tb_nilai_ibfk_4` FOREIGN KEY (`mapel_id`) REFERENCES `tb_mapel` (`mapel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_5` FOREIGN KEY (`ta_id`) REFERENCES `tb_tahunajaran` (`ta_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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

--
-- Ketidakleluasaan untuk tabel `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  ADD CONSTRAINT `tb_tahunajaran_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `tb_semester` (`semester_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
