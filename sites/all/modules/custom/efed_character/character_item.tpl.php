<?php
	if($roster){			
		$r = efed_roster_load($character->roster->roster_id);
	}

	$b = $character->balance;
	$c = $character->contract;
	$types = efed_character_status_types();
?>

<div class="character_item">
	<div class="thumb"><?= $character->img_thumbnail_render?></div>
	<ul>
		<li><?=$character->name?></li>
		<li>Name: <?=$character->forename?> <?=$character->surname?></li>
		<?php if($roster){ ?>
		<li>Roster: <?=$r->name?></li>
		<?php } ?>
		<li>Gender: <?=$character->gender?></li>
		<li>Status: <?=$types[$character->status]?></li>
		<?php if($c){ ?>
		<li>Contract: <?=format_date($c->date_start,'custom','m/d/Y')?> - <?=format_date($c->date_end,'custom','m/d/Y')?></li>
		<?php } ?>
	</ul>
	<div class="clear"></div>
</div>