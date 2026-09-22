
<div class="list-group">
	<b>
		หน้าแรก
	</b>
	<a href="index.php" class="list-group-item <? if ($_SESSION['page'] =='index.php') { echo 'active';} ?>">
		ข้อมูลเว็บไซต์เบื้องต้น
	</a>
	
	<a href="slides.php" class="list-group-item <? if ($_SESSION['page'] =='slides.php') { echo 'active';} ?>">
		สไลด์ 
	</a>
	<!--  -->
	<a href="home.php" class="list-group-item <? if ($_SESSION['page'] =='home.php') { echo 'active';} ?>">
		ข้อความแนะนำหน้าแรก
	</a> 
	<!--  -->
	<a href="suggestion.php" class="list-group-item <? if ($_SESSION['page'] =='suggestion.php') { echo 'active';} ?>">
		หัวข้อแนะนำ
	</a> 
	<!--  -->
</div>


<b>
	เมนูหลัก
</b>
<div class="list-group">
	<a href="mainmenu.php" class="list-group-item <? if ($_SESSION['page'] =='mainmenu.php') { echo 'active';} ?>">
		จัดการเมนูหลัก 
	</a>
	<!--  -->
	<?
	$mainmenu_nav_SL = " SELECT * FROM mainmenu ORDER BY mainmenu_sort asc ";
	$mainmenu_nav_QR 	= mysqli_query($con,$mainmenu_nav_SL);
	while ($mainmenu_nav 	= mysqli_fetch_array($mainmenu_nav_QR)) {
		?>
		<a href="mainmenu_one.php?mainmenu_id=<?php echo $mainmenu_nav[mainmenu_id]; ?>" class="list-group-item <? if ($_SESSION['page'] =='mainmenu_id='.$mainmenu_nav[mainmenu_id]) { echo 'active';} ?>">
			<? echo $mainmenu_nav['mainmenu_name']; ?> 
		</a>
		<?
	}
	?>
	<a href="contact.php" class="list-group-item <? if ($_SESSION['page'] =='contact.php') { echo 'active';} ?>">
		ติดต่อเรา
	</a>
	<!--  -->
</div>


<b>
	หน้าเพจ & ผลิตภัณฑ์  
</b>
<div class="list-group">
	<a href="web_content.php" class="list-group-item <? if ($_SESSION['page'] =='web_content.php') { echo 'active';} ?>">
		หน้าเพจหรือเมนูย่อย
	</a>
	<a href="web_product.php" class="list-group-item <? if ($_SESSION['page'] =='web_product.php') { echo 'active';} ?>">
		ผลิตภัณฑ์หรือบริการ
	</a>
	<a href="catalog.php" class="list-group-item <? if ($_SESSION['page'] =='catalog.php') { echo 'active';} ?>">
		หมวดหมู่
	</a>
</div>


<div class="list-group">
	<a href="social.php" class="list-group-item <? if ($_SESSION['page'] =='social.php') { echo 'active';} ?>">
		ข้อมูลติดต่อสอบถาม 
	</a>
	<a href="qrcode.php" class="list-group-item <? if ($_SESSION['page'] =='qrcode.php') { echo 'active';} ?>">
		คิวอาร์โค้ด 
	</a>
	<a href="tagfooter.php" class="list-group-item <? if ($_SESSION['page'] =='tagfooter.php') { echo 'active';} ?>">
		ข้อความล่างสุดของเว็บไซต์
	</a>
	<a href="tag_head.php" class="list-group-item <? if ($_SESSION['page'] =='tag_head.php') { echo 'active';} ?>">
		แท็ก head
	</a>
	<a href="tag_body.php" class="list-group-item <? if ($_SESSION['page'] =='tag_body.php') { echo 'active';} ?>">
		แท็ก body
	</a>
	<a href="statistic.php" class="list-group-item <? if ($_SESSION['page'] =='statistic.php') { echo 'active';} ?>">
		สถิติการเข้าชม
	</a>
	<a href="store_photos.php" class="list-group-item <? if ($_SESSION['page'] =='store_photos.php') { echo 'active';} ?>">
		ฝากไฟล์รูปภาพ 
	</a>
	<a href="web_admin.php" class="list-group-item <? if ($_SESSION['page'] =='web_admin.php') { echo 'active';} ?>">
		เปลี่ยนรหัส
	</a>
</div>



