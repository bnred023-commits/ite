# 05-api-specification.md: สเปกและรายการ API (Endpoints)

## 1. API Protocol & Communication Style

เนื่องจาก **ite-web** เป็นระบบ Web Application รูปแบบ Monolithic Traditional PHP การสื่อสารข้อมูลระหว่าง Client และ Server จึงใช้โปรโตคอล **HTTP GET / POST** ในรูปแบบ Server-Side Rendering (SSR) ร่วมกับ Form Data Endpoints และ AJAX Handlers (JSON Response):

* **Protocol:** HTTP / HTTPS
* **Data Format:** Form-Data, x-www-form-urlencoded, Multipart Form-Data (อัปโหลดไฟล์) และ JSON (สำหรับ AJAX Endpoints)
* **Base Path:** `/httpdocs/` และ `/httpdocs/office/`

---

## 2. Authentication & Security Handling

* **Authentication Strategy:** PHP Native Session ID (`PHPSESSID`)
* **Session Key:** `$_SESSION['login_admin_id']`
* **Session Header:** การส่งคำขอในหน้า Admin จะต้องแนบ Cookie `PHPSESSID` ที่สอดคล้องกับ Session บน Server
* **Security Validation:** หน้าประมวลผล Admin จะตรวจเช็คเงื่อนไข:
  ```php
  if (trim($_SESSION['login_admin_id']) == "" || !isset($_SESSION['login_admin_id'])) {
      echo "<script>window.location='index_Login.php';</script>";
      exit();
  }
  ```

---

## 3. Standard Response & Handling Pattern

1. **Success Execution Response (JavaScript Alert & Redirect):**
   ```html
   <script>
     alert('บันทึกข้อมูลสำเร็จ');
     window.location = 'product.php';
   </script>
   ```
2. **Failure Execution Response:**
   ```html
   <script>
     alert('เกิดข้อผิดพลาด ไม่สามารถดำเนินการได้');
     window.history.back();
   </script>
   ```

---

## 4. Endpoints Overview Table

| Method | Endpoint Path | Controller / Script Handler | Auth Required | Description / Process Flow |
| :--- | :--- | :--- | :---: | :--- |
| **POST** | `/office/index_Login.php` | `office/index_Login.php` | No | ตรวจสอบชื่อผู้ใช้และรหัสผ่าน สร้าง Session และบันทึก `Historylog` |
| **GET** | `/office/index_Logout.php` | `office/index_Logout.php` | Yes | ทำลาย Session (`session_destroy()`) และ redirect กลับหน้าล็อกอิน |
| **POST** | `/office/product_add.php` | `office/product_add.php` | Yes | รับค่าฟอร์ม อัปโหลดรูปภาพสินค้า บันทึกลงตาราง `product` และ `product_picture` |
| **POST** | `/office/product_update.php` | `office/product_update.php` | Yes | รับค่าฟอร์ม แก้ไขข้อมูลสินค้าในตาราง `product` |
| **GET/POST** | `/office/product_del.php` | `office/product_del.php` | Yes | รับ `product_id` ลบข้อมูลสินค้าและไฟล์รูปภาพที่เกี่ยวข้อง |
| **POST** | `/office/catalog_add.php` | `office/catalog_add.php` | Yes | เพิ่มหมวดหมู่สินค้าใหม่ลงในตาราง `catalog` |
| **POST** | `/office/catalog_update.php` | `office/catalog_update.php` | Yes | แก้ไขชื่อและข้อมูลหมวดหมู่สินค้า |
| **GET** | `/office/catalog_del.php` | `office/catalog_del.php` | Yes | ลบหมวดหมู่สินค้าในตาราง `catalog` |
| **POST** | `/office/web_content_add.php` | `office/web_content_add.php` | Yes | เพิ่มบทความและข่าวสารลงตาราง `web_content` |
| **POST** | `/office/web_content_update.php` | `office/web_content_update.php` | Yes | แก้ไขบทความและข่าวสาร |
| **GET** | `/office/web_content_del.php` | `office/web_content_del.php` | Yes | ลบบทความ ข่าวสาร และรูปภาพที่เกี่ยวข้อง |
| **POST** | `/office/Device_Add.php` | `office/Device_Add.php` | Yes | เพิ่มข้อมูลอุปกรณ์ไอทีลงในตาราง `Device` |
| **POST** | `/office/Device_Update.php` | `office/Device_Update.php` | Yes | อัปเดตข้อมูลอุปกรณ์ไอทีในตาราง `Device` |
| **GET** | `/office/Device_Del.php` | `office/Device_Del.php` | Yes | ลบข้อมูลอุปกรณ์ไอทีในตาราง `Device` |
| **POST** | `/office/slides_add.php` | `office/slides_add.php` | Yes | อัปโหลดและบันทึกภาพสไลด์หน้าแรก |
| **POST** | `/office/slides_ajaxPro.php` | `office/slides_ajaxPro.php` | Yes | AJAX Endpoint สำหรับอัปเดตสถานะหรือลำดับสไลด์ |
| **POST** | `/suggestion_update.php` | `suggestion_update.php` | No | รับข้อความและข้อมูลการติดต่อจากผู้ใช้งานหน้าเว็บ บันทึกลงตาราง `suggestion` |
