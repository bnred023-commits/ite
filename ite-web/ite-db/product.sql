/* Table structure and data dump for product */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(500) DEFAULT NULL,
  `product_eng_name` varchar(500) DEFAULT NULL,
  `product_price` int(11) NOT NULL DEFAULT 0,
  `product_eng_price` int(11) DEFAULT 0,
  `product_before` int(11) NOT NULL DEFAULT 0,
  `product_detail` varchar(500) DEFAULT NULL,
  `product_eng_detail` varchar(500) DEFAULT NULL,
  `product_photo` varchar(1000) DEFAULT NULL,
  `product_review` longtext DEFAULT NULL,
  `product_eng_review` longtext DEFAULT NULL,
  `product_code` varchar(1000) DEFAULT NULL,
  `product_date` date NOT NULL,
  `product_time` time NOT NULL,
  `product_datetime` datetime NOT NULL,
  `product_sort` int(11) NOT NULL DEFAULT 0,
  `product_page` varchar(250) DEFAULT NULL,
  `catalog_id` int(11) NOT NULL DEFAULT 0,
  `collection_id` int(11) NOT NULL DEFAULT 0,
  `plot_name` varchar(1000) DEFAULT NULL,
  `product_search` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `ArticlePage` (`product_page`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES
(48,'(ทดสอบ) 3RK15GN-A,100V 15W MOTOR GEAR, New No box',NULL,2461,0,0,'รายละเอียดเบื้องต้น 3RK15GN-A,100V 15W MOTOR GEAR, New No box',NULL,'1024416391.png','<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>\r\n\r\n<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>\r\n\r\n<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>\r\n\r\n<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>',NULL,NULL,'2023-10-21','15:00:44','2023-10-21 15:00:44',0,'737201869',0,0,NULL,NULL),
(49,'(ทดสอบ) 3RK15GN-A,100V 15W MOTOR GEAR, New No box',NULL,2461,0,0,'รายละเอียดเบื้องต้น 3RK15GN-A,100V 15W MOTOR GEAR, New No box',NULL,'679978523.png','<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>\r\n\r\n<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>\r\n\r\n<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>\r\n\r\n<p>เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box&nbsp;เนื้อหา 3RK15GN-A,100V 15W MOTOR GEAR, New No box</p>',NULL,NULL,'2023-10-21','15:00:54','2023-10-21 15:00:54',0,'2027307862',0,0,NULL,NULL),
(52,'E3JK-DN11-C PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร',NULL,1605,0,0,'E3JK-DN11-C  PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร',NULL,'1841925002.png','<p>E3JK-DN11-C &nbsp;PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร</p>\r\n\r\n<p>E3JK-DN11-C &nbsp;PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร</p>\r\n\r\n<p>E3JK-DN11-C &nbsp;PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร</p>',NULL,NULL,'2023-10-21','15:02:46','2023-10-21 15:02:46',0,'470331214',0,0,NULL,NULL),
(53,'E3JK-DN11-C PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร',NULL,1605,0,0,'E3JK-DN11-C  PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร',NULL,'2018877250.png','<p>E3JK-DN11-C &nbsp;PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร</p>\r\n\r\n<p>E3JK-DN11-C &nbsp;PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร</p>\r\n\r\n<p>E3JK-DN11-C &nbsp;PHOTO SENSOR OMRON รับส่งในตัวเดียวกัน ระยะตรวจจับ 2.5 เมตร</p>',NULL,NULL,'2023-10-21','15:02:46','2023-10-21 15:02:46',0,'245752802',0,0,NULL,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
