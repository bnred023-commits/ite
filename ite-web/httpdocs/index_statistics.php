<?
if (trim($_SERVER[HTTP_ACCEPT_LANGUAGE])!='') {

	$statistics_online_session 	= session_id();
	$statistics_online_time 	= time();

	$sql = "select * from statistics_online where statistics_online_session = '$statistics_online_session'";
	$result = mysqli_query($con,$sql);
	$statistics_online_check = mysqli_num_rows($result);

	if($statistics_online_check > 0 ){
		$statistics_online_sql = "UPDATE `statistics_online` SET `statistics_online_time` = '$statistics_online_time' WHERE `statistics_online_session` = '$statistics_online_session'";
		$statistics_online_qr = mysqli_query($con,$statistics_online_sql);
	}
	else{

		$statistics_online_sql = "INSERT INTO `statistics_online` (`statistics_online_session`,`statistics_online_time`) VALUES ('$statistics_online_session','$statistics_online_time')";
		$statistics_online_qr = mysqli_query($con,$statistics_online_sql);

		$statistics_web_date = date('Y-m-d');
		$statistics_web_sql = "INSERT INTO `statistics_web` 
		(`statistics_web_date`,`statistics_web_time`,`statistics_web_ip`, `statistics_web_browser`, `statistics_web_language`) 
		VALUES ('$statistics_web_date',NOW(),'$_SERVER[REMOTE_ADDR] ','$_SERVER[HTTP_USER_AGENT]','$_SERVER[HTTP_ACCEPT_LANGUAGE]')";
		$statistics_web_qr = mysqli_query($con,$statistics_web_sql);
	}
}

?>