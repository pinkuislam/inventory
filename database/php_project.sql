-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 08:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'Sohel', 'mhsohel017@gmail.com', '12345', 'active'),
(3, 'Rokeya', 'rokeyaakter1807@gmail.com', '12345', 'active'),
(4, 'Pinku Islam', 'pinkuislam71@gmail.com', '12345', 'active'),
(5, 'Juliush', 'juliushahmed@yahoo.com', '12345', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `unit`, `photo`) VALUES
(1, 'Sampos', '400', '2  piece', 'shampo.jpg'),
(2, 'apple', '1255', '5 KG', 'apple.jpg'),
(3, 'orange', '501', '5 KG', 'orange.jpg'),
(4, 'Banana ', '125', '15 piece', 'banana.jpg'),
(5, 'Mango', '500', '5 KG', 'mango.jpg'),
(6, 'Lichi', '600', '3 KG', 'lichi.jpg'),
(7, 'Laptop', '40000', '1 piece', 'laptop.png'),
(8, 'Desktop', '300000', '6  piece', 'desktop.jpg'),
(9, 'TEA', '125', '5 Cup', 'tea.jpg'),
(10, 'Mobile Phone', '300000', '1 piece', 'samsung.jpg'),
(11, 'Soap', '40', '1 piece', 'soap.jpg'),
(12, 'Prepsodent', '120', '1 piece', 'prepsodent.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `return_table`
--

CREATE TABLE `return_table` (
  `id` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_table`
--

INSERT INTO `return_table` (`id`, `productid`, `quantity`, `total`, `date`) VALUES
(1, 1, 4, '1600.00', '2020-02-13'),
(2, 2, 6, '7518.00', '2020-02-01'),
(4, 3, 5, '2505.00', '2020-03-01'),
(5, 6, 4, '2400.00', '2020-03-01'),
(6, 2, 2, '2510.00', '2020-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `adminid` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_in`
--

INSERT INTO `stock_in` (`id`, `invoice_no`, `adminid`, `productid`, `quantity`, `sub_total`, `discount`, `total`, `date`) VALUES
(6, 2, 3, 4, 8, '1000.00', 2, '980.00', '0000-00-00'),
(7, 3, 3, 1, 4, '1600.00', 2, '1568.00', '2020-02-01'),
(9, 4, 3, 9, 8, '1000.00', 2, '980.00', '2020-02-12'),
(10, 5, 3, 11, 6, '240.00', 2, '240.00', '2020-02-11'),
(11, 6, 3, 2, 8, '10024.00', 8, '9222.08', '2020-02-01'),
(12, 7, 3, 1, 5, '2000.00', 1, '1980.00', '2020-03-01'),
(14, 9, 4, 2, 4, '5020.00', 0, '5020.00', '2020-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `stock_out`
--

CREATE TABLE `stock_out` (
  `id` bigint(20) NOT NULL,
  `invoice_no` bigint(20) NOT NULL,
  `adminid` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `customer_info` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_out`
--

INSERT INTO `stock_out` (`id`, `invoice_no`, `adminid`, `productid`, `quantity`, `sub_total`, `discount`, `total`, `customer_info`, `date`) VALUES
(4, 1, 3, 1, 6, '2400.00', 6, '2256.00', 'Laksham', '2020-02-01'),
(5, 2, 3, 3, 5, '2505.00', 6, '2354.70', 'Cumilla', '2020-02-04'),
(7, 3, 4, 4, 2, '250.00', 2, '245.00', 'Dhaka', '2020-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `wastage`
--

CREATE TABLE `wastage` (
  `id` bigint(20) NOT NULL,
  `productid` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wastage`
--

INSERT INTO `wastage` (`id`, `productid`, `quantity`, `total`, `date`) VALUES
(2, 1, 4, '1600.00', '2020-02-01'),
(3, 3, 5, '2505.00', '2020-02-02'),
(4, 5, 5, '2500.00', '2020-02-08'),
(5, 10, 6, '1500000.00', '2020-02-07'),
(7, 4, 5, '625.00', '2020-02-01'),
(8, 2, 3, '3759.00', '2020-02-14'),
(9, 4, 2, '250.00', '2020-03-01'),
(10, 3, 3, '1503.00', '2020-03-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_table`
--
ALTER TABLE `return_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceid` (`invoice_no`),
  ADD KEY `adminid` (`adminid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`),
  ADD KEY `adminid` (`adminid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `wastage`
--
ALTER TABLE `wastage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productid` (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `return_table`
--
ALTER TABLE `return_table`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_in`
--
ALTER TABLE `stock_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `stock_out`
--
ALTER TABLE `stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wastage`
--
ALTER TABLE `wastage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `return_table`
--
ALTER TABLE `return_table`
  ADD CONSTRAINT `return_table_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_in`
--
ALTER TABLE `stock_in`
  ADD CONSTRAINT `stock_in_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_in_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_out`
--
ALTER TABLE `stock_out`
  ADD CONSTRAINT `stock_out_ibfk_1` FOREIGN KEY (`adminid`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_out_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wastage`
--
ALTER TABLE `wastage`
  ADD CONSTRAINT `wastage_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
