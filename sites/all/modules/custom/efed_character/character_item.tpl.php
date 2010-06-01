<?php
if($roster) {
	$r = efed_roster_load($character->roster->roster_id);
}

$b = $character->balance;
$c = $character->contract;
$types = efed_character_status_types();
?>

<div class="character-item <?php print ($class)? '' : 'character-alt'; ?>">
	<div class="thumb"><?= $character->img_thumbnail_render?></div>
	<div class="character-name"><?=$character->name?></div>
	<div class="real-name"><b>Name:</b> <?=$character->forename?> <?=$character->surname?></div>
	<?php if($roster): ?>
	<div class="roster"><b>Roster:</b> <?=$r->name?></div>
	<?php endif; ?>
	<div class="gender <?=$character->gender?>"><b>Gender:</b> <?=$character->gender?></div>
	<div class="status"><b>Status:</b> <?=$types[$character->status]?></div>
	<?php if($c): ?>
	<div class="date"><b>Contract:</b> <?=format_date($c->date_start, 'small')?> - <?=format_date($c->date_end, 'small')?></div>
	<?php endif; ?>
	<div class="clear"></div>
</div>