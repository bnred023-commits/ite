/* Table structure and data dump for Device */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `Device`
--

DROP TABLE IF EXISTS `Device`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Device` (
  `DeviceID` int(11) NOT NULL AUTO_INCREMENT,
  `DeviceName` varchar(1000) DEFAULT NULL,
  `DeviceText1` varchar(1000) DEFAULT NULL,
  `DeviceText2` varchar(1000) DEFAULT NULL,
  `DeviceText3` varchar(1000) DEFAULT NULL,
  `DevicePhoto` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`DeviceID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Device`
--

LOCK TABLES `Device` WRITE;
/*!40000 ALTER TABLE `Device` DISABLE KEYS */;
INSERT INTO `Device` VALUES
(1,'Apple','iPhone','Mac OS','IOS','45796106knowledge_graph_logo.png'),
(2,'Windows','Windows','Windows','Windows','567172563download.png'),
(4,'Android','Android','Android','Android','1304965330images.png'),
(5,'SAMSUNG','SAMSUNG','SM','SAMSUNG','1357635180samsung-logo-png-1288.jpg'),
(11,'Opera','Opera','Opera','Opera','381632333unnamed.png'),
(13,'Nexus','Nexus','Nexus','Nexus','1183670435rainbow_x_sample_2.jpg'),
(14,'Vivo','Vivo','Vivo','Vivo','747711229vivo-1-logo-png-transparent.png'),
(15,'HUAWEI','HUAWEI','HUAWEI','HUAWEI','2027336877download.jpg'),
(16,'xiaomi','MI','MI','Mi','325725748768px-Xiaomi_logo.svg.png'),
(18,'Windows 7','Windows NT 6.1','Windows NT 6.1','Windows NT 6.1','160086375214_26072013113314_0.jpg'),
(19,'Macintosh','Macintosh','Macintosh','Macintosh','3861924162016-04-08-01.jpg'),
(20,'Windows 8.1','Windows NT 6.3','Windows NT 6.3','Windows NT 6.3','1580134240Windows8.1.jpg'),
(21,'windows 10','Windows NT 10.0','Windows NT 10.0','Windows NT 10.0','524177638Windows-10-logo-e1502132803317.png'),
(22,'OPPO','CPH','CPH','X900','371569200untitled-1_85.jpg'),
(23,'bot','bot','bot','bot','1252202481download.png'),
(24,'Linux','Linux','Linux','Linux','17585722031200px-Tux.svg.png');
/*!40000 ALTER TABLE `Device` ENABLE KEYS */;
UNLOCK TABLES;
