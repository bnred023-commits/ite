# 07-ui-modernization-strategy.md: ยุทธศาสตร์และข้อกำหนดการปรับโฉม UI หน้าบ้านให้สอดคล้องกับระบบหลังบ้าน (CMS)

## 1. วัตถุประสงค์และขอบเขตงาน (Goal & Scope)

ยุทธศาสตร์นี้จัดทำขึ้นเพื่อกำหนดแนวทางการยกระดับและปรับโฉมส่วนแสดงผลเว็บไซต์หน้าบ้าน (**Public Web Front-end**) ให้มีความสวยงาม ทันสมัยระดับพรีเมียม (Modern, Vibrant, Responsive, Smooth Animations) โดย**ไม่มีผลกระทบและรักษาความสอดคล้อง 100% กับระบบบริหารจัดการเนื้อหาหลังบ้าน (CMS Admin ใน `/office/`) และโครงสร้างฐานข้อมูลเดิม (MySQL Database)**

---

## 2. กฎเหล็ก 4 ประการเพื่อความสอดคล้องของระบบ (Alignment Rules)

```
┌─────────────────────────────────────────────────────────────────────────┐
│                    MySQL Database (itetechc_web01)                      │
│                    - ห้ามแก้ไข Schema หรือชื่อคอลัมน์                      │
└────────────────────────────────────┬────────────────────────────────────┘
                                     │
           ┌─────────────────────────┴─────────────────────────┐
           ▼                                                   ▼
┌──────────────────────────────────────┐            ┌──────────────────────────────────────┐
│  CMS Admin Back-end (/office/)       │            │  New Public Front-end (/httpdocs/)   │
│  ----------------------------------  │            │  ----------------------------------  │
│  - ใช้ Bootstrap 3 ใน /bootstrap/   │            │  - ใช้ สไตล์ดีไซน์ใหม่ใน /assets/     │
│  - อัปโหลดรูปภาพเข้า /Photo/         │            │  - ดึงรูปภาพและเนื้อหาจาก /Photo/    │
│  - จัดการข้อมูลตามเวิร์กโฟลว์เดิม      │            │  - แมปตัวแปร PHP แบบ Dynamic 100%    │
└──────────────────────────────────────┘            └──────────────────────────────────────┘
```

### Rule 1: ความสอดคล้องด้านฐานข้อมูล (Database Alignment)
* **ข้อกำหนด:** ห้ามลบ หรือเปลี่ยนชื่อตาราง/คอลัมน์ในฐานข้อมูล MySQL เด็ดขาด
* **เหตุผล:** ระบบหลังบ้าน (`/office/`) จะยังคงบันทึกข้อมูลสินค้า ข่าวสาร ป้ายโฆษณา และการตั้งค่าเข้าตารางเดิม (`product`, `slides`, `web_content`, `catalog`, `fixed`, `suggestion`)

### Rule 2: ความสอดคล้องด้านระบบหลังบ้าน (CMS Admin Alignment)
* **ข้อกำหนด:** ห้ามแก้ไข หรือส่งผลกระทบต่อไฟล์ในโฟลเดอร์ `/office/` และ `/bootstrap/`
* **เหตุผล:** ผู้ดูแลระบบจะยังคงใช้งานระบบ CMS Admin เดิมผ่านอินเทอร์เฟซ Bootstrap 3 ได้อย่างเสถียร 100% โดยไม่ต้องเรียนรู้ระบบใหม่

### Rule 3: ความสอดคล้องด้านตัวแปร PHP และการเชื่อมโยงข้อมูล (PHP Data-Binding Alignment)
* **ข้อกำหนด:** รักษาโครงสร้างคำสั่ง SQL Query (`mysqli_query`), Loop การดึงข้อมูล (`while($row = mysqli_fetch_array)`), และตัวแปร PHP เดิมไว้ทั้งหมด
* **การปรับปรุง:** เปลี่ยนเฉพาะโครงสร้าง HTML/CSS ที่ห่อหุ้มตัวแปร PHP เพื่อนำข้อมูลและรูปภาพจากหลังบ้านมาจัดวางในเลย์เอาต์ใหม่

