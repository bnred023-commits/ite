/* Table structure and data dump for social */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(300) NOT NULL,
  `social_type` varchar(200) NOT NULL,
  `social_link` varchar(200) DEFAULT NULL,
  `social_photo` varchar(1000) DEFAULT NULL,
  `social_footer` varchar(1000) DEFAULT NULL,
  `social_sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social`
--

LOCK TABLES `social` WRITE;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
INSERT INTO `social` VALUES
(180,'(66)029025752-56','Tel','+66029025752-56','739432402 217992626.png',NULL,1),
(182,' intertech@ite-tech.com','E-mail','','267720407 1321229843.png',NULL,2);
/*!40000 ALTER TABLE `social` ENABLE KEYS */;
UNLOCK TABLES;
