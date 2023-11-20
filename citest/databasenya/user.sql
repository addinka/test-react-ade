-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2023 at 04:28 AM
-- Server version: 5.7.41
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airlie66_citest`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nik` char(255) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `tgl_msk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nik`, `nama`, `alamat`, `tgl_lahir`, `tgl_msk`) VALUES
('2345667777', 'nur indah sari', 'Pinang Ranti', '2023-01-18', '2022-08-09'),
('31750801028400023', 'Adriana Sydney Aidnaya', 'Jl. Bosih Raya, Wanasari, Kec. Cibitung, Kabupaten Bekasi, Jawa Barat 17520, Indonesia', '2023-01-31', '2022-01-18'),
('31750801028400033', 'TEST TESTINDO', 'Pinang Ranti', '2023-01-11', '2021-11-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
