# 04-ui-standards.md: มาตรฐาน UI Engineering Standards

## 1. Framework & Grid System

ระบบ **ite-web** ใช้องค์ประกอบส่วนแสดงผลมาตรฐานจาก **Bootstrap 3 / 4 Framework** ร่วมกับ HTML5/CSS3 โดยมีมาตรฐานการจัดวางโครงสร้างดังนี้:

* **Grid System:** ใช้ระบบ 12-Column Responsive Grid (`.col-md-*`, `.col-sm-*`, `.col-xs-*`)
* **Container Bounds:** 
  * หน้าจอผู้ใช้งานทั่วไป: ใช้ `<div class="container">` กำหนดความกว้างสูงสุดของพื้นที่แสดงผล
  * หน้าจอผู้ดูแลระบบ: ใช้ `<div class="container-fluid">` หรือ `<div class="col-md-12">` เพื่อขยายพื้นที่การทำงานเต็มหน้าจอ
* **Font & Typography:** ใช้ฟอนต์มาตรฐานภาษาไทย (เช่น Tahoma, DB ThaiText หรือ Kanit) กำหนดผ่าน CSS หลัก

---

## 2. Component Blueprints (ตัวอย่างโครงสร้าง UI)

### A. Data Table Blueprint (ตารางแสดงผลข้อมูล)
```html
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th width="5%" class="text-center">ลำดับ</th>
        <th width="40%">ชื่อรายการ</th>
        <th width="20%" class="text-center">วันที่บันทึก</th>
        <th width="35%" class="text-center">จัดการ</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($query)) { ?>
      <tr>
        <td class="text-center"><?php echo $row['id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td class="text-center"><?php echo $row['created_at']; ?></td>
        <td class="text-center">
          <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
            <span class="glyphicon glyphicon-pencil"></span> แก้ไข
          </a>
          <a href="del.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบ?');">
            <span class="glyphicon glyphicon-trash"></span> ลบ
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
```

### B. Standard Form Blueprint (ฟอร์มบันทึกข้อมูล)
```html
<form class="form-horizontal" action="product_add.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">ชื่อสินค้า <span class="text-danger">*</span></label>
    <div class="col-sm-10">
      <input type="text" name="product_name" class="form-control" required placeholder="กรอกชื่อสินค้า">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">รายละเอียด</label>
    <div class="col-sm-10">
      <textarea name="product_detail" id="editor1" class="form-control" rows="5"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="btn_save" class="btn btn-primary">
        <span class="glyphicon glyphicon-save"></span> บันทึกข้อมูล
      </button>
      <a href="product.php" class="btn btn-default">ยกเลิก</a>
    </div>
  </div>
</form>
```

---

## 3. UI Best Practices & Conventions

1. **Confirmation Alerts:** การลบข้อมูลทุกครั้งต้องใส่อีเวนต์ JavaScript Confirmation:
   `onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');"`
2. **Form Validation:** บังคับใช้ attribute `required` บนฟิลด์สำคัญเพื่อป้องกันการส่งค่าว่าง
3. **Rich Text Editing:** หากเป็นฟิลด์รายละเอียดบทความหรือสินค้า ให้ผูก ID ของ Textarea เข้ากับ **CKEditor** (`CKEDITOR.replace('editor1');`)
4. **Glyphicons & Visual Indicators:** ใช้ Glyphicons มาตรฐานของ Bootstrap ในปุ่มควบคุม (เช่น `glyphicon-plus`, `glyphicon-pencil`, `glyphicon-trash`, `glyphicon-search`) เพื่อสื่อความหมายของปุ่มให้ชัดเจน
