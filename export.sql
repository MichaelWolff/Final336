-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: Final2
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `LandingPage`
--

DROP TABLE IF EXISTS `LandingPage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LandingPage` (
  `myId` int(11) NOT NULL,
  `Code` text NOT NULL,
  `Available_From` date NOT NULL,
  `Available_To` date NOT NULL,
  `Type` text NOT NULL,
  `Archived` tinyint(1) NOT NULL,
  `URL` text NOT NULL,
  `Image` text NOT NULL,
  `Slogan` text NOT NULL,
  `Title` text NOT NULL,
  `Action` text NOT NULL,
  `Details` text NOT NULL,
  UNIQUE KEY `myId` (`myId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LandingPage`
--

LOCK TABLES `LandingPage` WRITE;
/*!40000 ALTER TABLE `LandingPage` DISABLE KEYS */;
INSERT INTO `LandingPage` VALUES (266,'tester','1994-08-05','1994-08-05','Standard',0,'testset','tests','Slogan','Title','Action','Details');
/*!40000 ALTER TABLE `LandingPage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tester`
--

DROP TABLE IF EXISTS `Tester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tester` (
  `myId` int(11) NOT NULL,
  `myName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tester`
--

LOCK TABLES `Tester` WRITE;
/*!40000 ALTER TABLE `Tester` DISABLE KEYS */;
/*!40000 ALTER TABLE `Tester` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-15  4:07:40
