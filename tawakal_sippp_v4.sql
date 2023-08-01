-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 03:51 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tawakal_sippp_v4`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(8) NOT NULL,
  `matkul` varchar(40) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `ruang` varchar(15) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `th_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `matkul`, `hari`, `jam`, `ruang`, `kelas`, `semester`, `th_ajaran`) VALUES
('imkA1', 'interaksi manusia komputer', 'Senin', '10:10:00', 'Lab LIK 02', 'A1', 'genap', '2017/2018'),
('IMKA2', 'imk', 'senin', '10:10:00', 'lab e 02', 'A', 'gasal', '2017/2018'),
('imkB1', 'IMK', 'Senin', '01:00:00', 'Lab LIK 01', 'B1', 'genap', '2017/2018'),
('imkB2', 'daspro', 'Senin', '01:00:00', 'Lab LIK 01', 'c1', 'genap', '2017/2018'),
('lnljn', 'lknlkn', 'lnl', '00:00:00', 'lnl', 'nl', 'gasal', 'klnl');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `cp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `cp`) VALUES
('$nimbaru', '$nama', '$angk', '$cp'),
('12', 'eko a', 'haha', 'kjgkg'),
('24010315120020', 'EKO', '2015', '089123123123'),
('24010315120021', 'abdul', '2015', '089123123123'),
('24010315120022', 'aziz', '2015', '089123123123'),
('dfgfdg', 'fgfdg12', 'haha', 'joihh');

-- --------------------------------------------------------

--
-- Table structure for table `penunjang`
--

CREATE TABLE `penunjang` (
  `id_penunjang` varchar(6) NOT NULL,
  `id_jadwal` varchar(5) NOT NULL,
  `pertemuan` int(10) UNSIGNED NOT NULL,
  `conten` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penunjang`
--

INSERT INTO `penunjang` (`id_penunjang`, `id_jadwal`, `pertemuan`, `conten`) VALUES
('IMK001', 'IMKA2', 1, ' Membuat tampilan view dengan Pencil\r\n\r\nnama folder (rar) & subjeck : Prak01_nama_nim\r\nemail 						: galih.dpratama@gmail.com\r\ndeadline 					: 23.00 \r\n'),
('IMK003', 'imkB1', 3, '  Praktikum IMK Pertemuan 03\r\n\r\nnama folder (rar) & subjeck : Prak03_n...kkk'),
('IMK004', 'imkA1', 4, '  Praktikum IMK pertemuan 04\r\n\r\nnama folder (rar) & subjeck : Prak04_nama_nim\r\nemail 						: galih.dpratama@gmail.com\r\ndeadline 					: 23.00 \r\n\r\n'),
('IMK948', 'imkA1', 4, '  Praktikum IMK pertemuan 04\r\n\r\nnama folder (rar) & subjeck : Prak04_nama_nim\r\nemail 						: galih.dpratama@gmail.com\r\ndeadline 					: 23.00 \r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum`
--

CREATE TABLE `praktikum` (
  `id_praktikum` int(11) UNSIGNED NOT NULL,
  `nim` varchar(14) NOT NULL,
  `id_jadwal` varchar(8) NOT NULL,
  `semester` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `praktikum`
--

INSERT INTO `praktikum` (`id_praktikum`, `nim`, `id_jadwal`, `semester`, `status`) VALUES
(1, '12', 'IMKA2', 4, 'praktikan'),
(2, '12', 'imkB2', 217, 'asprak'),
(3, '24010315120020', 'imkA1', 216, 'praktikan'),
(4, '24010315120020', 'IMKA2', 9, 'praktikan'),
(5, '24010315120020', 'imkB1', 1, 'praktikan'),
(6, '24010315120020', 'imkB2', 2, 'praktikan'),
(7, '24010315120021', 'imkA1', 5, 'praktikan'),
(8, '24010315120021', 'IMKA2', 2, 'praktikan'),
(9, '24010315120021', 'imkB1', 3, 'praktikan'),
(10, '24010315120021', 'imkB2', 6, 'praktikan'),
(11, '24010315120022', 'imkA1', 21, 'praktikan'),
(12, '24010315120022', 'imkB1', 3, 'praktikan'),
(13, 'dfgfdg', 'imkA1', 89, 'asprak'),
(14, 'dfgfdg', 'IMKA2', 4, 'praktikan');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_praktikum` int(10) UNSIGNED NOT NULL,
  `pertemuan` int(10) UNSIGNED NOT NULL,
  `kehadiran` varchar(5) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hakAkses` varchar(10) NOT NULL,
  `kepentingan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `hakAkses`, `kepentingan`) VALUES
('admin001', 'admin', 'admin', 'admin', 'semua'),
('admin002', 'admin', 'adminyes', 'admin', 'semua'),
('aspimkA1', 'asprak', 'asprak', 'asprak', 'imkA1'),
('aspimkB1', 'asprak2', 'asprak2', 'asprak', 'imkB2'),
('aspimkb2', 'asprakb2', 'asprak', 'asprak', 'imkA1'),
('dfb', 'nkjb', 'kjbkb', 'admin', 'semua'),
('fdljb', 'kbk3', 'bkbkbkb', 'admin', 'semua'),
('fdljba', 'kbk12', 'bkbkbkb', 'admin', 'semua'),
('prkIMKA1', 'praktikan2', 'praktikan2', 'praktikan', 'imkB2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `penunjang`
--
ALTER TABLE `penunjang`
  ADD PRIMARY KEY (`id_penunjang`),
  ADD KEY `tr5` (`id_jadwal`);

--
-- Indexes for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id_praktikum`),
  ADD KEY `tr23` (`id_jadwal`),
  ADD KEY `tr45` (`nim`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_praktikum`,`pertemuan`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id_praktikum` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_praktikum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penunjang`
--
ALTER TABLE `penunjang`
  ADD CONSTRAINT `tr5` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD CONSTRAINT `tr23` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `tr45` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `tr54` FOREIGN KEY (`id_praktikum`) REFERENCES `praktikum` (`id_praktikum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
