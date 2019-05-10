-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2019 at 11:17 AM
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

DROP TABLE IF EXISTS `actual_expenses`;
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
-- Truncate table before insert `actual_expenses`
--

TRUNCATE TABLE `actual_expenses`;
--
-- Dumping data for table `actual_expenses`
--

INSERT INTO `actual_expenses` (`expenseID`, `Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `glsyear`) VALUES
(3, 'expenses1', 99999999.99, '2019-05-15', 'rrgrtqwtwqetweqtqw', 'Lilongwe', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `actual_revenue`
--

DROP TABLE IF EXISTS `actual_revenue`;
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
-- Truncate table before insert `actual_revenue`
--

TRUNCATE TABLE `actual_revenue`;
--
-- Dumping data for table `actual_revenue`
--

INSERT INTO `actual_revenue` (`revenueID`, `Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `glsyear`) VALUES
(1, 'Revex1', 2000000.00, '2019-05-07', 'this is actual', 'Lilongwe', '2019'),
(2, 'Revex1', 8999.00, '2019-05-07', 'kjlkjlkj', 'Lilongwe', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

DROP TABLE IF EXISTS `bankdetails`;
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
-- Truncate table before insert `bankdetails`
--

TRUNCATE TABLE `bankdetails`;
--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`bankID`, `bank_name`, `account_name`, `account_number`, `branch_name`, `bank_address`, `swift_code`, `account_currency`) VALUES
(1, 'Barclays Bank Harare', 'International Christian Ministries', '1546449', 'Hurlingham Branch', 'Barclays Westend Building, Off Waiyaki Way\r\nPO Box 30120 - 00100\r\nNairobi\r\nKenya', 'BARCKENX', 'US$'),
(2, 'MPESA', 'GLS2018', '825500', NULL, NULL, NULL, 'KSH');

-- --------------------------------------------------------

--
-- Table structure for table `billingsummary`
--

