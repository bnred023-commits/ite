<?
function input_all($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES);
	return $data;
}
function teeth($teeth) {
	$teeth = trim($teeth);
	$teeth= str_replace("'","&#39;",$teeth);
	$teeth= str_replace("\"","&quot;",$teeth);
	return $teeth;
}
function function_teeth($teeth) {
	$teeth = trim($teeth);
	$teeth= str_replace("'","&#39;",$teeth);
	$teeth= str_replace("\"","&quot;",$teeth);
	return $teeth;
}
function function_review($review) {
	$review = trim($review);
	$review = str_replace("target=\"_blank\"","",$review);
	$review = str_replace("<a","<a target=_blank ",$review);
	return $review;
}
function function_link($link) {
	$link = trim($link);
	$link= str_replace("'","&#39;",$link);
	$link= str_replace("\"","&quot;",$link);
	$link= str_replace("http://","",$link);
	$link= str_replace("https://","",$link);
	return $link;
}
function function_youtube($youtube) {
	$youtube = trim($youtube);
	$cut = strrchr($youtube,"&");
	$youtube = str_replace($cut,"",$youtube);
	$youtube = str_replace("youtu.be","youtube.com/embed",$youtube);
	$youtube = str_replace("watch?v=","embed/",$youtube);
	return $youtube;
}
function function_page($page) {
	$page = trim($page);
	$page = str_replace("  ","-",$page);
	$page = str_replace(" ","-",$page);
	$page = str_replace("+","",$page);
	$page = str_replace(".","",$page);
	$page = str_replace("?","",$page);
	$page = str_replace("'","",$page);
	$page = str_replace(":","",$page);
	$page = str_replace("--","-",$page);
	$page= str_replace("'","-",$page);
	$page = str_replace("\"","",$page);
	$page = trim($page);
	$page = strtolower($page);
	return $page;
}
function random_string(){
	$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	$randstring = '';
	for ($i = 1; $i < 4; $i++) {
		$randstring .= $characters[rand(0, strlen($characters))];
	}
	return $randstring;
}
function resize_imagejpg($photo) {
	$max_width = 400;
	list($width, $height) = getimagesize($photo);
	$percent = $max_width / $width;
	$w = $width * $percent;
	$h = $height * $percent;
	$src = imagecreatefromjpeg($photo);
	$dst = imagecreatetruecolor($w, $h);
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
	return $dst;
}
function resize_imagepng($photo) {
	$max_width = 400;
	list($width, $height) = getimagesize($photo);
	$percent = $max_width / $width;
	$w = $width * $percent;
	$h = $height * $percent;
	$src = imagecreatefrompng($photo);
	$dst = imagecreatetruecolor($w, $h);
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
	return $dst;
}
function resize_imagegif($photo) {
	$max_width = 400;
	list($width, $height) = getimagesize($photo);
	$percent = $max_width / $width;
	$w = $width * $percent;
	$h = $height * $percent;
	$src = imagecreatefromgif($photo);
	$dst = imagecreatetruecolor($w, $h);
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
	return $dst;
}
function min_resize($table_photo,$table) {
	if(strchr($table_photo,".")==".JPG" || strchr($table_photo,".")==".jpg"){
		$img = resize_imagejpg('../Files/'.$table.'_photo/'.$table_photo.'');
		imagejpeg($img, '../Files/'.$table.'_min/'.$table_photo.'');
	}
	else if(strchr($table_photo,".")==".PNG" || strchr($table_photo,".")==".png"){
		$img = resize_imagepng('../Files/'.$table.'_photo/'.$table_photo.'');
		imagepng($img, '../Files/'.$table.'_min/'.$table_photo.'');
	}
	else if(strchr($table_photo,".")==".Gif" || strchr($table_photo,".")==".gif"){
		$img = resize_imagegif('../Files/'.$table.'_photo/'.$table_photo.'');
		imagegif($img, '../Files/'.$table.'_min/'.$table_photo.'');
	}
	else{
		copy('../Files/'.$table.'_photo/'.$table_photo.'','../Files/'.$table.'_min/'.$table_photo.'');
	}
}
$dayTH = ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'];
$monthTH = [null,'มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'];
$monthTH_brev = [null,'ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
	global $dayTH,$monthTH;   
	$thai_date_return = date("j",$time);   
	$thai_date_return.=" ".$monthTH[date("n",$time)];   
	$thai_date_return.= " ".(date("Y",$time)+543);   
	$thai_date_return.= " เวลา ".date("H:i:s",$time);
	return $thai_date_return;   
} 
function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4
	global $dayTH,$monthTH_brev;   
	$thai_date_return = date("j",$time);   
	$thai_date_return.=" ".$monthTH_brev[date("n",$time)];   
	$thai_date_return.= " ".(date("Y",$time)+543);   
	$thai_date_return.= " ".date("H:i:s",$time);
	return $thai_date_return;   
} 
function thai_date_short($time){   // 19  ธ.ค. 2556a
	global $dayTH,$monthTH_brev;   
	$thai_date_return = date("j",$time);   
	$thai_date_return.=" ".$monthTH_brev[date("n",$time)];   
	$thai_date_return.= " ".(date("Y",$time)+543);   
	return $thai_date_return;   
} 
function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
	global $dayTH,$monthTH;   
	$thai_date_return = date("j",$time);   
	$thai_date_return.=" ".$monthTH[date("n",$time)];   
	$thai_date_return.= " ".(date("Y",$time)+543);   
	return $thai_date_return;   
} 
function thai_date_short_number($time){   // 19-12-56
	global $dayTH,$monthTH;   
	$thai_date_return = date("d",$time);   
	$thai_date_return.="-".date("m",$time);   
	$thai_date_return.= "-".substr((date("Y",$time)+543),-2);   
	return $thai_date_return;   
}
function displaydate ($x) {
	$date_m=array ("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
	$date_array=explode("-",$x);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];
	$m=$date_m[$m];
	$displaydate="$d $m $y";
	return $displaydate;
}

?>


