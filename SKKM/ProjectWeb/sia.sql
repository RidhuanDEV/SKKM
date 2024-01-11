-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2024 pada 14.09
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `role`) VALUES
('admin', 'admin', 'admin'),
('ridwan', 'ridwan', 'admin_pka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datamahasiswa`
--

CREATE TABLE `datamahasiswa` (
  `nrp` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(400) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `angkatan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datamahasiswa`
--

INSERT INTO `datamahasiswa` (`nrp`, `nama`, `password`, `alamat`, `email`, `tgl_lahir`, `foto`, `role`, `angkatan`, `nilai`) VALUES
(1151800001, 'Rizki Aditya', '827ccb0eea8a706c4c34a16891f84e7b', 'Griya Anggrek Permai No. 14', 'aditya01@gmail.com', '2000-05-01', 'gojo.jpg', 'user', 2018, 0),
(1151800003, 'Rizal Pratama', '827ccb0eea8a706c4c34a16891f84e7b', 'Cluster Dahlia Regency 7/14', 'rizal10@gmail.com', '2000-03-10', 'gojo.jpg', 'user', 2018, 0),
(1151900002, 'Firman Utina', '827ccb0eea8a706c4c34a16891f84e7b', 'Green Valley Residence No. 36', 'utina17@gmail.com', '2001-12-17', '', 'user', 2019, 0),
(1151900003, 'Dodi Saputra', '827ccb0eea8a706c4c34a16891f84e7b', 'Jalan Kenari Indah 3, Cluster Melati Hijau', 'saputra22@gmail.com', '2001-10-22', '', 'user', 2019, 0),
(1151900004, 'Ilham Saputra', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl. Dahlia Biru 28, Kelurahan Cinta Damai', 'ilham29@gmail.com', '2001-09-29', '', 'user', 2019, 0),
(1151900005, 'Rini Setiawan', '827ccb0eea8a706c4c34a16891f84e7b', 'Jalan Kenari Indah 3, Cluster Melati Hijau', 'setiawan20@gmail.com', '2001-08-20', '', 'user', 2019, 0),
(1151900111, 'Ando Firmansyah', '827ccb0eea8a706c4c34a16891f84e7b', 'Desa Indah Asri, Jalan Seroja 22', 'firman10@gmail.com', '2001-05-10', '', 'user', 2019, 0),
(1152000001, 'Arisa Malik', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Mawar merah No.09 Kabupaten Tangerang', 'arisa19@gmail.com', '2002-10-19', '', 'user', 2020, 0),
(1152000002, 'Iqbal Ramadan', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Anggrek Biru No.10 Kabupaten Tangerang', 'iqbal09@gmail.com', '2002-05-09', '', 'user', 2020, 0),
(1152000003, 'Arisa chan', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Mawar Merah No.1 Kabupaten Bogor', 'arisachan@gmail.com', '2002-10-19', '', 'user', 2020, 0),
(1152000004, 'Faisal Rahman', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Tulip No.05 Kabupaten Tangerang', 'faisal10@gmail.com', '2002-05-10', '', 'user', 2020, 0),
(1152000005, 'Arisan', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Mawar BIRU No.09 Kabupaten Bogor', 'arisa22@gmail.com', '2002-10-19', '', 'user', 2020, 0),
(1152000006, 'Lutfi Halimawan', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Griya Asri No.10 Tangerang Selatan', 'lutfi19@gmail.com', '2002-07-10', '', 'user', 2020, 0),
(1152100001, 'Skye bonjer', '827ccb0eea8a706c4c34a16891f84e7b', 'Perumahan Puri Harmoni Blok F1/No.07', 'skye12@gmail.com', '2003-08-12', '', 'user', 2021, 0),
(1152100002, 'Rafi Prasetyo', '827ccb0eea8a706c4c34a16891f84e7b', 'Perumahan Puri Harmoni Blok F1/No.10', 'rafipras20@gmail.com', '2003-05-20', '', 'user', 2021, 0),
(1152100003, 'Vicky Hutabarat', '827ccb0eea8a706c4c34a16891f84e7b', 'Perumahan Legok Permai Blok F2/No.12', 'vicky15@gmail.com', '2003-09-15', '', 'user', 2021, 0),
(1152100004, 'Indah Sari', '827ccb0eea8a706c4c34a16891f84e7b', 'Perumahan Legok Permai Blok B3/No.13', 'indah20@gmail.com', '2003-05-20', '', 'user', 2021, 0),
(1152100005, 'Dewi Kartika', '827ccb0eea8a706c4c34a16891f84e7b', 'Perumahan Cendana Asri Blok C3/15', 'kartika19@gmail.com', '2003-07-19', '', 'user', 2021, 0),
(1152100006, 'Arianto Susanto', '827ccb0eea8a706c4c34a16891f84e7b', 'Perumahan Cendana Asri Blok D5/20', 'arianto02@gmail.com', '2003-02-02', '', 'user', 2021, 0),
(1152200001, 'Daffa Nur Fakhri', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Asahan Raya No.23 Kabupaten Tangerang', 'daffanur12@gmail.com', '2004-09-20', '', 'user', 2022, 0),
(1152200002, 'Rafli Tri Rizki', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Hanura No.19 Kabupaten Tangerang', 'raflitri20@gmail.com', '2004-02-01', '', 'user', 2022, 0),
(1152200003, 'Danur', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Pegangsaan Timur No.20 Kabupaten Tangerang', 'danurrr02@gmail.com', '2004-09-02', '', 'user', 2022, 0),
(1152200004, 'Dennisa Alfora', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Brahmana No.01 Kabupaten Tangerang', 'dennisa01@gmail.com', '2004-01-01', '', 'user', 2022, 0),
(1152200005, 'Ridhuan Rangga Kusuma', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Bogor No.10 Kabupaten Tangerang', 'ridhuan10@gmail.com', '2004-02-10', '', 'user', 2022, 0),
(1152200026, 'Asep Condet', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.1 Kota Tangerang Selatan', 'Asep26@gmail.com', '2004-01-01', 'gojo.jpg', 'user', 2022, 80),
(1152200027, 'Nabil Markoho', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.2 Kota Tangerang Selatan', 'Nabil27@gmail.com', '2004-05-02', '', 'user', 2019, 0),
(1152200028, 'Kara Delano', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.3 Kota Tangerang Selatan', 'Kara28@gmail.com', '2004-12-25', '', 'user', 2022, 0),
(1152200029, 'Mike Jono', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.4 Kota Tangerang Selatan', 'Mike29@gmail.com', '2004-04-26', '', 'user', 2022, 0),
(1152200030, 'Yudi Yuamin', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.5 Kota Tangerang Selatan', 'Yudi30@gmail.com', '2004-07-22', '', 'user', 2022, 0),
(1152200031, 'Vega Andora', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.6 Kota Tangerang Selatan', 'Vega31@gmail.com', '2004-01-15', '', 'user', 2019, 0),
(1152200032, 'Yusuf Makmum', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.7 Kota Tangerang Selatan', 'Yusuf32@gmail.com', '2004-03-23', '', 'user', 2022, 0),
(1152200033, 'Denur Khaliza', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.8 Kota Tangerang Selatan', 'Denur33@gmail.com', '2004-01-01', '', 'user', 2022, 0),
(1152200034, 'Juki Mendoza', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.9 Kota Tangerang Selatan', 'Juki34@gmail.com', '2004-12-31', '', 'user', 2022, 0),
(1152200035, 'Jeki Mendoza', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.10 Kota Tangerang Selatan', 'Jeki35@gmail.com', '2004-12-31', '', 'user', 2022, 0),
(1152200036, 'Muhammad Albi', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.11 Kota Tangerang Selatan', 'Albi36@gmail.com', '2004-10-12', '', 'user', 2022, 0),
(1152200037, 'Jono Susanto', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.12 Kota Tangerang Selatan', 'Jono37@gmail.com', '2004-05-13', '', 'user', 2022, 0),
(1152200039, 'Udin Maemunah', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.14 Kota Tangerang Selatan', 'Udin39@gmail.com', '2004-07-23', '', 'user', 2022, 0),
(1152200040, 'Fano Alfiando', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.15 Kota Tangerang Selatan', 'Fano40@gmail.com', '2004-04-17', '', 'user', 2022, 0),
(1152200041, 'Fino Alfiando', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.16 Kota Tangerang Selatan', 'Fino41@gmail.com', '2004-06-01', '', 'user', 2022, 0),
(1152200042, 'Ucup Soekanjan', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.17 Kota Tangerang Selatan', 'Ucup42@gmail.com', '2004-02-02', '', 'user', 2022, 0),
(1152200043, 'Nada Mukidi', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.18 Kota Tangerang Selatan', 'Nada43@gmail.com', '2004-08-09', '', 'user', 2022, 0),
(1152200044, 'Lala Salim', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.19 Kota Tangerang Selatan', 'Lala44@gmail.com', '2004-12-12', '', 'user', 2022, 0),
(1152200045, 'Joscelyn Vicente', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.20 Kota Tangerang Selatan', 'Josc45@gmail.com', '2004-11-11', '', 'user', 2022, 0),
(1152200046, 'Asep G Kennedy', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.21 Kota Tangerang Selatan', 'Asep46@gmail.com', '2004-10-10', '', 'user', 2022, 0),
(1152200047, 'John Salam', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.22 Kota Tangerang Selatan', 'John47@gmail.com', '2004-05-16', '', 'user', 2022, 0),
(1152200048, 'Sumbu Imang', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.23 Kota Tangerang Selatan', 'Sumbu48@gmail.com', '2004-01-14', '', 'user', 2022, 0),
(1152200049, 'John Thor', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.24 Kota Tangerang Selatan', 'John49@gmail.com', '2004-08-01', '', 'user', 2022, 0),
(1152200050, 'Saipul de Kirui', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.25 Kota Tangerang Selatan', 'Saipul50@gmail.com', '2004-03-06', '', 'user', 2022, 0),
(1152200052, 'Rizki Adiyatma', '827ccb0eea8a706c4c34a16891f84e7b', 'Serpong, Rawa Buntu , Tangerang Selatan', 'RizkiAdi@gmail.com', '2024-01-08', 'gojo.jpg', 'user', 2022, 0),
(1152300038, 'Hafiz Saputra', '827ccb0eea8a706c4c34a16891f84e7b', 'Jl.Watubela No.13 Kota Tangerang Selatan', 'Hafiz38@gmail.com', '2004-01-24', '', 'user', 2023, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan1`
--

CREATE TABLE `kegiatan1` (
  `nrp` int(10) NOT NULL,
  `kegiatan` text DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `dokumen` varchar(300) DEFAULT NULL,
  `NilaiSKKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan1`
--

INSERT INTO `kegiatan1` (`nrp`, `kegiatan`, `satuan`, `tingkat`, `dokumen`, `NilaiSKKM`) VALUES
(1152200026, 'Magang', 'Semester', 'Mahasiswa', 'kegiatan1.txt.txt', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan2`
--

CREATE TABLE `kegiatan2` (
  `nrp` int(10) NOT NULL,
  `kegiatan` text DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `dokumen` varchar(300) DEFAULT NULL,
  `NilaiSKKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan2`
--

INSERT INTO `kegiatan2` (`nrp`, `kegiatan`, `satuan`, `tingkat`, `dokumen`, `NilaiSKKM`) VALUES
(1152200026, 'Karsa Cipta', 'Kegiatan', 'NASIONAL', 'kegiatan2.txt.txt', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan3`
--

CREATE TABLE `kegiatan3` (
  `nrp` int(10) NOT NULL,
  `kegiatan` text DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `dokumen` varchar(300) DEFAULT NULL,
  `NilaiSKKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan3`
--

INSERT INTO `kegiatan3` (`nrp`, `kegiatan`, `satuan`, `tingkat`, `dokumen`, `NilaiSKKM`) VALUES
(1152200026, 'Lomba-Non-Akademik', 'Semester', 'provinsi', '1152200025 - RIDHUAN RANGGA KUSUMA - TUGAS 12 SINGLE SOURCE SHORTEST PATH.docx', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan4`
--

CREATE TABLE `kegiatan4` (
  `nrp` int(10) NOT NULL,
  `kegiatan` text DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `dokumen` varchar(300) DEFAULT NULL,
  `NilaiSKKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan5`
--

CREATE TABLE `kegiatan5` (
  `nrp` int(10) NOT NULL,
  `kegiatan` text DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `dokumen` varchar(300) DEFAULT NULL,
  `NilaiSKKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan6`
--

CREATE TABLE `kegiatan6` (
  `nrp` int(10) NOT NULL,
  `kegiatan` text DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `tingkat` varchar(20) DEFAULT NULL,
  `dokumen` varchar(300) DEFAULT NULL,
  `NilaiSKKM` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `noreg` int(11) NOT NULL,
  `nrp` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `kegiatan` varchar(40) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `tingkat` varchar(60) NOT NULL,
  `dokumen` varchar(400) NOT NULL,
  `NilaiSKKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyimpanan`
--

INSERT INTO `penyimpanan` (`noreg`, `nrp`, `id`, `kegiatan`, `satuan`, `tingkat`, `dokumen`, `NilaiSKKM`) VALUES
(21, 1151800001, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1151800001 - kegiatan1.txt', 20),
(22, 1151800001, 2, 'Penerapan IPTEK', 'Kegiatan', 'LolosInternal', '1151800001 - kegiatan2.txt', 20),
(24, 1151800001, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1151800001 - kegiatan3.txt', 10),
(25, 1151800001, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1151800001 - kegiatan4.txt', 20),
(26, 1151800001, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Koordinator/wakilketua/sekretaris/bendahara', '1151800001 - kegiatan5.txt', 10),
(27, 1151800001, 6, 'Anggota Organisasi Profesi', 'Tahun', 'MAHASISWA', '1151800001 - kegiatan6.txt', 15),
(28, 1151800003, 1, 'Magang', 'Semester', 'Mahasiswa', '1151800003 - kegiatan1.txt', 20),
(29, 1151800003, 2, 'Riset Eksakta', 'Semester', 'Proposal', '1151800003 - kegiatan2.txt', 10),
(30, 1151800003, 3, 'Lomba Non Akademik', 'Kegiatan', 'nasional', '1151800003 - kegiatan3.txt', 20),
(31, 1151800003, 4, 'Asisten Dosen/Lab', 'Semester', 'Mahasiswa', '1151800003 - kegiatan4.txt', 25),
(32, 1151800003, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1151800003 - kegiatan5.txt', 15),
(33, 1151800003, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1151800003 - kegiatan6.txt', 5),
(34, 1151900002, 1, 'Magang', 'Semester', 'Mahasiswa', '1151900002 - kegiatan1.txt', 20),
(35, 1151900002, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1151900002 - kegiatan2.txt', 10),
(36, 1151900002, 3, 'Rekognisi', 'Kegiatan', 'Nasional', '1151900002 - kegiatan3.txt', 30),
(37, 1151900002, 4, 'PKKMB', 'Semester', 'Mahasiswa', '1151900002 - kegiatan4.txt', 20),
(38, 1151900002, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1151900002 - kegiatan5.txt', 5),
(39, 1151900002, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1151900002 - kegiatan6.txt', 20),
(40, 1151900003, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1151900003 - kegiatan1.txt', 20),
(41, 1151900003, 2, 'Riset Eksakta', 'Semester', 'Proposal', '1151900003 - kegiatan2.txt', 10),
(42, 1151900003, 3, 'Lomba Akademik', 'Kegiatan', 'Internasional', '1151900003 - kegiatan3.txt', 50),
(43, 1151900003, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1151900003 - kegiatan4.txt', 10),
(44, 1151900003, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Semester', 'Anggota', '1151900003 - kegiatan5.txt', 5),
(45, 1151900003, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1151900003 - kegiatan6.txt', 5),
(46, 1151900004, 1, 'Magang', 'Semester', 'Mahasiswa', '1151900004 - kegiatan1.txt', 20),
(47, 1151900004, 2, 'Pengabdian Masyarakat', 'Kegiatan', 'Pendanaan', '1151900004 - kegiatan2.txt', 40),
(48, 1151900004, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1151900004 - kegiatan3.txt', 15),
(49, 1151900004, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1151900004 - kegiatan4.txt', 20),
(50, 1151900004, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1151900004 - kegiatan5.txt', 5),
(51, 1151900004, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1151900004 - kegiatan6.txt', 20),
(52, 1151900005, 1, 'Studi Independen', 'Semester', 'Mahasiswa', '1151900005 - kegiatan1.txt', 20),
(53, 1151900005, 2, 'Penerapan IPTEK', 'Kegiatan', 'Proposal', '1151900005 - kegiatan2.txt', 10),
(54, 1151900005, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1151900005 - kegiatan3.txt', 15),
(55, 1151900005, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1151900005 - kegiatan4.txt', 20),
(56, 1151900005, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Semester', 'Koordinator', '1151900005 - kegiatan5.txt', 15),
(57, 1151900005, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1151900005 - kegiatan6.txt', 20),
(58, 1151900111, 1, 'Magang', 'Semester', 'Mahasiswa', '1151900111 - kegiatan1.txt', 20),
(59, 1151900111, 2, 'Karsa Cipta', 'Kegiatan', 'LolosInternal', '1151900111 - kegiatan2.txt', 20),
(60, 1151900111, 3, 'Rekognisi', 'Kegiatan', 'Internasional', '1151900111 - kegiatan3.txt', 50),
(61, 1151900111, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1151900111 - kegiatan4.txt', 20),
(62, 1151900111, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Kegiatan', 'Wakilketua/sekretaris', '1151900111 - kegiatan5.txt', 20),
(63, 1151900111, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1151900111 - kegiatan6.txt', 15),
(64, 1152000001, 1, 'Magang', 'Semester', 'Mahasiswa', '1152000001 - kegiatan1.txt', 20),
(65, 1152000001, 2, 'Riset Eksakta', 'Semester', 'Pendanaan', '1152000001 - kegiatan2.txt', 40),
(66, 1152000001, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152000001 - kegiatan3.txt', 15),
(67, 1152000001, 4, 'PKKMB', 'Semester', 'Mahasiswa', '1152000001 - kegiatan4.txt', 20),
(68, 1152000001, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Semester', 'Koordinator', '1152000001 - kegiatan5.txt', 15),
(69, 1152000001, 6, 'Anggota Organisasi Profesi', 'Semester', 'MAHASISWA', '1152000001 - kegiatan6.txt', 15),
(70, 1152000002, 1, 'KKN', 'Semester', 'Mahasiswa', '1152000002 - kegiatan1.txt', 20),
(71, 1152000002, 2, 'Riset Eksakta', 'Semester', 'Proposal', '1152000002 - kegiatan2.txt', 10),
(72, 1152000002, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152000002 - kegiatan3.txt', 15),
(73, 1152000002, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152000002 - kegiatan4.txt', 20),
(74, 1152000002, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Koordinator/wakilketua/sekretaris/bendahara', '1152000002 - kegiatan5.txt', 10),
(75, 1152000002, 6, 'Mengikuti Seminar Sebagai Peserta', 'Semester', 'MAHASISWA', '1152000002 - kegiatan6.txt', 5),
(76, 1152000003, 1, 'Magang', 'Semester', 'Mahasiswa', '1152000003 - kegiatan1.txt', 20),
(77, 1152000003, 2, 'Pengabdian Masyarakat', 'Kegiatan', 'LolosInternal', '1152000003 - kegiatan2.txt', 20),
(78, 1152000003, 3, 'Lomba Non Akademik', 'Kegiatan', 'internasional', '1152000003 - kegiatan3.txt', 40),
(79, 1152000003, 4, 'Asisten Dosen/Lab', 'Semester', 'Mahasiswa', '1152000003 - kegiatan4.txt', 25),
(80, 1152000003, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152000003 - kegiatan5.txt', 15),
(81, 1152000003, 6, 'Kemampuan Bahasa Inggris (TOEFL minimal ', 'Kegiatan', 'MAHASISWA', '1152000003 - kegiatan6.txt', 20),
(82, 1152000004, 1, 'Penelitian / Riset', 'Semester', 'Mahasiswa', '1152000004 - kegiatan1.txt', 20),
(83, 1152000004, 2, 'Karsa Cipta', 'Kegiatan', 'Pendanaan', '1152000004 - kegiatan2.txt', 40),
(84, 1152000004, 3, 'Lomba Akademik', 'Kegiatan', 'Nasional', '1152000004 - kegiatan3.txt', 30),
(85, 1152000004, 4, 'Asisten Dosen/Lab', 'Semester', 'Mahasiswa', '1152000004 - kegiatan4.txt', 25),
(86, 1152000004, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Ketua', '1152000004 - kegiatan5.txt', 25),
(87, 1152000004, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152000004 - kegiatan6.txt', 10),
(88, 1152000005, 1, 'Mengajar di Sekolah', 'Semester', 'Mahasiswa', '1152000005 - kegiatan1.txt', 20),
(89, 1152000005, 2, 'Kewirausahaan', 'Kegiatan', 'NASIONAL', '1152000005 - kegiatan2.txt', 50),
(90, 1152000005, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152000005 - kegiatan3.txt', 15),
(91, 1152000005, 4, 'Satgas PPKS', 'Kegiatan', 'Mahasiswa', '1152000005 - kegiatan4.txt', 25),
(92, 1152000005, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152000005 - kegiatan5.txt', 5),
(93, 1152000005, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152000005 - kegiatan6.txt', 5),
(94, 1152000006, 1, 'Studi Independen', 'Semester', 'Mahasiswa', '1152000006 - kegiatan1.txt', 20),
(95, 1152000006, 2, 'Karsa Cipta', 'Kegiatan', 'LolosInternal', '1152000006 - kegiatan2.txt', 20),
(96, 1152000006, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152000006 - kegiatan3.txt', 10),
(97, 1152000006, 4, 'Satgas PPKS', 'Kegiatan', 'Mahasiswa', '1152000006 - kegiatan4.txt', 25),
(98, 1152000006, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152000006 - kegiatan5.txt', 5),
(99, 1152000006, 6, 'Kemampuan Bahasa Inggris (TOEFL minimal ', 'Kegiatan', 'MAHASISWA', '1152000006 - kegiatan6.txt', 20),
(100, 1152100001, 1, 'Studi Independen', 'Semester', 'Mahasiswa', '1152100001 - kegiatan1.txt', 20),
(101, 1152100001, 2, 'Kewirausahaan', 'Kegiatan', 'Pendanaan', '1152100001 - kegiatan2.txt', 40),
(102, 1152100001, 3, 'Lomba Non Akademik', 'Kegiatan', 'nasional', '1152100001 - kegiatan3.txt', 20),
(103, 1152100001, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152100001 - kegiatan4.txt', 20),
(104, 1152100001, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Ketua', '1152100001 - kegiatan5.txt', 25),
(105, 1152100001, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152100001 - kegiatan6.txt', 10),
(106, 1152100002, 1, 'Proyek Kemanusiaan', 'Semester', 'Mahasiswa', '1152100002 - kegiatan1.txt', 20),
(107, 1152100002, 2, 'Penerapan IPTEK', 'Kegiatan', 'LolosInternal', '1152100002 - kegiatan2.txt', 20),
(108, 1152100002, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152100002 - kegiatan3.txt', 10),
(109, 1152100002, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152100002 - kegiatan4.txt', 10),
(110, 1152100002, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152100002 - kegiatan5.txt', 5),
(111, 1152100002, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1152100002 - kegiatan6.txt', 20),
(112, 1152100003, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152100003 - kegiatan1.txt', 20),
(113, 1152100003, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152100003 - kegiatan2.txt', 10),
(114, 1152100003, 3, 'Lomba Non Akademik', 'Kegiatan', 'nasional', '1152100003 - kegiatan3.txt', 20),
(115, 1152100003, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152100003 - kegiatan4.txt', 20),
(116, 1152100003, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152100003 - kegiatan5.txt', 15),
(117, 1152100003, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152100003 - kegiatan6.txt', 15),
(118, 1152100004, 1, 'Mengajar di Sekolah', 'Semester', 'Mahasiswa', '1152100004 - kegiatan1.txt', 20),
(119, 1152100004, 2, 'Penerapan IPTEK', 'Kegiatan', 'Pendanaan', '1152100004 - kegiatan2.txt', 40),
(120, 1152100004, 3, 'Rekognisi', 'Semester', 'Provinsi', '1152100004 - kegiatan3.txt', 15),
(121, 1152100004, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152100004 - kegiatan4.txt', 20),
(122, 1152100004, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152100004 - kegiatan5.txt', 15),
(123, 1152100004, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152100004 - kegiatan6.txt', 15),
(124, 1152100005, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152100005 - kegiatan1.txt', 20),
(125, 1152100005, 2, 'Karsa Cipta', 'Kegiatan', 'LolosInternal', '1152100005 - kegiatan2.txt', 20),
(126, 1152100005, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152100005 - kegiatan3.txt', 10),
(127, 1152100005, 4, 'Asisten Dosen/Lab', 'Semester', 'Mahasiswa', '1152100005 - kegiatan4.txt', 25),
(128, 1152100005, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152100005 - kegiatan5.txt', 5),
(129, 1152100005, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152100005 - kegiatan6.txt', 15),
(130, 1152100006, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152100006 - kegiatan1.txt', 20),
(131, 1152100006, 2, 'Penerapan IPTEK', 'Kegiatan', 'LolosInternal', '1152100006 - kegiatan2.txt', 20),
(132, 1152100006, 3, 'Lomba Akademik', 'Kegiatan', 'Nasional', '1152100006 - kegiatan3.txt', 30),
(133, 1152100006, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152100006 - kegiatan4.txt', 10),
(134, 1152100006, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Wakilketua/sekretaris', '1152100006 - kegiatan5.txt', 20),
(135, 1152100006, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152100006 - kegiatan6.txt', 10),
(136, 1152200001, 1, 'Mengajar di Sekolah', 'Semester', 'Mahasiswa', '1152200001 - kegiatan1.txt', 20),
(137, 1152200001, 2, 'Pengabdian Masyarakat', 'Kegiatan', 'NASIONAL', '1152200001 - kegiatan2.txt', 50),
(138, 1152200001, 3, 'Lomba Akademik', 'Kegiatan', 'Internasional', '1152200001 - kegiatan3.txt', 50),
(139, 1152200001, 4, 'PKKMB', 'Semester', 'Mahasiswa', '1152200001 - kegiatan4.txt', 20),
(140, 1152200001, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Ketua', '1152200001 - kegiatan5.txt', 25),
(141, 1152200001, 6, 'Kemampuan Bahasa Inggris (TOEFL minimal ', 'Kegiatan', 'MAHASISWA', '1152200001 - kegiatan6.txt', 20),
(142, 1152200002, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152200002 - kegiatan1.txt', 20),
(143, 1152200002, 2, 'Kewirausahaan', 'Kegiatan', 'Pendanaan', '1152200002 - kegiatan2.txt', 40),
(144, 1152200002, 3, 'Rekognisi', 'Kegiatan', 'Nasional', '1152200002 - kegiatan4.txt', 30),
(145, 1152200002, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Koordinator/wakilketua/sekretaris/bendahara', '1152200002 - kegiatan5.txt', 10),
(146, 1152200002, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1152200002 - kegiatan6.txt', 20),
(147, 1152200003, 1, 'Penelitian / Riset', 'Semester', 'Mahasiswa', '1152200003 - kegiatan1.txt', 20),
(148, 1152200003, 2, 'Penerapan IPTEK', 'Kegiatan', 'NASIONAL', '1152200003 - kegiatan2.txt', 50),
(149, 1152200003, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200003 - kegiatan3.txt', 15),
(150, 1152200003, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200003 - kegiatan4.txt', 10),
(151, 1152200003, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Ketua', '1152200003 - kegiatan5.txt', 25),
(152, 1152200003, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200003 - kegiatan6.txt', 15),
(153, 1152200004, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152200004 - kegiatan1.txt', 20),
(154, 1152200004, 2, 'Karya Inovatif', 'Kegiatan', 'LolosInternal', '1152200004 - kegiatan2.txt', 20),
(155, 1152200004, 3, 'Lomba Akademik', 'Kegiatan', 'Nasional', '1152200004 - kegiatan3.txt', 30),
(156, 1152200004, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200004 - kegiatan5.txt', 5),
(157, 1152200004, 4, 'PKKMB', 'Semester', 'Mahasiswa', '1152200004 - kegiatan4.txt', 20),
(158, 1152200004, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152200004 - kegiatan6.txt', 5),
(159, 1152200005, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200005 - kegiatan1.txt', 20),
(160, 1152200005, 2, 'Penerapan IPTEK', 'Kegiatan', 'NASIONAL', '1152200005 - kegiatan2.txt', 50),
(161, 1152200005, 3, 'Lomba Non Akademik', 'Kegiatan', 'internasional', '1152200005 - kegiatan3.txt', 40),
(162, 1152200005, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200005 - kegiatan4.txt', 20),
(163, 1152200005, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Ketua', '1152200005 - kegiatan5.txt', 25),
(164, 1152200005, 6, 'Kemampuan Bahasa Inggris (TOEFL minimal ', 'Kegiatan', 'MAHASISWA', '1152200005 - kegiatan6.txt', 20),
(165, 1152200026, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200026 - kegiatan1.txt', 20),
(166, 1152200026, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200026 - kegiatan2.txt', 10),
(167, 1152200026, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200026 - kegiatan3.txt', 15),
(168, 1152200026, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200026 - kegiatan4.txt', 20),
(169, 1152200026, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152200026 - kegiatan5.txt', 15),
(170, 1152200026, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200026 - kegiatan6.txt', 10),
(171, 1152200027, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152200027 - kegiatan1.txt', 20),
(172, 1152200027, 2, 'Karsa Cipta', 'Kegiatan', 'LolosInternal', '1152200027 - kegiatan2.txt', 20),
(173, 1152200027, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200027 - kegiatan3.txt', 10),
(174, 1152200027, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200027 - kegiatan4.txt', 10),
(175, 1152200027, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200027 - kegiatan5.txt', 5),
(176, 1152200027, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200027 - kegiatan6.txt', 15),
(177, 1152200028, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200028 - kegiatan1.txt', 20),
(178, 1152200028, 2, 'Penerapan IPTEK', 'Kegiatan', 'Proposal', '1152200028 - kegiatan2.txt', 10),
(179, 1152200028, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200028 - kegiatan3.txt', 15),
(180, 1152200028, 4, 'Asisten Dosen/Lab', 'Semester', 'Mahasiswa', '1152200028 - kegiatan4.txt', 25),
(181, 1152200028, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Kegiatan', 'Anggota', '1152200028 - kegiatan5.txt', 5),
(182, 1152200028, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152200028 - kegiatan6.txt', 5),
(183, 1152200029, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200029 - kegiatan1.txt', 20),
(184, 1152200029, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152200029 - kegiatan2.txt', 10),
(185, 1152200029, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200029 - kegiatan3.txt', 10),
(186, 1152200029, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200029 - kegiatan4.txt', 20),
(187, 1152200029, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200029 - kegiatan5.txt', 5),
(188, 1152200029, 6, 'Kemampuan Bahasa Inggris (TOEFL minimal ', 'Kegiatan', 'MAHASISWA', '1152200029 - kegiatan6.txt', 20),
(189, 1152200030, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200030 - kegiatan1.txt', 20),
(190, 1152200030, 2, 'Penerapan IPTEK', 'Kegiatan', 'LolosInternal', '1152200030 - kegiatan2.txt', 20),
(191, 1152200030, 3, 'Lomba Non Akademik', 'Kegiatan', 'nasional', '1152200030 - kegiatan3.txt', 20),
(192, 1152200030, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200030 - kegiatan4.txt', 10),
(193, 1152200030, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200030 - kegiatan5.txt', 5),
(194, 1152200030, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200030 - kegiatan6.txt', 15),
(195, 1152200002, 3, 'Lomba Non Akademik', 'Kegiatan', 'nasional', '1152200002 - kegiatan3.txt', 20),
(196, 1152200031, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200031 - kegiatan1.txt', 20),
(197, 1152200031, 2, 'Penerapan IPTEK', 'Kegiatan', 'LolosInternal', '1152200031 - kegiatan2.txt', 20),
(198, 1152200031, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200031 - kegiatan3.txt', 10),
(199, 1152200031, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200031 - kegiatan4.txt', 10),
(200, 1152200031, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200031 - kegiatan5.txt', 5),
(201, 1152200031, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200031 - kegiatan6.txt', 15),
(202, 1152200032, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200032 - kegiatan1.txt', 20),
(203, 1152200032, 2, 'Kewirausahaan', 'Kegiatan', 'LolosInternal', '1152200032 - kegiatan2.txt', 20),
(204, 1152200032, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200032 - kegiatan3.txt', 15),
(205, 1152200032, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200032 - kegiatan4.txt', 10),
(206, 1152200032, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200032 - kegiatan5.txt', 5),
(207, 1152200032, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200032 - kegiatan6.txt', 10),
(208, 1152200033, 1, 'Mengajar di Sekolah', 'Semester', 'Mahasiswa', '1152200033 - kegiatan1.txt', 20),
(209, 1152200033, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152200033 - kegiatan2.txt', 10),
(210, 1152200033, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200033 - kegiatan3.txt', 15),
(211, 1152200033, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200033 - kegiatan5.txt', 20),
(212, 1152200033, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200033 - kegiatan4.txt', 5),
(213, 1152200033, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200033 - kegiatan6.txt', 10),
(214, 1152200034, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200034 - kegiatan1.txt', 20),
(215, 1152200034, 2, 'Karsa Cipta', 'Kegiatan', 'LolosInternal', '1152200034 - kegiatan2.txt', 20),
(216, 1152200034, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200034 - kegiatan3.txt', 10),
(217, 1152200034, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200034 - kegiatan4.txt', 10),
(218, 1152200034, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200034 - kegiatan5.txt', 5),
(219, 1152200034, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152200034 - kegiatan6.txt', 5),
(220, 1152200035, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200035 - kegiatan1.txt', 20),
(221, 1152200035, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200035 - kegiatan3.txt', 15),
(222, 1152200035, 2, 'Kewirausahaan', 'Kegiatan', 'LolosInternal', '1152200035 - kegiatan2.txt', 20),
(223, 1152200035, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200035 - kegiatan4.txt', 20),
(224, 1152200035, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200035 - kegiatan5.txt', 5),
(225, 1152200035, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200035 - kegiatan6.txt', 15),
(226, 1152200036, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200036 - kegiatan1.txt', 20),
(227, 1152200036, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200036 - kegiatan2.txt', 10),
(228, 1152200036, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200036 - kegiatan3.txt', 15),
(229, 1152200036, 4, 'Satgas PPKS', 'Kegiatan', 'Mahasiswa', '1152200036 - kegiatan4.txt', 25),
(230, 1152200036, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200036 - kegiatan5.txt', 5),
(231, 1152200036, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200036 - kegiatan6.txt', 10),
(232, 1152200037, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200037 - kegiatan1.txt', 20),
(233, 1152200037, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152200037 - kegiatan2.txt', 10),
(234, 1152200037, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200037 - kegiatan3.txt', 10),
(235, 1152200037, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200037 - kegiatan4.txt', 20),
(236, 1152200037, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200037 - kegiatan5.txt', 5),
(237, 1152200037, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200037 - kegiatan6.txt', 10),
(238, 1152200039, 1, 'KKN', 'Semester', 'Mahasiswa', '1152200039 - kegiatan1.txt', 20),
(239, 1152200039, 2, 'Kewirausahaan', 'Kegiatan', 'LolosInternal', '1152200039 - kegiatan2.txt', 20),
(240, 1152200039, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200039 - kegiatan3.txt', 15),
(241, 1152200039, 4, 'Satgas PPKS', 'Kegiatan', 'Mahasiswa', '1152200039 - kegiatan4.txt', 25),
(242, 1152200039, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200039 - kegiatan5.txt', 5),
(243, 1152200039, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200039 - kegiatan6.txt', 15),
(244, 1152200040, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200040 - kegiatan1.txt', 20),
(245, 1152200040, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152200040 - kegiatan2.txt', 10),
(246, 1152200040, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200040 - kegiatan3.txt', 15),
(247, 1152200040, 4, 'PKKMB', 'Semester', 'Mahasiswa', '1152200040 - kegiatan4.txt', 20),
(248, 1152200040, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200040 - kegiatan5.txt', 5),
(249, 1152200040, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152200040 - kegiatan6.txt', 5),
(250, 1152200041, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200041 - kegiatan1.txt', 20),
(251, 1152200041, 2, 'Penerapan IPTEK', 'Kegiatan', 'Proposal', '1152200041 - kegiatan2.txt', 10),
(252, 1152200041, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200041 - kegiatan3.txt', 10),
(253, 1152200041, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200041 - kegiatan4.txt', 20),
(254, 1152200041, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200041 - kegiatan5.txt', 5),
(255, 1152200041, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1152200041 - kegiatan6.txt', 20),
(256, 1152200042, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200042 - kegiatan1.txt', 20),
(257, 1152200042, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200042 - kegiatan2.txt', 10),
(258, 1152200042, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200042 - kegiatan3.txt', 10),
(259, 1152200042, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200042 - kegiatan4.txt', 20),
(260, 1152200042, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152200042 - kegiatan5.txt', 15),
(261, 1152200042, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152200042 - kegiatan6.txt', 5),
(262, 1152200043, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200043 - kegiatan1.txt', 20),
(263, 1152200043, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200043 - kegiatan2.txt', 10),
(264, 1152200043, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200043 - kegiatan3.txt', 15),
(265, 1152200043, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152200043 - kegiatan4.txt', 10),
(266, 1152200043, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200043 - kegiatan5.txt', 5),
(267, 1152200043, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200043 - kegiatan6.txt', 15),
(268, 1152200044, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200044 - kegiatan1.txt', 20),
(269, 1152200044, 2, 'Kewirausahaan', 'Kegiatan', 'LolosInternal', '1152200044 - kegiatan2.txt', 20),
(270, 1152200044, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200044 - kegiatan3.txt', 10),
(271, 1152200044, 4, 'Asisten Dosen/Lab', 'Kegiatan', 'Mahasiswa', '1152200044 - kegiatan4.txt', 25),
(272, 1152200044, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Anggota', '1152200044 - kegiatan5.txt', 5),
(273, 1152200044, 6, 'Kemampuan Bahasa Inggris (TOEFL minimal ', 'Kegiatan', 'MAHASISWA', '1152200044 - kegiatan6.txt', 20),
(274, 1152200045, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200045 - kegiatan1.txt', 20),
(275, 1152200045, 2, 'Kewirausahaan', 'Kegiatan', 'LolosInternal', '1152200045 - kegiatan2.txt', 20),
(276, 1152200045, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152200045 - kegiatan3.txt', 10),
(277, 1152200045, 4, 'Satgas PPKS', 'Kegiatan', 'Mahasiswa', '1152200045 - kegiatan4.txt', 25),
(278, 1152200045, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200045 - kegiatan5.txt', 5),
(279, 1152200045, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200045 - kegiatan6.txt', 10),
(280, 1152200046, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200046 - kegiatan1.txt', 20),
(281, 1152200046, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152200046 - kegiatan2.txt', 10),
(282, 1152200046, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200046 - kegiatan3.txt', 15),
(283, 1152200046, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200046 - kegiatan4.txt', 20),
(284, 1152200046, 5, 'Panitia Kegiatan Ormawa', 'Kegiatan', 'Koordinator/wakilketua/sekretaris/bendahara', '1152200046 - kegiatan5.txt', 10),
(285, 1152200046, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200046 - kegiatan6.txt', 15),
(286, 1152200047, 1, 'Mengajar di Sekolah', 'Semester', 'Mahasiswa', '1152200047 - kegiatan1.txt', 20),
(287, 1152200047, 2, 'Kewirausahaan', 'Kegiatan', 'LolosInternal', '1152200047 - kegiatan2.txt', 20),
(288, 1152200047, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200047 - kegiatan3.txt', 15),
(289, 1152200047, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200047 - kegiatan4.txt', 20),
(290, 1152200047, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200047 - kegiatan5.txt', 5),
(291, 1152200047, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200047 - kegiatan6.txt', 10),
(292, 1152200048, 1, 'Wirausaha', 'Semester', 'Mahasiswa', '1152200048 - kegiatan1.txt', 20),
(293, 1152200048, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200048 - kegiatan2.txt', 10),
(294, 1152200048, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200048 - kegiatan3.txt', 15),
(295, 1152200048, 4, 'Asisten Dosen/Lab', 'Semester', 'Mahasiswa', '1152200048 - kegiatan4.txt', 25),
(296, 1152200048, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152200048 - kegiatan5.txt', 15),
(297, 1152200048, 6, 'Anggota Organisasi Profesi', 'Kegiatan', 'MAHASISWA', '1152200048 - kegiatan6.txt', 15),
(298, 1152200049, 1, 'Magang', 'Semester', 'Mahasiswa', '1152200049 - kegiatan1.txt', 20),
(299, 1152200049, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200049 - kegiatan2.txt', 10),
(300, 1152200049, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200049 - kegiatan3.txt', 15),
(301, 1152200049, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200049 - kegiatan4.txt', 20),
(302, 1152200049, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152200049 - kegiatan5.txt', 15),
(303, 1152200049, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1152200049 - kegiatan6.txt', 20),
(304, 1152200050, 1, 'Mengajar di Sekolah', 'Semester', 'Mahasiswa', '1152200050 - kegiatan1.txt', 20),
(305, 1152200050, 2, 'Kewirausahaan', 'Kegiatan', 'Proposal', '1152200050 - kegiatan2.txt', 10),
(306, 1152200050, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200050 - kegiatan3.txt', 15),
(307, 1152200050, 4, 'Asisten Dosen/Lab', 'Kegiatan', 'Mahasiswa', '1152200050 - kegiatan4.txt', 25),
(308, 1152200050, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Anggota', '1152200050 - kegiatan5.txt', 5),
(309, 1152200050, 6, 'Mengikuti Workshop hardskill/softskill', 'Kegiatan', 'MAHASISWA', '1152200050 - kegiatan6.txt', 10),
(310, 1152200052, 1, 'Pertukaran Mahasiswa', 'Semester', 'Mahasiswa', '1152200052 - kegiatan1.txt', 20),
(311, 1152200052, 2, 'Kewirausahaan', 'Kegiatan', 'Pendanaan', '1152200052 - kegiatan2.txt', 40),
(312, 1152200052, 3, 'Lomba Akademik', 'Kegiatan', 'Provinsi', '1152200052 - kegiatan3.txt', 15),
(313, 1152200052, 4, 'PKKMB', 'Kegiatan', 'Mahasiswa', '1152200052 - kegiatan4.txt', 20),
(314, 1152200052, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Koordinator', '1152200052 - kegiatan5.txt', 15),
(315, 1152200052, 6, 'Mengikuti Seminar Sebagai Peserta', 'Kegiatan', 'MAHASISWA', '1152200052 - kegiatan6.txt', 5),
(316, 1152300038, 1, 'Magang', 'Semester', 'Mahasiswa', '1152300038 - kegiatan1.txt', 20),
(317, 1152300038, 2, 'Riset Eksakta', 'Kegiatan', 'Proposal', '1152300038 - kegiatan2.txt', 10),
(318, 1152300038, 3, 'Lomba Non Akademik', 'Kegiatan', 'provinsi', '1152300038 - kegiatan3.txt', 10),
(319, 1152300038, 4, 'Relawan Anti Narkoba', 'Kegiatan', 'Mahasiswa', '1152300038 - kegiatan4.txt', 10),
(320, 1152300038, 5, 'Pengurus Ormawa (HMPS,UKM,UKK)', 'Tahun', 'Wakilketua/sekretaris', '1152300038 - kegiatan5.txt', 20),
(321, 1152300038, 6, 'Sertifikasi', 'Kegiatan', 'MAHASISWA', '1152300038 - kegiatan6.txt', 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datamahasiswa`
--
ALTER TABLE `datamahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indeks untuk tabel `kegiatan1`
--
ALTER TABLE `kegiatan1`
  ADD KEY `nrp` (`nrp`);

--
-- Indeks untuk tabel `kegiatan2`
--
ALTER TABLE `kegiatan2`
  ADD KEY `nrp` (`nrp`);

--
-- Indeks untuk tabel `kegiatan3`
--
ALTER TABLE `kegiatan3`
  ADD KEY `fk_keg1` (`nrp`);

--
-- Indeks untuk tabel `kegiatan4`
--
ALTER TABLE `kegiatan4`
  ADD KEY `nrp` (`nrp`);

--
-- Indeks untuk tabel `kegiatan5`
--
ALTER TABLE `kegiatan5`
  ADD KEY `fk_ms` (`nrp`);

--
-- Indeks untuk tabel `kegiatan6`
--
ALTER TABLE `kegiatan6`
  ADD KEY `nrp` (`nrp`);

--
-- Indeks untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`noreg`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `noreg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan1`
--
ALTER TABLE `kegiatan1`
  ADD CONSTRAINT `kegiatan1_ibfk1` FOREIGN KEY (`nrp`) REFERENCES `datamahasiswa` (`nrp`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan2`
--
ALTER TABLE `kegiatan2`
  ADD CONSTRAINT `kegiatan2_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `datamahasiswa` (`nrp`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan3`
--
ALTER TABLE `kegiatan3`
  ADD CONSTRAINT `kegiatan3_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `datamahasiswa` (`nrp`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan4`
--
ALTER TABLE `kegiatan4`
  ADD CONSTRAINT `kegiatan4_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `datamahasiswa` (`nrp`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan5`
--
ALTER TABLE `kegiatan5`
  ADD CONSTRAINT `kegiatan5_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `datamahasiswa` (`nrp`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan6`
--
ALTER TABLE `kegiatan6`
  ADD CONSTRAINT `kegiatan6_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `datamahasiswa` (`nrp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
