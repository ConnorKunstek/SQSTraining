# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 10.163.140.98 (MySQL 5.7.24-0ubuntu0.18.04.1)
# Database: SQSTrainingDB
# Generation Time: 2018-11-29 05:42:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table assigned_features
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assigned_features`;

CREATE TABLE `assigned_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_number` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `assigned_features` WRITE;
/*!40000 ALTER TABLE `assigned_features` DISABLE KEYS */;

INSERT INTO `assigned_features` (`id`, `feature_number`, `user_id`, `time_added`)
VALUES
	(1,1,8,'2017-03-12 22:30:12'),
	(2,100,12,'2018-03-25 12:57:35'),
	(4,106,8,'2018-03-25 18:46:28'),
	(8,107,6,'2018-04-16 11:12:00'),
	(9,107,92,'2018-04-23 12:10:22');

/*!40000 ALTER TABLE `assigned_features` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `UserAssignedChangeTrigger` AFTER INSERT ON `assigned_features` FOR EACH ROW BEGIN
DELETE FROM auditTable WHERE user_id=NEW.user_id;
INSERT INTO auditTable (user_id) VALUES (NEW.user_id);
END */;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`root`@`localhost` */ /*!50003 TRIGGER `UserAssignedDeleteTrigger` BEFORE DELETE ON `assigned_features` FOR EACH ROW BEGIN
DELETE FROM auditTable WHERE user_id=OLD.user_id;
INSERT INTO auditTable (user_id) VALUES (OLD.user_id);
END */;;
DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;


# Dump of table assigned_group_features
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assigned_group_features`;

