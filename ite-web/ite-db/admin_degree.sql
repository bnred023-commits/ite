/* Table structure and data dump for admin_degree */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `admin_degree`
--

DROP TABLE IF EXISTS `admin_degree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_degree` (
  `admin_degree_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_degree_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`admin_degree_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_degree`
--

LOCK TABLES `admin_degree` WRITE;
/*!40000 ALTER TABLE `admin_degree` DISABLE KEYS */;
INSERT INTO `admin_degree` VALUES
(1,'ผู้ดูแลระดับ 1 (หลัก)'),
(2,'ผู้ดูแลระดับ 2 ');
/*!40000 ALTER TABLE `admin_degree` ENABLE KEYS */;
UNLOCK TABLES;
