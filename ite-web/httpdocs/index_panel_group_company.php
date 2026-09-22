<a  href="group_company_detail.php?group_company_id=<? echo $group_company[group_company_id]; ?>" title="<? echo $group_company[group_company_name]; ?>" >
	<div  class="panel panel-default radius20" style="background-color: inherit !important;overflow: hidden;">
		<div class="panel-body no-border resize" style="overflow: hidden;background-color: inherit !important;">
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="size18 marginbottom0  text-black bold" >
						<? echo $group_company[group_company_name]; ?>
					</p>
				</div>
			</div>
		</div>
		<div class="panel-heading no-border no-padding " style="overflow: hidden;background: inherit;" >
			<div>
				<img class="img-responsive" src="Files/group_company_photo/<?php echo $group_company[group_company_photo]; ?>"  />
			</div>
		</div>
		<div class="panel-body no-border resize" style="overflow: hidden;background-color: inherit !important;">
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="size14 marginbottom0  text-black pre-line" style="min-height: 40px;">
						<? echo $group_company[group_company_detail]; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</a>

