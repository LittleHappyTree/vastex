-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2019 at 08:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vastex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `uname`, `password`, `akses`) VALUES
(1, 'Admin Test', 'adminnya', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL),
(2, 'Raul Gonzales', 'raul25', 'd8578edf8458ce06fbc5bb76a58c5ca4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_product`
--

CREATE TABLE `master_product` (
  `id` int(11) NOT NULL,
  `nama_master` varchar(20) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `user_added` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_product`
--

INSERT INTO `master_product` (`id`, `nama_master`, `deskripsi`, `date_added`, `user_added`) VALUES
(3, 'Vastex', 'Kemarin datang', '2019-11-13', 'raul25'),
(4, 'Virto Plus', 'ini udah di edit yaaa', '2019-11-13', 'raul25');

-- --------------------------------------------------------

--
-- Table structure for table `product_1`
--

CREATE TABLE `product_1` (
  `id` int(11) NOT NULL,
  `nama_produl` varchar(20) NOT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `date_added` date NOT NULL,
  `user_added` varchar(20) NOT NULL,
  `id_master` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_product`
--
ALTER TABLE `master_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_1`
--
ALTER TABLE `product_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_product`
--
ALTER TABLE `master_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_1`
--
ALTER TABLE `product_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