DROP TABLE IF EXISTS `billingsummary`;
CREATE TABLE `billingsummary` (
  `billingid` int(6) NOT NULL,
  `totalsmssent` double(10,2) DEFAULT NULL,
  `smsprice` double(10,2) DEFAULT NULL,
  `smsbilledamount` double(10,2) DEFAULT NULL,
  `billingrate` double(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `billingsummary`
--

TRUNCATE TABLE `billingsummary`;
--
-- Dumping data for table `billingsummary`
--

INSERT INTO `billingsummary` (`billingid`, `totalsmssent`, `smsprice`, `smsbilledamount`, `billingrate`) VALUES
(1, 0.00, 0.38, 0.00, 0.09);

-- --------------------------------------------------------

--
-- Table structure for table `budget_expenses`
--

DROP TABLE IF EXISTS `budget_expenses`;
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
-- Truncate table before insert `budget_expenses`
--

TRUNCATE TABLE `budget_expenses`;
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

DROP TABLE IF EXISTS `budget_expensetype`;
CREATE TABLE `budget_expensetype` (
  `exptypeID` int(4) NOT NULL,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `budget_expensetype`
--

TRUNCATE TABLE `budget_expensetype`;
--
-- Dumping data for table `budget_expensetype`
--

INSERT INTO `budget_expensetype` (`exptypeID`, `expType`, `ExpCategory`, `Description`) VALUES
(2, 'Matumizi ya lazima', 'Operating Expenses', 'Some matumizi hapa');

-- --------------------------------------------------------

--
-- Table structure for table `budget_revenue`
--

DROP TABLE IF EXISTS `budget_revenue`;
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
-- Truncate table before insert `budget_revenue`
--

TRUNCATE TABLE `budget_revenue`;
--
-- Dumping data for table `budget_revenue`
--

INSERT INTO `budget_revenue` (`Type`, `Amount`, `DateRecorded`, `Description`, `Site`, `revenueID`, `glsyear`) VALUES
('Revex1', 1000000.00, '2019-05-07', 'budget ya rev', 'Lilongwe', 1, NULL),
('Operational', 2000000.00, '2019-05-10', 'j v j sdj mkmidmdomsdmiodfnnjdfnincxmkcmxknjkfnn xinin onoi', 'Lilongwe', 2, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `cmembership`
--

DROP TABLE IF EXISTS `cmembership`;
CREATE TABLE `cmembership` (
  `UserID` int(5) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Fullname` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DoB` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `MobileNo` varchar(50) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Userlevel` varchar(100) DEFAULT NULL,
  `sessionID` varchar(255) DEFAULT NULL,
  `dateregistered` varchar(50) DEFAULT NULL,
  `JobDescriptions` varchar(255) DEFAULT NULL,
  `DateEmployed` varchar(50) DEFAULT NULL,
  `ContractDurations` double(10,2) DEFAULT NULL,
  `MonthlySalary` double(10,2) DEFAULT NULL,
  `UserAccountSuspended` varchar(10) DEFAULT NULL,
  `ForcedLogOff` varchar(50) DEFAULT NULL,
  `SpecialAdminRoles` varchar(4) DEFAULT 'NO',
  `Image` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `cmembership`
--

TRUNCATE TABLE `cmembership`;
--
-- Dumping data for table `cmembership`
--

INSERT INTO `cmembership` (`UserID`, `UserName`, `Password`, `Fullname`, `Gender`, `DoB`, `Email`, `MobileNo`, `Designation`, `Department`, `Userlevel`, `sessionID`, `dateregistered`, `JobDescriptions`, `DateEmployed`, `ContractDurations`, `MonthlySalary`, `UserAccountSuspended`, `ForcedLogOff`, `SpecialAdminRoles`, `Image`) VALUES
(10, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'System Administrator', 'Male', '2004-10-18', 'mbutho@digitalbraintz.com', '0713427857', 'Technical Support', NULL, 'Administrator', 'o35ggkhmaolrsisf92ugeu5bi0', '2018-09-18', NULL, NULL, NULL, NULL, 'NO', 'NO', 'NO', NULL),
(34, 'wendell', '42825d48323675e6ee175947ad8f5bd5', 'Wendell', 'Male', '1975-07-11', 'wendell@tpi.co.za', '+26775340976', 'Country Director', NULL, 'Administrator', NULL, '2019-03-22', NULL, NULL, NULL, NULL, 'NO', NULL, 'NO', NULL),
(33, 'werner', '827ccb0eea8a706c4c34a16891f84e7b', 'Werner Rossow', 'Male', '1982-06-15', 'werner@willowcreeksa.co.za', '+27833569760', 'Producer', NULL, 'Administrator', 'm4ser62tqu3spk8g1n94a35go0', '2019-03-22', NULL, NULL, NULL, NULL, 'NO', 'NO', 'NO', NULL),
(35, 'emily', 'c2533fa4fcb327c2a3e1430360cd1d85', 'Emily Rankoko', 'Female', '1997-03-05', 'minkier@yahoo.com', '0713525707', 'Technical Support', NULL, 'Normal', '', '2019-03-26', NULL, NULL, NULL, NULL, 'NO', 'NO', 'NO', NULL),
(41, 'mathew2', '827ccb0eea8a706c4c34a16891f84e7b', 'Mathew Mbaga', 'Male', NULL, 'werner@willowcreeksa.co.za', '+26775340976', 'Producer', NULL, 'Manager', NULL, '2019-05-16', NULL, NULL, NULL, NULL, 'YES', NULL, 'NO', 'BPR-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dbo_payments`
--

DROP TABLE IF EXISTS `dbo_payments`;
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
-- Truncate table before insert `dbo_payments`
--

TRUNCATE TABLE `dbo_payments`;
--
-- Dumping data for table `dbo_payments`
--

INSERT INTO `dbo_payments` (`Row_Id`, `Result`, `ResultExplanation`, `Music_Code`, `clientcode`, `TransactionApproval`, `TransactionCurrency`, `TransactionAmount`, `FraudAlert`, `FraudExplnation`, `TransactionNetAmount`, `TransactionSettlementDate`, `TransactionRollingReserveAmount`, `TransactionRollingReserveDate`, `CustomerPhone`, `CustomerCountry`, `CustomerAddress`, `CustomerCity`, `CustomerZip`, `MobilePaymentRequest`, `AccRef`, `Token`, `User_Ref`, `Trans_Id`, `DownloadStatus_Id`, `Period`, `Agent_Id`, `Artist_Id`) VALUES
(4, '000', 'Transaction Paid', '1', 'EAPCEXPO', '71706304142', 'TZS', '1200.00', '001', '', '1158.00', '2019/03/25', '0.00', '2019/03/22', '0712334223', 'Array', 'DSM', '0', '0', 'Paid', '1-1020190508090525-EAPCEXPO', 'A54A74D7-B7F8-4F6A-BE03-4DA423BAB228', '1-1020190508090525-EAPCEXPO', 'A54A74D7-B7F8-4F6A-BE03-4DA423BAB228', 0, '201905', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delegate`
--

DROP TABLE IF EXISTS `delegate`;
CREATE TABLE `delegate` (
  `delegateID` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `paymentrefnum` varchar(100) DEFAULT NULL,
  `ticketNo` varchar(100) DEFAULT NULL,
  `datereg` date DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `package` varchar(20) DEFAULT NULL,
  `checkedin` varchar(4) DEFAULT NULL,
  `teamedition` varchar(4) DEFAULT NULL,
  `gatepass` varchar(4) DEFAULT 'NO',
  `vehicletype` varchar(100) DEFAULT NULL,
  `registrationnum` varchar(50) DEFAULT NULL,
  `glsyear` varchar(4) DEFAULT NULL,
  `ticket_paid` varchar(4) DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `payment_ref_no` varchar(255) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `payment_date` varchar(100) DEFAULT NULL,
  `pesapal_tranx_track_id` varchar(250) DEFAULT NULL,
  `cert_paid` varchar(4) DEFAULT 'NO',
  `cert_amount` double(10,2) DEFAULT NULL,
  `cert_pay_mode` varchar(250) DEFAULT NULL,
  `cert_pay_ref` varchar(250) DEFAULT NULL,
  `cert_pay_date` date DEFAULT NULL,
  `glssite` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'not_done.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `delegate`
--

TRUNCATE TABLE `delegate`;
--
-- Dumping data for table `delegate`
--

INSERT INTO `delegate` (`delegateID`, `fullname`, `gender`, `mobile`, `email`, `organization`, `paymentrefnum`, `ticketNo`, `datereg`, `amount`, `package`, `checkedin`, `teamedition`, `gatepass`, `vehicletype`, `registrationnum`, `glsyear`, `ticket_paid`, `payment_mode`, `payment_ref_no`, `payment_status`, `payment_method`, `payment_date`, `pesapal_tranx_track_id`, `cert_paid`, `cert_amount`, `cert_pay_mode`, `cert_pay_ref`, `cert_pay_date`, `glssite`, `image`) VALUES
(1, 'Mbutho Chibwaye', 'Male', '0713427857', 'ceombutho@gmail.com', 'DigitalBrain', 'ZNGSQIH', NULL, '2019-04-08', 50.00, 'NORMAL', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'NO', NULL, NULL, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, NULL, NULL, 'Lilongwe', 'not_done.png'),
(2, 'Mathew Mbaga', NULL, '0713460429', 'ceombutho@gmail.com', 'SELF', 'XOJS', 'HAR155020754C', '2019-04-08', 0.00, 'COMPLIMENTARY', 'YES', 'NO', 'YES', 'Nissan', 'T282DMS', '2019', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'XOJS', '2019-04-08', 'Lilongwe', 'not_done.png'),
(3, 'Edith Lyimo', NULL, '0715525707', 'ceombutho@gmail.com', 'SELF', 'WZTK', 'BUL849023423S', '2019-04-08', 0.00, 'SPONSORED', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'WZTK', '2019-04-08', 'Blantyre', 'not_done.png'),
(4, 'Mbutho Chibwaye', 'Male', '0713427857', 'ceombutho@gmail.com', 'SELF', '8SA6UTJ', 'Gwe1654114035N', '2019-04-15', 50.00, 'NORMAL', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', 'Cash', '77777', NULL, NULL, '2019-04-04', NULL, 'YES', 1000.00, 'Cash', '8SA6UTJ', '2019-04-04', 'Blantyre', 'not_done.png'),
(5, 'Chinyemi Mbutho', 'Male', '0762210399', 'ceombutho@gmail.com', 'SELF', 'VM5WH2R', 'Bul4068122750N', '2019-04-15', 50.00, 'NORMAL', 'YES', 'NO', 'NO', NULL, NULL, '2019', 'YES', '23242', '23235235', NULL, NULL, '2019-04-04', NULL, 'YES', 1000.00, '23242', 'VM5WH2R', '2019-04-04', 'Blantyre', 'not_done.png'),
(6, 'Upendo Kimbe', NULL, '0719525279', 'ceombutho@gmail.com', 'DigitalBrain', 'WOQT', 'HAR32010623D', '2019-04-15', 0.00, 'DELEGATE', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'WOQT', '2019-04-15', 'Blantyre', 'not_done.png'),
(7, 'Felister Massawe', NULL, '0713525922', 'ceombutho@gmail.com', 'DigitalBrain', 'DLU2FXJ', 'Bul702010741V', '2019-04-15', 0.00, 'VIP', 'NO', 'NO', 'NO', NULL, NULL, '2018', 'YES', 'Cash', '526262', NULL, NULL, '2019-04-15', NULL, 'YES', 1000.00, 'Cash', '526262', '2019-04-15', 'Blantyre', 'not_done.png'),
(8, 'Martin German', 'Male', '0712354433', 'martin.stegmaier@globalleadership.org', 'GLN German', 'WXTCQ41', 'Har4057120029N', '2019-04-17', 40.00, 'NORMAL', 'YES', 'NO', 'NO', NULL, NULL, '2019', 'YES', 'Cash', '23235235', NULL, NULL, '2019-04-04', NULL, 'YES', 1000.00, 'Cash', 'WXTCQ41', '2019-04-04', 'Blantyre', 'not_done.png'),
(9, 'Mbutho Chibwaye', NULL, '0762210399', 'ceombutho@gmail.com', 'SELF', 'KVJM', 'LIL894112755C', '2019-05-01', 0.00, 'COMPLIMENTARY', 'NO', 'NO', 'NO', NULL, NULL, '2018', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'KVJM', '2019-05-01', 'Lilongwe', 'not_done.png'),
(10, 'Mbutho Chibwaye99', NULL, '0713427857', 'ceombutho@gmail.com', 'SELF', 'PZTG', 'BLA122112920S', '2019-05-01', 0.00, 'SPONSORED', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'PZTG', '2019-05-01', 'Lilongwe', 'not_done.png'),
(11, 'John Rwezaura', NULL, '07622103990', 'ceombutho@gmail.com', 'DigitalBrain', 'GUFD', 'LIL152011923V', '2019-05-01', 0.00, 'VOLUNTEER', 'NO', 'NO', 'NO', NULL, NULL, '2018', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'GUFD', '2019-05-01', 'Blantyre', 'not_done.png'),
(12, 'Mathew Mbaga', NULL, '0713525707', 'edith.lyimo@digitalbraintz.com', 'KLNT', 'SBJR', 'LIL863012100C', '2019-05-01', 0.00, 'COMPLIMENTARY', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'SBJR', '2019-05-01', 'Lilongwe', 'not_done.png'),
(13, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NO', NULL, NULL, NULL, NULL, NULL, 'not_done.png'),
(14, 'Gideon Mugalula', NULL, '0758401046', 'gideon.mugalula@gmail.com', 'non', 'HPMW', 'LIL895124456O', '2019-05-07', 0.00, 'OFFICIAL', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', NULL, NULL, NULL, NULL, NULL, NULL, 'YES', 1000.00, NULL, 'HPMW', '2019-05-07', 'LILONGWE', 'not_done.png'),
(15, 'Kipoozeo', 'Male', '0745768657', 'mathewmbaga@gmail.com', 'SELF', '4I8POV6', 'Bla928062451N', '2019-05-09', 60000.00, 'NORMAL', 'NO', 'NO', 'NO', NULL, NULL, '2019', 'YES', 'TIGO PESA', '390543', NULL, NULL, '22/05/2019', NULL, 'YES', 1000.00, 'TIGO PESA', '4I8POV6', '0000-00-00', 'Blantyre', 'not_done.png');

-- --------------------------------------------------------

--
-- Table structure for table `delegateorders`
--

DROP TABLE IF EXISTS `delegateorders`;
CREATE TABLE `delegateorders` (
  `orderID` int(10) NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `paymentrefnum` varchar(100) DEFAULT NULL,
  `datereg` date DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `package` varchar(20) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `glsyear` varchar(4) DEFAULT NULL,
  `ticket_paid` varchar(4) DEFAULT NULL,
  `payment_mode` varchar(100) DEFAULT NULL,
  `payment_date` varchar(100) DEFAULT NULL,
  `glssite` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `delegateorders`
--

TRUNCATE TABLE `delegateorders`;
--
-- Dumping data for table `delegateorders`
--

INSERT INTO `delegateorders` (`orderID`, `organization`, `mobile`, `email`, `paymentrefnum`, `datereg`, `amount`, `package`, `quantity`, `glsyear`, `ticket_paid`, `payment_mode`, `payment_date`, `glssite`) VALUES
(1, 'UDOM', '0713427857', 'ceombutho@gmail.com', 'N1LM6EG', '2019-04-08', 385.00, 'NORMAL', 11, '2019', NULL, NULL, NULL, 'KADOMA'),
(2, 'Zim ABC', '0713427857', 'ceombutho@gmail.com', 'E3HXMRW', '2019-04-15', 350.00, 'NORMAL', 10, '2019', NULL, NULL, NULL, 'HARARE');

-- --------------------------------------------------------

--
-- Table structure for table `Designations`
--

DROP TABLE IF EXISTS `Designations`;
CREATE TABLE `Designations` (
  `designationID` int(5) NOT NULL,
  `DesignationName` varchar(50) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `Designations`
--

TRUNCATE TABLE `Designations`;
--
-- Dumping data for table `Designations`
--

INSERT INTO `Designations` (`designationID`, `DesignationName`, `Description`) VALUES
(1, 'Volunteer', 'GLS volunteers'),
(2, 'Producer', 'Event Produder'),
(4, 'Financial Controller', 'Finance and Accounting'),
(5, 'System Support', 'Supporting Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `ExpenseType`
--

DROP TABLE IF EXISTS `ExpenseType`;
CREATE TABLE `ExpenseType` (
  `exptypeID` int(4) NOT NULL,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `ExpenseType`
--

TRUNCATE TABLE `ExpenseType`;
--
-- Dumping data for table `ExpenseType`
--

INSERT INTO `ExpenseType` (`exptypeID`, `expType`, `ExpCategory`, `Description`) VALUES
(1, 'expenses1', 'Operating Expenses', 'dlashflsafadsf');

-- --------------------------------------------------------

--
-- Table structure for table `glssitedate`
--

DROP TABLE IF EXISTS `glssitedate`;
CREATE TABLE `glssitedate` (
  `siteID` int(2) NOT NULL,
  `sitedate` varchar(100) DEFAULT NULL,
  `inconferencedeadline` date DEFAULT NULL,
  `superearlybirddeadline` date DEFAULT NULL,
  `earlybirddeadline` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `glssitedate`
--

TRUNCATE TABLE `glssitedate`;
--
-- Dumping data for table `glssitedate`
--

INSERT INTO `glssitedate` (`siteID`, `sitedate`, `inconferencedeadline`, `superearlybirddeadline`, `earlybirddeadline`) VALUES
(1, '5-6 Nov,2019', NULL, '2019-04-19', '2019-10-09'),
(2, '8-9 Nov,2019', NULL, '2019-04-08', '2019-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `glssiteinfo`
--

DROP TABLE IF EXISTS `glssiteinfo`;
CREATE TABLE `glssiteinfo` (
  `siteID` int(2) NOT NULL,
  `sitename` varchar(100) DEFAULT NULL,
  `sitedescription` varchar(255) DEFAULT NULL,
  `eventtype` varchar(50) DEFAULT NULL,
  `sitevenue` varchar(100) DEFAULT NULL,
  `sitemobile` varchar(50) DEFAULT NULL,
  `siteaddress` varchar(100) DEFAULT NULL,
  `sitecontactperson` varchar(200) DEFAULT NULL,
  `sitetarget` int(6) DEFAULT NULL,
  `sitedays` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `glssiteinfo`
--

TRUNCATE TABLE `glssiteinfo`;
--
-- Dumping data for table `glssiteinfo`
--

INSERT INTO `glssiteinfo` (`siteID`, `sitename`, `sitedescription`, `eventtype`, `sitevenue`, `sitemobile`, `siteaddress`, `sitecontactperson`, `sitetarget`, `sitedays`) VALUES
(1, 'Lilongwe', 'GLS', '5-6 Nov,2019', 'To be announced', '265886908789', NULL, NULL, 600, 2),
(2, 'Blantyre', 'GLS ', '8-9 Nov,2019', 'To be announced', '265886908789', NULL, NULL, 300, 2);

-- --------------------------------------------------------

--
-- Table structure for table `glssiterates`
--

DROP TABLE IF EXISTS `glssiterates`;
CREATE TABLE `glssiterates` (
  `siteID` int(2) NOT NULL,
  `inconferencerate` double(10,2) DEFAULT NULL,
  `superearlybirdrate_normal` double(10,2) DEFAULT NULL,
  `superearlybirdrate_vip` double(10,2) DEFAULT NULL,
  `earlybirdrate_normal` double(10,2) DEFAULT NULL,
  `earlybirdrate_vip` double(10,2) DEFAULT NULL,
  `regularrate_normal` double(10,2) DEFAULT NULL,
  `regularrate_vip` double(10,2) DEFAULT NULL,
  `studentrate` double(10,2) DEFAULT NULL,
  `grouprate_normal` double(10,2) DEFAULT NULL,
  `grouprate_vip` double(10,2) DEFAULT NULL,
  `internationalrate` double(10,2) DEFAULT NULL,
  `exchangerate` double(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `glssiterates`
--

TRUNCATE TABLE `glssiterates`;
--
-- Dumping data for table `glssiterates`
--

INSERT INTO `glssiterates` (`siteID`, `inconferencerate`, `superearlybirdrate_normal`, `superearlybirdrate_vip`, `earlybirdrate_normal`, `earlybirdrate_vip`, `regularrate_normal`, `regularrate_vip`, `studentrate`, `grouprate_normal`, `grouprate_vip`, `internationalrate`, `exchangerate`) VALUES
(1, NULL, NULL, NULL, 45000.00, NULL, 60000.00, NULL, NULL, 45000.00, NULL, 100.00, 1.00),
(2, NULL, NULL, NULL, 45000.00, NULL, 60000.00, NULL, NULL, 45000.00, NULL, 100.00, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `member_groups`
--

DROP TABLE IF EXISTS `member_groups`;
CREATE TABLE `member_groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `membersno` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `member_groups`
--

TRUNCATE TABLE `member_groups`;
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

DROP TABLE IF EXISTS `member_group_list`;
CREATE TABLE `member_group_list` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `member_group_list`
--

TRUNCATE TABLE `member_group_list`;
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
-- Table structure for table `packageinfo`
--

DROP TABLE IF EXISTS `packageinfo`;
CREATE TABLE `packageinfo` (
  `id` int(6) NOT NULL,
  `package_name` varchar(200) DEFAULT NULL,
  `paid_nocash` varchar(5) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `packageinfo`
--

TRUNCATE TABLE `packageinfo`;
--
-- Dumping data for table `packageinfo`
--

INSERT INTO `packageinfo` (`id`, `package_name`, `paid_nocash`, `remarks`) VALUES
(1, 'Student', 'YES', 'Students'),
(2, 'Normal', 'YES', 'Normal'),
(3, 'VIP', 'YES', 'VIP'),
(4, 'Complimentary', 'NO', 'Complimentary'),
(5, 'Sponsored', 'NO', 'Sponsored'),
(6, 'Volunteer', 'NO', 'Volunteer'),
(7, 'Official', 'NO', 'Official'),
(8, 'Delegate', 'NO', 'Delegate'),
(9, 'Exhibitor', 'NO', 'Exhibitor');

-- --------------------------------------------------------

--
-- Table structure for table `RevenueType`
--

DROP TABLE IF EXISTS `RevenueType`;
CREATE TABLE `RevenueType` (
  `revtypeID` int(11) NOT NULL,
  `revType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revCategory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `RevenueType`
--

TRUNCATE TABLE `RevenueType`;
--
-- Dumping data for table `RevenueType`
--

INSERT INTO `RevenueType` (`revtypeID`, `revType`, `revCategory`, `Description`) VALUES
(1, 'Revex1', 'cat1', 'description'),
(2, 'Operational', 'Ticket selling', '');

-- --------------------------------------------------------

--
-- Table structure for table `sent_sms`
--

DROP TABLE IF EXISTS `sent_sms`;
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
-- Truncate table before insert `sent_sms`
--

TRUNCATE TABLE `sent_sms`;
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

DROP TABLE IF EXISTS `siteseason`;
CREATE TABLE `siteseason` (
  `seasonID` int(4) NOT NULL,
  `Year` varchar(4) DEFAULT NULL,
  `SeasonStatus` varchar(10) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `siteseason`
--

TRUNCATE TABLE `siteseason`;
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

DROP TABLE IF EXISTS `sms_balance`;
CREATE TABLE `sms_balance` (
  `id` int(11) NOT NULL,
  `member_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sms_balance` float NOT NULL,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `sms_balance`
--

TRUNCATE TABLE `sms_balance`;
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

DROP TABLE IF EXISTS `sms_list`;
CREATE TABLE `sms_list` (
  `sms_id` int(11) NOT NULL,
  `sms_description` text COLLATE utf8_unicode_ci NOT NULL,
  `sms_composedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sms_recipients` float NOT NULL,
  `user_Id` int(11) NOT NULL,
  `email_recipients` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `sms_list`
--

TRUNCATE TABLE `sms_list`;
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

DROP TABLE IF EXISTS `sms_purchases`;
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
-- Truncate table before insert `sms_purchases`
--

TRUNCATE TABLE `sms_purchases`;
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

DROP TABLE IF EXISTS `sms_rate`;
CREATE TABLE `sms_rate` (
  `rate_id` int(11) NOT NULL,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float NOT NULL,
  `current_balance` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `sms_rate`
--

TRUNCATE TABLE `sms_rate`;
--
-- Dumping data for table `sms_rate`
--

INSERT INTO `sms_rate` (`rate_id`, `sms_type`, `rate`, `current_balance`) VALUES
(1, 'EMAIL', 5, 87),
(2, 'WATSHAP', 10, 0),
(3, 'SMS', 83, 11.0482);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
CREATE TABLE `userroles` (
  `roleID` int(5) NOT NULL,
  `RoleName` varchar(50) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `userroles`
--

TRUNCATE TABLE `userroles`;
--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`roleID`, `RoleName`, `Description`) VALUES
(1, 'Normal', 'Normal User'),
(2, 'Manager', 'Average User'),
(3, 'Administrator', 'Super User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_actualexpenses_2019_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_actualexpenses_2019_Blantyre`;
CREATE TABLE `vw_actualexpenses_2019_Blantyre` (
`expenseID` int(5)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_actualexpenses_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_actualexpenses_2019_Lilongwe`;
CREATE TABLE `vw_actualexpenses_2019_Lilongwe` (
`expenseID` int(5)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_actualrevenue_2018_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_actualrevenue_2018_Blantyre`;
CREATE TABLE `vw_actualrevenue_2018_Blantyre` (
`revenueID` int(11)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_actualrevenue_2018_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_actualrevenue_2018_Lilongwe`;
CREATE TABLE `vw_actualrevenue_2018_Lilongwe` (
`revenueID` int(11)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_actualrevenue_2019_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_actualrevenue_2019_Blantyre`;
CREATE TABLE `vw_actualrevenue_2019_Blantyre` (
`revenueID` int(11)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_actualrevenue_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_actualrevenue_2019_Lilongwe`;
CREATE TABLE `vw_actualrevenue_2019_Lilongwe` (
`revenueID` int(11)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_budgetexpenses_2019_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_budgetexpenses_2019_Blantyre`;
CREATE TABLE `vw_budgetexpenses_2019_Blantyre` (
`expenseID` int(5)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_budgetexpenses_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_budgetexpenses_2019_Lilongwe`;
CREATE TABLE `vw_budgetexpenses_2019_Lilongwe` (
`expenseID` int(5)
,`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_budgetrevenue_2019_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_budgetrevenue_2019_Blantyre`;
CREATE TABLE `vw_budgetrevenue_2019_Blantyre` (
`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`revenueID` int(11)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_budgetrevenue_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_budgetrevenue_2019_Lilongwe`;
CREATE TABLE `vw_budgetrevenue_2019_Lilongwe` (
`Type` varchar(50)
,`Amount` double(10,2)
,`DateRecorded` date
,`Description` varchar(250)
,`Site` varchar(250)
,`revenueID` int(11)
,`glsyear` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_collection_2018_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_collection_2018_Blantyre`;
CREATE TABLE `vw_collection_2018_Blantyre` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_collection_2018_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_collection_2018_Lilongwe`;
CREATE TABLE `vw_collection_2018_Lilongwe` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_collection_2019_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_collection_2019_Blantyre`;
CREATE TABLE `vw_collection_2019_Blantyre` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_collection_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_collection_2019_Lilongwe`;
CREATE TABLE `vw_collection_2019_Lilongwe` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2018_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2018_Blantyre`;
CREATE TABLE `vw_delegate_2018_Blantyre` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2018_Blantyre_CarParking`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2018_Blantyre_CarParking`;
CREATE TABLE `vw_delegate_2018_Blantyre_CarParking` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2018_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2018_Lilongwe`;
CREATE TABLE `vw_delegate_2018_Lilongwe` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2018_Lilongwe_CarParking`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2018_Lilongwe_CarParking`;
CREATE TABLE `vw_delegate_2018_Lilongwe_CarParking` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2019_Blantyre`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2019_Blantyre`;
CREATE TABLE `vw_delegate_2019_Blantyre` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2019_Blantyre_CarParking`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2019_Blantyre_CarParking`;
CREATE TABLE `vw_delegate_2019_Blantyre_CarParking` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2019_Lilongwe`;
CREATE TABLE `vw_delegate_2019_Lilongwe` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_delegate_2019_Lilongwe_CarParking`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_delegate_2019_Lilongwe_CarParking`;
CREATE TABLE `vw_delegate_2019_Lilongwe_CarParking` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`organization` varchar(255)
,`paymentrefnum` varchar(100)
,`ticketNo` varchar(100)
,`datereg` date
,`amount` double(10,2)
,`package` varchar(20)
,`checkedin` varchar(4)
,`teamedition` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`ticket_paid` varchar(4)
,`payment_mode` varchar(100)
,`payment_ref_no` varchar(255)
,`payment_status` varchar(20)
,`payment_method` varchar(100)
,`payment_date` varchar(100)
,`pesapal_tranx_track_id` varchar(250)
,`cert_paid` varchar(4)
,`cert_amount` double(10,2)
,`cert_pay_mode` varchar(250)
,`cert_pay_ref` varchar(250)
,`cert_pay_date` date
,`glssite` varchar(100)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_vechicle_2018_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_vechicle_2018_Lilongwe`;
CREATE TABLE `vw_vechicle_2018_Lilongwe` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`package` varchar(20)
,`checkedin` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`glssite` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_vechicle_2019_Lilongwe`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_vechicle_2019_Lilongwe`;
CREATE TABLE `vw_vechicle_2019_Lilongwe` (
`delegateID` int(10)
,`fullname` varchar(255)
,`gender` varchar(10)
,`mobile` varchar(30)
,`email` varchar(150)
,`package` varchar(20)
,`checkedin` varchar(4)
,`gatepass` varchar(4)
,`vehicletype` varchar(100)
,`registrationnum` varchar(50)
,`glsyear` varchar(4)
,`glssite` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `webelements`
--

DROP TABLE IF EXISTS `webelements`;
CREATE TABLE `webelements` (
  `elementID` int(5) NOT NULL,
  `Content` text,
  `Category` varchar(100) DEFAULT NULL,
  `Toggle` varchar(4) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `webelements`
--

TRUNCATE TABLE `webelements`;
--
-- Dumping data for table `webelements`
--

INSERT INTO `webelements` (`elementID`, `Content`, `Category`, `Toggle`, `Position`) VALUES
(1, 'The Global Leadership Summit', 'Title', 'YES', 'Top Section'),
(2, 'Fresh, actionable and inspiring leadership content from a world-class faculty at a convenient location near you.	', 'Slogan', 'YES', 'Top Section'),
(12, '<script type=\"text/javascript\">function add_chatinline(){var hccid=96094733;var nt=document.createElement(\"script\");nt.async=true;nt.src=\"https://mylivechat.com/chatinline.aspx?hccid=\"+hccid;var ct=document.getElementsByTagName(\"script\")[0];ct.parentNode.insertBefore(nt,ct);}\r\nadd_chatinline(); </script>\r\n', 'Chat', 'NO', 'Bottom');

-- --------------------------------------------------------

--
-- Table structure for table `webspeakers`
--

DROP TABLE IF EXISTS `webspeakers`;
CREATE TABLE `webspeakers` (
  `InfoID` int(5) NOT NULL,
  `fullname` varchar(201) DEFAULT NULL,
  `designation` varchar(150) DEFAULT NULL,
  `organization` varchar(150) DEFAULT NULL,
  `biography` text,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `picture1` varchar(150) DEFAULT NULL,
  `picture2` varchar(150) DEFAULT NULL,
  `profile_row` int(3) DEFAULT NULL,
  `roworder` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `webspeakers`
--

TRUNCATE TABLE `webspeakers`;
--
-- Dumping data for table `webspeakers`
--

INSERT INTO `webspeakers` (`InfoID`, `fullname`, `designation`, `organization`, `biography`, `facebook`, `twitter`, `instagram`, `picture1`, `picture2`, `profile_row`, `roworder`) VALUES
(1, 'Craig <br>Groeschel', 'Co-Founder & Senior Pastor', 'Life.Church', 'Craig Groeschel is senior pastor of Life.Church, an innovative church meeting in multiple U.S. locations and globally online. Known for its missional approach utilizing the latest technology, Life.Church is the creator of the YouVersion Bible App-downloaded in every country. Named in the top 25 CEO\'s in the U.S. (small and midsize companies) by Glassdoor, Groeschel is a New York Times best-selling author, speaks frequently around the world and hosts the Craig Groeschel Leadership Podcast.', 'craiggroeschel', '', 'craiggroeschel', 'Craig_web_larger.jpg', 'Craig_web-300x300.jpg', 1, 1),
(2, 'Bozoma <br>Saint John', 'Chief Marketing Officer', 'Endeavor', 'Bozoma Saint John is Chief Marketing Officer for Endeavor, a global leader in entertainment, sports and fashion operating in more than 30 countries. Over the course of her career, Saint John has earned a formidable reputation as a trailblazing executive.She most recently served as Chief Brand Officer for Uber and also as Head of Global Consumer Marketing for Apple Music and iTunes.For her innovative work, Saint John has been recognized on Fast Company\'s 100 Most Creative People list.', '', '', '', 'bozoma.jpg', 'bozoma_small.jpg', 1, 2),
(3, 'Bear<br> Grylls', 'Adventurer; Writer;', 'TV Host', 'Bear Grylls is the embodiment of adventure. A former member of the British Special Forces, Grylls has climbed Everest, crossed the Arctic Ocean in an inflatable boat and has publicly supported the Alpha Course to help inspire people in their journey of faith.His Emmy-nominated TV show Man Vs Wild became one of the most watched programs on the planet with an estimated audience of 1.2 billion.He also hosts NBCâ€™s hit show Running Wild with Bear Grylls as well as groundbreaking series on National Geographic, Netflix and Amazon.He is a number 1 best-selling author and has sold over 15 million books. These include his autobiography Mud, Sweat and Tears,and this year a powerful new book on faith called: Soul Fuel. Bear will be joining us by video from the mountains in Switzerland, and is speaking on courage, kindness and never giving up.', '', '', '', 'bear.jpg', 'bear_small.jpg', 1, 4),
(4, 'Jo <br>Saxton', 'Author; Leadership Coach;', 'Entrepreneur', 'Nigerian parents and raised in London, England, Jo Saxton brings a multicultural and international perspective to leadership.She has served on staff teams in churches in the UK and the U.S. and is the founder of the Ezer Collective, an initiative that equips and invests in women leaders.Saxton co-hosts the podcast Lead Stories: Tales of Leadership and Life with Steph Oâ€™Brien and has authored three books, including The Dream of You.', '', '', '', 'Jo_web_larger.jpg', 'Jo_web-300x300.jpg', 2, 3),
(5, 'Jason <br>Dorsey', '#1 Rated Gen Z & Millennial Speaker;', 'Researcher', 'Jason Dorsey is President of The Center for Generational Kinetics, which delivers research, speaking and consulting to separate generational myth from truth for leaders around the world.His team has repositioned global brands to win each generation and taken clients from last to first in both employee retention and customer growth. Considered the #1 generations speaker and researcher and called a â€œresearch guruâ€ by Adweek, Dorsey uses original data-driven research to explain generational behaviors.', '', '', '', 'jason.jpg', 'jason_small.jpg', 2, 1),
(6, 'Danielle<br> Strickland', 'Pastor; Author;', 'Justice Advocate', 'Danielle Strickland has led churches, started training schools and established justice departments around the world.She spent 22 years as an officer in The Salvation Army and is an Ambassador for Stop The Traffik.With a deep calling to empower people and to transform neighborhoods and the world, she co-founded Infinitum (a way of life), Brave Global, Amplify Peace and the Women Speakers Collective.Strickland is the author of several books, including The Ultimate Exodus.', '', '', '', '332124458.jpg', 'danielle_small.jpg', 3, 2),
(7, 'Patrick <br> Lencioni', 'Best-Selling Author; Founder', 'The Table Group', 'Patrick Lencioni is the author of eleven best-selling books with more than five million copies sold, including The Five Dysfunctions of a Team.Dedicated to providing organizations with ideas, products and services that improve teamwork, clarity and employee engagement, his leadership models serve a diverse base from Fortune 500 companies to professional sports organizations to churches.A Summit favorite, Lencioni will unpack his new work on motivation and how it shapes our leadership.', '', '', '', 'Patrick_web_larger.jpg', 'Patrick_web-300x300.jpg', 1, 3),
(8, 'Aja <br>Brown', 'Mayor', 'City of Compton', 'At the age of 31, Aja Brown made history as the youngest elected mayor of Compton, California.A national trailblazer, her revitalization strategy centers on family values, quality of life,economic development and infrastructural growth. Overwhelmingly re-elected to a second term in 2017, Mayor Brownâ€™s community initiatives and policy changes have significantly reduced gang-related homicides and the unemployment rate.Mayor Brown is the recipient of multiple honors, including the esteemed 2016 John F. Kennedy New Frontier Award.', '', '', '', 'aja.jpg', 'aja_small.jpg', 3, 4),
(9, 'Liz <br>Bohannon', 'Co-Founder & Co-CEO', 'Sseko Designs', 'Liz Bohannon is the founder of Sseko Designs, a socially-conscious fashion brand that works to create leadership and educational opportunities for women across the globe.She believes that business is a powerful platform for social change and that girls are our future. She was named by Bloomberg Businessweek as a top social entrepreneur and by Forbes as a top 20 speaker.In her book, Beginnerâ€™s Pluck, releasing at the Summit, Bohannon uses her journey to explore 14 principles for not finding but building a life of purpose, passion and impact.', '', '', '', 'liz.jpg', 'liz_small.jpg', 2, 1),
(10, 'Dr. Krish <br>Kandiah', 'Founder, Home for Good; Consultant;', 'Social Entrepreneur', 'An advocate for fostering and adoption, Dr. Kandiah is the founding director of Home for Good, a charity seeking to find permanent loving homes for children in the UK foster care system.He is the author of 13 books including his latest, Faitheism: Why Christians and Atheists have more in common than you think. He is a regular broadcaster on the BBC and a contributor to the Guardian and Times of London. An international speaker and consultant, he offers both creativity and academic reflection to bring strategic change, culture shift and innovation.Dr. Kandiah and his wife have 7 children through birth, adoption and fostering.', '', '', '', 'dr_krish.jpg', 'krish_small.jpg', 3, 2),
(11, 'Todd <br>Henry', 'Founder, Accidental Creative; Author;', 'Leadership Consultant', 'Todd Henry teaches leaders and organizations how to establish practices that lead to everyday brilliance.As host of The Accidental Creative Podcastâ€”with millions of downloadsâ€” Henry delivers weekly tips and ideas for staying prolific, brilliant and healthy.He is the author of four books, including Die Empty which was named by Amazon as one of the best books of 2013.Henryâ€™s latest book, Herding Tigers, Be the Leader that Creative People Need, is a practical handbook for anyone charged with leading people and teams to creative brilliance.', '', '', '', 'todd.jpg', 'todd_small.jpg', 3, 3),
(12, 'Jia <br>Jiang', 'Best-selling Author; Blogger;', 'Entrepreneur', 'Years after Jia Jiang began his career in the corporate world, he became an entrepreneur and discovered everyoneâ€™s biggest fear: rejection.To conquer his fear, Jiang embarked on a journey and discovered a world where people are much kinder than we imagine.The best-selling author of Rejection Proof and owner of Rejection Therapy and CEO of Wuju Learning, Jiang teaches people and trains organizations to become fearless through rejection training.', '', '', '', 'jia.jpg', 'jia_small.jpg', 2, 4),
(13, 'Chris <br>Voss', 'Former FBI Hostage Negotiator; CEO & Founder', 'The Black Swan Group', 'Chris Voss founded The Black Swan Group, a firm that provides training and advises Fortune 500 companies through complex negotiations.A 24-year veteran of the FBI, he was the lead international kidnapping negotiator and was trained not only by the FBI, but by Scotland Yard and Harvard Law School.In his book, Never Split the Difference: Negotiating As If Your Life Depended On It, Voss breaks down these strategies so that anyone can use them in the workplace, in business or at home.', '', '', '', 'chris_voss.jpg', 'chris_voss_small.jpg', 4, 1),
(14, 'DeVon <br>Franklin', 'Producer, Author, Speaker; CEO', 'Franklin Entertainment', 'DeVon Franklin is an award-winning producer, best-selling author and spiritual success coach.Beliefnet named him one of the Most Influential Christians Under 40.He is CEO of Franklin Entertainment with 20th Century Fox and has produced the hit films Miracles from Heaven, Heaven is for Real and The Star.A New York Times best-selling author, his latest book is The Truth About Men: What Men and Women Need to Know.Franklin is dedicated to using his leadership and the media as a powerful tool to encourage millions of lives around the world.                                                                                        ', '', '', '', 'devon.jpg', 'devon_small.jpg', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `webtestimonies`
--

DROP TABLE IF EXISTS `webtestimonies`;
CREATE TABLE `webtestimonies` (
  `testimonyID` int(5) NOT NULL,
  `testimony` text,
  `fullname` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `feedback` varchar(4) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `webtestimonies`
--

TRUNCATE TABLE `webtestimonies`;
--
-- Dumping data for table `webtestimonies`
--

INSERT INTO `webtestimonies` (`testimonyID`, `testimony`, `fullname`, `designation`, `city`, `country`, `feedback`, `picture`) VALUES
(1, 'I immediately realized the GLS, with both the practical and inspirational content, was going to have an impact on my country. I\'ve seen it become a huge help for the business world and the Church world. Because of the GLS, these leaders are realizing', 'Janos Illessy', 'Business Leader', '', 'Hungary', 'NO', ''),
(2, 'The idea that everyone wins when leadership gets better gripped me in a big way. I began to look at how my country could be better if our leadership got better. I moved from a place of just thinking about improving national leadership to becoming a p', 'Gadville MacDonald', 'GLS Leader', '', 'The Bahamas', 'NO', ''),
(3, 'We brought the idea for a GLS to the top schools in the country. Because of the impact of the Summit in the lives of our students, several schools have made the GLS training a standard for their students', 'Harold Chilowa', 'GLS Leader', '', 'Zimbabwe', 'NO', ''),
(4, 'The Global Leadership Summit will hone and improve your leadership skills with fresh perspectives from world-class leaders.', 'Jeff Van Drunen', 'President FutureCeuticals', '', '', 'YES', '');

-- --------------------------------------------------------

--
-- Table structure for table `webvideos`
--

DROP TABLE IF EXISTS `webvideos`;
CREATE TABLE `webvideos` (
  `videoID` int(5) NOT NULL,
  `videoname` varchar(100) DEFAULT NULL,
  `youtubeURL` varchar(200) DEFAULT NULL,
  `thumbnailimage` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `webvideos`
--

TRUNCATE TABLE `webvideos`;
--
-- Dumping data for table `webvideos`
--

INSERT INTO `webvideos` (`videoID`, `videoname`, `youtubeURL`, `thumbnailimage`, `description`) VALUES
(1, 'main video', 'https://www.youtube.com/embed/qKyc0_UdN8k', '1048811861.png', 'The diverse Summit faculty delivers a unique blend of vision, inspiration and practical skills you can immediately apply.'),
(3, 'who video', 'https://www.youtube.com/embed/ntGbBxyPTlE', '1998186151.png', 'Learn more about our mission and vision.'),
(4, 'highlights video', 'https://www.youtube.com/embed/2WAFOKpeZOs', '1092554211.png', 'Watch highlights from the 2018 Summit.');

-- --------------------------------------------------------

--
-- Structure for view `vw_actualexpenses_2019_Blantyre`
--
DROP TABLE IF EXISTS `vw_actualexpenses_2019_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_actualexpenses_2019_Blantyre`  AS  (select `actual_expenses`.`expenseID` AS `expenseID`,`actual_expenses`.`Type` AS `Type`,`actual_expenses`.`Amount` AS `Amount`,`actual_expenses`.`DateRecorded` AS `DateRecorded`,`actual_expenses`.`Description` AS `Description`,`actual_expenses`.`Site` AS `Site`,`actual_expenses`.`glsyear` AS `glsyear` from `actual_expenses` where ((`actual_expenses`.`glsyear` = '2019') and (`actual_expenses`.`Site` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_actualexpenses_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_actualexpenses_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_actualexpenses_2019_Lilongwe`  AS  (select `actual_expenses`.`expenseID` AS `expenseID`,`actual_expenses`.`Type` AS `Type`,`actual_expenses`.`Amount` AS `Amount`,`actual_expenses`.`DateRecorded` AS `DateRecorded`,`actual_expenses`.`Description` AS `Description`,`actual_expenses`.`Site` AS `Site`,`actual_expenses`.`glsyear` AS `glsyear` from `actual_expenses` where ((`actual_expenses`.`glsyear` = '2019') and (`actual_expenses`.`Site` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_actualrevenue_2018_Blantyre`
--
DROP TABLE IF EXISTS `vw_actualrevenue_2018_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_actualrevenue_2018_Blantyre`  AS  (select `actual_revenue`.`revenueID` AS `revenueID`,`actual_revenue`.`Type` AS `Type`,`actual_revenue`.`Amount` AS `Amount`,`actual_revenue`.`DateRecorded` AS `DateRecorded`,`actual_revenue`.`Description` AS `Description`,`actual_revenue`.`Site` AS `Site`,`actual_revenue`.`glsyear` AS `glsyear` from `actual_revenue` where ((`actual_revenue`.`glsyear` = '2018') and (`actual_revenue`.`Site` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_actualrevenue_2018_Lilongwe`
--
DROP TABLE IF EXISTS `vw_actualrevenue_2018_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_actualrevenue_2018_Lilongwe`  AS  (select `actual_revenue`.`revenueID` AS `revenueID`,`actual_revenue`.`Type` AS `Type`,`actual_revenue`.`Amount` AS `Amount`,`actual_revenue`.`DateRecorded` AS `DateRecorded`,`actual_revenue`.`Description` AS `Description`,`actual_revenue`.`Site` AS `Site`,`actual_revenue`.`glsyear` AS `glsyear` from `actual_revenue` where ((`actual_revenue`.`glsyear` = '2018') and (`actual_revenue`.`Site` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_actualrevenue_2019_Blantyre`
--
DROP TABLE IF EXISTS `vw_actualrevenue_2019_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_actualrevenue_2019_Blantyre`  AS  (select `actual_revenue`.`revenueID` AS `revenueID`,`actual_revenue`.`Type` AS `Type`,`actual_revenue`.`Amount` AS `Amount`,`actual_revenue`.`DateRecorded` AS `DateRecorded`,`actual_revenue`.`Description` AS `Description`,`actual_revenue`.`Site` AS `Site`,`actual_revenue`.`glsyear` AS `glsyear` from `actual_revenue` where ((`actual_revenue`.`glsyear` = '2019') and (`actual_revenue`.`Site` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_actualrevenue_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_actualrevenue_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_actualrevenue_2019_Lilongwe`  AS  (select `actual_revenue`.`revenueID` AS `revenueID`,`actual_revenue`.`Type` AS `Type`,`actual_revenue`.`Amount` AS `Amount`,`actual_revenue`.`DateRecorded` AS `DateRecorded`,`actual_revenue`.`Description` AS `Description`,`actual_revenue`.`Site` AS `Site`,`actual_revenue`.`glsyear` AS `glsyear` from `actual_revenue` where ((`actual_revenue`.`glsyear` = '2019') and (`actual_revenue`.`Site` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_budgetexpenses_2019_Blantyre`
--
DROP TABLE IF EXISTS `vw_budgetexpenses_2019_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_budgetexpenses_2019_Blantyre`  AS  (select `budget_expenses`.`expenseID` AS `expenseID`,`budget_expenses`.`Type` AS `Type`,`budget_expenses`.`Amount` AS `Amount`,`budget_expenses`.`DateRecorded` AS `DateRecorded`,`budget_expenses`.`Description` AS `Description`,`budget_expenses`.`Site` AS `Site`,`budget_expenses`.`glsyear` AS `glsyear` from `budget_expenses` where ((`budget_expenses`.`glsyear` = '2019') and (`budget_expenses`.`Site` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_budgetexpenses_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_budgetexpenses_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_budgetexpenses_2019_Lilongwe`  AS  (select `budget_expenses`.`expenseID` AS `expenseID`,`budget_expenses`.`Type` AS `Type`,`budget_expenses`.`Amount` AS `Amount`,`budget_expenses`.`DateRecorded` AS `DateRecorded`,`budget_expenses`.`Description` AS `Description`,`budget_expenses`.`Site` AS `Site`,`budget_expenses`.`glsyear` AS `glsyear` from `budget_expenses` where ((`budget_expenses`.`glsyear` = '2019') and (`budget_expenses`.`Site` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_budgetrevenue_2019_Blantyre`
--
DROP TABLE IF EXISTS `vw_budgetrevenue_2019_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_budgetrevenue_2019_Blantyre`  AS  (select `budget_revenue`.`Type` AS `Type`,`budget_revenue`.`Amount` AS `Amount`,`budget_revenue`.`DateRecorded` AS `DateRecorded`,`budget_revenue`.`Description` AS `Description`,`budget_revenue`.`Site` AS `Site`,`budget_revenue`.`revenueID` AS `revenueID`,`budget_revenue`.`glsyear` AS `glsyear` from `budget_revenue` where ((`budget_revenue`.`glsyear` = '2019') and (`budget_revenue`.`Site` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_budgetrevenue_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_budgetrevenue_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_budgetrevenue_2019_Lilongwe`  AS  (select `budget_revenue`.`Type` AS `Type`,`budget_revenue`.`Amount` AS `Amount`,`budget_revenue`.`DateRecorded` AS `DateRecorded`,`budget_revenue`.`Description` AS `Description`,`budget_revenue`.`Site` AS `Site`,`budget_revenue`.`revenueID` AS `revenueID`,`budget_revenue`.`glsyear` AS `glsyear` from `budget_revenue` where ((`budget_revenue`.`glsyear` = '2019') and (`budget_revenue`.`Site` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_collection_2018_Blantyre`
--
DROP TABLE IF EXISTS `vw_collection_2018_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_collection_2018_Blantyre`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Blantyre') and (`delegate`.`ticket_paid` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_collection_2018_Lilongwe`
--
DROP TABLE IF EXISTS `vw_collection_2018_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_collection_2018_Lilongwe`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Lilongwe') and (`delegate`.`ticket_paid` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_collection_2019_Blantyre`
--
DROP TABLE IF EXISTS `vw_collection_2019_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_collection_2019_Blantyre`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Blantyre') and (`delegate`.`ticket_paid` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_collection_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_collection_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_collection_2019_Lilongwe`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Lilongwe') and (`delegate`.`ticket_paid` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2018_Blantyre`
--
DROP TABLE IF EXISTS `vw_delegate_2018_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2018_Blantyre`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2018_Blantyre_CarParking`
--
DROP TABLE IF EXISTS `vw_delegate_2018_Blantyre_CarParking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2018_Blantyre_CarParking`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Blantyre') and (`delegate`.`gatepass` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2018_Lilongwe`
--
DROP TABLE IF EXISTS `vw_delegate_2018_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2018_Lilongwe`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2018_Lilongwe_CarParking`
--
DROP TABLE IF EXISTS `vw_delegate_2018_Lilongwe_CarParking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2018_Lilongwe_CarParking`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Lilongwe') and (`delegate`.`gatepass` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2019_Blantyre`
--
DROP TABLE IF EXISTS `vw_delegate_2019_Blantyre`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2019_Blantyre`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Blantyre'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2019_Blantyre_CarParking`
--
DROP TABLE IF EXISTS `vw_delegate_2019_Blantyre_CarParking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2019_Blantyre_CarParking`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Blantyre') and (`delegate`.`gatepass` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_delegate_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2019_Lilongwe`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Lilongwe'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_delegate_2019_Lilongwe_CarParking`
--
DROP TABLE IF EXISTS `vw_delegate_2019_Lilongwe_CarParking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`localhost` SQL SECURITY DEFINER VIEW `vw_delegate_2019_Lilongwe_CarParking`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`organization` AS `organization`,`delegate`.`paymentrefnum` AS `paymentrefnum`,`delegate`.`ticketNo` AS `ticketNo`,`delegate`.`datereg` AS `datereg`,`delegate`.`amount` AS `amount`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`teamedition` AS `teamedition`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`ticket_paid` AS `ticket_paid`,`delegate`.`payment_mode` AS `payment_mode`,`delegate`.`payment_ref_no` AS `payment_ref_no`,`delegate`.`payment_status` AS `payment_status`,`delegate`.`payment_method` AS `payment_method`,`delegate`.`payment_date` AS `payment_date`,`delegate`.`pesapal_tranx_track_id` AS `pesapal_tranx_track_id`,`delegate`.`cert_paid` AS `cert_paid`,`delegate`.`cert_amount` AS `cert_amount`,`delegate`.`cert_pay_mode` AS `cert_pay_mode`,`delegate`.`cert_pay_ref` AS `cert_pay_ref`,`delegate`.`cert_pay_date` AS `cert_pay_date`,`delegate`.`glssite` AS `glssite`,`delegate`.`image` AS `image` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Lilongwe') and (`delegate`.`gatepass` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_vechicle_2018_Lilongwe`
--
DROP TABLE IF EXISTS `vw_vechicle_2018_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`197.215.244.%` SQL SECURITY DEFINER VIEW `vw_vechicle_2018_Lilongwe`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`glssite` AS `glssite` from `delegate` where ((`delegate`.`glsyear` = '2018') and (`delegate`.`glssite` = 'Lilongwe') and (`delegate`.`gatepass` = 'YES'))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_vechicle_2019_Lilongwe`
--
DROP TABLE IF EXISTS `vw_vechicle_2019_Lilongwe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`afyapopo_glsmw`@`197.215.244.%` SQL SECURITY DEFINER VIEW `vw_vechicle_2019_Lilongwe`  AS  (select `delegate`.`delegateID` AS `delegateID`,`delegate`.`fullname` AS `fullname`,`delegate`.`gender` AS `gender`,`delegate`.`mobile` AS `mobile`,`delegate`.`email` AS `email`,`delegate`.`package` AS `package`,`delegate`.`checkedin` AS `checkedin`,`delegate`.`gatepass` AS `gatepass`,`delegate`.`vehicletype` AS `vehicletype`,`delegate`.`registrationnum` AS `registrationnum`,`delegate`.`glsyear` AS `glsyear`,`delegate`.`glssite` AS `glssite` from `delegate` where ((`delegate`.`glsyear` = '2019') and (`delegate`.`glssite` = 'Lilongwe') and (`delegate`.`gatepass` = 'YES'))) ;

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
-- Indexes for table `billingsummary`
--
ALTER TABLE `billingsummary`
  ADD PRIMARY KEY (`billingid`);

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
-- Indexes for table `cmembership`
--
ALTER TABLE `cmembership`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `idx` (`UserName`),
  ADD KEY `idx1` (`Fullname`),
  ADD KEY `idx3` (`sessionID`);

--
-- Indexes for table `dbo_payments`
--
ALTER TABLE `dbo_payments`
  ADD PRIMARY KEY (`Row_Id`);

--
-- Indexes for table `delegate`
--
ALTER TABLE `delegate`
  ADD PRIMARY KEY (`delegateID`),
  ADD KEY `idx1` (`fullname`),
  ADD KEY `idx2` (`ticketNo`),
  ADD KEY `idx3` (`package`),
  ADD KEY `idex4` (`checkedin`);

--
-- Indexes for table `delegateorders`
--
ALTER TABLE `delegateorders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `Designations`
--
ALTER TABLE `Designations`
  ADD PRIMARY KEY (`designationID`);

--
-- Indexes for table `ExpenseType`
--
ALTER TABLE `ExpenseType`
  ADD PRIMARY KEY (`exptypeID`);

--
-- Indexes for table `glssitedate`
--
ALTER TABLE `glssitedate`
  ADD PRIMARY KEY (`siteID`);

--
-- Indexes for table `glssiteinfo`
--
ALTER TABLE `glssiteinfo`
  ADD PRIMARY KEY (`siteID`);

--
-- Indexes for table `glssiterates`
--
ALTER TABLE `glssiterates`
  ADD PRIMARY KEY (`siteID`);

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
-- Indexes for table `packageinfo`
--
ALTER TABLE `packageinfo`
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
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webelements`
--
ALTER TABLE `webelements`
  ADD PRIMARY KEY (`elementID`);

--
-- Indexes for table `webspeakers`
--
ALTER TABLE `webspeakers`
  ADD PRIMARY KEY (`InfoID`),
  ADD KEY `idx2` (`fullname`),
  ADD KEY `idx3` (`picture1`),
  ADD KEY `idx4` (`profile_row`);

--
-- Indexes for table `webtestimonies`
--
ALTER TABLE `webtestimonies`
  ADD PRIMARY KEY (`testimonyID`),
  ADD KEY `idx2` (`fullname`);

--
-- Indexes for table `webvideos`
--
ALTER TABLE `webvideos`
  ADD PRIMARY KEY (`videoID`),
  ADD KEY `idx1` (`videoname`),
  ADD KEY `idx2` (`youtubeURL`),
  ADD KEY `idx3` (`thumbnailimage`);

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
-- AUTO_INCREMENT for table `billingsummary`
--
ALTER TABLE `billingsummary`
  MODIFY `billingid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budget_expensetype`
--
ALTER TABLE `budget_expensetype`
  MODIFY `exptypeID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `budget_revenue`
--
ALTER TABLE `budget_revenue`
  MODIFY `revenueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cmembership`
--
ALTER TABLE `cmembership`
  MODIFY `UserID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dbo_payments`
--
ALTER TABLE `dbo_payments`
  MODIFY `Row_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delegate`
--
ALTER TABLE `delegate`
  MODIFY `delegateID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `delegateorders`
--
ALTER TABLE `delegateorders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Designations`
--
ALTER TABLE `Designations`
  MODIFY `designationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ExpenseType`
--
ALTER TABLE `ExpenseType`
  MODIFY `exptypeID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `glssiteinfo`
--
ALTER TABLE `glssiteinfo`
  MODIFY `siteID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `packageinfo`
--
ALTER TABLE `packageinfo`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `RevenueType`
--
ALTER TABLE `RevenueType`
  MODIFY `revtypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `roleID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webelements`
--
ALTER TABLE `webelements`
  MODIFY `elementID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `webspeakers`
--
ALTER TABLE `webspeakers`
  MODIFY `InfoID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `webtestimonies`
--
ALTER TABLE `webtestimonies`
  MODIFY `testimonyID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `webvideos`
--
ALTER TABLE `webvideos`
  MODIFY `videoID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
