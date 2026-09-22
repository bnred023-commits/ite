<?php include 'index_IncludeAdmin.php';  ?>

<?php

if (isset($_GET[pagecontent_id])){
	$_SESSION[pagecontent_id] =  $_GET[pagecontent_id];
}
$pagecontent_id =   $_SESSION[pagecontent_id] ;

$pagecontent_Del ="DELETE FROM `pagecontent` WHERE pagecontent_id = '$pagecontent_id' ";
$pagecontent_Qurey  = mysqli_query($con,$pagecontent_Del);

if($pagecontent_Qurey) {
	echo"<script>  window.location='pagecontent.php?DELETE'; </script>";
}
else{
	echo"<script>alert('เกิดข้อผิดพลาด'); window.history.back(); </script>";
}

?>
<html>
<head>
	<?php include 'index_link.php'; ?>
</head>
<body>

</body>
</html>