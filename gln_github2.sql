/*
SQLyog Community v12.4.1 (64 bit)
MySQL - 5.6.41-84.1 : Database - afyapopo_glsmw
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `ExpenseType` */

DROP TABLE IF EXISTS `ExpenseType`;

CREATE TABLE `ExpenseType` (
  `exptypeID` int(4) NOT NULL AUTO_INCREMENT,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`exptypeID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `ExpenseType` */

insert  into `ExpenseType`(`exptypeID`,`expType`,`ExpCategory`,`Description`) values 
(3,'Nauli za kwenda kwa Marwa','Extraordinary Expenses','Nauli ya Gid'),
(2,'Matumizi ya lazima','Operating Expenses','Some matumizi hapa');

/*Table structure for table `bankdetails` */

DROP TABLE IF EXISTS `bankdetails`;

CREATE TABLE `bankdetails` (
  `bankID` int(4) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(200) DEFAULT NULL,
  `account_name` varchar(200) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `bank_address` varchar(200) DEFAULT NULL,
  `swift_code` varchar(50) DEFAULT NULL,
  `account_currency` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`bankID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bankdetails` */

insert  into `bankdetails`(`bankID`,`bank_name`,`account_name`,`account_number`,`branch_name`,`bank_address`,`swift_code`,`account_currency`) values 
(1,'Barclays Bank Harare','International Christian Ministries','1546449','Hurlingham Branch','Barclays Westend Building, Off Waiyaki Way\r\nPO Box 30120 - 00100\r\nNairobi\r\nKenya','BARCKENX','US$'),
(2,'MPESA','GLS2018','825500',NULL,NULL,NULL,'KSH');

/*Table structure for table `billingsummary` */

DROP TABLE IF EXISTS `billingsummary`;

CREATE TABLE `billingsummary` (
  `billingid` int(6) NOT NULL AUTO_INCREMENT,
  `totalsmssent` double(10,2) DEFAULT NULL,
  `smsprice` double(10,2) DEFAULT NULL,
  `smsbilledamount` double(10,2) DEFAULT NULL,
  `billingrate` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`billingid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `billingsummary` */

insert  into `billingsummary`(`billingid`,`totalsmssent`,`smsprice`,`smsbilledamount`,`billingrate`) values 
(1,0.00,0.38,0.00,0.09);

/*Table structure for table `budget_expenses` */

DROP TABLE IF EXISTS `budget_expenses`;

CREATE TABLE `budget_expenses` (
  `expenseID` int(5) NOT NULL DEFAULT '0',
  `Type` varchar(50) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Site` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `budget_expenses` */

insert  into `budget_expenses`(`expenseID`,`Type`,`Amount`,`DateRecorded`,`Description`,`Site`) values 
(2,'Delivery Expense',20000.00,'2019-05-06','Some descriptions','Lilongwe'),
(3,'Salaries Expense ',43636.00,'2019-05-06','gddtjtdjtfk','Blantyre'),
(4,'Matumizi ya lazima',10000.00,'2019-05-06','Amechukua Gid','Lilongwe');

/*Table structure for table `cmembership` */

DROP TABLE IF EXISTS `cmembership`;

CREATE TABLE `cmembership` (
  `UserID` int(5) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`UserID`),
  KEY `idx` (`UserName`),
  KEY `idx1` (`Fullname`),
  KEY `idx3` (`sessionID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `cmembership` */

insert  into `cmembership`(`UserID`,`UserName`,`Password`,`Fullname`,`Gender`,`DoB`,`Email`,`MobileNo`,`Designation`,`Department`,`Userlevel`,`sessionID`,`dateregistered`,`JobDescriptions`,`DateEmployed`,`ContractDurations`,`MonthlySalary`,`UserAccountSuspended`,`ForcedLogOff`,`SpecialAdminRoles`) values 
(10,'admin','e10adc3949ba59abbe56e057f20f883e','System Administrator','Male','2004-10-18','mbutho@digitalbraintz.com','0713427857','Technical Support',NULL,'Administrator','o35ggkhmaolrsisf92ugeu5bi0','2018-09-18',NULL,NULL,NULL,NULL,'NO','NO','NO'),
(34,'wendell','42825d48323675e6ee175947ad8f5bd5','Wendell','Male','1975-07-11','wendell@tpi.co.za','+26775340976','Country Director',NULL,'Administrator',NULL,'2019-03-22',NULL,NULL,NULL,NULL,'NO',NULL,'NO'),
(33,'werner','827ccb0eea8a706c4c34a16891f84e7b','Werner Rossow','Male','1982-06-15','werner@willowcreeksa.co.za','+27833569760','Producer',NULL,'Administrator','m4ser62tqu3spk8g1n94a35go0','2019-03-22',NULL,NULL,NULL,NULL,'NO','NO','NO'),
(35,'emily','c2533fa4fcb327c2a3e1430360cd1d85','Emily Rankoko','Female','1997-03-05','minkier@yahoo.com','0713525707','Technical Support',NULL,'Normal','','2019-03-26',NULL,NULL,NULL,NULL,'NO','NO','NO');

/*Table structure for table `dbo_payments` */

DROP TABLE IF EXISTS `dbo_payments`;

CREATE TABLE `dbo_payments` (
  `Row_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Result` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ResultExplanation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Music_Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Download_Url` text COLLATE utf8_unicode_ci NOT NULL,
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
  `Artist_Id` int(11) NOT NULL,
  PRIMARY KEY (`Row_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `dbo_payments` */

insert  into `dbo_payments`(`Row_Id`,`Result`,`ResultExplanation`,`Music_Code`,`Download_Url`,`TransactionApproval`,`TransactionCurrency`,`TransactionAmount`,`FraudAlert`,`FraudExplnation`,`TransactionNetAmount`,`TransactionSettlementDate`,`TransactionRollingReserveAmount`,`TransactionRollingReserveDate`,`CustomerPhone`,`CustomerCountry`,`CustomerAddress`,`CustomerCity`,`CustomerZip`,`MobilePaymentRequest`,`AccRef`,`Token`,`User_Ref`,`Trans_Id`,`DownloadStatus_Id`,`Period`,`Agent_Id`,`Artist_Id`) values 
(1,'000','Transaction Paid','64Q4NV2S','http://www.hudumaapp.com/music/1.mp3','71706304142','TZS','1200.00','001','','1158.00','2019/03/25','0.00','2019/03/22','0712334223','Array','DSM','0','0','Paid','5248QGW-FTVBD3','A54A74D7-B7F8-4F6A-BE03-4DA423BAB228','5248QGW-FTVBD3','A54A74D7-B7F8-4F6A-BE03-4DA423BAB228',1,'201904',10,3),
(2,'000','Transaction Paid','5248QGW','http://www.hudumaapp.com/music/1.mp3','6CM425JHFL0','TZS','1200.00','001','','0.00','2019/03/22','0.00','Array','0712334223','Array','DSM','0','0','Paid','5248QGW-V909ZY','BD5D7028-3E71-4356-91EE-F1F352C668F8','1111111','BD5D7028-3E71-4356-91EE-F1F352C668F8',1,'201904',10,2),
(3,'000','Transaction Paid','209WTNMQ','http://www.hudumaapp.com/music/4.mp4','52103596140','TZS','1000.00','001','','0.00','2019/03/23','0.00','Array','0758401046','Array','DSM','0','0','Paid','3-1020190430063331','9ABE0F55-6CF4-437D-97A3-CB1FD01BA49B','209WTNMQ-YAT6ML-YAT6ML','9ABE0F55-6CF4-437D-97A3-CB1FD01BA49B',1,'201904',10,1);

/*Table structure for table `delegate` */

DROP TABLE IF EXISTS `delegate`;

CREATE TABLE `delegate` (
  `delegateID` int(10) NOT NULL AUTO_INCREMENT,
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
  `image` varchar(255) DEFAULT 'not_done.png',
  PRIMARY KEY (`delegateID`),
  KEY `idx1` (`fullname`),
  KEY `idx2` (`ticketNo`),
  KEY `idx3` (`package`),
  KEY `idex4` (`checkedin`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `delegate` */

insert  into `delegate`(`delegateID`,`fullname`,`gender`,`mobile`,`email`,`organization`,`paymentrefnum`,`ticketNo`,`datereg`,`amount`,`package`,`checkedin`,`teamedition`,`gatepass`,`vehicletype`,`registrationnum`,`glsyear`,`ticket_paid`,`payment_mode`,`payment_ref_no`,`payment_status`,`payment_method`,`payment_date`,`pesapal_tranx_track_id`,`cert_paid`,`cert_amount`,`cert_pay_mode`,`cert_pay_ref`,`cert_pay_date`,`glssite`,`image`) values 
(1,'Mbutho Chibwaye','Male','0713427857','ceombutho@gmail.com','DigitalBrain','ZNGSQIH',NULL,'2019-04-08',50.00,'NORMAL','NO','NO','NO',NULL,NULL,'2019','NO',NULL,NULL,NULL,NULL,NULL,NULL,'NO',NULL,NULL,NULL,NULL,'Lilongwe','not_done.png'),
(2,'Mathew Mbaga',NULL,'0713460429','ceombutho@gmail.com','SELF','XOJS','HAR155020754C','2019-04-08',0.00,'COMPLIMENTARY','YES','NO','YES','Nissan','T282DMS','2019','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'XOJS','2019-04-08','Lilongwe','not_done.png'),
(3,'Edith Lyimo',NULL,'0715525707','ceombutho@gmail.com','SELF','WZTK','BUL849023423S','2019-04-08',0.00,'SPONSORED','NO','NO','NO',NULL,NULL,'2019','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'WZTK','2019-04-08','Blantyre','not_done.png'),
(4,'Mbutho Chibwaye','Male','0713427857','ceombutho@gmail.com','SELF','8SA6UTJ','Gwe1654114035N','2019-04-15',50.00,'NORMAL','NO','NO','NO',NULL,NULL,'2019','YES','Cash','77777',NULL,NULL,'2019-04-04',NULL,'YES',1000.00,'Cash','8SA6UTJ','2019-04-04','Blantyre','not_done.png'),
(5,'Chinyemi Mbutho','Male','0762210399','ceombutho@gmail.com','SELF','VM5WH2R','Bul4068122750N','2019-04-15',50.00,'NORMAL','YES','NO','NO',NULL,NULL,'2019','YES','23242','23235235',NULL,NULL,'2019-04-04',NULL,'YES',1000.00,'23242','VM5WH2R','2019-04-04','Blantyre','not_done.png'),
(6,'Upendo Kimbe',NULL,'0719525279','ceombutho@gmail.com','DigitalBrain','WOQT','HAR32010623D','2019-04-15',0.00,'DELEGATE','NO','NO','NO',NULL,NULL,'2019','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'WOQT','2019-04-15','Blantyre','not_done.png'),
(7,'Felister Massawe',NULL,'0713525922','ceombutho@gmail.com','DigitalBrain','DLU2FXJ','Bul702010741V','2019-04-15',0.00,'VIP','NO','NO','NO',NULL,NULL,'2018','YES','Cash','526262',NULL,NULL,'2019-04-15',NULL,'YES',1000.00,'Cash','526262','2019-04-15','Blantyre','not_done.png'),
(8,'Martin German','Male','0712354433','martin.stegmaier@globalleadership.org','GLN German','WXTCQ41','Har4057120029N','2019-04-17',40.00,'NORMAL','YES','NO','NO',NULL,NULL,'2019','YES','Cash','23235235',NULL,NULL,'2019-04-04',NULL,'YES',1000.00,'Cash','WXTCQ41','2019-04-04','Blantyre','not_done.png'),
(9,'Mbutho Chibwaye',NULL,'0762210399','ceombutho@gmail.com','SELF','KVJM','LIL894112755C','2019-05-01',0.00,'COMPLIMENTARY','NO','NO','NO',NULL,NULL,'2018','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'KVJM','2019-05-01','Lilongwe','not_done.png'),
(10,'Mbutho Chibwaye99',NULL,'0713427857','ceombutho@gmail.com','SELF','PZTG','BLA122112920S','2019-05-01',0.00,'SPONSORED','NO','NO','NO',NULL,NULL,'2019','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'PZTG','2019-05-01','Lilongwe','not_done.png'),
(11,'John Rwezaura',NULL,'07622103990','ceombutho@gmail.com','DigitalBrain','GUFD','LIL152011923V','2019-05-01',0.00,'VOLUNTEER','NO','NO','NO',NULL,NULL,'2018','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'GUFD','2019-05-01','Blantyre','not_done.png'),
(12,'Mathew Mbaga',NULL,'0713525707','edith.lyimo@digitalbraintz.com','KLNT','SBJR','LIL863012100C','2019-05-01',0.00,'COMPLIMENTARY','NO','NO','NO',NULL,NULL,'2019','YES',NULL,NULL,NULL,NULL,NULL,NULL,'YES',1000.00,NULL,'SBJR','2019-05-01','Lilongwe','not_done.png'),
(13,'',NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'NO',NULL,NULL,NULL,NULL,NULL,'not_done.png');

/*Table structure for table `delegateorders` */

DROP TABLE IF EXISTS `delegateorders`;

CREATE TABLE `delegateorders` (
  `orderID` int(10) NOT NULL AUTO_INCREMENT,
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
  `glssite` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `delegateorders` */

insert  into `delegateorders`(`orderID`,`organization`,`mobile`,`email`,`paymentrefnum`,`datereg`,`amount`,`package`,`quantity`,`glsyear`,`ticket_paid`,`payment_mode`,`payment_date`,`glssite`) values 
(1,'UDOM','0713427857','ceombutho@gmail.com','N1LM6EG','2019-04-08',385.00,'NORMAL',11,'2019',NULL,NULL,NULL,'KADOMA'),
(2,'Zim ABC','0713427857','ceombutho@gmail.com','E3HXMRW','2019-04-15',350.00,'NORMAL',10,'2019',NULL,NULL,NULL,'HARARE');

/*Table structure for table `expenses` */

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `expenseID` int(5) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) DEFAULT NULL,
  `Amount` double(10,2) DEFAULT NULL,
  `DateRecorded` date DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Site` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`expenseID`),
  KEY `idx1` (`Type`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `expenses` */

insert  into `expenses`(`expenseID`,`Type`,`Amount`,`DateRecorded`,`Description`,`Site`) values 
(2,'Delivery Expense',20000.00,'2019-05-06','Some descriptions','Lilongwe'),
(3,'Salaries Expense ',43636.00,'2019-05-06','gddtjtdjtfk','Blantyre'),
(4,'Matumizi ya lazima',10000.00,'2019-05-06','Amechukua Gid','Lilongwe');

/*Table structure for table `glssitedate` */

DROP TABLE IF EXISTS `glssitedate`;

CREATE TABLE `glssitedate` (
  `siteID` int(2) NOT NULL,
  `sitedate` varchar(100) DEFAULT NULL,
  `inconferencedeadline` date DEFAULT NULL,
  `superearlybirddeadline` date DEFAULT NULL,
  `earlybirddeadline` date DEFAULT NULL,
  PRIMARY KEY (`siteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `glssitedate` */

insert  into `glssitedate`(`siteID`,`sitedate`,`inconferencedeadline`,`superearlybirddeadline`,`earlybirddeadline`) values 
(1,'5-6 Nov,2019',NULL,'2019-04-19','2019-10-09'),
(2,'8-9 Nov,2019',NULL,'2019-04-08','2019-04-08');

/*Table structure for table `glssiteinfo` */

DROP TABLE IF EXISTS `glssiteinfo`;

CREATE TABLE `glssiteinfo` (
  `siteID` int(2) NOT NULL AUTO_INCREMENT,
  `sitename` varchar(100) DEFAULT NULL,
  `sitedescription` varchar(255) DEFAULT NULL,
  `eventtype` varchar(50) DEFAULT NULL,
  `sitevenue` varchar(100) DEFAULT NULL,
  `sitemobile` varchar(50) DEFAULT NULL,
  `siteaddress` varchar(100) DEFAULT NULL,
  `sitecontactperson` varchar(200) DEFAULT NULL,
  `sitetarget` int(6) DEFAULT NULL,
  `sitedays` int(2) DEFAULT NULL,
  PRIMARY KEY (`siteID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `glssiteinfo` */

insert  into `glssiteinfo`(`siteID`,`sitename`,`sitedescription`,`eventtype`,`sitevenue`,`sitemobile`,`siteaddress`,`sitecontactperson`,`sitetarget`,`sitedays`) values 
(1,'Lilongwe','GLS','5-6 Nov,2019','To be announced','265886908789',NULL,NULL,600,2),
(2,'Blantyre','GLS ','8-9 Nov,2019','To be announced','265886908789',NULL,NULL,300,2);

/*Table structure for table `glssiterates` */

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
  `exchangerate` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`siteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `glssiterates` */

insert  into `glssiterates`(`siteID`,`inconferencerate`,`superearlybirdrate_normal`,`superearlybirdrate_vip`,`earlybirdrate_normal`,`earlybirdrate_vip`,`regularrate_normal`,`regularrate_vip`,`studentrate`,`grouprate_normal`,`grouprate_vip`,`internationalrate`,`exchangerate`) values 
(1,NULL,NULL,NULL,45000.00,NULL,60000.00,NULL,NULL,45000.00,NULL,100.00,1.00),
(2,NULL,NULL,NULL,45000.00,NULL,60000.00,NULL,NULL,45000.00,NULL,100.00,1.00);

/*Table structure for table `member_group_list` */

DROP TABLE IF EXISTS `member_group_list`;

CREATE TABLE `member_group_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `member_group_list` */

insert  into `member_group_list`(`id`,`member_id`,`user_id`,`group_id`,`date_created`) values 
(2,0,10,0,'2019-05-01 06:23:09'),
(3,10,10,3,'2019-05-01 06:27:48'),
(4,36,10,3,'2019-05-01 06:28:18'),
(5,35,10,1,'2019-05-01 06:31:54'),
(6,34,10,2,'2019-05-01 06:35:03'),
(7,36,10,5,'2019-05-01 06:37:23'),
(8,36,10,2,'2019-05-01 06:38:14'),
(9,36,10,2,'2019-05-01 06:39:24'),
(10,36,10,1,'2019-05-01 06:53:52'),
(11,33,10,2,'2019-05-01 07:52:47'),
(12,35,10,5,'2019-05-02 06:45:45'),
(13,36,10,0,'2019-05-02 08:55:27'),
(14,35,10,0,'2019-05-02 08:55:34'),
(15,34,10,0,'2019-05-02 08:55:43'),
(16,10,10,0,'2019-05-02 08:56:34'),
(17,35,10,6,'2019-05-02 08:58:32'),
(18,34,10,6,'2019-05-02 08:58:39'),
(19,33,10,6,'2019-05-02 08:58:53'),
(20,36,10,6,'2019-05-02 09:01:04'),
(21,34,10,6,'2019-05-02 09:01:12'),
(22,10,10,3,'2019-05-02 09:01:21'),
(23,5,10,16,'2019-05-04 03:41:27'),
(24,7,10,16,'2019-05-04 03:41:45'),
(25,1,10,17,'2019-05-04 09:52:26'),
(26,2,10,17,'2019-05-04 09:52:26'),
(27,3,10,17,'2019-05-04 09:52:26'),
(28,4,10,17,'2019-05-04 09:52:26'),
(29,5,10,17,'2019-05-04 09:52:26'),
(30,6,10,17,'2019-05-04 09:52:26'),
(31,7,10,17,'2019-05-04 09:52:26'),
(32,8,10,17,'2019-05-04 09:52:26'),
(33,9,10,17,'2019-05-04 09:52:26'),
(34,10,10,17,'2019-05-04 09:52:26'),
(35,11,10,18,'2019-05-04 10:16:14'),
(36,1,10,18,'2019-05-04 10:17:20'),
(37,2,10,18,'2019-05-04 10:17:20'),
(38,3,10,18,'2019-05-04 10:17:20'),
(39,4,10,18,'2019-05-04 10:17:20'),
(40,5,10,18,'2019-05-04 10:17:20'),
(41,6,10,18,'2019-05-04 10:17:20'),
(42,7,10,18,'2019-05-04 10:17:20'),
(43,8,10,18,'2019-05-04 10:17:20'),
(44,9,10,18,'2019-05-04 10:17:20'),
(45,10,10,18,'2019-05-04 10:17:20'),
(46,1,10,19,'2019-05-06 05:47:09'),
(47,2,10,19,'2019-05-06 05:47:09'),
(48,3,10,19,'2019-05-06 05:47:09'),
(49,4,10,19,'2019-05-06 05:47:09'),
(50,5,10,19,'2019-05-06 05:47:09'),
(51,6,10,19,'2019-05-06 05:47:09'),
(52,7,10,19,'2019-05-06 05:47:09'),
(53,8,10,19,'2019-05-06 05:47:09'),
(54,9,10,19,'2019-05-06 05:47:09'),
(55,10,10,19,'2019-05-06 05:47:09');

/*Table structure for table `member_groups` */

DROP TABLE IF EXISTS `member_groups`;

CREATE TABLE `member_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `membersno` float NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `member_groups` */

insert  into `member_groups`(`group_id`,`group_name`,`user_id`,`date_created`,`membersno`) values 
(1,'WAZEE WA KANISA',10,'2019-05-01 04:31:43',2),
(2,'WAFADHILI WA KANISA',10,'2019-05-01 04:32:01',4),
(3,'UMOJA WA WAKINA MAMA',10,'2019-05-01 04:33:21',3),
(18,'huduma kwa wateja',10,'2019-05-04 10:15:51',11),
(5,'AKINA MAMA WAZEEIYA',10,'2019-05-01 05:37:32',2),
(6,'Watsap User',10,'2019-05-02 08:55:07',5),
(7,'fnfh',0,'2019-05-03 05:53:50',0),
(12,'JIMBO JIPYA BAGAMOYO',10,'2019-05-04 06:11:51',5),
(17,'Jerusalem',10,'2019-05-04 09:51:57',10),
(16,'Waliohudhuria',10,'2019-05-04 03:40:09',2),
(19,'LHCC',10,'2019-05-06 05:46:11',10);

/*Table structure for table `packageinfo` */

DROP TABLE IF EXISTS `packageinfo`;

CREATE TABLE `packageinfo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(200) DEFAULT NULL,
  `paid_nocash` varchar(5) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `packageinfo` */

insert  into `packageinfo`(`id`,`package_name`,`paid_nocash`,`remarks`) values 
(1,'Student','YES','Students'),
(2,'Normal','YES','Normal'),
(3,'VIP','YES','VIP'),
(4,'Complimentary','NO','Complimentary'),
(5,'Sponsored','NO','Sponsored'),
(6,'Volunteer','NO','Volunteer'),
(7,'Official','NO','Official'),
(8,'Delegate','NO','Delegate'),
(9,'Exhibitor','NO','Exhibitor');

/*Table structure for table `sent_sms` */

DROP TABLE IF EXISTS `sent_sms`;

CREATE TABLE `sent_sms` (
  `sent_Id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_sent` text COLLATE utf8_unicode_ci NOT NULL,
  `sent_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sms_id` int(11) NOT NULL,
  `batch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_count` float NOT NULL,
  PRIMARY KEY (`sent_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sent_sms` */

insert  into `sent_sms`(`sent_Id`,`sms_sent`,`sent_to`,`user_id`,`time_in`,`sms_type`,`sms_id`,`batch`,`receiver_count`) values 
(1,'This sms was meant to test if the update feature is working correctly','255758401046',10,'2019-05-02 08:14:18','SMS',8,'20190502091418',2),
(2,'This sms was meant to test if the update feature is working correctly','255715525707',10,'2019-05-02 08:14:18','SMS',8,'20190502091418',2),
(4,'Mchungaji kesho atachelewa kurudi naomba mjiandae kuimba saaaaanaa','gideon.mugalula@gmail.com',10,'2019-05-02 08:33:50','EMAIL',5,'20190502093350',2),
(5,'Mchungaji kesho atachelewa kurudi naomba mjiandae kuimba saaaaanaa','info@hudumaapp.com',10,'2019-05-02 08:33:50','EMAIL',5,'20190502093350',2),
(6,'This sms was meant to test if the update feature is working correctly','255713427857',10,'2019-05-02 08:34:22','WHATSAPP',8,'20190502093421',3),
(7,'This sms was meant to test if the update feature is working correctly','255713460429',10,'2019-05-02 08:34:25','WHATSAPP',8,'20190502093421',3),
(8,'This sms was meant to test if the update feature is working correctly','255715525707',10,'2019-05-02 08:34:26','WHATSAPP',8,'20190502093421',3),
(9,'Mesage ya Mwisho','0713427857',0,'2019-05-02 10:52:14','WHATSAPP',3,'20190502045210',1),
(10,'Hii ni test ya kwanza','ceombutho@gmail.com',10,'2019-05-04 04:36:04','EMAIL',9,'20190504103604',2),
(11,'Hii ni test ya kwanza','ceombutho@gmail.com',10,'2019-05-04 04:36:05','EMAIL',9,'20190504103604',2);

/*Table structure for table `siteseason` */

DROP TABLE IF EXISTS `siteseason`;

CREATE TABLE `siteseason` (
  `seasonID` int(4) NOT NULL AUTO_INCREMENT,
  `Year` varchar(4) DEFAULT NULL,
  `SeasonStatus` varchar(10) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`seasonID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `siteseason` */

insert  into `siteseason`(`seasonID`,`Year`,`SeasonStatus`,`Description`) values 
(1,'2018','CLOSED','Season Opened'),
(2,'2019','OPEN','Season Open'),
(6,'2020','CLOSED','KHGHKG'),
(8,'2022','CLOSED','hfhffjf\'jhfjfjdjdjd\'hjfjgdj');

/*Table structure for table `sms_balance` */

DROP TABLE IF EXISTS `sms_balance`;

CREATE TABLE `sms_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sms_balance` float NOT NULL,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_balance` */

insert  into `sms_balance`(`id`,`member_code`,`sms_balance`,`sms_type`,`user_id`) values 
(1,'AA',2,'SMS',0),
(2,'AA',2,'EMAIL',0),
(3,'AA',3,'WHATSAPP',0);

/*Table structure for table `sms_list` */

DROP TABLE IF EXISTS `sms_list`;

CREATE TABLE `sms_list` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_description` text COLLATE utf8_unicode_ci NOT NULL,
  `sms_composedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sms_recipients` float NOT NULL,
  `user_Id` int(11) NOT NULL,
  `email_recipients` float NOT NULL,
  PRIMARY KEY (`sms_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_list` */

insert  into `sms_list`(`sms_id`,`sms_description`,`sms_composedate`,`sms_recipients`,`user_Id`,`email_recipients`) values 
(1,'new sms','2019-04-28 07:58:47',0,10,0),
(2,'Karibuni katika Ibada yetu itakayofanyika kesho asubuhi','2019-04-28 08:01:25',0,10,2),
(3,'Mesage ya Mwisho','2019-04-28 08:21:45',0,10,0),
(4,'skldmsalkdmnlaksdmnlaksdmnlaksn dlasndlaksndlaknsldasdasdas','2019-04-28 10:51:20',0,10,0),
(5,'Mchungaji kesho atachelewa kurudi naomba mjiandae kuimba saaaaanaa','2019-04-29 09:03:40',0,10,0),
(6,'Azimio la Mbezi beach linasisitiza kudeliver ontime na kwenda sokoni . Upatapo ujumbe huu mjulishe na mwenzio','2019-04-30 03:48:38',0,10,0),
(7,'OFISI MPYA AUJ OFISI HII HII','2019-04-30 10:24:57',0,10,0),
(8,'This sms was meant to test if the update feature is working correctly','2019-05-01 05:46:50',0,10,0),
(9,'Hii ni test ya kwanza','2019-05-04 04:08:21',0,10,0);

/*Table structure for table `sms_purchases` */

DROP TABLE IF EXISTS `sms_purchases`;

CREATE TABLE `sms_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `amount` float NOT NULL,
  `rate` float NOT NULL,
  `typeid` int(11) NOT NULL,
  `txncode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_purchases` */

insert  into `sms_purchases`(`id`,`purchase_date`,`user_id`,`quantity`,`amount`,`rate`,`typeid`,`txncode`) values 
(1,'2019-04-30 05:02:22',10,1000,10000,10,2,'2-1020190430060222'),
(2,'2019-04-30 05:10:11',10,400,33200,83,3,'31020190430061011'),
(3,'2019-04-30 05:27:24',10,2000,166000,83,3,'31020190430062724'),
(4,'2019-04-30 05:33:31',10,3400,282200,83,3,'3-1020190430063331'),
(5,'2019-04-30 06:06:36',10,600,6000,10,2,'2-1020190430070636'),
(6,'2019-04-30 10:47:33',10,500,5000,10,2,'2-1020190430114733'),
(7,'2019-05-01 05:56:09',10,2000,20000,10,2,'2-1020190501065609'),
(8,'2019-05-02 06:49:45',10,6000,0,0,1,'1-1020190502074945'),
(9,'2019-05-03 05:55:51',0,56767,0,0,1,'1-20190503115551'),
(10,'2019-05-04 04:25:03',10,1000,0,0,1,'1-1020190504102503'),
(11,'2019-05-04 04:28:45',10,100,500,5,1,'1-1020190504102845'),
(12,'2019-05-04 10:02:51',10,90,450,5,1,'1-1020190504040251'),
(13,'2019-05-06 05:51:39',10,300,1500,5,1,'1-1020190506115139');

/*Table structure for table `sms_rate` */

DROP TABLE IF EXISTS `sms_rate`;

CREATE TABLE `sms_rate` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float NOT NULL,
  `current_balance` float NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sms_rate` */

insert  into `sms_rate`(`rate_id`,`sms_type`,`rate`,`current_balance`) values 
(1,'EMAIL',5,98),
(2,'WATSHAP',10,0),
(3,'SMS',83,12.0482);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*Table structure for table `webspeakers` */

DROP TABLE IF EXISTS `webspeakers`;

CREATE TABLE `webspeakers` (
  `InfoID` int(5) NOT NULL AUTO_INCREMENT,
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
  `roworder` int(2) DEFAULT NULL,
  PRIMARY KEY (`InfoID`),
  KEY `idx2` (`fullname`),
  KEY `idx3` (`picture1`),
  KEY `idx4` (`profile_row`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `webspeakers` */

insert  into `webspeakers`(`InfoID`,`fullname`,`designation`,`organization`,`biography`,`facebook`,`twitter`,`instagram`,`picture1`,`picture2`,`profile_row`,`roworder`) values 
(1,'Craig <br>Groeschel','Co-Founder & Senior Pastor','Life.Church','Craig Groeschel is senior pastor of Life.Church, an innovative church meeting in multiple U.S. locations and globally online. Known for its missional approach utilizing the latest technology, Life.Church is the creator of the YouVersion Bible App-downloaded in every country. Named in the top 25 CEO\'s in the U.S. (small and midsize companies) by Glassdoor, Groeschel is a New York Times best-selling author, speaks frequently around the world and hosts the Craig Groeschel Leadership Podcast.','craiggroeschel','','craiggroeschel','Craig_web_larger.jpg','Craig_web-300x300.jpg',1,1),
(2,'Bozoma <br>Saint John','Chief Marketing Officer','Endeavor','Bozoma Saint John is Chief Marketing Officer for Endeavor, a global leader in entertainment, sports and fashion operating in more than 30 countries. Over the course of her career, Saint John has earned a formidable reputation as a trailblazing executive.She most recently served as Chief Brand Officer for Uber and also as Head of Global Consumer Marketing for Apple Music and iTunes.For her innovative work, Saint John has been recognized on Fast Company\'s 100 Most Creative People list.','','','','bozoma.jpg','bozoma_small.jpg',1,2),
(3,'Bear<br> Grylls','Adventurer; Writer;','TV Host','Bear Grylls is the embodiment of adventure. A former member of the British Special Forces, Grylls has climbed Everest, crossed the Arctic Ocean in an inflatable boat and has publicly supported the Alpha Course to help inspire people in their journey of faith.His Emmy-nominated TV show Man Vs Wild became one of the most watched programs on the planet with an estimated audience of 1.2 billion.He also hosts NBCâ€™s hit show Running Wild with Bear Grylls as well as groundbreaking series on National Geographic, Netflix and Amazon.He is a number 1 best-selling author and has sold over 15 million books. These include his autobiography Mud, Sweat and Tears,and this year a powerful new book on faith called: Soul Fuel. Bear will be joining us by video from the mountains in Switzerland, and is speaking on courage, kindness and never giving up.','','','','bear.jpg','bear_small.jpg',1,4),
(4,'Jo <br>Saxton','Author; Leadership Coach;','Entrepreneur','Nigerian parents and raised in London, England, Jo Saxton brings a multicultural and international perspective to leadership.She has served on staff teams in churches in the UK and the U.S. and is the founder of the Ezer Collective, an initiative that equips and invests in women leaders.Saxton co-hosts the podcast Lead Stories: Tales of Leadership and Life with Steph Oâ€™Brien and has authored three books, including The Dream of You.','','','','Jo_web_larger.jpg','Jo_web-300x300.jpg',2,3),
(5,'Jason <br>Dorsey','#1 Rated Gen Z & Millennial Speaker;','Researcher','Jason Dorsey is President of The Center for Generational Kinetics, which delivers research, speaking and consulting to separate generational myth from truth for leaders around the world.His team has repositioned global brands to win each generation and taken clients from last to first in both employee retention and customer growth. Considered the #1 generations speaker and researcher and called a â€œresearch guruâ€ by Adweek, Dorsey uses original data-driven research to explain generational behaviors.','','','','jason.jpg','jason_small.jpg',2,1),
(6,'Danielle<br> Strickland','Pastor; Author;','Justice Advocate','Danielle Strickland has led churches, started training schools and established justice departments around the world.She spent 22 years as an officer in The Salvation Army and is an Ambassador for Stop The Traffik.With a deep calling to empower people and to transform neighborhoods and the world, she co-founded Infinitum (a way of life), Brave Global, Amplify Peace and the Women Speakers Collective.Strickland is the author of several books, including The Ultimate Exodus.','','','','332124458.jpg','danielle_small.jpg',3,2),
(7,'Patrick <br> Lencioni','Best-Selling Author; Founder','The Table Group','Patrick Lencioni is the author of eleven best-selling books with more than five million copies sold, including The Five Dysfunctions of a Team.Dedicated to providing organizations with ideas, products and services that improve teamwork, clarity and employee engagement, his leadership models serve a diverse base from Fortune 500 companies to professional sports organizations to churches.A Summit favorite, Lencioni will unpack his new work on motivation and how it shapes our leadership.','','','','Patrick_web_larger.jpg','Patrick_web-300x300.jpg',1,3),
(8,'Aja <br>Brown','Mayor','City of Compton','At the age of 31, Aja Brown made history as the youngest elected mayor of Compton, California.A national trailblazer, her revitalization strategy centers on family values, quality of life,economic development and infrastructural growth. Overwhelmingly re-elected to a second term in 2017, Mayor Brownâ€™s community initiatives and policy changes have significantly reduced gang-related homicides and the unemployment rate.Mayor Brown is the recipient of multiple honors, including the esteemed 2016 John F. Kennedy New Frontier Award.','','','','aja.jpg','aja_small.jpg',3,4),
(9,'Liz <br>Bohannon','Co-Founder & Co-CEO','Sseko Designs','Liz Bohannon is the founder of Sseko Designs, a socially-conscious fashion brand that works to create leadership and educational opportunities for women across the globe.She believes that business is a powerful platform for social change and that girls are our future. She was named by Bloomberg Businessweek as a top social entrepreneur and by Forbes as a top 20 speaker.In her book, Beginnerâ€™s Pluck, releasing at the Summit, Bohannon uses her journey to explore 14 principles for not finding but building a life of purpose, passion and impact.','','','','liz.jpg','liz_small.jpg',2,1),
(10,'Dr. Krish <br>Kandiah','Founder, Home for Good; Consultant;','Social Entrepreneur','An advocate for fostering and adoption, Dr. Kandiah is the founding director of Home for Good, a charity seeking to find permanent loving homes for children in the UK foster care system.He is the author of 13 books including his latest, Faitheism: Why Christians and Atheists have more in common than you think. He is a regular broadcaster on the BBC and a contributor to the Guardian and Times of London. An international speaker and consultant, he offers both creativity and academic reflection to bring strategic change, culture shift and innovation.Dr. Kandiah and his wife have 7 children through birth, adoption and fostering.','','','','dr_krish.jpg','krish_small.jpg',3,2),
(11,'Todd <br>Henry','Founder, Accidental Creative; Author;','Leadership Consultant','Todd Henry teaches leaders and organizations how to establish practices that lead to everyday brilliance.As host of The Accidental Creative Podcastâ€”with millions of downloadsâ€” Henry delivers weekly tips and ideas for staying prolific, brilliant and healthy.He is the author of four books, including Die Empty which was named by Amazon as one of the best books of 2013.Henryâ€™s latest book, Herding Tigers, Be the Leader that Creative People Need, is a practical handbook for anyone charged with leading people and teams to creative brilliance.','','','','todd.jpg','todd_small.jpg',3,3),
(12,'Jia <br>Jiang','Best-selling Author; Blogger;','Entrepreneur','Years after Jia Jiang began his career in the corporate world, he became an entrepreneur and discovered everyoneâ€™s biggest fear: rejection.To conquer his fear, Jiang embarked on a journey and discovered a world where people are much kinder than we imagine.The best-selling author of Rejection Proof and owner of Rejection Therapy and CEO of Wuju Learning, Jiang teaches people and trains organizations to become fearless through rejection training.','','','','jia.jpg','jia_small.jpg',2,4),
(13,'Chris <br>Voss','Former FBI Hostage Negotiator; CEO & Founder','The Black Swan Group','Chris Voss founded The Black Swan Group, a firm that provides training and advises Fortune 500 companies through complex negotiations.A 24-year veteran of the FBI, he was the lead international kidnapping negotiator and was trained not only by the FBI, but by Scotland Yard and Harvard Law School.In his book, Never Split the Difference: Negotiating As If Your Life Depended On It, Voss breaks down these strategies so that anyone can use them in the workplace, in business or at home.','','','','chris_voss.jpg','chris_voss_small.jpg',4,1),
(14,'DeVon <br>Franklin','Producer, Author, Speaker; CEO','Franklin Entertainment','DeVon Franklin is an award-winning producer, best-selling author and spiritual success coach.Beliefnet named him one of the Most Influential Christians Under 40.He is CEO of Franklin Entertainment with 20th Century Fox and has produced the hit films Miracles from Heaven, Heaven is for Real and The Star.A New York Times best-selling author, his latest book is The Truth About Men: What Men and Women Need to Know.Franklin is dedicated to using his leadership and the media as a powerful tool to encourage millions of lives around the world.                                                                                        ','','','','devon.jpg','devon_small.jpg',4,1);

/*Table structure for table `webtestimonies` */

DROP TABLE IF EXISTS `webtestimonies`;

CREATE TABLE `webtestimonies` (
  `testimonyID` int(5) NOT NULL AUTO_INCREMENT,
  `testimony` text,
  `fullname` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`testimonyID`),
  KEY `idx2` (`fullname`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `webtestimonies` */

insert  into `webtestimonies`(`testimonyID`,`testimony`,`fullname`,`designation`,`city`,`country`,`picture`) values 
(1,'I immediately realized the GLS, with both the practical and inspirational content, was going to have an impact on my country. I\'ve seen it become a huge help for the business world and the Church world. Because of the GLS, these leaders are realizing','Janos Illessy','Business Leader',NULL,'Hungary',NULL),
(2,'The idea that everyone wins when leadership gets better gripped me in a big way. I began to look at how my country could be better if our leadership got better. I moved from a place of just thinking about improving national leadership to becoming a p','Gadville MacDonald','GLS Leader',NULL,'The Bahamas',NULL),
(3,'We brought the idea for a GLS to the top schools in the country. Because of the impact of the Summit in the lives of our students, several schools have made the GLS training a standard for their students','Harold Chilowa','GLS Leader','','Zimbabwe','');

/*Table structure for table `webvideos` */

DROP TABLE IF EXISTS `webvideos`;

CREATE TABLE `webvideos` (
  `videoID` int(5) NOT NULL AUTO_INCREMENT,
  `videoname` varchar(100) DEFAULT NULL,
  `youtubeURL` varchar(200) DEFAULT NULL,
  `thumbnailimage` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`videoID`),
  KEY `idx1` (`videoname`),
  KEY `idx2` (`youtubeURL`),
  KEY `idx3` (`thumbnailimage`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `webvideos` */

insert  into `webvideos`(`videoID`,`videoname`,`youtubeURL`,`thumbnailimage`,`description`) values 
(1,'main video','https://www.youtube.com/embed/qKyc0_UdN8k','1048811861.png','The diverse Summit faculty delivers a unique blend of vision, inspiration and practical skills you can immediately apply.'),
(3,'who video','https://www.youtube.com/embed/ntGbBxyPTlE','1998186151.png','Learn more about our mission and vision.'),
(4,'highlights video','https://www.youtube.com/embed/2WAFOKpeZOs','1092554211.png','Watch highlights from the 2018 Summit.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
