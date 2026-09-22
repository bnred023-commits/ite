<?php if (!empty($suggestion['suggestion_photo'])): ?>
	<div style="padding: 0px 50px;margin-bottom: 15px;">
		<div style="overflow: hidden;border-radius: 200px;">
			<div class="img100">
				<img class="full" src="Files/suggestion_photo/<?= $suggestion['suggestion_photo']; ?>" >
			</div>
		</div>
	</div>
<?php endif; ?>

<div style="display: flex; align-items: flex-start; gap: 12px; max-width: 100%;">
	<div>
		<div style="font-weight: bold; margin-bottom: 4px;">
			<a  style="text-decoration: none; color: black;font-size: 22px;font-weight: bold;">
				<?= $suggestion['suggestion_name']; ?>
			</a>
		</div>
		<p style="margin: 0;">
			<a  style="text-decoration: none; color: black;font-size: 16px;"  target="_blank" >
				<?= $suggestion['suggestion_detail']; ?>
			</a>
		</p>
	</div>
</div>