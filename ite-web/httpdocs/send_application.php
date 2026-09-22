<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "apidoh.co@gmail.com";
    $subject = "สมัครงาน - บริษัท รักษาความปลอดภัย จี.พี.เอส จำกัด";

    // รับข้อมูลจากฟอร์ม
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $position = strip_tags(trim($_POST["position"]));
    $message = strip_tags(trim($_POST["message"]));

    // ตรวจสอบข้อมูลที่จำเป็น
    if (empty($name) || empty($email) || empty($phone) || empty($position) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้อง";
        exit;
    }

    // สร้างเนื้อหาอีเมล
    $email_content = "ชื่อ-นามสกุล: $name\n";
    $email_content .= "อีเมล: $email\n";
    $email_content .= "เบอร์โทรศัพท์: $phone\n";
    $email_content .= "ตำแหน่งที่สมัคร: $position\n";
    $email_content .= "รายละเอียดเพิ่มเติม:\n$message\n";

    // ตั้งค่า headers อีเมล
    $headers = "From: $name <$email>";

    // ส่งอีเมล
    if (mail($to, $subject, $email_content, $headers)) {
        echo "ส่งใบสมัครเรียบร้อยแล้ว ขอบคุณที่สนใจร่วมงานกับเรา";
    } else {
        echo "เกิดข้อผิดพลาดในการส่งใบสมัคร กรุณาลองใหม่อีกครั้ง";
    }
} else {
    echo "กรุณาส่งข้อมูลผ่านฟอร์มสมัครงานเท่านั้น";
}
?>
