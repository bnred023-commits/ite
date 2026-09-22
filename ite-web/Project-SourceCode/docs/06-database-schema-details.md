# รายละเอียดโครงสร้างตารางฐานข้อมูล (Database Schema Specifications)
**ไฟล์ซอร์ส SQL:** `itetechc_web01_2026-09-19_14-48-11.sql`  
**จำนวนตารางทั้งหมด:** 29 ตาราง

### 📌 ตาราง: `Device`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `DeviceID` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `DeviceID` |
| `DeviceName` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `DeviceName` |
| `DeviceText1` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `DeviceText1` |
| `DeviceText2` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `DeviceText2` |
| `DeviceText3` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `DeviceText3` |
| `DevicePhoto` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `DevicePhoto` |
| **PRIMARY KEY** | - | Primary Key: `DeviceID` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `Historylog`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `HistorylogID` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `HistorylogID` |
| `HistorylogDate` | `date` | DEFAULT NULL | ฟิลด์ข้อมูล `HistorylogDate` |
| `HistorylogTime` | `time` | DEFAULT NULL | ฟิลด์ข้อมูล `HistorylogTime` |
| `HistorylogIP` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `HistorylogIP` |
| `HistorylogAgent` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `HistorylogAgent` |
| `Historyloglanguage` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `Historyloglanguage` |
| `HistorylogActivities` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `HistorylogActivities` |
| `HistorylogUser` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `HistorylogUser` |
| **PRIMARY KEY** | - | Primary Key: `HistorylogID` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `admin`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `admin_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `admin_id` |
| `admin_user` | `varchar(200)` | NOT NULL | ฟิลด์ข้อมูล `admin_user` |
| `admin_pass` | `varchar(200)` | NOT NULL | ฟิลด์ข้อมูล `admin_pass` |
| `admin_name` | `varchar(200)` | NOT NULL | ฟิลด์ข้อมูล `admin_name` |
| `admin_degree_id` | `int(11)` | NOT NULL DEFAULT 2 | ฟิลด์ข้อมูล `admin_degree_id` |
| `admin_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `admin_date` |
| `admin_time` | `time` | NOT NULL | ฟิลด์ข้อมูล `admin_time` |
| **PRIMARY KEY** | - | Primary Key: `admin_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `admin_degree`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `admin_degree_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `admin_degree_id` |
| `admin_degree_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `admin_degree_name` |
| **PRIMARY KEY** | - | Primary Key: `admin_degree_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `admin_remove`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `admin_remove_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `admin_remove_id` |
| `admin_remove_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `admin_remove_name` |
| **PRIMARY KEY** | - | Primary Key: `admin_remove_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `advertise`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `advertise_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `advertise_id` |
| `advertise_photo` | `varchar(100)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_photo` |
| `advertise_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_detail` |
| `advertise_topic` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_topic` |
| `advertise_sort` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_sort` |
| `advertise_link` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_link` |
| `advertise_youtube` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_youtube` |
| `advertise_facebook` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_facebook` |
| `advertise_video` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `advertise_video` |
| **PRIMARY KEY** | - | Primary Key: `advertise_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `catalog`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `catalog_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `catalog_id` |
| `catalog_name` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_name` |
| `catalog_eng_name` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_eng_name` |
| `catalog_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_detail` |
| `catalog_eng_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_eng_detail` |
| `catalog_photo` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_photo` |
| `catalog_sort` | `int(11)` | DEFAULT 0 | ฟิลด์ข้อมูล `catalog_sort` |
| `catalog_page` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_page` |
| **PRIMARY KEY** | - | Primary Key: `catalog_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY catalog_page (catalog_page)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `contactus`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `contactus_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `contactus_id` |
| `contactus_name` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_name` |
| `contactus_phone` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_phone` |
| `contactus_email` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_email` |
| `contactus_subject` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_subject` |
| `contactus_message` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_message` |
| `contactus_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `contactus_date` |
| `contactus_time` | `time` | NOT NULL | ฟิลด์ข้อมูล `contactus_time` |
| `contactus_company` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_company` |
| `contactus_address` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_address` |
| `contactus_product` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `contactus_product` |
| **PRIMARY KEY** | - | Primary Key: `contactus_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `fixed`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `fixed_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `fixed_id` |
| `fixed_website` | `varchar(255)` | NOT NULL | ฟิลด์ข้อมูล `fixed_website` |
| `fixed_company` | `varchar(255)` | NOT NULL | ฟิลด์ข้อมูล `fixed_company` |
| `fixed_eng_company` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_eng_company` |
| `fixed_topic` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_topic` |
| `fixed_eng_topic` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_eng_topic` |
| `fixed_inbox` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_inbox` |
| `fixed_sent` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_sent` |
| `fixed_titlelogo` | `varchar(255)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_titlelogo` |
| `fixed_navlogo` | `varchar(1000)` | NOT NULL | ฟิลด์ข้อมูล `fixed_navlogo` |
| `fixed_pluginpage` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_pluginpage` |
| `fixed_navbar` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_navbar` |
| `fixed_qrcode` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_qrcode` |
| `fixed_googlemaps` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_googlemaps` |
| `fixed_graphicmap` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_graphicmap` |
| `fixed_address01` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_address01` |
| `fixed_address02` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_address02` |
| `fixed_status_id` | `int(11)` | NOT NULL DEFAULT 1 | ฟิลด์ข้อมูล `fixed_status_id` |
| **PRIMARY KEY** | - | Primary Key: `fixed_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `fixed_status`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `fixed_status_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `fixed_status_id` |
| `fixed_status_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `fixed_status_name` |
| **PRIMARY KEY** | - | Primary Key: `fixed_status_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `gallery`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `gallery_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `gallery_id` |
| `gallery_code` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_code` |
| `gallery_photo` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_photo` |
| `gallery_video` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_video` |
| `gallery_youtube` | `varchar(2000)` | NOT NULL | ฟิลด์ข้อมูล `gallery_youtube` |
| `gallery_facebook` | `varchar(2000)` | NOT NULL | ฟิลด์ข้อมูล `gallery_facebook` |
| `gallery_review` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_review` |
| `gallery_link` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_link` |
| `gallery_download` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_download` |
| `gallery_sort` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `gallery_sort` |
| **PRIMARY KEY** | - | Primary Key: `gallery_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `mainmenu`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `mainmenu_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `mainmenu_id` |
| `mainmenu_cover` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_cover` |
| `mainmenu_name` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_name` |
| `mainmenu_eng_name` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_eng_name` |
| `mainmenu_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_detail` |
| `mainmenu_eng_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_eng_detail` |
| `mainmenu_photo` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_photo` |
| `mainmenu_sort` | `int(11)` | DEFAULT 0 | ฟิลด์ข้อมูล `mainmenu_sort` |
| `mainmenu_page` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_page` |
| **PRIMARY KEY** | - | Primary Key: `mainmenu_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY mainmenu_page (mainmenu_page)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `organization`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `organization_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `organization_id` |
| `organization_photo` | `varchar(500)` | CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL | ฟิลด์ข้อมูล `organization_photo` |
| **PRIMARY KEY** | - | Primary Key: `organization_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `pagecontent`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `pagecontent_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `pagecontent_id` |
| `pagecontent_topic` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_topic` |
| `pagecontent_eng_topic` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_eng_topic` |
| `pagecontent_detail` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_detail` |
| `pagecontent_eng_detail` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_eng_detail` |
| `pagecontent_name` | `varchar(100)` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_name` |
| `pagecontent_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_review` |
| `pagecontent_eng_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_eng_review` |
| `pagecontent_photo` | `varchar(2000)` | DEFAULT NULL | ฟิลด์ข้อมูล `pagecontent_photo` |
| `pagecontent_update` | `datetime` | NOT NULL | ฟิลด์ข้อมูล `pagecontent_update` |
| `pagecontent_status` | `varchar(250)` | NOT NULL DEFAULT 'เปิด' | ฟิลด์ข้อมูล `pagecontent_status` |
| `pagecontent_sort` | `int(11)` | DEFAULT 0 | ฟิลด์ข้อมูล `pagecontent_sort` |
| **PRIMARY KEY** | - | Primary Key: `pagecontent_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY pagecontent_name (pagecontent_name)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `plot`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `plot_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `plot_id` |
| `plot_name` | `varchar(250)` | NOT NULL | ฟิลด์ข้อมูล `plot_name` |
| **PRIMARY KEY** | - | Primary Key: `plot_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `product`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `product_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `product_id` |
| `product_name` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_name` |
| `product_eng_name` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_eng_name` |
| `product_price` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `product_price` |
| `product_eng_price` | `int(11)` | DEFAULT 0 | ฟิลด์ข้อมูล `product_eng_price` |
| `product_before` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `product_before` |
| `product_detail` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_detail` |
| `product_eng_detail` | `varchar(500)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_eng_detail` |
| `product_photo` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_photo` |
| `product_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `product_review` |
| `product_eng_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `product_eng_review` |
| `product_code` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_code` |
| `product_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `product_date` |
| `product_time` | `time` | NOT NULL | ฟิลด์ข้อมูล `product_time` |
| `product_datetime` | `datetime` | NOT NULL | ฟิลด์ข้อมูล `product_datetime` |
| `product_sort` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `product_sort` |
| `product_page` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_page` |
| `catalog_id` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `catalog_id` |
| `collection_id` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `collection_id` |
| `plot_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `plot_name` |
| `product_search` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `product_search` |
| **PRIMARY KEY** | - | Primary Key: `product_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY ArticlePage (product_page)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `product_picture`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `product_picture_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `product_picture_id` |
| `product_picture_photo` | `varchar(400)` | CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL | ฟิลด์ข้อมูล `product_picture_photo` |
| `product_picture_order` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `product_picture_order` |
| `product_id` | `int(11)` | NOT NULL | ฟิลด์ข้อมูล `product_id` |
| **PRIMARY KEY** | - | Primary Key: `product_picture_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `qrcode`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `qrcode_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `qrcode_id` |
| `qrcode_type` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `qrcode_type` |
| `qrcode_link` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `qrcode_link` |
| `qrcode_photo` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `qrcode_photo` |
| `qrcode_sort` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `qrcode_sort` |
| **PRIMARY KEY** | - | Primary Key: `qrcode_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `slides`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `slides_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `slides_id` |
| `slides_photo` | `varchar(100)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_photo` |
| `slides_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_detail` |
| `slides_topic` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_topic` |
| `slides_sort` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_sort` |
| `slides_link` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_link` |
| `slides_youtube` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_youtube` |
| `slides_facebook` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_facebook` |
| `slides_video` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `slides_video` |
| **PRIMARY KEY** | - | Primary Key: `slides_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `social`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `social_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `social_id` |
| `social_name` | `varchar(300)` | NOT NULL | ฟิลด์ข้อมูล `social_name` |
| `social_type` | `varchar(200)` | NOT NULL | ฟิลด์ข้อมูล `social_type` |
| `social_link` | `varchar(200)` | DEFAULT NULL | ฟิลด์ข้อมูล `social_link` |
| `social_photo` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `social_photo` |
| `social_footer` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `social_footer` |
| `social_sort` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `social_sort` |
| **PRIMARY KEY** | - | Primary Key: `social_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `statistics_admin`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `statistics_admin_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `statistics_admin_id` |
| `statistics_admin_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `statistics_admin_date` |
| `statistics_admin_time` | `time` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_admin_time` |
| `statistics_admin_ip` | `varchar(100)` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_admin_ip` |
| `statistics_admin_browser` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_admin_browser` |
| `statistics_admin_language` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_admin_language` |
| `statistics_admin_detail` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_admin_detail` |
| `admin_id` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `admin_id` |
| `statistics_admin_save` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_admin_save` |
| **PRIMARY KEY** | - | Primary Key: `statistics_admin_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `statistics_online`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `statistics_online_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `statistics_online_id` |
| `statistics_online_session` | `varchar(100)` | NOT NULL | ฟิลด์ข้อมูล `statistics_online_session` |
| `statistics_online_time` | `varchar(100)` | NOT NULL | ฟิลด์ข้อมูล `statistics_online_time` |
| **PRIMARY KEY** | - | Primary Key: `statistics_online_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `statistics_web`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `statistics_web_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `statistics_web_id` |
| `statistics_web_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `statistics_web_date` |
| `statistics_web_time` | `time` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_web_time` |
| `statistics_web_ip` | `varchar(100)` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_web_ip` |
| `statistics_web_browser` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_web_browser` |
| `statistics_web_language` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `statistics_web_language` |
| **PRIMARY KEY** | - | Primary Key: `statistics_web_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `store_photos`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `store_photos_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `store_photos_id` |
| `store_photos_img` | `varchar(500)` | CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL | ฟิลด์ข้อมูล `store_photos_img` |
| **PRIMARY KEY** | - | Primary Key: `store_photos_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `suggestion`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `suggestion_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `suggestion_id` |
| `suggestion_name` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_name` |
| `suggestion_eng_name` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_eng_name` |
| `suggestion_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_detail` |
| `suggestion_guide` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_guide` |
| `suggestion_eng_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_eng_detail` |
| `suggestion_photo` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_photo` |
| `suggestion_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_review` |
| `suggestion_eng_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_eng_review` |
| `suggestion_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `suggestion_date` |
| `suggestion_time` | `time` | NOT NULL | ฟิลด์ข้อมูล `suggestion_time` |
| `suggestion_datetime` | `datetime` | NOT NULL | ฟิลด์ข้อมูล `suggestion_datetime` |
| `suggestion_sort` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `suggestion_sort` |
| `suggestion_page` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `suggestion_page` |
| `highlight_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `highlight_name` |
| **PRIMARY KEY** | - | Primary Key: `suggestion_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY ArticlePage (suggestion_page)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `web_content`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `web_content_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `web_content_id` |
| `web_content_cover` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_cover` |
| `web_content_name` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_name` |
| `web_content_eng_name` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_eng_name` |
| `web_content_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_detail` |
| `web_content_guide` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_guide` |
| `web_content_eng_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_eng_detail` |
| `web_content_photo` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_photo` |
| `web_content_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_review` |
| `web_content_eng_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_eng_review` |
| `web_content_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `web_content_date` |
| `web_content_time` | `time` | NOT NULL | ฟิลด์ข้อมูล `web_content_time` |
| `web_content_datetime` | `datetime` | NOT NULL | ฟิลด์ข้อมูล `web_content_datetime` |
| `web_content_sort` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `web_content_sort` |
| `web_content_page` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_content_page` |
| `highlight_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `highlight_name` |
| `mainmenu_id` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_id` |
| **PRIMARY KEY** | - | Primary Key: `web_content_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY ArticlePage (web_content_page)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `web_content_picture`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `web_content_picture_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `web_content_picture_id` |
| `web_content_picture_photo` | `varchar(255)` | NOT NULL | ฟิลด์ข้อมูล `web_content_picture_photo` |
| `web_content_id` | `int(11)` | NOT NULL | ฟิลด์ข้อมูล `web_content_id` |
| **PRIMARY KEY** | - | Primary Key: `web_content_picture_id` | กำหนด Primary Key ของตาราง |

---

### 📌 ตาราง: `web_product`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `web_product_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `web_product_id` |
| `web_product_price` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_price` |
| `web_product_cover` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_cover` |
| `web_product_name` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_name` |
| `web_product_eng_name` | `varchar(300)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_eng_name` |
| `web_product_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_detail` |
| `web_product_guide` | `text` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_guide` |
| `web_product_eng_detail` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_eng_detail` |
| `web_product_photo` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_photo` |
| `web_product_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_review` |
| `web_product_eng_review` | `longtext` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_eng_review` |
| `web_product_date` | `date` | NOT NULL | ฟิลด์ข้อมูล `web_product_date` |
| `web_product_time` | `time` | NOT NULL | ฟิลด์ข้อมูล `web_product_time` |
| `web_product_datetime` | `datetime` | NOT NULL | ฟิลด์ข้อมูล `web_product_datetime` |
| `web_product_sort` | `int(11)` | NOT NULL DEFAULT 0 | ฟิลด์ข้อมูล `web_product_sort` |
| `web_product_page` | `varchar(250)` | DEFAULT NULL | ฟิลด์ข้อมูล `web_product_page` |
| `highlight_name` | `varchar(1000)` | DEFAULT NULL | ฟิลด์ข้อมูล `highlight_name` |
| `mainmenu_id` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `mainmenu_id` |
| `catalog_id` | `int(11)` | DEFAULT NULL | ฟิลด์ข้อมูล `catalog_id` |
| **PRIMARY KEY** | - | Primary Key: `web_product_id` | กำหนด Primary Key ของตาราง |
| INDEX / KEY | - | `UNIQUE KEY ArticlePage (web_product_page)` | ดัชนีสำหรับการค้นหา |

---

### 📌 ตาราง: `web_product_picture`
| ชื่อคอลัมน์ (Column) | ประเภทข้อมูล (Type) | เงื่อนไข / Key | คำอธิบาย (Purpose) |
| :--- | :--- | :--- | :--- |
| `web_product_picture_id` | `int(11)` | NOT NULL AUTO_INCREMENT | ฟิลด์ข้อมูล `web_product_picture_id` |
| `web_product_picture_photo` | `varchar(255)` | NOT NULL | ฟิลด์ข้อมูล `web_product_picture_photo` |
| `web_product_id` | `int(11)` | NOT NULL | ฟิลด์ข้อมูล `web_product_id` |
| **PRIMARY KEY** | - | Primary Key: `web_product_picture_id` | กำหนด Primary Key ของตาราง |

---
