-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2024 pada 14.12
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
-- Database: `db_skl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'dev', '$2b$12$3OXPz1.6uo8PVxdVPPmo0eXJJ'),
(2, 'deve', '$2y$10$e3Nq.N9WkhA6zUnPoV/RyO/6s');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(32) DEFAULT NULL,
  `tahun_lulus` int(11) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `kesesuaian` varchar(32) DEFAULT NULL,
  `waktu` varchar(32) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `tempat_kerja` varchar(255) DEFAULT NULL,
  `penghasilan` varchar(255) DEFAULT NULL,
  `cara` varchar(255) DEFAULT NULL,
  `studi_lanjut` varchar(32) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `status`, `no_responden`, `prodi`, `email`, `nama`, `usia`, `jeniskelamin`, `alamat`, `nomor_telepon`, `saranmasukkan`, `password`, `role`, `tahun_lulus`, `pekerjaan`, `kesesuaian`, `waktu`, `instansi`, `tempat_kerja`, `penghasilan`, `cara`, `studi_lanjut`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`) VALUES
(1, 1, 1, 'Keperawatan Semarang Program Diploma Tiga', 'suleptin@gmail.com', 'tito', 16, NULL, NULL, NULL, NULL, '123', 'alumni', 2025, 'Belum Bekerja', 'Sesuai', 'Setelah lulus < 3 bulan', 'Instansi pemerintah/BUMN', 'RS', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Biaya sendiri', 4, 4, 2, 1, 2, 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 1, 'A', 'test@gmail.com', 'christo', NULL, NULL, NULL, NULL, NULL, '123', 'alumni', 2025, 'Belum Bekerja', 'Sesuai', 'Setelah lulus < 3 bulan', 'Instansi pemerintah/BUMN', 'RS', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Biaya sendiri', 4, 4, 2, 1, 2, 1, 1, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 21, 'Profesi Bidan', 'alumni@gmail.com', 'a', 21, 'Laki-laki', 'Jalan Baru', '12', NULL, '$2y$12$iWtywJ1i1IjCat3xJj5rYu1TSawduQolEBZFI8Sy4UkXXqe0A6A1i', NULL, 2021, 'Bekerja', 'Sesuai', '3 - 6 bulan', 'Klinik', 'Berhasil', '3,5 - 5 juta', 'Penempatan kerja/magang', 'Biaya sendiri', 4, 4, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 3, 3, 3, 2, 2),
(22, 1, 22, NULL, 'bisa@gmail.com', 'Berhasil', NULL, NULL, NULL, NULL, NULL, '$2y$12$YA2YlXSOhUgW2LAyexrXjOMV9xhTpOi8S/3qofKXefPoQ0vG8y6fe', NULL, NULL, NULL, NULL, NULL, NULL, 'Klinik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 24, NULL, 'sukses@alumni.com', 'sukses', NULL, NULL, NULL, NULL, NULL, '$2y$12$hl9Qfy/iNcJqVGmTt6g9yOmjQB.7MiqeIShLgMe6Lg7UfOEox/pTW', 'alumni', NULL, NULL, NULL, NULL, NULL, 'Klinik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, 'a@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$82FalVeH0ht0NE.xk2hNaejxug5FqLwsfcDbcaDRNgxtoLG/LaPWy', 'alumni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, NULL, 'Kebidanan Blora Program Diploma Tiga', NULL, '21', 2, 'Laki-laki', 's', '2', NULL, '', NULL, 2, 'Lanjut Studi', 'Sesuai', '7 - 11 bulan', 'Rumah Sakit', 's', '5 - 6,5 juta', 'Dihubungi oleh instansi/perusahaan', 'Biaya sendiri', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(30, 1, NULL, 'Keperawatan Tegal Program Diploma Tiga', NULL, '123', 123, 'Laki-laki', '123', '123', '123', '', NULL, 123, 'Lanjut Studi', 'Sesuai', '7 - 11 bulan', 'Rumah Sakit', '234', '2 - 3,5 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(31, 1, NULL, 'Keperawatan Tegal Program Diploma Tiga', NULL, '123', 123, 'Laki-laki', '123', '123', '123', '', NULL, 123, 'Lanjut Studi', 'Sesuai', '7 - 11 bulan', 'Rumah Sakit', '234', '2 - 3,5 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(32, 1, NULL, 'Kebidanan Magelang  Program Sarjana Terapan', NULL, '123', 123, 'Perempuan', '123', '123', '123', '', NULL, 123, 'Bekerja', 'Tidak Sesuai', 'Setelah lulus < 3 bulan', 'Klinik', '123', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(33, 1, NULL, 'Kebidanan Magelang  Program Sarjana Terapan', NULL, '123', 123, 'Perempuan', '123', '123', '123', '', NULL, 123, 'Bekerja', 'Tidak Sesuai', 'Setelah lulus < 3 bulan', 'Klinik', '123', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(34, 1, NULL, 'Kebidanan Magelang  Program Sarjana Terapan', NULL, '123', 123, 'Perempuan', '123', '123', '123', '', NULL, 123, 'Bekerja', 'Tidak Sesuai', 'Setelah lulus < 3 bulan', 'Klinik', '123', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(35, 1, NULL, 'Kebidanan Magelang  Program Sarjana Terapan', NULL, '123', 123, 'Perempuan', '123', '123', '123', '', NULL, 123, 'Bekerja', 'Tidak Sesuai', 'Setelah lulus < 3 bulan', 'Klinik', '123', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(36, 1, NULL, 'Kebidanan Magelang  Program Sarjana Terapan', NULL, 'res', 123, 'Perempuan', '123', '123', '123', '', NULL, 123, 'Bekerja', 'Tidak Sesuai', 'Setelah lulus < 3 bulan', 'Klinik', '123', '< 2 juta', 'Relasi dosen, orang tua, saudara,teman/lainnya', 'Beasiswa', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `prodi` varchar(255) DEFAULT NULL,
  `prodi2` varchar(255) DEFAULT NULL,
  `prodi3` varchar(255) DEFAULT NULL,
  `prodi4` varchar(255) DEFAULT NULL,
  `prodi5` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `p22` int(11) DEFAULT NULL,
  `p23` int(11) DEFAULT NULL,
  `p24` int(11) DEFAULT NULL,
  `p25` int(11) DEFAULT NULL,
  `p26` int(11) DEFAULT NULL,
  `p27` int(11) DEFAULT NULL,
  `p28` int(11) DEFAULT NULL,
  `p29` int(11) DEFAULT NULL,
  `p30` int(11) DEFAULT NULL,
  `p31` int(11) DEFAULT NULL,
  `p32` int(11) DEFAULT NULL,
  `p33` int(11) DEFAULT NULL,
  `p34` int(11) DEFAULT NULL,
  `p35` int(11) DEFAULT NULL,
  `p36` int(11) DEFAULT NULL,
  `p37` int(11) DEFAULT NULL,
  `p38` int(11) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`dosen_id`, `status`, `email`, `nama`, `nomor_telepon`, `alamat`, `usia`, `nip`, `jeniskelamin`, `saranmasukkan`, `password`, `prodi`, `prodi2`, `prodi3`, `prodi4`, `prodi5`, `role`, `no_responden`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`, `p25`, `p26`, `p27`, `p28`, `p29`, `p30`, `p31`, `p32`, `p33`, `p34`, `p35`, `p36`, `p37`, `p38`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`) VALUES
(1, 1, 'dosen@gmail.com', 'dosen', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Keperawatan Semarang Program Diploma Tiga', 'Keperawatan Purwokerto Program Diploma Tiga', NULL, NULL, NULL, 'dosen', 1, 4, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, NULL, 'oo', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$05jtPSXLf.9M3J2VMzm//uoqybEFUfT6rGpvDQDbF/n8LdQZRJLFK', 'Kebidanan Semarang Program Diploma Tiga', 'Kebidanan Purwokerto Program Diploma Tiga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, 'pp', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$.X/kQinACv1iFfCB9Z7Xw.Jv8.dPkFhlCZEUJKFLL1EuA50AXh1My', 'Gizi Program Diploma Tiga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'sukses@dosen.com', 'sukses', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$NjDkMTU7yO2d727xXwZvcOfy6dq7naBZE9FW94xOCs5WvijOfNOD6', 'Radiologi Semarang Program Diploma Tiga', NULL, NULL, NULL, NULL, 'dosen', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 'dosen2@gmail.com', 'berhasil', '08124658274', 'Jalan Baru', 1, '12', 'Laki-laki', 'a', '$2y$12$A3ZTDaf.PmAaCa/VCt0UZOGfkB2SbWVHuGsQLss4gkr9YrsazWkMW', 'Radiologi Purwokerto  Program Diploma Tiga', NULL, NULL, NULL, NULL, 'dosen', 8, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1, 3, 1, 2, 4, 2, 2, 2, 2),
(6, 1, 'dosen@tes.com', 'A', '2', 'D', 2, '2', 'Laki-laki', NULL, '$2y$12$kB/x8PkrRPEPe03DxawITeHjufPlsibodUbct.sr8ti8HltAYcGvy', 'Kesehatan Gigi Program Diploma Tiga', NULL, NULL, NULL, 'Teknologi Laboratorium Medis Program Sarjana Terapan', 'dosen', 9, 2, 3, 2, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 3, 4, 4, 3, 3, 4),
(7, 1, NULL, 'wwwwwwww', '123', '123', 21, '123', 'Perempuan', NULL, '', 'Kebidanan Blora Program Diploma Tiga', NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(8, 1, NULL, 'qqqqqqqqqqqqqqqqqqqq', '123', '123', 21, '123', 'Perempuan', NULL, '', 'Kebidanan Blora Program Diploma Tiga', NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(9, 1, NULL, 'qqqqqqqqqqqqqqqqqqqq', '123', '123', 21, '123', 'Perempuan', NULL, '', 'Kebidanan Blora Program Diploma Tiga', 'Kebidanan Semarang Program Diploma Tiga', 'Imaging Diagnostik Program Magister Terapan', 'Kebidanan Program Magister Terapan', 'Kebidanan Program Magister Terapan', NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `p22` int(11) DEFAULT NULL,
  `p23` int(11) DEFAULT NULL,
  `p24` int(11) DEFAULT NULL,
  `p25` int(11) DEFAULT NULL,
  `p26` int(11) DEFAULT NULL,
  `p27` int(11) DEFAULT NULL,
  `p28` int(11) DEFAULT NULL,
  `p29` int(11) DEFAULT NULL,
  `p30` int(11) DEFAULT NULL,
  `p31` int(11) DEFAULT NULL,
  `p32` int(11) DEFAULT NULL,
  `p33` int(11) DEFAULT NULL,
  `p34` int(11) DEFAULT NULL,
  `p35` int(11) DEFAULT NULL,
  `p36` int(11) DEFAULT NULL,
  `p37` int(11) DEFAULT NULL,
  `p38` int(11) DEFAULT NULL,
  `p39` int(11) DEFAULT NULL,
  `p40` int(11) DEFAULT NULL,
  `p41` int(11) DEFAULT NULL,
  `p42` int(11) DEFAULT NULL,
  `p43` int(11) DEFAULT NULL,
  `p44` int(11) DEFAULT NULL,
  `p45` int(11) DEFAULT NULL,
  `p46` int(11) DEFAULT NULL,
  `p47` int(11) DEFAULT NULL,
  `p48` int(11) DEFAULT NULL,
  `p49` int(11) DEFAULT NULL,
  `p50` int(11) DEFAULT NULL,
  `p51` int(11) DEFAULT NULL,
  `p52` int(11) DEFAULT NULL,
  `p53` int(11) DEFAULT NULL,
  `p54` int(11) DEFAULT NULL,
  `p55` int(11) DEFAULT NULL,
  `p56` int(11) DEFAULT NULL,
  `p57` int(11) DEFAULT NULL,
  `p58` int(11) DEFAULT NULL,
  `p59` int(11) DEFAULT NULL,
  `p60` int(11) DEFAULT NULL,
  `p61` int(11) DEFAULT NULL,
  `p62` int(11) DEFAULT NULL,
  `p63` int(11) DEFAULT NULL,
  `p64` int(11) DEFAULT NULL,
  `p65` int(11) DEFAULT NULL,
  `p66` int(11) DEFAULT NULL,
  `p67` int(11) DEFAULT NULL,
  `p68` int(11) DEFAULT NULL,
  `p69` int(11) DEFAULT NULL,
  `p70` int(11) DEFAULT NULL,
  `p71` int(11) DEFAULT NULL,
  `p72` int(11) DEFAULT NULL,
  `p73` int(11) DEFAULT NULL,
  `p74` int(11) DEFAULT NULL,
  `p75` int(11) DEFAULT NULL,
  `p76` int(11) DEFAULT NULL,
  `p77` int(11) DEFAULT NULL,
  `p78` int(11) DEFAULT NULL,
  `p79` int(11) DEFAULT NULL,
  `p80` int(11) DEFAULT NULL,
  `p81` int(11) DEFAULT NULL,
  `p82` int(11) DEFAULT NULL,
  `p83` int(11) DEFAULT NULL,
  `p84` int(11) DEFAULT NULL,
  `p85` int(11) DEFAULT NULL,
  `p86` int(11) DEFAULT NULL,
  `p87` int(11) DEFAULT NULL,
  `p88` int(11) DEFAULT NULL,
  `p89` int(11) DEFAULT NULL,
  `p90` int(11) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `status`, `email`, `nama`, `password`, `nim`, `usia`, `alamat`, `nomor_telepon`, `jeniskelamin`, `saranmasukkan`, `prodi`, `role`, `no_responden`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`, `p25`, `p26`, `p27`, `p28`, `p29`, `p30`, `p31`, `p32`, `p33`, `p34`, `p35`, `p36`, `p37`, `p38`, `p39`, `p40`, `p41`, `p42`, `p43`, `p44`, `p45`, `p46`, `p47`, `p48`, `p49`, `p50`, `p51`, `p52`, `p53`, `p54`, `p55`, `p56`, `p57`, `p58`, `p59`, `p60`, `p61`, `p62`, `p63`, `p64`, `p65`, `p66`, `p67`, `p68`, `p69`, `p70`, `p71`, `p72`, `p73`, `p74`, `p75`, `p76`, `p77`, `p78`, `p79`, `p80`, `p81`, `p82`, `p83`, `p84`, `p85`, `p86`, `p87`, `p88`, `p89`, `p90`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`) VALUES
(1, 1, 'dev@gmail.com', 'mahasiswa', 'a', NULL, NULL, NULL, NULL, NULL, NULL, 'Keperawatan Semarang Program Diploma Tiga', 'mahasiswa', 1, 1, 4, 4, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'mahasss', '$2y$12$pnux.0pbGEjoU3cK3zaMA.CtsymLkjWBUOEX.pTKPQRuc8/iiZJwO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'mh@s.com', NULL, '$2y$12$5V7ZKYll3fBX4lk8Sup3zO2T7Z8q71K37yt1RfqsMHV9/5MNFfPoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mahasiswa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'sukses@mahasiswa.com', 'sukses', '$2y$12$tyEliaxW/.8mMU2WLO2f4uz1PHOwNaebawudgYCWAPHas5ddNF3y2', NULL, NULL, NULL, NULL, NULL, NULL, 'aa', 'mahasiswa', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 'mahasiswa2@gmail.com', 'berhasil', '$2y$12$5kqf/VfmItQmAFdmqO3B.ua2ko0E6CH/hToSMX1M5SFXDCCokQ1SO', '12', 12, 'berhasil', '081234679912', 'Laki-laki', 'berhasil', 'D III Kebidanan Blora', 'mahasiswa', 5, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(6, NULL, 'mahasiswa@tes.com', NULL, '$2y$12$ytGRMEvXzDmduDWMx2JkLeSsuPyc/KPl0HQN2nDUqVb6Zm2PZvJXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mahasiswa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, NULL, 'rrrrrrrrrrrrrrrrrrrrrr', NULL, '123', 123, '123', '123', 'Laki-laki', '123', 'Gizi dan Dietetika Program Sarjana Terapan', NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `masyarakat_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`masyarakat_id`, `status`, `email`, `nama`, `nomor_telepon`, `alamat`, `pekerjaan`, `saranmasukkan`, `jeniskelamin`, `usia`, `role`, `no_responden`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`) VALUES
(1, 1, NULL, 'Masyarakat', NULL, NULL, NULL, NULL, NULL, 20, 'masyarakat', 1, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(2, 1, NULL, 'Masyarakat2', NULL, NULL, NULL, NULL, NULL, 21, 'masyarakat', 2, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(3, NULL, NULL, 'masyyarakat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, 'Bisa', NULL, NULL, NULL, NULL, NULL, 21, 'masyarakat', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, NULL, '05102014', NULL, NULL, NULL, NULL, NULL, 1, 'masyarakat', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, NULL, 'berhasil', '081234679912', 'berhasil', NULL, 'berhasil', 'Laki-laki', 21, 'masyarakat', 5, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(7, 1, 'dd', 'berhasil', '2', 'berhasil', NULL, 'e', 'Laki-laki', 22, 'masyarakat', 6, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(8, 1, 'berhasil', 'berhasil', '12', 'berhasil', 'berhasil', 'berhasil', 'Laki-laki', 2, 'masyarakat', 7, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(9, 1, 'berhasil1', 'Berhasil', '12312', 'Jalan. Prof. Sudarto No.13, Te', 'berhasil', NULL, 'Laki-laki', 33, 'masyarakat', 8, 4, 3, 3, 3, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `mitra_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nomor_telepon` int(11) DEFAULT NULL,
  `bidang_kerjasama` varchar(255) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `rencana` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `tanda_tangan` varchar(255) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`mitra_id`, `status`, `no_responden`, `nama`, `password`, `role`, `jabatan`, `nama_instansi`, `alamat`, `email`, `nomor_telepon`, `bidang_kerjasama`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `rencana`, `kota`, `tanggal`, `saranmasukkan`, `tanda_tangan`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`) VALUES
(1, 1, 1, 'mitra', 'a', 'mitra', 'Manager', 'Perusahaan', 'Jalan', 'dev@gmail.com', 1, 'Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Kerjasama akan dilanjutkan (Cooperation will be continue)', 'a', NULL, NULL, 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'mitrrra', '$2y$12$2KTvSmwTYDEur3dUV36ZxOkcP3DFNM/N8FvJF8kU9o.GdbAUpavwW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, 'mitraa', '$2y$12$SDBaMa9EnsSGqQpGwYjf4eT5DllFHrNX7fiAIK.WHUxm/Wt6n3FNi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, '$2y$12$cPinMEyngusJjwdO15Eh9.PJf43wPG6QrW/tvKw537NTOoH64Tlf.', 'mitra', NULL, NULL, NULL, 'mi@t.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 5, 'sukses', '$2y$12$2B2DRByPr7MrZlWzvGmaLO3W6/5CsQbp134v4i/m6YB50hQu6DM82', 'mitra', 'bb', 'bb', 'bb', 'bb', 12, 'Pengabdian Kepada Masyarakat (Community Service Program)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kerjasama akan dilanjutkan (Cooperation will be continue)', '12', NULL, NULL, 'b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 6, 'rumah sakit', '$2y$12$6VFaRtN2Z3ddJA23UOnGJORKLEZyvcpHuzGol2NaEUHA0FhxQfP2S', 'mitra', 'manajer', 'rumah sakit', 'alamat', 'mitra2@gmail.com', 123, 'Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'Kerjasama akan dilanjutkan (Cooperation will be continue)', 'Semarang', '2024-10-06', 'berhasil', 'ttd', 1, 1, 1, 3, 1, 1, 4, 1, 1),
(7, NULL, NULL, NULL, '$2y$12$ZFAPKrKimBUvGwUSQe4j7eXxpd7EUKSDmNAKgxGn93vJzrJ2E/C0m', 'mitra', NULL, NULL, NULL, 'mitra@tes.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, '$2y$12$tSyR5Qe0VeSMfhmb9/TLeedGQVKGqXbBcKsUw/5S5U21ieVFFGHQ2', 'mitra', NULL, NULL, NULL, 'mitra@tes.comm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 7, 's', NULL, NULL, 's', 's', 's', NULL, 2, 'Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 'Kerjasama akan dihentikan (Cooperation will be cease)', 's', '2024-10-09', NULL, NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(10, 1, 8, 'w', NULL, NULL, 's', 's', 's', NULL, 2, 'Pendidikan (Praktek Klinik / PBL / PKL / Magang) / ( Education / Internship)', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 'Kerjasama akan dihentikan (Cooperation will be cease)', 's', '2024-10-09', NULL, NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(11, 1, 9, 's', NULL, NULL, 's', 's', 's', 's', 2, 'Pendayagunaan Lulusan (Graduate\'s Absorption)', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 'Perjanjian Kerjasama perlu dibuat adendum (The Cooperation Agreement needs to be added)', 'x', '2024-10-25', NULL, NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'suleptin@gmail.com', 'WJzvwF9OGgySJd2A4KApsnxAXGqREDhMwnVYTAOnE2A3i12fwRe5QmDopPim', '2024-10-04 10:20:48'),
(2, 'suleptin@gmail.com', 'aOkNLO0O82v8M8p2kfVUuaE5a5RLP581V9gVxgT4fd4f4tsSXlyK8cjyRuCd', '2024-10-04 10:21:19'),
(3, 'suleptin@gmail.com', 'HS1mQk8LPiDJLFTRFQ53hlfYFAqqnrfH4VjFIyIW0DE4F3z25994hN7QkMSF', '2024-10-04 10:26:14'),
(4, 'suleptin@gmail.com', '3G1cmAssduqcGbGoAHdMtnwgNSKyYkdQNsiOYW1qkuOG9zCMA3FrdRAKafBo', '2024-10-04 10:31:18'),
(5, 'suleptin@gmail.com', 'xUbh3n3kCzklQjASuoHqyM9Wr3v2HL2tuuJDawI1KQXWG9r6Bd6MJNY4o4uC', '2024-10-04 10:31:41'),
(6, 'suleptin@gmail.com', 'oBq5pt7UIs0UAJeV9e9LJnPhtltHqoMRiSe2nswQZ3lc3a8p2btzvE8j9vzW', '2024-10-04 10:33:29'),
(7, 'suleptin@gmail.com', '5WPXjralZjjwtN22zJlObo3HYcbMUzESrRkP1DkEYIlRIbziqbwOmYkrWQHU', '2024-10-04 10:39:02'),
(8, 'suleptin@gmail.com', 'bsTXyFdOEeSY8jNCYJOp4bXPZ8cP11R6VcqBzyRUuQ9aXpDPgrIodLGB14sb', '2024-10-04 10:39:37'),
(9, 'suleptin@gmail.com', '2SxZNtXR0Tg4AdspVTAEuADLL9u3IN9G1WKniZHCBqAF2WxYm9gztdAByQZj', '2024-10-04 10:44:42'),
(10, 'suleptin@gmail.com', 'dVMcYt7R1CykMvk27FXx1QPO3BqzkYi1O1zapc4ulcDhGsOHA2HQq75t6E5D', '2024-10-04 10:56:49'),
(11, 'suleptin@gmail.com', 'jGWR2gFO4nZBPoSZjA5jkOzlBeaEqEp4CVKnWOt4z2ANfCQYM4zwxnC7MZYd', '2024-10-04 10:58:10'),
(12, 'suleptin@gmail.com', 'P08W5RGaBoaQE3FucVqdCVtinzsmgiE8euaQU5TGrmdYVmcwg4DyVTWqhbnZ', '2024-10-04 10:58:51'),
(13, 'suleptin@gmail.com', 'd8buqsFJ1egQOnMbje33BHWCiKxYHWkMBhs0P8Tlxu8GkwTTXqr4ageMMAXs', '2024-10-04 10:59:45'),
(14, 'suleptin@gmail.com', '3jAp3TjtIYkurAYf5N86rFRWTEFW2HBGpFAjymg0ru8mDQs7Z8ti0C0ItVSr', '2024-10-04 11:00:22'),
(15, 'suleptin@gmail.com', '5P8AmwLtc3ZqNt6qEEEe77Z5X8fpyiGS7TPF7Lye99pCTQO9g6W487TEEg2E', '2024-10-04 11:02:00'),
(16, 'suleptin@gmail.com', 'Mi3uFadMmxTQHWToIHB6zBBhOC9ppQH0LFeURIN3W3hckHRGvY9jejqUjUui', '2024-10-04 11:02:33'),
(17, 'suleptin@gmail.com', 'MMT1DKp4x5SxW4yXONYCXlv8kgItvb5AY05nxTGYtp6PZK4zg5Y2I4lMoQaI', '2024-10-04 11:11:41'),
(18, 'suleptin@gmail.com', 'B37I61X0uO68g3Zs0GZHrjOcIItrxUAmf4SMnV7RALcqNkTjdqb1ciQncNVL', '2024-10-04 11:15:15'),
(19, 'suleptin@gmail.com', 'W23nZHn4J4Pr8FoFV5f8r0g4res9gc4wtpNe5q6gk2z4m5aQUizz0eBd273I', '2024-10-04 11:15:40'),
(20, 'suleptin@gmail.com', '1eNy8sTwJhAOYLSAxpaIeQF8b2diIrlwMgOVi8XufMbj2ZqlGNKX8lHoU7dL', '2024-10-04 11:17:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna_lulusan`
--

CREATE TABLE `pengguna_lulusan` (
  `penggunalulusan_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `nama_identitaspenilai` varchar(255) DEFAULT NULL,
  `alamat_identitaspenilai` varchar(255) DEFAULT NULL,
  `usia_identitaspenilai` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jeniskelamin_identitaspenilai` varchar(255) DEFAULT NULL,
  `instansi_identitaspenilai` varchar(255) DEFAULT NULL,
  `jabatan_identitaspenilai` varchar(255) DEFAULT NULL,
  `kontak_identitaspenilai` varchar(255) DEFAULT NULL,
  `nama_identitaslulusan` varchar(255) DEFAULT NULL,
  `jeniskelamin_identitaslulusan` varchar(255) DEFAULT NULL,
  `jabatan_identitaslulusan` varchar(255) DEFAULT NULL,
  `lamabekerjadiinstansisaatini` int(11) DEFAULT NULL,
  `lamabekerjadenganlulusan` int(11) DEFAULT NULL,
  `latarbelakang_identitaslulusan` varchar(255) DEFAULT NULL,
  `lamabekerja_identitaslulusan` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna_lulusan`
--

INSERT INTO `pengguna_lulusan` (`penggunalulusan_id`, `status`, `email`, `role`, `nama_identitaspenilai`, `alamat_identitaspenilai`, `usia_identitaspenilai`, `password`, `jeniskelamin_identitaspenilai`, `instansi_identitaspenilai`, `jabatan_identitaspenilai`, `kontak_identitaspenilai`, `nama_identitaslulusan`, `jeniskelamin_identitaslulusan`, `jabatan_identitaslulusan`, `lamabekerjadiinstansisaatini`, `lamabekerjadenganlulusan`, `latarbelakang_identitaslulusan`, `lamabekerja_identitaslulusan`, `saranmasukkan`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`) VALUES
(1, 1, 'penggunalulusan@gmail.com', 'pengguna lulusan', 'pengguna lulusan', NULL, NULL, 'a', 'Laki-laki', 'Instansi', 'Manager', '0', 'Lulusan', 'Perempuan', 'Pegawai', NULL, NULL, 'Profesi', '1', 'benar', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, 'penggunalulusaaan', NULL, NULL, '$2y$12$1jeGmNGtg/5cyc/2P6ckC.jHUO.ewRlKsnR7HDBD.O/6S1TeSTwzm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'pl@p.com', 'pengguna lulusan', NULL, NULL, NULL, '$2y$12$vcGhcwJavfadQJYvNgijeOFdjhWTrvJ5VFRzkmrNA7Vhu6UN.ki9K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'plp@l.com', 'pengguna lulusan', 'sukses', NULL, NULL, '$2y$12$hqrOljNIzuSwTzP/dTO9XODAO7Dp2zFJOJeZKq1t8bp8U/LlHK18C', 'Laki-laki', 'd', 'd', '12', NULL, NULL, NULL, NULL, NULL, 'Profesi', '12', 'ds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 'pengguna@gmail.com', 'pengguna lulusan', NULL, NULL, NULL, '$2y$12$HEmZsI3kETwu2o7Bvw1R0OpWHv7X8nO5V01cySc2tD6RCn4AWqrTC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 'pengguna2@gmail.com', 'pengguna lulusan', 'tespenilai', 'penilai', 12, '$2y$12$jSBkXvDFrST//ait1B1D1Os9lllSJ5sU85x6t715w0CZNwyUIhXvS', 'Laki-laki', 'tespenilai', 'tespenilai', '123', 'dinilai', 'Laki-laki', 'tesdinilai', 1, 3, 'Profesi', '2', 'tesdinilai', 4, 4, 4, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(7, NULL, 'pengguna@tes.com', 'pengguna lulusan', NULL, NULL, NULL, '$2y$12$z4lnD6kq0zsiVvHjYBx8dut8MMtw0ATVCtdjHpHB0SV.YxwGGsPQm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, NULL, NULL, '123', '123', 123, NULL, 'Laki-laki', '123', '123', '123', '123', 'Laki-laki', '123', 123, 123, 'S2', '123', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4),
(9, 1, NULL, NULL, '44444', '123', 123, NULL, 'Laki-laki', '123', '123', '123', '123', 'Laki-laki', '123', 123, 123, 'S2', '123', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4),
(10, 1, NULL, NULL, 'ciga', '123', 123, NULL, 'Laki-laki', '123', '123', '123', '123', 'Laki-laki', '123', 123, 123, 'S2', '123', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4),
(11, 1, NULL, NULL, 'masa', '123', 123, NULL, 'Laki-laki', '123', '123', '123', '123', 'Laki-laki', '123', 123, 123, 'S2', '123', NULL, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_alumni`
--

CREATE TABLE `pertanyaan_alumni` (
  `pertanyaan_id` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_alumni`
--

INSERT INTO `pertanyaan_alumni` (`pertanyaan_id`, `pertanyaan`) VALUES
(1, 'Nama'),
(2, 'Tahun Lulus'),
(3, 'Pekerjaan Lulusan'),
(4, 'Kesesuaian pekerjaan dengan Prodi'),
(5, 'Waktu memperoleh pekerjaan pertama'),
(6, 'Instansi tempat bekerja'),
(7, 'Tempat Kerja'),
(8, 'Tuliskan tempat kerja anda:'),
(9, 'Penghasilan'),
(10, 'Cara mendapatkan pekerjaan'),
(11, 'Jika Studi lanjut'),
(12, 'Seberapa puaskah anda terhadap pendidikan yang telah anda tempuh di Poltekkes Semarang, menunjang  pekerjaan anda sekarang'),
(13, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang dalam meningkatkan kemampuan anda untuk berpikir secara komprehensif dan inter / multi disipliner'),
(14, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang dalam meningkatkan kemampuan anda untuk bekerjasama dalam tim.'),
(15, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang dalam meningkatkan kemampuan anda untuk memecahkan masalah (problem solving) dalam pekerjaan.'),
(16, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang dalam meningkatkan kemampuan anda untuk berkomunikasi dalam pekerjaan.				'),
(17, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang dalam meningkatkan kemampuan anda untuk menguasai bahasa asing dalam pekerjaan.'),
(18, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang dalam meningkatkankesempatan untuk membangun jejaring (network) yang bermanfaat untuk pekerjaan saya saat ini.'),
(19, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang yang berdampak nyata bagi karir pekerjaan anda sekarang'),
(20, 'Seberapa puaskah anda terhadap pendidikan di Poltekkes Semarang yang memudahkan anda mendapatkan pekerjaan anda sekarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_dosen`
--

CREATE TABLE `pertanyaan_dosen` (
  `pertanyaan_id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_dosen`
--

INSERT INTO `pertanyaan_dosen` (`pertanyaan_id`, `kategori`, `pertanyaan`) VALUES
(1, 'Pengembangan Kompetensi', 'Pemberian kesempatan studi lanjut '),
(2, 'Pengembangan Kompetensi', 'Keikutsertaan dalam kursus/pelatihan'),
(3, 'Pengembangan Kompetensi', 'Keikutsertaan dalam seminar/workshop'),
(4, 'Pengembangan Kompetensi', 'Keikutsertaan dalam magang'),
(5, 'Pengembangan Kompetensi', 'Pemberian  kesempatan studi banding dalam negeri'),
(6, 'Pengembangan Kompetensi', 'Pemberian kesempatan studi banding dalam dan atau luar negeri'),
(7, 'Pengembangan Karir/Jabatan', 'Pelayanan kenaikan pangkat dan jabatan fungsional'),
(8, 'Pengembangan Karir/Jabatan', 'Pemberian kesempatan menduduki jabatan'),
(9, 'Pengembangan Karir/Jabatan', 'Pemberian penghargaan atas prestasi kerja yang baik'),
(10, 'Penelitian dan Karya Ilmiah', 'Informasi kegiatan penelitian'),
(11, 'Penelitian dan Karya Ilmiah', 'Ketersediaan MoU Dalam Negeri untuk melakukan kegiatan penelitian'),
(12, 'Penelitian dan Karya Ilmiah', 'Ketersediaan MoU Luar Negeri untuk melakukan kegiatan penelitian'),
(13, 'Penelitian dan Karya Ilmiah', 'Pemerataan distribusi penelitian berdasarkan jabatan fungsional dosen dan sesuai bidang keilmuan agar inline dengan roadmap penelitian dosen'),
(14, 'Penelitian dan Karya Ilmiah', 'Kesempatan menjadi reviewer penelitian'),
(15, 'Penelitian dan Karya Ilmiah', 'Kesempatan publikasi karya ilmiah pada jurnal ilmiah bereputasi'),
(16, 'Penelitian dan Karya Ilmiah', 'Pemberian penghargaan untuk artikel yg  terpublikasi dalam jurnal ilmiah'),
(17, 'Penelitian dan Karya Ilmiah', 'Fasilitas perolehan Hak Paten hasil penelitian'),
(18, 'Penelitian dan Karya Ilmiah', 'Pemberian penghargaan bagi dosen yang menghasilkan hak paten'),
(19, 'Pengabdian kepada Masyarakat', 'Informasi kegiatan pengabdian kepada masyarakat'),
(20, 'Pengabdian kepada Masyarakat', 'Kemerataan distribusi pengabdian kepada masyarakat berdasarkan jabatan fungsional dosen'),
(21, 'Pengabdian kepada Masyarakat', 'Ketersediaan fasilitas Kerjasama dalam dan luar negeri untuk kegiatan pengabdian kepada masyarakat'),
(22, 'Pengabdian kepada Masyarakat', 'Kesempatan publikasi hasil pengabdian kepada masyarakat pada jurnal ilmiah  '),
(23, 'Pengabdian kepada Masyarakat', 'Pemberian penghargaan untuk artikel yg  terpublikasi dalam jurnal ilmiah'),
(24, 'Tugas Tambahan', 'Perolehan informasi tentang tugas tambahan (kepanitiaan, narasumber, keanggotaan suatu unit, dll)'),
(25, 'Tugas Tambahan', 'Pemberian kesempatan dalam tugas tambahan'),
(26, 'Tugas Tambahan', 'Pemerataan dalam mendapatkan tugas tambahan'),
(27, 'Tugas Tambahan', 'Pemberian kesempatan mewakili jurusan/poltekkes ditingkat nasional/internasional '),
(28, 'Tugas Tambahan', 'Pemberian kesempatan mengajar diluar Poltekkes'),
(29, 'Sarana Prasarana', 'Tersedia sarana beribadah'),
(30, 'Sarana Prasarana', 'Tersedia sarana prasarana berolahraga'),
(31, 'Sarana Prasarana', 'Tersedia sarana prasarana berkesenian'),
(32, 'Sarana Prasarana', 'Pemberian fasilitas pendukung untuk rekreasi'),
(33, 'Sarana Prasarana', 'Tersedianya layanan pemeriksaan Kesehatan di Klinik Pratama Poltekkes Semarang'),
(34, 'Sarana Prasarana', 'Tersedia sarana pendukung pengembangan diri, pencapaian prestasi di bidang OR, seni, religi, dsb'),
(35, 'Sarana Prasarana', 'Tersedia dan berfungsi baik sarana teknologi informasi dan komunikasi'),
(36, 'Sarana Prasarana', 'Tersedia dan berfungsi baik sarana pemeliharaan keselamatan kerja dan keamanan'),
(37, 'Keuangan', 'Ketepatan waktu pembayaran gaji, honor, dan tunjangan'),
(38, 'Keuangan', 'Kesesuaian besaran gaji, honor dan tunjangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_mahasiswa`
--

CREATE TABLE `pertanyaan_mahasiswa` (
  `pertanyaan_id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `aspek` varchar(255) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_mahasiswa`
--

INSERT INTO `pertanyaan_mahasiswa` (`pertanyaan_id`, `kategori`, `aspek`, `pertanyaan`) VALUES
(1, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan registrasi akademik jelas informasinya, ringkas prosedurnya, tersedia administrasi pendukungnya.'),
(2, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan pengisian KRS '),
(3, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Prosedur pelayanan administrasi pembelajaran tersedia dan diinformasikan dengan baik'),
(4, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan terhadap pelaksanaan perkuliahan (penjadwalan, pembagian ruang, Alat Bantu Belajar Mengajar)  '),
(5, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Media belajar  tersedia, memadai dan berfungsi baik.'),
(6, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan terhadap pelaksanaan ujian tengah dan akhir semester (dan atau Ujian Akhir) '),
(7, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan pengumuman nilai ujian, dan informasi pelaksanaan ujian ulang/remidial'),
(8, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan penerbitan Hasil Studi (KHS dan atau transkrip)'),
(9, 'Kepuasan Mahasiswa terhadap Layanan Pendidikan', NULL, 'Layanan terhadap pelaksanaan ujian tengah dan akhir semester (informasi kisi-kisi soal, waktu pelaksanaan, ketersediaan soal ujian tepat waktu, metode ujian, dan Alat Bantu Evaluasi Pembelajaran)'),
(10, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan sarana pembelajaran yang tersedia di ruang kuliah dan laboratorium'),
(11, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan ruang diskusi mahasiswa'),
(12, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan sarana pembelajaran yang tersedia di ruang laboratorium'),
(13, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap  ketersediaan fasilitas yang tersedia di Perpustakaan'),
(14, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan sarana ibadah, lahan parkir, kantin dan toilet untuk mahasiswa'),
(15, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan sarana berolahraga bagi mahasiswa'),
(16, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan sarana Sistim Teknologi Informasi bagi mahasiswa'),
(17, 'Kepuasan Mahasiswa thd Kecukupan Sarana Prasarana', NULL, 'Seberapa puas anda terhadap ketersediaan sarana prasarana kegiatan UKM bagi mahasiswa'),
(18, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana, alat dan bahan praktikum yang tersedia di ruang kulian'),
(19, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana yang tersedia di ruang diskusi'),
(20, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana, alat dan bahan praktikum yang tersedia di Laboratorium'),
(21, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana yang tersedia di Perpustakaan'),
(22, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana yang tersedia di sarana ibadah, lahan parkir, kantin dan toilet'),
(23, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana yang tersedia Sistim Teknologi dan Informasi bagi mahasiswa'),
(24, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana yang tersedia kegiatan UKM'),
(25, 'Kepuasan Mahasiswa thd Aksesibilitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap kemudahan penggunaan sarana yang tersedia sarana Olahraga'),
(26, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan ruang kuliah'),
(27, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan Laboratorium'),
(28, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan di ruang diskusi'),
(29, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan Perpustakaan'),
(30, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhada mutu Sistem Teknologi dan Informasi termasuk Internet '),
(31, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan sarana ibadah, lahan parkir, kantin dan toilet.'),
(32, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan ruang kegiatan UKM'),
(33, 'Kepuasan Mahasiswa thd Kualitas Sarana Prasarana', NULL, 'Seberapa puas anda terhadap mutu, kebersihan, penataan dan kenyamanan Sarana Olah raga'),
(34, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap ketepatan waktu Dosen dalam memberikan perkuliahan'),
(35, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap kejelasan Dosen dalam menyampaikan rencana perkuliahan, prosedur dan tata tertib perkuliahan, serta evaluasi'),
(36, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap keterbukaan Dosen dalam memberikan bahan ajar, kisi-kisi soal ujian, dan hasil ujian mahasiswa'),
(37, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap keterbukaan Dosen dalam memberikan umpan balik kepada mahasiswa selama proses pembelajaran'),
(38, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kesediaan Dosen membantu kesulitan mahasiswa dalam proses pembelajaran'),
(39, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kecepatan Dosen dalam menanggapi setiap pertanyaan/permasalahan yang disampaikan mahasiswa'),
(40, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan Dosen dalam menguasai dan memberikan materi perkuliahan'),
(41, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan Dosen dalam menggunakan media pembelajaran'),
(42, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan Dosen dalam menggunakan metode pembelajaran'),
(43, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kesediaan dosen membantu mahasiswa yang menghadapi masalah di bidang akademik'),
(44, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kemudahan dosen untuk dihubungi melalui telepon, email, dan sebagainya'),
(45, 'Kepuasan Mahasiswa terhadap Dosen', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap keterbukaan dan sikap kooperatif dosen dengan mahasiswa'),
(46, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap ketepatan waktu Pustakawan dalam memberikan layanan di Perpustakaan'),
(47, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap kejelasan Pustakawan dalam menyampaikan informasi terkait layanan perpustakaan'),
(48, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap ketepatan waktu Laboran dalam memberikan layanan di Laboratorium'),
(49, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap kejelasan Laboran dalam menyampaikan informasi terkait layanan Laboratorium'),
(50, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap ketepatan waktu Petugas Administrasi dalam memberikan layanan administrasi program studi'),
(51, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap kejelasan petugas administrasi dalam menyampaikan informasi terkait layanan administrasi program studi\r\n\r\n'),
(52, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kesediaan Pustakawan membantu kesulitan mahasiswa dalam layanan Perpustakaan'),
(53, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kecepatan Pustakawan dalam menanggapi setiap pertanyaan/permasalahan yang disampaikan mahasiswa terkait layanan perpustakaan'),
(54, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kesediaan Laboran membantu kesulitan mahasiswa dalam proses pembelajaran di laboratorium'),
(55, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kecepatan Laboran dalam menanggapi setiap pertanyaan/permasalahan yang disampaikan mahasiswa terkait kegiatan di laboratorium'),
(56, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kesediaan Tenaga Administrasi membantu kesulitan mahasiswa dalam mendapatkan layanan administrasi '),
(57, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kecepatan Tenaga Administrasi dalam menanggapi setiap pertanyaan/permasalahan yang disampaikan mahasiswa '),
(58, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan profesional Pustakawan dalam memberikan layanan perpustakaan'),
(59, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan profesional Laboran dalam memberikan layanan laboratorium'),
(60, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan profesional tenaga administrasi dalam memberikan layanan administrasi Pendidikan'),
(61, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kesediaan Pustakawan membantu mahasiswa yang menghadapi masalah di perpustakaan'),
(62, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kemudahan Pustakawan untuk dihubungi melalui telepon, email, dan sebagainya'),
(63, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap keterbukaan dan sikap kooperatif Pustakawan dengan mahasiswa'),
(64, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kesediaan Laboran membantu mahasiswa yang menghadapi masalah di laboratorium'),
(65, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kemudahan Laboran untuk dihubungi melalui telepon, email, dan sebagainya'),
(66, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap keterbukaan dan sikap kooperatif Laboran dengan mahasiswa'),
(67, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kesediaan tenaga administrasi membantu mahasiswa yang menghadapi masalah di bidang administrasi akademik'),
(68, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kemudahan tenaga administrasi untuk dihubungi melalui telepon, email, dan sebagainya'),
(69, 'Kepuasan pada Tenaga Kependidikan', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap keterbukaan dan sikap kooperatif tenaga administrasi dengan mahasiswa'),
(70, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap ketepatan waktu Pengelola di tingkat Prodi dalam memberikan layanan proses pembelajaran kepada mahasiswa'),
(71, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap kejelasan Pengelola di Tingkat Prodi dalam menyampaikan informasi terkait proses pembelajaran kepada mahasiswa'),
(72, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap keterbukaan Pengelola di Tingkat Prodi dalam memberikan layanan proses pembelajaran kepada mahasiswa'),
(73, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap kejelasan Pengelola di Tingkat Direktorat dalam menyampaikan informasi terkait proses pembelajaran kepada mahasiswa'),
(74, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Reliability (Kehandalan)', 'Seberapa puas anda terhadap keterbukaan Pengelola di Tingkat Direktorat dalam memberikan layanan proses pembelajaran kepada mahasiswa'),
(75, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kesediaan Pengelola di tingkat Prodi membantu kesulitan mahasiswa dalam proses pembelajaran '),
(76, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kecepatan Pengelola di tingkat Prodi dalam menanggapi setiap pertanyaan/permasalahan yang disampaikan mahasiswa '),
(77, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kesediaan Pengelola di tingkat Direktorat membantu kesulitan mahasiswa dalam proses pembelajaran '),
(78, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Responsiveness (Daya Tanggap)', 'Seberapa puas anda terhadap kecepatan Pengelola di tingkat Direktorat dalam menanggapi setiap pertanyaan/permasalahan yang disampaikan mahasiswa '),
(79, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan profesional Pengelola di tingkat Prodi dalam memberikan layanan  pendidikan'),
(80, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Assurance (Jaminan)', 'Seberapa puas anda terhadap kemampuan profesional Pengelola di tingkat Direktorat dalam memberikan layanan  pendidikan'),
(81, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kesediaan Pengelola di tingkat Prodi membantu mahasiswa yang menghadapi masalah di bidang akademik'),
(82, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kemudahan Pengelola di tingkat Prodi untuk dihubungi melalui telepon, email, dan sebagainya'),
(83, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap keterbukaan dan sikap kooperatif Pengelola di tingkat Prodi dengan mahasiswa'),
(84, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kesediaan Pengelola di tingkat Direktorat membantu mahasiswa yang menghadapi masalah di bidang akademik'),
(85, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap kemudahan Pengelola di tingkat Direktorat untuk dihubungi melalui telepon, email, dan sebagainya'),
(86, 'Kepuasan Mahasiswa terhadap Pengelola (Manajemen)', 'Aspek Emphaty (pemahaman terhadap kepentingan)', 'Seberapa puas anda terhadap keterbukaan dan sikap kooperatif Pengelola di tingkat Direktorat dengan mahasiswa'),
(87, 'Kepuasan Mahasiswa terhadap Pembiayaan', NULL, 'Besar biaya pendidikan'),
(88, 'Kepuasan Mahasiswa terhadap Pembiayaan', NULL, 'Besar biaya di luar proses belajar mengajar'),
(89, 'Kepuasan Mahasiswa terhadap Pembiayaan', NULL, 'Besar beasiswa mahasiswa GAKIN'),
(90, 'Kepuasan Mahasiswa terhadap Pembiayaan', NULL, 'Besar beasiswa mahasiswa berprestasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_masyarakat`
--

CREATE TABLE `pertanyaan_masyarakat` (
  `pertanyaan_id` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_masyarakat`
--

INSERT INTO `pertanyaan_masyarakat` (`pertanyaan_id`, `pertanyaan`) VALUES
(1, 'Kesesuaian persyaratan pelayanan dengan jenis pelayanannya di Poltekkes Kemenkes Semarang'),
(2, 'Kemudahan prosedur pelayanan di Poltekkes Kemenkes Semarang'),
(3, 'Kecepatan waktu dalam memberikan pelayanan di Poltekkes Semarang'),
(4, 'Kewajaran biaya/tarif dalam pelayanan di Poltekkes Kemenkes Semarang '),
(5, 'Kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan di Poltekkes Kemenkes Semarang'),
(6, 'Kompetensi/kemampuan petugas dalam pelayanan di Poltekkes Kemenkes Semarang'),
(7, 'Perilaku petugas dalam pelayanan terkait kesopanan dan keramahan di Poltekkes Kemenkes Semarang'),
(8, 'Penanganan pengaduan pengguna layanan di Poltekkes Kemenkes Semarang'),
(9, 'Kualitas sarana dan prasarana di Poltekkes Kemenkes Semarang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_mitra`
--

CREATE TABLE `pertanyaan_mitra` (
  `pertanyaan_id` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_mitra`
--

INSERT INTO `pertanyaan_mitra` (`pertanyaan_id`, `pertanyaan`) VALUES
(1, 'Bagaimana ketepatan dan kecepatan waktu proses inisiasi kerjasama? (How is the accuracy & speed during the cooperation\'s initiation process?)'),
(2, 'Bagaimana profesionalisme SDM dalam pelayanan proses kerjasama? (How is the   professionalism of HR during the process of cooperation service?)'),
(3, 'Bagaimana kesesuaian bidang kerjasama terhadap pelaksanaan kegiatan kerjasama? (How is the suitability of the field of cooperation to the implementation of cooperation activities?)'),
(4, 'Bagaimana implementasi dan kemanfaatan kerjasama sesuai dengan MoU/Perjanjian Kerjasama? (How is the implementation and benefit of the cooperation in accordance with the MoU/Cooperation Agreement?)'),
(5, 'Bagaimana komunikasi yang dijalin dalam implementasi kerja sama? (How is communication established in the implementation of cooperation?)'),
(6, 'Bagaimana kejelasan prosedur dalam implementasi kerja sama? (How clear are the procedures for implementing cooperation?)'),
(7, 'Bagaimana keefektivitasan dan efisiensi implementasi kerja sama? (How effective and efficient is the implementation of cooperation?)'),
(8, 'Bagaimana kualitas hasil dari implementasi kerja sama? (What is the quality of the results from the implementation of cooperation?)'),
(9, 'Bagaimana transparansi dalam pengelolaan kerja sama? (How transparent is the management of cooperation?)'),
(10, 'Bagaimana tingkat konsistensi dan keberlanjutan kerjasama? (How is the consistency and   continuity levels of cooperation?)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_penggunalulusan`
--

CREATE TABLE `pertanyaan_penggunalulusan` (
  `pertanyaan_id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_penggunalulusan`
--

INSERT INTO `pertanyaan_penggunalulusan` (`pertanyaan_id`, `kategori`, `pertanyaan`) VALUES
(1, 'Integritas, Etika dan Moral', 'Disiplin dalam mengerjakan pekerjaan'),
(2, 'Integritas, Etika dan Moral', 'Loyal terhadap pekerjaan yang menjadi tanggungjawabnya'),
(3, 'Integritas, Etika dan Moral', 'Melaksanakan nilai-nilai moral dan etika dalam memberikan pelayanan'),
(4, 'Integritas, Etika dan Moral', 'Berperilaku ramah terhadap pelanggan,rekan kerja dan pimpinan'),
(5, 'Keahlian Berdasarkan Bidang Ilmu  (Profesionalisme)', 'Bekerja sesuai prosedur/standar yang ditetapkan institusi'),
(6, 'Keahlian Berdasarkan Bidang Ilmu  (Profesionalisme)', 'Hasil pekerjaan sesuai dengan tuntutan masyarakat akan pelayanan'),
(7, 'Keahlian Berdasarkan Bidang Ilmu  (Profesionalisme)', 'Bekerja sesuai dengan bidang keilmuan  yang dimiliki'),
(8, 'Keahlian Berdasarkan Bidang Ilmu  (Profesionalisme)', 'Menunjukkan performa profesional'),
(9, 'Kemampuan Berkomunikasi Bahasa Inggris', 'Kemampuan Komunikasi secara lisan'),
(10, 'Kemampuan Berkomunikasi Bahasa Inggris', 'Kemampuan komunikasi tertulis'),
(11, 'Kemampuan Penggunaan Teknologi Informasi', 'Mampu mengoperasionalkan perangkat komputer untuk mendukung pekerjaannya'),
(12, 'Kemampuan Penggunaan Teknologi Informasi', 'Mampu memanfaatkan teknologi informasi  untuk mendukung pekerjaannya'),
(13, 'Kemampuan Komunikasi', 'Mampu menjalin komunikasi secara efektif dengan kolega (pimpinan dan tim kesehatan lainnya)'),
(14, 'Kemampuan Komunikasi', 'Mampu menjalin komunikasi secara efektif dengan klien'),
(15, 'Kemampuan Kerjasama Tim dan Kepemimpinan', 'Mampu bekerjasama dengan rekan kerja(perawat dan tim kesehatan lain)'),
(16, 'Kemampuan Kerjasama Tim dan Kepemimpinan', 'Mampu bekerjasama dengan pimpinan'),
(17, 'Kemampuan Kerjasama Tim dan Kepemimpinan', 'Mampu memberikan kontribusi positif terhadap tim keperawatan melalui saran,pendapat dan kritik'),
(18, 'Kemampuan Kerjasama Tim dan Kepemimpinan', 'Menjadi motivator/inspirator dalam tim'),
(19, 'Kemampuan Pengembangan Diri', 'Melanjutkan pendidikan formal pada tingkat yang lebih tinggi'),
(20, 'Kemampuan Pengembangan Diri', 'Menunjukkan motivasi yang tinggi untuk selalu meningkatkan kemampuan yang dimiliki melalui simposium,pelatihan dan kegiatan sejenis'),
(21, 'Kemampuan Pengembangan Diri', 'Keaktifan dalam kegiatan pengembangan diri(panitia kegiatan,organisasi profesi/kemasyarakatan dan lain lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_tendik`
--

CREATE TABLE `pertanyaan_tendik` (
  `pertanyaan_id` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan_tendik`
--

INSERT INTO `pertanyaan_tendik` (`pertanyaan_id`, `kategori`, `pertanyaan`) VALUES
(1, NULL, 'Program Studi'),
(2, 'Pengembangan Kompetensi', 'Pemberian kesempatan studi lanjut'),
(3, 'Pengembangan Kompetensi', 'Keikutsertaan dalam kursus/pelatihan'),
(4, 'Pengembangan Kompetensi', 'Keikutsertaan dalam seminar/workshop'),
(5, 'Pengembangan Kompetensi', 'Keikutsertaan dalam magang'),
(6, 'Pengembangan Kompetensi', 'Pemberian kesempatan studi banding'),
(7, 'Pengembangan Karir/Jabatan', 'Informasi tentang jenjang karir'),
(8, 'Pengembangan Karir/Jabatan', 'Layanan tentang jenjang karir'),
(9, 'Pengembangan Karir/Jabatan', 'Kesempatan peningkatan jenjang karir'),
(10, 'Pengembangan Karir/Jabatan', 'Informasi tentang jabatan'),
(11, 'Pengembangan Karir/Jabatan', 'Layanan tentang jabatan'),
(12, 'Pengembangan Karir/Jabatan', 'Kesempatan untuk peningkatan jabatan struktural'),
(13, 'Pengembangan Karir/Jabatan', 'Kesempatan untuk peningkatan jabatan non struktural'),
(14, 'Tugas Tambahan', 'Perolehan informasi tentang tugas tambahan (kepanitiaan, narasumber, keanggotaan suatu unit, dll)'),
(15, 'Tugas Tambahan', 'Pemberian kesempatan dalam tugas tambahan'),
(16, 'Tugas Tambahan', 'Pemerataan dalam mendapatkan tugas tambahan'),
(17, 'Tugas Tambahan', 'Pemberian kesempatan mewakili jurusan/poltekkes ditingkat nasional/internasional'),
(18, 'Sarana Prasarana', 'Tersedia sarana beribadah'),
(19, 'Sarana Prasarana', 'Tersedia sarana prasarana berolahraga'),
(20, 'Sarana Prasarana', 'Tersedia sarana prasarana berkesenian'),
(21, 'Sarana Prasarana', 'Pemberian fasilitas  pendukung untuk rekreasi'),
(22, 'Sarana Prasarana', 'Tersedianya layanan pemeriksaan Kesehatan di Klinik Pratama Poltekkes Semarang'),
(23, 'Sarana Prasarana', 'Tersedia sarana pendukung pengembangan diri, pencapaian prestasi di bidang OR, seni, religi, dsb'),
(24, 'Sarana Prasarana', 'Tersedia dan berfungsi baik sarana teknologi informasi dan komunikasi'),
(25, 'Sarana Prasarana', 'Tersedia dan berfungsi baik sarana pemeliharaan keselamatan kerja dan keamanan'),
(26, 'Keuangan', 'Ketepatan waktu pembayaran gaji, honor dan tunjangan'),
(27, 'Keuangan', 'Kesesuaian besaran gaji, honor dan tunjangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tendik`
--

CREATE TABLE `tendik` (
  `tendik_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `usia` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `saranmasukkan` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `role` varchar(32) DEFAULT NULL,
  `no_responden` int(11) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `p11` int(11) DEFAULT NULL,
  `p12` int(11) DEFAULT NULL,
  `p13` int(11) DEFAULT NULL,
  `p14` int(11) DEFAULT NULL,
  `p15` int(11) DEFAULT NULL,
  `p16` int(11) DEFAULT NULL,
  `p17` int(11) DEFAULT NULL,
  `p18` int(11) DEFAULT NULL,
  `p19` int(11) DEFAULT NULL,
  `p20` int(11) DEFAULT NULL,
  `p21` int(11) DEFAULT NULL,
  `p22` int(11) DEFAULT NULL,
  `p23` int(11) DEFAULT NULL,
  `p24` int(11) DEFAULT NULL,
  `p25` int(11) DEFAULT NULL,
  `p26` int(11) DEFAULT NULL,
  `u1` int(11) DEFAULT NULL,
  `u2` int(11) DEFAULT NULL,
  `u3` int(11) DEFAULT NULL,
  `u4` int(11) DEFAULT NULL,
  `u5` int(11) DEFAULT NULL,
  `u6` int(11) DEFAULT NULL,
  `u7` int(11) DEFAULT NULL,
  `u8` int(11) DEFAULT NULL,
  `u9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tendik`
--

INSERT INTO `tendik` (`tendik_id`, `status`, `email`, `nama`, `nomor_telepon`, `alamat`, `password`, `usia`, `jeniskelamin`, `saranmasukkan`, `nip`, `role`, `no_responden`, `prodi`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `p19`, `p20`, `p21`, `p22`, `p23`, `p24`, `p25`, `p26`, `u1`, `u2`, `u3`, `u4`, `u5`, `u6`, `u7`, `u8`, `u9`) VALUES
(1, 1, 'dev@gmail.com', 'chris', NULL, NULL, '1', NULL, NULL, NULL, NULL, 'tendik', 1, 'RMIK', 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'tendiik', NULL, NULL, '$2y$12$j418O9kPVbdLu1s6qRNCd.kY4fcy1lP5nksVXCvIg3Pa4V9EGdwlm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'tn@d.com', NULL, NULL, NULL, '$2y$12$Y5iqEgfYSiEmMH0qU18epeh83W5c8BbNMPENdfUKIRvgmHIzU7jaG', NULL, NULL, NULL, NULL, 'tendik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 'tnd@k.com', 'sukses', NULL, NULL, '$2y$12$jGkEJD6Z2ULguCZrqKdqFOrl9uiIAuEYJ13h2c0jh5SbemJHdTYC2', NULL, NULL, NULL, NULL, 'tendik', 4, 'ds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 'tendik2@gmail.com', 'berhasil', '08124658274', 'Jalan Baru', '$2y$12$JkE4H2QEMTuykwU3w1zvyul6O4DRQboxU0q8NLWRYVoLWAhOXpnQS', '50', 'Laki-laki', 'berhasil', '12', 'tendik', 5, 'D III Kebidanan Blora', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(6, NULL, 't@g.com', NULL, NULL, NULL, '$2y$12$5Qew823e3yDAs9I0lUMZ7.hLWc3vssYH6K7HGMmojF5eIFe5UV11a', NULL, NULL, NULL, NULL, 'tendik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'tendik@tes.com', NULL, NULL, NULL, '$2y$12$Ly.K19I/Mt/3w84d8ZwKAOcglYV6yhV6BOknB8PtajaL9oxgNYLB6', NULL, NULL, NULL, NULL, 'tendik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, NULL, 'a', '1', 'd', '', '12', 'Laki-laki', '1', '2', NULL, NULL, 'Keperawatan Pekalongan  Program Diploma Tiga', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(9, 1, NULL, 'cscscscscsc', '1', 'd', '', '12', 'Laki-laki', '1', '2', NULL, NULL, 'Keperawatan Pekalongan  Program Diploma Tiga', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`masyarakat_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`mitra_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna_lulusan`
--
ALTER TABLE `pengguna_lulusan`
  ADD PRIMARY KEY (`penggunalulusan_id`);

--
-- Indeks untuk tabel `pertanyaan_alumni`
--
ALTER TABLE `pertanyaan_alumni`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_dosen`
--
ALTER TABLE `pertanyaan_dosen`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_mahasiswa`
--
ALTER TABLE `pertanyaan_mahasiswa`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_masyarakat`
--
ALTER TABLE `pertanyaan_masyarakat`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_mitra`
--
ALTER TABLE `pertanyaan_mitra`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_penggunalulusan`
--
ALTER TABLE `pertanyaan_penggunalulusan`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `pertanyaan_tendik`
--
ALTER TABLE `pertanyaan_tendik`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indeks untuk tabel `tendik`
--
ALTER TABLE `tendik`
  ADD PRIMARY KEY (`tendik_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `dosen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mahasiswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `masyarakat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `mitra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengguna_lulusan`
--
ALTER TABLE `pengguna_lulusan`
  MODIFY `penggunalulusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_alumni`
--
ALTER TABLE `pertanyaan_alumni`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_dosen`
--
ALTER TABLE `pertanyaan_dosen`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_mahasiswa`
--
ALTER TABLE `pertanyaan_mahasiswa`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_masyarakat`
--
ALTER TABLE `pertanyaan_masyarakat`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_mitra`
--
ALTER TABLE `pertanyaan_mitra`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_penggunalulusan`
--
ALTER TABLE `pertanyaan_penggunalulusan`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan_tendik`
--
ALTER TABLE `pertanyaan_tendik`
  MODIFY `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tendik`
--
ALTER TABLE `tendik`
  MODIFY `tendik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
