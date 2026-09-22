/* Table structure and data dump for statistics_admin */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `statistics_admin`
--

DROP TABLE IF EXISTS `statistics_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `statistics_admin` (
  `statistics_admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `statistics_admin_date` date NOT NULL,
  `statistics_admin_time` time DEFAULT NULL,
  `statistics_admin_ip` varchar(100) DEFAULT NULL,
  `statistics_admin_browser` varchar(1000) DEFAULT NULL,
  `statistics_admin_language` varchar(300) DEFAULT NULL,
  `statistics_admin_detail` text DEFAULT NULL,
  `admin_id` int(11) NOT NULL DEFAULT 0,
  `statistics_admin_save` text DEFAULT NULL,
  PRIMARY KEY (`statistics_admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics_admin`
--

LOCK TABLES `statistics_admin` WRITE;
/*!40000 ALTER TABLE `statistics_admin` DISABLE KEYS */;
INSERT INTO `statistics_admin` VALUES
(1,'2025-06-06','21:09:10','127.0.0.1 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(2,'2025-06-06','22:18:44','110.168.242.28 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(3,'2025-06-07','13:47:09','110.168.242.28 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(4,'2025-06-07','21:03:10','110.168.242.28 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(5,'2025-06-08','13:24:27','58.10.158.224 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(6,'2025-06-08','20:56:32','58.10.158.224 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(7,'2025-06-08','22:14:02','58.10.158.224 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(8,'2025-06-08','22:14:32','58.10.158.224 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(9,'2025-06-10','15:08:02','58.10.141.161 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(10,'2025-06-10','19:26:45','58.10.141.161 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(11,'2025-06-10','22:07:09','58.10.141.161 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(12,'2025-06-11','13:25:01','58.10.141.161 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(13,'2025-06-12','15:53:38','58.10.141.161 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(14,'2025-06-16','21:06:46','58.11.71.166 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(15,'2025-06-16','21:11:30','171.6.177.149 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0','en-US,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(16,'2025-07-20','14:03:59','171.7.41.73 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0','en-US,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(17,'2025-07-20','14:06:20','171.7.41.73 ','Mozilla/5.0 (iPad; CPU OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari Line/15.11.0','th-TH,th;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(18,'2025-07-20','14:07:46','171.7.41.73 ','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Safari/605.1.15','th-TH,th;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(19,'2025-07-20','14:49:15','58.10.149.12 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(20,'2025-07-20','14:56:24','171.7.41.73 ','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Safari/605.1.15','th-TH,th;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(21,'2025-08-07','14:58:24','171.7.210.215 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0','en-US,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(22,'2025-08-07','15:18:17','171.7.210.215 ','Mozilla/5.0 (iPad; CPU OS 18_5_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/380.0.788317806 Mobile/15E148 Safari/604.1','th-TH,th;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(23,'2025-12-23','22:25:00','58.10.134.82 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(24,'2026-02-06','15:12:22','58.10.73.155 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','th-TH,th;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(25,'2026-02-12','15:20:26','202.28.158.39 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','en-US,en;q=0.9,th;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(26,'2026-02-12','18:12:50','171.7.50.169 ','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 Safari Line/26.1.1','en-GB,en-US;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(27,'2026-02-12','18:13:41','171.7.50.169 ','Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1','en-GB,en-US;q=0.9,en;q=0.8','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(28,'2026-02-20','21:24:35','49.49.216.47 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36','th-TH,th;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(29,'2026-03-03','14:40:26','49.49.251.54 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th-TH,th;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(30,'2026-03-03','16:36:23','171.6.12.46 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(31,'2026-03-03','16:43:07','171.6.12.46 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ออกจากระบบ',7,' admin | admin | 789456# '),
(32,'2026-03-03','16:44:39','171.6.12.46 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(33,'2026-03-05','15:31:52','171.7.38.205 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(34,'2026-03-07','14:34:34','171.7.38.205 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(35,'2026-03-14','15:45:31','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(36,'2026-03-14','16:49:30','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','ออกจากระบบ',7,' admin | admin | 789456# '),
(37,'2026-03-14','16:49:31','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(38,'2026-03-14','16:51:57','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(39,'2026-03-14','16:59:18','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(40,'2026-03-16','16:10:00','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(41,'2026-03-19','14:48:57','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(42,'2026-03-19','15:44:25','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(43,'2026-03-19','16:39:24','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(44,'2026-03-19','17:00:09','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(45,'2026-03-20','11:42:39','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(46,'2026-03-20','11:57:19','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(47,'2026-03-20','13:21:38','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(48,'2026-03-20','14:47:14','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(49,'2026-03-20','16:10:48','171.7.38.63 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# '),
(50,'2026-04-08','13:35:29','171.6.90.185 ','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','th,en;q=0.9','เข้าสู่ระบบ',7,' admin | admin | 789456# ');
/*!40000 ALTER TABLE `statistics_admin` ENABLE KEYS */;
UNLOCK TABLES;
