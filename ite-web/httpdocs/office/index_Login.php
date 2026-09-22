<?
include '../TheConnect/TheConnect.php';
if (trim($_SESSION[login_admin_id])!=""&&isset($_SESSION[login_admin_id])) {
  $login_admin_SL   = " SELECT * FROM admin WHERE admin_id = '$_SESSION[login_admin_id]' ";
  $login_admin_QR   =  mysqli_query($con,$login_admin_SL);
  $login_admin    =  mysqli_fetch_array($login_admin_QR);
  
}
include 'index_function.php'; 

if($_POST['admin_user']!="" && $_POST['admin_pass']!=""){
  $login_sql    = "SELECT * FROM admin WHERE admin_user = '$_POST[admin_user]' AND admin_pass = '$_POST[admin_pass]' ";
  $login_qr     = mysqli_query($con,$login_sql)  ;
  if(mysqli_num_rows($login_qr)>0){
    $login_admin=mysqli_fetch_array($login_qr);
    $_SESSION[login_admin_id] = $login_admin[admin_id];

    $admin_statistics_SL = " SELECT * FROM admin WHERE admin_id = '$_SESSION[login_admin_id]'";
    $admin_statistics_QR = mysqli_query($con,$admin_statistics_SL);
    $admin_statistics  = mysqli_fetch_array($admin_statistics_QR);

    $statistics_admin_detail = "เข้าสู่ระบบ";
    $statistics_admin_date = date('Y-m-d');
    $statistics_admin_save = " ".$admin_statistics['admin_user']." | ".$admin_statistics['admin_name']." | ".$admin_statistics['admin_pass']." ";

    $statistics_admin_sql = "INSERT INTO `statistics_admin` 
    (`statistics_admin_save`,`admin_id`,`statistics_admin_detail`,`statistics_admin_date`,`statistics_admin_time`,`statistics_admin_ip`, `statistics_admin_browser`, `statistics_admin_language`) 
    VALUES
    ('$statistics_admin_save','$_SESSION[login_admin_id]','$statistics_admin_detail','$statistics_admin_date',NOW(),'$_SERVER[REMOTE_ADDR] ','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]')";
    $statistics_admin_qr = mysqli_query($con,$statistics_admin_sql);

    $HistorylogIP = $_SERVER[REMOTE_ADDR];
    $HistorylogAgent = $_SERVER[HTTP_USER_AGENT];
    $Historyloglanguage = $_SERVER[HTTP_ACCEPT_LANGUAGE];
    $HistorylogActivities = 'ล๊อกอิน';
    $HistorylogUser = $admin_statistics['admin_user'];

    $Historylog      = "INSERT INTO `Historylog` (`HistorylogID`, `HistorylogDate`, `HistorylogTime`, `HistorylogIP`, `HistorylogAgent`, `Historyloglanguage`, `HistorylogActivities`, `HistorylogUser`) VALUES (NULL, NOW(), NOW(), '$HistorylogIP', '$HistorylogAgent', '$Historyloglanguage', '$HistorylogActivities', '$HistorylogUser');";
    $HistorylogQuery = mysqli_query($con,$Historylog);
    if (!$HistorylogQuery) {
      echo"<script>alert('HistorylogQuery');</script>";
    }




    echo"<script> alert('เข้าสู่ระบบสำเร็จ'); window.location='index.php';  </script>";
    
  }
  else{
    echo"<script>alert('ชื่อเข้าใช้ หรือ รหัสผ่านไม่ถูกต้อง'); window.history.back(); </script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>

  <? include 'index_Head.php';?>
</head>
<body>
  <div class="col-md-5 col-sm-7 col-centered" style="padding-top:10vh; height:50vh;">
    <div class="panel panel-default no-border boxsha6">
      <div class="panel-heading no-border">
        <h4><b><? echo $fixed[fixed_website]; ?></b> | admin </h4>
      </div>
      <div class="panel-body no-border">
        <form class="form-horizontal"   method="post" >
          <div class="form-group">
            <label class="control-label col-md-3 input-lg" >ชื่อเข้าใช้  </label>
            <div class="col-md-9">
              <input type="text" class="form-control input-lg" placeholder=" ชื่อเข้าใช้ / username " name="admin_user" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 input-lg" >รหัสผ่าน  </label>
            <div class="col-md-9">
              <input type="password" class="form-control input-lg" id="pwd" placeholder=" รหัสผ่าน / password " name="admin_pass" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <button type="submit" name="SubmitLogin" class="btn btn-primary btn-lg">
                <span class="glyphicon glyphicon-log-in"></span>
                เข้าสู่ระบบ
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
