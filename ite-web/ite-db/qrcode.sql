/* Table structure and data dump for qrcode */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `qrcode`
--

DROP TABLE IF EXISTS `qrcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `qrcode` (
  `qrcode_id` int(11) NOT NULL AUTO_INCREMENT,
  `qrcode_type` varchar(200) DEFAULT NULL,
  `qrcode_link` varchar(200) DEFAULT NULL,
  `qrcode_photo` varchar(1000) DEFAULT NULL,
  `qrcode_sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`qrcode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qrcode`
--

LOCK TABLES `qrcode` WRITE;
/*!40000 ALTER TABLE `qrcode` DISABLE KEYS */;
INSERT INTO `qrcode` VALUES
(21,'LINE','','713239540 613813853.jpg',NULL);
/*!40000 ALTER TABLE `qrcode` ENABLE KEYS */;
UNLOCK TABLES;
