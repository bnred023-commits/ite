<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="Files/fixed_titlelogo/<?php echo $fixed[fixed_titlelogo]; ?>" type="image/gif" > 

<!-- bootstrap -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

<!-- icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<?php include_once 'v1_head.php'; ?>
<?
$pagecontent_head_SL = " SELECT * FROM pagecontent WHERE pagecontent_name = 'tag_head' ";
$pagecontent_head_QR = mysqli_query($con,$pagecontent_head_SL);
$pagecontent_head 	 = mysqli_fetch_array($pagecontent_head_QR);
$pagecontent_head[pagecontent_review]   = html_entity_decode(htmlspecialchars_decode($pagecontent_head[pagecontent_review]));
$pagecontent_head[pagecontent_review]   = str_replace("&#39;","'",$pagecontent_head[pagecontent_review]);
echo $pagecontent_head[pagecontent_review];
?>

<style>

	/*----------------------body------------------------*/
	body{
		font-family: "Noto Sans Thai", sans-serif;
		transition: all 0.2s;
	}
	body > .skiptranslate {
		display: none;
	}
	@media (min-width: 1200px){
		body {
			padding-top: 115px;
		}
	}
	@media (max-width: 1201px) {
		body {
			padding-top: 60px;
		}
	}

	/*-----------------------body------------------------*/




	/*-----------------------navbar-----------------------*/ 

	#computer  .navbar{
		border-radius: 0px;
		margin-bottom: 0px;
		box-shadow: none;
		transition: all 0.3s;
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		z-index: 1032;
		background-color: white;
		border: 0px;
	}
	#computer  .navbar-nav>li>a {
		padding: 31px 23px;
		font-size: 17px;
		text-transform: uppercase;
		color: #333333;
	}
	#computer .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
		background: inherit;
		color: #333333;
		font-weight: bold;
	}
	#computer .navbar-nav>li>a:hover , #computer  .nav .open>a,#computer  .nav .open>a:focus,#computer  .nav .open>a:hover {
		background: inherit;
		color: #333333;
		font-weight: bold;
	}
	#computer .dropdown-menu {
		height: auto;
		max-height: 500px;
		overflow-x: hidden;
		font-size: 16px;
	}
	#computer #keyword::placeholder {
		color: #fafbfc !important;
	}
	#computer .navbar-default .navbar-collapse, #computer .navbar-default .navbar-form {
		border-color: #e7e7e7;
	}
	#computer .navbar>.container .navbar-brand,#computer .navbar>.container-fluid .navbar-brand {
		color: #333333;
	}
	/* navbar กลาง */
	@media (min-width: 1200px){
		#computer .navbar-nav{
		/*	float:none;
			margin: 0 auto;
			display: table;
			table-layout: fixed;*/
		}
	}
	@media (max-width: 1201px) {

		#phone .navbar-default {
			background-color: white;
			border-radius: 0px;
		}
		#phone  .navbar-nav>li>a {
			font-size: 17px;
			color: black;
		}
		#phone .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
			background-color: inherit;
			font-weight: bold;
		}
		#phone .navbar-default .navbar-nav>.open>a, #phone .navbar-default .navbar-nav>.open>a:focus, #phone .navbar-default .navbar-nav>.open>a:hover {
			color: black;
			background-color: inherit;
		}
		#phone .navbar-default .navbar-nav .open .dropdown-menu>li>a {
			color: black;
		}
		#phone  .navbar-header {
			padding: 5px;
		}
		#phone .Subcate{
			padding-left: 30px;
		}
		#phone .navbar-form {
			border: none;
		}
		.navbar-header {
			float: none;
		}
		.navbar-left,.navbar-right {
			float: none !important;
		}
		.navbar-toggle {
			display: block;
		}
		.navbar-collapse {
			border-top: 1px solid transparent;
			box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
		}
		.navbar-fixed-top {
			top: 0;
			border-width: 0 0 1px;
		}
		.navbar-collapse.collapse {
			display: none!important;
		}
		.navbar-nav {
			float: none!important;
			margin-top: 7.5px;
		}
		.navbar-nav>li {
			float: none;
		}
		.navbar-nav>li>a {
			padding-top: 10px;
			padding-bottom: 10px;
		}
		.collapse.in{
			display:block !important;
		}
		.navbar-fixed-top .navbar-collapse {
			max-height: 500px;
		}
		#phone .navbar-brand {
			float: left;
			height: 50px;
			padding: 15px 15px;
			font-size: 18px;
			line-height: 20px;
			color: #333333; 
		}
	}

	/*-----------------------navbar-----------------------*/ 



	/*-----------------------text-----------------------*/ 

	.font1{
		font-family: "Noto Sans Thai", sans-serif;
	}

	.top{
		margin-top: 15px;
	}
	.br{
		margin-bottom: 15px !important;
	}
	.pagetopic{
		font-size: 24px;
		font-weight: bold;
		text-transform: uppercase;
	}
	@media (max-width: 991px) {
		.pagetopic{
			font-size: 20px;
			font-weight: bold;
			text-transform: uppercase;
		}
	}

	.ul-1{
		list-style: square inside url('Files/next.png');
	}
	.ul-2{
		list-style: square inside url('Files/bullet.gif');
	}
	.ul-3{
		list-style: square inside url('Files/bullet3.gif');
	}
	.ul-4{
		list-style: square inside url('Files/ul-4.gif');
	}

	.uppercase{
		text-transform: uppercase;
	}
	.underline{
		text-decoration: underline;
	}



	.line-1{
		border-bottom: 1px solid #B2D0FF;

	}
	.line-2{
		border-bottom: 2px solid #f6c46a;
	}
	.line-3{
		border-top: 4px solid #ec1762;
	}
	.line-4{
		border-top: 4px solid #ec1762;
	}

	.bold{
		font-weight: bold;
	}



	.indent1{
		text-indent: 1em;
	}

	.indent2{
		text-indent: 2em;
	}

	.indent3{
		text-indent: 3em;
	}
	.hide1 {
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
	}
	.hide2{
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.hide3{
		display: -webkit-box;
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
	}
	.hide4{
		display: -webkit-box;
		-webkit-line-clamp: 4;
		-webkit-box-orient: vertical;
		overflow: hidden;
		text-overflow: ellipsis;
	}

	.bg-red{
		background-color: red !important;
	}
	.bg-white{
		background-color: white !important;
	}
	.bg-black{
		background-color: #333 !important;
	}
	.bg-gold{
		background-color: #384da0 !important;
	}
	.bg-loft{
		background: #3d3d3f;
		background: -webkit-linear-gradient(#3d3d3f, #6f6f77);
		background: -o-linear-gradient(#3d3d3f, #6f6f77);
		background: -moz-linear-gradient(#3d3d3f, #6f6f77);
		background: linear-gradient(#3d3d3f, #6f6f77);
	}


	.text-red  ,.text-red * {
		color: red !important;
	}
	.text-white ,.text-white *,.text-white p{
		color: white !important;
	}
	.text-black  ,.text-black * {
		color: #333 !important;
	}
	.text-gold  ,.text-gold * {
		color: #DAA520 !important;
	}
	.text-pink  ,.text-pink * {
		color: #c08782 !important;
	}
 

	.color1 {
		color: #1a2b4c !important;
	}
	.color2 {
		color: #00537e !important;
	}
	.color3 {
		color: #19bbd9 !important;
	}
	.color4 {
		color: #808080 !important;
	}

	.bg1 {
		background: linear-gradient(135deg, #d7d7d7, #878585, #d7d7d7);
	}
	.bg2 {
		background-color: #515bdd !important;
	}
	.bg3 {
		background: #19bbd9;
		background: linear-gradient(to right, #19bbd9, #50dfc0);
	}
	.bg4 {
		background: #808080;
	}

	.border1 {
		border: 1px solid #d7d7d7 !important;
	}
	.border2 {
		border: 1px solid #00537e !important;
	}
	.border3 {
		border: 1px solid #19bbd9 !important;
	}
	.border4 {
		border: 1px solid #808080 !important;
	}

	.border1-bottom {
		border-bottom: 1px solid #1a2b4c !important;
	}
	.border2-bottom {
		border-bottom: 1px solid #00537e !important;
	}
	.border3-bottom {
		border-bottom: 1px solid #19bbd9 !important;
	}
	.border4-bottom {
		border-bottom: 1px solid #808080 !important;
	}

	.border1-top {
		border-top: 1px solid #1a2b4c !important;
	}
	.border2-top {
		border-top: 1px solid #00537e !important;
	}
	.border3-top {
		border-top: 1px solid #19bbd9 !important;
	}
	.border4-top {
		border-top: 1px solid #808080 !important;
	}




	.breadcrumb  {
		background-color: inherit;
	}
	.breadcrumb  a{
		color: #4b3d31;
	}
	a{
		text-decoration: none !important;
	}



	p{
		animation: ani-zoomIn 1s !important;
	}
	/*-----------------------text-----------------------*/ 


	/*---------------------shadow-------------------------*/

	.no-radius{
		border-radius: 0px !important;
	}
	.no-padding{
		padding: 0px;
	}
	.no-margin{
		margin: 0px;
	}
	.no-border{
		border: none;
	}
	.no-boxsha{
		box-shadow: none;
	}
	.boxsha{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		transition: all 0.3s;
	}
	.boxsha:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.boxsha2{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
	}

	.boxsha3{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
	}
	.boxsha3:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}
	.boxsha4:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}
	.boxsha5{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.boxsha5:hover{
		box-shadow: none;
		transition: all 0.3s;
	}
	.boxsha6{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
		transition: all 0.3s;
	}
	.boxsha6:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.4);
	}
	.boxsha7:hover{
		box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16), 0 0 0 1px rgba(0,0,0,0.08);
	}

	/*---------------------shadow-------------------------*/


	/*---------------------button-------------------------*/

	.btn{
		font-weight: normal !important;
		transition: all 0.3s;
		border-radius: 0px;
	}


	.btn-main {
		color: white;
		background: #515bdd;
		border-color: #515bdd;
		font-weight: normal;
	}
	.btn-main:hover{
		color: white;
		background: #515bdd;
		border-color: #515bdd;
		font-weight: normal;
	}

	.btn-main2 {
		color: black;
		background: linear-gradient(135deg, #d7d7d7, #a7a7a7, #d7d7d7);;
		font-weight: normal;
	}
	.btn-main2:hover{
		color: black;
		background: linear-gradient(135deg, #d7d7d7, #a7a7a7, #d7d7d7);;
		font-weight: normal;
	}

	.btn-main-outline {
		color: #ef5521;
		background: white;
		border:1px solid #ef5521;
		font-weight: bold;
	}
	.btn-main-outline:hover{
		color: white;
		background: #ef5521;
		border:1px solid #ef5521;
		font-weight: bold;
	}



	.link-main{
		color: black !important;
	}
	.btn-outline{
		background-color: transparent ;
		background: none ;
		color: inherit ;
		transition: all .5s ;
	}
	.btn-primary.btn-outline {
		color: #428bca;
	}
	.btn-success.btn-outline {
		color: #5cb85c;
	}
	.btn-info.btn-outline {
		color: #5bc0de;
	}
	.btn-warning.btn-outline {
		color: #f0ad4e;
	}
	.btn-danger.btn-outline {
		color: #d9534f;
	}
	.btn-default.btn-outline {
		color: white;
		border: 1px solid white;
	}
	.btn-primary.btn-outline:hover,
	.btn-success.btn-outline:hover,
	.btn-info.btn-outline:hover,
	.btn-warning.btn-outline:hover,
	.btn-default.btn-outline:hover,
	.btn-danger.btn-outline:hover {
		color: #fff;
	}
	.btn:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		transition: all 0.3s;
	}



	.dropdown-submenu {
		position: relative;
	}
	.dropdown-submenu  #dropdown-menu  {
		position: absolute;
		top: 100%;
		left: 0;
		z-index: 1000;
		display: none;
		float: left;
		min-width: 160px;
		padding: 5px 0;
		margin: 2px 0 0;
		font-size: 14px;
		text-align: left;
		list-style: none;
		background-color: #fff;
		-webkit-background-clip: padding-box;
		background-clip: padding-box;
		border: 1px solid #ccc;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		-webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		top: 0;
		left: 100%;
		margin-top: -1px;
		width: auto;
	}
	.dropdown-submenu  a{
		display: block;
		padding: 3px 20px;
		clear: both;
		font-weight: 400;
		line-height: 1.42857143;
		color: #333;
		white-space: nowrap;
	}
	.dropdown-submenu {
		position: relative;
	}

	.dropdown-submenu .dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
	}

	.dropdown-phone {
		position: relative;
	}
	.dropdown-phone .dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
	}



	.form-horizontal .control-label.text-left{
		text-align: left;
		font-weight: normal;
	}
	input[type=text] ,input[type=number],input[type=email],input[type=password] ,input[type=file] , .btn, select,.form-control{

	}

	.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
		z-index: 3;
		cursor: default;

		border-color:#7f2f31 ;
		color: #7f2f31 ;
		background: #ededed;
	}
	.pagination>li>a, .pagination>li>span {
		position: relative;
		float: left;
		padding: 6px 12px;
		margin-left: -1px;
		line-height: 1.42857143;
		color: #333;
		text-decoration: none;
		background-color: #fff;
		border: 1px solid #ddd;
	}

	.ani-shake {
		animation: ani-shake 1s !important;
		animation-iteration-count: 5 !important;
	}
	@keyframes ani-shake {
		10%, 90% {
			transform: translate3d(-1px, 0, 0);
		}

		20%, 80% {
			transform: translate3d(2px, 0, 0);
		}

		30%, 50%, 70% {
			transform: translate3d(-4px, 0, 0);
		}

		40%, 60% {
			transform: translate3d(4px, 0, 0);
		}
	}


	.ani-bounce {
		animation: ani-bounce 1s !important;
		animation-iteration-count: 5 !important;
	}

	@-webkit-keyframes ani-bounce {
		from,
		20%,
		53%,
		80%,
		to {
			-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}

		40%,
		43% {
			-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			-webkit-transform: translate3d(0, -5px, 0);
			transform: translate3d(0, -5px, 0);
		}

		70% {
			-webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
			-webkit-transform: translate3d(0, -2px, 0);
			transform: translate3d(0, -2px, 0);
		}

		90% {
			-webkit-transform: translate3d(0, -1px, 0);
			transform: translate3d(0, -1px, 0);
		}
	}



	@-webkit-keyframes ani-bounceIn {
		from,
		20%,
		40%,
		60%,
		80%,
		to {
			-webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
			animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
		}

		0% {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		}

		20% {
			-webkit-transform: scale3d(1.1, 1.1, 1.1);
			transform: scale3d(1.1, 1.1, 1.1);
		}

		40% {
			-webkit-transform: scale3d(0.9, 0.9, 0.9);
			transform: scale3d(0.9, 0.9, 0.9);
		}

		60% {
			opacity: 1;
			-webkit-transform: scale3d(1.03, 1.03, 1.03);
			transform: scale3d(1.03, 1.03, 1.03);
		}

		80% {
			-webkit-transform: scale3d(0.97, 0.97, 0.97);
			transform: scale3d(0.97, 0.97, 0.97);
		}

		to {
			opacity: 1;
			-webkit-transform: scale3d(1, 1, 1);
			transform: scale3d(1, 1, 1);
		}
	}

	@-webkit-keyframes ani-zoomIn {
		from {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		}

		50% {
			opacity: 1;
		}
	}

	@keyframes ani-zoomIn {
		from {
			opacity: 0;
			-webkit-transform: scale3d(0.3, 0.3, 0.3);
			transform: scale3d(0.3, 0.3, 0.3);
		}

		50% {
			opacity: 1;
		}
	}

	.ani-zoomIn {
		-webkit-animation-name: ani-zoomIn;
		animation-name: ani-zoomIn;
	}

	.img-responsive{
		margin: auto;
	}
	/*---------------------button-------------------------*/


	/*---------------------loop-------------------------*/

	.imag-16-9 {
		position: relative;
		padding-bottom: 56.2%;
	}

	.imag-16-9 img {
		position: absolute;
		object-fit: cover;
		width: 100%;
		height: 100%;
	}



	<?
	for ($size=10; $size <= 50; $size++) { 
		$textsize = "size".$size;
		?>
		.<? echo $textsize; ?>{
			font-size: <? echo $size; ?>px !important;
			line-height:  <? echo $size*1.8; ?>px !important;
		}
		<?
	}
	for ($size=10; $size <= 50; $size++) { 
		$textsize = "size".$size;
		?>
		@media (max-width: 991px) {
			.resize  .<? echo $textsize; ?> {
				font-size: <? echo $size*0.8; ?>px !important;
				line-height:  <? echo $size*1.6; ?>px !important;
			}
		}
		<?
	}

	for ($img=200; $img >=10; $img=$img-1) { 
		$textimg = "img".$img;
		?>
		.<? echo $textimg; ?>{
			position: relative !important;
			padding-bottom: <? echo $img; ?>% !important;
			border-radius: 0px !important; 
		}
		.<? echo $textimg; ?> img{
			position: absolute !important;
			object-fit: cover !important;
			width: 100% !important;
			height: 100% !important;
		}
		.<? echo $textimg; ?> iframe{
			position: absolute !important;
			object-fit: cover !important;
			width: 100% !important;
			height: 100% !important;
		}
		<?
	}

	for ($imgout=200; $imgout >=10; $imgout=$imgout-1) { 
		$textimgout = "imgout".$imgout;
		?>
		.<? echo $textimgout; ?>{
			position: relative !important;
			padding-bottom: <? echo $imgout; ?>% !important;
			border-radius: 0px !important; 
		}
		.<? echo $textimgout; ?> img{
			position: absolute !important;
			object-fit: contain !important;
			width: 100% !important;
			height: 100% !important;
		}
		.<? echo $textimgout; ?> iframe{
			position: absolute !important;
			object-fit: contain !important;
			width: 100% !important;
			height: 100% !important;
		}
		<?
	}

	for ($padding=0; $padding <= 50; $padding++) { 
		$textpadding = "padding".$padding;
		?>
		.<? echo $textpadding; ?>{
			padding: <? echo $padding; ?>px !important;
		}
		<?
	}
	for ($margin=0; $margin <= 30; $margin++) { 
		$textmargin = "margin".$margin;
		?>
		.<? echo $textmargin; ?>{
			margin: <? echo $margin; ?>px !important;
		}
		<?
	}
	for ($betwixt=3; $betwixt <= 30; $betwixt++) { 
		$textbetwixt = "betwixt".$betwixt;
		?>
		.<? echo $textbetwixt; ?>{
			padding-top: <? echo $betwixt; ?>px !important;
			<? $betwixtbottom=$betwixt-3; ?>
			padding-bottom: <? echo $betwixtbottom; ?>px !important;
		}
		<?
	}
	for ($between=3; $between <= 30; $between++) { 
		$textbetween = "between".$between;
		?>
		.<? echo $textbetween; ?>{
			padding-top: <? echo $between; ?>px !important;
			<? $betweenbottom=$between-3; ?>
			padding-bottom: <? echo $betweenbottom; ?>px !important;
		}
		<?
	}
	for ($linehight=0; $linehight <= 30; $linehight++) { 
		$textlinehight = "linehight".$linehight;
		?>
		.<? echo $textlinehight; ?>{
			line-height:  <? echo $linehight; ?>px !important;
		}
		<?
	}

	for ($paddingtop=0; $paddingtop <= 50; $paddingtop++) { 
		$textcss = "paddingtop".$paddingtop;
		?>
		.<? echo $textcss; ?>{
			padding-top: <? echo $paddingtop; ?>px !important;
		}
		<?
	}
	for ($paddingbottom=0; $paddingbottom <= 50; $paddingbottom++) { 
		$textcss = "paddingbottom".$paddingbottom;
		?>
		.<? echo $textcss; ?>{
			padding-bottom: <? echo $paddingbottom; ?>px !important;
		}
		<?
	}
	for ($margintop=0; $margintop <= 50; $margintop++) { 
		$textcss = "margintop".$margintop;
		?>
		.<? echo $textcss; ?>{
			margin-top: <? echo $margintop; ?>px !important;
		}
		<?
	}
	for ($marginbottom=0; $marginbottom <= 50; $marginbottom++) { 
		$textcss = "marginbottom".$marginbottom;
		?>
		.<? echo $textcss; ?>{
			margin-bottom: <? echo $marginbottom; ?>px !important;
		}
		<?
	}
	for ($radius=10; $radius <= 50; $radius++) { 
		$textradius = "radius".$radius;
		?>
		.<? echo $textradius; ?>{
			border-radius: <? echo $radius; ?>px !important;
		}
		<?
	}
	for ($radiustop=10; $radiustop <= 50; $radiustop++) { 
		$textradius = "radiustop".$radiustop;
		?>
		.<? echo $textradius; ?>{
			border-top-right-radius: <? echo $radiustop; ?>px !important;
			border-top-left-radius: <? echo $radiustop; ?>px !important;
		}
		<?
	}
	for ($radiusbottom=10; $radiusbottom <= 50; $radiusbottom++) { 
		$textradius = "radiusbottom".$radiusbottom;
		?>
		.<? echo $textradius; ?>{
			border-bottom-right-radius: <? echo $radiusbottom; ?>px !important;
			border-bottom-left-radius: <? echo $radiusbottom; ?>px !important;
		}
		<?
	}
	?>

	/*---------------------loop-------------------------*/


	/*---------------------img-------------------------*/

	@media (min-width:1200px){
		#img-carousel{
			width: 100%;
			object-fit: cover;
			height: 530px !important;
		}
	}
	@media (max-width:1201px){
		#img-carousel{
			width: 100%;
			object-fit: cover;
		}
	}

	.full{
		width: 100%;
	}
	.fit{
		object-fit: cover;
		width: 100%;
	}



	.carousel-control.left, .carousel-control.right {
		background-image:none !important;
		filter:none !important;
	}
	.carousel-inner .item img,.carousel-inner > .item > a > img {
		width: 100%;
	}


	.hov-pointer:hover {cursor: pointer;}
	.hov-img-zoom {
		display: block;
		overflow: hidden;
	}
	.hov-img-zoom img{
		width: 100%;
		-webkit-transition: all 0.6s;
		-o-transition: all 0.6s;
		-moz-transition: all 0.6s;
		transition: all 0.6s;
	}
	.hov-img-zoom:hover img {
		-webkit-transform: scale(1.1);
		-moz-transform: scale(1.1);
		-ms-transform: scale(1.1);
		-o-transform: scale(1.1);
		transform: scale(1.1);
	}




	.wrapper100c {
		position: relative;
		padding-bottom: 100%;
		border-radius: 100%;
		border: 1px solid #8b0304;
	}
	.wrapper100c img {
		position: absolute;
		object-fit: cover;
		width: 100%;
		height: 100%;
	}
	

	.review img{
		max-width: 100% !important;
		height: auto !important;
	}
	.review table{
		max-width: 100% !important;
		height: auto !important;

		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
	}
	.review *{
		font-family: 'Noto Sans Thai', sans-serif !important;
	}
	.review iframe{
		width: 100% !important;

	}

	.w3-modal {
		display: none; 
		position: fixed;
		z-index: 1033;
		padding-top: 100px; 
		left: 0;
		top: 0;
		width: 100%; 
		height: 100%; 
		overflow: auto;
		background-color: rgb(0,0,0); 
		background-color: rgba(0,0,0,0.9); 
	}

	.w3-modal-content {
		margin: auto;
		display: block;
		width: 100%;
		max-width: 1080px;
	}

	.w3-modal-content, #w3caption {  
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.3s;
		animation-name: zoom;
		animation-duration: 0.3s;
	}
	#w3caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 1080px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}
	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}
	.zoom-close {
		position: absolute;
		top: 10px;
		right: 35px;
		color: #f1f1f1;
		font-size: 50px;
		font-weight: normal;
		transition: 0.3s;
	}
	.zoom-close:hover,
	.zoom-close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}
	@media only screen and (max-width: 900px){
		.w3-modal-content {
			width: 100%;
		}
	}

	.hovereffect {
		width: 100%;
		height: 100%;
		float: left;
		overflow: hidden;
		position: relative;
		text-align: center;
		cursor: default;
	}

	.hovereffect .overlay {
		width: 100%;
		height: 100%;
		position: absolute;
		overflow: hidden;
		top: 0;
		left: 0;
		/* background-color: rgba(75,75,75,0.7);*/
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		padding: 10px;
	}

	.hovereffect:hover .overlay {
		background-color: rgba(48, 152, 157, 0.4);
	}

	.hovereffect img {
		display: block;
		position: relative;
	}

	.hovereffect h2 {
		margin-top: 30%;
		text-transform: uppercase;
		color: #fff;
		text-align: center;
		position: relative;
		font-size: 40px;
		padding: 10px;
		background: rgba(0, 0, 0, 0.6);
		-webkit-transform: translateY(45px);
		-ms-transform: translateY(45px);
		transform: translateY(45px);
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
	}

	.hovereffect:hover h2 {
		-webkit-transform: translateY(5px);
		-ms-transform: translateY(5px);
		transform: translateY(5px);
	}

	.hovereffect a.inhovereff {
		display: inline-block;
		text-decoration: none;
		padding: 7px 14px;
		text-transform: uppercase;
		color: #fff;
		border: 1px solid #fff;
		background-color: transparent;
		opacity: 0;
		filter: alpha(opacity=0);
		-webkit-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);
		-webkit-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		font-weight: normal;
		margin: 10px 0 0 0;
		padding: 62px 100px;
		font-size: 20px;

	}

	.hovereffect:hover a.inhovereff {
		opacity: 1;
		filter: alpha(opacity=100);
		-webkit-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
	}

	.hovereffect a.inhovereff:hover {
		box-shadow: 0 0 5px #fff;
	}






	/*---------------------img-------------------------*/


	/*---------------------other-------------------------*/

	.col-centered{
		float: none;
		margin: 0 auto;
	}


	#social_footer{
		right: 30px;
		position: fixed;
		bottom: 30px; 
		cursor: pointer; 
		z-index: 99;
		opacity: 0.95;
		filter: alpha(opacity=95);
	}
	#social_footer .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
		/*background-color: initial;*/
	}
	.chat_link{
		/*color: #262626;*/
		/*text-shadow: 1px 1px 2px white;*/
	}


	.badge{
		background: #D9D26D;
	}
	.GoogleMaps iframe{
		width: 100% !important;
		height: 400px  !important;
	}
	.tinted {
		opacity: 1;
		filter: brightness(70%);
	}
	.tinted2 {
		opacity: 1;
		filter: brightness(40%);
	}

	/*--------------------*/

	.mega-dropdown {
		position: static !important;
	}
	.mega-dropdown-menu {
		padding: 20px 0px;
		width: 100%;
		box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.mega-dropdown-menu > li > ul {
		padding: 0;
		margin: 0;
	}
	.mega-dropdown-menu > li > ul > li {
		list-style: none;
	}
	.mega-dropdown-menu > li > ul > li > a {
		display: block;
		color: #222;
		padding: 3px 5px;
		font-size: 20px;
	}
	.mega-dropdown-menu > li ul > li > a:hover,
	.mega-dropdown-menu > li ul > li > a:focus {
		text-decoration: none;
	}
	.mega-dropdown-menu .dropdown-header {
		font-size: 18px;
		color: #d26e4b;
		padding: 5px 60px 5px 5px;
		line-height: 30px;
	}

	.mega-dropdown-menu .dropdown-header a{
		color: #d26e4b;
	}

	/*-------------------------*/

	.col-half-offset{
		width: 19.66666667%;
	}

	/*--------------------*/
	.separator {
		display: flex;
		align-items: center;
		text-align: center;
	}
	.separator::before, .separator::after {
		content: '';
		flex: 1;
		border-bottom: 1px solid #d1a02a;
	}
	.separator::before {
		margin-right: .25em;
	}
	.separator::after {
		margin-left: .25em;
	}


	/*--------------------*/

	.ver1-image {
		opacity: 1;
		display: block;
		width: 100%;
		height: auto;
		transition: .5s ease;
		backface-visibility: hidden;
	}

	.ver1-middle {
		transition: .5s ease;
		opacity: 0;
		position: absolute;
		top: 30%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		text-align: center;
	}

	.ver1-container:hover .ver1-image {
		opacity: 0.2;
	}

	.ver1-container:hover .ver1-middle {
		opacity: 1;
	}

	.ver1-text {
		color: black;
		font-size: 14px;
		padding: 0px 0px;
	}

	/*--------------*/

	/*-----------------*/

	.col-xs-5ths,
	.col-sm-5ths,
	.col-md-5ths,
	.col-lg-5ths {
		position: relative;
		min-height: 1px;
		padding-right: 15px;
		padding-left: 15px;
	}

	.col-xs-5ths {
		width: 20%;
		float: left;
	}

	@media (min-width: 768px) {
		.col-sm-5ths {
			width: 20%;
			float: left;
		}
	}

	@media (min-width: 992px) {
		.col-md-5ths {
			width: 20%;
			float: left;
		}
	}

	@media (min-width: 1200px) {
		.col-lg-5ths {
			width: 20%;
			float: left;
		}
	}

	/*--------------------------------------*/

	
	

	.imgBox {
		/* filter: url(filters.svg#grayscale); Firefox 3.5+ */
		filter: gray; /* IE5+ */
		-webkit-filter: grayscale(1); /* Webkit Nightlies & Chrome Canary */
		-webkit-transition: all .4s ease-in-out;  
	}

	.imgBox:hover {
		filter: none;
		-webkit-filter: grayscale(0);
		-webkit-transform: scale(1.05);
	}
	.pre-line{
		white-space: pre-line;
		margin-top: -20px !important;
	}

	/*---------*/





</style>

<script>

	$(document).ready(function(){
		$(".container").click(function(){
			$("#myNavbar").collapse('hide');
		});
	});

	function goBack() {
		window.history.back();
	}

	$(document).ready(function(){
		$(".dropauto").hover(            
			function() {
				$('.open-dropauto', this).not('.in .open-dropauto').stop(true,true).slideDown("500");
				$(this).toggleClass('open');        
			},
			function() {
				$('.open-dropauto', this).not('.in .open-dropauto').stop(true,true).slideUp("0");
				$(this).toggleClass('open');       
			}
			);
	});

	$(document).ready(function(){
		$(".dropauto2").hover(            
			function() {
				$('.open-dropauto2', this).not('.in .open-dropauto2').stop(true,true).slideDown("500");
				$(this).toggleClass('open');        
			},
			function() {
				$('.open-dropauto2', this).not('.in .open-dropauto2').stop(true,true).slideUp("0");
				$(this).toggleClass('open');       
			}
			);
	});


	$(document).ready(function(){
		$('.dropdown-submenu a.in-dropdown').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		});
	});

</script>


<style type="text/css">
	.centered {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%); /* กึ่งกลางแนวตั้งและแนวนอน */
		font-size: 55px;
		color: white;
		font-weight: bold;
		text-align: center;
	}
	@media (max-width: 1201px) {
		.centered {
			font-size: 20px;
		}
	}

	.mainmenu_cover {
		position: relative !important;
		min-height: 220px !important;
		margin-top: 85px !important;
		border-radius: 0px !important;
		overflow: hidden !important;
	}
	@media (max-width: 991px) {
		.mainmenu_cover {
			min-height: 170px !important;
			margin-top: 75px !important;
		}
	}
	.mainmenu_cover img {
		position: absolute !important;
		object-fit: cover !important;
		width: 100% !important;
		height: 100% !important;
		top: 0;
		left: 0;
	}
</style>
