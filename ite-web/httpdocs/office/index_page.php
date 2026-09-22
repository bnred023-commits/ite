
<ul class="pagination">
	<?
	if ($Num_pages!=1) {
		if($Prev_page){
			$page_Echo = "<li> <a href ='$_SERVER[SCRIPT_NAME]?page=$Prev_page";
			if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
				$page_Echo .= "&plot_name=$_GET[plot_name]"; 
			}
			if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
				$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
			}
			if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
				$page_Echo .= "&keyword=$_GET[keyword]"; 
			}
			if (isset($_GET[highlight_name])&&trim($_GET[highlight_name])!='') {
				$page_Echo .= "&highlight_name=$_GET[highlight_name]"; 
			}
			$page_Echo .=" '>  กลับ </a></li> ";
			echo $page_Echo;

		}

		else{
			echo " <li class='disabled'  ><a>  กลับ </a></li> "; 
		}


		if ($Num_Rows>=1) {

			for($i=1; $i<=$Num_pages; $i++){

				if($i < $page){

					$page_Echo = "<li> <a href='$_SERVER[SCRIPT_NAME]?page=$i";
					if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
						$page_Echo .= "&plot_name=$_GET[plot_name]"; 
					}
					if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
						$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
					}
					if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
						$page_Echo .= "&keyword=$_GET[keyword]"; 
					}
					if (isset($_GET[highlight_name])&&trim($_GET[highlight_name])!='') {
						$page_Echo .= "&highlight_name=$_GET[highlight_name]"; 
					}
					$page_Echo .=" '>$i</a></li> ";
					echo $page_Echo;


				}

				if ($i == $page) { 
					$_SESSION[page] = $page;
					echo "<li class='active'><a>$i</a></li>";
				}

				if($i > $page)  {

					$page_Echo = "<li> <a href='$_SERVER[SCRIPT_NAME]?page=$i";
					if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
						$page_Echo .= "&plot_name=$_GET[plot_name]"; 
					}
					if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
						$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
					}
					if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
						$page_Echo .= "&keyword=$_GET[keyword]"; 
					}
					if (isset($_GET[highlight_name])&&trim($_GET[highlight_name])!='') {
						$page_Echo .= "&highlight_name=$_GET[highlight_name]"; 
					}
					$page_Echo .=" '>$i</a></li> ";
					echo $page_Echo;


				}
			}
		}

		if($page!=$Num_pages){

			$page_Echo = "<li> <a href ='$_SERVER[SCRIPT_NAME]?page=$Next_page";
			if (isset($_GET[plot_name])&&trim($_GET[plot_name])!='') {
				$page_Echo .= "&plot_name=$_GET[plot_name]"; 
			}
			if (isset($_GET[catalog_name])&&trim($_GET[catalog_name])!='') {
				$page_Echo .= "&catalog_name=$_GET[catalog_name]"; 
			}
			if (isset($_GET[keyword])&&trim($_GET[keyword])!='') {
				$page_Echo .= "&keyword=$_GET[keyword]"; 
			}
			if (isset($_GET[highlight_name])&&trim($_GET[highlight_name])!='') {
				$page_Echo .= "&highlight_name=$_GET[highlight_name]"; 
			}
			if (isset($_GET[Car_MakeID])&&trim($_GET[Car_MakeID])!='') {
				$page_Echo .= "&Car_MakeID=$_GET[Car_MakeID]"; 
			}
			if (isset($_GET[Car_ModelID])&&trim($_GET[Car_ModelID])!='') {
				$page_Echo .= "&Car_ModelID=$_GET[Car_ModelID]"; 
			}
			$page_Echo .=" '>ถัดไป </a></li> ";
			echo $page_Echo;

		}
		else{
			echo " <li class='disabled'> <a>ถัดไป </a> </li> "; 
		}
	}
	?>
</ul>