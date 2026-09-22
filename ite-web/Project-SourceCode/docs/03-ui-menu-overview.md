# 03-ui-menu-overview.md: ภาพรวมเมนู UI

## 1. User Web Interface (ระบบสำหรับผู้ใช้งานทั่วไป)

| หน้าจอ / ไฟล์ที่เกี่ยวข้อง | วัตถุประสงค์ (Business Context) | กระบวนการทำงานหลัก (Process Flow) | รายการฟังก์ชันภายในหน้า (Actions / Buttons) |
| :--- | :--- | :--- | :--- |
| **หน้าแรก**<br>`httpdocs/index.php` | แสดงข้อมูลภาพรวมบริษัท, Banner สไลด์, สินค้าแนะนำ, และข้อเสนอแนะ | โหลดข้อมูล Banner จาก `slides`, แสดงสินค้าแนะนำจาก `product` และหมวดหมู่จาก `catalog` | `index_slides.php` (สไลด์ภาพ), `index_panel_product.php` (กล่องสินค้า), Link รายละเอียดสินค้า |
| **เกี่ยวกับเรา**<br>`httpdocs/aboutus.php` | แสดงรายละเอียดประวัติความเป็นมาและโครงสร้างองค์กร | ดึงข้อมูลบทความเกี่ยวกับองค์กรจากตาราง `pagecontent` | ปุ่มดูรายละเอียดเพิ่มเติม, โครงสร้างองค์กร |
| **รายการสินค้า**<br>`httpdocs/product.php` | แสดงรายการสินค้าตามหมวดหมู่ | รับค่า `catalog_id` ผ่าน GET -> ค้นหาสินค้าจากตาราง `product` -> แสดงผลแบบ Grid/List พร้อม Paging | ตัวกรองหมวดหมู่สินค้า, ปุ่มดูรายละเอียด (`product_detail.php`), ระบบเปลี่ยนหน้า (`index_pagenum.php`) |
| **รายละเอียดสินค้า**<br>`httpdocs/product_detail.php` | แสดงรายละเอียดเชิงลึกของสินค้า | รับค่า `product_id` ผ่าน GET -> ดึงข้อมูลสินค้าและรูปภาพประกอบจาก `product_picture` | ปุ่มดาวน์โหลดไฟล์เอกสาร, ปุ่มสั่งซื้อ/สอบถามข้อมูล, แกลเลอรีรูปภาพสินค้า |
| **ข่าวสารและบทความ**<br>`httpdocs/web_content.php` | แสดงข่าวประชาสัมพันธ์และบทความความรู้ | ดึงข้อมูลข่าวสารจากตาราง `web_content` เรียงลำดับตามวันที่ | ปุ่มดูเนื้อหาข่าวสาร (`web_content_detail.php`), ระบบแบ่งหน้า |
| **บริษัทในเครือ**<br>`httpdocs/group_company.php` | แสดงรายชื่อและรายละเอียดบริษัทในเครือ | ดึงข้อมูลจากตาราง `mainmenu` หรือ `pagecontent` ที่เกี่ยวข้อง | ปุ่มเปิดลิงก์บริษัทในเครือ (`group_company_detail.php`) |
| **ติดต่อเรา**<br>`httpdocs/contactus.php` | ให้ผู้ใช้ส่งข้อความสอบถามหรือข้อเสนอแนะ | ผู้ใช้กรอกฟอร์ม -> กด Submit -> บันทึกข้อมูลลงตาราง `suggestion` และ `contactus` | ฟอร์มกรอกข้อความ, ปุ่มส่งข้อมูล (`btn-submit`), Google Maps Embed |
| **ค้นหาข้อมูล**<br>`httpdocs/search.php` | ค้นหาสินค้าและบทความทั่วทั้งเว็บไซต์ | รับคำค้นหา (`keyword`) -> ค้นหาในตาราง `product` และ `web_content` ด้วย SQL `LIKE` | ช่องกรอกคำค้นหา, ปุ่มค้นหา, ลิงก์ไปยังผลลัพธ์การค้นหา |

---

## 2. Admin Web Interface (ระบบสำหรับผู้ดูแลระบบ)

