<?php
$current = efed_character_load($belt->current_champion->cid);
unset($belt->history[0]);

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
	<?php if($belt->history): ?>
	<div class="history">
		<b>Previous champion(s):</b>
		<?php foreach($belt->history as $history): ?>
		<?php $c = efed_character_load($history->cid); ?>
		<div class="past-champion">
			<div class="holder"><?php print $c->name; ?></div>
			<div class="date"><b>Date:</b> <?php print format_date($history->start, 'small'); ?> - <?php print format_date($history->end, 'small'); ?></div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>