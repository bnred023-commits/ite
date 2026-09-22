<?php 

include '../TheConnect/TheConnect.php';

$position = $_POST['position'];

$social_sort_i=1;
foreach($position as $k=>$v){
    $sql = "Update social SET social_sort=".$social_sort_i." WHERE social_id=".$v;
    $mysqli->query($sql);

	$social_sort_i++;
}


?>