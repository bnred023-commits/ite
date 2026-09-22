/* Table structure and data dump for contactus */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactus` (
  `contactus_id` int(11) NOT NULL AUTO_INCREMENT,
  `contactus_name` varchar(255) DEFAULT NULL,
  `contactus_phone` varchar(255) DEFAULT NULL,
  `contactus_email` varchar(255) DEFAULT NULL,
  `contactus_subject` text DEFAULT NULL,
  `contactus_message` text DEFAULT NULL,
  `contactus_date` date NOT NULL,
  `contactus_time` time NOT NULL,
  `contactus_company` varchar(250) DEFAULT NULL,
  `contactus_address` varchar(1000) DEFAULT NULL,
  `contactus_product` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`contactus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;
