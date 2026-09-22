# 01-project-architecture.md: โครงสร้างสถาปัตยกรรมหลักและ Dependencies

## 1. High-Level Architecture
ระบบ **ite-web** ถูกพัฒนาด้วยสถาปัตยกรรม **Procedural Native PHP Monolithic Web Architecture** ร่วมกับระบบจัดการฐานข้อมูล **MySQL / MariaDB** และใช้ **Bootstrap Framework** ในการจัดการส่วนแสดงผล (Presentation Layer) 

* **Architecture Pattern:** Monolithic Web Application (Procedural Style)
* **Primary Language / Runtime:** PHP (Native Procedural Scripting)
* **Web Server Root:** `httpdocs/`
* **Database Engine:** MySQL / MariaDB (utf8 / utf8mb4)
* **Database Access Client:** PHP `mysqli` Extension
* **Frontend Core:** HTML5, CSS3, JavaScript, jQuery, Bootstrap Framework

---

## 2. Dependency Matrix

| Package / Library Name | Version / Spec | Category | Used By | Purpose |
| :--- | :--- | :--- | :--- | :--- |
| **PHP `mysqli`** | Native PHP Extension | Database Driver | `httpdocs/TheConnect/TheConnect.php`, All Module Files | เชื่อมต่อและจัดการคำสั่ง SQL Query บนฐานข้อมูล MySQL |
| **Bootstrap** | v3.x / v4.x (Static Assets) | Frontend UI Framework | `httpdocs/bootstrap/`, `httpdocs/office/` | จัดโครงสร้าง Layout, Grid System และส่วนประกอบ UI |
| **jQuery** | Native JS Library | Frontend JavaScript | `httpdocs/bootstrap/jQuery.js`, All View Templates | จัดการ DOM Manipulation, Event Handling และ AJAX Request |
| **CKEditor** | v4.x | Rich Text Editor Component | `httpdocs/bootstrap/ckeditor/`, `httpdocs/office/` | สำหรับพิมพ์และแก้ไขข้อความแบบ HTML ในส่วน Admin |
| **jQuery UI** | Static Asset | UI Component | `httpdocs/bootstrap/jquery-ui.min.js` | ส่วนเสริมอินเทอร์เฟซผู้ใช้ เช่น Datepicker หรือ Drag&Drop |

---

## 3. Call-Flow & Data Direction

การไหลของข้อมูลในระบบเริ่มต้นจากผู้ใช้ส่งคำสั่งผ่าน HTTP Request เข้ามายังไฟล์สคริปต์ PHP แต่ละหน้าโดยตรง โดยไม่มีการผ่าน Routing Framework กลาง:

```
[User Browser / Client]
       │
       ▼  HTTP GET / POST
[PHP Controller Script] ── (e.g. httpdocs/index.php or httpdocs/office/product.php)
       │
       ├─► include '../TheConnect/TheConnect.php'
       │        │
       │        └─► mysqli_connect() ──► [MySQL Database Engine]
       │
       ├─► Execute Raw SQL Query (mysqli_query)
       │
       └─► Fetch Array & Render View (HTML + Bootstrap + JS Response)
```

---

## 4. Evaluation & Risk Assessment

### ข้อดี (Advantages)
* **ความเรียบง่าย:** ไม่ต้องพึ่งพาระบบ Build Pipeline หรือ Package Manager Complex Build Steps ทำให้สามารถ Deploy หรือแก้ไขบน Server ได้ทันที
* **Performance:** ใช้ Native PHP Scripting ทำให้การประมวลผลคำสั่งมี Overhead ต่ำ

### ข้อเสียและจุดที่ต้องระมัดระวัง (Risks & Anti-Patterns)

> [!WARNING]
> **Security Risk & Tight Coupling Notice:**
> 1. **SQL Injection Vulnerability:** มีการเขียน raw SQL แบบต่อสตริงโดยตรง (Concatenation) โดยไม่ได้ใช้ Prepared Statements (`mysqli_prepare`)
> 2. **Lack of MVC Separation:** โค้ดส่วนประมวลผล Business Logic, คำสั่ง SQL Query และโค้ดส่วนแสดงผล HTML ถูกเขียนปะปนอยู่ในไฟล์เดียวกัน ทำให้ยากต่อการเขียน Unit Test และบำรุงรักษาในระยะยาว
> 3. **Session & Plaintext Security:** บางจุดมีการจัดเก็บและบันทึกข้อมูลรหัสผ่านในลักษณะ Plaintext หรือไม่มีการ Hash ก่อนบันทึกลงใน History Log
