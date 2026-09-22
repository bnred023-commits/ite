/* Table structure and data dump for fixed */
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `fixed`
--

DROP TABLE IF EXISTS `fixed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `fixed` (
  `fixed_id` int(11) NOT NULL AUTO_INCREMENT,
  `fixed_website` varchar(255) NOT NULL,
  `fixed_company` varchar(255) NOT NULL,
  `fixed_eng_company` varchar(500) DEFAULT NULL,
  `fixed_topic` varchar(255) DEFAULT NULL,
  `fixed_eng_topic` varchar(500) DEFAULT NULL,
  `fixed_inbox` varchar(255) DEFAULT NULL,
  `fixed_sent` varchar(255) DEFAULT NULL,
  `fixed_titlelogo` varchar(255) DEFAULT NULL,
  `fixed_navlogo` varchar(1000) NOT NULL,
  `fixed_pluginpage` varchar(1000) DEFAULT NULL,
  `fixed_navbar` varchar(250) DEFAULT NULL,
  `fixed_qrcode` varchar(2000) DEFAULT NULL,
  `fixed_googlemaps` varchar(1000) DEFAULT NULL,
  `fixed_graphicmap` varchar(1000) DEFAULT NULL,
  `fixed_address01` text DEFAULT NULL,
  `fixed_address02` text DEFAULT NULL,
  `fixed_status_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`fixed_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixed`
--

LOCK TABLES `fixed` WRITE;
/*!40000 ALTER TABLE `fixed` DISABLE KEYS */;
INSERT INTO `fixed` VALUES
(1,'ite-tech.com','บริษัทอินเตอร์เทคเอ็นจิเนียริ่ง จำกัด','','เป็นผู้ผลิตงานสแตนเลส ทำงานพับตัดขึ้นรูปโลหะแผ่น','','',NULL,'2060272242 - ITE.png','187000329 - ITE.png','','',NULL,'<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.675716530016!2d100.7206288!3d14.0963105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d83d270af4c75%3A0x2c9ee90b1f5ac424!2z4Lia4Lij4Li04Lip4Lix4LiX4Lit4Li04LiZ4LmA4LiV4Lit4Lij4LmM4LmA4LiX4LiEIOC5gOC4reC5h-C4meC4iOC4tOC5gOC4meC4teC4ouC4o-C4tOC5iOC4hyDguIjguLPguIHguLHguJQ!5e0!3m2!1sth!2sth!4v1749281079534!5m2!1sth!2sth\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>','789715096Screenshot 2025-06-07 142535.png',NULL,NULL,1);
/*!40000 ALTER TABLE `fixed` ENABLE KEYS */;
UNLOCK TABLES;
