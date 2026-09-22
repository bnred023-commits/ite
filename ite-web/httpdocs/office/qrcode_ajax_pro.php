<?php 

include '../TheConnect/TheConnect.php';

$position = $_POST['position'];

$qrcode_sort_i=1;
foreach($position as $k=>$v){
    $sql = "Update qrcode SET qrcode_sort=".$qrcode_sort_i." WHERE qrcode_id=".$v;
    $mysqli->query($sql);

	$qrcode_sort_i++;
}


?>