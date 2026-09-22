/* Table structure and data dump for Historylog */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `Historylog`
--

DROP TABLE IF EXISTS `Historylog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Historylog` (
  `HistorylogID` int(11) NOT NULL AUTO_INCREMENT,
  `HistorylogDate` date DEFAULT NULL,
  `HistorylogTime` time DEFAULT NULL,
  `HistorylogIP` varchar(1000) DEFAULT NULL,
  `HistorylogAgent` varchar(2000) DEFAULT NULL,
  `Historyloglanguage` varchar(2000) DEFAULT NULL,
  `HistorylogActivities` text DEFAULT NULL,
  `HistorylogUser` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`HistorylogID`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Historylog`
--

LOCK TABLES `Historylog` WRITE;
/*!40000 ALTER TABLE `Historylog` DISABLE KEYS */;
INSERT INTO `Historylog` VALUES
(1,'2025-05-19','21:12:02','58.10.153.190','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(2,'2025-05-20','13:43:09','58.10.140.228','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(3,'2025-05-21','21:19:52','110.168.234.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(4,'2025-05-22','14:18:41','110.168.234.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(5,'2025-05-22','21:55:33','110.168.234.252','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(6,'2025-05-23','22:27:44','124.121.173.111','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(7,'2025-05-24','21:29:02','110.168.239.86','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(8,'2025-05-24','23:46:11','110.168.239.86','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(9,'2025-05-30','22:38:19','110.168.239.86','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(10,'2025-06-02','15:48:10','110.168.236.88','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(11,'2025-06-02','16:06:16','110.168.236.88','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(12,'2025-06-02','23:36:08','110.168.236.88','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(13,'2025-06-03','21:14:16','58.11.85.175','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(14,'2025-06-04','14:17:00','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(15,'2025-06-04','21:33:01','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(16,'2025-06-05','14:14:22','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(17,'2025-06-05','22:24:25','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(18,'2025-06-06','14:20:10','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(19,'2025-06-06','20:31:56','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(20,'2025-06-06','21:09:10','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(21,'2025-06-06','22:18:44','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(22,'2025-06-07','13:47:09','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(23,'2025-06-07','21:03:10','110.168.242.28','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(24,'2025-06-08','13:24:27','58.10.158.224','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(25,'2025-06-08','20:56:32','58.10.158.224','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(26,'2025-06-08','22:14:02','58.10.158.224','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(27,'2025-06-08','22:14:32','58.10.158.224','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(28,'2025-06-10','15:08:02','58.10.141.161','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(29,'2025-06-10','19:26:45','58.10.141.161','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(30,'2025-06-10','22:07:09','58.10.141.161','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(31,'2025-06-11','13:25:01','58.10.141.161','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(32,'2025-06-12','15:53:38','58.10.141.161','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(33,'2025-06-16','21:06:46','58.11.71.166','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(34,'2025-06-16','21:11:30','171.6.177.149','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','en-US,en;q=0.9','ล๊อกอิน','admin'),
(35,'2025-07-20','14:03:59','171.7.41.73','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0','en-US,en;q=0.9','ล๊อกอิน','admin'),
(36,'2025-07-20','14:06:20','171.7.41.73','Mozilla/5.0 (iPad; CPU OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari Line/15.11.0','th-TH,th;q=0.9','ล๊อกอิน','admin'),
(37,'2025-07-20','14:07:46','171.7.41.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Safari/605.1.15','th-TH,th;q=0.9','ล๊อกอิน','admin'),
(38,'2025-07-20','14:49:15','58.10.149.12','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(39,'2025-07-20','14:56:24','171.7.41.73','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Safari/605.1.15','th-TH,th;q=0.9','ล๊อกอิน','admin'),
(40,'2025-08-07','14:58:24','171.7.210.215','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0','en-US,en;q=0.9','ล๊อกอิน','admin'),
(41,'2025-08-07','15:18:17','171.7.210.215','Mozilla/5.0 (iPad; CPU OS 18_5_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/380.0.788317806 Mobile/15E148 Safari/604.1','th-TH,th;q=0.9','ล๊อกอิน','admin'),
(42,'2025-12-23','22:25:00','58.10.134.82','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(43,'2026-02-06','15:12:22','58.10.73.155','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(44,'2026-02-12','15:20:26','202.28.158.39','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','en-US,en;q=0.9,th;q=0.8','ล๊อกอิน','admin'),
(45,'2026-02-12','18:12:50','171.7.50.169','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari Line/26.1.1','en-GB,en-US;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(46,'2026-02-12','18:13:41','171.7.50.169','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1','en-GB,en-US;q=0.9,en;q=0.8','ล๊อกอิน','admin'),
(47,'2026-02-20','21:24:35','49.49.216.47','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','th-TH,th;q=0.9','ล๊อกอิน','admin'),
(48,'2026-03-03','14:40:26','49.49.251.54','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th-TH,th;q=0.9','ล๊อกอิน','admin'),
(49,'2026-03-03','16:36:23','171.6.12.46','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(50,'2026-03-03','16:44:39','171.6.12.46','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(51,'2026-03-05','15:31:52','171.7.38.205','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(52,'2026-03-07','14:34:34','171.7.38.205','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(53,'2026-03-14','15:45:31','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(54,'2026-03-14','16:49:31','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(55,'2026-03-14','16:51:57','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(56,'2026-03-14','16:59:18','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(57,'2026-03-16','16:10:01','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(58,'2026-03-19','14:48:57','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(59,'2026-03-19','15:44:25','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(60,'2026-03-19','16:39:24','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(61,'2026-03-19','17:00:09','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(62,'2026-03-20','11:42:39','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(63,'2026-03-20','11:57:19','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(64,'2026-03-20','13:21:38','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(65,'2026-03-20','14:47:14','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(66,'2026-03-20','16:10:48','171.7.38.63','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin'),
(67,'2026-04-08','13:35:29','171.6.90.185','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','ล๊อกอิน','admin');
/*!40000 ALTER TABLE `Historylog` ENABLE KEYS */;
UNLOCK TABLES;