CREATE TABLE `assigned_group_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_number` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `feature_number` (`feature_number`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `assigned_group_features` WRITE;
/*!40000 ALTER TABLE `assigned_group_features` DISABLE KEYS */;

INSERT INTO `assigned_group_features` (`id`, `feature_number`, `group_id`, `time_added`)
VALUES
	(9,2,2,'2018-03-01 15:49:28'),
	(11,103,1,'2018-04-23 21:49:30');

/*!40000 ALTER TABLE `assigned_group_features` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auditTable
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auditTable`;

CREATE TABLE `auditTable` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `changed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `auditTable` WRITE;
/*!40000 ALTER TABLE `auditTable` DISABLE KEYS */;

INSERT INTO `auditTable` (`UID`, `user_id`, `changed_on`)
VALUES
	(5,6,'2018-04-16 11:12:00'),
	(6,92,'2018-04-23 12:10:22');

/*!40000 ALTER TABLE `auditTable` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table features_available
# ------------------------------------------------------------

DROP TABLE IF EXISTS `features_available`;

CREATE TABLE `features_available` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `file` varchar(50) NOT NULL,
  `target` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `features_available` WRITE;
/*!40000 ALTER TABLE `features_available` DISABLE KEYS */;

INSERT INTO `features_available` (`id`, `name`, `description`, `file`, `target`)
VALUES
	(1,'Navigation','Provides the links in the menu bar used to navigate the site.','navigation_0.php','navigation'),
	(2,'Credit','Writes at the bottom of the page the authors of the website.','credit_0.php','credit'),
	(4,'Phone Sub','Messages shown when a phone subscription error occurs.','phonesub_0.php','phonesub'),
	(5,'Phone Display','Displays a list of the user\'s phone numbers','phonedisplay_0.php','phonedisplay'),
	(6,'Address Display','Displays the user\'s address','addressdisplay_0.php','addressdisplay'),
	(7,'Group Display','Displays the groups the user belongs to','groupdisplay_0.php','groupdisplay'),
	(8,'Name Display','Displays the user\'s name on the profile page','namedisplay_0.php','namedisplay'),
	(100,'Phone Display (Error 1)','Display \"No Registered Numbers\", regardless of registered numbers','phonedisplay_1.php','phonedisplay'),
	(101,'Credit (Error 1)','Makes credit div background RED','credit_1.php','credit'),
	(102,'Credit (Error 2)','No text is displayed in the credit div','credit_2.php','credit'),
	(103,'Navigation (Error 1)','Allows any user to see admin navigation','navigation_1.php','navigation'),
	(104,'Navigation (Error 2)','Doesn\'t display profile link','navigation_2.php','navigation'),
	(105,'Address Display (Error 1)','Displays no Address info, regardless if completed','addressdisplay_1.php','addressdisplay'),
	(106,'Group Display (Error 1)','Displays \"None\" for user\'s group, regardless of assigned groups','groupdisplay_1.php','groupdisplay'),
	(107,'Name Display (Error 1)','Blanks out the user\'s name','namedisplay_1.php','namedisplay'),
	(108,'Index (Home Page)','Displays the full Home Page for the site','index_0.php','index');

/*!40000 ALTER TABLE `features_available` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table group_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_members`;

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `leader` tinyint(1) DEFAULT '0',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `membership` (`group_id`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `group_members` WRITE;
/*!40000 ALTER TABLE `group_members` DISABLE KEYS */;

INSERT INTO `group_members` (`id`, `group_id`, `leader`, `date_joined`, `uid`)
VALUES
	(14,2,1,'2018-11-10 00:17:28',8),
	(22,2,1,'2018-02-24 01:13:41',19),
	(35,1,0,'2018-02-25 15:11:27',30),
	(38,2,0,'2018-02-27 08:30:33',50),
	(39,4,0,'2018-03-31 22:51:45',8),
	(41,1,0,'2018-03-31 22:59:15',8),
	(43,4,1,'2018-04-16 11:15:13',6),
	(44,1,0,'2018-04-22 22:25:58',92),
	(46,6,1,'2018-11-23 20:16:13',92),
	(47,1,1,'2018-11-23 20:18:51',12),
	(48,1,1,'2018-11-23 20:32:11',19),
	(50,13,0,'2018-11-23 20:33:03',12),
	(51,12,1,'2018-11-23 20:33:15',50),
	(52,14,1,'2018-11-28 23:55:41',50);

/*!40000 ALTER TABLE `group_members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `date_established` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `UID` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`UID`, `name`, `date_established`)
VALUES
	(1,'Group A','2017-03-23 21:40:57'),
	(2,'Group B','2017-03-23 21:43:25'),
	(4,'Group C','2018-02-21 13:53:30'),
	(6,'Group J','2018-11-23 19:10:42'),
	(12,'Group P','2018-11-23 19:15:48'),
	(13,'Group F','2018-11-23 20:32:54'),
	(14,'Group U','2018-11-28 23:55:26');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hardware_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hardware_skills`;

CREATE TABLE `hardware_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` char(30) NOT NULL,
  UNIQUE KEY `UID` (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `hardware_skills` WRITE;
/*!40000 ALTER TABLE `hardware_skills` DISABLE KEYS */;

INSERT INTO `hardware_skills` (`UID`, `skill`)
VALUES
	(1,'Computer Assembly'),
	(2,'Computer Maintenance'),
	(15,'Troubleshooting'),
	(4,'Printer & Cartage Refilling'),
	(5,'Operation Monitoring'),
	(6,'Network Processing'),
	(7,'Disaster Recovery'),
	(8,'Circuit Design Knowledge'),
	(9,'Systems Analysis'),
	(10,'Installing Applications'),
	(11,'Installing Components & Driver'),
	(12,'Backup Management, Reporting &');

/*!40000 ALTER TABLE `hardware_skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `levels`;

CREATE TABLE `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;

INSERT INTO `levels` (`id`, `title`)
VALUES
	(0,'NULL'),
	(1,'Not logged in'),
	(2,'Restricted'),
	(3,'User'),
	(4,'Super user'),
	(5,'Admin'),
	(6,'Super Admin');

/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table phone_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `phone_list`;

CREATE TABLE `phone_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `carrier` varchar(10) DEFAULT NULL,
  `international_code` varchar(4) DEFAULT NULL,
  `primary_phone` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_phone_number` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `phone_list` WRITE;
/*!40000 ALTER TABLE `phone_list` DISABLE KEYS */;

INSERT INTO `phone_list` (`id`, `phone_number`, `user_id`, `date_added`, `carrier`, `international_code`, `primary_phone`)
VALUES
	(13,'4567891234',10,'2017-04-09 14:20:23',NULL,NULL,1),
	(14,'9012345672',-1,'2017-04-09 14:59:15',NULL,NULL,1),
	(15,'3141592653',27,'2017-04-09 15:02:59',NULL,NULL,1),
	(16,'4857693021',28,'2017-04-09 15:06:13',NULL,NULL,1),
	(17,'9786542310',29,'2017-04-09 15:07:18',NULL,NULL,1),
	(18,'7143562934',30,'2017-04-09 15:08:42',NULL,NULL,1),
	(19,'3152456920',31,'2017-04-09 15:10:02',NULL,NULL,1),
	(21,'9999999999',34,'2018-02-08 18:05:03',NULL,NULL,1),
	(34,'8594320046',50,'2018-02-27 08:27:33',NULL,NULL,0),
	(38,'8593589125',8,'2018-02-27 21:09:53',NULL,NULL,0),
	(39,'8592487759',8,'2018-02-27 21:10:06',NULL,NULL,0),
	(41,'2596563214',8,'2018-03-01 20:25:42',NULL,NULL,0),
	(42,'8593213211',6,'2018-04-16 11:15:36',NULL,NULL,0);

/*!40000 ALTER TABLE `phone_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table session_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session_users`;

CREATE TABLE `session_users` (
  `session_id` varchar(128) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `session_users` WRITE;
/*!40000 ALTER TABLE `session_users` DISABLE KEYS */;

INSERT INTO `session_users` (`session_id`, `user_id`)
VALUES
	('ekmgqa12rakiuo5na64mbfe697','6'),
	('3h2n43lqjm3q2ia8bvr5r8thg0','8'),
	('0thfi4lpli83r6idosfik1mki4','50');

/*!40000 ALTER TABLE `session_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table software_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `software_skills`;

CREATE TABLE `software_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(30) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `software_skills` WRITE;
/*!40000 ALTER TABLE `software_skills` DISABLE KEYS */;

INSERT INTO `software_skills` (`UID`, `skill`)
VALUES
	(1,'C++'),
	(42,'C'),
	(3,'Python'),
	(46,'PHP'),
	(5,'Ruby'),
	(6,'Java'),
	(43,'C#'),
	(9,'Perl'),
	(10,'Graphics'),
	(11,'Javascript'),
	(12,'SQL'),
	(13,'.NET'),
	(14,'Visual Basic'),
	(15,'Prolog'),
	(16,'Animation'),
	(17,'R'),
	(18,'Swift'),
	(47,'Assembly'),
	(20,'Pascal'),
	(21,'Go'),
	(22,'Web Design'),
	(23,'HTML'),
	(24,'CSS'),
	(25,'Objective-C'),
	(26,'Shell'),
	(27,'MATLAB'),
	(28,'SAS'),
	(29,'Scratch'),
	(30,'Cloud Computing'),
	(31,'Microsoft Office'),
	(32,'Enterprise Systems'),
	(33,'Android'),
	(34,'IOS/MAC OS X'),
	(35,'Windows'),
	(36,'Linux'),
	(37,'Client/Server');

/*!40000 ALTER TABLE `software_skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subscriber
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscriber`;

CREATE TABLE `subscriber` (
  `phone_number` varchar(20) NOT NULL,
  `carrier` varchar(10) NOT NULL,
  `international_code` varchar(4) NOT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `subscriber` WRITE;
/*!40000 ALTER TABLE `subscriber` DISABLE KEYS */;

INSERT INTO `subscriber` (`phone_number`, `carrier`, `international_code`)
VALUES
	('12312312','AT&T','1'),
	('1231231234','VERIZON','1'),
	('1233142345','VERIZON','1'),
	('1234567890','VERIZON','1'),
	('3456781234','VERIZON','1'),
	('4562655625','VERIZON','1'),
	('6781234567','VERIZON','1'),
	('85912345687','VERIZON','1'),
	('8593141592','VERIZON','1'),
	('8598661234','VERIZON','1'),
	('98765432','VERIZON','1'),
	('9876543210','VERIZON','1');

/*!40000 ALTER TABLE `subscriber` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(254) NOT NULL,
  `role` varchar(64) NOT NULL DEFAULT 'ROLE_USER',
  `password` varchar(64) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '3',
  `gender` varchar(6) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `photo` varchar(256) DEFAULT NULL,
  `progress` int(11) NOT NULL DEFAULT '50',
  `hash` varchar(32) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`UID`),
  UNIQUE KEY `UID` (`UID`),
  UNIQUE KEY `Email` (`email`(54))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`UID`, `first_name`, `last_name`, `email`, `role`, `password`, `level`, `gender`, `dateofbirth`, `address`, `city`, `state`, `zip`, `photo`, `progress`, `hash`, `verified`)
VALUES
	(6,'John','Doe','test@test.com','ROLE_USER','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',3,'Female','1993-11-29','Testing','test','KY',40509,NULL,80,NULL,0),
	(12,'Zion','Williamson','bigdick@test.com','ROLE_USER','holdmynuts',3,'Female','1993-11-29','Testing','test','KY',40509,NULL,80,NULL,0),
	(19,'Lebron','James','king@test.com','ROLE_USER','hairloss',3,'Female','1993-11-29','Testing','test','KY',40509,NULL,80,NULL,0),
	(30,'RJ','Barret','rj@test.com','ROLE_USER','f0e4c2f76c58916ec258f246851bea091d14d4247a2fc3e18694461b1816e13b',3,'Female','1993-11-29','Testing','test','KY',40509,NULL,80,NULL,0),
	(50,'Slim','Shady','eminem@test.com','ROLE_USER','fuckkelly',3,'Female','1993-11-29','Testing','test','KY',40509,NULL,80,NULL,0),
	(69,'Jeff','Chartos','sqs@sqs.com','ROLE_USER','idratherteach498',3,'Male','1900-01-01','Testing','test','KY',40503,NULL,80,NULL,0),
	(92,'Drake','drizzy','soft@test.com','ROLE_USER','fuckmeek',3,'Female','1993-11-29','Testing','test','KY',40509,NULL,80,NULL,0),
	(100,'Stephen','Ritchie','stephenfritchie@gmail.com','ROLE_USER','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,0),
	(101,'Stephen','Ritchie','stephen.ritchie@uky.edu','ROLE_USER','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,'bf8229696f7a3bb4700cfddef19fa23f',1),
	(102,'thomas','Hayes','gayboy123@gaylordfantasy.com','ROLE_USER','iamgay123',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,0);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_hardware_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_hardware_skills`;

CREATE TABLE `user_hardware_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_hardware_skills` WRITE;
/*!40000 ALTER TABLE `user_hardware_skills` DISABLE KEYS */;

INSERT INTO `user_hardware_skills` (`UID`, `skill_id`, `user_id`)
VALUES
	(344,8,50),
	(342,5,8),
	(341,2,8),
	(343,1,50),
	(340,4,8),
	(339,15,8),
	(480,1,6),
	(479,2,6),
	(478,15,6),
	(477,4,6),
	(476,5,6),
	(475,6,6),
	(474,7,6),
	(473,8,6),
	(472,9,6),
	(471,10,6),
	(470,11,6),
	(469,12,6);

/*!40000 ALTER TABLE `user_hardware_skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_software_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_software_skills`;

CREATE TABLE `user_software_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_software_skills` WRITE;
/*!40000 ALTER TABLE `user_software_skills` DISABLE KEYS */;

INSERT INTO `user_software_skills` (`UID`, `skill_id`, `user_id`)
VALUES
	(1871,37,8),
	(1870,36,8),
	(1869,35,8),
	(1868,34,8),
	(1867,33,8),
	(1866,32,8),
	(1865,31,8),
	(1864,30,8),
	(1863,29,8),
	(1862,28,8),
	(77,33,60),
	(78,16,60),
	(1861,27,8),
	(1860,26,8),
	(1859,25,8),
	(1858,24,8),
	(1857,23,8),
	(1856,22,8),
	(1855,21,8),
	(1854,20,8),
	(1852,18,8),
	(1851,17,8),
	(1850,16,8),
	(1849,15,8),
	(1848,14,8),
	(1847,6,8),
	(1846,42,8),
	(1845,3,8),
	(1844,46,8),
	(1843,43,8),
	(1842,9,8),
	(1841,10,8),
	(1840,11,8),
	(1839,12,8),
	(1838,5,8),
	(1837,1,8),
	(1836,13,8),
	(1877,24,50),
	(1876,42,50),
	(2377,3,6),
	(1874,1,50),
	(1873,33,50),
	(1872,13,50),
	(2376,1,6),
	(2375,37,6),
	(2374,36,6),
	(2373,35,6),
	(2372,34,6),
	(2371,33,6),
	(2370,32,6),
	(2369,31,6),
	(2368,30,6),
	(2367,29,6),
	(2366,28,6),
	(2365,27,6),
	(2364,26,6),
	(2363,25,6),
	(2362,24,6),
	(2361,23,6),
	(2360,22,6),
	(2359,21,6),
	(2358,20,6),
	(2357,47,6),
	(2356,18,6),
	(2355,17,6),
	(2354,16,6),
	(2353,15,6),
	(2352,14,6),
	(2351,13,6),
	(2350,12,6),
	(2349,11,6),
	(2348,10,6),
	(2347,9,6),
	(2346,6,6),
	(2345,5,6),
	(2344,46,6);

/*!40000 ALTER TABLE `user_software_skills` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
