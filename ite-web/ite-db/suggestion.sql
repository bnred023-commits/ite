/* Table structure and data dump for suggestion */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `suggestion` (
  `suggestion_id` int(11) NOT NULL AUTO_INCREMENT,
  `suggestion_name` varchar(300) DEFAULT NULL,
  `suggestion_eng_name` varchar(300) DEFAULT NULL,
  `suggestion_detail` varchar(1000) DEFAULT NULL,
  `suggestion_guide` text DEFAULT NULL,
  `suggestion_eng_detail` varchar(1000) DEFAULT NULL,
  `suggestion_photo` varchar(1000) DEFAULT NULL,
  `suggestion_review` longtext DEFAULT NULL,
  `suggestion_eng_review` longtext DEFAULT NULL,
  `suggestion_date` date NOT NULL,
  `suggestion_time` time NOT NULL,
  `suggestion_datetime` datetime NOT NULL,
  `suggestion_sort` int(11) NOT NULL DEFAULT 0,
  `suggestion_page` varchar(250) DEFAULT NULL,
  `highlight_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`suggestion_id`),
  UNIQUE KEY `ArticlePage` (`suggestion_page`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suggestion`
--

LOCK TABLES `suggestion` WRITE;
/*!40000 ALTER TABLE `suggestion` DISABLE KEYS */;
INSERT INTO `suggestion` VALUES
(42,'ประสบการณ์ยาวนานกว่า 20 ปี','','บริษัทมีความเชี่ยวชาญในงานโลหะแผ่นและเครื่องจักรจากประสบการณ์ในอุตสาหกรรมมายาวนาน สร้างความมั่นใจให้กับลูกค้าในคุณภาพและความเข้าใจในงานเฉพาะทาง','','','1938670199.jpg','','','2025-06-07','14:10:37','2025-06-08 13:40:33',0,'204898901',''),
(43,'เครื่องจักรทันสมัยและคุณภาพการผลิตมาตรฐาน','','ใช้เครื่องมือและเทคโนโลยีที่ทันสมัยในกระบวนการผลิต ควบคุมคุณภาพอย่างเข้มงวด เพื่อให้ได้สินค้าที่ได้มาตรฐานและตรงตามความต้องการของลูกค้า','','','789135900.jpg','','','2025-06-07','14:10:44','2025-06-08 13:42:37',0,'334778565',''),
(44,'บริการครบวงจร ตรงเวลา และราคายุติธรรม','','ให้บริการตั้งแต่งานพับ ตัด ขึ้นรูปโลหะ ออกแบบ tooling ไปจนถึงผลิตอะไหล่เครื่องจักร พร้อมจัดส่งตรงเวลาและราคาที่ยุติธรรม เพื่อสร้างความพึงพอใจสูงสุดแก่ลูกค้า','','','669589891.jpg','','','2025-06-07','14:10:51','2025-06-08 13:43:51',0,'124523721','');
/*!40000 ALTER TABLE `suggestion` ENABLE KEYS */;
UNLOCK TABLES;
