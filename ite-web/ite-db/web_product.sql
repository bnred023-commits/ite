/* Table structure and data dump for web_product */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `web_product`
--

DROP TABLE IF EXISTS `web_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `web_product` (
  `web_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_product_price` int(11) DEFAULT NULL,
  `web_product_cover` varchar(1000) DEFAULT NULL,
  `web_product_name` varchar(300) DEFAULT NULL,
  `web_product_eng_name` varchar(300) DEFAULT NULL,
  `web_product_detail` varchar(1000) DEFAULT NULL,
  `web_product_guide` text DEFAULT NULL,
  `web_product_eng_detail` varchar(1000) DEFAULT NULL,
  `web_product_photo` varchar(1000) DEFAULT NULL,
  `web_product_review` longtext DEFAULT NULL,
  `web_product_eng_review` longtext DEFAULT NULL,
  `web_product_date` date NOT NULL,
  `web_product_time` time NOT NULL,
  `web_product_datetime` datetime NOT NULL,
  `web_product_sort` int(11) NOT NULL DEFAULT 0,
  `web_product_page` varchar(250) DEFAULT NULL,
  `highlight_name` varchar(1000) DEFAULT NULL,
  `mainmenu_id` int(11) DEFAULT NULL,
  `catalog_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`web_product_id`),
  UNIQUE KEY `ArticlePage` (`web_product_page`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `web_product`
--

LOCK TABLES `web_product` WRITE;
/*!40000 ALTER TABLE `web_product` DISABLE KEYS */;
INSERT INTO `web_product` VALUES
(44,0,'1665305568.jpg','Design For Hospital','','','','','1731348194.jpg','','','2025-06-07','21:07:58','2025-06-07 21:07:58',0,'1006494569',' ',18,0),
(45,0,'1957075189.jpg','Design For Cleanroom','','','','','510263385.jpg','','','2025-06-07','21:11:26','2025-06-07 21:11:26',0,'968685767',' ',18,0),
(46,0,'2019789338.png','Cabinet','','','','','147438062.png','','','2025-06-07','21:17:16','2025-06-08 22:01:37',1,'1123687294','',15,0),
(47,0,'','Table','','','','','2048923307.jpeg','','','2025-06-07','21:17:47','2025-06-07 21:17:47',3,'1338789535',' ',15,0),
(48,0,'833477243.jpg','Wagon','','','','','847007681.jpg','','','2025-06-07','21:18:11','2025-06-07 21:18:11',4,'316297039',' ',15,0),
(49,0,'1143490647.jpg','Design For Canteen','','','','','2123132720.jpg','','','2025-06-07','21:19:47','2025-06-07 21:19:47',0,'1628140306',' ',18,0),
(57,0,'1078181944.jpg','Shelf&Basket','','','','','1039375880.jpg','','','2025-06-10','20:32:16','2025-06-10 20:32:16',5,'684833e03507b',' ',15,20),
(59,0,'476547812.jpg','Laminar&FFU','','','','','2115826668.jpg','','','2025-06-10','20:46:27','2025-06-10 20:46:27',6,'68483733ed960',' ',15,0),
(60,0,'','Canteen','','','','','1752721678.jpg','','','2025-06-10','20:52:37','2025-06-10 20:52:37',7,'684838a59fd02',' ',15,0),
(61,0,'','Canteen','','','','','275272448.png','','','2025-06-10','20:53:42','2025-06-10 20:53:42',8,'684838e663908',' ',15,0),
(62,0,'','Box&Dust Bin','','','','','776586171.jpg','','','2025-06-10','20:55:19','2025-06-10 20:55:19',9,'68483947a35a6',' ',15,0),
(63,0,'1161009613.jpg','Tooling','','','','','825285471.jpg','','','2025-06-10','20:56:18','2025-06-10 20:56:18',10,'684839822493f',' ',15,0),
(64,0,'1828643102.jpg','Other Product','','','','','780085982.jpg','','','2025-06-10','20:57:38','2025-06-10 20:57:38',11,'684839d27a090',' ',15,0),
(65,0,'817426070.jpg','Plastic ESD','','','','','405014605.jpg','','','2025-06-10','20:58:59','2025-06-10 20:58:59',13,'68483a233fdc3',' ',15,0),
(66,0,'1416586999.jpg','Tooling Design','','','','','1983626129.jpg','','','2025-06-10','21:05:32','2025-06-10 21:05:32',0,'68483bac3c5c5',' ',18,0),
(67,0,'654718903.jpg','STAINLESS STEEL','','','','','2134551032.jpg','','','2025-06-10','22:08:40','2025-06-10 22:08:40',0,'68484a782cafd',' ',21,0),
(68,0,'429066165.jpg','ALUMINIUM','','','','','567124789.jpg','','','2025-06-10','22:10:08','2025-06-10 22:10:08',0,'68484ad0cec1b',' ',21,0),
(69,0,'1761376650.jpeg','STEEL','','','','','1868916204.jpeg','','','2025-06-10','22:11:30','2025-06-10 22:11:30',0,'68484b22eedb1',' ',21,0),
(70,0,'1802683608.jpg','PLASTIC ESD','','','','','364633063.jpg','','','2025-06-10','22:18:53','2025-06-10 22:18:53',0,'68484cdd13123',' ',21,0),
(73,0,'','SHELF','','','','','1560259870.png','','','2026-03-05','17:01:44','2026-03-05 17:01:44',12,'69a954888e3e8',' ',15,0),
(76,0,'','M2M','','','','','1388968721.png','','','2026-03-14','16:19:40','2026-03-14 16:19:40',14,'69b5282c9556c',' ',15,0),
(77,0,NULL,'HOTPITAL','','','','','1140316688.png','','','2026-03-19','16:15:40','2026-03-19 16:15:40',1,'69bbbebc76fef',' ',15,0),
(78,0,'1338185539.png','PROFILE','','','','','1647298500.png','','','2026-03-19','16:26:51','2026-03-19 16:26:51',0,'69bbc15bcc9be',' ',15,0),
(79,0,'2118513453.png','PIPE','','','','','304018237.png','','','2026-03-19','16:30:11','2026-03-19 16:30:11',0,'69bbc2237dcb1',' ',15,0);
/*!40000 ALTER TABLE `web_product` ENABLE KEYS */;
UNLOCK TABLES;
