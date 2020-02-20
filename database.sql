-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: moe
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'FORM 1','2018-05-23 19:17:33'),(2,'FORM 2','2018-05-23 19:17:33'),(3,'FORM 3','2018-05-23 19:17:33'),(4,'FORM 4','2018-05-23 19:17:33');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `hod` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Maths','2018-05-24 12:07:00','Admpin',NULL),(2,'Historical Productions','2018-06-02 21:32:38',NULL,'Simwa'),(3,'Fiction','2018-06-02 21:35:16',NULL,'See');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desktop`
--

DROP TABLE IF EXISTS `desktop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desktop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(45) DEFAULT NULL,
  `processor` varchar(45) DEFAULT NULL,
  `monitorSerial` varchar(45) DEFAULT NULL,
  `keyboardSerial` varchar(45) DEFAULT NULL,
  `mouseSerial` varchar(45) DEFAULT NULL,
  `Os` varchar(45) DEFAULT NULL,
  `Office` varchar(45) DEFAULT NULL,
  `Vga` varchar(45) DEFAULT NULL,
  `antivirus` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ram` varchar(45) DEFAULT NULL,
  `hdd` varchar(45) DEFAULT NULL,
  `cpuserial` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desktop`
--

LOCK TABLES `desktop` WRITE;
/*!40000 ALTER TABLE `desktop` DISABLE KEYS */;
INSERT INTO `desktop` VALUES (1,'gdgfgdfd','fgbfgbf','dgdfgfdg','fgfgfgnfg','fbdfbdfd','8','2010','1','8','active',NULL,'dfgdfgd','fdd','52'),(2,'sfsdsd','gdfdfgfdgd','dfdfbdf','dfgdfdf','dfgdfgdfd','8','2010','1','8','active',NULL,'dfdfgdff','dfbdfbdbd','455'),(3,'efdff','sddssvs','dddvdvd','dvdvdvd','sdvsdvdvd','8','2007','1','8','active',NULL,'fvfvvfvf','trgrtgrgtr','4555'),(4,'Hp','Core  i 7 intel','12546','874529pp','41257op','8','2016','1','8',NULL,NULL,'8','750','412536'),(5,'Hp 450 g2','Core i 7','HKRE66','GH45553','78YUTFF','10','2016','1','10','active','2019-10-05 18:04:02','8','450','CND426512R'),(6,'Hp450G3','core i7','dfgdfgdf','hi88','12540','8','2010','1','8','active','2019-10-07 07:02:43','8','452','lkkjjd');
/*!40000 ALTER TABLE `desktop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT NULL,
  `doneBy` varchar(70) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `finish_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES (1,'CAT 1','1,2,','14/12/1900','21/12/1900'),(2,'CAT 1','All','06/12/1900','13/12/1900'),(3,'CAT 1','2,3,','14/12/1900','28/12/1900');
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_results`
--

DROP TABLE IF EXISTS `exam_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ENG` varchar(45) DEFAULT NULL,
  `KIS` varchar(45) DEFAULT NULL,
  `MAT` varchar(45) DEFAULT NULL,
  `BIO` varchar(45) DEFAULT NULL,
  `CHEM` varchar(45) DEFAULT NULL,
  `PHY` varchar(45) DEFAULT NULL,
  `CRE` varchar(45) DEFAULT NULL,
  `GEO` varchar(45) DEFAULT NULL,
  `BUS` varchar(45) DEFAULT NULL,
  `HIST` varchar(45) DEFAULT NULL,
  `AGRI` varchar(45) DEFAULT NULL,
  `MEAN` varchar(45) DEFAULT NULL,
  `GRADE` varchar(45) DEFAULT NULL,
  `exam_id` varchar(45) DEFAULT NULL,
  `class_id` varchar(45) DEFAULT NULL,
  `ADMNO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_results`
--

