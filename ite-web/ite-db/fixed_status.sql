/* Table structure and data dump for fixed_status */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `fixed_status`
--

DROP TABLE IF EXISTS `fixed_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fixed_status` (
  `fixed_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_status_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`fixed_status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixed_status`
--

LOCK TABLES `fixed_status` WRITE;
/*!40000 ALTER TABLE `fixed_status` DISABLE KEYS */;
INSERT INTO `fixed_status` VALUES
(1,'เปิดใช้งานเว็บไซต์ (online)'),
(2,'ปิดปรับปรุงเว็บไซต์ ');
/*!40000 ALTER TABLE `fixed_status` ENABLE KEYS */;
UNLOCK TABLES;
