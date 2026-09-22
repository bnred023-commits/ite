# 08-ui-modernization-roadmap-and-v1-mapping.md: สรุปแผนงานและตารางแมปคู่ไฟล์สำหรับการปรับโฉม UI หน้าบ้านจาก Reference v1

**บันทึกเมื่อ:** 19 กันยายน 2026  
**เป้าหมาย:** สรุปการวิเคราะห์ทั้งหมดจากการสนทนา สำหรับใช้เริ่มต้นทำงานในครั้งถัดไปโดยทันที

---

## 1. สรุปความพร้อมและข้อตกลงทางสถาปัตยกรรม (Architecture & Environment Summary)

1. **สภาพแวดล้อม Local (Docker Setup):**
   - รันผ่าน Docker Compose (`PHP 7.4 + MariaDB 10.11`) ที่พอร์ต `http://localhost:8000`
   - นำเข้าฐานข้อมูล `itetechc_web01` ทั้ง 29 ตารางเรียบร้อยแล้ว
   - มีการแก้ไขซ่อนข้อความ PHP Warning/Notice ใน `TheConnect.php` และ `custom-php.ini` ทำให้หน้าจอแสดงผลได้สะอาดเรียบร้อยตรงกับเซิร์ฟเวอร์ Plesk บน Production (PHP 7.4.33) 100%

2. **ระบบหลังบ้าน (CMS Admin ใน `/office/`):**
   - **ไม่ต้องปรับแก้โค้ดหรือฐานข้อมูลใดๆ ทั้งสิ้น (0% Changes Needed)**
   - ผู้ดูแลระบบเข้าใช้งานผ่าน `http://localhost:8000/office/` (Username: `admin` | Password: `789456#`) และจัดการอัปโหลดสินค้า ข่าวสาร สไลด์ Banner ได้ตามเวิร์กโฟลว์เดิม

3. **พิมพ์เขียวดีไซน์ใหม่ (Reference Design `v1/`):**
   - ใช้โครงสร้าง HTML และ Assets จากโฟลเดอร์ **`v1/`** (Mobirise Bootstrap 5) เป็นแม่แบบในการออกแบบหน้าบ้านใหม่ทั้งหมด

---

## 2. ตารางแมปคู่ไฟล์ระหว่าง `v1/` และระบบเดิม (Complete 1-to-1 File Mapping)

| ไฟล์แม่แบบใน `v1/` | รายละเอียดและเนื้อหา | ไฟล์ระบบเดิมที่จะนำมาสวม (Target PHP) | การเชื่อมโยงข้อมูลจากหลังบ้าน (CMS Dynamic Binding) |
| :--- | :--- | :--- | :--- |
| **`v1/page1.html`** | หน้าแรก (Home Page) | `httpdocs/index.php` | ดึงสไลด์ Banner จาก `slides`, สินค้าแนะนำจาก `product`, ข่าวสารจาก `web_content` |
| **`v1/page2.html`** | เกี่ยวกับเรา (About Us) | `httpdocs/aboutus.php` | ดึงประวัติและวิสัยทัศน์องค์กรจากตาราง `pagecontent` |
| **`v1/page3.html`** | รวมรายการสินค้า (Main Products) | `httpdocs/product.php` | ดึงรายการสินค้าและหมวดหมู่แบบ Dynamic จาก `product` และ `catalog` |
| **`v1/page4.html`** | บริการการออกแบบ (Design Services) | `httpdocs/group_company.php` | ดึงข้อมูลบริการออกแบบ (Hospital, Cleanroom, Canteen Design) จาก `mainmenu` |
| **`v1/page5.html`** | ประเภทวัสดุ (Materials) | `httpdocs/pagecontent.php` | ดึงข้อมูลประเภทวัสดุ (Stainless Steel, Aluminium, Steel) จาก `pagecontent` |
| **`v1/page6.html`** | งานบริการผลิต (Sales & Services) | `httpdocs/why_us.php` | ดึงข้อมูลเครื่องจักรและงาน CNC Punching จาก `pagecontent` |
| **`v1/index.html`** | ติดต่อเรา & Footer (Contact Us & Footer) | `httpdocs/contactus.php` & `index_footer.php` | นำฟอร์มติดต่อมาผูกส่งค่าไปยัง `suggestion_update.php` บันทึกให้ Admin ดูในหลังบ้าน |
| **`v1/page7.html` ถึง `page19.html`** | หมวดหมู่และรายละเอียดสินค้าเฉพาะทาง (Pipe, Cabinet, Table, Wagon, Shelf ฯลฯ) | `httpdocs/product_detail.php` & `web_product.php` | นำการจัดวาง Card และแกลเลอรีรูปภาพมาสวม ให้ดึงรูปและสเปกตาม ID สินค้าจาก `product` และ `product_picture` |

