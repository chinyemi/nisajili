-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2019 at 01:18 PM
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
-- Database: `afyapopo_glsmw`
--

-- --------------------------------------------------------

--
-- Table structure for table `actual_expenses`
--

CREATE TABLE `actual_expenses` (
  `expenseID` int(5) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Site` varchar(250) DEFAULT NULL,
  `glsyear` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual_expenses`
--

INSERT INTO `actual_expenses` (`expenseID`, `Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `glsyear`) VALUES
(3, 'expenses1', 99999999.99, '2019-05-15', 'rrgrtqwtwqetweqtqw', 'Lilongwe', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `actual_revenue`
--

CREATE TABLE `actual_revenue` (
  `revenueID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Site` varchar(250) DEFAULT NULL,
  `glsyear` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actual_revenue`
--

INSERT INTO `actual_revenue` (`revenueID`, `Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `glsyear`) VALUES
(1, 'Revex1', 2000000.00, '2019-05-07', 'this is actual', 'Lilongwe', NULL),
(2, 'Revex1', 8999.00, '2019-05-07', 'kjlkjlkj', 'Lilongwe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `bankID` int(4) NOT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `bank_address` varchar(200) DEFAULT NULL,
  `swift_code` varchar(50) DEFAULT NULL,
  `account_currency` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`bankID`, `bank_name`, `account_name`, `account_number`, `branch_name`, `bank_address`, `swift_code`, `account_currency`) VALUES
(1, 'Barclays Bank Harare', 'International Christian Ministries', '1546449', 'Hurlingham Branch', 'Barclays Westend Building, Off Waiyaki Way\r\nPO Box 30120 - 00100\r\nNairobi\r\nKenya', 'BARCKENX', 'US$'),
(2, 'MPESA', 'GLS2018', '825500', NULL, NULL, NULL, 'KSH');

-- --------------------------------------------------------

--
-- Table structure for table `budget_expenses`
--

CREATE TABLE `budget_expenses` (
  `expenseID` int(5) NOT NULL DEFAULT '0',
  `Type` varchar(50) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Site` varchar(250) DEFAULT NULL,
  `glsyear` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_expenses`
--

INSERT INTO `budget_expenses` (`expenseID`, `Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `glsyear`) VALUES
(2, 'Delivery Expense', 20000.00, '2019-05-06', 'Some descriptions', 'Lilongwe', NULL),
(3, 'Salaries Expense ', 43636.00, '2019-05-06', 'gddtjtdjtfk', 'Blantyre', NULL),
(4, 'Matumizi ya lazima', 10000.00, '2019-05-06', 'Amechukua Gid', 'Lilongwe', NULL),
(0, 'Delivery Budget', 100000.00, '2019-05-16', 'gdfhfsd', 'Lilongwe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `budget_expensetype`
--

CREATE TABLE `budget_expensetype` (
  `exptypeID` int(4) NOT NULL,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_expensetype`
--

INSERT INTO `budget_expensetype` (`exptypeID`, `expType`, `ExpCategory`, `Description`) VALUES
(3, 'Nauli za kwenda kwa Marwa', 'Extraordinary Expenses', 'Nauli ya Gid'),
(2, 'Matumizi ya lazima', 'Operating Expenses', 'Some matumizi hapa');

-- --------------------------------------------------------

--
-- Table structure for table `budget_revenue`
--

CREATE TABLE `budget_revenue` (
  `Type` varchar(50) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Site` varchar(250) DEFAULT NULL,
  `revenueID` int(11) NOT NULL,
  `glsyear` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_revenue`
--

INSERT INTO `budget_revenue` (`Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `revenueID`, `glsyear`) VALUES
('Revex1', 1000000.00, '2019-05-07', 'budget ya rev', 'Lilongwe', 1, NULL);

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
-- Table structure for table `ExpenseType`
--

CREATE TABLE `ExpenseType` (
  `exptypeID` int(4) NOT NULL,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ExpenseType`
--

INSERT INTO `ExpenseType` (`exptypeID`, `expType`, `ExpCategory`, `Description`) VALUES
(1, 'expenses1', 'Operating Expenses', 'dlashflsafadsf');

-- --------------------------------------------------------

--
-- Table structure for table `member_groups`
--

CREATE TABLE `member_groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `membersno` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_groups`
--

INSERT INTO `member_groups` (`group_id`, `group_name`, `user_id`, `date_created`, `membersno`) VALUES
(1, 'WAZEE WA KANISA', 10, '2019-05-01 10:31:43', 2),
(2, 'WAFADHILI WA KANISA', 10, '2019-05-01 10:32:01', 4),
(3, 'UMOJA WA WAKINA MAMA', 10, '2019-05-01 10:33:21', 3),
(18, 'huduma kwa wateja', 10, '2019-05-04 16:15:51', 11),
(5, 'AKINA MAMA WAZEEIYA', 10, '2019-05-01 11:37:32', 2),
(6, 'Watsap User', 10, '2019-05-02 14:55:07', 5),
(7, 'fnfh', 0, '2019-05-03 11:53:50', 11),
(12, 'JIMBO JIPYA BAGAMOYO', 10, '2019-05-04 12:11:51', 5),
(17, 'Jerusalem', 10, '2019-05-04 15:51:57', 10),
(16, 'Waliohudhuria', 10, '2019-05-04 09:40:09', 2),
(19, 'LHCC', 10, '2019-05-06 11:46:11', 10),
(20, 'MENGI', 10, '2019-05-07 08:34:58', 10),
(21, 'mazulia', 10, '2019-05-07 08:40:18', 10),
(22, 'MARWA', 10, '2019-05-07 09:21:17', 10);

-- --------------------------------------------------------

--
-- Table structure for table `member_group_list`
--

CREATE TABLE `member_group_list` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_group_list`
--

INSERT INTO `member_group_list` (`id`, `member_id`, `user_id`, `group_id`, `date_created`) VALUES
(2, 0, 10, 0, '2019-05-01 12:23:09'),
(3, 10, 10, 3, '2019-05-01 12:27:48'),
(4, 36, 10, 3, '2019-05-01 12:28:18'),
(5, 35, 10, 1, '2019-05-01 12:31:54'),
(6, 34, 10, 2, '2019-05-01 12:35:03'),
(7, 36, 10, 5, '2019-05-01 12:37:23'),
(8, 36, 10, 2, '2019-05-01 12:38:14'),
(9, 36, 10, 2, '2019-05-01 12:39:24'),
(10, 36, 10, 1, '2019-05-01 12:53:52'),
(11, 33, 10, 2, '2019-05-01 13:52:47'),
(12, 35, 10, 5, '2019-05-02 12:45:45'),
(13, 36, 10, 0, '2019-05-02 14:55:27'),
(14, 35, 10, 0, '2019-05-02 14:55:34'),
(15, 34, 10, 0, '2019-05-02 14:55:43'),
(16, 10, 10, 0, '2019-05-02 14:56:34'),
(17, 35, 10, 6, '2019-05-02 14:58:32'),
(18, 34, 10, 6, '2019-05-02 14:58:39'),
(19, 33, 10, 6, '2019-05-02 14:58:53'),
(20, 36, 10, 6, '2019-05-02 15:01:04'),
(21, 34, 10, 6, '2019-05-02 15:01:12'),
(22, 10, 10, 3, '2019-05-02 15:01:21'),
(23, 5, 10, 16, '2019-05-04 09:41:27'),
(24, 7, 10, 16, '2019-05-04 09:41:45'),
(25, 1, 10, 17, '2019-05-04 15:52:26'),
(26, 2, 10, 17, '2019-05-04 15:52:26'),
(27, 3, 10, 17, '2019-05-04 15:52:26'),
(28, 4, 10, 17, '2019-05-04 15:52:26'),
(29, 5, 10, 17, '2019-05-04 15:52:26'),
(30, 6, 10, 17, '2019-05-04 15:52:26'),
(31, 7, 10, 17, '2019-05-04 15:52:26'),
(32, 8, 10, 17, '2019-05-04 15:52:26'),
(33, 9, 10, 17, '2019-05-04 15:52:26'),
(34, 10, 10, 17, '2019-05-04 15:52:26'),
(35, 11, 10, 18, '2019-05-04 16:16:14'),
(36, 1, 10, 18, '2019-05-04 16:17:20'),
(37, 2, 10, 18, '2019-05-04 16:17:20'),
(38, 3, 10, 18, '2019-05-04 16:17:20'),
(39, 4, 10, 18, '2019-05-04 16:17:20'),
(40, 5, 10, 18, '2019-05-04 16:17:20'),
(41, 6, 10, 18, '2019-05-04 16:17:20'),
(42, 7, 10, 18, '2019-05-04 16:17:20'),
(43, 8, 10, 18, '2019-05-04 16:17:20'),
(44, 9, 10, 18, '2019-05-04 16:17:20'),
(45, 10, 10, 18, '2019-05-04 16:17:20'),
(46, 1, 10, 19, '2019-05-06 11:47:09'),
(47, 2, 10, 19, '2019-05-06 11:47:09'),
(48, 3, 10, 19, '2019-05-06 11:47:09'),
(49, 4, 10, 19, '2019-05-06 11:47:09'),
(50, 5, 10, 19, '2019-05-06 11:47:09'),
(51, 6, 10, 19, '2019-05-06 11:47:09'),
(52, 7, 10, 19, '2019-05-06 11:47:09'),
(53, 8, 10, 19, '2019-05-06 11:47:09'),
(54, 9, 10, 19, '2019-05-06 11:47:09'),
(55, 10, 10, 19, '2019-05-06 11:47:09'),
(56, 1, 10, 20, '2019-05-07 08:35:17'),
(57, 2, 10, 20, '2019-05-07 08:35:17'),
(58, 3, 10, 20, '2019-05-07 08:35:17'),
(59, 4, 10, 20, '2019-05-07 08:35:17'),
(60, 5, 10, 20, '2019-05-07 08:35:17'),
(61, 6, 10, 20, '2019-05-07 08:35:17'),
(62, 7, 10, 20, '2019-05-07 08:35:17'),
(63, 8, 10, 20, '2019-05-07 08:35:17'),
(64, 9, 10, 20, '2019-05-07 08:35:17'),
(65, 10, 10, 20, '2019-05-07 08:35:17'),
(66, 1, 10, 21, '2019-05-07 08:40:30'),
(67, 2, 10, 21, '2019-05-07 08:40:30'),
(68, 3, 10, 21, '2019-05-07 08:40:30'),
(69, 4, 10, 21, '2019-05-07 08:40:30'),
(70, 5, 10, 21, '2019-05-07 08:40:30'),
(71, 6, 10, 21, '2019-05-07 08:40:30'),
(72, 7, 10, 21, '2019-05-07 08:40:30'),
(73, 8, 10, 21, '2019-05-07 08:40:30'),
(74, 9, 10, 21, '2019-05-07 08:40:30'),
(75, 10, 10, 21, '2019-05-07 08:40:30'),
(76, 1, 10, 22, '2019-05-07 09:22:17'),
(77, 2, 10, 22, '2019-05-07 09:22:17'),
(78, 3, 10, 22, '2019-05-07 09:22:17'),
(79, 4, 10, 22, '2019-05-07 09:22:17'),
(80, 5, 10, 22, '2019-05-07 09:22:17'),
(81, 6, 10, 22, '2019-05-07 09:22:17'),
(82, 7, 10, 22, '2019-05-07 09:22:17'),
(83, 8, 10, 22, '2019-05-07 09:22:17'),
(84, 9, 10, 22, '2019-05-07 09:22:17'),
(85, 10, 10, 22, '2019-05-07 09:22:17'),
(86, 14, 10, 7, '2019-05-07 12:45:28'),
(87, 1, 10, 7, '2019-05-07 15:38:55'),
(88, 2, 10, 7, '2019-05-07 15:38:55'),
(89, 3, 10, 7, '2019-05-07 15:38:55'),
(90, 4, 10, 7, '2019-05-07 15:38:55'),
(91, 5, 10, 7, '2019-05-07 15:38:55'),
(92, 6, 10, 7, '2019-05-07 15:38:55'),
(93, 7, 10, 7, '2019-05-07 15:38:55'),
(94, 8, 10, 7, '2019-05-07 15:38:55'),
(95, 9, 10, 7, '2019-05-07 15:38:55'),
(96, 10, 10, 7, '2019-05-07 15:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `RevenueType`
--

CREATE TABLE `RevenueType` (
  `revtypeID` int(11) NOT NULL,
  `revType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `RevenueType`
--

INSERT INTO `RevenueType` (`revtypeID`, `revType`, `revCategory`, `Description`) VALUES
(1, 'Revex1', 'cat1', 'description');

-- --------------------------------------------------------

--
-- Table structure for table `sent_sms`
--

CREATE TABLE `sent_sms` (
  `sent_Id` int(11) NOT NULL,
  `sms_sent` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sms_id` int(11) NOT NULL,
  `batch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_count` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sent_sms`
--

INSERT INTO `sent_sms` (`sent_Id`, `sms_sent`, `sent_to`, `user_id`, `time_in`, `sms_type`, `sms_id`, `batch`, `receiver_count`) VALUES
(1, 'This sms was meant to test if the update feature is working correctly', '255758401046', 10, '2019-05-02 14:14:18', 'SMS', 8, '20190502091418', 2),
(2, 'This sms was meant to test if the update feature is working correctly', '255715525707', 10, '2019-05-02 14:14:18', 'SMS', 8, '20190502091418', 2),
(4, 'Mchungaji kesho atachelewa kurudi naomba mjiandae kuimba saaaaanaa', 'gideon.mugalula@gmail.com', 10, '2019-05-02 14:33:50', 'EMAIL', 5, '20190502093350', 2),
(5, 'Mchungaji kesho atachelewa kurudi naomba mjiandae kuimba saaaaanaa', 'info@hudumaapp.com', 10, '2019-05-02 14:33:50', 'EMAIL', 5, '20190502093350', 2),
(6, 'This sms was meant to test if the update feature is working correctly', '255713427857', 10, '2019-05-02 14:34:22', 'WHATSAPP', 8, '20190502093421', 3),
(7, 'This sms was meant to test if the update feature is working correctly', '255713460429', 10, '2019-05-02 14:34:25', 'WHATSAPP', 8, '20190502093421', 3),
(8, 'This sms was meant to test if the update feature is working correctly', '255715525707', 10, '2019-05-02 14:34:26', 'WHATSAPP', 8, '20190502093421', 3),
(9, 'Mesage ya Mwisho', '0713427857', 0, '2019-05-02 16:52:14', 'WHATSAPP', 3, '20190502045210', 1),
(10, 'Hii ni test ya kwanza', 'ceombutho@gmail.com', 10, '2019-05-04 10:36:04', 'EMAIL', 9, '20190504103604', 2),
(11, 'Hii ni test ya kwanza', 'ceombutho@gmail.com', 10, '2019-05-04 10:36:05', 'EMAIL', 9, '20190504103604', 2),
(12, 'One ofice', '0758401046', 10, '2019-05-07 12:45:56', 'SMS', 10, '20190507124556', 1),
(13, 'One ofice', 'gideon.mugalula@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(14, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(15, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(16, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(17, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(18, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(19, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(20, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(21, 'One ofice', 'martin.stegmaier@globalleadership.org', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(22, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:02', 'EMAIL', 10, '20190507034002', 11),
(23, 'One ofice', 'ceombutho@gmail.com', 10, '2019-05-07 15:40:03', 'EMAIL', 10, '20190507034002', 11);

-- --------------------------------------------------------

--
-- Table structure for table `siteseason`
--

CREATE TABLE `siteseason` (
  `seasonID` int(4) NOT NULL,
  `Year` varchar(4) DEFAULT NULL,
  `SeasonStatus` varchar(10) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteseason`
--

INSERT INTO `siteseason` (`seasonID`, `Year`, `SeasonStatus`, `Description`) VALUES
(1, '2018', 'CLOSED', 'Season Opened'),
(2, '2019', 'OPEN', 'Season Open'),
(6, '2020', 'CLOSED', 'KHGHKG'),
(8, '2022', 'CLOSED', 'hfhffjf\'jhfjfjdjdjd\'hjfjgdj');

-- --------------------------------------------------------

--
-- Table structure for table `sms_balance`
--

CREATE TABLE `sms_balance` (
  `id` int(11) NOT NULL,
  `member_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sms_balance` float NOT NULL,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_balance`
--

INSERT INTO `sms_balance` (`id`, `member_code`, `sms_balance`, `sms_type`, `user_id`) VALUES
(1, 'AA', 2, 'SMS', 0),
(2, 'AA', 2, 'EMAIL', 0),
(3, 'AA', 3, 'WHATSAPP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_list`
--

CREATE TABLE `sms_list` (
  `sms_id` int(11) NOT NULL,
  `sms_description` text COLLATE utf8_unicode_ci NOT NULL,
  `sms_composedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sms_recipients` float NOT NULL,
  `user_Id` int(11) NOT NULL,
  `email_recipients` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_list`
--

INSERT INTO `sms_list` (`sms_id`, `sms_description`, `sms_composedate`, `sms_recipients`, `user_Id`, `email_recipients`) VALUES
(1, 'new sms', '2019-04-28 13:58:47', 0, 10, 0),
(2, 'Karibuni katika Ibada yetu itakayofanyika kesho asubuhi', '2019-04-28 14:01:25', 0, 10, 2),
(3, 'Mesage ya Mwisho', '2019-04-28 14:21:45', 0, 10, 0),
(4, 'skldmsalkdmnlaksdmnlaksdmnlaksn dlasndlaksndlaknsldasdasdas', '2019-04-28 16:51:20', 0, 10, 0),
(5, 'Mchungaji kesho atachelewa kurudi naomba mjiandae kuimba saaaaanaa', '2019-04-29 15:03:40', 0, 10, 0),
(6, 'Azimio la Mbezi beach linasisitiza kudeliver ontime na kwenda sokoni . Upatapo ujumbe huu mjulishe na mwenzio', '2019-04-30 09:48:38', 0, 10, 0),
(7, 'OFISI MPYA AUJ OFISI HII HII', '2019-04-30 16:24:57', 0, 10, 0),
(8, 'This sms was meant to test if the update feature is working correctly', '2019-05-01 11:46:50', 0, 10, 0),
(9, 'Hii ni test ya kwanza', '2019-05-04 10:08:21', 0, 10, 0),
(10, 'One ofice', '2019-05-07 12:15:17', 0, 10, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `sms_rate`
--

CREATE TABLE `sms_rate` (
  `rate_id` int(11) NOT NULL,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float NOT NULL,
  `current_balance` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_rate`
--

INSERT INTO `sms_rate` (`rate_id`, `sms_type`, `rate`, `current_balance`) VALUES
(1, 'EMAIL', 5, 87),
(2, 'WATSHAP', 10, 0),
(3, 'SMS', 83, 11.0482);

-- --------------------------------------------------------

--
-- Table structure for table `webelements`
--

CREATE TABLE `webelements` (
  `elementID` int(5) NOT NULL,
  `Content` text,
  `Category` varchar(100) DEFAULT NULL,
  `Toggle` varchar(4) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webelements`
--

INSERT INTO `webelements` (`elementID`, `Content`, `Category`, `Toggle`, `Position`) VALUES
(1, 'The Global Leadership Summit', 'Title', 'YES', 'Top Section'),
(2, 'Fresh, actionable and inspiring leadership content from a world-class faculty at a convenient location near you.	', 'Slogan', 'YES', 'Top Section'),
(12, '<script type=\"text/javascript\">function add_chatinline(){var hccid=96094733;var nt=document.createElement(\"script\");nt.async=true;nt.src=\"https://mylivechat.com/chatinline.aspx?hccid=\"+hccid;var ct=document.getElementsByTagName(\"script\")[0];ct.parentNode.insertBefore(nt,ct);}\r\nadd_chatinline(); </script>\r\n', 'Chat', 'NO', 'Bottom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actual_expenses`
--
ALTER TABLE `actual_expenses`
  ADD PRIMARY KEY (`expenseID`),
  ADD KEY `idx1` (`Type`);

--
-- Indexes for table `actual_revenue`
--
ALTER TABLE `actual_revenue`
  ADD PRIMARY KEY (`revenueID`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `budget_expensetype`
--
ALTER TABLE `budget_expensetype`
  ADD PRIMARY KEY (`exptypeID`);

--
-- Indexes for table `budget_revenue`
--
ALTER TABLE `budget_revenue`
  ADD PRIMARY KEY (`revenueID`);

--
-- Indexes for table `dbo_payments`
--
ALTER TABLE `dbo_payments`
  ADD PRIMARY KEY (`Row_Id`);

--
-- Indexes for table `ExpenseType`
--
ALTER TABLE `ExpenseType`
  ADD PRIMARY KEY (`exptypeID`);

--
-- Indexes for table `member_groups`
--
ALTER TABLE `member_groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `member_group_list`
--
ALTER TABLE `member_group_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RevenueType`
--
ALTER TABLE `RevenueType`
  ADD PRIMARY KEY (`revtypeID`);

--
-- Indexes for table `sent_sms`
--
ALTER TABLE `sent_sms`
  ADD PRIMARY KEY (`sent_Id`);

--
-- Indexes for table `siteseason`
--
ALTER TABLE `siteseason`
  ADD PRIMARY KEY (`seasonID`);

--
-- Indexes for table `sms_balance`
--
ALTER TABLE `sms_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_list`
--
ALTER TABLE `sms_list`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `sms_purchases`
--
ALTER TABLE `sms_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_rate`
--
ALTER TABLE `sms_rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `webelements`
--
ALTER TABLE `webelements`
  ADD PRIMARY KEY (`elementID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actual_expenses`
--
ALTER TABLE `actual_expenses`
  MODIFY `expenseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `actual_revenue`
--
ALTER TABLE `actual_revenue`
  MODIFY `revenueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `bankID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `budget_expensetype`
--
ALTER TABLE `budget_expensetype`
  MODIFY `exptypeID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `budget_revenue`
--
ALTER TABLE `budget_revenue`
  MODIFY `revenueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dbo_payments`
--
ALTER TABLE `dbo_payments`
  MODIFY `Row_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ExpenseType`
--
ALTER TABLE `ExpenseType`
  MODIFY `exptypeID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_groups`
--
ALTER TABLE `member_groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `member_group_list`
--
ALTER TABLE `member_group_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `RevenueType`
--
ALTER TABLE `RevenueType`
  MODIFY `revtypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sent_sms`
--
ALTER TABLE `sent_sms`
  MODIFY `sent_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `siteseason`
--
ALTER TABLE `siteseason`
  MODIFY `seasonID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sms_balance`
--
ALTER TABLE `sms_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_list`
--
ALTER TABLE `sms_list`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sms_purchases`
--
ALTER TABLE `sms_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sms_rate`
--
ALTER TABLE `sms_rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `webelements`
--
ALTER TABLE `webelements`
  MODIFY `elementID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
