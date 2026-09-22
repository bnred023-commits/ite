/* Table structure and data dump for advertise */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `advertise`
--

DROP TABLE IF EXISTS `advertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertise` (
  `advertise_id` int(11) NOT NULL AUTO_INCREMENT,
  `advertise_photo` varchar(100) DEFAULT NULL,
  `advertise_detail` varchar(1000) DEFAULT NULL,
  `advertise_topic` varchar(1000) DEFAULT NULL,
  `advertise_sort` int(11) DEFAULT NULL,
  `advertise_link` varchar(250) DEFAULT NULL,
  `advertise_youtube` varchar(1000) DEFAULT NULL,
  `advertise_facebook` varchar(1000) DEFAULT NULL,
  `advertise_video` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`advertise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertise`
--

LOCK TABLES `advertise` WRITE;
/*!40000 ALTER TABLE `advertise` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertise` ENABLE KEYS */;
UNLOCK TABLES;
