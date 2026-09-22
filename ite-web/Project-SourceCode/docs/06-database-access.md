# 06-database-access.md: สถาปัตยกรรมการเข้าถึงฐานข้อมูล

## 1. Connection Management & Security

การจัดการการเชื่อมต่อฐานข้อมูลทั้งหมดในระบบ **ite-web** ถูกทำผ่านไฟล์ส่วนกลางเพียงไฟล์เดียวคือ `httpdocs/TheConnect/TheConnect.php`:

```php
<?php
session_start();

$hostname = "localhost";
$username = "<REDACTED>";
$password = "<REDACTED>";
$database = "<REDACTED>";

$con = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Connection Failed: " . mysqli_connect_error();
} else {
    mysqli_query($con, "SET NAMES UTF8");
}

$mysqli = new mysqli($hostname, $username, $password, $database);
?>
```

> [!IMPORTANT]
> ข้อมูลประจำตัวจริง (Host, Username, Password, Database Name) ถูกปกปิดด้วยคำว่า `<REDACTED>` ตามเกณฑ์ Security & Redaction Standard เพื่อความปลอดภัยของเอกสาร

---

## 2. Data Access Pattern & Database Schema Mapping

ระบบใช้คำสั่ง **Procedural MySQL Native Query** (`mysqli_query`) โดยตรง และแปลงผลลัพธ์ด้วย `mysqli_fetch_array()` / `mysqli_fetch_assoc()` 

### รายการตารางฐานข้อมูลหลักทั้ง 29 ตารางในระบบ (`itetechc_web01`):

| # | ชื่อตาราง (Table Name) | วัตถุประสงค์และการใช้งาน (Description) |
| :-: | :--- | :--- |
| 1 | **`admin`** | เก็บข้อมูลผู้ใช้งานระบบ Admin (Username, Password, Name, Level) |
| 2 | **`admin_degree`** | เก็บข้อมูลระดับสิทธิ์ของผู้ดูแลระบบ |
| 3 | **`admin_remove`** | เก็บประวัติการลบบัญชีผู้ดูแลระบบ |
| 4 | **`advertise`** | เก็บข้อมูลป้ายโฆษณาและตำแหน่งแสดงผล |
| 5 | **`catalog`** | เก็บหมวดหมู่สินค้าหลักและหมวดหมู่ย่อย |
| 6 | **`contactus`** | เก็บข้อมูลการติดต่อและที่อยู่ขององค์กร |
| 7 | **`Device`** | เก็บข้อมูลรายการอุปกรณ์ไอทีและฮาร์ดแวร์ |
| 8 | **`fixed`** | เก็บค่าการตั้งค่าเว็บไซต์ (Title, Keywords, Description, Contact Info) |
| 9 | **`fixed_status`** | เก็บสถานะการเปิด/ปิดระบบของส่วนต่างๆ |
| 10 | **`gallery`** | เก็บอัลบั้มและรูปภาพแกลเลอรี |
| 11 | **`Historylog`** | เก็บประวัติการเข้าใช้งานและกิจกรรมของผู้ใช้ (IP, User-Agent, Action) |
| 12 | **`mainmenu`** | เก็บรายการเมนูหลักของเว็บไซต์ |
| 13 | **`organization`** | เก็บโครงสร้างผังองค์กร |
| 14 | **`pagecontent`** | เก็บเนื้อหาของหน้าเว็บคงที่ (เช่น หน้าเกี่ยวกับเรา) |
| 15 | **`plot`** | เก็บข้อมูลแปลงหรือแผนที่ |
| 16 | **`product`** | เก็บข้อมูลหลักของสินค้า (ชื่อ, ราคา, รายละเอียด, รหัสสินค้า) |
| 17 | **`product_picture`** | เก็บรายการรูปภาพประกอบสินค้า (Foreign Key ผูกกับ `product`) |
| 18 | **`qrcode`** | เก็บข้อมูลและไฟล์ภาพ QR Code |
| 19 | **`slides`** | เก็บรูปภาพและลิงก์สำหรับ Banner สไลด์หน้าแรก |
| 20 | **`social`** | เก็บลิงก์สื่อโซเชียลมีเดียขององค์กร (Facebook, LINE, YouTube) |
| 21 | **`statistics_admin`** | เก็บสถิติการล็อกอินและการทำงานของผู้ดูแลระบบ |
| 22 | **`statistics_online`** | เก็บสถิติจำนวนผู้ใช้งานที่ออนไลน์อยู่ในขณะนั้น |
| 23 | **`statistics_web`** | เก็บสถิติจำนวนผู้เข้าชมเว็บไซต์รายวัน/รายเดือน/รายปี |
| 24 | **`store_photos`** | เก็บรูปภาพร้านค้าและสาขา |
| 25 | **`suggestion`** | เก็บข้อความเสนอแนะและการติดต่อจากผู้ใช้งานหน้าเว็บ |
| 26 | **`web_content`** | เก็บข้อมูลข่าวสาร บทความ และกิจกรรม |
| 27 | **`web_content_picture`** | เก็บรูปภาพประกอบบทความข่าวสาร (Foreign Key ผูกกับ `web_content`) |
| 28 | **`web_product`** | เก็บข้อมูลกลุ่มผลิตภัณฑ์ |
| 29 | **`web_product_picture`** | เก็บรูปภาพกลุ่มผลิตภัณฑ์ |

---

## 3. Lifecycle & Connection Handling

1. **Connection Lifecycle:** เมื่อมีการเรียกใช้หน้าเว็บ PHP ใดๆ ไฟล์ `TheConnect.php` จะถูก include ขึ้นมาเปิด Connection กับ MySQL ในช่วงเริ่มต้นสคริปต์
2. **Query Execution:** คำสั่ง SQL ทุกคำสั่งจะทำงานบน Resource Connection `$con` หรือ `$mysqli`
3. **Implicit Connection Close:** เมื่อสคริปต์ PHP ทำงานจนจบไฟล์ PHP Engine จะทำการคืน Memory และปิดการเชื่อมต่อฐานข้อมูลโดยอัตโนมัติ

---

## 4. Database Security & Anti-Patterns Checklist

> [!WARNING]
> **Database Security Recommendations:**
> 1. **Prepared Statements:** ควรอัปเกรดคำสั่ง `mysqli_query` ในทุกจุดให้เป็น Prepared Statements (`mysqli_stmt`) เพื่อป้องกัน SQL Injection
> 2. **Password Hashing:** รหัสผ่านในตาราง `admin` ควรถ่ายโอนจากการเก็บ Plaintext ไปใช้ฟังก์ชันมาตรฐาน `password_hash()` และ `password_verify()`
> 3. **Database Driver Modernization:** ควรพิจารณาปรับเปลี่ยนไปใช้ **PDO (PHP Data Objects)** เพื่อรองรับ Transaction Management และการเชื่อมต่อที่ปลอดภัยยิ่งขึ้น
