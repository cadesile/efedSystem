<?php
$gm = efed_character_load($roster->gm_id);
?>

<div class="node clear-block">
	<div class="content roster">
		<h3><?php print l($roster->name,'roster/'.$roster->roster_id); ?></h3>
		<div class="gm"><b>General Manager:</b>	 <?php print $gm->name; ?></div>
		<p>
			<?php if($roster->banner): ?>
				<?php	print theme('imagecache','efed_thumbnail',$show->banner,$show->title); ?>
			<?php endif; ?>
			<?php print $roster->description; ?>
		</p>		
	</div>
</div>