-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2019 at 10:12 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hudumaap_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbo_payments`
--

CREATE TABLE `dbo_payments` (
  `Row_Id` int(11) NOT NULL,
  `Result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ResultExplanation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Music_Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clientcode` text COLLATE utf8_unicode_ci NOT NULL,
  `TransactionApproval` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionCurrency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionAmount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FraudAlert` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FraudExplnation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionNetAmount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionSettlementDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionRollingReserveAmount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TransactionRollingReserveDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerPhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerCountry` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CustomerZip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MobilePaymentRequest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `AccRef` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_Ref` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Trans_Id` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `DownloadStatus_Id` int(11) NOT NULL,
  `Period` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Agent_Id` int(11) NOT NULL,
  `Artist_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dbo_payments`
--

INSERT INTO `dbo_payments` (`Row_Id`, `Result`, `ResultExplanation`, `Music_Code`, `clientcode`, `TransactionApproval`, `TransactionCurrency`, `TransactionAmount`, `FraudAlert`, `FraudExplnation`, `TransactionNetAmount`, `TransactionSettlementDate`, `TransactionRollingReserveAmount`, `TransactionRollingReserveDate`, `CustomerPhone`, `CustomerCountry`, `CustomerAddress`, `CustomerCity`, `CustomerZip`, `MobilePaymentRequest`, `AccRef`, `Token`, `User_Ref`, `Trans_Id`, `DownloadStatus_Id`, `Period`, `Agent_Id`, `Artist_Id`) VALUES
(4, '000', 'Transaction Paid', '1', 'EAPCEXPO', '71706304142', 'TZS', '1200.00', '001', '', '1158.00', '2019/03/25', '0.00', '2019/03/22', '0712334223', 'Array', 'DSM', '0', '0', 'Paid', '1-1020190508090525-EAPCEXPO', 'A54A74D7-B7F8-4F6A-BE03-4DA423BAB228', '1-1020190508090525-EAPCEXPO', 'A54A74D7-B7F8-4F6A-BE03-4DA423BAB228', 0, '201905', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_purchases`
--

CREATE TABLE `sms_purchases` (
  `id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `amount` float NOT NULL,
  `rate` float NOT NULL,
  `typeid` int(11) NOT NULL,
  `txncode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_purchases`
--

INSERT INTO `sms_purchases` (`id`, `purchase_date`, `user_id`, `quantity`, `amount`, `rate`, `typeid`, `txncode`, `status_id`) VALUES
(1, '2019-04-30 10:02:22', 10, 1000, 10000, 10, 2, '2-1020190430060222', 0),
(2, '2019-04-30 10:10:11', 10, 400, 33200, 83, 3, '31020190430061011', 0),
(3, '2019-04-30 10:27:24', 10, 2000, 166000, 83, 3, '31020190430062724', 0),
(4, '2019-04-30 10:33:31', 10, 3400, 282200, 83, 3, '3-1020190430063331', 0),
(5, '2019-04-30 11:06:36', 10, 600, 6000, 10, 2, '2-1020190430070636', 0),
(6, '2019-04-30 15:47:33', 10, 500, 5000, 10, 2, '2-1020190430114733', 0),
(7, '2019-05-01 10:56:09', 10, 2000, 20000, 10, 2, '2-1020190501065609', 0),
(8, '2019-05-02 11:49:45', 10, 6000, 0, 0, 1, '1-1020190502074945', 0),
(9, '2019-05-03 10:55:51', 0, 56767, 0, 0, 1, '1-20190503115551', 0),
(10, '2019-05-04 09:25:03', 10, 1000, 0, 0, 1, '1-1020190504102503', 0),
(11, '2019-05-04 09:28:45', 10, 100, 500, 5, 1, '1-1020190504102845', 0),
(12, '2019-05-04 15:02:51', 10, 90, 450, 5, 1, '1-1020190504040251', 0),
(13, '2019-05-06 10:51:39', 10, 300, 1500, 5, 1, '1-1020190506115139', 0),
(14, '2019-05-08 14:05:25', 10, 1000, 5000, 5, 1, '1-1020190508090525-EAPCEXPO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbo_payments`
--
ALTER TABLE `dbo_payments`
  ADD PRIMARY KEY (`Row_Id`);

--
-- Indexes for table `sms_purchases`
--
ALTER TABLE `sms_purchases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbo_payments`
--
ALTER TABLE `dbo_payments`
  MODIFY `Row_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_purchases`
--
ALTER TABLE `sms_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
