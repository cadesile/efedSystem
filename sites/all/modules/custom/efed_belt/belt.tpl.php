<?php
	$gm = efed_character_load($roster->gm_id);
?>

<div class="node clear-block">
	<div class="content roster">
		<h3><?php print l($roster->name,'roster/'.$roster->roster_id); ?></h3>
		<p class="type"><b>General Manager:</b> <?php print $gm->name; ?></p>
		<p class="type"><b>Balance:</b> $<?php print number_format($roster->balance,2); ?></p>
		<p>
			<?php
			if($roster->banner){
				print theme('imagecache','efed_thumbnail',$show->banner,$show->title);
			}
			?>
			<?php print $roster->description; ?>
		</p>
		<p>Members: <?php print count($roster->members); ?></p>
	</div>
</div>