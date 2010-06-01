<?php
if(!$roster) {
	$roster = efed_roster_load($character->roster->roster_id);
}

$balance = $character->balance;
$contract = $character->contract;
$types = efed_character_status_types();

?>

<div class="character-small">
	<div class="options">
		<?= l('edit', 'character-profiles/store/' . $character->character_id); ?> |
		<?= l('roleplay', 'roleplay/sketchbook'); ?> |
		<?= l('manage character(s)', 'character-profiles'); ?>
	</div>
	<div class="thumb">
		<?= theme('imagecache', 'efed_character_small', $character->img_thumbnail)?>
	</div>
	<div class="character-name"><?=$character->name?></div>
	<div class="real-name"><b>Name:</b> <?=$character->forename?> <?=$character->surname?></div>
	<?php if($roster): ?>
	<div class="roster"><b>Roster:</b> <?=$roster->name?></div>
	<?php endif; ?>
	<?php if($contract): ?>
	<div class="contract"><b>Contract end:</b> <?=format_date($contract->date_end, 'small')?></div>
	<?php endif; ?>
	<?php if($balance): ?>
	<div class="balance"><b>Balance:</b> <?=efed_price($balance->balance)?></div>
	<?php endif; ?>
	<?php print drupal_get_form('efed_character_default_form'); ?>
	<div class="clear"></div>
</div>