### Rule 4: การแยกไฟล์ Assets หน้าบ้านอย่างเด็ดขาด (Asset Isolation Alignment)
* **ข้อกำหนด:** สร้างโฟลเดอร์เก็บไฟล์ดีไซน์ใหม่แยกต่างหาก เช่น `httpdocs/assets/` (CSS, JS, Fonts, Images)
* **เหตุผล:** เพื่อไม่ให้ไฟล์ CSS/JS ดีไซน์ใหม่ไปชนหรือตีกับไฟล์ Bootstrap 3 ของระบบหลังบ้าน

---

## 3. ตารางการแมปชิ้นส่วนข้อมูลหลังบ้าน สู่ UI หน้าบ้านใหม่ (Data & UI Component Mapping)

| ชิ้นส่วน UI หน้าบ้านใหม่ (New Component) | ตารางฐานข้อมูล (CMS Table) | ตัวแปร PHP หลัก (PHP Variable) | ที่มาของรูปภาพ / ข้อมูล (CMS Data Source) |
| :--- | :--- | :--- | :--- |
| **Hero Slide Banner** | `slides` | `$row['slides_photo']`, `$row['slides_link']` | รูปภาพสไลด์หน้าแรก อัปโหลดจาก `/office/slides.php` -> เก็บใน `Photo/` |
| **Product Cards & Gallery** | `product`, `product_picture` | `$row['product_photo']`, `$row['product_name']` | รูปสินค้าหลักและรูปประกอบ อัปโหลดจาก `/office/product.php` -> เก็บใน `Photo/` |
| **Category Filter** | `catalog` | `$row['catalog_name']`, `$row['catalog_id']` | หมวดหมู่สินค้า จัดการจาก `/office/catalog.php` |
| **News & Article Cards** | `web_content` | `$row['web_content_topic']`, `$row['web_content_photo']` | เนื้อหาข่าวสาร อัปโหลดจาก `/office/web_content.php` |
| **Contact & Feedback Form** | `suggestion` | `$_POST['suggestion_name']`, `$_POST['suggestion_detail']` | ฟอร์มหน้าบ้านส่งข้อมูลไปประมวลผลที่ `suggestion_update.php` -> บันทึกลง DB -> Admin อ่านได้ที่ `/office/suggestion.php` |
| **Site Branding & Contact Info** | `fixed` | `$fixed['fixed_website']`, `$fixed['fixed_phone']` | ตั้งค่าชื่อเว็บ ที่อยู่ เบอร์โทร จาก `/office/index.php` (การตั้งค่าทั่วไป) |

---

## 4. ลำดับขั้นตอนการดำเนินงาน (Migration Step-by-Step Plan)

1. **Step 1: Setup Isolated Asset Folder**
   - สร้างโฟลเดอร์ `httpdocs/assets/css/`, `httpdocs/assets/js/` สำหรับเก็บระบบสไตล์ใหม่

2. **Step 2: Update Common Layout Templates**
   - ปรับปรุงไฟล์ส่วนกลางหน้าบ้าน (`index_head.php`, `index_navbar.php`, `index_footer.php`) ให้ดึงไฟล์สไตล์ใหม่

3. **Step 3: Modernize Home Page (`index.php`)**
   - ปรับโฉมหน้าแรก นำ Hero Slider, Product Highlights, และ News Feeds มาแสดงผลในเลย์เอาต์ใหม่แบบ Dynamic

4. **Step 4: Modernize Catalog & Product Pages (`product.php` & `product_detail.php`)**
   - ปรับโฉมหน้ารายการสินค้าและหน้าแสดงรายละเอียดสินค้า พร้อมเพิ่มระบบแกลเลอรีรูปภาพแบบพรีเมียม

5. **Step 5: Modernize Content & Contact Pages (`web_content.php` & `contactus.php`)**
   - ปรับโฉมหน้าข่าวสารและฟอร์มติดต่อเรา ให้รองรับการแสดงผลแบบ Responsive บนทุกอุปกรณ์

6. **Step 6: End-to-End Compatibility Testing**
   - ทดสอบทดลองเพิ่ม/แก้ไข/ลบ สินค้า ข่าวสาร และรูปภาพผ่านระบบหลังบ้าน (`/office/`) แล้วตรวจสอบการอัปเดตแสดงผลบน UI หน้าบ้านใหม่
