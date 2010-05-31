<?php
$current = efed_character_load($belt->current_champion->cid);
?>
<div class="belt">
	<div class="belt-name"><?php print $belt->name; ?></div>
	<?php if($belt->current_champion): ?>
	<div class="current-champion">
		<div class="holder"><b>Current holder:</b> <?php print $current->name; ?></div>
		<div class="date"><b>Start date:</b> <?php print format_date($belt->current_champion->start, 'small'); ?></div>
	</div>
	<?php else: ?>
	<div class="vacant">Title vacant.</div>
	<?php endif; ?>
</div>