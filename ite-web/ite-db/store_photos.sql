/* Table structure and data dump for store_photos */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `store_photos`
--

DROP TABLE IF EXISTS `store_photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_photos` (
  `store_photos_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_photos_img` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`store_photos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_photos`
--

LOCK TABLES `store_photos` WRITE;
/*!40000 ALTER TABLE `store_photos` DISABLE KEYS */;
INSERT INTO `store_photos` VALUES
(17,'607168226Show3.jpg'),
(18,'2143367745Show2.jpg'),
(19,'1864867083Show1.jpg'),
(20,'1018255669Tig.jpg');
/*!40000 ALTER TABLE `store_photos` ENABLE KEYS */;
UNLOCK TABLES;
