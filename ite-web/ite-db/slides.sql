/* Table structure and data dump for slides */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `slides` (
  `slides_id` int(11) NOT NULL AUTO_INCREMENT,
  `slides_photo` varchar(100) DEFAULT NULL,
  `slides_detail` varchar(1000) DEFAULT NULL,
  `slides_topic` varchar(1000) DEFAULT NULL,
  `slides_sort` int(11) DEFAULT NULL,
  `slides_link` varchar(250) DEFAULT NULL,
  `slides_youtube` varchar(1000) DEFAULT NULL,
  `slides_facebook` varchar(1000) DEFAULT NULL,
  `slides_video` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`slides_id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES
(259,'1478231775.jpeg','','',1,'ite-tech.com/contactus.php','','',NULL);
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;
