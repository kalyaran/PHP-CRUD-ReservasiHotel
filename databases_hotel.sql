-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 11:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databases_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(50) NOT NULL,
  `ID_Kamar` int(50) NOT NULL,
  `Nama_Customer` varchar(100) NOT NULL,
  `Usia_Customer` varchar(50) NOT NULL,
  `Alamat_Customer` varchar(50) NOT NULL,
  `Email_Customer` varchar(100) NOT NULL,
  `No_HP` char(50) NOT NULL,
  `Lama_Menginap` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID_Customer`, `ID_Kamar`, `Nama_Customer`, `Usia_Customer`, `Alamat_Customer`, `Email_Customer`, `No_HP`, `Lama_Menginap`) VALUES
(234789, 3, 'Monita Paath', '22 Tahun', 'Pasir Dua', 'Momon12@gmail.com', '081234568767', 5),
(356042, 2, 'Park Jihyo', '27 Tahun', 'Koya Barat', 'Jihyotwice@gmail.com', '089743211234', 7),
(765298, 4, 'Zhao Lusi', '25 Tahun', 'Dok 9', 'Zhaolusi123@gmail.com', '081340197781', 3),
(23621035, 1, 'Hamseriyani', '27', 'Hamadi Rawa Lapangan', 'hamseriyani12@gmail.com', '081344678919', 3);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `ID_Fasilitas` int(50) NOT NULL,
  `Nama_Fasilitas` varchar(100) NOT NULL,
  `Harga_Fasilitas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`ID_Fasilitas`, `Nama_Fasilitas`, `Harga_Fasilitas`) VALUES
(0, 'Tidak Ada Fasilitas', 0),
(1, 'Laundry Pakaian', 80000),
(2, 'Breakfast', 200000),
(3, 'Kasur Tambahan', 100000),
(4, 'Spa', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `ID_Jenis` int(50) NOT NULL,
  `Jenis_Kamar` varchar(100) NOT NULL,
  `Harga_Jenis_Kamar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`ID_Jenis`, `Jenis_Kamar`, `Harga_Jenis_Kamar`) VALUES
(11, 'Superior Room', 750000),
(22, 'Deluxe Room', 850000),
(33, 'Suite Room', 1500000),
(44, 'Grand Suite Room', 1700000);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `ID_Kamar` int(50) NOT NULL,
  `No_Kamar` int(100) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `ID_Jenis` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`ID_Kamar`, `No_Kamar`, `Status`, `ID_Jenis`) VALUES
(1, 101, 0, 11),
(2, 102, 0, 22),
(3, 103, 0, 22),
(4, 104, 0, 44),
(5, 105, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_Pembayaran` int(100) NOT NULL,
  `ID_Customer` int(50) NOT NULL,
  `Jumlah_Pembayaran` decimal(10,2) NOT NULL,
  `ID_Reservasi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`ID_Pembayaran`, `ID_Customer`, `Jumlah_Pembayaran`, `ID_Reservasi`) VALUES
(111, 234789, 1050000.00, 1234),
(112, 356042, 1580000.00, 1236),
(113, 765298, 1800000.00, 1235),
(23621035, 23621035, 2400000.00, 2224);

-- --------------------------------------------------------

--
-- Table structure for table `resepsionis`
--

CREATE TABLE `resepsionis` (
  `ID_Resepsionis` int(50) NOT NULL,
  `Nama_Resepsionis` varchar(100) NOT NULL,
  `No_HP` char(50) NOT NULL,
  `Tahun_Kerja` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resepsionis`
--

INSERT INTO `resepsionis` (`ID_Resepsionis`, `Nama_Resepsionis`, `No_HP`, `Tahun_Kerja`) VALUES
(202101, 'Revalina Mahendra', '081122334455', 2021),
(2023321, 'Agus Samsudin', '089988776655', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `ID_Reservasi` int(50) NOT NULL,
  `ID_Customer` int(50) NOT NULL,
  `Check_In` date NOT NULL,
  `Check_Out` date NOT NULL,
  `ID_Fasilitas` int(50) NOT NULL,
  `Tanggal_Reservasi` date NOT NULL,
  `ID_Resepsionis` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`ID_Reservasi`, `ID_Customer`, `Check_In`, `Check_Out`, `ID_Fasilitas`, `Tanggal_Reservasi`, `ID_Resepsionis`) VALUES
(1234, 234789, '2024-10-24', '2024-10-26', 2, '2024-10-20', 2023321),
(1235, 765298, '2024-08-10', '2024-08-21', 3, '2024-08-05', 202101),
(1236, 356042, '2024-12-20', '2024-10-30', 1, '2024-10-16', 2023321),
(2224, 23621035, '2024-12-15', '2024-12-18', 4, '2024-12-14', 2023321);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `level`, `username`, `password`) VALUES
(1, 'Resepsionis', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`),
  ADD KEY `ID_Kamar` (`ID_Kamar`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`ID_Fasilitas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_Jenis`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`ID_Kamar`),
  ADD KEY `ID_Jenis` (`ID_Jenis`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_Pembayaran`),
  ADD KEY `ID_Reservasi` (`ID_Reservasi`),
  ADD KEY `ID_Customer` (`ID_Customer`);

--
-- Indexes for table `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`ID_Resepsionis`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`ID_Reservasi`),
  ADD KEY `ID_Fasilitas` (`ID_Fasilitas`),
  ADD KEY `ID_Resepsionis` (`ID_Resepsionis`),
  ADD KEY `ID_Customer` (`ID_Customer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ID_Kamar`) REFERENCES `kamar` (`ID_Kamar`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`ID_Jenis`) REFERENCES `jenis` (`ID_Jenis`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_Reservasi`) REFERENCES `reservasi` (`ID_Reservasi`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`ID_Customer`) REFERENCES `customer` (`ID_Customer`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`ID_Fasilitas`) REFERENCES `fasilitas` (`ID_Fasilitas`),
  ADD CONSTRAINT `reservasi_ibfk_3` FOREIGN KEY (`ID_Resepsionis`) REFERENCES `resepsionis` (`ID_Resepsionis`),
  ADD CONSTRAINT `reservasi_ibfk_4` FOREIGN KEY (`ID_Customer`) REFERENCES `customer` (`ID_Customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
