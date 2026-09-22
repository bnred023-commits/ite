/* Table structure and data dump for product_picture */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `product_picture`
--

DROP TABLE IF EXISTS `product_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_picture` (
  `product_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_picture_photo` varchar(400) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `product_picture_order` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`product_picture_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_picture`
--

LOCK TABLES `product_picture` WRITE;
/*!40000 ALTER TABLE `product_picture` DISABLE KEYS */;
INSERT INTO `product_picture` VALUES
(24,'16533165961459583525.png',0,52),
(25,'1071514561345481219.png',0,53);
/*!40000 ALTER TABLE `product_picture` ENABLE KEYS */;
UNLOCK TABLES;