LOCK TABLES `exam_results` WRITE;
/*!40000 ALTER TABLE `exam_results` DISABLE KEYS */;
INSERT INTO `exam_results` VALUES (1,'74','45','45','78','12','69','45','78','33','45','68','B+',NULL,'1','1','7000'),(2,'12','66','88','55','11','33','66','44','66','74','45','A',NULL,'1','1','7001'),(3,'77','32','77','56','35','46','62','47','86','42','14','A-',NULL,'1','1','7002'),(4,'23','99','69','45','85','32','45','68','51','28','75','B+',NULL,'1','1','7003'),(6,'25','47','56','89','4','3','33','65','78','78','14','',NULL,'1','4','7004'),(7,'','','','','','','','','','','','',NULL,'1','1',' '),(8,'78','55','68','56','47','78','57','53','77','78','85','C+',NULL,'1','1','7009'),(9,'john.doe@gmail.com','123-456-7890','Active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','John Doe'),(10,'gary@hotmail.com','434-506-6483','Inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Gary Riley'),(11,'siu.edward@gmail.com','986-438-0040','Active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Edward Siu'),(12,'simons@example.com','439-405-2345','Active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Betty Simons'),(13,'lieberman@gmail.com','765-980-0543','Inactive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Frances Lieberman'),(14,'jason@example.com','567-859-0485','Active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','1','Jason Gregson');
/*!40000 ALTER TABLE `exam_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mainmenu`
--

DROP TABLE IF EXISTS `mainmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mainmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `link` varchar(100) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mainmenu`
--

LOCK TABLES `mainmenu` WRITE;
/*!40000 ALTER TABLE `mainmenu` DISABLE KEYS */;
INSERT INTO `mainmenu` VALUES (10,'Assets',NULL,'desktop.png',''),(12,'Transfers',NULL,'laptop.png',''),(14,'Issues',NULL,'switch.png','#'),(15,'Users',NULL,'setup.png','#'),(16,'Replacements',NULL,'setup.png','#'),(17,'Set Up',NULL,'laptop.png','#');
/*!40000 ALTER TABLE `mainmenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_group`
--

DROP TABLE IF EXISTS `member_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `capacity` varchar(45) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `timestamp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_group`
--

LOCK TABLES `member_group` WRITE;
/*!40000 ALTER TABLE `member_group` DISABLE KEYS */;
INSERT INTO `member_group` VALUES (1,'PTA',NULL,NULL,NULL),(2,'BOG',NULL,NULL,NULL);
/*!40000 ALTER TABLE `member_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `parent` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (28,'Laptops','views/laptop/listLaptops.php','10'),(87,'Desktops','views/desktop/listDesktops','10'),(97,'Printers',NULL,'10'),(105,'Issues',NULL,'14'),(106,'ListTransfers','views/tranfers/list.php','12'),(108,'View Users','views/users/viewusers.php','15'),(109,'Repalcements',NULL,'16'),(110,'initiateTransfer','views/transfers/initiate.php','12'),(111,'Departments',NULL,'17');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parents`
--

DROP TABLE IF EXISTS `parents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `member_group` longtext,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parents`
--

LOCK TABLES `parents` WRITE;
/*!40000 ALTER TABLE `parents` DISABLE KEYS */;
INSERT INTO `parents` VALUES (1,'Rosemary','Amwayi','2',NULL,'0729745648','hellamffixon@gmail.com','2018-05-23 19:20:22','active'),(2,'Ben','Amwayi','2',NULL,'0729745648','hellamixon@gmail.com','2018-05-23 19:20:22','active'),(3,'Dad','Silo','1',NULL,'0720116154','kiptood6@gmail.com','2018-05-23 21:39:43','active'),(4,'John','Doe',NULL,NULL,'+254720115147','johndoe@yahoo.com','2018-06-03 10:47:29','del');
/*!40000 ALTER TABLE `parents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tenantid` varchar(100) DEFAULT NULL,
  `docno` varchar(100) DEFAULT NULL,
  `payment_mode` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `bank_transaction_code` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `building_name` varchar(100) DEFAULT NULL,
  `suite_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuid` varchar(45) DEFAULT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'28','1','del','2019-10-02 20:27:19'),(2,'87','1','del','2019-10-02 20:27:19'),(3,'97','1','del','2019-10-02 20:27:19'),(4,'98','1','del','2019-10-02 20:27:19'),(5,'99','1','del','2019-10-02 20:27:19'),(6,'100','1','del','2019-10-04 13:50:10'),(7,'101','1','del','2019-10-04 13:50:11'),(8,'106','1','del','2019-10-04 13:50:11'),(9,'102','1','del','2019-10-04 20:38:02'),(10,'103','1','del','2019-10-04 20:38:02'),(11,'104','1','del','2019-10-04 20:38:02'),(12,'105','1','del','2019-10-04 20:38:02'),(13,'28','1','del','2019-10-05 17:56:52'),(14,'87','1','del','2019-10-05 17:56:52'),(15,'106','1','del','2019-10-05 17:56:52'),(16,'105','1','del','2019-10-05 17:56:52'),(17,'108','1','del','2019-10-05 17:56:52'),(18,'28','1','active','2019-10-06 04:57:17'),(19,'87','1','active','2019-10-06 04:57:17'),(20,'106','1','active','2019-10-06 04:57:17'),(21,'110','1','active','2019-10-06 04:57:17'),(22,'105','1','active','2019-10-06 04:57:17'),(23,'108','1','active','2019-10-06 04:57:17'),(24,'110','5','active','2019-10-06 06:02:54'),(25,'105','5','active','2019-10-06 06:02:54'),(26,'87','6','active','2019-10-07 06:03:42'),(27,'110','6','active','2019-10-07 06:03:42'),(28,'105','6','active','2019-10-07 06:03:42'),(29,'110','7','active','2019-10-07 07:00:12'),(30,'105','7','active','2019-10-07 07:00:12');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `date_uploaded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,'midTerm','controls/exams/files/form1.csv','2018-06-16 17:56:58',1);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message` longtext,
  `sendTo` varchar(100) DEFAULT NULL,
  `sendBy` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `messageId` varchar(100) DEFAULT NULL,
  `success_count` bigint(20) DEFAULT NULL,
  `fail_count` bigint(20) DEFAULT NULL,
  `response` longtext,
  `cost` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms`
--

LOCK TABLES `sms` WRITE;
/*!40000 ALTER TABLE `sms` DISABLE KEYS */;
INSERT INTO `sms` VALUES (1,'message','jjj','asas','2018-05-22 19:12:42',NULL,NULL,NULL,NULL,NULL),(2,'Hello World','new_number','admin','2018-05-23 17:35:32','None',1,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_358b3ad16ecc28f8844c5fc93b2bf9d5\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"983\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"ash803\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(3,'Testing 2','new_number','admin','2018-05-23 17:38:16',NULL,1,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_9efa559d1ab0dbaead58fcb4f75191f6\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"326824ii\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"2948u\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0.8),(4,'The :visible selector according to the jQuery documentation: They have a CSS display value of none . They are form elements with type=&quot;hidden&quot;','new_number','admin','2018-05-23 17:41:26',NULL,1,4,'[{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_7ce405bd3de1c27bbc4c23377ad80d43\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"iufiwefuw\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"3876284\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"uhwfwff\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"ihfr\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(5,'Elements that are not in a document are not considered to be visible;','new_number','admin','2018-05-23 17:43:34',NULL,1,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_f2f9f05f37dfeda30ab16c3d3adb8782\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"1739uu\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(6,'Dear parent of #stdFName#, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','all','admin','2018-05-23 21:38:08',NULL,1,0,'[{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_a50ea3d74172159a8a91fb68586963ec\",\"Cost\":\"KES 0.8000\"}]',0),(7,'Dear parent of #stdFName#, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','all','admin','2018-05-23 21:39:57',NULL,2,0,'[{\"Number\":\"+254720116154\",\"Status\":\"Success\",\"MessageId\":\"ATXid_6771c7b429aba1bd44ae8b4c03ad492c\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_f5804428e1e1f0757009360fe38d6525\",\"Cost\":\"KES 0.8000\"}]',0),(8,'Dear parent of #stdFName#, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','group','admin','2018-05-23 21:40:10',NULL,1,0,'[{\"Number\":\"+254720116154\",\"Status\":\"Success\",\"MessageId\":\"ATXid_db554510cb80ab95de79354a7a278a7f\",\"Cost\":\"KES 0.8000\"}]',0),(9,'Dear parent of #stdFName#, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','group','admin','2018-05-23 21:40:21',NULL,2,0,'[{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_c77b1e9d701a77df4655dbab842d326e\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"+254720116154\",\"Status\":\"Success\",\"MessageId\":\"ATXid_e3b41ee42adb20010533cffebab6c81f\",\"Cost\":\"KES 0.8000\"}]',0),(10,'Dear parent of #stdFName#, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','individual','admin','2018-05-23 21:40:46',NULL,2,0,'[{\"Number\":\"+254720116154\",\"Status\":\"Success\",\"MessageId\":\"ATXid_182d4cb26b241702af525abbf050f5e2\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_c4ed0b5ca4462a9baa1d71363b355abc\",\"Cost\":\"KES 0.8000\"}]',0),(11,'Hello','all','admin','2018-05-24 12:46:25',NULL,0,1,'[{\"Number\":\"07297456480720116154\",\"Status\":\"Invalid Phone Number\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(12,'hello','all','admin','2018-05-24 12:47:19',NULL,2,0,'[{\"Number\":\"+254720116154\",\"Status\":\"Success\",\"MessageId\":\"ATXid_311611b40c07a3181429e6b18efc5fe9\",\"Cost\":\"KES 0.8000\"},{\"Number\":\"+254729745648\",\"Status\":\"Success\",\"MessageId\":\"ATXid_8f22546afb9d3976139f0e0997e4c652\",\"Cost\":\"KES 0.8000\"}]',0),(13,'hello','group','admin','2018-05-24 12:47:35',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(14,'hello','individual','admin','2018-05-24 12:48:03',NULL,0,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(15,'hello','new_number','admin','2018-05-24 12:48:42',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(16,'Hello','all - staff','admin','2018-05-24 12:50:43',NULL,0,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(17,'hey','all - schoolMember','admin','2018-05-24 14:07:57',NULL,0,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(18,'hey','group - schoolMember','admin','2018-05-24 14:08:16',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(19,'heyy','group - schoolMember','admin','2018-05-24 14:08:27',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(20,'wewe','group - schoolMember','admin','2018-05-24 14:08:39',NULL,0,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(21,'mazee','individual - schoolMember','admin','2018-05-24 14:09:06',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(22,'Dear parent,Hellam has been send home on 2018-05-24 at 7:43:24 PM for holiday season. Regards Admin, JB',' - ','admin','2018-05-24 17:43:26',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(23,'Dear parent,Hellam has been send home on 2018-05-24 at 7:43:56 PM for December Holiday. Regards Admin, JB',' - ','admin','2018-05-24 17:43:58',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(24,'Dear parent,Hellam has been send home on 2018-05-24 at 7:45:55 PM for October Holiday. Regards Admin, JB','Hellam - Parent','Admin','2018-05-24 17:45:57',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(25,'Dear parent,Kiptoo has been send home on 2018-05-24 at 7:49:58 PM for bursary application and processing. Regards Admin, JB','Kiptoo - Parent','Admin','2018-05-24 17:49:59',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(26,'Dear parent,Hellam has been send home on 2018-05-24 at 8:19:12 PM for Test. Regards Admin, JB','Hellam - Parent','Admin','2018-05-24 18:19:14',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(27,'Dear parent,Kiptoo has been send home on 2018-05-24 at 9:37:28 PM for Report Card. Regards Admin, JB','7000 - Parent','Admin','2018-05-24 18:37:29',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(28,'Dear parent,Hellam has arrived safely at school on 2018-05-24 at 9:48:46 PM. Regards Admin, JB','7021 - Parent','Admin','2018-05-24 18:48:47',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(29,'Dear parent,Kiptoo has arrived safely at school on 2018-05-24 at 9:49:12 PM. Regards Admin, JB','7000 - Parent','Admin','2018-05-24 18:49:13',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(30,'Dear parent,Kiptoo has been send home on 2018-05-24 at 10:01:36 PM for Fee balance of Ksh.1,000. Regards Admin, JB','7000 - Parent','Admin','2018-05-24 19:01:38',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(31,'Dear parent,Kiptoo has arrived safely at school on 2018-05-24 at 10:02:13 PM. Regards Admin, JB','7000 - Parent','Admin','2018-05-24 19:02:14',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(32,'Dear parent,Hellam has been send home on 2018-05-24 at 11:02:29 PM for Further treatment. Regards Admin, JB','7021 - Parent','Admin','2018-05-24 20:02:31',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(33,'Dear parent,Hellam has arrived safely at school on 2018-05-24 at 11:03:09 PM. Regards Admin, JB','7021 - Parent','Admin','2018-05-24 20:03:10',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(34,'Dear parent, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','all - parent','admin','2018-05-26 09:29:34',NULL,0,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(35,'Dear parent, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','all - parent','admin','2018-05-26 09:30:54',NULL,0,2,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(36,'Dear parent,Hellam has been send home on 2018-05-30 at 4:03:00 PM for bruh. Regards Admin, JB','7021 - Parent','Admin','2018-05-30 13:03:04',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(37,'Dear parent, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','group - parent','admin','2018-05-30 13:03:36',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(38,'Dear parent, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','all - parent','admin','2018-05-30 13:04:13',NULL,0,2,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"},{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(39,'Dear parent, you are hereby requested to attend our PTM (Parent Teachers Meeting) on 23 May 2018 between 9am to 10am. Regards PRINCIPAL, JB','group - parent','admin','2018-05-30 13:04:35',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(40,'Dear parent,Kiptoo has been send home on 2018-06-01 at 10:30:30 AM for Hello. Regards Admin, JB','7000 - Parent','Admin','2018-06-01 07:30:31',NULL,0,1,'[{\"Number\":\"+254720116154\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(41,'J','individual - staff','admin','2018-06-01 10:43:49',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(42,'Dear parent,Bob has been send home on 2018-06-03 at 8:41:38 PM for Sick. Regards Admin, JB','7020 - Parent','Admin','2018-06-03 17:41:40',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(43,'Dear parent,Bob has been send home on 2018-06-03 at 8:42:20 PM for Sick. Regards Admin, JB','7020 - Parent','Admin','2018-06-03 17:42:21',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0),(44,'Dear parent,Hella has been send home on 2018-06-03 at 8:42:43 PM for cc. Regards Admin, JB','7021 - Parent','Admin','2018-06-03 17:42:44',NULL,0,1,'[{\"Number\":\"+254729745648\",\"Status\":\"Insufficient Balance\",\"MessageId\":\"None\",\"Cost\":\"0\"}]',0);
/*!40000 ALTER TABLE `sms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_templates`
--

DROP TABLE IF EXISTS `sms_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(400) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_templates`
--

LOCK TABLES `sms_templates` WRITE;
/*!40000 ALTER TABLE `sms_templates` DISABLE KEYS */;
INSERT INTO `sms_templates` VALUES (1,'Admissions open for the academic year 2015-16 in St. Johns Likuyani Boys. For details contact 98765 43210. Hurry! Only few seats left.','Promotional Bulk SMS','2018-05-23 18:46:16'),(2,'Dear Parent, you are requested to submit the admission form along with the registration fees before 23 Apr 2015. -Vidya1 School, Powai, Mumbai.','Admission Messages','2018-05-23 18:46:16'),(3,'Dear Parent, visit the school between 9 am and 12 pm and confirm the admission by paying the fees Rs. 9,000. -Vidya1 School, Mulund, Mumbai.','Admission Messages','2018-05-23 18:46:16'),(4,'Dear Parent, school opens for your ward on 25 May, 2015. Kindly visit school and receive the School Kit. -Vidya1 School, Sion, Mumbai.','Admission Messages','2018-05-23 18:46:16'),(5,'Dear Parent, kindly collect the School Kit on 25 May, 2015 by paying the Rs. 9000/-. -Vidya1 School, Chembur, Mumbai.','Admission Messages','2018-05-23 18:46:16'),(6,'Dear Parent, updates related to your ward and school will be sent to you via SMS. -Vidya1 School, Kurla, Mumbai.','After Admission Messages','2018-05-23 18:46:16'),(7,'Dear Parent, kindly collect the books which will be distributed on 20 May, 2015 from 9 am to 12 pm. -Vidya1 School, Govandi, Mumbai.','After Admission Messages','2018-05-23 18:46:16'),(8,'Dear Parent, kindly attend the Parent-Teacher Meeting scheduled on 23 June 2015 from 9 am to 12 pm. -Vidya1 School, Parel, Mumbai.','Meeting Messages','2018-05-23 18:46:16'),(9,'Dear Parent, Kindly pay school bus fees Rs. 2000. -Vidya1 School, Mahim, Mumbai.','Transport Messages','2018-05-23 18:46:16'),(10,'Dear Parent, Mr. Joseph (Bus 3 driver) has resigned from our school. This is for your kind information. -Vidya1 School, Prabhadevi, Mumbai.','Transport Messages','2018-05-23 18:46:16'),(11,'Dear Parent, you are requested to pay the school fees before 23 July, 2015. Ignore if already paid. -Vidya1 School, Colaba, Mumbai.','Fees Messages','2018-05-23 18:46:16'),(12,'Your ward’s next fee installment is due on 23 July, 2015. Kindly pay before 23 July, 2015. Ignore if already paid. -Vidya1 School, Kalbadevi, Mumbai.','Fees Messages','2018-05-23 18:46:16'),(13,'Dear Parent, 26 Jan, 2015 will be holiday on occasion of Republic Day. -Vidya1 School, Juhu, Mumbai.','Holiday Messages','2018-05-23 18:46:16'),(14,'Dear Parent, school remains closed on 28 Jan, 2015 due to Bharath Bandh. -Vidya1 School, Goregaon, Mumbai.','Holiday Messages','2018-05-23 18:46:16'),(15,'Dear Parent, Summer vacation starts from 01 Apr, 2015. School reopens on 25 May, 2015. -Vidya1 School, Borivali, Mumbai.','Holiday Messages','2018-05-23 18:46:16'),(16,'Dear Parent, school reopens on 25 May, 2015 after Summer vacation. Attendance on the first day is mandatory. -Vidya1 School, Jogeshwari, Mumbai.','Holiday Messages','2018-05-23 18:46:16'),(17,'Dear Parent, warm welcome to The Sports Day 2015 to be held on 26 Dec, 2015. -Vidya1 School, Vile Parle, Mumbai.','Competition/Sports/Trip/Function Messages','2018-05-23 18:46:16'),(18,'Dear Parent, Colouring Competition will be held on 20 Nov, 2015, 10 am at School Premises. -Vidya1 School, Matunga, Mumbai.','Competition/Sports/Trip/Function Messages','2018-05-23 18:46:16'),(19,'Dear Parent, Picnic to Golden Resorts has been organized for the Class 8th. Interested students pay the amount Rs. 500 to their respective class teachers. -Vidya1 School, Malad, Mumbai.','Competition/Sports/Trip/Function Messages','2018-05-23 18:46:16'),(20,'Dear Parent, Time Table of the II Round Test has been sent with your ward. -Vidya1 School, Lokhandwala, Mumbai.','Test/Exam/Result Messages','2018-05-23 18:46:16'),(21,'Dear Parent, we wish your ward All The Best for the SSLC Exam. -Vidya1 School, Versova, Mumbai.','Test/Exam/Result Messages','2018-05-23 18:46:16'),(22,'Dear Parent, your ward’s II Round Test marks details are Eng: 78, Sci: 89, SS: 65. -Vidya1 School, CBD Belapur, Navi Mumbai.','Test/Exam/Result Messages','2018-05-23 18:46:16');
/*!40000 ALTER TABLE `sms_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `teaching_noneteaching` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `marrital_status` varchar(45) DEFAULT NULL,
  `subjects` longtext,
  `class_subject` longtext,
  `role` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `department` longtext,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'teaching','Senelwa','Mode','0729745648',NULL,'single',NULL,NULL,NULL,NULL,NULL,'1','2018-05-24 12:04:51'),(2,'nonteaching','Fred','Mshamba','0720116154',NULL,'single',NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-24 12:10:13'),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-17 08:18:49'),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-17 09:57:47'),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-17 09:58:55'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-17 10:01:15'),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-17 10:03:10');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stream_names`
--

DROP TABLE IF EXISTS `stream_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stream_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stream_names`
--

LOCK TABLES `stream_names` WRITE;
/*!40000 ALTER TABLE `stream_names` DISABLE KEYS */;
INSERT INTO `stream_names` VALUES (1,'E','2018-05-27 11:35:34'),(2,'W','2018-05-27 11:35:34'),(3,'N','2018-05-27 11:35:34'),(4,'S','2018-05-27 11:35:34'),(5,'C','2018-05-27 11:35:34');
/*!40000 ALTER TABLE `stream_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `streams`
--

DROP TABLE IF EXISTS `streams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `streams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `capacity` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) DEFAULT NULL,
  `class_teacher` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `streams`
--

LOCK TABLES `streams` WRITE;
/*!40000 ALTER TABLE `streams` DISABLE KEYS */;
INSERT INTO `streams` VALUES (1,1,NULL,'2018-05-23 19:18:38','W',NULL),(2,1,NULL,'2018-05-23 19:18:38','E',NULL),(3,2,NULL,'2018-05-23 19:18:38','W',NULL),(4,2,NULL,'2018-05-23 19:18:38','E',NULL),(5,3,NULL,'2018-05-23 19:18:38','W',NULL),(6,3,NULL,'2018-05-23 19:18:38','E',NULL),(7,4,NULL,'2018-05-23 19:18:38','W',NULL),(8,4,NULL,'2018-05-23 19:18:38','E',NULL),(9,5,NULL,'2018-05-27 11:16:03','E',NULL),(10,6,NULL,'2018-05-27 11:17:30','E',NULL),(11,6,NULL,'2018-05-27 11:17:30','W',NULL),(12,7,NULL,'2018-05-27 11:46:31','E',NULL),(13,7,NULL,'2018-05-27 11:46:31','S',NULL),(14,7,NULL,'2018-05-27 11:46:31','W',NULL);
/*!40000 ALTER TABLE `streams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `parent1` bigint(20) DEFAULT NULL,
  `parent2` bigint(20) DEFAULT NULL,
  `nok` bigint(20) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `stream` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'Hella','Imbosa','7000',3,0,0,4,8,2013,'student','2018-05-23 19:14:33','2018-05-23 19:14:33','active'),(2,'Kiptoo','Dan','7001',3,NULL,NULL,3,6,2012,'student','2018-05-23 21:39:18','2018-05-23 21:39:18','active'),(9,'Bob','Mwanga','7002',3,0,0,4,8,2018,'student','2018-05-27 10:38:44','2018-05-27 10:38:44','active'),(10,'Mulama','Geoge','7003',3,NULL,NULL,4,7,2018,'student','2018-05-27 10:39:24','2018-05-27 10:39:24','active'),(11,'Hello','World','JB125',NULL,NULL,NULL,6,10,2018,'student','2018-05-27 11:19:46','2018-05-27 11:19:46','active'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-03 20:56:08','2019-10-03 20:56:08','active');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_log`
--

DROP TABLE IF EXISTS `student_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `reason` varchar(45) DEFAULT NULL,
  `time_in` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `time_out` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `checked_by` varchar(100) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `checked_in_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_log`
--

LOCK TABLES `student_log` WRITE;
/*!40000 ALTER TABLE `student_log` DISABLE KEYS */;
INSERT INTO `student_log` VALUES (1,'holiday season','2018-05-24 17:13:29','2018-05-24 16:43:24','Admin',1,NULL),(2,'December Holiday','2018-05-24 17:13:29','2018-05-24 16:43:56','Admin',1,NULL),(3,'October Holiday','2018-05-24 17:13:29','2018-05-24 16:45:55','Admin',1,NULL),(4,'bursary application and processing','2018-05-24 18:37:28','2018-05-24 16:49:58','Admin',2,NULL),(5,'Test','2018-05-24 17:19:12','2018-05-24 17:13:29','Admin',1,NULL),(6,'Test','2018-05-24 18:48:46','2018-05-24 17:19:12','Admin',1,'Admin'),(7,'Report Card','2018-05-24 18:49:12','2018-05-24 18:37:28','Admin',2,'Admin'),(8,'Fee balance of Ksh.1,000','2018-05-24 19:02:13','2018-05-24 19:01:36','Admin',2,'Admin'),(9,'Further treatment','2018-05-24 20:03:09','2018-05-24 20:02:29','Admin',1,'Admin'),(10,'bruh','2018-06-01 07:30:23','2018-05-30 13:02:36','Admin',10,NULL),(11,'bruh','2018-06-03 17:42:42','2018-05-30 13:03:00','Admin',1,NULL),(12,'Hello','0000-00-00 00:00:00','2018-06-01 07:30:23','Admin',10,NULL),(13,'Hello','2018-06-01 20:26:19','2018-06-01 07:30:30','Admin',2,'Admin'),(14,'Sick','2018-06-03 17:42:19','2018-06-03 17:41:37','Admin',9,NULL),(15,'Sick','0000-00-00 00:00:00','2018-06-03 17:42:20','Admin',9,NULL),(16,'cc','2018-06-30 06:18:40','2018-06-03 17:42:43','Admin',1,'Admin'),(17,'Medical','2019-05-04 14:16:18','2019-05-04 13:44:01','',2,NULL),(18,'SICK','2019-05-04 14:17:24','2019-05-04 14:16:18','',2,NULL),(19,'Heloo','0000-00-00 00:00:00','2019-05-04 14:17:24',NULL,2,NULL);
/*!40000 ALTER TABLE `student_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `grading` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assetId` varchar(45) DEFAULT NULL,
  `userId` varchar(45) DEFAULT NULL,
  `source` varchar(45) DEFAULT NULL,
  `destination` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfers`
--

LOCK TABLES `transfers` WRITE;
/*!40000 ALTER TABLE `transfers` DISABLE KEYS */;
/*!40000 ALTER TABLE `transfers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `personalNo` varchar(45) DEFAULT NULL,
  `idNo` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'del',
  `designation` varchar(45) DEFAULT NULL,
  `officeNo` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.com','Admin','$2a$10$yEqdBoWDsH0pwVZ2lVivTOHpDjdKIJS3.a0eYXXnj5NJZ6KE9RjdC','2016-11-06 15:53:00',NULL,NULL,NULL,'active',NULL,NULL,'Admin'),(5,'john@yahoo.com','John Mwale','$2a$10$ukNFUk6LKjDWs.uY5J.oPu6RnvJshpIHZhf/jhrZJaVxyjb9EZ5Om','2019-10-05 04:56:30','1234','32514525','.72154886','active','Supervisor','2015','1234'),(6,'brian@yahoo.com','Brian Ngengo','$2a$10$oKdJ6HsPrNZK63en5nQg0uyNIyTmGv7Eo9.c3rywIZRWvYSrcVydm','2019-10-07 06:02:13','0000','125245','+254235555','active','Super','1025','0000'),(7,'ham@gmail.com','HaM','$2a$10$ED/thS87/bZNbJ2ExPKlruhSC1amGXLUutxQ6l3XmXhfF6rU.QaIW','2019-10-07 06:58:50','0004','2222222','+25425881255','active','125','1025','0004'),(8,'admin@admin.com','ddd','$2a$10$natIHtohM.VqgBbeW/Z8oeRZRwjL1n.NCkbPHbyfVxrzgfcRRy.oe','2019-10-07 07:23:51','0006','125245','+254125555','active','System Administrator','1025','0006');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-08  9:35:54
