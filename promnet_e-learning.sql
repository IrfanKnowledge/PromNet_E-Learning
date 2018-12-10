-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 11:32 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promnet_e-learning`
--
CREATE DATABASE IF NOT EXISTS `promnet_e-learning` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `promnet_e-learning`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varbinary(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `admin`:
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'azizah', 'azizahnurulk', 0x6a2d382e490b1d72b99b4b4a5c95c481),
(2, 'Irfan Muhammad Faisal', 'irfan', 0xd45c16d9971751715bc2d52eefd3c1b4),
(5, 'irfan_bot', 'irfan_bot', 0x9de86d815eca1ac04475b0d418c494a2);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran` (
  `id` tinyint(1) NOT NULL,
  `kd_Mapel` char(10) NOT NULL,
  `Nama_Mapel` varchar(100) NOT NULL,
  `Jam_Pembelajaran` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `mata_pelajaran`:
--

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `kd_Mapel`, `Nama_Mapel`, `Jam_Pembelajaran`) VALUES
(1, 'MPK01', 'Pemrograman Web', 2),
(2, 'MPK02', 'Pemrograman Dasar', 3),
(3, 'MPU01', 'Bahasa Indonesia', 2),
(4, 'MPU02', 'Bahasa Inggris', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `nilai_akhir`;
CREATE TABLE `nilai_akhir` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `id_Mapel` char(10) NOT NULL,
  `Nilai_Tugas` tinyint(1) UNSIGNED DEFAULT '0',
  `Nilai_Pengayaan` tinyint(1) UNSIGNED DEFAULT '0',
  `Nilai_Ketuntasan` tinyint(1) UNSIGNED DEFAULT '0',
  `NilaiAkhir` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `nilai_akhir`:
--   `id_Mapel`
--       `mata_pelajaran` -> `kd_Mapel`
--   `NIS`
--       `siswa` -> `NIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `sesi_pembelajaran`
--
-- Creation: Dec 09, 2018 at 07:36 AM
--

DROP TABLE IF EXISTS `sesi_pembelajaran`;
CREATE TABLE `sesi_pembelajaran` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `id_mapel` char(10) NOT NULL,
  `Sesi_Ke` tinyint(1) UNSIGNED NOT NULL,
  `Topik` varchar(50) NOT NULL,
  `Uraian` varchar(255) NOT NULL,
  `Konten1` varchar(60) NOT NULL,
  `Konten2` varchar(60) DEFAULT NULL,
  `Konten3` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sesi_pembelajaran`:
--   `id_mapel`
--       `mata_pelajaran` -> `kd_Mapel`
--

--
-- Dumping data for table `sesi_pembelajaran`
--

INSERT INTO `sesi_pembelajaran` (`id`, `id_mapel`, `Sesi_Ke`, `Topik`, `Uraian`, `Konten1`, `Konten2`, `Konten3`) VALUES
(1, 'MPK01', 1, 'Profesi dalam Pengembangan Aplikasi Web', '\"Mengenalkan Profesi dalam bidang IT dan dalam\r\nPengembangan Aplikasi Web', 'Topik_1_Pemrograman_Web.pptx', NULL, NULL),
(2, 'MPK01', 2, 'Alur dan Perangkat Pengembangan Aplikasi Web', '\"Mengenalkan Alur Pengembangan Aplikasi Web dan\r\nMenyajikan Perangkat Pengembangan Aplikasi Web', 'Topik_2_Pemrograman_Web.pptx', NULL, NULL),
(3, 'MPK01', 3, 'Menyajikan Format Teks dalam Dokumen Web', '\"Mengenalkan Dasar-dasa HTML, Properti Dokumen Web,\r\ndan Cara Menyajikan Teks dalam Format tertentu pada \r\nHalaman Dokumen', 'Topik_3_Pemrograman_Web.pptx', NULL, NULL),
(4, 'MPK01', 4, 'Menyajikan Pemformatan Teks dan Paragraf Web', '\"Mengenalkan Pemformatan Teks, Pemformatan Paragraf Web,\r\ndan Cara Menyajikan Pemformatan Paragraf pada Halaman Web\"\r\n', 'Topik_4_Pemrograman_Web.pptx', NULL, NULL),
(5, 'MPK01', 5, 'Menyajikan Hasil Pembuatan List Minimal', '\"Mengenalkan Pembuatan List Minimal dan Cara Menyajikan\r\nPembuatan List Minimal\"\r\n', 'Topik_5_Pemrograman_Web.pptx', NULL, NULL),
(6, 'MPK01', 6, 'Menyajikan Pembuatan List Kombinasi', '\"Mengenalkan Pembuatan List Kombinasi, dan Cara Menyajikan\r\nPembuatan List\"\r\n', 'Topik_6_Pemrograman_Web.pptx', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `Nama` varchar(40) NOT NULL,
  `Password` varbinary(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `siswa`:
--

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `NIS`, `Nama`, `Password`) VALUES
(1, '20191111', 'Irfan Muhamad Faisal', 0xd45c16d9971751715bc2d52eefd3c1b4),
(2, '20191112', 'Azizah Nurul Khoirunnisa', 0xd45c16d9971751715bc2d52eefd3c1b4),
(3, '20191113', 'Difa Bagasputra', 0x7af8419642e7de2227e7b7241b8334bd);

-- --------------------------------------------------------

--
-- Table structure for table `tes_ketuntasan`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_ketuntasan`;
CREATE TABLE `tes_ketuntasan` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `id_Sesi` tinyint(1) UNSIGNED NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Durasi` tinyint(1) UNSIGNED NOT NULL,
  `Uraian` varchar(1000) NOT NULL,
  `Waktu_Mulai_tes` datetime NOT NULL,
  `Waktu_Berakhir_tes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_ketuntasan`:
--   `id_Sesi`
--       `sesi_pembelajaran` -> `id`
--

--
-- Dumping data for table `tes_ketuntasan`
--

INSERT INTO `tes_ketuntasan` (`id`, `id_Sesi`, `Judul`, `Durasi`, `Uraian`, `Waktu_Mulai_tes`, `Waktu_Berakhir_tes`) VALUES
(1, 1, '\"Profesi dalam  Pengembangan Aplikasi Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-13 00:00:00', '2018-11-17 00:00:00'),
(2, 2, '\"Alur dan Perangkat Pengembangan  Aplikasi Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-13 00:00:00', '2018-11-17 00:00:00'),
(3, 3, '\"Menyajikan Format Teks  dalam Dokumen Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"', '2018-11-13 00:00:00', '2018-11-17 00:00:00'),
(4, 4, '\"Menyajikan Pemformatan  Teks dan Paragraf Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"', '2018-11-13 00:00:00', '2018-11-17 00:00:00'),
(5, 5, '\"Menyajikan Hasil Pembuatan  List Minimal\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-13 00:00:00', '2018-11-17 00:00:00'),
(6, 6, '\"Menyajikan Pembuatan  List Kombinasi\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-13 00:00:00', '2018-11-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tes_ketuntasan_jawaban`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_ketuntasan_jawaban`;
CREATE TABLE `tes_ketuntasan_jawaban` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `id_Soal` tinyint(1) UNSIGNED NOT NULL,
  `Jawaban` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_ketuntasan_jawaban`:
--   `id_Soal`
--       `tes_ketuntasan_soal` -> `id`
--   `NIS`
--       `siswa` -> `NIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tes_ketuntasan_nilai`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_ketuntasan_nilai`;
CREATE TABLE `tes_ketuntasan_nilai` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `id_Tes` tinyint(1) UNSIGNED NOT NULL,
  `Nilai_Tes` tinyint(1) UNSIGNED DEFAULT NULL,
  `Status` enum('complete','not complete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_ketuntasan_nilai`:
--   `id_Tes`
--       `tes_ketuntasan` -> `id`
--   `NIS`
--       `siswa` -> `NIS`
--

--
-- Dumping data for table `tes_ketuntasan_nilai`
--

INSERT INTO `tes_ketuntasan_nilai` (`id`, `NIS`, `id_Tes`, `Nilai_Tes`, `Status`) VALUES
(1, '20191111', 1, 100, 'complete'),
(2, '20191112', 1, 100, 'complete'),
(3, '20191113', 1, 0, 'not complete');

-- --------------------------------------------------------

--
-- Table structure for table `tes_ketuntasan_soal`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_ketuntasan_soal`;
CREATE TABLE `tes_ketuntasan_soal` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `id_Tes` tinyint(1) UNSIGNED NOT NULL,
  `No_Soal` tinyint(1) UNSIGNED NOT NULL,
  `Pertanyaan` varchar(500) NOT NULL,
  `pilihan1` varchar(500) NOT NULL,
  `pilihan2` varchar(500) NOT NULL,
  `pilihan3` varchar(500) DEFAULT NULL,
  `pilihan4` varchar(500) DEFAULT NULL,
  `Kunci_Jawaban` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_ketuntasan_soal`:
--   `id_Tes`
--       `tes_ketuntasan` -> `id`
--

--
-- Dumping data for table `tes_ketuntasan_soal`
--

INSERT INTO `tes_ketuntasan_soal` (`id`, `id_Tes`, `No_Soal`, `Pertanyaan`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `Kunci_Jawaban`) VALUES
(1, 1, 1, 'Web Programmer adalah orang yang bertugas melakukan pencodingan sebuah website agar dinamis', 'Benar', 'Salah', NULL, NULL, 'Benar'),
(2, 1, 2, '\"Web Developer merupakan salah satu profesi dalam\r\n pengembangan aplikasi berbasis web\"\r\n', 'Benar', 'Salah', NULL, NULL, 'Salah\r\n'),
(3, 1, 3, 'Web Administrator adalah orang yang bertanggung jawab dalam menentukan tampilan sebuah website \r\n', 'Benar', 'Salah', NULL, NULL, 'Salah'),
(4, 1, 4, 'Pekerjaan di bidang IT dikelompokkan sesuai bidangnya, yang pertama mereka yang bergelut di dunia perangka lunak, yang kedua mereka yang bergelut di perangkat keras dan yang ketiga mereka yang berkecimpung dalam operasional system informasi\r\n', 'Benar', 'Salah', NULL, NULL, 'Benar'),
(5, 1, 5, '\"Yang bisa dikatakan sebagai sebuah profesi yaitu jika \r\nseseorang sudah ahli di dalam bidang pekerjaan tersebut. \"\r\n', 'Benar', 'Salah', NULL, NULL, 'Benar');

-- --------------------------------------------------------

--
-- Table structure for table `tes_ketuntasan_waktu`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_ketuntasan_waktu`;
CREATE TABLE `tes_ketuntasan_waktu` (
  `id` tinyint(1) NOT NULL,
  `NIS` char(10) DEFAULT NULL,
  `id_Tes` tinyint(1) DEFAULT NULL,
  `Waktu_Mulai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_ketuntasan_waktu`:
--

-- --------------------------------------------------------

--
-- Table structure for table `tes_ketuntasan_waktu_siswa`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_ketuntasan_waktu_siswa`;
CREATE TABLE `tes_ketuntasan_waktu_siswa` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `id_Tes` tinyint(1) UNSIGNED NOT NULL,
  `Waktu_Mulai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_ketuntasan_waktu_siswa`:
--   `id_Tes`
--       `tes_ketuntasan` -> `id`
--

-- --------------------------------------------------------

--
-- Table structure for table `tes_pengayaan`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_pengayaan`;
CREATE TABLE `tes_pengayaan` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `id_Sesi` tinyint(1) UNSIGNED NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Durasi` smallint(1) UNSIGNED NOT NULL,
  `Uraian` varchar(1000) NOT NULL,
  `Waktu_Mulai_tes` datetime NOT NULL,
  `Waktu_Berakhir_tes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_pengayaan`:
--   `id_Sesi`
--       `sesi_pembelajaran` -> `id`
--

--
-- Dumping data for table `tes_pengayaan`
--

INSERT INTO `tes_pengayaan` (`id`, `id_Sesi`, `Judul`, `Durasi`, `Uraian`, `Waktu_Mulai_tes`, `Waktu_Berakhir_tes`) VALUES
(1, 1, '\"Profesi dalam Pengembangan Aplikasi Web\"', 30, '\"Pilihlah jawaban Benar atau Salah pada Soal dalam Tes Pengayaan ini\"', '2018-11-29 14:00:00', '2018-11-30 23:00:00'),
(3, 2, '\"Alur dan Perangkat Pengembangan  Aplikasi Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-28 16:00:00', '2018-11-28 21:00:00'),
(4, 3, '\"Menyajikan Format Teks  dalam Dokumen Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"', '2018-11-29 05:00:00', '2018-11-30 18:00:00'),
(5, 4, '\"Menyajikan Pemformatan  Teks dan Paragraf Web\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"', '2018-11-29 06:00:00', '2018-11-30 22:00:00'),
(6, 5, '\"Menyajikan Hasil Pembuatan  List Minimal\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-29 03:00:00', '2018-11-30 23:00:00'),
(7, 6, '\"Menyajikan Pembuatan  List Kombinasi\"', 30, '\"Pilihlah jawaban Benar atau Salah \r\npada Soal dalam Tes Pengayaan Ini\"\r\n', '2018-11-28 17:00:00', '2018-11-30 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tes_pengayaan_jawaban`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_pengayaan_jawaban`;
CREATE TABLE `tes_pengayaan_jawaban` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `id_Soal` tinyint(1) UNSIGNED NOT NULL,
  `Jawaban` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_pengayaan_jawaban`:
--   `id_Soal`
--       `tes_pengayaan_soal` -> `id`
--   `NIS`
--       `siswa` -> `NIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tes_pengayaan_nilai`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_pengayaan_nilai`;
CREATE TABLE `tes_pengayaan_nilai` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `NIS` char(10) NOT NULL,
  `id_Tes` tinyint(1) UNSIGNED NOT NULL,
  `Nilai_Pengayaan` tinyint(1) UNSIGNED NOT NULL,
  `Status` enum('complete','not complete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_pengayaan_nilai`:
--   `id_Tes`
--       `tes_pengayaan` -> `id`
--   `NIS`
--       `siswa` -> `NIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tes_pengayaan_soal`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_pengayaan_soal`;
CREATE TABLE `tes_pengayaan_soal` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `id_Tes` tinyint(1) UNSIGNED NOT NULL,
  `No_Soal` tinyint(1) UNSIGNED NOT NULL,
  `Pertanyaan` varchar(500) COLLATE latin1_bin NOT NULL,
  `pilihan1` varchar(500) COLLATE latin1_bin NOT NULL,
  `pilihan2` varchar(500) COLLATE latin1_bin NOT NULL,
  `pilihan3` varchar(500) COLLATE latin1_bin NOT NULL,
  `pilihan4` varchar(500) COLLATE latin1_bin NOT NULL,
  `Kunci_Jawaban` varchar(1000) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- RELATIONSHIPS FOR TABLE `tes_pengayaan_soal`:
--   `id_Tes`
--       `tes_pengayaan` -> `id`
--

--
-- Dumping data for table `tes_pengayaan_soal`
--

INSERT INTO `tes_pengayaan_soal` (`id`, `id_Tes`, `No_Soal`, `Pertanyaan`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `Kunci_Jawaban`) VALUES
(1, 1, 1, 'Web Programmer adalah orang yang bertugas melakukan pencodingan sebuah website agar dinamis', 'Benar', 'Salah', '', '', 'Benar'),
(2, 1, 2, 'Web Developer merupakan salah satu profesi dalam\r\n pengembangan aplikasi berbasis web', 'Benar', 'Salah', '', '', 'Salah'),
(3, 1, 3, 'Web Administrator adalah orang yang bertanggung jawab dalam menentukan tampilan sebuah website \r\n', 'Benar', 'Salah', '', '', 'Benar'),
(4, 1, 4, 'Pekerjaan di bidang IT dikelompokkan sesuai bidangnya, yang pertama mereka yang bergelut di dunia perangka lunak, yang kedua mereka yang bergelut di perangkat keras dan yang ketiga mereka yang berkecimpung dalam operasional system informasi\r\n', 'Benar', 'Salah', '', '', 'Benar'),
(5, 1, 5, '\"Yang bisa dikatakan sebagai sebuah profesi yaitu jika \r\nseseorang sudah ahli di dalam bidang pekerjaan tersebut. \"\r\n', 'Benar', 'Salah', '', '', 'Salah');

-- --------------------------------------------------------

--
-- Table structure for table `tes_pengayaan_waktu`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_pengayaan_waktu`;
CREATE TABLE `tes_pengayaan_waktu` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `nis` char(10) NOT NULL,
  `id_tes` tinyint(1) NOT NULL,
  `waktu_mulai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_pengayaan_waktu`:
--

-- --------------------------------------------------------

--
-- Table structure for table `tes_pengayaan_waktu_siswa`
--
-- Creation: Nov 28, 2018 at 02:31 PM
--

DROP TABLE IF EXISTS `tes_pengayaan_waktu_siswa`;
CREATE TABLE `tes_pengayaan_waktu_siswa` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `nis` char(10) NOT NULL,
  `id_tes` tinyint(1) UNSIGNED NOT NULL,
  `waktu_mulai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tes_pengayaan_waktu_siswa`:
--   `id_tes`
--       `tes_pengayaan` -> `id`
--   `nis`
--       `siswa` -> `NIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tugas_sesi_jawaban`
--
-- Creation: Dec 08, 2018 at 04:50 PM
--

DROP TABLE IF EXISTS `tugas_sesi_jawaban`;
CREATE TABLE `tugas_sesi_jawaban` (
  `id` smallint(1) UNSIGNED NOT NULL,
  `nis` char(10) NOT NULL,
  `id_soal` tinyint(1) UNSIGNED NOT NULL,
  `berkas_jawaban` varchar(60) NOT NULL,
  `komentar_siswa` varchar(10000) DEFAULT NULL,
  `komentar_guru` varchar(10000) DEFAULT NULL,
  `waktu_pengumpulan` datetime NOT NULL,
  `status_pengumpulan` enum('Terlambat','Tepat Waktu') DEFAULT NULL,
  `nilai_tugas` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tugas_sesi_jawaban`:
--   `id_soal`
--       `tugas_sesi_soal` -> `id`
--   `nis`
--       `siswa` -> `NIS`
--

--
-- Dumping data for table `tugas_sesi_jawaban`
--

INSERT INTO `tugas_sesi_jawaban` (`id`, `nis`, `id_soal`, `berkas_jawaban`, `komentar_siswa`, `komentar_guru`, `waktu_pengumpulan`, `status_pengumpulan`, `nilai_tugas`) VALUES
(17, '20191111', 1, 'TGS_1_MPK01_20191111.ppt', 'Integritas Data PPT Percobaan 1', NULL, '2018-12-10 15:17:24', 'Terlambat', NULL),
(18, '20191111', 2, 'TGS_2_MPK01_20191111.ppt', 'stored procedure ppt percobaan 2', NULL, '2018-12-10 16:35:51', 'Tepat Waktu', NULL),
(19, '20191111', 4, 'TGS_4_MPK01_20191111.txt', 'tugas simbada txt percobaan 4', NULL, '2018-12-10 15:28:03', 'Terlambat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_sesi_soal`
--
-- Creation: Dec 10, 2018 at 07:36 AM
--

DROP TABLE IF EXISTS `tugas_sesi_soal`;
CREATE TABLE `tugas_sesi_soal` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `id_sesi` tinyint(1) UNSIGNED NOT NULL,
  `soal` varchar(1000) NOT NULL,
  `file_soal` varchar(60) DEFAULT NULL,
  `waktu_mulai_tugas` datetime NOT NULL,
  `waktu_deadline_tugas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `tugas_sesi_soal`:
--   `id_sesi`
--       `sesi_pembelajaran` -> `id`
--

--
-- Dumping data for table `tugas_sesi_soal`
--

INSERT INTO `tugas_sesi_soal` (`id`, `id_sesi`, `soal`, `file_soal`, `waktu_mulai_tugas`, `waktu_deadline_tugas`) VALUES
(1, 1, 'Kerjakan Soal dalam file berikut, kerjakan dalam bentuk Word', 'TGS_1_Pemrograman_Web.pdf', '2018-12-01 00:00:00', '2018-12-02 00:00:00'),
(2, 2, 'Kerjakan Soal dalam file berikut, kerjakan dalam bentuk Word', 'TGS_2_Pemrograman_Web.pdf', '2018-12-09 00:00:00', '2019-01-31 00:00:00'),
(3, 3, 'Kerjakan Soal dalam file berikut, kerjakan dalam bentuk Word', 'TGS_3_Pemrograman_Web.pdf', '2019-02-01 00:00:00', '2019-02-28 00:00:00'),
(4, 4, 'Kerjakan Soal dalam file berikut, kerjakan dalam bentuk Word', 'TGS_4_Pemrograman_Web.pdf', '2018-12-01 00:00:00', '2018-12-10 15:34:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_Mapel` (`kd_Mapel`) USING BTREE;

--
-- Indexes for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_akhir_nis` (`NIS`),
  ADD KEY `fk_nilai_akhir_id_mapel` (`id_Mapel`);

--
-- Indexes for table `sesi_pembelajaran`
--
ALTER TABLE `sesi_pembelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sesi_pembelajaran_id_mapel` (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIS` (`NIS`) USING BTREE;

--
-- Indexes for table `tes_ketuntasan`
--
ALTER TABLE `tes_ketuntasan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_tes_ketuntasan_id_sesi` (`id_Sesi`) USING BTREE;

--
-- Indexes for table `tes_ketuntasan_jawaban`
--
ALTER TABLE `tes_ketuntasan_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_ketuntasan_jawaban_nis` (`NIS`),
  ADD KEY `fk_tes_ketuntasan_jawaban_id_soal` (`id_Soal`);

--
-- Indexes for table `tes_ketuntasan_nilai`
--
ALTER TABLE `tes_ketuntasan_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_ketuntasan_nilai_nis` (`NIS`),
  ADD KEY `fk_tes_ketuntasan_nilai_id_tes` (`id_Tes`);

--
-- Indexes for table `tes_ketuntasan_soal`
--
ALTER TABLE `tes_ketuntasan_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_ketuntasan_soal_id_sesi` (`id_Tes`) USING BTREE;

--
-- Indexes for table `tes_ketuntasan_waktu`
--
ALTER TABLE `tes_ketuntasan_waktu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ketuntasan_waktu_nis` (`NIS`),
  ADD KEY `fk_ketuntasan_waktu_idtes` (`id_Tes`);

--
-- Indexes for table `tes_ketuntasan_waktu_siswa`
--
ALTER TABLE `tes_ketuntasan_waktu_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_ketuntasan_waktu_siswa_id_sesi` (`id_Tes`);

--
-- Indexes for table `tes_pengayaan`
--
ALTER TABLE `tes_pengayaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_tes_pengayaan_id_sesi` (`id_Sesi`) USING BTREE;

--
-- Indexes for table `tes_pengayaan_jawaban`
--
ALTER TABLE `tes_pengayaan_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_pengayaan_jawaban_id_soal` (`id_Soal`),
  ADD KEY `fk_tes_pengayaan_jawaban_nis` (`NIS`);

--
-- Indexes for table `tes_pengayaan_nilai`
--
ALTER TABLE `tes_pengayaan_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_pengayaan_nilai_nis` (`NIS`),
  ADD KEY `fk_tes_pengayaan_nilai_id_tes` (`id_Tes`);

--
-- Indexes for table `tes_pengayaan_soal`
--
ALTER TABLE `tes_pengayaan_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_pengayaan_soal_id_tes` (`id_Tes`);

--
-- Indexes for table `tes_pengayaan_waktu`
--
ALTER TABLE `tes_pengayaan_waktu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengayaan_waktu_nis` (`nis`),
  ADD KEY `fk_pengayaan_waktu_idtes` (`id_tes`);

--
-- Indexes for table `tes_pengayaan_waktu_siswa`
--
ALTER TABLE `tes_pengayaan_waktu_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tes_pengayaan_waktu_siswa_id_tes` (`id_tes`),
  ADD KEY `fk_tes_pengayaan_waktu_siswa_nis` (`nis`);

--
-- Indexes for table `tugas_sesi_jawaban`
--
ALTER TABLE `tugas_sesi_jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tugas_sesi_jawaban_id_soal` (`id_soal`),
  ADD KEY `fk_tugas_sesi_jawaban_nis` (`nis`);

--
-- Indexes for table `tugas_sesi_soal`
--
ALTER TABLE `tugas_sesi_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tugas_sesi_soal_id_sesi` (`id_sesi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sesi_pembelajaran`
--
ALTER TABLE `sesi_pembelajaran`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tes_ketuntasan`
--
ALTER TABLE `tes_ketuntasan`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tes_ketuntasan_jawaban`
--
ALTER TABLE `tes_ketuntasan_jawaban`
  MODIFY `id` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tes_ketuntasan_nilai`
--
ALTER TABLE `tes_ketuntasan_nilai`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tes_ketuntasan_soal`
--
ALTER TABLE `tes_ketuntasan_soal`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tes_ketuntasan_waktu_siswa`
--
ALTER TABLE `tes_ketuntasan_waktu_siswa`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tes_pengayaan`
--
ALTER TABLE `tes_pengayaan`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tes_pengayaan_jawaban`
--
ALTER TABLE `tes_pengayaan_jawaban`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tes_pengayaan_nilai`
--
ALTER TABLE `tes_pengayaan_nilai`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tes_pengayaan_soal`
--
ALTER TABLE `tes_pengayaan_soal`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tes_pengayaan_waktu_siswa`
--
ALTER TABLE `tes_pengayaan_waktu_siswa`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas_sesi_jawaban`
--
ALTER TABLE `tugas_sesi_jawaban`
  MODIFY `id` smallint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tugas_sesi_soal`
--
ALTER TABLE `tugas_sesi_soal`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_akhir`
--
ALTER TABLE `nilai_akhir`
  ADD CONSTRAINT `fk_nilai_akhir_id_mapel` FOREIGN KEY (`id_Mapel`) REFERENCES `mata_pelajaran` (`kd_Mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nilai_akhir_nis` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sesi_pembelajaran`
--
ALTER TABLE `sesi_pembelajaran`
  ADD CONSTRAINT `fk_sesi_pembelajaran_id_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`kd_Mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_ketuntasan`
--
ALTER TABLE `tes_ketuntasan`
  ADD CONSTRAINT `fk_tes_ketuntasan_id_sesi` FOREIGN KEY (`id_Sesi`) REFERENCES `sesi_pembelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_ketuntasan_jawaban`
--
ALTER TABLE `tes_ketuntasan_jawaban`
  ADD CONSTRAINT `fk_tes_ketuntasan_jawaban_id_soal` FOREIGN KEY (`id_Soal`) REFERENCES `tes_ketuntasan_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tes_ketuntasan_jawaban_nis` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_ketuntasan_nilai`
--
ALTER TABLE `tes_ketuntasan_nilai`
  ADD CONSTRAINT `fk_tes_ketuntasan_nilai_id_tes` FOREIGN KEY (`id_Tes`) REFERENCES `tes_ketuntasan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tes_ketuntasan_nilai_nis` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_ketuntasan_soal`
--
ALTER TABLE `tes_ketuntasan_soal`
  ADD CONSTRAINT `fk_tes_ketuntasan_soal_id_sesi	` FOREIGN KEY (`id_Tes`) REFERENCES `tes_ketuntasan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_ketuntasan_waktu_siswa`
--
ALTER TABLE `tes_ketuntasan_waktu_siswa`
  ADD CONSTRAINT `fk_tes_ketuntasan_waktu_siswa_id_sesi` FOREIGN KEY (`id_Tes`) REFERENCES `tes_ketuntasan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_pengayaan`
--
ALTER TABLE `tes_pengayaan`
  ADD CONSTRAINT `fk_tes_pengayaan_id_sesi` FOREIGN KEY (`id_Sesi`) REFERENCES `sesi_pembelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_pengayaan_jawaban`
--
ALTER TABLE `tes_pengayaan_jawaban`
  ADD CONSTRAINT `fk_tes_pengayaan_jawaban_id_soal` FOREIGN KEY (`id_Soal`) REFERENCES `tes_pengayaan_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tes_pengayaan_jawaban_nis` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_pengayaan_nilai`
--
ALTER TABLE `tes_pengayaan_nilai`
  ADD CONSTRAINT `fk_tes_pengayaan_nilai_id_tes` FOREIGN KEY (`id_Tes`) REFERENCES `tes_pengayaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tes_pengayaan_nilai_nis` FOREIGN KEY (`NIS`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_pengayaan_soal`
--
ALTER TABLE `tes_pengayaan_soal`
  ADD CONSTRAINT `fk_tes_pengayaan_soal_id_tes` FOREIGN KEY (`id_Tes`) REFERENCES `tes_pengayaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tes_pengayaan_waktu_siswa`
--
ALTER TABLE `tes_pengayaan_waktu_siswa`
  ADD CONSTRAINT `fk_tes_pengayaan_waktu_siswa_id_tes` FOREIGN KEY (`id_tes`) REFERENCES `tes_pengayaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tes_pengayaan_waktu_siswa_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_sesi_jawaban`
--
ALTER TABLE `tugas_sesi_jawaban`
  ADD CONSTRAINT `fk_tugas_sesi_jawaban_id_soal` FOREIGN KEY (`id_soal`) REFERENCES `tugas_sesi_soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tugas_sesi_jawaban_nis` FOREIGN KEY (`nis`) REFERENCES `siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_sesi_soal`
--
ALTER TABLE `tugas_sesi_soal`
  ADD CONSTRAINT `fk_tugas_sesi_soal_id_sesi` FOREIGN KEY (`id_sesi`) REFERENCES `sesi_pembelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
