-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 04:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network`
--

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `switchLocation` varchar(100) NOT NULL,
  `switchIP` varchar(100) NOT NULL,
  `panelID` varchar(20) NOT NULL,
  `patchpanelID` varchar(20) NOT NULL,
  `switchID` varchar(50) DEFAULT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `portLocation` varchar(20) DEFAULT NULL,
  `vlan` varchar(50) DEFAULT NULL,
  `portIP` varchar(15) DEFAULT NULL,
  `goods` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`switchLocation`, `switchIP`, `panelID`, `patchpanelID`, `switchID`, `userName`, `portLocation`, `vlan`, `portIP`, `goods`, `Remarks`) VALUES
('networkRoom', '192.168.1.160,192.168.1.161,192.168.1.162,192.168.1.163', 'IDF 1:05:0', 'A14', '161-27', 'Toshiba e-studio 2309A', 'F007', '101', '10.10.10.25', 'Photocopier', ''),
('networkRoom', '192.168.1.164,192.168.1.165', 'IDF 1:05:1', 'A1', '164-', 'Office Room', 'G007', '101', '10.10.10.24', 'canon IR2425 photocopier', ''),
('CSL1', '192.168.1.166,192.168.1.167', 'IDF 1:05:2', 'A1', '166-1', '', 'CSL1', '101,201', '', '', 'Wall'),
('CSL2', '192.168.1.168,192.168.1.169', 'IDF 1:05:3', 'A1', '168-1', '5', 'CSL2', '9,150,101,201,301', '', '', ''),
('CSL3', '192.168.1.170,192.168.1.171,192.168.1.172', 'IDF 1:05:4', 'A1', '170-1', '', 'CSL3', '201', '', '', ''),
('CSL4', '192.168.1.173,192.168.1.176', 'IDF 1:05:5', 'A1', '', '', 'CSL4 Table', '101,201', '', '', ''),
('researchRoom', '192.168.1.174,192.168.1.175', 'IDF 1:05:6', 'A1', '174-1', 'CSH1', 'S011', '201', '', '', ''),
('researchRoom', '192.168.1.174,192.168.1.175', 'IDF 1:05:6', 'A2', '174-3', 'CSH-1', 'S011', '201', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'staff1', 'staff1@gmail.com', '$2y$10$wuhOm7P9c.IQ2sDgLy84E.SdrgbBJ0Ky7VX4snPwxJKD4/xzI0Mam', 'staff'),
(4, 'admin', 'admin@gmail.com', '$2y$10$FzMoFRw/DzXouAgA1PEKHu.eOCfTLP.radurdZWqg2Y/guyLRR43q', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`panelID`,`patchpanelID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
