/* Table structure and data dump for mainmenu */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `mainmenu`
--

DROP TABLE IF EXISTS `mainmenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `mainmenu` (
  `mainmenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `mainmenu_cover` varchar(500) DEFAULT NULL,
  `mainmenu_name` varchar(200) DEFAULT NULL,
  `mainmenu_eng_name` varchar(200) DEFAULT NULL,
  `mainmenu_detail` varchar(1000) DEFAULT NULL,
  `mainmenu_eng_detail` varchar(1000) DEFAULT NULL,
  `mainmenu_photo` varchar(200) DEFAULT NULL,
  `mainmenu_sort` int(11) DEFAULT 0,
  `mainmenu_page` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`mainmenu_id`),
  UNIQUE KEY `mainmenu_page` (`mainmenu_page`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mainmenu`
--

LOCK TABLES `mainmenu` WRITE;
/*!40000 ALTER TABLE `mainmenu` DISABLE KEYS */;
INSERT INTO `mainmenu` VALUES
(14,'1244269755-2070884888.jpg','เกี่ยวกับเรา',NULL,'',NULL,NULL,1,'1244269755'),
(15,'518151457-796149463.jpg','สินค้า',NULL,'',NULL,NULL,2,'518151457'),
(18,'680590343-973280444.jpg','การออกแบบ',NULL,'',NULL,NULL,3,'680590343'),
(19,'1739386535-301460454.jpg','บริการ',NULL,'',NULL,NULL,5,'1739386535'),
(21,NULL,'ประเภทวัสดุ',NULL,'',NULL,NULL,4,'1850582256');
/*!40000 ALTER TABLE `mainmenu` ENABLE KEYS */;
UNLOCK TABLES;
