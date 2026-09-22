<?php
include 'index_IncludeAdmin.php'; 

$admin_statistics_SL = " SELECT * FROM admin WHERE admin_id = '$_SESSION[login_admin_id]'";
$admin_statistics_QR = mysqli_query($con,$admin_statistics_SL);
$admin_statistics  = mysqli_fetch_array($admin_statistics_QR);

$statistics_admin_detail = "ออกจากระบบ";
$statistics_admin_date = date('Y-m-d');
$statistics_admin_save = " ".$admin_statistics['admin_user']." | ".$admin_statistics['admin_name']." | ".$admin_statistics['admin_pass']." ";

$statistics_admin_sql = "INSERT INTO `statistics_admin` 
(`statistics_admin_save`,`admin_id`,`statistics_admin_detail`,`statistics_admin_date`,`statistics_admin_time`,`statistics_admin_ip`, `statistics_admin_browser`, `statistics_admin_language`) 
VALUES
('$statistics_admin_save','$_SESSION[login_admin_id]','$statistics_admin_detail','$statistics_admin_date',NOW(),'$_SERVER[REMOTE_ADDR] ','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]')";
$statistics_admin_qr = mysqli_query($con,$statistics_admin_sql);

unset($_SESSION[login_admin_id]);
echo"<script>  window.location='index_Login.php';  </script>";
?>
