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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `expenses` */

insert  into `expenses`(`expenseID`,`Type`,`Amount`,`DateRecorded`,`Description`,`Site`) values 
(2,'Delivery Expense',20000.00,'2019-05-06','Some descriptions','Lilongwe'),
(3,'Salaries Expense ',43636.00,'2019-05-06','gddtjtdjtfk','Blantyre'),
(4,'Matumizi ya lazima',10000.00,'2019-05-06','Amechukua Gid','Lilongwe'),
(5,'Utility',9000.00,'2019-05-06','Spent on the day of event','Lilongwe');

/*Table structure for table `ExpenseType` */

DROP TABLE IF EXISTS `ExpenseType`;

CREATE TABLE `ExpenseType` (
  `exptypeID` int(4) NOT NULL AUTO_INCREMENT,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`exptypeID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ExpenseType` */

insert  into `ExpenseType`(`exptypeID`,`expType`,`ExpCategory`,`Description`) values 
(3,'Nauli za kwenda kwa Marwa','Extraordinary Expenses','Nauli ya Gid'),
(2,'Matumizi ya lazima','Operating Expenses','Some matumizi hapa'),
(4,'Utility','Operating Expenses','Water, electricity and Internet');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
