-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 09:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_dosen`
--

CREATE TABLE `absensi_dosen` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_matkul` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `absen` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_dosen`
--

INSERT INTO `absensi_dosen` (`id`, `id_dosen`, `id_matkul`, `kelas`, `title`, `keterangan`, `tanggal`, `absen`) VALUES
(2, 1, '22SKB1501', 'RK001', 'PERTEMUAN 1', 'Tidak Hadir', '2023-03-01', '0');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_mhs`
--

CREATE TABLE `absensi_mhs` (
  `id_absensi` int(11) NOT NULL,
  `id_matkul` varchar(20) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `absen` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_mhs`
--

INSERT INTO `absensi_mhs` (`id_absensi`, `id_matkul`, `id_dosen`, `id_mahasiswa`, `tanggal`, `absen`) VALUES
(1, '22SKB1501', 1, 1, '2023-02-27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(60) NOT NULL,
  `level` varchar(10) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `level`, `photo`, `created_at`, `updated_at`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'email@gmail.com', 'admin', '', '2022-12-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `pendidikan_terakhir` enum('S1','S2','S3') NOT NULL,
  `photo` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nik`, `nama_dosen`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `hp`, `pendidikan_terakhir`, `photo`, `password`, `created_at`, `updated_at`) VALUES
(1, '220001', 'DR. Drs, Wahyudin, M.Pd', 'Laki-Laki', '', '0000-00-00', '', '', 'S1', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-14', '0000-00-00'),
(2, '220002', 'Darmayanti Wulandatika, S.S.T., M.Keb', 'Laki-Laki', '', '0000-00-00', '', '', 'S1', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '0000-00-00'),
(3, '220003', 'Fika Aulia, S.ST., M.Keb', 'Laki-Laki', '', '0000-00-00', '', '', 'S1', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '0000-00-00'),
(4, '220004', 'Mahfuzhah Deswita Puteri, S.S.T., M.Keb', 'Laki-Laki', '', '0000-00-00', '', '', 'S1', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '0000-00-00'),
(5, '220005', 'Bardiati Ulfah, S.ST., M.Keb', 'Laki-Laki', '', '0000-00-00', '', '', 'S1', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '0000-00-00'),
(6, '220006', 'Nelly Mariati, S.S.T.,M.Keb', 'Perempuan', '', '0000-00-00', '', '', 'S2', 'Nelly_Mariati.PNG', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '2023-02-28'),
(7, '220007', 'Pratiwi Puji L, S.Tr. Keb., M.Keb', 'Laki-Laki', '', '0000-00-00', '', '', 'S1', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '0000-00-00'),
(8, '220008', 'Hoiriyah S.Kom., M.Kom', 'Perempuan', '', '0000-00-00', '', '', 'S2', '', '21232f297a57a5a743894a0e4a801fc3', '2023-02-15', '2023-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_jurusan` varchar(20) NOT NULL,
  `id_matkul` varchar(20) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `ruangan` varchar(20) NOT NULL,
  `soft_delete` varchar(2) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_ta`, `id_jurusan`, `id_matkul`, `id_dosen`, `hari`, `jam`, `ruangan`, `soft_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'KBN2223', '22SKB1501', 1, 'Senin', '08.00-10.00', 'RK001', '1', '2023-03-02', '0000-00-00'),
(2, 1, 'KBN2223', '22SKB1502', 2, 'Senin', '08.00-10.00', 'RK002', '1', '2023-03-02', '0000-00-00'),
(3, 2, 'KBN2223', '22UMB0006', 1, 'Senin', '08.00-10.00', 'RK001', '1', '2023-03-02', '0000-00-00'),
(4, 3, 'KBN2223', '22UMB0007', 1, 'Selasa', '08.00-10.00', 'RK001', '1', '2023-03-02', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(11) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `singkat` varchar(5) NOT NULL,
  `jenjang` enum('D3','S1','S2','S3') NOT NULL,
  `akreditasi` enum('A','B','C') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`, `singkat`, `jenjang`, `akreditasi`, `created_at`, `updated_at`) VALUES
('KBN2223', 'Kebidanan', 'KB', 'S1', 'B', '2023-02-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `status_nilai` varchar(10) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `id_jadwal`, `id_mahasiswa`, `id_ta`, `nilai`, `status_nilai`, `created_at`) VALUES
(1, 1, 1, 1, '', '', '2023-03-02'),
(2, 1, 2, 1, '', '', '2023-03-02'),
(3, 3, 3, 1, '', '', '2023-03-02'),
(4, 4, 4, 1, '', '', '2023-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_jurusan` varchar(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama_mhs` varchar(15) NOT NULL,
  `nama_kepanjangan` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `hp_ortu` varchar(16) NOT NULL,
  `nik_kk` varchar(25) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `id_jurusan`, `nim`, `nama_mhs`, `nama_kepanjangan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `hp`, `nama_ayah`, `nama_ibu`, `hp_ortu`, `nik_kk`, `photo`, `password`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'KBN2223', '19630874', '', 'M.Reza', 'Laki-Laki', 'Banjarmasin', '1997-11-29', 'JL IR PHM NOOR GG.MELATI', 'mrz19630874@gmail.com', '089531474939', 'Ridawan', 'Heldawati', '089519316553', '6371032911970008', 'Foto_Ganteng4.jpeg', '21232f297a57a5a743894a0e4a801fc3', '1', '2023-02-24', '2023-02-28'),
(2, 'KBN2223', '19630875', 'Ani', 'Anisah', 'Laki-Laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '21232f297a57a5a743894a0e4a801fc3', '1', '2023-02-24', '0000-00-00'),
(3, 'KBN2223', '19630876', 'Dwi', 'Dwi Tr', 'Laki-Laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '21232f297a57a5a743894a0e4a801fc3', '1', '2023-02-24', '0000-00-00'),
(4, 'KBN2223', '19630877', '', 'Elma Hayati', 'Perempuan', 'Banjarmasin', '1999-09-09', 'JL IR PHM', 'email01@gmail.com', '089531474939', 'Ora', 'Ono', '089519316553', '6371032911970008', 'ACIL4.PNG', '21232f297a57a5a743894a0e4a801fc3', '1', '2023-02-28', '2023-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matkul` varchar(10) NOT NULL,
  `id_jurusan` varchar(10) NOT NULL,
  `matakuliah` varchar(30) NOT NULL,
  `sks` enum('1','2','3','4','5') NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `smt` enum('Ganjil','Genap') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `id_jurusan`, `matakuliah`, `sks`, `semester`, `smt`, `created_at`, `updated_at`) VALUES
('22SKB1501', 'KBN2223', 'Pengantar Praktik Kebidanan', '4', '1', 'Ganjil', '2023-02-28', '0000-00-00'),
('22SKB1502', 'KBN2223', 'Anatomi', '3', '1', 'Ganjil', '2023-02-28', '0000-00-00'),
('22SKB1503', 'KBN2223', 'Fisiologi', '3', '1', 'Ganjil', '2023-02-28', '0000-00-00'),
('22UMB0001', 'KBN2223', 'Pendidikan Pancasila', '2', '1', 'Ganjil', '2023-02-24', '0000-00-00'),
('22UMB0003', 'KBN2223', 'Bahasa Indonesia', '2', '1', 'Ganjil', '2023-02-24', '0000-00-00'),
('22UMB0006', 'KBN2223', 'Agama', '2', '2', 'Genap', '2023-02-24', '0000-00-00'),
('22UMB0007', 'KBN2223', 'Ibadah Akhlak dan Muamalah', '2', '3', 'Ganjil', '2023-02-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `id_ta` int(11) NOT NULL,
  `ta` varchar(20) NOT NULL,
  `smt` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`id_ta`, `ta`, `smt`, `status`, `created_at`) VALUES
(1, '2022/2023', 'Ganjil', 0, '2023-02-14'),
(2, '2022/2023', 'Genap', 0, '2023-02-14'),
(3, '2023/2024', 'Ganjil', 0, '2023-02-14'),
(4, '2023/2024', 'Genap', 0, '2023-02-14'),
(5, '2024/2025', 'Ganjil', 0, '2023-02-14'),
(6, '2024/2025', 'Genap', 0, '2023-02-14'),
(7, '2025/2026', 'Ganjil', 0, '2023-02-14'),
(8, '2026/2027', 'Genap', 0, '2023-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun`) VALUES
(1, '2022/2023'),
(2, '2023/2024'),
(3, '2024/2025'),
(4, '2025/2026'),
(5, '2026/2027'),
(6, '2027/2028');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_dosen`
--
ALTER TABLE `absensi_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_mhs`
--
ALTER TABLE `absensi_mhs`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`,`id_jurusan`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_dosen`
--
ALTER TABLE `absensi_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `absensi_mhs`
--
ALTER TABLE `absensi_mhs`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ta`
--
ALTER TABLE `ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
