/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.3.12-MariaDB : Database - chibwaye_eapcexpo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`chibwaye_eapcexpo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `chibwaye_eapcexpo`;

/*Table structure for table `budget_expenses` */

DROP TABLE IF EXISTS `budget_expenses`;

CREATE TABLE `budget_expenses` (
  `expenseID` int(5) NOT NULL DEFAULT 0,
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

/*Table structure for table `budget_expensetype` */

DROP TABLE IF EXISTS `budget_expensetype`;

CREATE TABLE `budget_expensetype` (
  `exptypeID` int(4) NOT NULL AUTO_INCREMENT,
  `expType` varchar(100) DEFAULT NULL,
  `ExpCategory` varchar(100) DEFAULT NULL,
  `Description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`exptypeID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `budget_expensetype` */

insert  into `budget_expensetype`(`exptypeID`,`expType`,`ExpCategory`,`Description`) values 
(3,'Nauli za kwenda kwa Marwa','Extraordinary Expenses','Nauli ya Gid'),
(2,'Matumizi ya lazima','Operating Expenses','Some matumizi hapa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
