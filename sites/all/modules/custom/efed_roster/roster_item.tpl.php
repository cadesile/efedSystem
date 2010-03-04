<?php
	$gm = efed_character_load($roster->gm_id);
?>

<div class="node clear-block">
	<div class="content roster">
		<h3><?php print l($roster->name,'roster/'.$roster->roster_id); ?></h3>
		<p class="type">General Manager:	 <?php print $gm->name; ?><br/>
			<?php
			if($roster->banner){
				print theme('imagecache','efed_thumbnail',$show->banner,$show->title);
			}
			?>
			<?php print $roster->description; ?>
		</p>
	</div>
</div>