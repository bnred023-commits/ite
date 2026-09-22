/* Table structure and data dump for admin_remove */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `admin_remove`
--

DROP TABLE IF EXISTS `admin_remove`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_remove` (
  `admin_remove_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_remove_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`admin_remove_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_remove`
--

LOCK TABLES `admin_remove` WRITE;
/*!40000 ALTER TABLE `admin_remove` DISABLE KEYS */;
INSERT INTO `admin_remove` VALUES
(1,'ลบได้'),
(2,'ไม่สามารถลบได้');
/*!40000 ALTER TABLE `admin_remove` ENABLE KEYS */;
UNLOCK TABLES;