---

## 3. แผนการดำเนินงาน 6 ขั้นตอนสำหรับครั้งถัดไป (Next Session Execution Plan)

```
[ขั้นตอนที่ 1: เตรียม Assets] ──► [ขั้นตอนที่ 2: ปรับ Navbar/Footer] ──► [ขั้นตอนที่ 3: ปรับหน้าแรก index.php]
                                                                              │
[ขั้นตอนที่ 6: ทดสอบหลังบ้าน] ◄── [ขั้นตอนที่ 5: ปรับหน้าเกี่ยวกับ/ติดต่อ] ◄── [ขั้นตอนที่ 4: ปรับหน้าสินค้า product.php]
```

* **ขั้นตอนที่ 1: Setup Isolated Assets** ➔ คัดลอกโฟลเดอร์ `v1/assets/` ไปไว้ที่ `httpdocs/v1-assets/`
* **ขั้นตอนที่ 2: Common Layout Templates** ➔ ปรับปรุง `index_head.php`, `index_navbar.php`, `index_footer.php` ให้ดึง CSS/JS ดีไซน์ใหม่พร้อมดึงเมนูและโลโก้จาก DB
* **ขั้นตอนที่ 3: Modernize Home Page (`index.php`)** ➔ แปลงเลย์เอาต์จาก `v1/page1.html` มาใช้ใน `index.php`
* **ขั้นตอนที่ 4: Modernize Catalog & Product Pages (`product.php` & `product_detail.php`)** ➔ แปลงเลย์เอาต์จาก `v1/page3.html` และ `v1/page7-19.html`
* **ขั้นตอนที่ 5: Modernize Content & Contact Pages (`aboutus.php`, `why_us.php`, `contactus.php`)** ➔ แปลงเลย์เอาต์จาก `v1/page2.html`, `v1/page4-6.html`, `v1/index.html`
* **ขั้นตอนที่ 6: End-to-End CMS Verification** ➔ ทดลองเพิ่ม/แก้ไขรูปภาพและข้อมูลผ่านหลังบ้าน `/office/` แล้วตรวจสอบการอัปเดตบนหน้าบ้านใหม่

---

## 4. สถานะพร้อมทำงานในครั้งหน้า (Readiness Checklist)

- [x] Docker Container Web Server & Database ทำงานเรียบร้อย
- [x] วิเคราะห์ความเชื่อมโยงของไฟล์ทั้ง 16 หน้าบ้านครบถ้วน
- [x] สำรวจโครงสร้าง HTML แม่แบบในโฟลเดอร์ `v1/` ครบ 19 หน้า
- [x] สร้างคู่มือยุทธศาสตร์ความปลอดภัย (ไม่กระทบหลังบ้าน) ในเอกสาร 07 และ 08
- [ ] **สิ่งที่ต้องเริ่มทำทันทีเมื่อกลับมา:** ดำเนินการขั้นตอนที่ 1 (เตรียมโฟลเดอร์ `httpdocs/v1-assets/`) และขั้นตอนที่ 2 (ปรับปรุง Navbar/Footer)
