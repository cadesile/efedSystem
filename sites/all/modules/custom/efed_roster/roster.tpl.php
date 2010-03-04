<?php
	//print_r($roster);
	//exit;

	$gm = efed_character_load($roster->gm_id);
	
	$roster->shows = efed_roster_load_show($roster->roster_id);
?>

<div class="node clear-block">
	<div class="content roster">
		<h1><?php print $roster->name; ?></h1>
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
		<div>
			<h2>Champions:</h2>
			<?php foreach($roster->belts as $belt){ ?>
				<?= theme('efed_belt_item',$belt); ?>
			<?php } ?>
		</div>
		<div>
			<h2>Members:</h2>
			<?php foreach($roster->members as $c){ ?>
				<?= theme('efed_character_item',efed_character_load($c->cid)); ?>
			<?php } ?>
		</div>
	</div>
</div>