/* Table structure and data dump for web_content */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `web_content`
--

DROP TABLE IF EXISTS `web_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `web_content` (
  `web_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_content_cover` varchar(1000) DEFAULT NULL,
  `web_content_name` varchar(300) DEFAULT NULL,
  `web_content_eng_name` varchar(300) DEFAULT NULL,
  `web_content_detail` varchar(1000) DEFAULT NULL,
  `web_content_guide` text DEFAULT NULL,
  `web_content_eng_detail` varchar(1000) DEFAULT NULL,
  `web_content_photo` varchar(1000) DEFAULT NULL,
  `web_content_review` longtext DEFAULT NULL,
  `web_content_eng_review` longtext DEFAULT NULL,
  `web_content_date` date NOT NULL,
  `web_content_time` time NOT NULL,
  `web_content_datetime` datetime NOT NULL,
  `web_content_sort` int(11) NOT NULL DEFAULT 0,
  `web_content_page` varchar(250) DEFAULT NULL,
  `highlight_name` varchar(1000) DEFAULT NULL,
  `mainmenu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`web_content_id`),
  UNIQUE KEY `ArticlePage` (`web_content_page`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_content`
--

LOCK TABLES `web_content` WRITE;
/*!40000 ALTER TABLE `web_content` DISABLE KEYS */;
INSERT INTO `web_content` VALUES
(46,'1604258446.jpg','ประกาศรับสมัครงาน','','','','','','','','2026-02-20','21:27:55','2026-02-20 21:55:56',1,'111289225','',14);
/*!40000 ALTER TABLE `web_content` ENABLE KEYS */;
UNLOCK TABLES;
