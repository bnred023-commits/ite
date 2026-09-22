/* Table structure and data dump for pagecontent */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `pagecontent`
--

DROP TABLE IF EXISTS `pagecontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagecontent` (
  `pagecontent_id` int(11) NOT NULL AUTO_INCREMENT,
  `pagecontent_topic` varchar(250) DEFAULT NULL,
  `pagecontent_eng_topic` varchar(250) DEFAULT NULL,
  `pagecontent_detail` varchar(2000) DEFAULT NULL,
  `pagecontent_eng_detail` varchar(2000) DEFAULT NULL,
  `pagecontent_name` varchar(100) DEFAULT NULL,
  `pagecontent_review` longtext DEFAULT NULL,
  `pagecontent_eng_review` longtext DEFAULT NULL,
  `pagecontent_photo` varchar(2000) DEFAULT NULL,
  `pagecontent_update` datetime NOT NULL,
  `pagecontent_status` varchar(250) NOT NULL DEFAULT 'เปิด',
  `pagecontent_sort` int(11) DEFAULT 0,
  PRIMARY KEY (`pagecontent_id`),
  UNIQUE KEY `pagecontent_name` (`pagecontent_name`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagecontent`
--

LOCK TABLES `pagecontent` WRITE;
/*!40000 ALTER TABLE `pagecontent` DISABLE KEYS */;
INSERT INTO `pagecontent` VALUES
(1,'รายละเอียดแนะนำ',NULL,NULL,NULL,'home','<p><strong>Inter Tech Engineering Co., Ltd. warmly welcomes you.</strong></p>\r\n\r\n<p>Inter Tech is a manufacturer specializing in stainless steel works, including sheet metal bending, cutting, and forming.We also provide tooling design services and produce machine parts, tools, and equipment used in industrial applications.With over 20 years of experience in the industry,we are equipped with modern machinery, tools, and equipment.Our production processes are quality-controlled to ensure that all products meet industry standards.We are committed to delivering high-quality products to our customers, aiming to build trust and create lasting impressions.Timely delivery and fair pricing that satisfies our customers are our priorities.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n','','1818069506413504510.png','2021-05-15 14:00:16','ปิด',NULL),
(2,'เกี่ยวกับเรา',NULL,NULL,NULL,'aboutus','','','','2022-01-28 14:34:42','ปิด',NULL),
(3,'ติดต่อเรา',NULL,NULL,NULL,'contact','<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:undefined\"><strong>บริษัท อินเตอร์ เทค เอ็นจิเนียริ่ง จำกัด</strong></span></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">19/17-18 หมู่8 ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">โทร (66)029025752-56</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">E-Mail : intertech@ite-tech.com , www.ite-tech.com</span></span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<hr />\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:undefined\"><strong>INTER TECH ENGINEERING CO.,LTD.</strong></span></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">19/17-18 , Mhoo 8 , Klongha , Klongluang , Pathumtani 12120</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Tel.(66)029025752-56</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">E-Mail : intertech@ite-tech.com, www.ite-tech.com</span></span></p>\r\n','','4978398371151192830.png','2026-03-20 11:44:53','ปิด',NULL),
(5,'ข้อความส่วนล่างของเว็บไซต์',NULL,NULL,NULL,'tagfooter','<p>บริษัท อินเตอร์ เทค เอ็นจิเนียริ่ง จำกัด</p>\r\n\r\n<p>19/17-18 หมู่8 ตำบลคลองห้า อำเภอคลองหลวง จังหวัดปทุมธานี 12120</p>\r\n\r\n<p>โทร (66)029025752-56</p>\r\n\r\n<p>E-Mail : intertech@ite-tech.com</p>\r\n\r\n<p><span style=\"font-size:0px\"><a href=\"https://www.cslinkage.com/\">cslinkage.com Best Japanese car auctions for export to ASEAN, Africa &amp; Middle East,Japan car auctions with shipping to ASEAN, Africa &amp; Middle East, How to buy used cars from Japan auctions export to ASEAN, Africa &amp; Middle East </a> </span></p>\r\n','<p>The office is ready and willing to deliver knowledge. Accurate advice to all customers, from small ones. The sole owner to the large company, according to the company policy &quot;warm, caring, caring, service quality&quot;</p>\r\n',NULL,'2026-03-20 11:58:29','ปิด',NULL),
(33,'วิธีสั่งซื้อสินค้า',NULL,NULL,NULL,'howtoorder','','',NULL,'2020-11-27 14:05:04','ปิด',0),
(49,NULL,NULL,NULL,NULL,'knownledge','','',NULL,'2021-02-15 13:58:36','ปิด',0),
(50,NULL,NULL,NULL,NULL,'blog_content','<p>กรอกรายละเอียด &quot; ข้อความที่แสดงหน้าแรก โปรโมชั่นและข่าวสาร &quot; ที่ต้องการแก้ไข</p>\r\n','',NULL,'2021-05-18 00:12:22','ปิด',0),
(51,NULL,NULL,NULL,NULL,'service_content','','',NULL,'2024-07-02 22:25:27','ปิด',0),
(52,NULL,NULL,NULL,NULL,'portfolio_content','<p style=\"text-align:center\">ข้อความที่แสดงหน้าแรก ส่วนของผลงาน</p>\r\n','',NULL,'2021-02-15 14:20:48','ปิด',0),
(63,NULL,NULL,NULL,NULL,'suggestion_content','<p style=\"text-align:center\"><strong><span style=\"font-size:28px\">จุดเด่นของบริษัท Inter-Tech Engineering Co., Ltd.</span></strong></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n','',NULL,'2025-06-07 14:11:07','ปิด',0),
(65,'แท็ก head','แท็ก head','แท็ก head','แท็ก head','tag_head','',NULL,NULL,'0000-00-00 00:00:00','ปิด',0),
(66,'แท็ก body','แท็ก body',NULL,NULL,'tag_body','',NULL,NULL,'0000-00-00 00:00:00','ปิด',0),
(67,'ราคาค่าบริการ','ราคาค่าบริการ','ราคาค่าบริการ','ราคาค่าบริการ','viceprice','','ราคาค่าบริการ','','2025-02-11 14:04:52','ปิด',0),
(68,'ทำไมต้องเลือกเรา',NULL,NULL,NULL,'why_us','<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'14623575962130451886.png','2025-02-27 20:40:09','เปิด',0);
/*!40000 ALTER TABLE `pagecontent` ENABLE KEYS */;
UNLOCK TABLES;
