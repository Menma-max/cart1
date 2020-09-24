-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 06:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_table`
--

CREATE TABLE `new_table` (
  `User_ID` int(10) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Mobile_No` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_table`
--

INSERT INTO `new_table` (`User_ID`, `E_mail`, `User_Name`, `Password`, `Mobile_No`) VALUES
(5, 'abc@gmail.com', 'Menma', '123abc', 1234567890),
(7, 'xyz123@gmail.com', 'Harry', '123456', 987654321),
(8, 'abc321@hotmail.in', 'Naruto', '987654', 1234567899),
(9, 'pqr@gmail.com', 'web', '888444', 1928374650),
(10, 'xml@gmail.com', 'shiv', '666666', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Customer_Name` varchar(20) NOT NULL,
  `Final_Amt` int(15) NOT NULL,
  `Payment_Type` varchar(20) NOT NULL,
  `Customer_Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Customer_Name`, `Final_Amt`, `Payment_Type`, `Customer_Address`) VALUES
('', 0, '', ''),
('', 0, '', ''),
('', 0, '', ''),
('', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prot`
--

CREATE TABLE `prot` (
  `pro_id` int(20) NOT NULL,
  `pro_name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prot`
--

INSERT INTO `prot` (`pro_id`, `pro_name`, `price`) VALUES
(1, 'Product_A', 50),
(2, 'Product_B', 60),
(3, 'Product_C', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tcart`
--

CREATE TABLE `tcart` (
  `Pro_ID` int(15) NOT NULL,
  `Product_Name` varchar(20) NOT NULL,
  `Product_count` int(15) NOT NULL,
  `Price_per_product` int(20) NOT NULL,
  `Total_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcart`
--

INSERT INTO `tcart` (`Pro_ID`, `Product_Name`, `Product_count`, `Price_per_product`, `Total_price`) VALUES
(1, 'Product_A', 5, 50, 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_table`
--
ALTER TABLE `new_table`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `prot`
--
ALTER TABLE `prot`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `new_table`
--
ALTER TABLE `new_table`
  MODIFY `User_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prot`
--
ALTER TABLE `prot`
  MODIFY `pro_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
