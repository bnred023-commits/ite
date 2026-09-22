<img style="cursor: zoom-in;height: 200px;" id="id_organization_photo<?php echo $organization[organization_id]; ?>" src="Files/organization_photo/<?php echo $organization[organization_photo]; ?>"  />


<div id="my_organization_photo<?php echo $organization[organization_id]; ?>" class="w3-modal">
	<span class="zoom-close w3-close<?php echo $organization[organization_id]; ?>" >&times;</span>
	<img class="w3-modal-content w3-close<?php echo $organization[organization_id]; ?>" id="img_organization_photo<?php echo $organization[organization_id]; ?>">
</div>
<script>
	var w3modal = document.getElementById("my_organization_photo<?php echo $organization[organization_id]; ?>");
	var img = document.getElementById("id_organization_photo<?php echo $organization[organization_id]; ?>");
	var modalImg = document.getElementById("img_organization_photo<?php echo $organization[organization_id]; ?>");
	img.onclick = function(){
		w3modal.style.display = "block";
		modalImg.src = this.src;
	}
	var span = document.getElementsByClassName("w3-close<?php echo $organization[organization_id]; ?>")[0];
	span.onclick = function() { 
		w3modal.style.display = "none";
	}
	window.onclick = function(event) {
		if (event.target == w3modal) {
			w3modal.style.display = "none";
		}
	}
</script>