| หน้าจอ / ไฟล์ที่เกี่ยวข้อง | วัตถุประสงค์ (Business Context) | กระบวนการทำงานหลัก (Process Flow) | รายการฟังก์ชันภายในหน้า (Actions / Buttons) |
| :--- | :--- | :--- | :--- |
| **เข้าสู่ระบบ**<br>`httpdocs/office/index_Login.php` | ยืนยันตัวตนสำหรับผู้ดูแลระบบ | กรอก Username/Password -> ตรวจสอบกับตาราง `admin` -> สร้าง Session และบันทึก `Historylog` | Form Input (`admin_user`, `admin_pass`), ปุ่มเข้าสู่ระบบ (`SubmitLogin`) |
| **หน้าแรก Admin**<br>`httpdocs/office/index.php` | สรุปสถิติภาพรวมของระบบ | ตรวจสอบ Session -> แสดง Dashboard สรุปจำนวนผู้เข้าชมและข้อมูลล่าสุด | เมนูลัดจัดการระบบ, สรุปสถิติผู้เข้าชมเว็บไซต์ |
| **จัดการผู้ดูแลระบบ**<br>`httpdocs/office/admin.php` | เพิ่ม/แก้ไข/ลบ บัญชีผู้ดูแลระบบ | แสดงรายการจากตาราง `admin` -> ดำเนินการเพิ่ม แก้ไข หรือลบ | ปุ่มเพิ่มผู้ใช้ (`admin_add.php`), ปุ่มแก้ไข (`admin_update.php`), ปุ่มลบ (`admin_del.php`) |
| **จัดการสินค้า**<br>`httpdocs/office/product.php` | เพิ่ม/แก้ไข/ลบ/อัปโหลดภาพสินค้า | แสดงรายการสินค้า -> เชื่อมต่อไปยังฟอร์มเพิ่ม/แก้ไข พร้อมอัปโหลดรูปภาพ | ปุ่มเพิ่มสินค้า (`product_add.php`), ปุ่มแก้ไข (`product_update.php`), ปุ่มลบ (`product_del.php`) |
| **จัดการแคตตาล็อก**<br>`httpdocs/office/catalog.php` | จัดการหมวดหมู่สินค้า | แสดงและแก้ไขหมวดหมู่สินค้าในตาราง `catalog` | ปุ่มเพิ่มหมวดหมู่ (`catalog_add.php`), ปุ่มแก้ไข (`catalog_update.php`), ปุ่มลบ (`catalog_del.php`) |
| **จัดการเนื้อหาเว็บ/ข่าวสาร**<br>`httpdocs/office/web_content.php` | จัดการข่าวสาร บทความ และภาพประกอบ | เพิ่ม/แก้ไข ข่าวสารในตาราง `web_content` พร้อมใช้งาน CKEditor | ปุ่มเพิ่มบทความ (`web_content_add.php`), ปุ่มจัดการรูปภาพ, ปุ่มลบ |
| **จัดการภาพสไลด์**<br>`httpdocs/office/slides.php` | จัดการภาพ Banner สไลด์หน้าแรก | เพิ่มและอัปโหลดภาพสไลด์ลงในตาราง `slides` | ปุ่มอัปโหลดรูปสไลด์ (`slides_add.php`), ปุ่มเปิด/ปิดการแสดงผล, ปุ่มลบ |
| **จัดการอุปกรณ์ IT**<br>`httpdocs/office/Device.php` | จัดการรายการ Device / ฮาร์ดแวร์ | ดำเนินการ CRUD กับตาราง `Device` | ปุ่มเพิ่ม Device (`Device_Add.php`), ปุ่มแก้ไข (`Device_Update.php`), ปุ่มลบ (`Device_Del.php`) |
| **กล่องข้อเสนอแนะ**<br>`httpdocs/office/suggestion.php` | ตรวจสอบข้อความจากผู้ใช้ฝั่งหน้าเว็บ | อ่านและลบข้อความที่ถูกส่งมาจากหน้า `contactus.php` | ปุ่มอ่านข้อความ (`suggestion_one.php`), ปุ่มลบข้อความ (`suggestion_del.php`) |
| **รายงานสถิติและ Log**<br>`httpdocs/office/statistic.php` | ตรวจสอบประวัติการใช้งานและล็อกอิน | ดึงข้อมูลจากตาราง `statistics_admin` และ `Historylog` | ปุ่มกรองช่วงเวลา, ปุ่มแสดงรายละเอียด IP และ Browser Log |
