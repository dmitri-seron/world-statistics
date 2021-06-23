# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.64.100 (MySQL 5.6.48)
# Database: default
# Generation Time: 2021-06-23 13:57:46 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `ID` int(11) NOT NULL,
  `Name` char(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CountryCode` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `District` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Population` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;

INSERT INTO `city` (`ID`, `Name`, `CountryCode`, `District`, `Population`)
VALUES
	(1,'Tallinn','EE',NULL,436538),
	(2,'Jõhvi','EE',NULL,10051),
	(3,'Moscow','RU',NULL,1192000000),
	(4,'Stockholm','SE',NULL,975551),
	(5,'Helsinki','FI',NULL,631695),
	(6,'Washington','US',NULL,692683),
	(7,'Texas','US',NULL,29000000),
	(8,'Hollywood','US',NULL,12037),
	(9,'Kair','EG',NULL,17856455),
	(10,'Lagos','NG',NULL,10076099),
	(11,'New Delhi','IN',NULL,21750000);

/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `country`;

CREATE TABLE `country` (
  `Code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` char(52) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Continent` enum('Africa','Eurasia','America','Antarctica','Australia') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Region` char(26) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SurfaceArea` float DEFAULT NULL,
  `IndepYear` smallint(6) DEFAULT NULL,
  `Population` int(11) DEFAULT NULL,
  `LiveExpextancy` float DEFAULT NULL,
  `GNP` float DEFAULT NULL,
  `GNPOld` float DEFAULT NULL,
  `LocalName` char(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GovernmentForm` char(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HeadOfState` char(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Capital` int(11) DEFAULT NULL,
  `Code2` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;

INSERT INTO `country` (`Code`, `Name`, `Continent`, `Region`, `SurfaceArea`, `IndepYear`, `Population`, `LiveExpextancy`, `GNP`, `GNPOld`, `LocalName`, `GovernmentForm`, `HeadOfState`, `Capital`, `Code2`)
VALUES
	('EE','Estonia','Eurasia','Baltic countries',NULL,NULL,1325000,70.2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('EG','Egypt','Africa','North Africa',NULL,NULL,303100000,68.3,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('FI','Finland','Eurasia','Baltic countries',NULL,NULL,5518000,75.4,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('IN','India','Eurasia','South Asia',NULL,NULL,1366000000,65.8,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('NG','Nigeria','Africa','West Africa',NULL,NULL,448100000,67.7,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('RU','Russia','Eurasia','Europe & Asia',NULL,NULL,144400000,68.9,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('SV','Sweeden','Eurasia','Baltic countries',NULL,NULL,10230000,71.1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
	('US','Unined States Of America','America','South America',NULL,NULL,328200000,72.3,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countrylanguage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countrylanguage`;

CREATE TABLE `countrylanguage` (
  `CountryCode` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Language` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IsOfficial` enum('T','F') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Percentage` float DEFAULT NULL,
  UNIQUE KEY `idx_name_phone` (`CountryCode`,`Language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countrylanguage` WRITE;
/*!40000 ALTER TABLE `countrylanguage` DISABLE KEYS */;

INSERT INTO `countrylanguage` (`CountryCode`, `Language`, `IsOfficial`, `Percentage`)
VALUES
	('EE','Estonian','F',85),
	('EE','Russian','T',15),
	('EG','Nigerian','T',85),
	('FI','Finish','T',86),
	('IN','Hindi','T',88),
	('RU','Chechen','F',1),
	('RU','English','F',1),
	('RU','Russian','T',75),
	('SV','Swedish','T',85),
	('US','English','T',87);

/*!40000 ALTER TABLE `countrylanguage` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
