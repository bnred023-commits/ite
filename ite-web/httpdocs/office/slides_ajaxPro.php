<?php 

include '../TheConnect/TheConnect.php';

$position = $_POST['position'];

$slides_sort_i=1;
foreach($position as $k=>$v){
    $sql = "Update slides SET slides_Sort=".$slides_sort_i." WHERE slides_id =".$v;
    $mysqli->query($sql);

	$slides_sort_i++;
}


?>