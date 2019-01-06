-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2018 at 12:54 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer store`
--

-- --------------------------------------------------------

--
-- Table structure for table `apperars_in`
--

CREATE TABLE `apperars_in` (
  `CARTID` int(8) NOT NULL,
  `PID` int(8) NOT NULL,
  `QUANTITY` int(5) NOT NULL,
  `PRICESOLD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apperars_in`
--

INSERT INTO `apperars_in` (`CARTID`, `PID`, `QUANTITY`, `PRICESOLD`) VALUES
(8, 1, 2, 500),
(8, 2, 1, 30),
(9, 1, 2, 500),
(9, 2, 1, 30),
(10, 2, 1, 30),
(10, 3, 2, 1200),
(11, 1, 1, 500),
(12, 2, 1, 30),
(12, 3, 2, 1200),
(14, 2, 1, 30),
(14, 3, 1, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CARTID` int(11) NOT NULL,
  `CID` int(5) DEFAULT NULL,
  `SANAME` varchar(30) DEFAULT NULL,
  `CCNUMBER` char(16) NOT NULL,
  `TSTATUS` varchar(20) DEFAULT NULL,
  `TDATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CARTID`, `CID`, `SANAME`, `CCNUMBER`, `TSTATUS`, `TDATE`) VALUES
