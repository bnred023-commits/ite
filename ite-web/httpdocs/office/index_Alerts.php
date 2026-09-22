<div class="row">
	<?
	if (isset($_GET[INSERT])){
		?>
		<div class="col-md-12">
			<div class="alert alert-success">
				<a href="#"  class="close" data-dismiss="alert" aria-label="close"> &times; </a>
				<strong>เพิ่มเรียบร้อยแล้ว</strong> 
			</div>
		</div>
		<?
	}
	?>

	<?
	if (isset($_GET[UPDATE])){
		?>
		<div class="col-md-12">
			<div class="alert alert-info">
				<a href="#"  class="close" data-dismiss="alert" aria-label="close"> &times; </a>
				<strong>แก้ไขเรียบร้อยแล้ว</strong> 
			</div>
		</div>
		<?
	}
	?>

	<?
	if (isset($_GET[DELETE])){
		?>
		<div class="col-md-12">
			<div class="alert alert-danger">
				<a href="#"  class="close" data-dismiss="alert" aria-label="close"> &times; </a>
				<strong>ลบเรียบร้อยแล้ว</strong> 
			</div>
		</div>
		<?
	}
	?>
</div>