# 02-project-structure.md: โครงสร้างไฟล์และการจัดวางโค้ด

## 1. Directory Mapping

โครงสร้างของระบบ **ite-web** ถูกแบ่งแยกออกตามหน้าที่และการเข้าถึงของผู้ใช้งานอย่างชัดเจนผ่านระบบโฟลเดอร์ใน `httpdocs/`:

```
ite-web/
├── httpdocs/                          # โฟลเดอร์หลักสำหรับ Web Server (Document Root)
│   ├── TheConnect/                    # โฟลเดอร์จัดการการเชื่อมต่อฐานข้อมูล
│   │   └── TheConnect.php             # ไฟล์ตั้งค่าและสร้าง connection ด้วย mysqli
│   ├── office/                        # ระบบผู้ดูแลระบบ (Admin Control Panel / CMS)
│   │   ├── index.php                  # Dashboard หน้าแรกของส่วน Admin
│   │   ├── index_Login.php            # หน้าล็อกอินเข้าใช้งาน Admin
│   │   ├── admin.php                  # จัดการข้อมูลผู้ใช้ระดับ Admin
│   │   ├── product.php                # จัดการข้อมูลสินค้า
│   │   ├── catalog.php                # จัดการแคตตาล็อก
│   │   ├── web_content.php            # จัดการบทความและข่าวสาร
│   │   ├── slides.php                 # จัดการภาพสไลด์หน้าแรก
│   │   └── suggestion.php             # จัดการข้อเสนอแนะและตารางข้อมูลต่างๆ
│   ├── bootstrap/                     # ไฟล์ส่วนกลางสำหรับ UI (CSS, JS, Fonts, CKEditor)
│   │   ├── css/ & js/                 # ไฟล์ Bootstrap Assets
│   │   └── ckeditor/                  # โปรแกรมจำลอง Rich Text Editor
│   ├── Photo/ & Files/                # โฟลเดอร์เก็บไฟล์สื่อและรูปภาพที่อัปโหลดเข้าสู่ระบบ
│   ├── website/                       # โฟลเดอร์สคริปต์หน้าเว็บส่วนเสริม
│   ├── index.php                      # หน้าแรกฝั่งผู้ใช้งานทั่วไป (Public User Front-end)
│   ├── product.php                    # หน้ารายการสินค้าฝั่งผู้ใช้
│   ├── product_detail.php             # หน้าแสดงรายละเอียดสินค้า
│   ├── web_content.php                # หน้าข่าวสารฝั่งผู้ใช้
│   ├── contactus.php                  # หน้าติดต่อเรา
│   └── search.php                     # ระบบค้นหาข้อมูลในเว็บไซต์
└── itetechc_web01_2026-09-19_14-48-11.sql  # ไฟล์สำรองฐานข้อมูล MySQL (Dump Schema & Data)
```

---

## 2. Separation of Concerns (สถาปัตยกรรมและการแยกส่วน)

ระบบนี้ไม่ได้ใช้ MVC Architecture สำเร็จรูป แต่จัดวางโค้ดในลักษณะ **Single-File Page Script**:
1. **Routing & Handling:** แต่ละไฟล์ `.php` ทำหน้าที่เป็นทั้ง Router และ View ในตัวเอง (เช่น เมื่อเรียก `/office/product.php` คำสั่งในไฟล์นี้จะประมวลผลการค้นหาข้อมูล ดึงข้อมูลจากฐานข้อมูล และแสดงผลเป็นหน้า HTML)
2. **Action Dispatching:** การเพิ่ม/แก้ไข/ลบ ข้อมูลจะใช้โครงสร้างไฟล์แยกตาม Action เช่น:
   * `product.php` (รายการ)
   * `product_add.php` (ฟอร์มเพิ่ม/ประมวลผลเพิ่ม)
   * `product_update.php` (ฟอร์มแก้ไข/ประมวลผลแก้ไข)
   * `product_del.php` (ประมวลผลลบ)

---

## 3. Shared Codebase & Utilities

* **`httpdocs/TheConnect/TheConnect.php`:** ไฟล์ส่วนกลางที่ถูก `include` ในทุกหน้า เพื่อเริ่ม Session (`session_start()`), กำหนดค่าการเชื่อมต่อฐานข้อมูล และดึงค่าการตั้งค่าเริ่มต้นของเว็บไซต์ (`fixed`)
* **Layout Templates (`httpdocs/index_head.php`, `index_navbar.php`, `index_footer.php`):** ส่วนประกอบส่วนกลางสำหรับฝั่ง Public User เพื่อรักษามาตรฐานหน้าตาเว็บไซต์
* **Admin Layout Templates (`httpdocs/office/index_Head.php`, `index_Navbar.php`, `index_AdminMenu.php`):** ส่วนประกอบส่วนกลางสำหรับฝั่ง Admin
* **Helper Functions (`httpdocs/office/index_function.php`):** ฟังก์ชันส่วนกลางสำหรับคำนวณหรือแปลงรูปแบบข้อมูล

---

## 4. Technical Constraints

1. **Session Scope:** การเข้าถึงระบบ Admin จำเป็นต้องมี `$_SESSION['login_admin_id']` หากไม่มีจะถูก redirect ไปยังหน้าล็อกอิน
2. **Encoding Constraint:** การรับส่งข้อมูลกับฐานข้อมูลถูกบังคับด้วย `mysqli_query($con, "SET NAMES UTF8")` เพื่อรองรับภาษาไทย
3. **Relative File Inclusions:** การ `include` หรือ `require` ไฟล์ต่างๆ ใช้วิธีระบุ Relative Path เช่น `include '../TheConnect/TheConnect.php';` ทำให้โครงสร้างโฟลเดอร์ต้องถูกรักษาไว้อย่างเคร่งครัด