(1, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(2, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(3, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(4, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(5, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(6, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(7, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(8, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(9, 2, 'New Address', '1452369874562136', 'Processing', '2018-02-05'),
(10, 1, 'New House', '4563214785236985', 'Processing', '2018-08-05'),
(11, 2, 'OLD Address', '1452369874562136', 'Processing', '2018-10-05'),
(12, 2, 'New Address', '1452369874562136', 'Processing', '2018-10-05'),
(13, 1, 'New House', '4563214785236985', 'Processing', '2018-12-05'),
(14, 8, 'New Addr', '412563987452', 'Processing', '2018-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `PID` int(8) NOT NULL,
  `CPUTYPE` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `CCNUMBER` char(16) NOT NULL,
  `SECNUMBER` char(11) DEFAULT NULL,
  `OWNERNAME` varchar(30) NOT NULL,
  `CCTYPE` varchar(15) NOT NULL,
  `CCADDRESS` varchar(40) DEFAULT NULL,
  `EXPDATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`CCNUMBER`, `SECNUMBER`, `OWNERNAME`, `CCTYPE`, `CCADDRESS`, `EXPDATE`) VALUES
('1452369874562136', '123', 'Kelvinkumar', 'Visa', 'gdfg', '2022-05-01'),
('412563987452', '123', 'Test', 'Visa', 'jsefhjfh', '2022-05-01'),
('4563214785236985', '456', 'Jayminkumar', 'Debit', 'enfjfjhn', '2021-10-01'),
('8749878477478', '897', 'Apple', 'maestro', 'ma 98', '2022-05-01'),
('987456898456', '879', 'Jhy Oza', 'Visa', '894 Nh street', '2018-09-19'),
('9999999999999999', '678', 'Kiplan', 'Maestro', '87 Bbud Jmikcf', '2018-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(5) NOT NULL,
  `FNAME` varchar(15) NOT NULL,
  `LNAME` varchar(15) NOT NULL,
  `EMAIL` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `ADDRESS` varchar(30) DEFAULT NULL,
  `PHONE` char(10) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `FNAME`, `LNAME`, `EMAIL`, `PASSWORD`, `ADDRESS`, `PHONE`, `STATUS`) VALUES
(1, 'Jaymin', 'Modi', 'jm@gmail.com', 'jkm', '768 spring Sytet', '1111111111', 'REGULAR'),
(2, 'Kelvin', 'Gandhi', 'kg@gmail.com', 'ksg', '77 HHhn Street', '2222222222', 'SILVER'),
(3, 'Keshav', 'Shah', 'ks@gmail.com', 'kts', '688 HGHbc Street', '3333333333', 'PLATINUM'),
(4, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'jdcjvjfvnj', '4563214789', 'PLATINUM'),
(5, 'Amay', 'abc', 'amay@gmail.com', 'amay', 'fedfjfgji', '4125639874', 'REGULAR'),
(6, 'aaa', 'bbb', 'aaa@aaa.com', 'aaa', 'aaa', '1234567890', 'PLATINUM'),
(7, 'bbb', 'ccc', 'bbb@bbb.com', 'bbb', 'bbb bbfi ', '0987654321', 'REGULAR'),
(8, 'Test21', 'dfd', 'test@gmail.com', 'test', 'hdsfvjd', '1452369874', 'silver');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `PID` int(8) NOT NULL,
  `BTYPE` varchar(20) DEFAULT NULL,
  `WEIGHT` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer_product`
--

CREATE TABLE `offer_product` (
  `PID` int(8) NOT NULL,
  `OFFER_PRICE` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE `printer` (
  `PID` int(8) NOT NULL,
  `PRINTERTYPE` varchar(20) DEFAULT NULL,
  `RESOLUTION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(8) NOT NULL,
  `PTYPE` varchar(20) DEFAULT NULL,
  `PNAME` varchar(20) DEFAULT NULL,
  `PPRICE` double DEFAULT NULL,
  `PDESCRIPTION` varchar(50) DEFAULT NULL,
  `PQUANTITY` int(5) DEFAULT NULL,
  `IMG` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `PTYPE`, `PNAME`, `PPRICE`, `PDESCRIPTION`, `PQUANTITY`, `IMG`) VALUES
(1, 'Desktop', 'Samsung Desktop', 500, 'HP latest laptop with 8 GB RAM', 1, 'images/samsung_desktop.jpg'),
(2, 'Printer', 'CANON Printer', 30, 'Color Printer', 1, 'images/canon printer.jpg'),
(3, 'Laptop', 'Apple Macbook', 1200, 'Latest Macbook Pro', 1, 'images/macbookAir.jpg'),
(4, 'Laptop', 'Dell Laptop', 800, '8 GB RAM', 1, 'images/delllaptop.jpg'),
(5, 'Desktop', 'Asus Desktop', 1000, '16GB RAM', 1, 'images/asus_desktop.jpg'),
(6, 'Printer', 'Brother Printer', 40, 'Color Printer', 1, 'images/brother_printer.jpg'),
(7, 'Laptop', 'HP Laptop', 1200, '16GB RAM', 1, 'images/hp_laptop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `CID` int(5) NOT NULL,
  `SANAME` varchar(30) NOT NULL,
  `RECIPIENTNAME` varchar(30) NOT NULL,
  `STREET` varchar(40) NOT NULL,
  `SNUMBER` varchar(10) DEFAULT NULL,
  `CITY` varchar(20) NOT NULL,
  `STATE` varchar(15) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`CID`, `SANAME`, `RECIPIENTNAME`, `STREET`, `SNUMBER`, `CITY`, `STATE`, `COUNTRY`) VALUES
(1, 'New House', 'Jaymin', 'jfnjdfn', '34356', 'NY', 'NY', 'United States'),
(2, 'New Address', 'Kelvinkumar', 'f,dglgm', '34356', 'JC', 'NJ', 'USA'),
(2, 'OLD Address', 'Kelvin', 'fnrgn', '43555', 'jfs', 'ny', 'USA'),
(8, 'New Addr', 'Test21', 'abc', '34356', 'abc', 'nj', 'United States');

-- --------------------------------------------------------

--
-- Table structure for table `silver_and_above`
--

CREATE TABLE `silver_and_above` (
  `CID` int(5) NOT NULL,
  `CREDITLINE` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silver_and_above`
--

INSERT INTO `silver_and_above` (`CID`, `CREDITLINE`) VALUES
(2, 8786766),
(3, 765);

-- --------------------------------------------------------

--
-- Table structure for table `stored_card`
--

CREATE TABLE `stored_card` (
  `CCNUMBER` char(16) NOT NULL,
  `CID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stored_card`
--

INSERT INTO `stored_card` (`CCNUMBER`, `CID`) VALUES
('4563214785236985', 1),
('1452369874562136', 2),
('8749878477478', 6),
('987456898456', 6),
('9999999999999999', 7),
('412563987452', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apperars_in`
--
ALTER TABLE `apperars_in`
  ADD PRIMARY KEY (`CARTID`,`PID`),
  ADD KEY `APRSFK2` (`PID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CARTID`),
  ADD KEY `CRCDCTFK` (`CID`,`SANAME`),
  ADD KEY `CRDSHADFK` (`CCNUMBER`);

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`CCNUMBER`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`CID`,`SANAME`);

--
-- Indexes for table `silver_and_above`
--
ALTER TABLE `silver_and_above`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `stored_card`
--
ALTER TABLE `stored_card`
  ADD PRIMARY KEY (`CCNUMBER`),
  ADD KEY `STCDCRCDFK` (`CID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apperars_in`
--
ALTER TABLE `apperars_in`
  ADD CONSTRAINT `APRSFK1` FOREIGN KEY (`CARTID`) REFERENCES `cart` (`CARTID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `APRSFK2` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CRCDCTFK` FOREIGN KEY (`CID`,`SANAME`) REFERENCES `shipping_address` (`CID`, `SANAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CRDSHADFK` FOREIGN KEY (`CCNUMBER`) REFERENCES `credit_card` (`CCNUMBER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer`
--
ALTER TABLE `computer`
  ADD CONSTRAINT `CMPRPRDTFK` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `LPTPRDFK` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer_product`
--
ALTER TABLE `offer_product`
  ADD CONSTRAINT `OFFERFK` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `printer`
--
ALTER TABLE `printer`
  ADD CONSTRAINT `PRNTRPRODFK` FOREIGN KEY (`PID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `CSTRSHADFK` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `silver_and_above`
--
ALTER TABLE `silver_and_above`
  ADD CONSTRAINT `SIABCSTRFK` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stored_card`
--
ALTER TABLE `stored_card`
  ADD CONSTRAINT `STCDCRCDFK` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `STCDCRDFK` FOREIGN KEY (`CCNUMBER`) REFERENCES `credit_card` (`CCNUMBER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
