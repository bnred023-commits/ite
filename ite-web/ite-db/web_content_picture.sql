/* Table structure and data dump for web_content_picture */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `web_content_picture`
--

DROP TABLE IF EXISTS `web_content_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `web_content_picture` (
  `web_content_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_content_picture_photo` varchar(255) NOT NULL,
  `web_content_id` int(11) NOT NULL,
  PRIMARY KEY (`web_content_picture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_content_picture`
--

LOCK TABLES `web_content_picture` WRITE;
/*!40000 ALTER TABLE `web_content_picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `web_content_picture` ENABLE KEYS */;
UNLOCK TABLES;
