/* Table structure and data dump for catalog */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog` (
  `catalog_id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_name` varchar(200) DEFAULT NULL,
  `catalog_eng_name` varchar(200) DEFAULT NULL,
  `catalog_detail` varchar(1000) DEFAULT NULL,
  `catalog_eng_detail` varchar(1000) DEFAULT NULL,
  `catalog_photo` varchar(200) DEFAULT NULL,
  `catalog_sort` int(11) DEFAULT 0,
  `catalog_page` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`catalog_id`),
  UNIQUE KEY `catalog_page` (`catalog_page`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog`
--

LOCK TABLES `catalog` WRITE;
/*!40000 ALTER TABLE `catalog` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalog` ENABLE KEYS */;
UNLOCK TABLES;
