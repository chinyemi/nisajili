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
/*Table structure for table `webelements` */

DROP TABLE IF EXISTS `webelements`;

CREATE TABLE `webelements` (
  `elementID` int(5) NOT NULL AUTO_INCREMENT,
  `Content` text,
  `Category` varchar(100) DEFAULT NULL,
  `Toggle` varchar(4) DEFAULT NULL,
  `Position` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`elementID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `webelements` */

insert  into `webelements`(`elementID`,`Content`,`Category`,`Toggle`,`Position`) values 
(1,'The Global Leadership Summit','Title','YES','Top Section'),
(2,'Fresh, actionable and inspiring leadership content from a world-class faculty at a convenient location near you.	','Slogan','YES','Top Section'),
(12,'<script type=\"text/javascript\">function add_chatinline(){var hccid=96094733;var nt=document.createElement(\"script\");nt.async=true;nt.src=\"https://mylivechat.com/chatinline.aspx?hccid=\"+hccid;var ct=document.getElementsByTagName(\"script\")[0];ct.parentNode.insertBefore(nt,ct);}\r\nadd_chatinline(); </script>\r\n','Chat','NO','Bottom');

/*Table structure for table `webtestimonies` */

DROP TABLE IF EXISTS `webtestimonies`;

CREATE TABLE `webtestimonies` (
  `testimonyID` int(5) NOT NULL AUTO_INCREMENT,
  `testimony` text,
  `fullname` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `feedback` varchar(4) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`testimonyID`),
  KEY `idx2` (`fullname`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `webtestimonies` */

insert  into `webtestimonies`(`testimonyID`,`testimony`,`fullname`,`designation`,`city`,`country`,`feedback`,`picture`) values 
(1,'I immediately realized the GLS, with both the practical and inspirational content, was going to have an impact on my country. I\'ve seen it become a huge help for the business world and the Church world. Because of the GLS, these leaders are realizing','Janos Illessy','Business Leader','','Hungary','NO',''),
(2,'The idea that everyone wins when leadership gets better gripped me in a big way. I began to look at how my country could be better if our leadership got better. I moved from a place of just thinking about improving national leadership to becoming a p','Gadville MacDonald','GLS Leader','','The Bahamas','NO',''),
(3,'We brought the idea for a GLS to the top schools in the country. Because of the impact of the Summit in the lives of our students, several schools have made the GLS training a standard for their students','Harold Chilowa','GLS Leader','','Zimbabwe','NO',''),
(4,'The Global Leadership Summit will hone and improve your leadership skills with fresh perspectives from world-class leaders.','Jeff Van Drunen','President FutureCeuticals','','','YES','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
