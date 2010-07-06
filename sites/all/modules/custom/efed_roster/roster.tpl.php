<?php
$gm = efed_character_load($roster->gm_id);	
$roster->shows = efed_roster_load_show($roster->roster_id);
?>

<div class="node clear-block">
	<div class="content roster">
		<?php if($type == 'summary'): ?>
			<?php drupal_set_title($roster->name); ?>
		<p class="type"><b>General Manager:</b> <?php print $gm->name; ?></p>
		<p class="type"><b>Balance:</b> $<?php print number_format($roster->balance,2); ?></p>
		<p>
				<?php if($roster->banner) print theme('imagecache','efed_thumbnail',$show->banner,$show->title); ?>
				<?php print $roster->description; ?>
		</p>
		<?php endif; ?>
		<?php if($type == 'champions'): ?>
			<?php drupal_set_title('Title History'); ?>
			<?php foreach($roster->belts as $belt): ?>
				<?= theme('efed_belt',$belt); ?>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if($type == 'members'): ?>
			<?php drupal_set_title('Members'); ?>
			<?php if(is_array($roster->members)): ?>
				<?php foreach($roster->members as $c): ?>
					<?php $class = ($class)? FALSE : TRUE; ?>
					<?= theme('efed_character_item', efed_character_load($c->cid), NULL, $class); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		<?php endif; ?>
		<?php if($type == 'stables'): ?>
			<?php drupal_set_title('Stables'); ?>
			<?php if(is_array($roster->stables)): ?>
				<?php foreach($roster->stables as $stable_id => $name): ?>
					<?= theme('stable_template', efed_stable_load($stable_id)); ?>
				<?php endforeach; ?>
			<?php else: ?>
			<p>Empty.</p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>